<?php

use App\Http\Controllers\PhotoController;
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

Route::get('/', function () {
    return view('welcome', ['name' => 'Muhammad Hatta']);
});


Route::get('/dashboard', function () {
    return view('dashboard.index', ["nama" => "Muhamamd Hatta"]);
});


Route::resource('/photo', PhotoController::class);
