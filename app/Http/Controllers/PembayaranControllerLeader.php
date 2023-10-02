<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\PembayaranModel;
use Illuminate\Support\Facades\DB;

class PembayaranControllerLeader extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */    
    public function index()
    {   
        $pgw = PembayaranModel::get();
        return view('pages/leader/pembayaran/index',['pgw' => $pgw]);
    }

	
    public function tambah(){
		$kode = PembayaranModel::kode();
        return view('pages/leader/pembayaran/tambah', ['kode'=>$kode]);
    }

    public function store(Request $request){

	// insert data ke table pembayaran
	DB::table('pembayaran')->insert([
		'ID_Pembayaran' => $request->id_pembayaran,
		'Jenis_Pembayaran' => $request->jenis_pembayaran,
		'No_Rekening' => $request->no_rekening,
		'Pemilik_Rekening' => $request->pemilik_rekening,
	]);

	// alihkan halaman ke halaman pembayaran
	return redirect('/leader/pembayaran/')->withSuccess('Data berhasil disimpan');
    }

    public function edit($id)
	{
		// mengambil data keberangkatan berdasarkan id yang dipilih
		$pgw = DB::table('pembayaran')
		->where('ID_Pembayaran',$id)
		->get();
		// passing data keberangkatan yang didapat ke view edit.blade.php
		return view('pages/leader/pembayaran/edit',['pgw' => $pgw]);
	}

	// update data pembayaran
	public function update(Request $request){
		// update data pembayaran
		DB::table('pembayaran')->where('ID_Pembayaran',$request->id_pembayaran)->update([
			'Jenis_Pembayaran' => $request->jenis_pembayaran,
			'No_Rekening' => $request->no_rekening,
			'Pemilik_Rekening' => $request->pemilik_rekening,
        ]);
		
		
		// alihkan halaman ke halaman pembayaran
		return redirect('/leader/pembayaran')->withSuccess('Data berhasil diperbaharui');
    }

	public function hapus($id){
   
        // Menghapus data pembayaran dari tabel
        DB::table('pembayaran')->where('ID_Pembayaran', $id)->delete();
		// Alihkan halaman ke halaman pembayaran jika tidak ada data pembayaran dengan ID tersebut
		return redirect('/leader/pembayaran')->withDanger('Data pembayaran tidak ditemukan');
	}

	
}