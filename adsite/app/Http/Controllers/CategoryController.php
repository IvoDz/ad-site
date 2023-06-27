<?php

namespace App\Http\Controllers;
use App\Models\Advertisement;
use App\Models\Category;

use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $advertisements = Advertisement::all();
        $categories = Category::all();
        return view('home', ['advertisements' => $advertisements, 'categories' => $categories]);
    }

    public function update(Request $request, int $id)
    {
        $cat = Category::findOrFail($id);

        $validatedData = $request->validate([
            'name' => 'required',
        ]);

        $cat->name = $validatedData['name'];
        $cat->save();

        return redirect()
            ->route('admin.categories')
            ->with('success_message', 'Category was edited successfully!');
    }

    public function edit(int $id)
    {
        $cat = Category::findOrFail($id);
        return view('admin.edit', ['category' => $cat]);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required',
        ]);

        Category::create([
            'name' => $validatedData['name'],
        ]);

        return redirect()
            ->route('admin.categories')
            ->with('success_message', 'Category was created successfully!');
    }

    public function create()
    {
        return view('admin.create');
    }


    public function destroy($id)
{
    $category = Category::findOrFail($id);

    Advertisement::where('category_id', $category->id)->delete();

    $category->delete();

    return redirect()->route('admin.categories')->with('success_message', 'Category and associated advertisements were deleted successfully!');
}
}
