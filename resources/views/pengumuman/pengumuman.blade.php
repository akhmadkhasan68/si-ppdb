@extends('layouts.app')

@section('header')
<h1>Pengumuman Pendaftaran</h1>
@endsection

@section('content')

@if (Auth::check())
<div class="row">
    <div class="col-md-12 col-12">
        <div class="alert alert-warning alert-has-icon">
            <div class="alert-icon"><i class="fa fa-exclamation-triangle"></i></div>
                <div class="alert-body">
                <div class="alert-title">Peringatan</div>
                Pengumuman pendaftaran pendaftaran peserta didik baru {sekolah} tahun ajaran 2020/2021 belum dibuka. <br>
                Tanggal pengumuman diadakan mulai <b>12 Februari - 30 maret 2020. </b> <br>
                Kunjungi halaman ini pada tanggal yang tertera.
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-12 col-12">
        <div class="alert alert-success alert-has-icon">
            <div class="alert-icon"><i class="fa fa-check-circle"></i></div>
                <div class="alert-body">
                <div class="alert-title">Selamat!</div>
                Selamat anda dinyatakan <b>lulus</b> sebagai siswa baru di {sekolah} pada tahun ajaran 2020/2021. <br>
                Harap lakukan pendaftaran ulang pada tanggal <b> 30 Maret - 30 April 2020.</b> <br>
                Klik halaman <a href=""><b>ini</b></a> untuk melihat cara pendaftaran ulang.
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-12 col-12">
        <div class="alert alert-danger alert-has-icon">
            <div class="alert-icon"><i class="fa fa-times-circle"></i></div>
                <div class="alert-body">
                <div class="alert-title">Mohon Maaf!</div>
                Mohon maaf, Dengan pertimbangan panitia penerimaan peserta didik baru {sekolah} tahun ajaran 2020/2021. <br>
                Anda dinyatakan <b>tidak lulus</b> sebagai siswa baru di {sekolah} pada tahun ajaran 2020/2021. <br>
            </div>
        </div>
    </div>
</div>
@endif

@guest
<div class="row justify-content-md-center">
    <div class="col-md-6 col-12 content-justify-center">
        <div class="card card-primary">
            <div class="card-header"><h4>Pengumuman Pendaftaran</h4></div>
            <div class="card-body">
                <form method="POST" action="">
                    @csrf

                    <div class="form-group row">
                        <label for="username" class="col-md-4 col-form-label text-md-right">NISN</label>

                        <div class="col-md-6">
                            <input id="username" type="username" placeholder="Masukkan NISN" class="form-control" name="username" required autofocus>
                        </div>
                    </div>

                    <div class="form-group row mb-0">
                        <div class="col-md-8 offset-md-4">
                            <button type="submit" class="btn btn-primary">
                                <i class="fas fa-bullhorn"></i> Cek Pengumuman
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endguest
@endsection