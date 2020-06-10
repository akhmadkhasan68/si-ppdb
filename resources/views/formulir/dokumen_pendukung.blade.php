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
        <div class="wizard-step wizard-step-success">
            <div class="wizard-step-icon">
                <i class="fas fa-sticky-note"></i>
            </div>
            <div class="wizard-step-label">
                Transkrip Nilai
            </div>
        </div>
        <div class="wizard-step wizard-step-active">
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
            <div class="card-header"><h4>Dokumen Pendukung</h4></div>

            <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="alert alert-info alert-has-icon">
                            <div class="alert-icon"><i class="far fa-lightbulb"></i></div>
                                <div class="alert-body">
                                <div class="alert-title">Info</div>
                                Upload file dengan format berupa JPG, JPEG, PNG, PDF.
                            </div>
                        </div>
                    </div>
                </div>
                @if(count($count) < 1)
                    <form method="POST" id="myform-1">
                        @csrf
                        
                        <div class="row">
                            <div class="form-group col-12 col-md-3">
                                <label for="foto">Foto (4x6) <span class="text-danger">*</span></label>
                                <input id="foto" type="file" class="form-control" name="foto" autofocus required>
                            </div>
                            <div class="form-group col-12 col-md-3">
                                <label for="kk">Kartu Keluarga <span class="text-danger">*</span></label>
                                <input id="kk" type="file" class="form-control" name="kk" autofocus required>
                            </div>
                            <div class="form-group col-12 col-md-3">
                                <label for="scan_raport">Scan Raport <span class="text-danger">*</span></label>
                                <input id="scan_raport" type="file" class="form-control" name="scan_raport" autofocus required>
                            </div>
                            <div class="form-group col-12 col-md-3">
                                <label for="ijazah">Scan Ijazah <span class="text-danger">*</span></label>
                                <input id="ijazah" type="file" class="form-control" name="ijazah" autofocus required>
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
                        <div class="row">
                            <div class="form-group col-12 col-md-3">
                                <label for="foto">Foto (4x6) <span class="text-danger">*</span></label>
                                <input id="foto" type="file" class="form-control" name="foto" autofocus required>
                            </div>
                            <div class="form-group col-12 col-md-3">
                                <label for="kk">Kartu Keluarga <span class="text-danger">*</span></label>
                                <input id="kk" type="file" class="form-control" name="kk" autofocus required>
                            </div>
                            <div class="form-group col-12 col-md-3">
                                <label for="scan_raport">Scan Raport <span class="text-danger">*</span></label>
                                <input id="scan_raport" type="file" class="form-control" name="scan_raport" autofocus required>
                            </div>
                            <div class="form-group col-12 col-md-3">
                                <label for="ijazah">Scan Ijazah <span class="text-danger">*</span></label>
                                <input id="ijazah" type="file" class="form-control" name="ijazah" autofocus required>
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
                    <!-- <img src="{{ public_path() }}\uploads\{{ Auth::user()->username }}\{{ $data->foto }}" alt="sasa"> -->
                @endif
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-6 col-md-3 mr-auto">
        <a href="{{ url('/isi_formulir/4') }}" class="btn btn-secondary btn-block btn-lg"><i class="fa fa-chevron-left"></i> Sebelumnya</a>
    </div>
    @if(count($count) > 0)
    <div class="col-6 col-md-3 ml-auto">
        <a href="{{ url('/isi_formulir/6') }}" class="btn btn-primary btn-block btn-lg">Selanjutnya <i class="fa fa-chevron-right"></i></a>
    </div>
    @endif
</div>
@endsection

@section('js')
<script>
    $("#myform-1").submit(function(e)
    {
        e.preventDefault();

        $.ajax({
            url: '{{ url("isi_formulir/ajax_action_dokumen_pendukung") }}',
            method:"post",
            dataType: 'json',
            data:new FormData(this),
            processData:false,
            contentType:false,
            cache:false,
            async:false,
            beforeSend: function(){
                $(".loader").show();
            },
            success: function(response){
                $(".loader").hide();

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
                $(".loader").hide();
                alert('Error Data!');
            }
        });
    });
</script>
@endsection