<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\ReportHarianModel;
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
        $pgw = ReportHarianModel::get();
        return view('pages/finance/report_harian/index',['pgw' => $pgw]);
    }

	public function cetak_pdf_satuan($id)
    {
		set_time_limit(0); 
        $pgw = DB::table('finance')->where('ID_FInance',$id)->get();
		$pdf = PDF::loadview('pages/finance/report_harian/report_harian_satuan_pdf',['pgw'=>$pgw]);
		return $pdf->download('data-report-harian.pdf');
    }
	
}