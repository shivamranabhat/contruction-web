<?php

namespace App\Http\Controllers;

use App\Models\BodyContent;
use Illuminate\Http\Request;
use Illuminate\Database\QueryException;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;


class FooterContentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $contents = BodyContent::select('description','slug','created_at')->whereSlug('footer')->get();
        return view('admin.footer.index',compact('contents'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $content = BodyContent::whereSlug('footer')->first();
        if ($content) {
            return redirect()->route('footers')->with('error','Footer content already exists');
        }
        return view('admin.footer.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try
        {
            $formFields = $request->validate([
                'description'=>'required',
            ]);
            $slug = 'footer';
            BodyContent::create($formFields+['position'=>'footer','slug'=>$slug]);
            return redirect()->route('footers')->with('message','Body contents added successfully');
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
        return view('admin.footer.details',compact('content'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $slug)
    {
        $content = BodyContent::whereSlug($slug)->first();
        return view('admin.footer.edit',compact('content'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $slug)
    {
        try{
            $content = BodyContent::whereSlug($slug)->first();
            $formFields = $request->validate([
                'description'=>'required',
            ]);
            $content->update($formFields);
            return redirect()->route('footers')->with('message','Footer content updated successfully');
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
            return redirect()->route('footers')->with('message','Footer content deleted successfully');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }
}
