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
}
