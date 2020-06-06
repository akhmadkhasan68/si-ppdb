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
        <div class="wizard-step @if(count($count) > 0) wizard-step-success @else wizard-step-active @endif">
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

<div class="row my-4">
    <div class="col-md-12">
        <div class="card card-primary">
            <div class="card-header"><h4>Transkrip Nilai</h4></div>

            <div class="card-body">
                @if(count($count) == 0)
                    <form method="POST" id="myform-1">
                        @csrf
                        <input type="hidden" name="user_id" value="{{ $user_data->id }}">
                        <h4>Nilai Ujian Nasional</h4>
                        <hr>
                        
                        <div class="row">
                            <div class="form-group col-12 col-md-3">
                                <label for="matematika">Matematika <span class="text-danger">*</span></label>
                                <input id="matematika" type="text" class="form-control" name="matematika" placeholder="Masukkan nilai Matematika" autofocus required>
                            </div>
                            <div class="form-group col-12 col-md-3">
                                <label for="bahasa_indonesia">Bahasa Indonesia <span class="text-danger">*</span></label>
                                <input id="bahasa_indonesia" type="text" class="form-control" name="bahasa_indonesia" placeholder="Masukkan nilai Bahasa Indonesia" autofocus required>
                            </div>
                            <div class="form-group col-12 col-md-3">
                                <label for="bahasa_inggris">Bahasa Inggris <span class="text-danger">*</span></label>
                                <input id="bahasa_inggris" type="text" class="form-control" name="bahasa_inggris" placeholder="Masukkan nilai Bahasa Inggris" autofocus required>
                            </div>
                            <div class="form-group col-12 col-md-3">
                                <label for="ipa">IPA <span class="text-danger">*</span></label>
                                <input id="ipa" type="text" class="form-control" name="ipa" placeholder="Masukkan nilai IPA" autofocus required>
                            </div>
                        </div>
                        
                        <h4>Rata-rata Nilai Raport</h4>
                        <hr>

                        <div class="row">
                            <div class="form-group col-12 col-md-2">
                                <label for="semester_1">Semester 1 <span class="text-danger">*</span></label>
                                <input id="semester_1" type="text" class="form-control" name="semester_1" placeholder="Semester 1" autofocus required>
                            </div>
                            <div class="form-group col-12 col-md-2">
                                <label for="semester_2">Semester 2 <span class="text-danger">*</span></label>
                                <input id="semester_2" type="text" class="form-control" name="semester_2" placeholder="Semester 2" autofocus required>
                            </div>
                            <div class="form-group col-12 col-md-2">
                                <label for="semester_3">Semester 3 <span class="text-danger">*</span></label>
                                <input id="semester_3" type="text" class="form-control" name="semester_3" placeholder="Semester 3" autofocus required>
                            </div>
                            <div class="form-group col-12 col-md-2">
                                <label for="semester_4">Semester 4 <span class="text-danger">*</span></label>
                                <input id="semester_4" type="text" class="form-control" name="semester_4" placeholder="Semester 4" autofocus required>
                            </div>
                            <div class="form-group col-12 col-md-2">
                                <label for="semester_5">Semester 5 <span class="text-danger">*</span></label>
                                <input id="semester_5" type="text" class="form-control" name="semester_5" placeholder="Semester 5" autofocus required>
                            </div>
                            <div class="form-group col-12 col-md-2">
                                <label for="semester_6">Semester 6 <span class="text-danger">*</span></label>
                                <input id="semester_6" type="text" class="form-control" name="semester_6" placeholder="Semester 6" autofocus required>
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
                        <input type="hidden" name="id" value="{{ $data->id }}">
                        <input type="hidden" name="user_id" value="{{ $user_data->id }}">
                        <h4>Nilai Ujian Nasional</h4>
                        <hr>
                        
                        <div class="row">
                            <div class="form-group col-12 col-md-3">
                                <label for="matematika">Matematika <span class="text-danger">*</span></label>
                                <input id="matematika" type="text" class="form-control" name="matematika" value="{{ $data->matematika }}" placeholder="Masukkan nilai Matematika" autofocus required>
                            </div>
                            <div class="form-group col-12 col-md-3">
                                <label for="bahasa_indonesia">Bahasa Indonesia <span class="text-danger">*</span></label>
                                <input id="bahasa_indonesia" type="text" class="form-control" name="bahasa_indonesia" value="{{ $data->bahasa_indonesia }}" placeholder="Masukkan nilai Bahasa Indonesia" autofocus required>
                            </div>
                            <div class="form-group col-12 col-md-3">
                                <label for="bahasa_inggris">Bahasa Inggris <span class="text-danger">*</span></label>
                                <input id="bahasa_inggris" type="text" class="form-control" name="bahasa_inggris" value="{{ $data->bahasa_inggris }}" placeholder="Masukkan nilai Bahasa Inggris" autofocus required>
                            </div>
                            <div class="form-group col-12 col-md-3">
                                <label for="ipa">IPA <span class="text-danger">*</span></label>
                                <input id="ipa" type="text" class="form-control" name="ipa" value="{{ $data->ipa }}" placeholder="Masukkan nilai IPA" autofocus required>
                            </div>
                        </div>
                        
                        <h4>Rata-rata Nilai Raport</h4>
                        <hr>

                        <div class="row">
                            <div class="form-group col-12 col-md-2">
                                <label for="semester_1">Semester 1 <span class="text-danger">*</span></label>
                                <input id="semester_1" type="text" class="form-control" name="semester_1" value="{{ $data->semester_1 }}" placeholder="Semester 1" autofocus required>
                            </div>
                            <div class="form-group col-12 col-md-2">
                                <label for="semester_2">Semester 2 <span class="text-danger">*</span></label>
                                <input id="semester_2" type="text" class="form-control" name="semester_2" value="{{ $data->semester_2 }}" placeholder="Semester 2" autofocus required>
                            </div>
                            <div class="form-group col-12 col-md-2">
                                <label for="semester_3">Semester 3 <span class="text-danger">*</span></label>
                                <input id="semester_3" type="text" class="form-control" name="semester_3" value="{{ $data->semester_3 }}" placeholder="Semester 3" autofocus required>
                            </div>
                            <div class="form-group col-12 col-md-2">
                                <label for="semester_4">Semester 4 <span class="text-danger">*</span></label>
                                <input id="semester_4" type="text" class="form-control" name="semester_4" value="{{ $data->semester_4 }}" placeholder="Semester 4" autofocus required>
                            </div>
                            <div class="form-group col-12 col-md-2">
                                <label for="semester_5">Semester 5 <span class="text-danger">*</span></label>
                                <input id="semester_5" type="text" class="form-control" name="semester_5" value="{{ $data->semester_5 }}" placeholder="Semester 5" autofocus required>
                            </div>
                            <div class="form-group col-12 col-md-2">
                                <label for="semester_6">Semester 6 <span class="text-danger">*</span></label>
                                <input id="semester_6" type="text" class="form-control" name="semester_6" value="{{ $data->semester_6 }}" placeholder="Semester 6" autofocus required>
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
        <a href="{{ url('/isi_formulir/3') }}" class="btn btn-secondary btn-block btn-lg"><i class="fa fa-chevron-left"></i> Sebelumnya</a>
    </div>
    @if(count($count) > 0)
    <div class="col-6 col-md-3 ml-auto">
        <a href="{{ url('/isi_formulir/5') }}" class="btn btn-primary btn-block btn-lg">Selanjutnya <i class="fa fa-chevron-right"></i></a>
    </div>
    @endif
</div>
@endsection

@section('js')
<script>
    $("#myform-1").submit(function(e)
    {
        e.preventDefault();

        var data = $(this).serialize();

        $.ajax({
            url: '{{ url("isi_formulir/ajax_action_add_nilai") }}',
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
            url: '{{ url("isi_formulir/ajax_action_update_nilai") }}',
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