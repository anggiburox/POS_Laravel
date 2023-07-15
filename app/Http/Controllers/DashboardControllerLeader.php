<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\FinanceModel;
use App\Models\LaporanModel;
use App\Models\LeaderModel;
use App\Models\OutletModel;
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
        $outlet = OutletModel::countJoinOutletLeaderSession(session()->get('id_leader'));
        $report = LaporanModel::laporanleadercount(session()->get('id_leader'));
        return view('pages/leader/dashboard', ['finance'=>$finance,'leader'=>$leader,'outlet'=>$outlet,'report'=>$report]);
    }
}