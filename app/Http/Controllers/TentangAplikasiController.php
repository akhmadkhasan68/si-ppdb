<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TentangAplikasiController extends Controller
{
    public function index()
    {
        return view('tentang_aplikasi');
    }
}
