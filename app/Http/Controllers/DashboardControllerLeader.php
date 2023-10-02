<?php

namespace App\Http\Controllers;

use App\Models\BarangModel;
use Illuminate\Http\Request;
use App\Models\FinanceModel;
use App\Models\LaporanModel;
use App\Models\LeaderModel;
use App\Models\OutletModel;
use App\Models\RekapJenisLayananModel;
use Illuminate\Support\Facades\DB;

class DashboardControllerLeader extends Controller
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
        $outlet = OutletModel::countJoinOutletLeaderSession(session()->get('id_leader'));
        $report = LaporanModel::laporanleadercount(session()->get('id_leader'));
        return view('pages/leader/dashboard', ['finance'=>$finance,'leader'=>$leader,'outlet'=>$outlet,'report'=>$report,'barang'=>$barang,'layanan'=>$layanan]);
    }
}