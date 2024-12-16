<?php

namespace App\Http\Controllers;

use App\Models\OpenGraph;
use App\Http\Controllers\Controller;
use Illuminate\Validation\Rule;
use Illuminate\Http\Request;
use App\Http\Requests\OpenGraphStoreRequest;
use Illuminate\Database\QueryException;
use App\Models\Page;
use Illuminate\Support\Str;

class OpenGraphController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $graphs = OpenGraph::latest()->filter(request(['position','search']))->select('tag_name','page_id','slug','created_at')->paginate(10);
        return view('admin.graph.index',compact('graphs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $pages = Page::select('id','name')->get();
        return view('admin.graph.create',compact('pages'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(OpenGraphStoreRequest $request)
    {
        try{
            $formFields = $request->validated();
            $slug = Str::slug($request->title.'_'.Str::random(5));
            OpenGraph::create($formFields+['slug'=>$slug]);
            return redirect()->route('graphs')->with('message','Graph added successfully');
        }
        catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $slug)
    {
        $pages = Page::all();
        $graph = OpenGraph::whereSlug($slug)->first();
        return view('admin.graph.edit',compact('graph','pages'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $slug)
    {

        try{
            $graph = OpenGraph::whereSlug($slug)->first();
            $formFields = $request->validate([
                'tag_name'=>'required',
                'title'=>'required',
                'description'=>'required',
                'image'=>'required',
                'url'=>'required',
                'type'=>'required',
                'site_name'=>'required',
                'page_id'=>'required|unique:open_graphs,page_id,'.$graph->id,
            ],['page_id.unique'=>'Open graph for this page already exists']);
            $slug = Str::slug($request->title.'_'.Str::random(5));
            $graph->update($formFields+['slug'=>$slug]);
            return redirect()->route('graphs')->with('message','Graph updated successfully');
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
        $graph = OpenGraph::whereSlug($slug)->first();
        $graph->delete();
        return redirect()->route('graphs')->with('message','Graph deleted successfully');
    }
}