<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CategoryController extends Controller
{
   
    public function index()
    {
        $categories = Category::all();
        return view('admin.categories.categories', [
            'categories' => $categories
        ]);
    }

    
    public function create()
    {
        return view('admin.categories.create');

    }

    
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|max:255',
            'image' => 'required|image|max:100'
        ]);
        
        $path = Storage::putFile('categories', $validated['image']);
        
        $category = new Category();
        $category->title = $validated['title'];
        $category->image = $path;
        $category->save();

        return redirect()->route('admin.categories.index')->with('status', 'Category "' . $validated['title'] . '" created successfully.');

    }
    
    
    public function edit(Category $category)
    {
        return view('admin.categories.edit', [
            'category' => $category
        ]);
    }

    
    public function update(Request $request, Category $category)
    {
        $validated = $request->validate([
            'title' => 'required|max:255',
            'image' => 'image|max:100'
        ]);

        $request->whenHas('image', function ($input) use ($category){
            Storage::delete($category->image);
            $path = Storage::putFile('categories', $input);
            $category->image = $path;
        });

        $category->title = $validated['title'];
        $category->save();

       return redirect()->route('admin.categories.index')->with('status', 'Category "' . $validated['title'] . '" updated successfully.');


    }

    public function destroy(Category $category)
    {
        Storage::delete($category->image);
        $title = $category->title;
        $category->delete();

        return redirect()->route('admin.categories.index')->with('status', 'Category "' . $title . '" deleted successfully.');

    }
}
