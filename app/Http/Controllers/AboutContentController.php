<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\BodyContent;
use Illuminate\Database\QueryException;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

class AboutContentController extends Controller
{
    public function index()
    {
        $contents = BodyContent::select('title','slug','created_at')->whereSlug('about-body')->get();
        return view('admin.about.contents.index',compact('contents'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $content = BodyContent::whereSlug('about-body')->first();
        if ($content) {
            return redirect()->route('abouts')->with('error','About content already exists');
        }
        return view('admin.about.contents.create');
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
                'image'=>'required|mimetypes:image/jpeg,image/png,image/jpg,image/gif',
                'alt'=>'required',
            ]);
            $slug = 'about-body';
            if($request->hasFile('image'))
            {
                $image = $request->file('image');
                $imageName = $image->getClientOriginalName();
                $formFields['image'] = $image->storeAs('about',$imageName,'public');
            }
            BodyContent::create($formFields+['position'=>'about-body','slug'=>$slug]);
            return redirect()->route('abouts')->with('message','About contents added successfully');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $slug)
    {
        $content = BodyContent::whereSlug($slug)->first();
        return view('admin.about.contents.edit',compact('content'));
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
                'image'=>'nullable|mimetypes:image/jpeg,image/png,image/jpg,image/gif',
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
                $formFields['image'] = $uploadedFile->storeAs('about',$fileName,'public');
            }
            $content->update($formFields);
            return redirect()->route('abouts')->with('message','About content updated successfully');
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
            return redirect()->route('mains')->with('message','About content deleted successfully');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }
}
