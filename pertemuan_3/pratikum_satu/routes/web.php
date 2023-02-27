<?php

use App\Http\Controllers\ContactController;
use App\Mail\ContactUs;
use Illuminate\Support\Facades\Route;

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

// Route::get('/', function () {
//     return view('welcome');
// });

//Nomor 1
Route::get("/", function () {
    return view('home.index');
});

//Nomor 2
Route::prefix('products')->group(function () {
    Route::get('/kitchen', function () {
        return view('products.kitchen', ['page' => 'Dapur']);
    });
    Route::get('/bathroom', function () {
        return view('products.bathroom', ['page' => 'Kamar Mandi']);
    });
});

// Nomor 3
Route::get("/news/{news?}", function ($news = null) {
    return view('news.index', ['news' => $news]);
});

//Nomor 4
Route::prefix('programs')->group(function () {
    Route::get('/', function () {
        return view('programs.index');
    });
    Route::get('/{programs?}', function ($program = null) {
        return view('programs.show', ['program' => $program]);
    });
});

// Nomor 5
Route::get("/about-us", function () {
    return view('about.index');
});

// Nomor 6
Route::resource("/contact", ContactController::class);
