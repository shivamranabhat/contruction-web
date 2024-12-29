<?php

namespace App\Http\Controllers;


use App\Models\ServiceCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ServiceCategoryController extends Controller
{
    public function index()
    {
        $categories = ServiceCategory::filter(request(['search']))->latest()->paginate(10);
        return view('admin.services.category.index', compact('categories'));
    }

    public function create()
    {
        return view('admin.services.category.create');
    }

    public function store(Request $request)
    {
        $formFields = $request->validate([
            'name' => 'required|string|max:255|unique:service_categories,name',
        ]);
        $slug = Str::slug($request['name']);
        ServiceCategory::create($request->all() + ['slug' => $slug]);
        return redirect()->route('serviceCategories')->with('success', 'Category created successfully.');
    }

   
    public function edit(string $slug)
    {
        $category = ServiceCategory::whereSlug($slug)->firstOrFail();
        return view('admin.services.category.edit', compact('category'));
    }

    public function update(Request $request, string $slug)
    {
        $category = ServiceCategory::whereSlug($slug)->firstOrFail();
        $formFields = $request->validate([
            'name' => 'required|string|max:255|unique:service_categories,name,' . $category->id,
        ]);
        $slug = Str::slug($formFields['name']);
        $category->update($formFields+['slug'=>$slug]);
        return redirect()->route('serviceCategories')->with('success', 'Category updated successfully.');
    }

    public function destroy(string $slug)
    {
        $category = ServiceCategory::whereSlug($slug)->firstOrFail();
        $category->delete();
        return redirect()->route('serviceCategories')->with('success', 'Category deleted successfully.');
    }
}