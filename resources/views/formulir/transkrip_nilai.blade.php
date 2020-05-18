@extends('layouts.app')

@section('header')
<h1>Isi Formulir PPDB</h1>
@endsection

@section('content')
<div class="row my-3">
    <div class="col-12 col-lg-12">
    <div class="wizard-steps">
        <div class="wizard-step wizard-step-success">
            <div class="wizard-step-icon">
                <i class="fas fa-user"></i>
            </div>
            <div class="wizard-step-label">
                Data Diri
            </div>
        </div>
        <div class="wizard-step wizard-step-success">
            <div class="wizard-step-icon">
                <i class="fas fa-school"></i>
            </div>
            <div class="wizard-step-label">
                Sekolah Asal
            </div>
        </div>
        <div class="wizard-step wizard-step-success">
            <div class="wizard-step-icon">
                <i class="fas fa-users"></i>
            </div>
            <div class="wizard-step-label">
                Data Orang Tua / Wali
            </div>
        </div>
        <div class="wizard-step wizard-step-active">
            <div class="wizard-step-icon">
                <i class="fas fa-sticky-note"></i>
            </div>
            <div class="wizard-step-label">
                Transkrip Nilai
            </div>
        </div>
        <div class="wizard-step">
            <div class="wizard-step-icon">
                <i class="fas fa-file"></i>
            </div>
            <div class="wizard-step-label">
                Dokumen Pendukung
            </div>
        </div>
        <div class="wizard-step">
            <div class="wizard-step-icon">
                <i class="fas fa-check"></i>
            </div>
            <div class="wizard-step-label">
                Simpan Data Permanen
            </div>
        </div>
    </div>
    </div>
</div>

<div class="row my-3">
    <div class="col-md-12">
        <div class="card card-primary">
            <div class="card-header"><h4>Transkrip Nilai</h4></div>

            <div class="card-body">
                <form method="POST" id="myform-2">
                    @csrf
                    <div class="row">
                        <div class="form-group col-12 col-md-6">
                            <label for="nama_sekolah">Nama Sekolah <span class="text-danger">*</span></label>
                            <input id="nama_sekolah" type="text" class="form-control" name="nama_sekolah" placeholder="Masukkan sekolah asal" autofocus required>
                        </div>
                        <div class="form-group col-12 col-md-6">
                            <label for="npsn">NPSN <span class="text-danger">*</span></label>
                            <input id="npsn" type="text" class="form-control" placeholder="Masukkan NISN" name="npsn" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-12 col-md-6">
                            <label for="jenis_sekolah">Jenis Sekolah <span class="text-danger">*</span></label>
                            <select name="jenis_sekolah" id="jenis_sekolah" class="form-control" required>
                                <option value="">Jenis Sekolah</option>
                                <option value="Negeri">Negeri</option>
                                <option value="Swasta">Swasta</option>
                            </select>
                        </div>
                        <div class="form-group col-12 col-md-6">
                            <label for="tahun_lulus">Tahun Lulus <span class="text-danger">*</span></label>
                            <select name="tahun_lulus" id="tahun_lulus" class="form-control" required>
                                <option value="">Tahun Lulus</option>
                                <?php for($i = 2010; $i <= date('Y'); $i++){?>
                                    <option value="{{ $i }}">{{ $i }}</option>
                                <?php }?>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-12 col-md-12">
                            <label for="alamat">Alamat <span class="text-danger">*</span></label>
                            <textarea name="alamat" id="alamat" cols="30" rows="10" placeholder="Masukkan alamat sekolah" class="form-control"></textarea>
                        </div>
                    </div>

                    <div class="form-group row mb-0">
                        <div class="col-md-12">
                            <button type="submit" class="btn btn-success btn-lg btn-block">
                                <i class="fa fa-check"></i> Simpan
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-6 col-md-3 mr-auto">
        <a href="{{ url('/isi_formulir/3') }}" class="btn btn-secondary btn-block btn-lg"><i class="fa fa-chevron-left"></i> Sebelumnya</a>
    </div>
    <div class="col-6 col-md-3 ml-auto">
        <a href="" class="btn btn-primary btn-block btn-lg">Selanjutnya <i class="fa fa-chevron-right"></i></a>
    </div>
</div>
@endsection