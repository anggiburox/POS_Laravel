<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\LeaderModel;
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

	// alihkan halaman ke halaman outlet
	return redirect('/admin/leader/')->withSuccess('Data berhasil disimpan');
    }

    public function edit($id)
	{
		// mengambil data keberangkatan berdasarkan id yang dipilih
		$pgw = DB::table('leader_outlet')
		->where('ID_Leader',$id)
		->get();
		// passing data keberangkatan yang didapat ke view edit.blade.php
		return view('pages/admin/leader/edit',['pgw' => $pgw]);
	}

	// update data outlet
	public function update(Request $request){
		// update data outlet
		DB::table('leader_outlet')->where('ID_Leader',$request->id_leader)->update([
            'Nama_Leader' => $request->nama_leader,
            'Tempat_Lahir_Leader' => $request->tempat_lahir,
            'Tanggal_Lahir_Leader' => $request->tanggal_lahir,
            'Jenis_Kelamin_Leader' => $request->jenis_kelamin,
            'Alamat_Leader' => $request->alamat_leader,
            'Nomor_Telepon_Leader' => $request->telepon_leader,
        ]);
		
		
		// alihkan halaman ke halaman outlet
		return redirect('/admin/leader')->withSuccess('Data berhasil diperbaharui');
    }

	public function hapus($id){
   
        // Menghapus data outlet dari tabel
        DB::table('leader_outlet')->where('ID_Leader', $id)->delete();
		// Alihkan halaman ke halaman outlet jika tidak ada data outlet dengan ID tersebut
		return redirect('/admin/leader')->withDanger('Data outlet tidak ditemukan');
	}

	
}