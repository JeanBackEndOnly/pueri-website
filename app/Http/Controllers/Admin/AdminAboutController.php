<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\CreateInformationRequest;
use App\Http\Requests\Admin\UpdateInformationRequest;
use App\Models\Employee;
use App\Models\Unit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdminAboutController extends Controller
{
    public function index(){
        $information = Unit::with('employee')->get();
        return view('admin.about', compact('information'));
    }
    public function show(){
        $unit = Unit::all();
        return view('admin.management.CreateInformation', compact('unit'));
    }
    public function destroy($id){
       try {
            $informationId = Employee::findOrFail($id);
            $informationId->delete();
            
            return back()->with('success', 'Information Deleted Successfully!');
        } catch (\Exception $th) {
            return back()->with('error', $th->getMessage());
        }
    }
    public function showUpdate($id){
        $info = Employee::with('unit')->find($id);
        $Unit = Unit::all();
        return view('admin.management.UpdateInformation', compact(['info', 'Unit']));
    }
    // Create Informations =============
    public function store(CreateInformationRequest $request){
        try {
            $validatedData = $request->validated();
            $validatedData['profile'] = $request->hasFile('profile') ?
                $request->file('profile')->store('images', 'public') : null;
            Employee::create($validatedData);
            return back()->with('success', 'Information Created Successfully!');
        } catch (\Exception $th) {
            return back()->with('error', $th->getMessage());
        }
    }
    // Update Informations =============
    public function update(CreateInformationRequest $request, $id){
        try {
            $validatedData = $request->validated();
            $informationData = Employee::findOrFail($id);

            $validatedData['profile'] = $informationData->profile;
            if($request->hasFile('profile')){
                if($informationData->profile && Storage::disk('public')->exists($informationData->profile)){
                    Storage::disk('public')->delete($informationData->profile);
                }
                $validatedData['profile'] = $request->file('profile')->store('images', 'public');
            }

            $informationData->update($validatedData);
            return back()->with('success', 'Information Update Successfully!');
        } catch (\Exception $th) {
            return back()->with('error', $th->getMessage());
        }
    }
}
