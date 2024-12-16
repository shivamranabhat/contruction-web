<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Team;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use App\Http\Requests\TeamStoreRequest;
use Illuminate\Database\QueryException;

class TeamController extends Controller
{
    public function index()
    {
        $teams = Team::filter(request(['search']))->latest()->select('image','name','slug','created_at')->paginate(10);
        return view('admin.about.team.index',compact('teams'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.about.team.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(TeamStoreRequest $request)
    {
        try{

            $formFields = $request->validated();
            if($request->hasFile('image'))
            {
                $image = $request->file('image');
                $imageName = $image->getClientOriginalName();
                $formFields['image'] = $image->storeAs('teams',$imageName,'public');
            }
            $slug = Str::slug($formFields['name']);
            Team::create($formFields+['slug'=>$slug]);
            return redirect()->route('teams')->with('message','Member added successfully');
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
        $team = Team::whereSlug($slug)->first();
        return view('admin.about.team.edit',compact('team'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, String $slug)
    {
        try{
            $team = Team::whereSlug($slug)->first();
            $formFields = $request->validate([
                'name'=>'required|unique:teams,name,'.$team->id,
                'alt'=>'required',
                'role'=>'required',
                'image' => 'nullable|image|mimes:jpeg,png,jpg,webp',
            ],
            [
                'name.unique'=>'Member with this name already exists'
            ]);
            if($request->hasFile('image'))
            {
                $slug = Str::slug($formFields['name']);
                if(!empty($team->image))
                {
                    $image_path = public_path('storage/'.$team->image);
                    if(file_exists($image_path))
                    {
                        unlink($image_path);
                    }
                }
                $uploadedFile = $request->file('image');
                $fileName = $uploadedFile->getClientOriginalName();
                $formFields['image'] = $uploadedFile->storeAs('teams',$fileName,'public');
            }
            $team->update($formFields+['slug'=>$slug]);
            return redirect()->route('teams')->with('message','Member updated successfully');
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
            $team = Team::whereSlug($slug)->first();
            if(!empty($team->image))
            {
                $image_path = public_path('storage/'.$team->image);
                if(file_exists($image_path))
                {
                    unlink($image_path);
                }
            }
            $team->delete();
            return redirect()->route('teams')->with('message','Member deleted successfully');
        }
        catch (\Exception $e) {
            return redirect()->back()->with('error', 'Please check the required fields are filled.');
        }
    }
}
