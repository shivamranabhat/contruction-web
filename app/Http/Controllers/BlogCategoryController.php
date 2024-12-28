<?php

namespace App\Http\Controllers;

use App\Models\BlogCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class BlogCategoryController extends Controller
{
    public function index()
    {
        $categories = BlogCategory::filter(request(['search']))->latest()->paginate(10);
        return view('admin.blogs.category.index', compact('categories'));
    }

    public function create()
    {
        return view('admin.blogs.category.create');
    }

    public function store(Request $request)
    {
        $formFields = $request->validate([
            'name' => 'required|string|max:255|unique:blog_categories,name',
        ]);
        $slug = Str::slug($request['name']);
        BlogCategory::create($request->all() + ['slug' => $slug]);

        return redirect()->route('blogCategories')->with('success', 'Category created successfully.');
    }

   
    public function edit(string $slug)
    {
        $category = BlogCategory::whereSlug($slug)->firstOrFail();
        return view('admin.blogs.category.edit', compact('category'));
    }

    public function update(Request $request, string $slug)
    {
        $category = BlogCategory::whereSlug($slug)->firstOrFail();
        $formFields = $request->validate([
            'name' => 'required|string|max:255|unique:blog_categories,name,' . $category->id,
        ]);
        $slug = Str::slug($formFields['name']);
        $category->update($formFields+['slug'=>$slug]);
        return redirect()->route('blogCategories')->with('success', 'Category updated successfully.');
    }

    public function destroy(string $slug)
    {
        $category = BlogCategory::whereSlug($slug)->firstOrFail();
        $category->delete();
        return redirect()->route('blogCategories')->with('success', 'Category deleted successfully.');
    }
}
