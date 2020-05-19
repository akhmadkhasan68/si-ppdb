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

<div class="row my-4">
    <div class="col-md-12">
        <div class="card card-primary">
            <div class="card-header"><h4>Transkrip Nilai</h4></div>

            <div class="card-body">
                <form method="POST" id="myform-2">
                    @csrf
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
                            <label for="sem_1">Semester 1 <span class="text-danger">*</span></label>
                            <input id="sem_1" type="text" class="form-control" name="sem_1" placeholder="Semester 1" autofocus required>
                        </div>
                        <div class="form-group col-12 col-md-2">
                            <label for="sem_2">Semester 2 <span class="text-danger">*</span></label>
                            <input id="sem_2" type="text" class="form-control" name="sem_2" placeholder="Semester 2" autofocus required>
                        </div>
                        <div class="form-group col-12 col-md-2">
                            <label for="sem_3">Semester 3 <span class="text-danger">*</span></label>
                            <input id="sem_3" type="text" class="form-control" name="sem_3" placeholder="Semester 3" autofocus required>
                        </div>
                        <div class="form-group col-12 col-md-2">
                            <label for="sem_4">Semester 4 <span class="text-danger">*</span></label>
                            <input id="sem_4" type="text" class="form-control" name="sem_4" placeholder="Semester 4" autofocus required>
                        </div>
                        <div class="form-group col-12 col-md-2">
                            <label for="sem_5">Semester 5 <span class="text-danger">*</span></label>
                            <input id="sem_5" type="text" class="form-control" name="sem_5" placeholder="Semester 5" autofocus required>
                        </div>
                        <div class="form-group col-12 col-md-2">
                            <label for="sem_6">Semester 6 <span class="text-danger">*</span></label>
                            <input id="sem_6" type="text" class="form-control" name="sem_6" placeholder="Semester 6" autofocus required>
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
        <a href="{{ url('/isi_formulir/5') }}" class="btn btn-primary btn-block btn-lg">Selanjutnya <i class="fa fa-chevron-right"></i></a>
    </div>
</div>
@endsection