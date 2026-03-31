<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Form;
use App\Models\Position;
use Illuminate\Http\Request;

class AdminApplicationController extends Controller
{
    public function index()
        {
            $applications = Form::with(['position', 'workExperiences', 'files'])->get();
            $positions = Position::all();
            return view('admin.application', compact('applications', 'positions'));
        }
    public function show($id){
        $applicant = Form::with('position')->findOrFail($id);
        return view('admin.ViewApplication', compact('applicant'));
    }
    public function destroy($id){
        $id = Form::findOrFail($id);
        $id->delete();
        return back()->with('success', 'Application deleted successfully!');
    }
    public function destroyApplication($id){
        $id = Form::findOrFail($id);
        $id->delete();
        return redirect()->route('admin.application')->with('success', 'Application form deleted successully!');
    }
}
