<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PendaftaranController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('admin\pendaftaran\data_pendafaran');
    }

    public function detail(Request $request)
    {
        return view('admin\pendaftaran\detail_pendaftaran');
    }
}
