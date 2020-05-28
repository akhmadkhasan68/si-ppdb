@extends('layouts.admin')

@section('header')
    Detail Pendaftaran
@endsection

@section('content')
    <div class="row">
        <div class="col-md-2 col-12">
            <button class="btn btn-danger btn-lg btn-block" onclick="history.back(-1)">
                <i class="fa fa-chevron-left"></i>
                Kembali
            </button>
        </div>
    </div>

    <div class="row mt-3">
        <div class="col-md-4 col-12 col-sm-4">
            <button class="btn btn-primary btn-lg btn-block">
                <i class="fa fa-print"></i>
                Cetak Formulir
            </button>
        </div>
        <div class="col-md-4 col-12 col-sm-4">
            <button class="btn btn-success btn-lg btn-block">
                <i class="fa fa-check"></i>
                Verifikasi Formulir
            </button>
        </div>
        <div class="col-md-4 col-12 col-sm-4">
            <button class="btn btn-danger btn-lg btn-block">
                <i class="fa fa-times"></i>
                Tolak Formulir
            </button>
        </div>
    </div>

    <div class="row mt-3">
        <div class="col-md-12 col-12">
            <div class="card">
                <div class="card-header">
                    <h4>{Nama}</h4>
                </div>
                <div class="card-body">
                    <h4>Data Diri</h4>
                    <hr>
                    <div class="row">
                        <div class="col-md-7 mr-md-auto my-2">
                            <b>Nama:</b>
                            <br>
                            <b>NISN:</b>
                            <br>
                            <b>NIK:</b>
                            <br>
                            <b>TTL:</b> 
                            <br>
                            <b>Jenis Kelamin:</b> 
                            <br>
                            <b>Agama:</b> 
                            <br>
                            <b>E-mail:</b> 
                            <br>
                            <b>Nomor Handphone:</b>
                            <br>
                            <b>Alamat Lengkap:</b> 
                            <br>
                            <b>Kota/Kabupaten:</b>
                            <br>
                            <b>Provinsi:</b>
                            <br>
                            <b>Kode Pos:</b>
                        </div>
                        <div class="col-md-5 ml-md-auto">
                            <div class="main-card my-2 card">
                                <div class="card-body">
                                    <img src="" class="rounded img-fluid img-thumbnail">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row mt-3">
                        <div class="col-md-12 mr-md-auto my-2">
                            <h4>Sekolah Asal</h4>
                            <hr>

                            <b>Nama Sekolah:</b>
                            <br>
                            <b>NPSN:</b>
                            <br>
                            <b>Jenis Sekolah:</b>
                            <br>
                            <b>Tahun Lulus:</b>
                            <br>
                            <b>Alamat Sekolah:</b>
                            <br>
                        </div>
                    </div>

                    <div class="row mt-3">
                        <div class="col-md-12 mr-md-auto my-2">
                            <h4>Orang Tua/Wali</h4>
                            <hr>

                            <h5 class="text-primary">Identitas Ayah</h5>
                            <b>Nama Ayah:</b>
                            <br>
                            <b>Pendidikan Terakhir:</b>
                            <br>
                            <b>Pekerjaan:</b>
                            <br>
                            <b>Pendapatan/Bulan:</b>
                            <br>
                            <b>Alamat Lengkap:</b> 
                            <br>
                            <b>Kota/Kabupaten:</b>
                            <br>
                            <b>Provinsi:</b>
                            <br>
                            <b>Kode Pos:</b>    

                            <br>
                            <br>

                            <h5 class="text-primary">Identitas Ibu</h5>
                            <b>Nama Ibu:</b>
                            <br>
                            <b>Pendidikan Terakhir:</b>
                            <br>
                            <b>Pekerjaan:</b>
                            <br>
                            <b>Pendapatan/Bulan:</b>
                            <br>
                            <b>Alamat Lengkap:</b> 
                            <br>
                            <b>Kota/Kabupaten:</b>
                            <br>
                            <b>Provinsi:</b>
                            <br>
                            <b>Kode Pos:</b> 
                        </div>
                    </div>

                    <div class="row mt-3">
                        <div class="col-md-12 mr-md-auto my-2">
                            <h4>Transkrip Nilai</h4>
                            <hr>

                            <h5 class="text-primary">Nilai Ujian Nasional</h5>
                            <b>Matematika:</b>
                            <br>
                            <b>Bahasa Indonesia:</b>
                            <br>
                            <b>Bahasa Inggris:</b>
                            <br>
                            <b>IPA:</b>
                            
                            <br>
                            <br>

                            <h5 class="text-primary">Rata-rata Nilai Raport</h5>
                            <b>Semester 1:</b>
                            <br>
                            <b>Semester 2:</b>
                            <br>
                            <b>Semester 3:</b>
                            <br>
                            <b>Semester 4:</b>
                            <br>
                            <b>Semester 5:</b>
                            <br>
                            <b>Semester 6:</b>
                            <br>
                            <b class="text-primary">Rata-rata Semua Semester:</b>
                            <br>
                        </div>
                    </div>
                </div>
            </div>
        </div>  
    </div>
@endsection