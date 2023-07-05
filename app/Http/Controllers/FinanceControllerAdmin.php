<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\FinanceModel;
use App\Models\UsersModel;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class FinanceControllerAdmin extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */    
    public function index()
    {   
        $pgw =  DB::table('finance')->get();
        return view('pages/admin/finance/index',['pgw' => $pgw]);
    }

	
    public function tambah(){
		$kode = FinanceModel::kode();
        return view('pages/admin/finance/tambah', ['kode'=>$kode]);
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
	DB::table('finance')->insert([
		'ID_Finance' => $request->id_finance,
		'Nama_Finance' => $request->nama_finance,
		'Tempat_Lahir_Finance' => $request->tempat_lahir,
		'Tanggal_Lahir_Finance' => $request->tanggal_lahir,
		'Jenis_Kelamin_Finance' => $request->jenis_kelamin,
		'Alamat_Finance' => $request->alamat_finance,
		'Nomor_Telepon_Finance' => $request->telepon_finance,
	]);

	DB::table('users')->insert([
		'ID_Finance' => $request->id_finance,
		'Username' => $request->username,
		'Password' => $request->password,
		'ID_User_Roles' => '2'
	]);

	// alihkan halaman ke halaman outlet
	return redirect('/admin/finance/')->withSuccess('Data berhasil disimpan');
    }

    public function edit($id)
	{
		// mengambil data keberangkatan berdasarkan id yang dipilih
		$pgw = DB::table('users')
        ->join('finance', 'finance.ID_Finance', '=', 'users.ID_Finance')
		->where('users.ID_Finance',$id)
		->get();
		// passing data keberangkatan yang didapat ke view edit.blade.php
		return view('pages/admin/finance/edit',['pgw' => $pgw]);
	}

	public function detail($id)
	{
		// mengambil data keberangkatan berdasarkan id yang dipilih
		$pgw = DB::table('users')
        ->join('finance', 'finance.ID_Finance', '=', 'users.ID_Finance')
		->where('users.ID_Finance',$id)
		->get();
		// passing data keberangkatan yang didapat ke view edit.blade.php
		return view('pages/admin/finance/detail',['pgw' => $pgw]);
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
            DB::table('finance')->where('ID_Finance',$request->id_finance)->update([
                'Nama_Finance' => $request->nama_finance,
                'Tempat_Lahir_Finance' => $request->tempat_lahir,
                'Tanggal_Lahir_Finance' => $request->tanggal_lahir,
                'Jenis_Kelamin_Finance' => $request->jenis_kelamin,
                'Alamat_Finance' => $request->alamat_finance,
                'Nomor_Telepon_Finance' => $request->telepon_finance,
            ]);
	
			DB::table('users')->where('ID_Finance',$request->id_finance)->update([
				'Username' => $request->username,
				'Password' => $request->password,
			]);
	
			// Alihkan halaman ke halaman mahasiswa
			return redirect('/admin/finance')->withSuccess('Data berhasil diperbaharui');
		}
		return redirect()->back()->withErrors(['Username' => 'Username tidak ditemukan']);
    }

	public function hapus($id){
   
        // Menghapus data outlet dari tabel
        DB::table('finance')->where('ID_Finance', $id)->delete();
		DB::table('users')->where('ID_Finance',$id)->delete();
		// Alihkan halaman ke halaman outlet jika tidak ada data outlet dengan ID tersebut
		return redirect('/admin/finance')->withDanger('Data outlet tidak ditemukan');
	}

	
}