<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class PageController extends Controller
{
    public function index()
    {
        echo "<h1>Selamat Datang</h1>";
    }

    public function about()
    {
        echo "<h1>Muhammad Hatta (2141720021)</h1>";
    }

    public function articles($id)
    {
        echo "<h1>Halaman Artikel dengan Id {$id}</h1>";
    }
    public function contact()
    {
        echo "<h1>Menampilkan Contact Us</h1>";
    }
}
