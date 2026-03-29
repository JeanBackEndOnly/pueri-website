<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\CreateContactRequest;
use Illuminate\Http\Request;
use App\Models\Contact;

class AdminContactController extends Controller
{
    public function index(){
        $contact = Contact::all();
        return view('admin.contact', compact('contact'));
    }
    public function store(CreateContactRequest $request){
        try {
            $validatedData = $request->validated();
            Contact::create($validatedData);
            return back()->with('success', 'Offer Created Successfully!');
        } catch (\Exception $th) {
            return back()->with('error', $th->getMessage());
        }
    }
    public function update(CreateContactRequest $request){
        try {
            $validatedData = $request->validated();
            $ContactData = Contact::where('id', 1)->first(); 
            $ContactData->update($validatedData);
            return back()->with('success', 'Offer Created Successfully!');
        } catch (\Exception $th) {
            return back()->with('error', $th->getMessage());
        }
    }
}
