<?php

namespace App\Http\Controllers;
use App\Models\Advertisement;
use App\Models\Category;
use App\Models\File;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;

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
        $catname = $cat->name;

        $validatedData = $request->validate([
            'name' => 'required',
            'picture' => 'image|max:2048',
        ]);

        $file = null;

        if ($request->hasFile('picture')) {
            $pic = $request->file('picture');
            $path = $pic->store('public');
            $path = str_replace('public/', '', $path);

            $file = File::create([
                'path' => $path,
                'type' => $pic->getClientOriginalExtension(),
            ]);
        }

        $cat->pic = $file ? $file->id : null;
        $cat->name = $validatedData['name'];
        $cat->save();

        $userId = Auth::id();
        $logMessage = "Admin with ID {$userId} performed UPDATE action on Category {$catname}";
        Log::info($logMessage);

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

        $userId = Auth::id();
        $logMessage = "Admin with ID {$userId} performed CREATE action on Category {$validatedData['name']}";
        Log::info($logMessage);

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
    $catname = $category->name;

    Advertisement::where('category_id', $category->id)->delete();

    $category->delete();

    $userId = Auth::id();
    $logMessage = "Admin with ID {$userId} performed DELETE action on Category {$catname}";
    Log::info($logMessage);

    return redirect()->route('admin.categories')->with('success_message', 'Category and associated advertisements were deleted successfully!');
}
}
