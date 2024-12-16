<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BodyContent;
use Illuminate\Database\QueryException;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

class ContactContentController extends Controller
{
    public function index()
    {
        $contents = BodyContent::select('title','slug','created_at')->whereSlug('contact-content')->get();
        return view('admin.contact_content.index',compact('contents'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $content = BodyContent::whereSlug('contact-content')->first();
        if ($content) {
            return redirect()->route('footers')->with('error','Footer content already exists');
        }
        return view('admin.contact_content.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try
        {
            $formFields = $request->validate([
                'title'=>'required',
                'subtitle'=>'required',
            ]);
            $slug = 'contact-content';
            BodyContent::create($formFields+['position'=>'contact-content','slug'=>$slug]);
            return redirect()->route('contactContents')->with('message','Contact contents added successfully');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $slug)
    {
        $content = BodyContent::whereSlug($slug)->first();
        return view('admin.contact_content.details',compact('content'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $slug)
    {
        $content = BodyContent::whereSlug($slug)->first();
        return view('admin.contact_content.edit',compact('content'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $slug)
    {
        try{
            $content = BodyContent::whereSlug($slug)->first();
            $formFields = $request->validate([
                'title'=>'required',
                'subtitle'=>'required',
            ]);
            $content->update($formFields);
            return redirect()->route('contactContents')->with('message','Contact content updated successfully');
        } catch (\Exception $e) {
        return redirect()->back()->with('error', $e->getMessage());
      }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $slug)
    {
        try
        {
            $content = BodyContent::whereSlug($slug)->first();
            $content->delete();
            return redirect()->route('contactContents')->with('message','Contact content deleted successfully');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }
}
