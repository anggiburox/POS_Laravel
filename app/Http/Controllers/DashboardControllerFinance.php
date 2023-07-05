<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\FinanceModel;
use App\Models\LeaderModel;
use App\Models\OutletModel;
use Illuminate\Support\Facades\DB;

class DashboardControllerFinance extends Controller
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
        return view('pages/finance/dashboard', ['leader'=>$leader,'outlet'=>$outlet]);
    }
}