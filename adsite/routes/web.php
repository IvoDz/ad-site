<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdvertisementController;

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

Route::get('/', function () {
    return view('home');
});

Route::get('/ads', [AdvertisementController::class, 'index']);

Route::get('/ads/category/{category_name}', [AdvertisementController::class, 'listByCategory']);

Route::get('/ads/{id}', [AdvertisementController::class, 'show'])->name('advertisements.show');
