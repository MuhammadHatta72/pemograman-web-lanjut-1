<?php

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

// Praktikum 1

Route::get('/', function () {
    return redirect()->route('bima');
});

Route::get('/bima/{id?}', function ($id = null) {
    return "<h1>Ini adalah halaman Bima " . $id . "</h1>";
})->name('bima');

Route::get('/about', function () {
    echo "<h1>Muhammad Hatta (2141720021)</h1>";
});

// Route::get('/articles/{id}', function ($id) {
//     echo "<h1>Halaman artikel dengan id yang dimasukkan
//     adalah " . $id . ".</h1>";
// });

Route::group('admin', function () {
    Route::get('articles', function () {
        return "Halaman untuk mencetak pdf";
    });
    Route::get('articles1', function () {
        return "Halaman untuk mencetak word";
    });
});
