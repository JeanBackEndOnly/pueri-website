<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\CreateOfferRequest;
use App\Http\Requests\Admin\UpdateOfferRequest;
use App\Models\Offer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdminOfferController extends Controller
{
    public function index(){
        $offers = Offer::all();
        return view('admin.offer', compact('offers'));
    }
    public function show(){
        return view('admin.management.CreateOffer');
    }
    public function showUpdate($id){
        $offer = Offer::find($id);
        return view('admin.management.UpdateOffer', compact('offer'));
    }
    public function store(CreateOfferRequest $request){
        try {
            $validatedData = $request->validated();
            $validatedData['image'] = $request->hasFile('image') ?
                $request->file('image')->store('images', 'public') : null;
            Offer::create($validatedData);
            return back()->with('success', 'Offer Created Successfully!');
        } catch (\Exception $th) {
            return back()->with('error', $th->getMessage());
        }
    }
    public function destroy($id){
       try {
            $offerId = Offer::findOrFail($id);
            $offerId->delete();
            
            return back()->with('success', 'Offer Deleted Successfully!');
        } catch (\Exception $th) {
            return back()->with('error', $th->getMessage());
        }
    }
    public function update(UpdateOfferRequest $request, $id){
        try {
            $validatedData = $request->validated();
            $offerData = Offer::findOrFail($id);

            $validatedData['image'] = $offerData->image;
            if($request->hasFile('image')){
                if($offerData->image && Storage::disk('public')->exists($offerData->image)){
                    Storage::disk('public')->delete($offerData->image);
                }
                $validatedData['image'] = $request->file('image')->store('images', 'public');
            }

            $offerData->update($validatedData);
            return back()->with('success', 'Section_unit Update Successfully!');
        } catch (\Exception $th) {
            return back()->with('error', $th->getMessage());
        }
    }
}
      