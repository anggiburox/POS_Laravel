<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\LaporanModel;
use App\Models\OutletModel;
use App\Models\LeaderModel;
use App\Models\ReportHarianModel;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\View;

use Dompdf\Dompdf;

use Carbon\Carbon;

class ReportHarianControllerLeader extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */    
    public function index()
    {   
        // dd(session()->get('id_leader'));
        $pgw = LaporanModel::LaporanLeader(session()->get('id_leader'));
        return view('pages/leader/report_harian/index',['pgw' => $pgw]);
    }

	public function cetak($ID_Laporan)
    {
		$pgw = LaporanModel::where('ID_Laporan',$ID_Laporan)->get();
		$Tanggal_Laporan=$pgw[0]->Tanggal_Laporan;	
		$ID_Outlet=$pgw[0]->ID_Outlet;	
		$Outlet=OutletModel::where('ID_Outlet',$ID_Outlet)->get();	
		$Nama_Outlet=$Outlet[0]->Nama_Outlet;	
		$ID_Leader=$Outlet[0]->ID_Leader;	
		$Leader=LeaderModel::select('Nama_Leader')->where('ID_Leader',$ID_Leader)->get();	
		$Nama_Leader=$Leader[0]->Nama_Leader;

		$laporan = $pgw[0];
		$Barang = $pgw[0]->Barang;
		$Pemasukan = $pgw[0]->Pemasukan;
		$Pengeluaran = $pgw[0]->Pengeluaran;

		$ListBarang=json_decode($Barang);
		$ListPemasukan=json_decode($Pemasukan);
		$ListPengeluaran=json_decode($Pengeluaran);
		
		$pdf = new Dompdf();
		$pdf->loadHtml(View::make('pdf.document', [
			'Nama_Leader' => $Nama_Leader, 
			'Nama_Outlet' => $Nama_Outlet, 
			'Tanggal_Laporan' => $Tanggal_Laporan, 
			'ListBarang' => $ListBarang,
			'ListPemasukan' => $ListPemasukan,
			'ListPengeluaran' => $ListPengeluaran
		]));
	
		// (Optional) Set additional configuration options
		$pdf->setPaper('A4', 'portrait');
	
		// Render the PDF
		$pdf->render();
	
		$pdf->stream('document.pdf');
    }
    public function tambah()
	{
		$outlet = OutletModel::JoinOutletLeaderSession(session()->get('id_leader'));
		// dd($outlet);
		return view('pages/leader/report_harian/tambah',['outlet'=>$outlet]);
	}
	public function store(Request $request)
	{
		// dd($request->all());

		// insert data ke table report_harian
		$arrayBarang = $request->barang;
		$jsonArrayBarang = json_encode($arrayBarang);

		$arrayPemasukan = $request->pemasukan;
		$jsonArrayPemasukan = json_encode($arrayPemasukan);

		$arrayPengeluaran = $request->pengeluaran;
		$jsonArrayPengeluaran = json_encode($arrayPengeluaran);
		
		DB::table('laporan')->insert([
			'ID_Outlet' => $request->id_outlet,
			'Tanggal_Laporan' => Carbon::createFromFormat('Y-m-d', $request->tanggal_laporan)->format('Y-m-d'),
			
			'Barang' => $jsonArrayBarang,
			'Pemasukan' => $jsonArrayPemasukan,
			'Pengeluaran' => $jsonArrayPengeluaran,
		]);

		// alihkan halaman ke halaman report_harian
		return redirect('/leader/report_harian/')->withSuccess('Data berhasil disimpan');
	}
    public function edit($id)
	{
		// mengambil data keberangkatan berdasarkan id yang dipilih
		$pgw = LaporanModel::where('ID_Laporan',$id)->get();
		$outlet = OutletModel::JoinOutletLeaderSession(session()->get('id_leader'));

		$Barang = $pgw[0]->Barang;
		$Pemasukan = $pgw[0]->Pemasukan;
		$Pengeluaran = $pgw[0]->Pengeluaran;

		$ListBarang=json_decode($Barang);
		$ListPemasukan=json_decode($Pemasukan);
		$ListPengeluaran=json_decode($Pengeluaran);
		// $outlet = OutletModel::JoinOutletLeader()->where;
		
		// foreach ($listBarang as $key => $item) {
		// 	${"item" . $key} = json_decode($item, true);
		//   }
		//   dd($i);
		// $leader = LeaderModel::get();
		// passing data keberangkatan yang didapat ke view edit.blade.php
		return view('pages/leader/report_harian/edit', [
			'pgw' => $pgw, 
			'ListBarang'=>$ListBarang, 
			'ListPemasukan'=>$ListPemasukan, 
			'ListPengeluaran'=>$ListPengeluaran,
			'outlet'=>$outlet
		]);
	}
    public function update(Request $request)
	{
		$arrayBarang = $request->barang;
		$jsonArrayBarang = json_encode($arrayBarang);

		$arrayPemasukan = $request->pemasukan;
		$jsonArrayPemasukan = json_encode($arrayPemasukan);

		$arrayPengeluaran = $request->pengeluaran;
		$jsonArrayPengeluaran = json_encode($arrayPengeluaran);
		// update data report_harian
		DB::table('laporan')->where('ID_Laporan', $request->ID_Laporan)->update([
			'ID_Outlet' => $request->id_outlet,
			'Tanggal_Laporan' => Carbon::createFromFormat('Y-m-d', $request->tanggal_laporan)->format('Y-m-d'),
			'Barang' => $jsonArrayBarang,
			'Pemasukan' => $jsonArrayPemasukan,
			'Pengeluaran' => $jsonArrayPengeluaran,
		]);


		// alihkan halaman ke halaman report_harian
		return redirect('/leader/report_harian')->withSuccess('Data berhasil diperbaharui');
	}
    public function hapus($id)
	{

		// Menghapus data report_harian dari tabel
		DB::table('laporan')->where('ID_Laporan', $id)->delete();
		// Alihkan halaman ke halaman report_harian jika tidak ada data report_harian dengan ID tersebut
		return redirect('/leader/report_harian')->withDanger('Data report dihapus');
	}
}