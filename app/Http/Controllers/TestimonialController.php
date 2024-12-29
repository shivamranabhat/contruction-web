<?php

namespace App\Http\Controllers;

use App\Models\Testimonial;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class TestimonialController extends Controller
{
    /**
     * Display a listing of testimonials.
     */
    public function index()
    {
        $testimonials = Testimonial::filter(request(['search']))
            ->latest()
            ->select('id', 'name', 'image', 'description', 'slug', 'created_at')
            ->paginate(10);
        
        return view('admin.testimonials.index', compact('testimonials'));
    }

    /**
     * Show the form for creating a new testimonial.
     */
    public function create()
    {
        return view('admin.testimonials.create');
    }

    /**
     * Store a newly created testimonial in storage.
     */
    public function store(Request $request)
    {
        try {
            // Validate the request
            $formFields = $request->validate([
                'name' => 'required|string|max:255',
                'image'=> 'required|image|mimes:jpeg,png,jpg,webp', 
                'description' => 'required|string',
            ]);

            // Generate slug from name
            $slug = Str::slug($formFields['name']);
            $formFields['slug'] = $slug;
            if ($request->hasFile('image')) {
                $image = $request->file('image');
                $imageName = time() . '-' . $image->getClientOriginalName();
                $formFields['image'] = $image->storeAs('testimonials/image', $imageName, 'public');
            }
            // Create testimonial
            Testimonial::create($formFields);
            return redirect()->route('testimonials')->with('message', 'Testimonial added successfully');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Please fill the required fields.');
        }
    }

    /**
     * Show the form for editing the specified testimonial.
     */
    public function edit(String $slug)
    {
        $testimonial = Testimonial::whereSlug($slug)->firstOrFail();
        return view('admin.testimonials.edit', compact('testimonial'));
    }

    /**
     * Update the specified testimonial in storage.
     */
    public function update(Request $request, String $slug)
    {
        $testimonial = Testimonial::whereSlug($slug)->firstOrFail();

        // Validate the request
        $formFields = $request->validate([
            'name' => 'required|string|max:255|unique:testimonials,name,' . $testimonial->id,
            'image'=> 'required|image|mimes:jpeg,png,jpg,webp', 
            'description' => 'required|string',
        ], [
            'name.unique' => 'A testimonial with this name already exists',
        ]);

        // Update slug
        $formFields['slug'] = Str::slug($formFields['name']);
        if ($request->hasFile('image')) {
            if (!empty($testimonial->image)) {
                $oldImagePath = public_path('storage/' . $testimonial->image);
                if (file_exists($oldImagePath)) {
                    unlink($oldImagePath);
                }
            }
            $uploadedFile = $request->file('image');
            $fileName = time() . '-' . $uploadedFile->getClientOriginalName();
            $mainImagePath = $uploadedFile->storeAs('testi$testimonials/image', $fileName, 'public');
            $formFields['image'] = $mainImagePath;
        }
        // Update testimonial
        $testimonial->update($formFields);
        return redirect()->route('testimonials')->with('message', 'Testimonial updated successfully');
    }

    /**
     * Remove the specified testimonial from storage.
     */
    public function destroy(String $slug)
    {
        try {
            $testimonial = Testimonial::whereSlug($slug)->firstOrFail();
            if(!empty($testimonial->image))
            {
                $image_path = public_path('storage/'.$testimonial->image);
                if(file_exists($image_path))
                {
                    unlink($image_path);
                }
            }
            $testimonial->delete();

            return redirect()->route('testimonials')->with('message', 'Testimonial deleted successfully');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }
}
