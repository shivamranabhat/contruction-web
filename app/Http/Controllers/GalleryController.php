<?php

namespace App\Http\Controllers;

use App\Models\Gallery;
use App\Http\Requests\GalleryStoreRequest;
use Illuminate\Http\Request;
use Carbon\carbon;
use Illuminate\Support\Str;
use Illuminate\Database\QueryException;

class GalleryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $galleries = Gallery::latest()->select('image','slug','created_at')->paginate(10);
        return view('admin.gallery.index',compact('galleries'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.gallery.create');
    }

    /**
     * Store a newly created resource in storage.
     */


    public function store(GalleryStoreRequest $request)
    {
        $formFields = $request->validated();

        $images = $request->file('image');
        if($request->hasFile('image'))
        {
            foreach ($request->file('image') as $image) {
                $imageName = $image->getClientOriginalName();
                $formFields['image'] = $image->storeAs('gallery',$imageName,'public');
                $slug = Str::slug($imageName);
                Gallery::create($formFields+['slug'=>$slug]);
            }
        }
        return redirect()->route('galleries')->with('success', 'Images uploaded successfully.');
    }

    
    /**
     * Display the specified resource.
     */
    public function show(string $slug)
    {
        $gallery = Gallery::where('slug',$slug)->first();
        return view('admin.gallery.details',compact('gallery'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $slug)
    {
        $gallery = Gallery::where('slug',$slug)->first();
        return view('admin.gallery.edit',compact('gallery'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $slug)
    {
        $gallery = Gallery::where('slug',$slug)->first();
        $formFields = $request->validate([
            'image'=> 'nullable|image|mimes:jpeg,png,jpg',
        ],['image.required'=>'Image is required | jpeg,png,jpg',]);
        $time = Carbon::now();
        if($request->hasFile('image'))
        {
            $slug = Str::slug($formFields['image'].'-'.$time);
            $image_path = public_path('storage/'.$gallery->image);
            if(file_exists($image_path))
            {
                unlink($image_path);
            }
            $file = $request->file('image');
            $fileName = $file->getClientOriginalName();
            $formFields['image']= $file->storeAs('gallery',$fileName,'public');
            $gallery->update($formFields+['slug'=>$slug]);
            return redirect()->route('galleries')->with('message','Image updated successfully');
        }
        $gallery->update($formFields+['slug'=>$slug]);
        return redirect()->route('galleries')->with('message','Image updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $slug)
    {
        $gallery = Gallery::where('slug',$slug)->first();
        $image_path = public_path('storage/'.$gallery->image);
        if(!empty($gallery->image))
        {
            if(file_exists($image_path))
            {
                unlink($image_path);
            }
        }
        $gallery->delete();
        return redirect()->route('galleries')->with('message','Image deleted successfully');
    }
}
