<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CreateFromRequest;
use Illuminate\Support\Facades\DB;
use App\Models\Unit;
use App\Models\Offer;
use App\Models\Position;
use App\Models\Form;
use App\Models\Files;
use App\Models\Contact;
use App\Models\Workexp;

class IndexController extends Controller
{
    public function index(){
        $information = Unit::with(['employee'])->get();
        $offers = Offer::all();
        $jobs = Position::all();
        $contact = Contact::where('id', 1)->first();
        return view('index', compact(['information', 'offers', 'jobs', 'contact']));
    }
    public function show($id){
        $positionId = Position::findOrFail($id);
        return view('apply', compact('positionId'));
    }
    public function store(CreateFromRequest $request, $id)
    {
        DB::beginTransaction();
        
        try {
            $validated = $request->validated();
            
            // Create Form
            $form = Form::create([
                'position_id' => $id,
                'fname' => $validated['fname'],
                'mname' => $validated['mname'] ?? null,
                'lname' => $validated['lname'],
                'suffix' => $validated['suffix'] ?? null,
                'email' => $validated['email'],
                'contact' => $validated['contact'],
                'sex' => $validated['sex'],
                'address' => $validated['address'],
            ]);
            
            // Bulk insert work experiences (faster!)
            if (!empty($validated['work_experience'])) {
                $experiences = collect($validated['work_experience'])
                    ->filter(fn($exp) => !empty($exp['position']))
                    ->map(fn($exp) => [
                        'form_id' => $form->id,
                        'position' => $exp['position'],
                        'years' => $exp['years'] ?? null,
                        'company_name' => $exp['company_name'] ?? null,
                        'company_address' => $exp['company_address'] ?? null,
                        'company_contact' => $exp['company_contact'] ?? null,
                        'created_at' => now(),
                        'updated_at' => now(),
                    ])
                    ->toArray();
                
                if (!empty($experiences)) {
                    WorkExp::insert($experiences); // One query instead of N
                }
            }
            
            // Save Files
            if ($request->hasFile('files')) {
                $files = $request->file('files');
                $fileNames = $request->input('file_names', []);
                $fileRecords = [];
                
                foreach ($files as $index => $uploadedFile) {
                    if ($uploadedFile && $uploadedFile->isValid()) {
                        $filePath = $uploadedFile->store('applications', 'public');
                        
                        $fileRecords[] = [
                            'form_id' => $form->id,
                            'file' => $filePath,
                            'file_name' => $fileNames[$index] ?? 'Untitled',
                            'created_at' => now(),
                            'updated_at' => now(),
                        ];
                    }
                }
                
                if (!empty($fileRecords)) {
                    Files::insert($fileRecords); // Bulk insert files too!
                }
            }
            
            DB::commit();
            
            return redirect()->route('application.success') // Redirect to success page
                ->with('success', 'Application submitted successfully!');
            
        } catch (\Exception $th) {
            DB::rollback();
            \Log::error('Submission failed', [
                'error' => $th->getMessage(),
                'line' => $th->getLine(),
                'file' => $th->getFile(),
            ]);
            
            return back()->with('error', 'Failed to submit application. Please try again.')
                ->withInput();
        }
    }
}
