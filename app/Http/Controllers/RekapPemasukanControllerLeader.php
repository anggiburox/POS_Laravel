<?php

namespace App\Http\Controllers;

use App\Models\BarangModel;
use Illuminate\Http\Request;
use App\Models\RekaPemasukanModel;
use App\Models\OutletModel;
use App\Models\PembayaranModel;
use App\Models\RekapJenisLayananModel;
use App\Models\DetailRekapPemasukanModel;
use Illuminate\Support\Facades\DB;
use Dompdf\Dompdf;
use Illuminate\Support\Facades\View;

class RekapPemasukanControllerLeader extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */    
    public function index()
    {   
		$namaLeader = session()->get('nama_leader');
        $leader = OutletModel::LeaderSession($namaLeader);
    
        if ($leader) {
            $pgw = RekaPemasukanModel::IndexJoinSession($leader->ID_Leader);
        }

        return view('pages/leader/rekap_pemasukan/index',['pgw' => $pgw]);
    }

	
    public function tambah(){
		$kode = RekaPemasukanModel::kode();

		$namaLeader = session()->get('nama_leader');
        $leader = OutletModel::LeaderSession($namaLeader);
    
        if ($leader) {
            $outlet = OutletModel::JoinOutletLeaderSession($leader->ID_Leader);
        }

		$barang = BarangModel::get();
		$jenis_layanan = RekapJenisLayananModel::get();
		$jenis_pembayaran = PembayaranModel::get();
        return view('pages/leader/rekap_pemasukan/tambah', ['kode'=>$kode,'outlet'=>$outlet,'barang'=>$barang, 'jenis_layanan'=>$jenis_layanan, 'jenis_pembayaran'=>$jenis_pembayaran]);
    }

    public function store(Request $request){

	// insert data ke table rekap_pemasukan
	DB::table('rekap_pemasukan')->insert([
		'ID_Pemasukan' => $request->id_pemasukan,
		'Tanggal_Pemasukan' => $request->tanggal_pemasukan,
		'ID_Outlet' => $request->id_outlet,
		'ID_Pembayaran' => $request->id_pembayaran,
		'Total_Pemasukan' => $request->total_pemasukan,
	]);


	
	$id_layanan = $request->id_layanan;
	$id_barang = $request->id_barang;
	$pcs = $request->pcs;
	$qty = $request->qty;
	$harga = $request->harga;
	$id_pemasukan = $request->id_pemasukan;

	foreach ($id_barang as $key  => $value) {
            
		$detail = new DetailRekapPemasukanModel();
		$detail->ID_Pemasukan = $request->id_pemasukan; 
		$detail->ID_Jenis_Layanan = $id_layanan[$key]; 
		$detail->ID_Barang = $id_barang[$key];
		$detail->PCS = $pcs[$key];
		$detail->QTY = $qty[$key];
		$detail->Harga_Barang = $harga[$key];
		$detail->save();
		
	}
	

	// alihkan halaman ke halaman rekap_pemasukan
	return redirect('/leader/rekap_pemasukan/')->withSuccess('Data berhasil disimpan');
    }

    public function edit($id)
	{
		// mengambil data keberangkatan berdasarkan id yang dipilih
		$pgw = DB::table('rekap_pemasukan')
		->where('ID_Pemasukan',$id)
		->get();
		$namaLeader = session()->get('nama_leader');
        $leader = OutletModel::LeaderSession($namaLeader);
    
        if ($leader) {
            $outlet = OutletModel::JoinOutletLeaderSession($leader->ID_Leader);
        }
		$barang = BarangModel::get();
		$jenis_layanan = RekapJenisLayananModel::get();
		$jenis_pembayaran = PembayaranModel::get();
		// passing data keberangkatan yang didapat ke view edit.blade.php
		return view('pages/leader/rekap_pemasukan/edit',['pgw' => $pgw, 'outlet'=>$outlet,'barang'=>$barang, 'jenis_layanan'=>$jenis_layanan, 'jenis_pembayaran'=>$jenis_pembayaran]);
	}

	// update data rekap_pemasukan
	public function update(Request $request){
		// update data rekap_pemasukan
		DB::table('rekap_pemasukan')->where('ID_Pemasukan',$request->id_pemasukan)->update([
			'Tanggal_Pemasukan' => $request->tanggal_pemasukan,
			'ID_Outlet' => $request->id_outlet,
			'ID_Pembayaran' => $request->id_pembayaran,
			'Total_Pemasukan' => $request->total_pemasukan,
        ]);
		
		DB::table('detail_rekap_pemasukan')
        ->where('ID_Pemasukan', $request->id_pemasukan)
        ->delete();
		

		
	$id_layanan = $request->id_layanan;
	$id_barang = $request->id_barang;
	$pcs = $request->pcs;
	$qty = $request->qty;
	$harga = $request->harga;
	$id_pemasukan = $request->id_pemasukan;

	foreach ($id_barang as $key  => $value) {
            
		$detail = new DetailRekapPemasukanModel();
		$detail->ID_Pemasukan = $request->id_pemasukan; 
		$detail->ID_Jenis_Layanan = $id_layanan[$key]; 
		$detail->ID_Barang = $id_barang[$key];
		$detail->PCS = $pcs[$key];
		$detail->QTY = $qty[$key];
		$detail->Harga_Barang = $harga[$key];
		$detail->save();
		
	}
	
		// alihkan halaman ke halaman rekap_pemasukan
		return redirect('/leader/rekap_pemasukan')->withSuccess('Data berhasil diperbaharui');
    }

	public function cetak($ID_Pemasukan)
{
	$pgw =  DB::table('rekap_pemasukan')
    ->join('outlet','outlet.ID_Outlet','=','rekap_pemasukan.ID_Outlet')
    ->join('leader_outlet','leader_outlet.ID_Leader','=','outlet.ID_Leader')
    ->join('detail_rekap_pemasukan','detail_rekap_pemasukan.ID_Pemasukan','=','rekap_pemasukan.ID_Pemasukan')
    ->join('barang','barang.ID_Barang','=','detail_rekap_pemasukan.ID_Barang')
    ->join('rekap_jenis_layanan','rekap_jenis_layanan.ID_Jenis_Layanan','=','detail_rekap_pemasukan.ID_Jenis_Layanan')
    ->join('pembayaran','pembayaran.ID_Pembayaran','=','rekap_pemasukan.ID_Pembayaran')
    ->select(
        'rekap_pemasukan.ID_Pemasukan',
        'rekap_pemasukan.Tanggal_Pemasukan',
        'rekap_pemasukan.ID_Outlet',
        'rekap_pemasukan.ID_Pembayaran',
        'rekap_pemasukan.ID_Pembayaran',
        'rekap_pemasukan.Total_Pemasukan',
        'outlet.Nama_Outlet',
        'leader_outlet.Nama_Leader',
        'pembayaran.No_Rekening',
        'pembayaran.Jenis_Pembayaran',
        'pembayaran.Pemilik_Rekening',
		DB::raw('GROUP_CONCAT(barang.Nama_Barang) as produk_names'),
		DB::raw('GROUP_CONCAT(detail_rekap_pemasukan.QTY) as produk_qty'),
		DB::raw('GROUP_CONCAT(detail_rekap_pemasukan.PCS) as produk_pcs'),
		DB::raw('GROUP_CONCAT(detail_rekap_pemasukan.Harga_Barang) as harga_barang'),
		DB::raw('GROUP_CONCAT(rekap_jenis_layanan.Nama_Layanan) as nama_layanan')
    )
    ->groupBy(
        'rekap_pemasukan.ID_Pemasukan',
        'rekap_pemasukan.Tanggal_Pemasukan',
        'rekap_pemasukan.ID_Outlet',
        'rekap_pemasukan.ID_Pembayaran',
        'rekap_pemasukan.Total_Pemasukan',
        'outlet.Nama_Outlet',
        'leader_outlet.Nama_Leader',
        'pembayaran.No_Rekening',
        'pembayaran.Jenis_Pembayaran',
        'pembayaran.Pemilik_Rekening'
    )
    ->where('rekap_pemasukan.ID_Pemasukan',$ID_Pemasukan)
    ->get();

	return view('pages/leader/rekap_pemasukan/laporan', ['pgw' => $pgw]);

}

	

	public function hapus($id){
   
        // Menghapus data rekap_pemasukan dari tabel
        DB::table('rekap_pemasukan')->where('ID_Pemasukan', $id)->delete();
        DB::table('detail_rekap_pemasukan')->where('ID_Pemasukan', $id)->delete();
		// Alihkan halaman ke halaman rekap_pemasukan jika tidak ada data rekap_pemasukan dengan ID tersebut
		return redirect('/leader/rekap_pemasukan')->withDanger('Data rekap_pemasukan tidak ditemukan');
	}

	
}