<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AdvertisementController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;

// Banned Users
Route::middleware(['auth', 'banned'])->group(function () {
    Route::get('/banned', function () {
        return view('banned');
    })->name('banned');
});

// Admin Routes
Route::middleware(['auth', 'is_admin'])->prefix('admin')->group(function () {
    Route::get('/', function () {
        return view('admin.adminpage');
    })->name('admin.adminpage');

    Route::get('/ads', [AdminController::class, 'indexAds'])->name('admin.ads');
    Route::get('/categories', [AdminController::class, 'indexCategories'])->name('admin.categories');
    Route::get('/users', [AdminController::class, 'indexUsers'])->name('admin.users');
    Route::get('/users/search', [AdminController::class, 'searchUsers'])->name('admin.users.search');
    Route::get('/users/{id}/ban', [AdminController::class, 'banUser'])->name('admin.userban');
    Route::get('users/{id}/ads', [AdminController::class, 'indexUserAds'])->name('admin.userads');
    Route::get('/category/{id}/edit', [CategoryController::class, 'edit'])->name('admin.edit');
    Route::post('/category/{id}', [CategoryController::class, 'update'])->name('admin.update');
    Route::get('categories/create', [CategoryController::class, 'create'])->name('admin.create');
    Route::post('categories', [CategoryController::class, 'store'])->name('admin.store');
    Route::delete('categories/{id}', [CategoryController::class, 'destroy'])->name('admin.destroy');

});

// Other Routes
Route::middleware(['auth', 'banned'])->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/ads/create', [AdvertisementController::class, 'create'])->name('advertisements.create');
    Route::get('/dashboard', [AdvertisementController::class, 'dashboard'])->name('dashboard');
    Route::get('/ad/{id}/delete', [AdvertisementController::class, 'destroy'])->name('advertisements.destroy');
    Route::post('/ads', [AdvertisementController::class, 'store'])->name('advertisements.store');
    Route::get('/ad/{id}/edit', [AdvertisementController::class, 'edit'])->name('advertisements.edit');
    Route::post('/ad/{id}', [AdvertisementController::class, 'update'])->name('advertisements.update');
});

// Default Route
Route::get('/', function () {
    if (auth()->check()) {
        if (auth()->user()->is_admin) {
            return redirect()->route('admin.adminpage');
        } elseif (auth()->user()->is_banned) {
            return redirect()->route('banned');
        }
    }
    return app(CategoryController::class)->index();
})->name('mainpage');

// Advertisement Routes
Route::get('/ads', [AdvertisementController::class, 'index'])->name('advertisements.index');
Route::get('/ads/category/{category_name}', [AdvertisementController::class, 'listByCategory'])->name('advertisements.listByCategory');
Route::get('/ads/{id}', [AdvertisementController::class, 'show'])->name('advertisements.show');

require __DIR__.'/auth.php';
