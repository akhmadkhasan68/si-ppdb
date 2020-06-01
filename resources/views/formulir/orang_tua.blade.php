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
        <div class="wizard-step @if(count($count) > 0) wizard-step-success @else wizard-step-active @endif">
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
                @if(count($count) < 1)
                    <form method="POST" id="myform-1">
                        @csrf
                        <input type="hidden" name="user_id" value="{{ $user_data->id }}">
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
                                <input type="checkbox" id="alamat_ayah_check" name="custom-switch-checkbox" class="custom-switch-input">
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
                                <label for="gaji_ibu">Pendapatan / Bulan</label>
                                <input id="gaji_ibu" type="text" class="form-control" name="gaji_ibu" placeholder="Masukkan pendapatan ibu / bulan">
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <div class="control-label">Alamat Ibu</div>
                            <label class="custom-switch mt-2">
                                <input type="checkbox" id="alamat_ibu_check" name="custom-switch-checkbox" class="custom-switch-input">
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
                @else   
                    <form method="POST" id="myform-2">
                        @csrf
                        @method('patch')
                        <input type="hidden" name="user_id" value="{{ $user_data->id }}">
                        <input type="hidden" name="id" value="{{ $data->id }}">
                        <h4>Identitas Ayah</h4>
                        <hr>
                        <div class="row">
                            <div class="form-group col-12 col-md-6">
                                <label for="nama_ayah">Nama Ayah <span class="text-danger">*</span></label>
                                <input id="nama_ayah" type="text" class="form-control" name="nama_ayah" value="{{ $data->nama_ayah }}" placeholder="Masukkan nama ayah" required>
                            </div>
                            <div class="form-group col-12 col-md-6">
                                <label for="pendidikan_ayah">Pendidikan Terakhir <span class="text-danger">*</span></label>
                                <select name="pendidikan_ayah" id="pendidikan_ayah" class="form-control" required>
                                    <option value="">Pendidikan Terakhir</option>
                                    <option value="SD/MI" @if($data->pendidikan_ayah == 'SD/MI') selected @endif>SD/MI</option>
                                    <option value="SMP/MTs" @if($data->pendidikan_ayah == 'SMP/MTs') selected @endif>SMP/MTs</option>
                                    <option value="SMA/SMK" @if($data->pendidikan_ayah == 'SMA/SMK') selected @endif>SMA/SMK</option>
                                    <option value="Diploma" @if($data->pendidikan_ayah == 'Diploma') selected @endif>Diploma</option>
                                    <option value="S1" @if($data->pendidikan_ayah == 'S1') selected @endif>S1</option>
                                    <option value="S2" @if($data->pendidikan_ayah == 'S2') selected @endif>S2</option>
                                    <option value="S3" @if($data->pendidikan_ayah == 'S3') selected @endif>S3</option>
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-12 col-md-6">
                                <label for="pekerjaan_ayah">Pekerjaan <span class="text-danger">*</span></label>
                                <select name="pekerjaan_ayah" id="pekerjaan_ayah" class="form-control" required>
                                    <option value="">Pekerjaan</option>
                                    <option value="Buruh" @if($data->pekerjaan_ayah == 'Buruh') selected @endif>Buruh</option>
                                    <option value="Tani" @if($data->pekerjaan_ayah == 'Tani') selected @endif>Tani</option>
                                    <option value="Wiraswasta" @if($data->pekerjaan_ayah == 'Wiraswasta') selected @endif>Wiraswasta</option>
                                    <option value="PNS" @if($data->pekerjaan_ayah == 'PNS') selected @endif>PNS</option>
                                    <option value="TNI/Polri" @if($data->pekerjaan_ayah == 'TNI/Polri') selected @endif>TNI/Polri</option>
                                    <option value="Perangkat Desa" @if($data->pekerjaan_ayah == 'Perangkat Desa') selected @endif>Perangkat Desa</option>
                                    <option value="Nelayan" @if($data->pekerjaan_ayah == 'Nelayan') selected @endif>Nelayan</option>
                                    <option value="Lainnya" @if($data->pekerjaan_ayah == 'Lainnya') selected @endif>Lainnya</option>
                                </select>
                            </div>
                            <div class="form-group col-12 col-md-6">
                                <label for="gaji_ayah">Pendapatan / Bulan <span class="text-danger">*</span></label>
                                <input id="gaji_ayah" type="text" class="form-control" name="gaji_ayah" value="{{ $data->gaji_ayah }}" placeholder="Masukkan pendapatan ayah / bulan" autofocus required>
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <div class="control-label">Alamat Ayah</div>
                            <label class="custom-switch mt-2">
                                <input type="checkbox" id="alamat_ayah_check" name="custom-switch-checkbox" class="custom-switch-input">
                                <span class="custom-switch-indicator"></span>
                                <span class="custom-switch-description">Samakan Dengan Siswa</span>
                            </label>
                        </div>

                        <div class="row">
                            <div class="form-group col-12 col-md-12">
                                <label for="alamat_ayah">Alamat Lengkap (Sesuai Kartu Keluarga) <span class="text-danger">*</span></label>
                                <textarea name="alamat_ayah" id="alamat_ayah" cols="30" rows="10" placeholder="Masukkan alamat lengkap" class="form-control" required>{{ $data->alamat_ayah }}</textarea>
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group col-12 col-md-6">
                                <label for="kota_ayah">Kota/Kabupaten <span class="text-danger">*</span></label>
                                <input id="kota_ayah" type="text" class="form-control"  placeholder="Masukkan kota/kabupaten tempat tinggal" name="kota_ayah" value="{{ $data->kota_ayah }}" required>
                            </div>
                            <div class="form-group col-12 col-md-6">
                                <div class="row">
                                    <div class="col-md-6 col-12">
                                        <label for="provinsi_ayah">Provinsi <span class="text-danger">*</span></label>
                                        <input id="provinsi_ayah" type="text" class="form-control"  placeholder="Masukkan provinsi tempat tinggal" name="provinsi_ayah" value="{{ $data->provinsi_ayah }}" required>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <label for="kode_pos_ayah">Kode Pos <span class="text-danger">*</span></label>
                                        <input id="kode_pos_ayah" type="text" class="form-control"  placeholder="Masukkan kode pos" name="kode_pos_ayah" value="{{ $data->kode_pos_ayah }}" required>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <h4>Identitas Ibu</h4>
                        <hr>
                        <div class="row">
                            <div class="form-group col-12 col-md-6">
                                <label for="nama_ibu">Nama Ibu <span class="text-danger">*</span></label>
                                <input id="nama_ibu" type="text" class="form-control" name="nama_ibu" value="{{ $data->nama_ibu }}" placeholder="Masukkan nama ibu" required>
                            </div>
                            <div class="form-group col-12 col-md-6">
                                <label for="pendidikan_ibu">Pendidikan Terakhir <span class="text-danger">*</span></label>
                                <select name="pendidikan_ibu" id="pendidikan_ibu" class="form-control" required>
                                    <option value="">Pendidikan Terakhir</option>
                                    <option value="SD/MI" @if($data->pendidikan_ibu == 'SD/MI') selected @endif>SD/MI</option>
                                    <option value="SMP/MTs" @if($data->pendidikan_ibu == 'SMP/MTs') selected @endif>SMP/MTs</option>
                                    <option value="SMA/SMK" @if($data->pendidikan_ibu == 'SMA/SMK') selected @endif>SMA/SMK</option>
                                    <option value="Diploma" @if($data->pendidikan_ibu == 'Diploma') selected @endif>Diploma</option>
                                    <option value="S1" @if($data->pendidikan_ibu == 'S1') selected @endif>S1</option>
                                    <option value="S2" @if($data->pendidikan_ibu == 'S2') selected @endif>S2</option>
                                    <option value="S3" @if($data->pendidikan_ibu == 'S3') selected @endif>S3</option>
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-12 col-md-6">
                                <label for="pekerjaan_ibu">Pekerjaan <span class="text-danger">*</span></label>
                                <select name="pekerjaan_ibu" id="pekerjaan_ibu" class="form-control" required>
                                    <option value="">Pekerjaan</option>
                                    <option value="Ibu Rumah Tangga" @if($data->pekerjaan_ibu == 'Ibu Rumah Tangga') selected @endif>Ibu Rumah Tangga</option>
                                    <option value="Buruh" @if($data->pekerjaan_ibu == 'Buruh') selected @endif>Buruh</option>
                                    <option value="Tani" @if($data->pekerjaan_ibu == 'Tani') selected @endif>Tani</option>
                                    <option value="Wiraswasta" @if($data->pekerjaan_ibu == 'Wiraswasta') selected @endif>Wiraswasta</option>
                                    <option value="PNS" @if($data->pekerjaan_ibu == 'PNS') selected @endif>PNS</option>
                                    <option value="TNI/Polri" @if($data->pekerjaan_ibu == 'TNI/Polri') selected @endif>TNI/Polri</option>
                                    <option value="Perangkat Desa" @if($data->pekerjaan_ibu == 'Perangkat Desa') selected @endif>Perangkat Desa</option>
                                    <option value="Nelayan" @if($data->pekerjaan_ibu == 'Nelayan') selected @endif>Nelayan</option>
                                    <option value="Lainnya" @if($data->pekerjaan_ibu == 'Lainnya') selected @endif>Lainnya</option>
                                </select>
                            </div>
                            <div class="form-group col-12 col-md-6">
                                <label for="gaji_ibu">Pendapatan / Bulan</label>
                                <input id="gaji_ibu" type="text" class="form-control" name="gaji_ibu" value="{{ $data->gaji_ibu }}" placeholder="Masukkan pendapatan ibu / bulan">
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <div class="control-label">Alamat Ibu</div>
                            <label class="custom-switch mt-2">
                                <input type="checkbox" id="alamat_ibu_check" name="custom-switch-checkbox" class="custom-switch-input">
                                <span class="custom-switch-indicator"></span>
                                <span class="custom-switch-description">Samakan Dengan Siswa</span>
                            </label>
                        </div>
                        
                        <div class="row">
                            <div class="form-group col-12 col-md-12">
                                <label for="alamat_ibu">Alamat Lengkap (Sesuai Kartu Keluarga) <span class="text-danger">*</span></label>
                                <textarea name="alamat_ibu" id="alamat_ibu" cols="30" rows="10" placeholder="Masukkan alamat lengkap" class="form-control" required>{{ $data->alamat_ibu }}</textarea>
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group col-12 col-md-6">
                                <label for="kota_ibu">Kota/Kabupaten <span class="text-danger">*</span></label>
                                <input id="kota_ibu" type="text" class="form-control"  placeholder="Masukkan kota/kabupaten tempat tinggal" name="kota_ibu" value="{{ $data->kota_ibu }}" required>
                            </div>
                            <div class="form-group col-12 col-md-6">
                                <div class="row">
                                    <div class="col-md-6 col-12">
                                        <label for="provinsi_ibu">Provinsi <span class="text-danger">*</span></label>
                                        <input id="provinsi_ibu" type="text" class="form-control"  placeholder="Masukkan provinsi tempat tinggal" name="provinsi_ibu" value="{{ $data->provinsi_ibu }}" required>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <label for="kode_pos_ibu">Kode Pos <span class="text-danger">*</span></label>
                                        <input id="kode_pos_ibu" type="text" class="form-control"  placeholder="Masukkan kode pos" name="kode_pos_ibu" value="{{ $data->kode_pos_ibu }}" required>
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
                @endif
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-6 col-md-3 mr-auto">
        <a href="{{ url('/isi_formulir/2') }}" class="btn btn-secondary btn-block btn-lg"><i class="fa fa-chevron-left"></i> Sebelumnya</a>
    </div>
    @if(count($count) > 0)
    <div class="col-6 col-md-3 ml-auto">
        <a href="{{ url('/isi_formulir/4') }}" class="btn btn-primary btn-block btn-lg">Selanjutnya <i class="fa fa-chevron-right"></i></a>
    </div>
    @endif
</div>
@endsection

@section('js')
<script>
    $("#alamat_ayah_check").change(function()
    {
        if($(this).is(':checked'))
        {
            $.ajax({
                url: '{{ url("isi_formulir/ajax_get_data_diri") }}',
                method: 'GET',
                dataType: 'json',
                beforeSend: function()
                {
                    $('.loader').show();
                },
                success: function(response)
                {
                    $('.loader').hide();
    
                    console.log(response);

                    $("#alamat_ayah").val(response.data.alamat_lengkap);
                    $("#kota_ayah").val(response.data.kota);
                    $("#provinsi_ayah").val(response.data.provinsi);
                    $("#kode_pos_ayah").val(response.data.kode_pos);

                    $("#alamat_ayah").attr('disabled', true);
                    $("#kota_ayah").attr('disabled', true);
                    $("#provinsi_ayah").attr('disabled', true);
                    $("#kode_pos_ayah").attr('disabled', true);
                },
                error: function()
                {
                    $('.loader').hide();
    
                    alert('Error Data!');
                }
            });
        }
        else
        {
            $("#alamat_ayah").val("");
            $("#kota_ayah").val("");
            $("#provinsi_ayah").val("");
            $("#kode_pos_ayah").val("");

            $("#alamat_ayah").attr('disabled', false);
            $("#kota_ayah").attr('disabled', false);
            $("#provinsi_ayah").attr('disabled', false);
            $("#kode_pos_ayah").attr('disabled', false);
        }

    });

    $("#alamat_ibu_check").change(function()
    {
        if($(this).is(':checked'))
        {
            $.ajax({
                url: '{{ url("isi_formulir/ajax_get_data_diri") }}',
                method: 'GET',
                dataType: 'json',
                beforeSend: function()
                {
                    $('.loader').show();
                },
                success: function(response)
                {
                    $('.loader').hide();
    
                    console.log(response);

                    $("#alamat_ibu").val(response.data.alamat_lengkap);
                    $("#kota_ibu").val(response.data.kota);
                    $("#provinsi_ibu").val(response.data.provinsi);
                    $("#kode_pos_ibu").val(response.data.kode_pos);

                    $("#alamat_ibu").attr('disabled', true);
                    $("#kota_ibu").attr('disabled', true);
                    $("#provinsi_ibu").attr('disabled', true);
                    $("#kode_pos_ibu").attr('disabled', true);
                },
                error: function()
                {
                    $('.loader').hide();
    
                    alert('Error Data!');
                }
            });
        }
        else
        {
            $("#alamat_ibu").val("");
            $("#kota_ibu").val("");
            $("#provinsi_ibu").val("");
            $("#kode_pos_ibu").val("");

            $("#alamat_ibu").attr('disabled', false);
            $("#kota_ibu").attr('disabled', false);
            $("#provinsi_ibu").attr('disabled', false);
            $("#kode_pos_ibu").attr('disabled', false);
        }

    });

    $("#myform-1").submit(function(e)
    {
        e.preventDefault();

        var data = $(this).serialize();

        $.ajax({
            url: '{{ url("isi_formulir/ajax_action_add_data_ortu") }}',
            method: 'POST',
            data: data,
            dataType: 'json',
            beforeSend: function()
            {
                $('.loader').show();
            },
            success: function(response)
            {
                $('.loader').hide();

                if(response.result == false)
                {
                    var form_error = response.form_error;
                    if(form_error.length != 0){
                        for(i = 0; i < form_error.length; i++){
                            iziToast.error({
                                title: response.message.head,
                                message: form_error[i],
                                position: 'topRight'
                            });
                        }
                    }else{
                        swal(response.message.head, response.message.body, 'error');
                    }
                }

                if(response.result == true){
                    swal(response.message.head, response.message.body, 'success');

                    window.location.href = response.redirect;
                }
            },
            error: function()
            {
                $('.loader').hide();

                alert('Error Data!');
            }
        });
    });

    $("#myform-2").submit(function(e)
    {
        e.preventDefault();

        var data = $(this).serialize();

        $.ajax({
            url: '{{ url("isi_formulir/ajax_action_update_data_ortu") }}',
            method: 'POST',
            data: data,
            dataType: 'json',
            beforeSend: function()
            {
                $('.loader').show();
            },
            success: function(response)
            {
                $('.loader').hide();

                if(response.result == false)
                {
                    var form_error = response.form_error;
                    if(form_error.length != 0){
                        for(i = 0; i < form_error.length; i++){
                            iziToast.error({
                                title: response.message.head,
                                message: form_error[i],
                                position: 'topRight'
                            });
                        }
                    }else{
                        swal(response.message.head, response.message.body, 'error');
                    }
                }

                if(response.result == true){
                    swal(response.message.head, response.message.body, 'success');

                    window.location.href = response.redirect;
                }
            },
            error: function()
            {
                $('.loader').hide();

                alert('Error Data!');
            }
        });
    });
</script>
@endsection