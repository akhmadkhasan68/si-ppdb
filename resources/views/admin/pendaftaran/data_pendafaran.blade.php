@extends('layouts.admin')

@section('header')
    Data Pendaftaran
@endsection

@section('content')
<div class="row">
    <div class="col-md-12 col-sm-12 col-12">
        <div class="alert alert-info alert-has-icon">
            <div class="alert-icon"><i class="far fa-lightbulb"></i></div>
            <div class="alert-body">
                <div class="alert-title">Info</div>
                Halaman <b>Data Pendaftaran</b> adalah halaman yang digunakan untuk melihat semua data pendaftar <br>
                yang sudah melakukan penyimpanan formulir secara permanen.
            </div>
        </div>
    </div>
</div>

<div class="row">
	<div class="col-lg-4 col-md-4 col-sm-4 col-12">
        <button type="button" class="btn btn-primary btn-lg btn-block" id="semua-data-btn">
            Semua Data <span class="badge badge-transparent">4</span>
        </button>
	</div>
	<div class="col-lg-4 col-md-4 col-sm-4 col-12">
        <button type="button" class="btn btn-warning btn-lg btn-block" id="belum-diverifikasi-btn">
            Belum Diverifikasi <span class="badge badge-transparent">4</span>
        </button>
	</div>
	<div class="col-lg-4 col-md-4 col-sm-4 col-12">
        <button type="button" class="btn btn-success btn-lg btn-block" id="sudah-diverifikasi-btn">
            Sudah Diverifikasi <span class="badge badge-transparent">4</span>
        </button>
	</div>
</div>

<div class="row mt-3" id="semua-data">
    <div class="col-md-12 col-sm-12 col-12">
        <div class="card">
            <div class="card-header">
                <h4>Semua Data</h4>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>NISN</th>
                                <th>Nama</th>
                                <th>Asal Sekolah</th>
                                <th>Rata-rata Nilai</th>
                                <th>Detail</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1</td>
                                <td>201910370311032</td>
                                <td>Akhmad Khasan Abdullah</td>
                                <td>90</td>
                                <td>90</td>
                                <td>
                                    <a href="{{ url('data_pendaftaran/detail/1') }}" class="btn btn-icon btn-primary"><i class="fas fa-info-circle"></i></a>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row mt-3" id="belum-diverifikasi">
    <div class="col-md-12 col-sm-12 col-12">
        <div class="card">
            <div class="card-header">
                <h4>Belum Diverifikasi</h4>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>NISN</th>
                                <th>Nama</th>
                                <th>Rata-rata Nilai</th>
                                <th>Detail</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1</td>
                                <td>201910370311032</td>
                                <td>Akhmad Khasan Abdullah</td>
                                <td>90</td>
                                <td>
                                    <a href="#" class="btn btn-icon btn-primary"><i class="fas fa-info-circle"></i></a>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row mt-3" id="sudah-diverifikasi">
    <div class="col-md-12 col-sm-12 col-12">
        <div class="card">
            <div class="card-header">
                <h4>Sudah Diverifikasi</h4>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>NISN</th>
                                <th>Nama</th>
                                <th>Rata-rata Nilai</th>
                                <th>Detail</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1</td>
                                <td>201910370311032</td>
                                <td>Akhmad Khasan Abdullah</td>
                                <td>90</td>
                                <td>
                                    <a href="#" class="btn btn-icon btn-primary"><i class="fas fa-info-circle"></i></a>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('js')
<script>
    $(document).ready(function(){
        $('#belum-diverifikasi').hide();
        $('#sudah-diverifikasi').hide();

        $("#semua-data-btn").click(function(){
            $('#semua-data').slideDown();
            $('#belum-diverifikasi').hide();
            $('#sudah-diverifikasi').hide();
        });

        $("#belum-diverifikasi-btn").click(function(){
            $('#semua-data').hide();
            $('#belum-diverifikasi').slideDown();
            $('#sudah-diverifikasi').hide();
        });

        $("#sudah-diverifikasi-btn").click(function(){
            $('#semua-data').hide();
            $('#belum-diverifikasi').hide();
            $('#sudah-diverifikasi').slideDown();
        });
    });
</script>
@endsection