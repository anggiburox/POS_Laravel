<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\View;
use Dompdf\Dompdf;
use App\Models\OutletModel;
use App\Models\LeaderModel;
use App\Models\UsersModel;


use Illuminate\Http\Request;
use App\Models\LaporanModel;
use Illuminate\Support\Facades\DB;

class ReportHarianControllerFinance extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */    
    public function index()
    {   
        $pgw = LaporanModel::index();
        return view('pages/finance/report_harian/index',['pgw' => $pgw]);
    }

	public function cetak_pdf_satuan($ID_Laporan)
    {
		$finance = UsersModel::fetchUserJoinFinance(session()->get('id_user'));
		$finance=$finance[0];
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
		$pdf->loadHtml(View::make('pdf.documentfinance', [
			'Nama_Leader' => $Nama_Leader, 
			'Nama_Outlet' => $Nama_Outlet, 
			'Tanggal_Laporan' => $Tanggal_Laporan, 
			'ListBarang' => $ListBarang,
			'ListPemasukan' => $ListPemasukan,
			'ListPengeluaran' => $ListPengeluaran,
			'finance' => $finance
		]));
	
		// (Optional) Set additional configuration options
		$pdf->setPaper('A4', 'portrait');
	
		// Render the PDF
		$pdf->render();
	
		$pdf->stream('documentfinance.pdf');
    }
	
}