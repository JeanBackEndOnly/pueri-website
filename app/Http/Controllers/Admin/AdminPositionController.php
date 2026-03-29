<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\CreatePositionRequest;
use App\Http\Requests\Admin\UpdatePositionRequest;
use App\Models\Position;
use Illuminate\Http\Request;

class AdminPositionController extends Controller
{
    public function index(){
        $positions = Position::all();
        return view('admin.position', compact('positions'));
    }
    public function show(){
        return view('admin.management.CreatePosition');
    }
    public function showUpdate($id){
        $job = Position::find($id);
        return view('admin.management.UpdatePosition', compact('job'));
    }
    public function destroy($id){
       try {
            $positionId = Position::findOrFail($id);
            $positionId->delete();
            
            return back()->with('success', 'Position Deleted Successfully!');
        } catch (\Exception $th) {
            return back()->with('error', $th->getMessage());
        }
    }
    public function store(CreatePositionRequest $request){
        try {
            $validatedData = $request->validated();
            Position::create($validatedData);
            return back()->with('success', 'Position Created Successfully!');
        } catch (\Exception $th) {
            return back()->with('error', $th->getMessage());
        }
    }
    public function update(UpdatePositionRequest $request, $id){
        try {
            $validatedData = $request->validated();
            $positionData = Position::findOrFail($id);

            $positionData->update($validatedData);
            return back()->with('success', 'Position Update Successfully!');
        } catch (\Exception $th) {
            return back()->with('error', $th->getMessage());
        }
    }
}