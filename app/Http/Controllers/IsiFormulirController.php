<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class IsiFormulirController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('formulir.isi_data');
    }
}
