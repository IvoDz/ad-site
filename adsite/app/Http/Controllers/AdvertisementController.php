<?php

namespace App\Http\Controllers;
use App\Models\Advertisement;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\File;
use Illuminate\Validation\Rule;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;

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
            'price' => 'required',
            'category_id' => 'required',
            'description' => 'required',
            'picture' => [
                'image',
                'max:100000', // Maximum file size of 2MB (2048 kilobytes)
            ],
        ]);

        $file = new File();
        $file->path = $request->file('picture')->store('public/images');
        $file->type = $request->file('picture')->getClientOriginalExtension();
        $file->save();

        $advertisement = Advertisement::create([
                    'title' => $validatedData['title'],
                    'price' => $validatedData['price'],
                    'category_id' => $validatedData['category_id'],
                    'description' => $validatedData['description'],
                    'seller_id' => Auth::id(),
                    'pic' => $file->id,
                ]);
        // Resize and store the image
        $imagePath = storage_path('app/' . $file->path);
        $resizedImagePath = 'public/images/' . $file->id . '.' . $file->type;
        $image = Image::make($imagePath);
        $image->save(storage_path('app/' . $resizedImagePath));

        $user = User::find(Auth::id());
        $user->increment('amountlisted');
        $user->refresh();

        return redirect()->route('advertisements.show', $advertisement->id);
    }
}
