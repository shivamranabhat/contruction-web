<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use App\Http\Requests\BlogStoreRequest;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use App\Models\Page;
use Illuminate\Support\Facades\Storage;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $blogs = Blog::filter(request(['search']))->latest()->select('main_image','title','slug','created_at')->paginate(10);
        return view('admin.blogs.index',compact('blogs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.blogs.create');
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
            $uploadedFile->move(public_path('storage/blogs/media'), $fileName);
            // Construct the URL to the uploaded file
            $url = asset('storage/blogs/media/' . $fileName);
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
    public function store(BlogStoreRequest $request)
    {
        try {
            // Validate the request
            $formFields = $request->validated();
    
            // Handle main image upload
            if ($request->hasFile('main_image')) {
                $image = $request->file('main_image');
                $imageName = time() . '-' . $image->getClientOriginalName();
                $formFields['main_image'] = $image->storeAs('blogs/main_image', $imageName, 'public');
            }
    
            // Generate slug from title
            $slug = Str::slug($formFields['title']);
            
            // Create blog post with the form fields and slug
            $blog = Blog::create($formFields + ['slug' => $slug]);
    
            // Store name to page table if blog creation is successful
            if ($blog) {
                Page::create([
                    'name' => $formFields['title'],
                    'slug' => $slug,
                ]);
            }
    
            return redirect()->route('blogs')->with('message', 'Blog added successfully');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Please fill the required fields.');
        }
    }

   

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(String $slug)
    {
        $blog = Blog::whereSlug($slug)->first();
        return view('admin.blogs.edit',compact('blog'));
    }

    /**
     * Update the specified resource in storage.
     */
   public function update(Request $request, String $slug)
    {
            // Find the blog post by slug
            $blog = Blog::whereSlug($slug)->firstOrFail();
            $page = Page::where('slug', $slug)->first();
    
            // Validate the request
            $formFields = $request->validate([
                'title' => 'required|unique:blogs,title,' . $blog->id,
                'subtitle' => 'required',
                'author' => 'required',
                'main_img_alt' => 'required',
                'description' => 'required',
                'main_image' => 'nullable|image|mimes:jpeg,png,jpg,webp,avif|max:2048',                

            ], [
                'title.unique' => 'Blog with this title already exists'
            ]);
    
            // Handle main image upload
            if ($request->hasFile('main_image')) {
                if (!empty($blog->main_image)) {
                    $oldImagePath = public_path('storage/' . $blog->main_image);
                    if (file_exists($oldImagePath)) {
                        unlink($oldImagePath);
                    }
                }
                $uploadedFile = $request->file('main_image');
                $fileName = time() . '-' . $uploadedFile->getClientOriginalName();
                $mainImagePath = $uploadedFile->storeAs('blogs/main_image', $fileName, 'public');
                $formFields['main_image'] = $mainImagePath;
            }
    
            // Update the blog post
            $formFields['slug'] = Str::slug($formFields['title']);
            $blog->update($formFields);
    
            // Update the page if it exists
            if ($page) {
                $page->update([
                    'name' => $formFields['title'],
                    'slug' => $formFields['slug'],
                ]);
            }
    
            return redirect()->route('blogs')->with('message', 'Blog updated successfully');
       
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(String $slug)
    {
        try{
            $blog = Blog::whereSlug($slug)->first();
            $page = Page::where('slug',$slug)->first();
            if(!empty($blog->main_image))
            {
                $image_path = public_path('storage/'.$blog->main_image);
                if(file_exists($image_path))
                {
                    unlink($image_path);
                }
            }
            $blog->delete();
            if($page){
                $page->delete();
            }
            return redirect()->route('blogs')->with('message','Blog deleted successfully');
        }
        catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }
}
