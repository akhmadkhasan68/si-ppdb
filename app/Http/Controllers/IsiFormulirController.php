<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;
use Illuminate\Http\Request;
use App\DokumenPendukung;
use App\AsalSekolah;
use App\dataDiri;
use App\DataOrtu;
use DataTables;
use App\Nilai;
use Validator;
use App\User;
use Image;
use File;

class IsiFormulirController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $count_data_ortu = DataOrtu::where('user_id', Auth::user()->id)->count();

        if($count_data_ortu == 0)
        {
            return redirect('isi_formulir/3');
        }
        else
        {
            return redirect('isi_formulir/1');
        }

    }

    public function isi_data()
    {
        $data['data'] = dataDiri::where('user_id', Auth::user()->id)->first();
        $data['user_data'] = User::find(Auth::user()->id);
        $data['count'] = dataDiri::where('user_id', Auth::user()->id)->get();
        $data['count_asal_sekolah'] = AsalSekolah::where('user_id', Auth::user()->id)->get();
        $data['count_data_ortu'] = DataOrtu::where('user_id', Auth::user()->id)->get();
        $data['count_nilai'] = Nilai::where('user_id', Auth::user()->id)->get();

        return view('formulir.isi_data', $data);
    }

    public function ajax_action_add_data_diri(Request $request)
    {
        $attrs = [
            'nama' => 'Nama Lengkap',
            'nisn' => 'NISN',
            'nik' => 'NIK',
            'tempat_lahir' => 'Tempat Lahir',
            'tanggal_lahir' => 'Tanggal Lahir',
            'agama' => 'Agama',
            'jenis_kelamin' => 'Jenis Kelamin',
            'email' => 'E-mail',
            'nomor_handphone' => 'Nomor Handphone',
            'alamat' => 'Alamat Lengkap',
            'kota' => 'Kota',
            'provinsi' => 'Provinsi',
            'kode_pos' => 'Kode Pos'
        ];

        $validator = Validator::make($request->all(), [
            'user_id' => [
                'required',
                Rule::unique('table_data_diri')
            ],
            'nama' => 'required',
            'nisn' => [
                'required',
                Rule::unique('table_data_diri')
            ],
            'nik' => [
                'required',
                Rule::unique('table_data_diri')
            ],
            'tempat_lahir' => 'required',
            'tanggal_lahir' => 'required',
            'agama' => 'required',
            'jenis_kelamin' => 'required',
            'email' => [
                'required',
                Rule::unique('table_data_diri')
            ],
            'nomor_handphone' => [
                'required',
                Rule::unique('table_data_diri')
            ],
            'alamat' => 'required',
            'kota' => 'required',
            'provinsi' => 'required',
            'kode_pos' => 'required'
        ]);
        $validator->setAttributeNames($attrs);

        if($validator->fails())
        {
            $errors = $validator->errors();
            $json_data = [
                'result' => false,
                'form_error' => $errors->all(),
                'message' => ['head' => 'Gagal', 'body' => 'Mohon maaf, ada beberapa form yang harus diisi!'],
                'redirect' => ''
            ];

            return json_encode($json_data); 
            die();
        }

        $dataDiri = dataDiri::create([
            'user_id' => $request->user_id,
            'name' => $request->nama,
            'nisn' => $request->nisn,
            'nik' => $request->nik,
            'tempat_lahir' => $request->tempat_lahir,
            'tanggal_lahir' => $request->tanggal_lahir,
            'agama' => $request->agama,
            'jenis_kelamin' => $request->jenis_kelamin,
            'email' => $request->email,
            'nomor_handphone' => $request->nomor_handphone,
            'alamat_lengkap' => $request->alamat,
            'kota' => $request->kota,
            'provinsi' => $request->provinsi,
            'kode_pos' => $request->kode_pos
        ]);

        if(!$dataDiri)
        {
            $json_data = [
                'result' => false,
                'form_error' => '',
                'message' => ['head' => 'Gagal', 'body' => 'Ada kesalahan saat memasukkan data. Lakukan beberapa saat lagi!'],
                'redirect' => ''
            ];
            return json_encode($json_data);
            die();
        }

        $json_data = [
            'result' => true,
            'form_error' => '',
            'message' => ['head' => 'Berhasil', 'body' => 'Berhasil menambahkan data diri!'],
            'redirect' => '/isi_formulir/1'
        ];

        return json_encode($json_data);
    }

    public function ajax_action_update_data_diri(Request $request)
    {
        $attrs = [
            'nama' => 'Nama Lengkap',
            'nisn' => 'NISN',
            'nik' => 'NIK',
            'tempat_lahir' => 'Tempat Lahir',
            'tanggal_lahir' => 'Tanggal Lahir',
            'agama' => 'Agama',
            'jenis_kelamin' => 'Jenis Kelamin',
            'email' => 'E-mail',
            'nomor_handphone' => 'Nomor Handphone',
            'alamat' => 'Alamat Lengkap',
            'kota' => 'Kota',
            'provinsi' => 'Provinsi',
            'kode_pos' => 'Kode Pos'
        ];

        $validator = Validator::make($request->all(), [
            'user_id' => [
                'required',
                Rule::unique('table_data_diri')->ignore($request->id)
            ],
            'nama' => 'required',
            'nisn' => [
                'required',
                Rule::unique('table_data_diri')->ignore($request->id)
            ],
            'nik' => [
                'required',
                Rule::unique('table_data_diri')->ignore($request->id)
            ],
            'tempat_lahir' => 'required',
            'tanggal_lahir' => 'required',
            'agama' => 'required',
            'jenis_kelamin' => 'required',
            'email' => [
                'required',
                Rule::unique('table_data_diri')->ignore($request->id)
            ],
            'nomor_handphone' => [
                'required',
                Rule::unique('table_data_diri')->ignore($request->id)
            ],
            'alamat' => 'required',
            'kota' => 'required',
            'provinsi' => 'required',
            'kode_pos' => 'required'
        ]);
        $validator->setAttributeNames($attrs);

        if($validator->fails())
        {
            $errors = $validator->errors();
            $json_data = [
                'result' => false,
                'form_error' => $errors->all(),
                'message' => ['head' => 'Gagal', 'body' => 'Mohon maaf, ada beberapa form yang harus diisi!'],
                'redirect' => ''
            ];

            return json_encode($json_data); 
            die();
        }

        $dataDiri = dataDiri::find($request->id);
        $dataDiri->name = $request->nama;
        $dataDiri->nisn = $request->nisn;
        $dataDiri->nik = $request->nik;
        $dataDiri->tempat_lahir = $request->tempat_lahir;
        $dataDiri->tanggal_lahir = $request->tanggal_lahir;
        $dataDiri->agama = $request->agama;
        $dataDiri->jenis_kelamin = $request->jenis_kelamin;
        $dataDiri->email = $request->email;
        $dataDiri->nomor_handphone = $request->nomor_handphone;
        $dataDiri->alamat_lengkap = $request->alamat;
        $dataDiri->kota = $request->kota;
        $dataDiri->kode_pos = $request->kode_pos;
        $dataDiri->save();

        if(!$dataDiri)
        {
            $json_data = [
                'result' => false,
                'form_error' => '',
                'message' => ['head' => 'Gagal', 'body' => 'Ada kesalahan saat memasukkan data. Lakukan beberapa saat lagi!'],
                'redirect' => ''
            ];
            return json_encode($json_data);
            die();
        }

        $json_data = [
            'result' => true,
            'form_error' => '',
            'message' => ['head' => 'Berhasil', 'body' => 'Berhasil mengubah data diri!'],
            'redirect' => '/isi_formulir/1'
        ];

        return json_encode($json_data);
    }

    public function sekolahAsalView()
    {
        $check_step = dataDiri::where('user_id', Auth::user()->id)->count();
        if($check_step == 0)
            return redirect('isi_formulir/1');

        $data['data'] = AsalSekolah::where('user_id', Auth::user()->id)->first();
        $data['user_data'] = User::find(Auth::user()->id);
        $data['count'] = AsalSekolah::where('user_id', Auth::user()->id)->get();
        $data['count_data_ortu'] = DataOrtu::where('user_id', Auth::user()->id)->get();
        $data['count_nilai'] = Nilai::where('user_id', Auth::user()->id)->get();

        return view('formulir.sekolah_asal', $data);
    }

    public function ajax_action_add_sekolah_asal(Request $request)
    {
        $attrs = [
            'nama_sekolah' => 'Nama Sekolah',
            'npsn' => 'NPSN',
            'jenis_sekolah' => 'Jenis Sekolah',
            'tahun_lulus' => 'Tahun Lulus',
            'alamat' => 'Alamat'
        ];

        $validator = Validator::make($request->all(), [
            'user_id' => [
                'required',
                Rule::unique('table_sekolah_asal')
            ],
            'nama_sekolah' => 'required',
            'npsn' => 'required',
            'jenis_sekolah' => 'required',
            'tahun_lulus' => 'required',
            'alamat' => 'required'
        ]);
        $validator->setAttributeNames($attrs);

        if($validator->fails())
        {   
            $errors = $validator->errors();
            $json_data = [
                'result' => false,
                'form_error' => $errors->all(),
                'message' => ['head' => 'Gagal', 'body' => 'Mohon maaf, ada beberapa form yang harus diisi!'],
                'redirect' => ''
            ];

            return json_encode($json_data); 
            die();
        }

        $sekolahAsal = AsalSekolah::create([
            'user_id' => $request->user_id,
            'nama_sekolah' => $request->nama_sekolah,
            'npsn' => $request->npsn,
            'jenis_sekolah' => $request->jenis_sekolah,
            'tahun_lulus' => $request->tahun_lulus,
            'alamat' => $request->alamat,
        ]);

        if(!$sekolahAsal)
        {
            $json_data = [
                'result' => false,
                'form_error' => '',
                'message' => ['head' => 'Gagal', 'body' => 'Ada kesalahan saat memasukkan data. Lakukan beberapa saat lagi!'],
                'redirect' => ''
            ];
            return json_encode($json_data); 
            die();
        }

        $json_data = [
            'result' => true,
            'form_error' => '',
            'message' => ['head' => 'Berhasil', 'body' => 'Berhasil menambahkan sekolah asal!'],
            'redirect' => '/isi_formulir/2'
        ];

        return json_encode($json_data);
    }

    public function ajax_action_update_sekolah_asal(Request $request)
    {
        $attrs = [
            'nama_sekolah' => 'Nama Sekolah',
            'npsn' => 'NPSN',
            'jenis_sekolah' => 'Jenis Sekolah',
            'tahun_lulus' => 'Tahun Lulus',
            'alamat' => 'Alamat'
        ];

        $validator = Validator::make($request->all(), [
            'user_id' => [
                'required',
                Rule::unique('table_sekolah_asal')->ignore($request->id)
            ],
            'nama_sekolah' => 'required',
            'npsn' => 'required',
            'jenis_sekolah' => 'required',
            'tahun_lulus' => 'required',
            'alamat' => 'required'
        ]);
        $validator->setAttributeNames($attrs);

        if($validator->fails())
        {   
            $errors = $validator->errors();
            $json_data = [
                'result' => false,
                'form_error' => $errors->all(),
                'message' => ['head' => 'Gagal', 'body' => 'Mohon maaf, ada beberapa form yang harus diisi!'],
                'redirect' => ''
            ];

            return json_encode($json_data); 
            die();
        }

        $sekolahAsal = AsalSekolah::find($request->id);
        $sekolahAsal->nama_sekolah = $request->nama_sekolah;
        $sekolahAsal->npsn = $request->npsn;
        $sekolahAsal->jenis_sekolah = $request->jenis_sekolah;
        $sekolahAsal->tahun_lulus = $request->tahun_lulus;
        $sekolahAsal->alamat = $request->alamat;
        $sekolahAsal->save();

        if(!$sekolahAsal)
        {
            $json_data = [
                'result' => false,
                'form_error' => '',
                'message' => ['head' => 'Gagal', 'body' => 'Ada kesalahan saat mengubah data. Lakukan beberapa saat lagi!'],
                'redirect' => ''
            ];
            return json_encode($json_data); 
            die();
        }

        $json_data = [
            'result' => true,
            'form_error' => '',
            'message' => ['head' => 'Berhasil', 'body' => 'Berhasil mengubah sekolah asal!'],
            'redirect' => '/isi_formulir/2'
        ];

        return json_encode($json_data);
    }

    public function orangTuaView()
    {
        $check_step = AsalSekolah::where('user_id', Auth::user()->id)->count();
        if($check_step == 0)
            return redirect('isi_formulir/2');

        $data['data'] = DataOrtu::where('user_id', Auth::user()->id)->first();
        $data['user_data'] = User::find(Auth::user()->id);
        $data['count'] = DataOrtu::where('user_id', Auth::user()->id)->get();
        $data['count_nilai'] = Nilai::where('user_id', Auth::user()->id)->get();

        return view('formulir.orang_tua', $data);
    }

    public function ajax_get_data_diri()
    {
        $data = dataDiri::where('user_id', Auth::user()->id)->first();

        $json_data = [
            'result' => true,
            'data' => $data
        ];

        return json_encode($json_data);
    }

    public function ajax_action_add_data_ortu(Request $request)
    {
        $attrs = [
            'nama_ayah' => 'Nama Ayah',
            'pendidikan_ayah' => 'Pendidikan Ayah',
            'pekerjaan_ayah' => 'Pekerjaan Ayah',
            'gaji_ayah' => 'Gaji Ayah',
            'alamat_ayah' => 'Alamat Ayah',
            'kota_ayah' => 'Kota Ayah',
            'provinsi_ayah' => 'Provinsi Ayah',
            'kode_pos_ayah' => 'Kode Pos Ayah',
            'nama_ibu' => 'Nama Ibu',
            'pendidikan_ibu' => 'Pendidikan Ibu',
            'pekerjaan_ibu' => 'Pekerjaan Ibu',
            'gaji_ibu' => 'Gaji Ibu',
            'alamat_ibu' => 'Alamat Ibu',
            'kota_ibu' => 'Kota Ibu',
            'provinsi_ibu' => 'Provinsi Ibu',
            'kode_pos_ibu' => 'Kode Pos Ibu'
        ];

        $validator = Validator::make($request->all(), [
            'user_id' => [
                'required',
                Rule::unique('table_data_ortu')
            ],
            'nama_ayah' => 'required',
            'pendidikan_ayah' => 'required',
            'pekerjaan_ayah' => 'required',
            'gaji_ayah' => 'required',
            'alamat_ayah' => 'required',
            'kota_ayah' => 'required',
            'provinsi_ayah' => 'required',
            'kode_pos_ayah' => 'required',
            'nama_ibu' => 'required',
            'pendidikan_ibu' => 'required',
            'pekerjaan_ibu' => 'required',
            'alamat_ibu' => 'required',
            'kota_ibu' => 'required',
            'provinsi_ibu' => 'required',
            'kode_pos_ibu' => 'required'
        ]);
        $validator->setAttributeNames($attrs);

        if($validator->fails())
        {   
            $errors = $validator->errors();
            $json_data = [
                'result' => false,
                'form_error' => $errors->all(),
                'message' => ['head' => 'Gagal', 'body' => 'Mohon maaf, ada beberapa form yang harus diisi!'],
                'redirect' => ''
            ];

            return json_encode($json_data); 
            die();
        }

        $dataOrtu = DataOrtu::create([
            'user_id' => $request->user_id,
            'nama_ayah' => $request->nama_ayah,
            'pendidikan_ayah' => $request->pendidikan_ayah,
            'pekerjaan_ayah' => $request->pekerjaan_ayah,
            'gaji_ayah' => $request->gaji_ayah,
            'alamat_ayah' => $request->alamat_ayah,
            'kota_ayah' => $request->kota_ayah,
            'provinsi_ayah' => $request->provinsi_ayah,
            'kode_pos_ayah' => $request->kode_pos_ayah,
            'nama_ibu' => $request->nama_ibu,
            'pendidikan_ibu' => $request->pendidikan_ibu,
            'pekerjaan_ibu' => $request->pekerjaan_ibu,
            'gaji_ibu' => $request->gaji_ibu,
            'alamat_ibu' => $request->alamat_ibu,
            'kota_ibu' => $request->kota_ibu,
            'provinsi_ibu' => $request->provinsi_ibu,
            'kode_pos_ibu' => $request->kode_pos_ibu
        ]);

        if(!$dataOrtu)
        {
            $json_data = [
                'result' => false,
                'form_error' => '',
                'message' => ['head' => 'Gagal', 'body' => 'Ada kesalahan saat memasukkan data. Lakukan beberapa saat lagi!'],
                'redirect' => ''
            ];
            return json_encode($json_data); 
            die();
        }

        $json_data = [
            'result' => true,
            'form_error' => '',
            'message' => ['head' => 'Berhasil', 'body' => 'Berhasil menambahkan data!'],
            'redirect' => '/isi_formulir/3'
        ];

        return json_encode($json_data);
    }

    public function ajax_action_update_data_ortu(Request $request)
    {
        $attrs = [
            'nama_ayah' => 'Nama Ayah',
            'pendidikan_ayah' => 'Pendidikan Ayah',
            'pekerjaan_ayah' => 'Pekerjaan Ayah',
            'gaji_ayah' => 'Gaji Ayah',
            'alamat_ayah' => 'Alamat Ayah',
            'kota_ayah' => 'Kota Ayah',
            'provinsi_ayah' => 'Provinsi Ayah',
            'kode_pos_ayah' => 'Kode Pos Ayah',
            'nama_ibu' => 'Nama Ibu',
            'pendidikan_ibu' => 'Pendidikan Ibu',
            'pekerjaan_ibu' => 'Pekerjaan Ibu',
            'gaji_ibu' => 'Gaji Ibu',
            'alamat_ibu' => 'Alamat Ibu',
            'kota_ibu' => 'Kota Ibu',
            'provinsi_ibu' => 'Provinsi Ibu',
            'kode_pos_ibu' => 'Kode Pos Ibu'
        ];

        $validator = Validator::make($request->all(), [
            'user_id' => [
                'required',
                Rule::unique('table_data_ortu')->ignore($request->id)
            ],
            'nama_ayah' => 'required',
            'pendidikan_ayah' => 'required',
            'pekerjaan_ayah' => 'required',
            'gaji_ayah' => 'required',
            'alamat_ayah' => 'required',
            'kota_ayah' => 'required',
            'provinsi_ayah' => 'required',
            'kode_pos_ayah' => 'required',
            'nama_ibu' => 'required',
            'pendidikan_ibu' => 'required',
            'pekerjaan_ibu' => 'required',
            'alamat_ibu' => 'required',
            'kota_ibu' => 'required',
            'provinsi_ibu' => 'required',
            'kode_pos_ibu' => 'required'
        ]);
        $validator->setAttributeNames($attrs);

        if($validator->fails())
        {   
            $errors = $validator->errors();
            $json_data = [
                'result' => false,
                'form_error' => $errors->all(),
                'message' => ['head' => 'Gagal', 'body' => 'Mohon maaf, ada beberapa form yang harus diisi!'],
                'redirect' => ''
            ];

            return json_encode($json_data); 
            die();
        }

        $dataOrtu = DataOrtu::find($request->id);
        $dataOrtu->user_id = $request->user_id;
        $dataOrtu->nama_ayah = $request->nama_ayah;
        $dataOrtu->pendidikan_ayah = $request->pendidikan_ayah;
        $dataOrtu->pekerjaan_ayah = $request->pekerjaan_ayah;
        $dataOrtu->gaji_ayah = $request->gaji_ayah;
        $dataOrtu->alamat_ayah = $request->alamat_ayah;
        $dataOrtu->kota_ayah = $request->kota_ayah;
        $dataOrtu->provinsi_ayah = $request->provinsi_ayah;
        $dataOrtu->kode_pos_ayah = $request->kode_pos_ayah;
        $dataOrtu->nama_ibu = $request->nama_ibu;
        $dataOrtu->pendidikan_ibu = $request->pendidikan_ibu;
        $dataOrtu->pekerjaan_ibu = $request->pekerjaan_ibu;
        $dataOrtu->gaji_ibu = $request->gaji_ibu;
        $dataOrtu->alamat_ibu = $request->alamat_ibu;
        $dataOrtu->kota_ibu = $request->kota_ibu;
        $dataOrtu->provinsi_ibu = $request->provinsi_ibu;
        $dataOrtu->kode_pos_ibu = $request->kode_pos_ibu;
        $dataOrtu->save();

        if(!$dataOrtu)
        {
            $json_data = [
                'result' => false,
                'form_error' => '',
                'message' => ['head' => 'Gagal', 'body' => 'Ada kesalahan saat mengubah data. Lakukan beberapa saat lagi!'],
                'redirect' => ''
            ];
            return json_encode($json_data); 
            die();
        }

        $json_data = [
            'result' => true,
            'form_error' => '',
            'message' => ['head' => 'Berhasil', 'body' => 'Berhasil mengubah data!'],
            'redirect' => '/isi_formulir/3'
        ];

        return json_encode($json_data);
    }

    public function transkripNilaiView()
    {
        $check_step = DataOrtu::where('user_id', Auth::user()->id)->count();
        if($check_step == 0)
            return redirect('isi_formulir/3');

        $data['data'] = Nilai::where('user_id', Auth::user()->id)->first();
        $data['user_data'] = User::find(Auth::user()->id);
        $data['count'] = Nilai::where('user_id', Auth::user()->id)->get();

        return view('formulir.transkrip_nilai', $data);
    }

    public function ajax_action_add_nilai(Request $request)
    {
        $attrs = [
            'matematika' => 'Matematika',
            'bahasa_indonesia' => 'Bahasa Indonesia',
            'bahasa_inggris' => 'Bahasa Inggris',
            'ipa' => 'IPA',
            'semester_1' => 'Semester 1',
            'semester_2' => 'Semester 2',
            'semester_3' => 'Semester 3',
            'semester_4' => 'Semester 4',
            'semester_5' => 'Semester 5',
            'semester_6' => 'Semester 6'
        ];

        $validator = Validator::make($request->all(), [
            'user_id' => [
                'required',
                Rule::unique('table_nilai')
            ],
            'matematika' => 'required|numeric',
            'bahasa_indonesia' => 'required|numeric',
            'bahasa_inggris' => 'required|numeric',
            'ipa' => 'required|numeric',
            'semester_1' => 'required|numeric',
            'semester_2' => 'required|numeric',
            'semester_3' => 'required|numeric',
            'semester_4' => 'required|numeric',
            'semester_5' => 'required|numeric',
            'semester_6' => 'required|numeric'
        ]);
        $validator->setAttributeNames($attrs);

        if($validator->fails())
        {   
            $errors = $validator->errors();
            $json_data = [
                'result' => false,
                'form_error' => $errors->all(),
                'message' => ['head' => 'Gagal', 'body' => 'Mohon maaf, ada beberapa form yang harus diisi!'],
                'redirect' => ''
            ];

            return json_encode($json_data); 
            die();
        }

        $nilai = Nilai::create([
            'user_id' => $request->user_id,
            'matematika' => $request->matematika,
            'bahasa_indonesia' => $request->bahasa_indonesia,
            'bahasa_inggris' => $request->bahasa_inggris,
            'ipa' => $request->ipa,
            'semester_1' => $request->semester_1,
            'semester_2' => $request->semester_2,
            'semester_3' => $request->semester_3,
            'semester_4' => $request->semester_4,
            'semester_5' => $request->semester_5,
            'semester_6' => $request->semester_6
        ]);

        if(!$nilai)
        {
            $json_data = [
                'result' => false,
                'form_error' => '',
                'message' => ['head' => 'Gagal', 'body' => 'Ada kesalahan saat memasukkan data. Lakukan beberapa saat lagi!'],
                'redirect' => ''
            ];
            return json_encode($json_data); 
            die();
        }

        $json_data = [
            'result' => true,
            'form_error' => '',
            'message' => ['head' => 'Berhasil', 'body' => 'Berhasil menambahkan data!'],
            'redirect' => '/isi_formulir/4'
        ];

        return json_encode($json_data);
    }

    public function ajax_action_update_nilai(Request $request)
    {
        $attrs = [
            'matematika' => 'Matematika',
            'bahasa_indonesia' => 'Bahasa Indonesia',
            'bahasa_inggris' => 'Bahasa Inggris',
            'ipa' => 'IPA',
            'semester_1' => 'Semester 1',
            'semester_2' => 'Semester 2',
            'semester_3' => 'Semester 3',
            'semester_4' => 'Semester 4',
            'semester_5' => 'Semester 5',
            'semester_6' => 'Semester 6'
        ];

        $validator = Validator::make($request->all(), [
            'user_id' => [
                'required',
                Rule::unique('table_nilai')->ignore($request->id)
            ],
            'matematika' => 'required|numeric',
            'bahasa_indonesia' => 'required|numeric',
            'bahasa_inggris' => 'required|numeric',
            'ipa' => 'required|numeric',
            'semester_1' => 'required|numeric',
            'semester_2' => 'required|numeric',
            'semester_3' => 'required|numeric',
            'semester_4' => 'required|numeric',
            'semester_5' => 'required|numeric',
            'semester_6' => 'required|numeric'
        ]);
        $validator->setAttributeNames($attrs);

        if($validator->fails())
        {   
            $errors = $validator->errors();
            $json_data = [
                'result' => false,
                'form_error' => $errors->all(),
                'message' => ['head' => 'Gagal', 'body' => 'Mohon maaf, ada beberapa form yang harus diisi!'],
                'redirect' => ''
            ];

            return json_encode($json_data); 
            die();
        }

        $nilai = Nilai::find($request->id);
        $nilai->matematika = $request->matematika;
        $nilai->bahasa_indonesia = $request->bahasa_indonesia;
        $nilai->bahasa_inggris = $request->bahasa_inggris;
        $nilai->ipa = $request->ipa;
        $nilai->semester_1 = $request->semester_1;
        $nilai->semester_2 = $request->semester_2;
        $nilai->semester_3 = $request->semester_3;
        $nilai->semester_4 = $request->semester_4;
        $nilai->semester_5 = $request->semester_5;
        $nilai->semester_6 = $request->semester_6;
        $nilai->save();

        if(!$nilai)
        {
            $json_data = [
                'result' => false,
                'form_error' => '',
                'message' => ['head' => 'Gagal', 'body' => 'Ada kesalahan saat memasukkan data. Lakukan beberapa saat lagi!'],
                'redirect' => ''
            ];
            return json_encode($json_data); 
            die();
        }

        $json_data = [
            'result' => true,
            'form_error' => '',
            'message' => ['head' => 'Berhasil', 'body' => 'Berhasil mengubah data!'],
            'redirect' => '/isi_formulir/4'
        ];

        return json_encode($json_data);
    }

    public function dokumenPendukung()
    {
        $check_step = Nilai::where('user_id', Auth::user()->id)->count();
        if($check_step == 0)
            return redirect('isi_formulir/4');

        $data['data'] = DokumenPendukung::where('user_id', Auth::user()->id)->first();
        $data['user_data'] = User::find(Auth::user()->id);
        $data['count'] = DokumenPendukung::where('user_id', Auth::user()->id)->get();

        return view('formulir.dokumen_pendukung', $data);
    }

    private function upload_file($file, $username, $file_type)
    {
        $imageName = $file_type.'.'.$file->getClientOriginalExtension();  
        $save = $file->move(public_path('/uploads/'.$username.'/'), $imageName);
        if(!$save)
        {
           return false;
        }else{
            return true;
        }
    }

    public function ajax_action_dokumen_pendukung(Request $request)
    {
        $attrs = [
            'foto' => 'Foto',
            'kk' => 'Kartu Keluarga',
            'scan_raport' => 'Scan Raport',
            'ijazah' => 'Ijazah'
        ];

        $validator = Validator::make($request->all(), [
            'foto' => 'mimes:jpeg,bmp,png|max:2000|image|required',
            'kk' => 'mimes:jpeg,bmp,png,pdf|max:2000|required',
            'scan_raport' => 'mimes:jpeg,bmp,png,pdf|max:2000|required',
            'ijazah' => 'mimes:jpeg,bmp,png,pdf|max:2000|required'
        ]);
        $validator->setAttributeNames($attrs);

        if($validator->fails())
        {
            $errors = $validator->errors();
            $json_data = [
                'return' => false,
                'form_error' => $errors->all(),
                'message' => ['head' => 'Gagal', 'body' => 'Mohon maaf, ada beberapa form yang harus diisi!'],
                'redirect' => ''
            ];

            return json_encode($json_data);
            die();
        }

        //PROCESS UPLOAD FOTO
        $fotoName = '';
        if ($request->hasFile('foto')) {
            $file = $request->file('foto');
            $upload_image = $this->upload_file($file, Auth::user()->username, 'foto');
            if($upload_image == false)
            {
                $json_data = [
                    'result' => false,
                    'form_error' => '',
                    'message' => ['head' => 'Gagal', 'body' => 'Mohon maaf, ada kesalahan saat mengupload gambar!'],
                    'redirect' => ''
                ];
                return json_encode($json_data);
                die();
            }
            $fotoName = 'foto.'.$file->getClientOriginalExtension();  
        }else{
            $fotoName = '';  
        }

        //PROCESS UPLOAD KK
        $kkName = '';
        if ($request->hasFile('kk')) {
            $file = $request->file('kk');
            $upload_image = $this->upload_file($file, Auth::user()->username, 'kk');
            if($upload_image == false)
            {
                $json_data = [
                    'result' => false,
                    'form_error' => '',
                    'message' => ['head' => 'Gagal', 'body' => 'Mohon maaf, ada kesalahan saat mengupload gambar!'],
                    'redirect' => ''
                ];
                return json_encode($json_data);
                die();
            }
            $kkName = 'kk.'.$file->getClientOriginalExtension();  
        }else{
            $kkName = '';  
        }

        //PROCESS UPLOAD SCAN RAPOT
        $scanRaportName = '';
        if ($request->hasFile('scan_raport')) {
            $file = $request->file('scan_raport');
            $upload_image = $this->upload_file($file, Auth::user()->username, 'scan_raport');
            if($upload_image == false)
            {
                $json_data = [
                    'result' => false,
                    'form_error' => '',
                    'message' => ['head' => 'Gagal', 'body' => 'Mohon maaf, ada kesalahan saat mengupload gambar!'],
                    'redirect' => ''
                ];
                return json_encode($json_data);
                die();
            }
            $scanRaportName = 'scan_raport.'.$file->getClientOriginalExtension();  
        }else{
            $scanRaportName = '';  
        }

        //PROCESS UPLOAD SCAN IJAZAH
        $ijazahName = '';
        if ($request->hasFile('ijazah')) {
            $file = $request->file('ijazah');
            $upload_image = $this->upload_file($file, Auth::user()->username, 'ijazah');
            if($upload_image == false)
            {
                $json_data = [
                    'result' => false,
                    'form_error' => '',
                    'message' => ['head' => 'Gagal', 'body' => 'Mohon maaf, ada kesalahan saat mengupload gambar!'],
                    'redirect' => ''
                ];
                return json_encode($json_data);
                die();
            }
            $ijazahName = 'ijazah.'.$file->getClientOriginalExtension();  
        }else{
            $ijazahName = '';  
        }

        $dokumenPendukung = DokumenPendukung::create([
            'user_id' => Auth::user()->id,
            'foto' => $fotoName,
            'kk' => $kkName,
            'scan_raport' => $scanRaportName,
            'ijazah' => $ijazahName
        ]);

        if(!$dokumenPendukung)
        {
            $json_data = [
                'result' => false,
                'form_error' => '',
                'message' => ['head' => 'Gagal', 'body' => 'Ada kesalahan saat menambahkan data. Mohon lakukan beberapa saat lagi!'],
                'redirect' => ''
            ];

            return json_encode($json_data);
            die();
        }

        $json_data = [
            'result' => true,
            'form_error' => '',
            'message' => ['head' => 'Berhasil', 'body' => 'Berhasil menambahkan data dokumen!'],
            'redirect' => '/isi_formulir/6'
        ];

        return json_encode($json_data);
    }

    public function ajax_action_update_dokumen_pendukung(Request $request)
    {
        $attrs = [
            'foto' => 'Foto',
            'kk' => 'Kartu Keluarga',
            'scan_raport' => 'Scan Raport',
            'ijazah' => 'Ijazah'
        ];

        $validator = Validator::make($request->all(), [
            'foto' => 'mimes:jpeg,bmp,png|max:2000|image|required',
            'kk' => 'mimes:jpeg,bmp,png,pdf|max:2000|required',
            'scan_raport' => 'mimes:jpeg,bmp,png,pdf|max:2000|required',
            'ijazah' => 'mimes:jpeg,bmp,png,pdf|max:2000|required'
        ]);
        $validator->setAttributeNames($attrs);

        if($validator->fails())
        {
            $errors = $validator->errors();
            $json_data = [
                'return' => false,
                'form_error' => $errors->all(),
                'message' => ['head' => 'Gagal', 'body' => 'Mohon maaf, ada beberapa form yang harus diisi!'],
                'redirect' => ''
            ];

            return json_encode($json_data);
            die();
        }

        //PROCESS UPLOAD FOTO
        $fotoName = '';
        if ($request->hasFile('foto')) {
            $file = $request->file('foto');
            $upload_image = $this->upload_file($file, Auth::user()->username, 'foto');
            if($upload_image == false)
            {
                $json_data = [
                    'result' => false,
                    'form_error' => '',
                    'message' => ['head' => 'Gagal', 'body' => 'Mohon maaf, ada kesalahan saat mengupload gambar!'],
                    'redirect' => ''
                ];
                return json_encode($json_data);
                die();
            }
            $fotoName = 'foto.'.$file->getClientOriginalExtension();  
        }else{
            $fotoName = '';  
        }

        //PROCESS UPLOAD KK
        $kkName = '';
        if ($request->hasFile('kk')) {
            $file = $request->file('kk');
            $upload_image = $this->upload_file($file, Auth::user()->username, 'kk');
            if($upload_image == false)
            {
                $json_data = [
                    'result' => false,
                    'form_error' => '',
                    'message' => ['head' => 'Gagal', 'body' => 'Mohon maaf, ada kesalahan saat mengupload gambar!'],
                    'redirect' => ''
                ];
                return json_encode($json_data);
                die();
            }
            $kkName = 'kk.'.$file->getClientOriginalExtension();  
        }else{
            $kkName = '';  
        }

        //PROCESS UPLOAD SCAN RAPOT
        $scanRaportName = '';
        if ($request->hasFile('scan_raport')) {
            $file = $request->file('scan_raport');
            $upload_image = $this->upload_file($file, Auth::user()->username, 'scan_raport');
            if($upload_image == false)
            {
                $json_data = [
                    'result' => false,
                    'form_error' => '',
                    'message' => ['head' => 'Gagal', 'body' => 'Mohon maaf, ada kesalahan saat mengupload gambar!'],
                    'redirect' => ''
                ];
                return json_encode($json_data);
                die();
            }
            $scanRaportName = 'scan_raport.'.$file->getClientOriginalExtension();  
        }else{
            $scanRaportName = '';  
        }

        //PROCESS UPLOAD SCAN IJAZAH
        $ijazahName = '';
        if ($request->hasFile('ijazah')) {
            $file = $request->file('ijazah');
            $upload_image = $this->upload_file($file, Auth::user()->username, 'ijazah');
            if($upload_image == false)
            {
                $json_data = [
                    'result' => false,
                    'form_error' => '',
                    'message' => ['head' => 'Gagal', 'body' => 'Mohon maaf, ada kesalahan saat mengupload gambar!'],
                    'redirect' => ''
                ];
                return json_encode($json_data);
                die();
            }
            $ijazahName = 'ijazah.'.$file->getClientOriginalExtension();  
        }else{
            $ijazahName = '';  
        }

        $dokumenPendukung = DokumenPendukung::find($request->id);
        $dokumenPendukung->foto = $fotoName;
        $dokumenPendukung->kk = $kkName;
        $dokumenPendukung->scan_raport = $scanRaportName;
        $dokumenPendukung->ijazah = $ijazahName;
        $dokumenPendukung->save();

        // $dokumenPendukung = DokumenPendukung::create([
        //     'user_id' => Auth::user()->id,
        //     'foto' => $fotoName,
        //     'kk' => $kkName,
        //     'scan_raport' => $scanRaportName,
        //     'ijazah' => $ijazahName
        // ]);

        if(!$dokumenPendukung)
        {
            $json_data = [
                'result' => false,
                'form_error' => '',
                'message' => ['head' => 'Gagal', 'body' => 'Ada kesalahan saat menambahkan data. Mohon lakukan beberapa saat lagi!'],
                'redirect' => ''
            ];

            return json_encode($json_data);
            die();
        }

        $json_data = [
            'result' => true,
            'form_error' => '',
            'message' => ['head' => 'Berhasil', 'body' => 'Berhasil merubah data dokumen!'],
            'redirect' => '/isi_formulir/6'
        ];

        return json_encode($json_data);
    }

    public function simpanPermanen()
    {
        $check_step = DokumenPendukung::where('user_id', Auth::user()->id)->count();
        if($check_step == 0)
            return redirect('isi_formulir/5');

        return view('formulir.simpan_permanen');
    }
}
