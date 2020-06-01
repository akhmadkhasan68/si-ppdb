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
        <div class="wizard-step wizard-step-active">
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
            <div class="card-header"><h4>Data Orang Tua / Wali</h4></div>

            <div class="card-body">
                <form method="POST" id="myform-3">
                    @csrf
                    <h4>Identitas Ayah</h4>
                    <hr>
                    <div class="row">
                        <div class="form-group col-12 col-md-6">
                            <label for="nama_ayah">Nama Ayah <span class="text-danger">*</span></label>
                            <input id="nama_ayah" type="text" class="form-control" name="nama_ayah" placeholder="Masukkan nama ayah" required>
                        </div>
                        <div class="form-group col-12 col-md-6">
                            <label for="pendidikan_ayah">Pendidikan Terakhir <span class="text-danger">*</span></label>
                            <select name="pendidikan_ayah" id="pendidikan_ayah" class="form-control" required>
                                <option value="">Pendidikan Terakhir</option>
                                <option value="SD/MI">SD/MI</option>
                                <option value="SMP/MTs">SMP/MTs</option>
                                <option value="SMA/SMK">SMA/SMK</option>
                                <option value="Diploma">Diploma</option>
                                <option value="S1">S1</option>
                                <option value="S2">S2</option>
                                <option value="S3">S3</option>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-12 col-md-6">
                            <label for="pekerjaan_ayah">Pekerjaan <span class="text-danger">*</span></label>
                            <select name="pekerjaan_ayah" id="pekerjaan_ayah" class="form-control" required>
                                <option value="">Pekerjaan</option>
                                <option value="Buruh">Buruh</option>
                                <option value="Tani">Tani</option>
                                <option value="Wiraswasta">Wiraswasta</option>
                                <option value="PNS">PNS</option>
                                <option value="TNI/Polri">TNI/Polri</option>
                                <option value="Perangkat Desa">Perangkat Desa</option>
                                <option value="Nelayan">Nelayan</option>
                                <option value="Lainnya">Lainnya</option>
                            </select>
                        </div>
                        <div class="form-group col-12 col-md-6">
                            <label for="gaji_ayah">Pendapatan / Bulan <span class="text-danger">*</span></label>
                            <input id="gaji_ayah" type="text" class="form-control" name="gaji_ayah" placeholder="Masukkan pendapatan ayah / bulan" autofocus required>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <div class="control-label">Alamat Ayah</div>
                        <label class="custom-switch mt-2">
                            <input type="checkbox" name="custom-switch-checkbox" class="custom-switch-input">
                            <span class="custom-switch-indicator"></span>
                            <span class="custom-switch-description">Samakan Dengan Siswa</span>
                        </label>
                    </div>

                    <div class="row">
                        <div class="form-group col-12 col-md-12">
                            <label for="alamat_ayah">Alamat Lengkap (Sesuai Kartu Keluarga) <span class="text-danger">*</span></label>
                            <textarea name="alamat_ayah" id="alamat_ayah" cols="30" rows="10" placeholder="Masukkan alamat lengkap" class="form-control" required></textarea>
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col-12 col-md-6">
                            <label for="kota_ayah">Kota/Kabupaten <span class="text-danger">*</span></label>
                            <input id="kota_ayah" type="text" class="form-control"  placeholder="Masukkan kota/kabupaten tempat tinggal" name="kota_ayah" required>
                        </div>
                        <div class="form-group col-12 col-md-6">
                            <div class="row">
                                <div class="col-md-6 col-12">
                                    <label for="provinsi_ayah">Provinsi <span class="text-danger">*</span></label>
                                    <input id="provinsi_ayah" type="text" class="form-control"  placeholder="Masukkan provinsi tempat tinggal" name="provinsi_ayah" required>
                                </div>
                                <div class="col-md-6 col-12">
                                    <label for="kode_pos_ayah">Kode Pos <span class="text-danger">*</span></label>
                                    <input id="kode_pos_ayah" type="text" class="form-control"  placeholder="Masukkan kode pos" name="kode_pos_ayah" required>
                                </div>
                            </div>
                        </div>
                    </div>

                    <h4>Identitas Ibu</h4>
                    <hr>
                    <div class="row">
                        <div class="form-group col-12 col-md-6">
                            <label for="nama_ibu">Nama Ibu <span class="text-danger">*</span></label>
                            <input id="nama_ibu" type="text" class="form-control" name="nama_ibu" placeholder="Masukkan nama ibu" required>
                        </div>
                        <div class="form-group col-12 col-md-6">
                            <label for="pendidikan_ibu">Pendidikan Terakhir <span class="text-danger">*</span></label>
                            <select name="pendidikan_ibu" id="pendidikan_ibu" class="form-control" required>
                                <option value="">Pendidikan Terakhir</option>
                                <option value="SD/MI">SD/MI</option>
                                <option value="SMP/MTs">SMP/MTs</option>
                                <option value="SMA/SMK">SMA/SMK</option>
                                <option value="Diploma">Diploma</option>
                                <option value="S1">S1</option>
                                <option value="S2">S2</option>
                                <option value="S3">S3</option>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-12 col-md-6">
                            <label for="pekerjaan_ibu">Pekerjaan <span class="text-danger">*</span></label>
                            <select name="pekerjaan_ibu" id="pekerjaan_ibu" class="form-control" required>
                                <option value="">Pekerjaan</option>
                                <option value="Ibu Rumah Tangga">Ibu Rumah Tangga</option>
                                <option value="Buruh">Buruh</option>
                                <option value="Tani">Tani</option>
                                <option value="Wiraswasta">Wiraswasta</option>
                                <option value="PNS">PNS</option>
                                <option value="TNI/Polri">TNI/Polri</option>
                                <option value="Perangkat Desa">Perangkat Desa</option>
                                <option value="Nelayan">Nelayan</option>
                                <option value="Lainnya">Lainnya</option>>
                            </select>
                        </div>
                        <div class="form-group col-12 col-md-6">
                            <label for="gaji_ibu">Pendapatan / Bulan <span class="text-danger">*</span></label>
                            <input id="gaji_ibu" type="text" class="form-control" name="gaji_ibu" placeholder="Masukkan pendapatan ibu / bulan" required>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <div class="control-label">Alamat Ibu</div>
                        <label class="custom-switch mt-2">
                            <input type="checkbox" name="custom-switch-checkbox" class="custom-switch-input">
                            <span class="custom-switch-indicator"></span>
                            <span class="custom-switch-description">Samakan Dengan Siswa</span>
                        </label>
                    </div>
                    
                    <div class="row">
                        <div class="form-group col-12 col-md-12">
                            <label for="alamat_ibu">Alamat Lengkap (Sesuai Kartu Keluarga) <span class="text-danger">*</span></label>
                            <textarea name="alamat_ibu" id="alamat_ibu" cols="30" rows="10" placeholder="Masukkan alamat lengkap" class="form-control" required></textarea>
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col-12 col-md-6">
                            <label for="kota_ibu">Kota/Kabupaten <span class="text-danger">*</span></label>
                            <input id="kota_ibu" type="text" class="form-control"  placeholder="Masukkan kota/kabupaten tempat tinggal" name="kota_ibu" required>
                        </div>
                        <div class="form-group col-12 col-md-6">
                            <div class="row">
                                <div class="col-md-6 col-12">
                                    <label for="provinsi_ibu">Provinsi <span class="text-danger">*</span></label>
                                    <input id="provinsi_ibu" type="text" class="form-control"  placeholder="Masukkan provinsi tempat tinggal" name="provinsi_ibu" required>
                                </div>
                                <div class="col-md-6 col-12">
                                    <label for="kode_pos_ibu">Kode Pos <span class="text-danger">*</span></label>
                                    <input id="kode_pos_ibu" type="text" class="form-control"  placeholder="Masukkan kode pos" name="kode_pos_ibu" required>
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
    <div class="col-6 col-md-3 mr-auto">
        <a href="{{ url('/isi_formulir/2') }}" class="btn btn-secondary btn-block btn-lg"><i class="fa fa-chevron-left"></i> Sebelumnya</a>
    </div>
    <div class="col-6 col-md-3 ml-auto">
        <a href="{{ url('/isi_formulir/4') }}" class="btn btn-primary btn-block btn-lg">Selanjutnya <i class="fa fa-chevron-right"></i></a>
    </div>
</div>
@endsection