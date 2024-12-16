<?php

namespace App\Http\Controllers;

use App\Models\BodyContent;
use Illuminate\Http\Request;
use Illuminate\Database\QueryException;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;


class BodyContentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $contents = BodyContent::select('title','slug','created_at')->whereSlug('main-body')->get();
        return view('admin.body_contents.index',compact('contents'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $content = BodyContent::whereSlug('main-body')->first();
        if ($content) {
            return redirect()->route('mains')->with('error','Body content already exists');
        }
        return view('admin.body_contents.create');
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
                'description'=>'required',
                'image'=>'required|mimetypes:video/mp4,video/mpeg,video/quicktime,image/jpeg,image/png,image/jpg,image/gif',
                'alt'=>'required',
            ]);
            $slug = 'main-body';
            if($request->hasFile('image'))
            {
                $image = $request->file('image');
                $imageName = $image->getClientOriginalName();
                $formFields['image'] = $image->storeAs('hero_image',$imageName,'public');
            }
            BodyContent::create($formFields+['position'=>'main-body','slug'=>$slug]);
            return redirect()->route('mains')->with('message','Body contents added successfully');
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
        return view('admin.body_contents.details',compact('content'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $slug)
    {
        $content = BodyContent::whereSlug($slug)->first();
        return view('admin.body_contents.edit',compact('content'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $slug)
    {
        try{
            $content = BodyContent::whereSlug($slug)->first();
            $formFields = $request->validate([
                'title'=>'nullable',
                'subtitle'=>'required',
                'description'=>'required',
                'image'=>'nullable|mimetypes:video/mp4,video/mpeg,video/quicktime,image/jpeg,image/png,image/jpg,image/gif',
                'alt'=>'required',
            ]);
            if($request->hasFile('image'))
            {
                if(!empty($content->image))
                {
                    $image_path = public_path('storage/'.$content->image);
                    if(file_exists($image_path))
                    {
                        unlink($image_path);
                    }
                }
                $uploadedFile = $request->file('image');
                $fileName = $uploadedFile->getClientOriginalName();
                $formFields['image'] = $uploadedFile->storeAs('hero_image',$fileName,'public');
            }
            $content->update($formFields);
            return redirect()->route('mains')->with('message','Body content updated successfully');
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
            if(!empty($content->image))
            {
                $image_path = public_path('storage/'.$content->image);
                if(file_exists($image_path))
                {
                    unlink($image_path);
                }
            }
            $content->delete();
            return redirect()->route('mains')->with('message','Body content deleted successfully');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }
}
