<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\Unit;
use Illuminate\Http\Request;

class MemberProfileController extends Controller
{
    public function show($id){
        $profile = Employee::with('Unit')->findOrFail($id); // This will throw a clearer error
        return view('profile', compact('profile'));
    }
    
}
