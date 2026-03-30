<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CreateFromRequest;
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
        try {
            $validated = $request->validated();
            
            // Debug: Check what's being submitted
            \Log::info('Work Experience Data:', $validated['work_experience'] ?? []);
            \Log::info('Files Data:', $request->all());
            
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
            
            // Save Work Experiences
            if (!empty($validated['work_experience'])) {
                foreach ($validated['work_experience'] as $exp) {
                    if (!empty($exp['position'])) {
                        WorkExp::create([
                            'form_id' => $form->id,
                            'position' => $exp['position'],
                            'years' => $exp['years'] ?? null,
                            'company_name' => $exp['company_name'] ?? null,
                            'company_address' => $exp['company_address'] ?? null,
                            'company_contact' => $exp['company_contact'] ?? null,
                        ]);
                    }
                }
            }
            
            // Save Files - SIMPLIFIED VERSION
            if ($request->hasFile('files')) {
                $files = $request->file('files');
                $fileNames = $request->input('file_names', []);
                
                foreach ($files as $index => $uploadedFile) {
                    if ($uploadedFile && $uploadedFile->isValid()) {
                        $filePath = $uploadedFile->store('applications', 'public');
                        
                        Files::create([
                            'form_id' => $form->id,
                            'file' => $filePath,
                            'file_name' => $fileNames[$index] ?? 'Untitled',
                        ]);
                    }
                }
            }
                        
            return back()->with('success', 'Application submitted successfully!');
            
        } catch (\Exception $th) {
            \Log::error('Submission error: ' . $th->getMessage());
            return back()->with('error', $th->getMessage())->withInput();
        }
    }
}
