<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::filter(request(['search']))->latest()->paginate(10);
        return view('admin.category.index', compact('categories'));
    }

    public function create()
    {
        return view('admin.category.create');
    }

    public function store(Request $request)
    {
        $formFields = $request->validate([
            'name' => 'required|string|max:255|unique:categories,name',
        ]);
        $slug = Str::slug($request['name']);
        Category::create($request->all() + ['slug' => $slug]);

        return redirect()->route('categories')->with('success', 'Category created successfully.');
    }

   
    public function edit(string $slug)
    {
        $category = Category::whereSlug($slug)->firstOrFail();
        return view('admin.category.edit', compact('category'));
    }

    public function update(Request $request, string $slug)
    {
        $category = Category::whereSlug($slug)->firstOrFail();
        $formFields = $request->validate([
            'name' => 'required|string|max:255|unique:categories,name,' . $category->id,
        ]);
        $slug = Str::slug($formFields['name']);
        $category->update($formFields+['slug'=>$slug]);
        return redirect()->route('categories')->with('success', 'Category updated successfully.');
    }

    public function destroy(string $slug)
    {
        $category = Category::whereSlug($slug)->firstOrFail();
        $category->delete();
        return redirect()->route('categories')->with('success', 'Category deleted successfully.');
    }
}
