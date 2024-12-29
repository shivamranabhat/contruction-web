<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use Illuminate\Database\QueryException;
use App\Models\ProjectCategory;
use Illuminate\Support\Facades\Storage;


class ProjectController extends Controller
{
    public function index()
    {
        $projects = Project::latest()->select('title','image','project_category_id','slug','created_at')->paginate(10);
        return view('admin.projects.index',compact('projects'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = ProjectCategory::select('id','name')->latest()->get();
        return view('admin.projects.create',compact('categories'));
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
            $uploadedFile->move(public_path('storage/projects/images'), $fileName);
            // Construct the URL to the uploaded file
            $url = asset('storage/projects/images/' . $fileName);
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
                    'title'=>'required',
                    'subtitle'=>'required',
                    'image'=> 'required|image|mimes:jpeg,png,jpg,webp', 
                    'alt'=>'required',
                    'project_category_id'=>'required',
                    'description' => 'required',             
                ],
                [
                    'project_category_id.required'=>'Please select a category'
                ]
            );
            if ($request->hasFile('image')) {
                $image = $request->file('image');
                $imageName = time() . '-' . $image->getClientOriginalName();
                $formFields['image'] = $image->storeAs('projects/image', $imageName, 'public');
            }
            $slug = Str::slug($formFields['title']);
            
            // Create blog post with the form fields and slug
            Project::create($formFields + ['slug' => $slug]);
    
            return redirect()->route('projects')->with('message', 'Project added successfully');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Please fill the required fields.');
        }
    }

   

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(String $slug)
    {
        $project = Project::whereSlug($slug)->first();
        $categories = ProjectCategory::select('id','name')->latest()->get();
        return view('admin.projects.edit',compact('project','categories'));
    }

    /**
     * Update the specified resource in storage.
     */
   public function update(Request $request, String $slug)
    {
        // Find the project by slug
        $project = Project::whereSlug($slug)->firstOrFail();
        // Validate the request
        $formFields = $request->validate([
            'title'=>'required',
            'subtitle'=>'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,webp', 
            'alt'=>'required', 
            'project_category_id'=>'required',
            'description' => 'required',
        ], [
            'project_category_id.required'=>'Please select a category'
        ]);
        if ($request->hasFile('image')) {
            if (!empty($project->image)) {
                $oldImagePath = public_path('storage/' . $project->image);
                if (file_exists($oldImagePath)) {
                    unlink($oldImagePath);
                }
            }
            $uploadedFile = $request->file('image');
            $fileName = time() . '-' . $uploadedFile->getClientOriginalName();
            $mainImagePath = $uploadedFile->storeAs('projects/image', $fileName, 'public');
            $formFields['image'] = $mainImagePath;
        }
        $formFields['slug'] = Str::slug($formFields['title']);
        $project->update($formFields);
        return redirect()->route('projects')->with('message', 'Project updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(String $slug)
    {
        try{
            $project = Project::whereSlug($slug)->first();
            if(!empty($project->image))
            {
                $image_path = public_path('storage/'.$project->image);
                if(file_exists($image_path))
                {
                    unlink($image_path);
                }
            }
            $project->delete();
            return redirect()->route('projects')->with('message','Project deleted successfully');
        }
        catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }
    
}
