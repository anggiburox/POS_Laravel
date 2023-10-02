<?php

namespace App\Http\Controllers;

use App\Models\BarangModel;
use Illuminate\Http\Request;
use App\Models\RekaPemasukanModel;
use App\Models\OutletModel;
use App\Models\PembayaranModel;
use App\Models\RekapPengeluaranModel;
use App\Models\RekapJenisLayananModel;
use App\Models\DetailRekapPemasukanModel;
use Illuminate\Support\Facades\DB;
use Dompdf\Dompdf;
use Illuminate\Support\Facades\View;

class RekapPengeluaranControllersAdmin extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */    
    public function index()
    {   
        $pgw = RekapPengeluaranModel::IndexJoin();
        return view('pages/admin/rekap_pengeluaran/index',['pgw' => $pgw]);
    }

	
    public function tambah(){
		$kode = RekapPengeluaranModel::kode();
		$pemasukan = RekaPemasukanModel::JoinOutletLeaderPemasukan();
        return view('pages/admin/rekap_pengeluaran/tambah', ['kode'=>$kode,'pemasukan'=>$pemasukan]);
    }

    public function store(Request $request){


		$arrayPengeluaran = $request->pengeluaran;
		$jsonArrayPengeluaran = json_encode($arrayPengeluaran);
		
		DB::table('rekap_pengeluaran')->insert([
			'ID_Rekap_Pengeluaran' => $request->id_rekap_pengeluaran,
			'ID_Pemasukan' => $request->id_pemasukan,
			'Tanggal_Pengeluaran' => $request->tanggal_pengeluaran,
			'Pengeluaran' => $jsonArrayPengeluaran,
		]);


	// alihkan halaman ke halaman rekap_pengeluaran
	return redirect('/admin/rekap_pengeluaran/')->withSuccess('Data berhasil disimpan');
    }

    public function edit($id)
	{
		// mengambil data keberangkatan berdasarkan id yang dipilih
		$pgw = DB::table('rekap_pengeluaran')
		->where('ID_Rekap_Pengeluaran',$id)
		->get();
		$pemasukan = RekaPemasukanModel::JoinOutletLeaderPemasukan();
		
		$Pengeluaran = $pgw[0]->Pengeluaran;

		$ListPengeluaran=json_decode($Pengeluaran);
		// passing data keberangkatan yang didapat ke view edit.blade.php
		return view('pages/admin/rekap_pengeluaran/edit',['pgw' => $pgw, 'pemasukan'=>$pemasukan, 'ListPengeluaran'=>$ListPengeluaran]);
	}

	// update data rekap_pengeluaran
	public function update(Request $request){

		$arrayPengeluaran = $request->pengeluaran;
		$jsonArrayPengeluaran = json_encode($arrayPengeluaran);
		
		DB::table('rekap_pengeluaran')->where('ID_Rekap_Pengeluaran',$request->id_rekap_pengeluaran)->update([
			'ID_Pemasukan' => $request->id_pemasukan,
			'Tanggal_Pengeluaran' => $request->tanggal_pengeluaran,
			'Pengeluaran' => $jsonArrayPengeluaran,
		]);
	
		// alihkan halaman ke halaman rekap_pengeluaran
		return redirect('/admin/rekap_pengeluaran')->withSuccess('Data berhasil diperbaharui');
    }

	public function cetak($ID_Rekap_Pengeluaran)
{
	$pgw =  DB::table('rekap_pengeluaran')
    ->join('rekap_pemasukan','rekap_pemasukan.ID_Pemasukan','=','rekap_pengeluaran.ID_Pemasukan')
    ->join('outlet','outlet.ID_Outlet','=','rekap_pemasukan.ID_Outlet')
    ->join('leader_outlet','leader_outlet.ID_Leader','=','outlet.ID_Leader')
    ->where('rekap_pengeluaran.ID_Rekap_Pengeluaran',$ID_Rekap_Pengeluaran)
    ->get();

	
	$Pengeluaran = $pgw[0]->Pengeluaran;
	$ListPengeluaran=json_decode($Pengeluaran);

	return view('pages/admin/rekap_pengeluaran/laporan', ['pgw' => $pgw,'ListPengeluaran'=>$ListPengeluaran]);

}

	public function hapus($id){
   
        // Menghapus data rekap_pengeluaran dari tabel
        DB::table('rekap_pengeluaran')->where('ID_Rekap_Pengeluaran', $id)->delete();
		// Alihkan halaman ke halaman rekap_pengeluaran jika tidak ada data rekap_pengeluaran dengan ID tersebut
		return redirect('/admin/rekap_pengeluaran')->withDanger('Data rekap_pengeluaran tidak ditemukan');
	}

	
}