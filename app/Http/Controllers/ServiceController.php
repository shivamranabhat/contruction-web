<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Service;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use Illuminate\Database\QueryException;
use App\Models\ServiceCategory;
use Illuminate\Support\Facades\Storage;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $services = Service::latest()->select('description','service_category_id','slug','created_at')->paginate(10);
        return view('admin.services.index',compact('services'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = ServiceCategory::select('id','name')->latest()->get();
        return view('admin.services.create',compact('categories'));
    }

      /**
     * store the images selected in ck editor.
     */
    public function uploadCkImage(Request $request)
    {
        if ($request->hasFile('upload')) {
            $uploadedFile = $request->file('upload');
            // Generate a unique file name
            $fileName = $uploadedFile->getClientOriginalName();
            // Move the file to the desired directory
            $uploadedFile->move(public_path('storage/services/images'), $fileName);
            // Construct the URL to the uploaded file
            $url = asset('storage/services/images/' . $fileName);
            // Return JSON response
            return response()->json(['file' => $fileName, 'uploaded' => 1, 'url' => $url]);
        } else {
            // Handle case when no file is uploaded
            return response()->json(['uploaded' => 0, 'error' => 'No file uploaded']);
        }
    }
    
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            // Validate the request
            $formFields = $request->validate([
                'service_category_id'=>'required',
                'description' => 'required',             
            ],
            [
                'service_category_id.required'=>'Please select a category'
            ]
        );
            $slug = Str::slug(Str::random(10));
            
            // Create blog post with the form fields and slug
            Service::create($formFields + ['slug' => $slug]);
    
            return redirect()->route('services')->with('message', 'Service added successfully');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Please fill the required fields.');
        }
    }

   

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(String $slug)
    {
        $service = Service::whereSlug($slug)->first();
        $categories = ServiceCategory::select('id','name')->latest()->get();
        return view('admin.services.edit',compact('service','categories'));
    }

    /**
     * Update the specified resource in storage.
     */
   public function update(Request $request, String $slug)
    {
        // Find the service by slug
        $service = Service::whereSlug($slug)->firstOrFail();
        // Validate the request
        $formFields = $request->validate([
            'service_category_id'=>'required',
            'description' => 'required',
        ], [
            'service_category_id.required'=>'Please select a category'
        ]);
        $service->update($formFields);
        return redirect()->route('services')->with('message', 'Service updated successfully');
       
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(String $slug)
    {
        try{
            $service = Service::whereSlug($slug)->first();
            $service->delete();
            return redirect()->route('services')->with('message','Service deleted successfully');
        }
        catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }
}