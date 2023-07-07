<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\LeaderModel;
use App\Models\UsersModel;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\File;

class LeaderControllersAdmin extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */    
    public function index()
    {   
        $pgw =  DB::table('leader_outlet')->get();
        return view('pages/admin/leader/index',['pgw' => $pgw]);
    }

	
    public function tambah(){
		$kode = LeaderModel::kode();
        return view('pages/admin/leader/tambah', ['kode'=>$kode]);
    }

    public function store(Request $request){
		$validator = Validator::make($request->all(), [
			'username' => 'required|unique:users',
		], [
			'username.unique' => 'Username sudah terdaftar, silahkan masukkan Username lain.',
		]);
	
			// Cek apakah validasi gagal
			if ($validator->fails()) {
				return redirect()->back()
					->withErrors($validator)
					->withInput();
			}
	// insert data ke table outlet
	DB::table('leader_outlet')->insert([
		'ID_Leader' => $request->id_outlet,
		'Nama_Leader' => $request->nama_leader,
		'Tempat_Lahir_Leader' => $request->tempat_lahir,
		'Tanggal_Lahir_Leader' => $request->tanggal_lahir,
		'Jenis_Kelamin_Leader' => $request->jenis_kelamin,
		'Alamat_Leader' => $request->alamat_leader,
		'Nomor_Telepon_Leader' => $request->telepon_leader,
	]);
	
	DB::table('users')->insert([
		'ID_Leader' => $request->id_outlet,
		'Username' => $request->username,
		'Password' => $request->password,
		'ID_User_Roles' => '3'
	]);

	// alihkan halaman ke halaman outlet
	return redirect('/admin/leader/')->withSuccess('Data berhasil disimpan');
    }

    public function edit($id)
	{
		// mengambil data keberangkatan berdasarkan id yang dipilih
		$pgw = DB::table('users')
        ->join('leader_outlet', 'leader_outlet.ID_Leader', '=', 'users.ID_Leader')
		->where('users.ID_Leader',$id)
		->get();
		// passing data keberangkatan yang didapat ke view edit.blade.php
		return view('pages/admin/leader/edit',['pgw' => $pgw]);
	}

	public function detail($id)
	{
		// mengambil data keberangkatan berdasarkan id yang dipilih
		$pgw = DB::table('users')
        ->join('leader_outlet', 'leader_outlet.ID_Leader', '=', 'users.ID_Leader')
		->where('users.ID_Leader',$id)
		->get();
		// passing data keberangkatan yang didapat ke view edit.blade.php
		return view('pages/admin/leader/detail',['pgw' => $pgw]);
	}

	// update data outlet
	public function update(Request $request){
		$m = UsersModel::find($request->id_user);
	
		if($m){
            $username_lama = $m->Username;
            $validatedData = $request->validate([
                'username' => $username_lama == $request->username ? '' : 'unique:users,Username',
            ],[
                'username.unique' => 'Username sudah terdaftar, silahkan masukkan username lain.',
            ]);

			// update data outlet
			DB::table('leader_outlet')->where('ID_Leader',$request->id_leader)->update([
				'Nama_Leader' => $request->nama_leader,
				'Tempat_Lahir_Leader' => $request->tempat_lahir,
				'Tanggal_Lahir_Leader' => $request->tanggal_lahir,
				'Jenis_Kelamin_Leader' => $request->jenis_kelamin,
				'Alamat_Leader' => $request->alamat_leader,
				'Nomor_Telepon_Leader' => $request->telepon_leader,
			]);
	
			DB::table('users')->where('ID_Finance',$request->id_finance)->update([
				'Username' => $request->username,
				'Password' => $request->password,
			]);
	
			// alihkan halaman ke halaman outlet
			return redirect('/admin/leader')->withSuccess('Data berhasil diperbaharui');
		}
		return redirect()->back()->withErrors(['Username' => 'Username tidak ditemukan']);
    }

	public function hapus($id){
   
        // Menghapus data outlet dari tabel
        DB::table('leader_outlet')->where('ID_Leader', $id)->delete();
		DB::table('users')->where('ID_Leader',$id)->delete();
		// Alihkan halaman ke halaman outlet jika tidak ada data outlet dengan ID tersebut
		return redirect('/admin/leader')->withDanger('Data outlet tidak ditemukan');
	}

	
}