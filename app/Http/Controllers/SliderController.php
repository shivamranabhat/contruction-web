<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Slider;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use Illuminate\Database\QueryException;

class SliderController extends Controller
{
    public function index()
    {
        $sliders = Slider::filter(request(['search']))->latest()->select('image','title','slug','created_at')->paginate(10);
        return view('admin.sliders.index',compact('sliders'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.sliders.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try{
            $formFields = $request->validate([
                'title'=>'required',
                'subtitle'=>'required',
                'alt'=>'required',
                'image' => 'required|image|mimes:jpeg,png,jpg,webp',
            ]);
            if($request->hasFile('image'))
            {
                $image = $request->file('image');
                $imageName = $image->getClientOriginalName();
                $formFields['image'] = $image->storeAs('sliders',$imageName,'public');
            }
            $slug = Str::slug($formFields['title']);
            Slider::create($formFields+['slug'=>$slug]);
            return redirect()->route('sliders')->with('message','Slider added successfully');
        }
        catch(\Exception $e)
        {
            return redirect()->back()->with('error','Please check the required fields are filled.');
        }
    }

   

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(String $slug)
    {
        $slider = Slider::whereSlug($slug)->first();
        return view('admin.sliders.edit',compact('slider'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, String $slug)
    {
        try{
            $slider = Slider::whereSlug($slug)->first();
            $formFields = $request->validate([
                'title'=>'required',
                'subtitle'=>'required',
                'alt'=>'required',
                'image' => 'nullable|image|mimes:jpeg,png,jpg,webp',
            ]);
            if($request->hasFile('image'))
            {
                $slug = Str::slug($formFields['page']);
                if(!empty($slider->image))
                {
                    $image_path = public_path('storage/'.$slider->image);
                    if(file_exists($image_path))
                    {
                        unlink($image_path);
                    }
                }
                $uploadedFile = $request->file('image');
                $fileName = $uploadedFile->getClientOriginalName();
                $formFields['image'] = $uploadedFile->storeAs('sliders',$fileName,'public');
            }
            $slider->update($formFields+['slug'=>$slug]);
            return redirect()->route('sliders')->with('message','Slider updated successfully');
        }
        catch (\Exception $e) {
            return redirect()->back()->with('error', 'Please check the required fields are filled.');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(String $slug)
    {
        try{
            $slider = Slider::whereSlug($slug)->first();
            if(!empty($slider->image))
            {
                $image_path = public_path('storage/'.$slider->image);
                if(file_exists($image_path))
                {
                    unlink($image_path);
                }
            }
            $slider->delete();
            return redirect()->route('sliders')->with('message','Slider deleted successfully');
        }
        catch (\Exception $e) {
            return redirect()->back()->with('error', 'Please check the required fields are filled.');
        }
    }
}
