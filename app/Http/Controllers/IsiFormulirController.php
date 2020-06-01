<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;
use Illuminate\Http\Request;
use App\AsalSekolah;
use App\dataDiri;
use App\DataOrtu;
use DataTables;
use Validator;
use App\User;

class IsiFormulirController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $data['data'] = dataDiri::where('user_id', Auth::user()->id)->first();
        $data['user_data'] = User::find(Auth::user()->id);
        $data['count'] = dataDiri::where('user_id', Auth::user()->id)->get();
        $data['count_asal_sekolah'] = AsalSekolah::where('user_id', Auth::user()->id)->get();
        $data['count_data_ortu'] = DataOrtu::where('user_id', Auth::user()->id)->get();

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
        $data['data'] = AsalSekolah::where('user_id', Auth::user()->id)->first();
        $data['user_data'] = User::find(Auth::user()->id);
        $data['count'] = AsalSekolah::where('user_id', Auth::user()->id)->get();
        $data['count_data_ortu'] = DataOrtu::where('user_id', Auth::user()->id)->get();

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
        $data['data'] = DataOrtu::where('user_id', Auth::user()->id)->first();
        $data['user_data'] = User::find(Auth::user()->id);
        $data['count'] = DataOrtu::where('user_id', Auth::user()->id)->get();

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
        return view('formulir.transkrip_nilai');
    }

    public function dokumenPendukung()
    {
        return view('formulir.dokumen_pendukung');
    }

    public function simpanPermanen()
    {
        return view('formulir.simpan_permanen');
    }
}
