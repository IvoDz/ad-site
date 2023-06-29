<?php

namespace App\Http\Controllers;
use App\Models\Advertisement;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\File;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function indexUsers(Request $request)
{
    $search = $request->input('search');

    if ($search) {
        $users = User::where('name', 'like', "%$search%")
                    ->orWhere('email', 'like', "%$search%")
                    ->get();
    } else {
        $users = User::all();
    }

    return view('admin.users', compact('users'));
}
    /**
     * Show the form for creating a new resource.
     */
    public function indexAds(Request $request)
    {
        $filter = $request->input('filter');
        $search = $request->input('search');

        $query = Advertisement::query();

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

        $advertisements = $query->with('file')->get();


        return view('admin.ads', [
            'advertisements' => $advertisements,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function indexCategories()
    {
        $categories = Category::all();
        return view('admin.categories', ['categories' => $categories]);
    }

    /**
     * Display the specified resource.
     */
    public function banUser(int $id)
    {
        $user = User::where('id', $id)->firstOrFail();
        $name = $user->name;
        $user->is_banned = true;
        $user->save();

        $userId = Auth::id();
        $banned_id = $user->id;
        $logMessage = "Admin with ID {$userId} performed BAN action on User with ID {$banned_id}";
        Log::info($logMessage);

        return redirect()->route('admin.users')->with('success_message', "User \"$name \" was banned successfully!");
    }

    public function unbanUser(int $id){
        $user = User::where('id', $id)->firstOrFail();
        $name = $user->name;
        $user->is_banned = false;
        $user->save();

        $userId = Auth::id();
        $banned_id = $user->id;
        $logMessage = "Admin with ID {$userId} performed UNBAN action on User with ID {$banned_id}";
        Log::info($logMessage);

        return redirect()->route('admin.users')->with('success_message', "User \"$name \" was unbanned successfully!");
    }

    /**
     * Update the specified resource in storage.
     */
    public function indexUserAds(int $id)
    {
        $user = User::where('id', $id)->firstOrFail();
        $advertisements = Advertisement::where('seller_id', $id)->get();
        return view('admin.userads', ['advertisements' => $advertisements, 'msg' => "All listings by " . $user->name]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
