<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\LeaderModel;
use App\Models\OutletModel;
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
        $leader = LeaderModel::count();
        $outlet = OutletModel::count();
        // $mhsSI = MahasiswaModel::where('Program_Studi', 'Sistem Informasi')->count();
        // $mhsTI = MahasiswaModel::where('Program_Studi', 'Teknik Informatika')->count();
        // $mhsDKV = MahasiswaModel::where('Program_Studi', 'Desain Komunikasi Visual')->count();
        return view('pages/admin/dashboard', ['leader'=>$leader,'outlet'=>$outlet]);
    }
}