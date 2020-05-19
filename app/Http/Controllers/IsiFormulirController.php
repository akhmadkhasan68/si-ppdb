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

    public function sekolahAsalView()
    {
        return view('formulir.sekolah_asal');
    }

    public function orangTuaView()
    {
        return view('formulir.orang_tua');
    }

    public function transkripNilaiView()
    {
        return view('formulir.transkrip_nilai');
    }

    public function dokumenPendukung()
    {
        return view('formulir.dokumen_pendukung');
    }
}
