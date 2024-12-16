<?php

namespace App\Http\Controllers;

use App\Models\ContactDetail;
use App\Http\Requests\ContactDetailsStoreRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Database\QueryException;

class ContactDetailController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $details = ContactDetail::select('phone','email','created_at','slug')->get();
        return view('admin.contact_info.index',compact('details'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $details = ContactDetail::first();
        if ($details) {
            return redirect()->route('contactDetails')->with('error','Contact details already exists');
        }
        return view('admin.contact_info.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ContactDetailsStoreRequest $request)
    {
        try{
            $formFields = $request->validated();
            $slug = 'contact-'.Str::random(5);
            ContactDetail::create($formFields+['slug'=>$slug]);
            return redirect()->route('contactDetails')->with('message','Contact details added successfully');
        }
        catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

 
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $slug)
    {
        $contactInfo = ContactDetail::whereSlug($slug)->first();
        return view('admin.contact_info.edit',compact('contactInfo'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ContactDetailsStoreRequest $request, string $slug)
    {
        try{
            $contactInfo = ContactDetail::whereSlug($slug)->first();
            $formFields = $request->validated();
            $contactInfo->update($formFields);
            return redirect()->route('contactDetails')->with('message','Contact details updated successfully');
        }
        catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $slug)
    {
        $contactInfo = ContactDetail::whereSlug($slug)->first();
        $contactInfo->delete();
        return redirect()->route('contactDetails')->with('message','Contact details deleted successfully');
    }
}
