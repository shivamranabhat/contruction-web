<?php

namespace App\Http\Controllers;

use App\Models\Faq;
use Illuminate\Http\Request;
use App\Http\Requests\FaqStoreRequest;
use Illuminate\Support\Str;

class FaqController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $faqs = Faq::latest()->select('title','slug','created_at')->filter(request(['title','search']))->paginate(10);
        return view('admin.faqs.index',compact('faqs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.faqs.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(FaqStoreRequest $request)
    {
        $formFields = $request->validated();
        $slug = Str::slug($formFields['title'].'-'.Str::random(5));
        Faq::create($formFields+['type'=>'index','slug'=>$slug]);
        return redirect()->route('faqs')->with('message','Faq stored successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $slug)
   {
       $details = Faq::whereSlug($slug)->firstOrFail();
       return view('admin.faqs.details',compact('details'));
   }

   /**
    * Show the form for editing the specified resource.
    */
   public function edit(string $slug)
   {
       $details = Faq::whereSlug($slug)->firstOrFail();
       return view('admin.faqs.edit',compact('details'));
   }

    /**
     * Update the specified resource in storage.
     */
    public function update(FaqStoreRequest $request, string $slug)
    {
        $details = Faq::whereSlug($slug)->firstOrFail();
        $formFields = $request->validated();
        $slug = Str::slug($formFields['title'].'-'.Str::random(5));
        $details->update($formFields+['slug'=>$slug]);
       return redirect()->route('faqs')->with('message','Faq updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $slug)
    {
        $details = Faq::whereSlug($slug)->firstOrFail();
        $details->delete();
        return redirect()->route('faqs')->with('message','Faq deleted successfully');
    }
}
