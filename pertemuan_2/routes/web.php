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
    echo "<h1>Selamat Datang</h1>";
});

Route::get('/about', function () {
    echo "<h1>Muhammad Hatta (2141720021)</h1>";
});

Route::get('/articles/{id}', function ($id) {
    echo "<h1>Halaman artikel dengan id yang dimasukkan
    adalah " . $id . ".</h1>";
});
