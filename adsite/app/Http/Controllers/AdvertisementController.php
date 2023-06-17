<?php

namespace App\Http\Controllers;
use App\Models\Advertisement;
use App\Models\Category;
use Illuminate\Http\Request;

class AdvertisementController extends Controller
    {
        public function index()
    {
        $advertisements = Advertisement::all();
        return view('advertisements.index', ['advertisements' => $advertisements]);
    }

    public function listByCategory($category_name)
    {
        $category = Category::where('name', $category_name)->first();
        $advertisements = $category->advertisements ?? [];
        return view('advertisements.index', ['advertisements' => $advertisements]);
    }

    public function show($id)
    {
        $advertisement = Advertisement::findOrFail($id);
        return view('advertisements.show', ['advertisement' => $advertisement]);
    }
}
