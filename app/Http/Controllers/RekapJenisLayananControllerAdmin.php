<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\RekapJenisLayananModel;
use Illuminate\Support\Facades\DB;

class RekapJenisLayananControllerAdmin extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */    
    public function index()
    {   
        $pgw = RekapJenisLayananModel::get();
        return view('pages/admin/rekap_jenis_layanan/index',['pgw' => $pgw]);
    }

	
    public function tambah(){
		$kode = RekapJenisLayananModel::kode();
        return view('pages/admin/rekap_jenis_layanan/tambah', ['kode'=>$kode]);
    }

    public function store(Request $request){

	// insert data ke table jenis_layanan
	DB::table('rekap_jenis_layanan')->insert([
		'ID_Jenis_Layanan' => $request->id_jenis_layanan,
		'Nama_Layanan' => $request->nama_layanan,
	]);

	// alihkan halaman ke halaman jenis_layanan
	return redirect('/admin/rekap_jenis_layanan/')->withSuccess('Data berhasil disimpan');
    }

    public function edit($id)
	{
		// mengambil data keberangkatan berdasarkan id yang dipilih
		$pgw = DB::table('rekap_jenis_layanan')
		->where('ID_Jenis_Layanan',$id)
		->get();
		// passing data keberangkatan yang didapat ke view edit.blade.php
		return view('pages/admin/rekap_jenis_layanan/edit',['pgw' => $pgw]);
	}

	// update data jenis_layanan
	public function update(Request $request){
		// update data jenis_layanan
		DB::table('rekap_jenis_layanan')->where('ID_Jenis_Layanan',$request->id_jenis_layanan)->update([
			'Nama_Layanan' => $request->nama_layanan,
        ]);
		
		
		// alihkan halaman ke halaman jenis_layanan
		return redirect('/admin/rekap_jenis_layanan')->withSuccess('Data berhasil diperbaharui');
    }

	public function hapus($id){
   
        // Menghapus data jenis_layanan dari tabel
        DB::table('rekap_jenis_layanan')->where('ID_Jenis_Layanan', $id)->delete();
		// Alihkan halaman ke halaman jenis_layanan jika tidak ada data jenis_layanan dengan ID tersebut
		return redirect('/admin/rekap_jenis_layanan')->withDanger('Data jenis_layanan tidak ditemukan');
	}

	
}