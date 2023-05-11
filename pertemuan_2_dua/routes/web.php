<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ArticlesController;
use App\Http\Controllers\PageController;
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

// Pratikum 2
Route::get('/', [HomeController::class, 'index']);
// Route::get('/about', [AboutController::class, 'index']);
Route::get('/articles/{id}', [ArticlesController::class, 'show']);

// => Pratikum 3
// => Nomor 3

// -> Prefix
Route::prefix('category')->group(function () {
    Route::get('/marbel-edu-games', function () {
        return '<h1>Menampilkan Daftar Product marbel-edu-games</h1>';
    });
    Route::get('/marbel-and-friends-kids-games', function () {
        return '<h1>Menampilkan Daftar Product marbel-and-friends-kids-games</h1>';
    });
    Route::get('/riri-story-books', function () {
        return '<h1>Menampilkan Daftar Product riri-story-books</h1>';
    });
    Route::get('/kolak-kids-songs', function () {
        return '<h1>Menampilkan Daftar Product kolak-kids-songs</h1>';
    });
});

// -> Params
Route::get('/news/{description?}', function ($description = null) {

    if ($description === null) {
        $description_update = "kosong";
    } else {
        $description_update = $description;
    }

    return "<h1>Menampilkan Daftar berita {$description_update}</h1>";
});

// -> Prefix
Route::prefix('program')->group(function () {
    Route::get('/karir', function () {
        return '<h1>Menampilkan Daftar Program Karir</h1>';
    });
    Route::get('/magang', function () {
        return '<h1>Menampilkan Daftar Program Magang</h1>';
    });
    Route::get('/kunjungan-industri', function () {
        return '<h1>Menampilkan Daftar Program Kunjungan Industri</h1>';
    });
});


// -> Route Biasa
Route::get('/about-us', [AboutController::class, 'index']);

// -> Route Biasa
Route::get('/contact-us', [PageController::class, 'contact']);
