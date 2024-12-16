<?php

namespace App\Http\Controllers;

use App\Models\Extrapage;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Str;
use App\Models\Page;
use Illuminate\Database\QueryException;

class ExtrapageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pages = ExtraPage::latest()->filter(request(['name','search']))->select('name','slug','created_at')->paginate(10);
        return view('admin.page.index',compact('pages'));
    }

    public function uploadDescription(Request $request)
    {
        if ($request->hasFile('upload')) {
            $uploadedFile = $request->file('upload');
            // Generate a unique file name
            $fileName = $uploadedFile->getClientOriginalName();
            // Move the file to the desired directory
            $uploadedFile->move(public_path('storage/pages'), $fileName);
            // Construct the URL to the uploaded file
            $url = asset('storage/pages/' . $fileName);
            // Return JSON response
            return response()->json(['file' => $fileName, 'uploaded' => 1, 'url' => $url]);
        } else {
            // Handle case when no file is uploaded
            return response()->json(['uploaded' => 0, 'error' => 'No file uploaded']);
        }
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.page.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $formFields = $request->validate([
                'name'=>'required|unique:extrapages,name',
                'description'=>'required'
            ],
            ['name.unique'=>'Page with this name already exists',
            ]
        );
        $slug = Str::slug($formFields['name']);
        ExtraPage::create($formFields+['slug'=>$slug]);
        Page::create([
            'name' => $formFields['name'],
            'slug' => $slug,
        ]);
        return redirect()->route('pages')->with('message','Page created successfully');
    }

  
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $slug)
    {
        $page = Extrapage::whereSlug($slug)->first();
        return view('admin.page.edit',compact('page'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $slug)
    {
        $page = Extrapage::whereSlug($slug)->first();
        $existingPage = Page::where('slug',$slug)->first();
        $formFields = $request->validate([
            'name' => 'required|unique:extrapages,name,' . $page->id,
            'description' => 'required'
        ], [
            'name.unique' => 'A page with this name already exists.',
        ]);
        
        $slug = Str::slug($formFields['name']);
        $page->update($formFields+['slug'=>$slug]);
        if($existingPage){
            $existingPage->update([
                'name' => $formFields['name'],
                'slug' => $slug,
            ]);
        }
        return redirect()->route('pages')->with('message','Page updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $slug)
    {
        $page = Extrapage::whereSlug($slug)->first();
        $existingPage = Page::where('slug',$slug)->first();
        if($page)
        {
            $page->delete();
        }
        if($existingPage)
        {
            $existingPage->delete();
        }
        return redirect()->route('pages')->with('message','Page deleted successfully');
    }
}
