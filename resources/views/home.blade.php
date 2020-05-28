@extends('layouts.app')

@section('header')
<h1>Home</h1>
<!-- <div class="section-header-breadcrumb">
    <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
    <div class="breadcrumb-item"><a href="#">Layout</a></div>
    <div class="breadcrumb-item">Top Navigation</div>
</div> -->
@endsection

@section('content')
<div class="row">
    <div class="col-12 col-sm-6 col-lg-6">
        <h2 class="section-title">PPDB {sekolah} Tahun 2020/2021</h2>
        <p class="section-lead">
            {sekolah} membuka pendaftaran peserta didik baru atau PPDB untuk siswa tahun ajaran 2020/2021.
        </p>
    </div>
</div>

<div class="row">
    <div class="col-12 col-sm-8 col-lg-8">
        <div class="card">
            <div class="card-body">
                <div class="owl-carousel owl-theme slider" id="slider2">
                    <div><img alt="image" src="{{ asset('img/news/img01.jpg') }}">
                    <div class="slider-caption">
                        <div class="slider-title">Image 1</div>
                        <div class="slider-description">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                        tempor incididunt ut labore et dolore magna aliqua.</div>
                    </div>
                    </div>
                    <div><img alt="image" src="{{ asset('img/news/img08.jpg') }}">
                    <div class="slider-caption">
                        <div class="slider-title">Image 2</div>
                        <div class="slider-description">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                        tempor incididunt ut labore et dolore magna aliqua.</div>
                    </div>
                    </div>
                    <div><img alt="image" src="{{ asset('img/news/img10.jpg') }}">
                    <div class="slider-caption">
                        <div class="slider-title">Image 3</div>
                        <div class="slider-description">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                        tempor incididunt ut labore et dolore magna aliqua.</div>
                    </div>
                    </div>
                    <div><img alt="image" src="{{ asset('img/news/img09.jpg') }}">
                    <div class="slider-caption">
                        <div class="slider-title">Image 4</div>
                        <div class="slider-description">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                        tempor incididunt ut labore et dolore magna aliqua.</div>
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-12 col-sm-4 col-lg-4">
        <div class="card">
            <div class="card-header">
                <h4>Informasi Penting</h4>
            </div>
            <div class="card-body">
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
            tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
            quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
            consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
            cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
            proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
            </div>
        </div>
    </div>
</div>
@endsection