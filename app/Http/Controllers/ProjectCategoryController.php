<?php

namespace App\Http\Controllers;

use App\Models\ProjectCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ProjectCategoryController extends Controller
{
    public function index()
    {
        $categories = ProjectCategory::filter(request(['search']))->latest()->paginate(10);
        return view('admin.projects.category.index', compact('categories'));
    }

    public function create()
    {
        return view('admin.projects.category.create');
    }

    public function store(Request $request)
    {
        $formFields = $request->validate([
            'name' => 'required|string|max:255|unique:project_categories,name',
        ]);
        $slug = Str::slug($request['name']);
        ProjectCategory::create($formFields + ['slug' => $slug]);
        return redirect()->route('projectCategories')->with('success', 'Category created successfully.');
    }

   
    public function edit(string $slug)
    {
        $category = ProjectCategory::whereSlug($slug)->firstOrFail();
        return view('admin.projects.category.edit', compact('category'));
    }

    public function update(Request $request, string $slug)
    {
        $category = ProjectCategory::whereSlug($slug)->firstOrFail();
        $formFields = $request->validate([
            'name' => 'required|string|max:255|unique:project_categories,name,' . $category->id,
        ]);
        $slug = Str::slug($formFields['name']);
        $category->update($formFields+['slug'=>$slug]);
        return redirect()->route('projectCategories')->with('success', 'Category updated successfully.');
    }

    public function destroy(string $slug)
    {
        $category = ProjectCategory::whereSlug($slug)->firstOrFail();
        $category->delete();
        return redirect()->route('projectCategories')->with('success', 'Category deleted successfully.');
    }
}
