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
}
