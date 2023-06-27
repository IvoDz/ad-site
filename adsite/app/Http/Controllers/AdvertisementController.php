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
use Illuminate\Support\Facades\DB;

class AdvertisementController extends Controller
{
    public function index(Request $request)
    {
        $filter = $request->input('filter');
        $search = $request->input('search');

        $query = DB::table('advertisements');

        if ($search) {
            $query->where('title', 'like', "%$search%");
        }

        if ($filter === 'price_asc') {
            $query->orderBy('price', 'asc');
        } elseif ($filter === 'price_desc') {
            $query->orderBy('price', 'desc');
        } elseif ($filter === 'name_asc') {
            $query->orderBy('title', 'asc');
        } elseif ($filter === 'name_desc') {
            $query->orderBy('title', 'desc');
        }

        $advertisements = $query->get();

        return view('advertisements.index', [
            'advertisements' => $advertisements,
            'msg' => "All advertisements",
        ]);
    }
    public function listByCategory($category_name)
    {
        $category = Category::where('name', $category_name)->first();
        $advertisements = $category->advertisements ?? [];
        return view('advertisements.index', ['advertisements' => $advertisements, 'msg' => 'Category - ' . $category_name]);
    }

    public function show($id)
    {
        $advertisement = Advertisement::findOrFail($id);
        return view('advertisements.show', ['advertisement' => $advertisement]);
    }

    public function create()
    {
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
        $file->type = $request->file('picture')->getClientOriginalExtension();
        $file->path = $request->file('picture')->store('public/images/' . $file->id . '.' . $file->type);
        $file->save();

        // Resize and store the image
        //$imagePath = storage_path('app/' . $file->path);
        //$resizedImagePath = 'public/images/' . $file->id . '.' . $file->type;
        //$image = Image::make($imagePath);
        //$image->save(storage_path('app/' . $resizedImagePath));

        $advertisement = Advertisement::create([
            'title' => $validatedData['title'],
            'price' => $validatedData['price'],
            'category_id' => $validatedData['category_id'],
            'description' => $validatedData['description'],
            'seller_id' => Auth::id(),
            'pic' => $file->id,
        ]);

        $user = User::find(Auth::id());
        $user->increment('amountlisted');
        $user->refresh();

        return redirect()->route('advertisements.show', $advertisement->id);
    }

    public function dashboard()
    {
        $user = User::find(Auth::id());
        $advertisements = Advertisement::where('seller_id', $user->id)->get();

        return view('dashboard', ['user' => $user, 'advertisements' => $advertisements]);
    }

    public function destroy(int $id)
    {
        $ad = Advertisement::findOrFail($id);
        $seller = $ad->seller_id;

        if ($seller !== auth()->id() && !auth()->user()->is_admin) {
            return response()->view('error.forbidden', [], 403);
        }

        $adname = $ad->title;
        $ad->delete();

        $user = User::where('id', $seller)->firstOrFail();
        $user->decrement('amountlisted');
        $user->refresh();

        if ($seller === auth()->id()) {
            return redirect()
                ->route('dashboard')
                ->with('success_message', "Ad \"$adname\" was deleted successfully!");
        }

        if (auth()->user()->is_admin) {
            return redirect()
                ->route('admin.ads')
                ->with('success_message', "Ad \"$adname\" was deleted successfully!");
        }
    }

    public function update(Request $request, int $id)
    {
        $advertisement = Advertisement::findOrFail($id);

        // Validate the form data
        $validatedData = $request->validate([
            'title' => 'required',
            'price' => 'required|numeric',
            'category_id' => 'required',
            'description' => 'required',
            'picture' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Update the advertisement with the new data
        $advertisement->title = $validatedData['title'];
        $advertisement->price = $validatedData['price'];
        $advertisement->category_id = $validatedData['category_id'];
        $advertisement->description = $validatedData['description'];

        // Save the updated advertisement
        $advertisement->save();

        return redirect()
            ->route('dashboard')
            ->with('success_message', "Ad \"$advertisement->title\" was edited successfully!");
    }

    public function edit(int $id)
    {
        $advertisement = Advertisement::findOrFail($id);

        if ($advertisement->seller_id !== auth()->id() && !auth()->user()->is_admin) {
            return response()->view('error.forbidden', [], 403);
        }
        $categories = Category::all();
        $adCategory = Category::where('id', $advertisement->category_id)->firstOrFail();
        return view('advertisements.edit', ['advertisement' => $advertisement, 'categories' => $categories, 'categoryname' => $adCategory]);
    }
}
