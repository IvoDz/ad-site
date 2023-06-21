<?php

namespace App\Http\Controllers;
use App\Models\Advertisement;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class AdvertisementController extends Controller
    {
        public function index()
    {
        $advertisements = Advertisement::all();
        return view('advertisements.index', ['advertisements' => $advertisements, 'msg' => "All advertisements"]);
    }

    public function listByCategory($category_name)
    {
        $category = Category::where('name', $category_name)->first();
        $advertisements = $category->advertisements ?? [];
        return view('advertisements.index', ['advertisements' => $advertisements, 'msg' => "Category - " . $category_name]);
    }

    public function show($id)
    {
        $advertisement = Advertisement::findOrFail($id);
        return view('advertisements.show', ['advertisement' => $advertisement]);
    }

    public function create(){
        $categories = Category::all();
        return view('advertisements.create', ['categories' => $categories]);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required',
            'price' => 'required|numeric',
            'category_id' => 'required|exists:categories,id',
            'description' => 'required',
        ]);

        $advertisement = Advertisement::create([
            'title' => $validatedData['title'],
            'price' => $validatedData['price'],
            'category_id' => $validatedData['category_id'],
            'description' => $validatedData['description'],
            'seller_id' => Auth::id(),
        ]);

        $user = User::find(Auth::id());
        $user->increment('amountlisted');
        $user->refresh();
        // Perform any additional actions or redirects as needed

        return redirect()->route('advertisements.show', $advertisement->id);
    }
}
