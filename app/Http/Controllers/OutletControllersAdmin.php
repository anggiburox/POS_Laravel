<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\OutletModel;
use App\Models\LeaderModel;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\File;

class OutletControllersAdmin extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */    
    public function index()
    {   
        $pgw = OutletModel::JoinOutletLeader();
        return view('pages/admin/outlet/index',['pgw' => $pgw]);
    }

	
    public function tambah(){
		$kode = OutletModel::kode();
		$pgw = LeaderModel::get();
        return view('pages/admin/outlet/tambah', ['kode'=>$kode,'pgw'=>$pgw]);
    }

    public function store(Request $request){

	// insert data ke table outlet
	DB::table('outlet')->insert([
		'ID_Outlet' => $request->id_outlet,
		'ID_Leader' => $request->id_leader,
		'Nama_Outlet' => $request->nama_outlet,
		'Alamat_Outlet' => $request->alamat_outlet,
	]);

	// alihkan halaman ke halaman outlet
	return redirect('/admin/outlet/')->withSuccess('Data berhasil disimpan');
    }

    public function edit($id)
	{
		// mengambil data keberangkatan berdasarkan id yang dipilih
		$pgw = DB::table('outlet')
		->where('ID_Outlet',$id)
		->get();
		$leader = LeaderModel::get();
		// passing data keberangkatan yang didapat ke view edit.blade.php
		return view('pages/admin/outlet/edit',['pgw' => $pgw, 'leader'=>$leader]);
	}

	// update data outlet
	public function update(Request $request){
		// update data outlet
		DB::table('outlet')->where('ID_Outlet',$request->id_outlet)->update([
			'ID_Leader' => $request->id_leader,
			'Nama_Outlet' => $request->nama_outlet,
			'Alamat_Outlet' => $request->alamat_outlet,
        ]);
		
		
		// alihkan halaman ke halaman outlet
		return redirect('/admin/outlet')->withSuccess('Data berhasil diperbaharui');
    }

	public function hapus($id){
   
        // Menghapus data outlet dari tabel
        DB::table('outlet')->where('ID_Outlet', $id)->delete();
		// Alihkan halaman ke halaman outlet jika tidak ada data outlet dengan ID tersebut
		return redirect('/admin/outlet')->withDanger('Data outlet tidak ditemukan');
	}

	
}