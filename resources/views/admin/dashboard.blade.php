@extends('layouts.admin')

@section('header')
    Dashboard
@endsection

@section('content')
<div class="row">
	<div class="col-lg-3 col-md-6 col-sm-6 col-12">
		<div class="card card-statistic-1">
			<div class="card-icon bg-primary">
				<i class="far fa-user"></i>
			</div>
			<div class="card-wrap">
				<div class="card-header">
					<h4>Total Pendaftar</h4>
				</div>
				<div class="card-body">
                    10
                </div>
		    </div>
		</div>
	</div>
	<div class="col-lg-3 col-md-6 col-sm-6 col-12">
		<div class="card card-statistic-1">
			<div class="card-icon bg-danger">
				<i class="far fa-user"></i>
			</div>
			<div class="card-wrap">
				<div class="card-header">
					<h4>Total Akun Pendaftar</h4>
				</div>
				<div class="card-body">
                    42
                </div>
			</div>
		</div>
	</div>
	<div class="col-lg-3 col-md-6 col-sm-6 col-12">
		<div class="card card-statistic-1">
			<div class="card-icon bg-warning">
				<i class="far fa-user"></i>
			</div>
			<div class="card-wrap">
				<div class="card-header">
					<h4>Belum Diverifikasi</h4>
				</div>
				<div class="card-body">
                    1,201
                </div>
			</div>
		</div>
	</div>
	<div class="col-lg-3 col-md-6 col-sm-6 col-12">
		<div class="card card-statistic-1">
			<div class="card-icon bg-success">
				<i class="far fa-user"></i>
			</div>
			<div class="card-wrap">
				<div class="card-header">
					<h4>Sudah Diverifikasi</h4>
				</div>
				<div class="card-body">
                    47
                </div>
			</div>
		</div>
	</div>
</div>

<div class="row">
    <div class="col-md-8 col-12">
        <div class="card">
            <div class="card-header">
                <h4>Pendaftar Formulir Terbaru</h4>
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
    <div class="col-md-4 col-12">
        <div class="card">
            <div class="card-header">
                <h4>Pendaftar Akun Terbaru</h4>
            </div>
            <div class="card-body">
                <!-- <div class="table-responsive"> -->
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Username</th>
                                <th>Nama</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1</td>
                                <td>201910370311032</td>
                            </tr>
                        </tbody>
                    </table>
                <!-- </div> -->
            </div>
        </div>
    </div>
</div>
@endsection