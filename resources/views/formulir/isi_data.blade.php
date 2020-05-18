@extends('layouts.app')

@section('header')
<h1>Isi Formulir PPDB</h1>
@endsection

@section('content')
<div class="row my-3">
    <div class="col-12 col-lg-12">
    <div class="wizard-steps">
        <div class="wizard-step wizard-step-active">
            <div class="wizard-step-icon">
                <i class="fas fa-user"></i>
            </div>
            <div class="wizard-step-label">
                Data Diri
            </div>
        </div>
        <div class="wizard-step">
            <div class="wizard-step-icon">
                <i class="fas fa-school"></i>
            </div>
            <div class="wizard-step-label">
                Sekolah Asal
            </div>
        </div>
        <div class="wizard-step">
            <div class="wizard-step-icon">
                <i class="fas fa-users"></i>
            </div>
            <div class="wizard-step-label">
                Data Orang Tua / Wali
            </div>
        </div>
        <div class="wizard-step">
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
            <div class="card-header"><h4>Data Diri</h4></div>

            <div class="card-body">
                <form method="POST" id="myform-1">
                    @csrf
                    <div class="row">
                        <div class="form-group col-12 col-md-4">
                            <label for="nama">Nama Lengkap (Sesuai Ijazah) <span class="text-danger">*</span></label>
                            <input id="nama" type="text" class="form-control" name="nama" placeholder="Masukkan nama lengkap anda" autofocus required>
                        </div>
                        <div class="form-group col-12 col-md-4">
                            <label for="nisn">NISN <span class="text-danger">*</span></label>
                            <input id="nisn" type="text" class="form-control" placeholder="Masukkan NISN" name="nisn" required>
                        </div>
                        <div class="form-group col-12 col-md-4">
                            <label for="nik">NIK <span class="text-danger">*</span></label>
                            <input id="nik" type="text" class="form-control" placeholder="Masukkan NIK" name="nik" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-12 col-md-6">
                            <label for="tempat_lahir">Tempat Lahir <span class="text-danger">*</span></label>
                            <input id="tempat_lahir" type="tempat_lahir" class="form-control"  placeholder="Masukkan kota tempat lahir anda" name="tempat_lahir" required>
                        </div>
                        <div class="form-group col-12 col-md-6">
                            <label for="tempat_lahir">Tanggal Lahir <span class="text-danger">*</span></label>
                            <input type="text" class="form-control datepicker" name="tanggal_lahir" placeholder="Masukkan tanggal lahir anda" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-12 col-md-6">
                            <label for="agama">Agama <span class="text-danger">*</span></label>
                            <select name="agama" id="agama" class="form-control" required>
                                <option value="">Pilih Agama</option>
                                <option value="Islam">Islam</option>
                                <option value="Kristen Katolik">Kristen Katolik</option>
                                <option value="Kristen Protestan">Kristen Protestan</option>
                                <option value="Hindu">Hindu</option>
                                <option value="Buddha">Buddha</option>
                            </select>
                        </div>
                        <div class="form-group col-12 col-md-6">
                            <label for="jenis_kelamin">Jenis Kelamin <span class="text-danger">*</span></label>
                            <br>
                            <div class="my-3">
                                <input type="radio" name="jenis_kelamin" value="Laki-laki" required> Laki-laki &nbsp;&nbsp;&nbsp;
                                <input type="radio" name="jenis_kelamin" value="Perempuan" required> Perempuan 
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-12 col-md-6">
                            <label for="email">E-Mail</label>
                            <input id="email" type="text" class="form-control"  placeholder="Masukkan E-Mail anda" name="email">
                        </div>
                        <div class="form-group col-12 col-md-6">
                            <label for="no_hp">Nomor Handphone <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" name="no_hp" placeholder="Masukkan Nomor Handphone anda" required>
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col-12 col-md-12">
                            <label for="alamat">Alamat Lengkap (Sesuai Kartu Keluarga) <span class="text-danger">*</span></label>
                            <textarea name="alamat" id="alamat" cols="30" rows="10" placeholder="Masukkan alamat lengkap anda" class="form-control" required></textarea>
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col-12 col-md-6">
                            <label for="kota">Kota/Kabupaten <span class="text-danger">*</span></label>
                            <input id="kota" type="text" class="form-control"  placeholder="Masukkan kota/kabupaten tempat tinggal anda" name="kota" required>
                        </div>
                        <div class="form-group col-12 col-md-6">
                            <div class="row">
                                <div class="col-md-6 col-12">
                                    <label for="provinsi">Provinsi <span class="text-danger">*</span></label>
                                    <input id="provinsi" type="text" class="form-control"  placeholder="Masukkan provinsi tempat tinggal anda" name="provinsi" required>
                                </div>
                                <div class="col-md-6 col-12">
                                    <label for="kode_pos">Kode Pos <span class="text-danger">*</span></label>
                                    <input id="kode_pos" type="text" class="form-control"  placeholder="Masukkan kode pos" name="kode_pos" required>
                                </div>
                            </div>
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
    <div class="col-12 col-md-3 ml-auto">
        <a href="{{ url('/isi_formulir/2') }}" class="btn btn-primary btn-block btn-lg">Selanjutnya <i class="fa fa-chevron-right"></i></a>
    </div>
</div>
@endsection