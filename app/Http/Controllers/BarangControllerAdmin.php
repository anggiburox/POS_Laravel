<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\BarangModel;
use App\Models\LeaderModel;
use Illuminate\Support\Facades\DB;

class BarangControllerAdmin extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */    
    public function index()
    {   
        $pgw = BarangModel::get();
        return view('pages/admin/barang/index',['pgw' => $pgw]);
    }

	
    public function tambah(){
		$kode = BarangModel::kode();
        return view('pages/admin/barang/tambah', ['kode'=>$kode]);
    }

    public function store(Request $request){

	// insert data ke table barang
	DB::table('barang')->insert([
		'ID_Barang' => $request->id_barang,
		'Nama_Barang' => $request->nama_barang,
	]);

	// alihkan halaman ke halaman barang
	return redirect('/admin/barang/')->withSuccess('Data berhasil disimpan');
    }

    public function edit($id)
	{
		// mengambil data keberangkatan berdasarkan id yang dipilih
		$pgw = DB::table('barang')
		->where('ID_Barang',$id)
		->get();
		// passing data keberangkatan yang didapat ke view edit.blade.php
		return view('pages/admin/barang/edit',['pgw' => $pgw]);
	}

	// update data barang
	public function update(Request $request){
		// update data barang
		DB::table('barang')->where('ID_Barang',$request->id_barang)->update([
			'Nama_barang' => $request->nama_barang,
        ]);
		
		
		// alihkan halaman ke halaman barang
		return redirect('/admin/barang')->withSuccess('Data berhasil diperbaharui');
    }

	public function hapus($id){
   
        // Menghapus data barang dari tabel
        DB::table('barang')->where('ID_barang', $id)->delete();
		// Alihkan halaman ke halaman barang jika tidak ada data barang dengan ID tersebut
		return redirect('/admin/barang')->withDanger('Data barang tidak ditemukan');
	}

	
}