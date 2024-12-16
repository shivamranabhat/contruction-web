<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ScriptStoreRequest;
use Illuminate\Database\QueryException;
use App\Models\Page;
use App\Models\Script;
use Illuminate\Support\Str;


class ScriptController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $scripts = Script::latest()->filter(request(['position','search']))->select('title','position','page_id','slug','created_at')->paginate(10);
        return view('admin.script.index',compact('scripts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $pages = Page::select('id','name')->get();
        return view('admin.script.create',compact('pages'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ScriptStoreRequest $request)
    {
        try{
            $formFields = $request->validated();
            $slug = Str::slug($request->title.'_'.Str::random(5));
            Script::create($formFields+['slug'=>$slug]);
            return redirect()->route('scripts')->with('message','Script added successfully');
        }
        catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $slug)
    {
        $script = Script::whereSlug($slug)->select('title','position','code','page_id','slug','created_at')->first();
        return view('admin.script.details',compact('script'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $slug)
    {
        $pages = Page::all();
        $script = Script::whereSlug($slug)->select('title','position','code','page_id','slug','created_at')->first();
        return view('admin.script.edit',compact('script','pages'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ScriptStoreRequest $request, string $slug)
    {

        try{
            $script = Script::whereSlug($slug)->first();
            $formFields = $request->validated();
            $slug = Str::slug($request->title.'_'.Str::random(5));
            $script->update($formFields+['slug'=>$slug]);
            return redirect()->route('scripts')->with('message','Script updated successfully');
        }
        catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $slug)
    {
        $script = Script::whereSlug($slug)->first();
        $script->delete();
        return redirect()->route('scripts')->with('message','Script deleted successfully');
    }
}
