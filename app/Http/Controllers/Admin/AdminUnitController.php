<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\CreateUnitRequest;
use App\Http\Requests\Admin\UpdateUnitRequest;
use App\Models\Unit;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;

class AdminUnitController extends Controller
{
    public function index(){
        $unit = Unit::all();
        return view('admin.unit', compact('unit'));
    }
    public function show(){
        return view('admin.management.CreateUnit');
    }
    public function showUpdate($id){
        $unit = Unit::findOrFail($id);
        return view('admin.management.UpdateUnit', compact('unit'));
    }
    public function showDelete($id){
        $unit = Unit::find($id);
        return view('admin.management.DeleteUnit', compact('unit'));
    }
    
    public function destroy($id){
        try {
            $sectId = Unit::findOrFail($id);
            $sectId->delete();
            
            return back()->with('success', 'Section/Unit Deleted Successfully!');
        } catch (\Exception $th) {
            return back()->with('error', $th->getMessage());
        }
    }
    // Create Informations =============
    public function store(CreateUnitRequest $request){
        try {
            $validatedData = $request->validated();
            $validatedData['unit_image'] = $request->hasFile('unit_image') ?
                $request->file('unit_image')->store('images', 'public') : null;
            Unit::create($validatedData);
            return back()->with('success', 'Section/unit Created Successfully!');
        } catch (\Exception $th) {
            return back()->with('error', $th->getMessage());
        }
    }

    public function update(UpdateUnitRequest $request, $id){
        try {
            $validatedData = $request->validated();
            $unitData = Unit::findOrFail($id);

            $validatedData['unit_image'] = $unitData->unit_image;
            if($request->hasFile('unit_image')){
                if($unitData->unit_image && Storage::disk('public')->exists($unitData->unit_image)){
                    Storage::disk('public')->delete($unitData->unit_image);
                }
                $validatedData['unit_image'] = $request->file('unit_image')->store('images', 'public');
            }

            $unitData->update($validatedData);
            return back()->with('success', 'unit Update Successfully!');
        } catch (\Exception $th) {
            return back()->with('error', $th->getMessage());
        }
    }
}
