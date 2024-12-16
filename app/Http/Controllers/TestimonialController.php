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
            ->select('id', 'name', 'rating', 'description', 'slug', 'created_at')
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
                'rating' => 'required|integer|min:1|max:5',
                'description' => 'required|string',
            ]);

            // Generate slug from name
            $slug = Str::slug($formFields['name']);
            $formFields['slug'] = $slug;
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
            'rating' => 'required|integer|min:1|max:5',
            'description' => 'required|string',
        ], [
            'name.unique' => 'A testimonial with this name already exists',
        ]);

        // Update slug
        $formFields['slug'] = Str::slug($formFields['name']);

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
            $testimonial->delete();

            return redirect()->route('testimonials')->with('message', 'Testimonial deleted successfully');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }
}
