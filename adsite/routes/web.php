<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdvertisementController;
use App\Http\Controllers\CategoryController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [CategoryController::class, 'index']);

Route::post('/ads', [AdvertisementController::class, 'store'])->name('advertisements.store');

Route::get('/ads', [AdvertisementController::class, 'index'])->name('advertisements.index');

Route::get('/ads/category/{category_name}', [AdvertisementController::class, 'listByCategory'])->name('advertisements.listByCategory');

Route::get('/ads/create', [AdvertisementController::class, 'create'])->name('advertisements.create');

Route::get('/ads/{id}', [AdvertisementController::class, 'show'])->name('advertisements.show');

