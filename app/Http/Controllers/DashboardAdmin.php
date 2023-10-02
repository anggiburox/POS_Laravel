<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\FinanceModel;
use App\Models\LeaderModel;
use App\Models\OutletModel;
use App\Models\LaporanModel;
use App\Models\BarangModel;
use App\Models\RekapJenisLayananModel;
use Illuminate\Support\Facades\DB;

class DashboardAdmin extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */    
    public function index()
    {  
        $finance = FinanceModel::count();
        $leader = LeaderModel::count();
        $barang = BarangModel::count();
        $layanan = RekapJenisLayananModel::count();
        $outlet = OutletModel::count();
        $report = LaporanModel::count();
        return view('pages/admin/dashboard', ['finance'=>$finance,'leader'=>$leader,'outlet'=>$outlet,'report'=>$report,'barang'=>$barang,'layanan'=>$layanan]);
    }
}