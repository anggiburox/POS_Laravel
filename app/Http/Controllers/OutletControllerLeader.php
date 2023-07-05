<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\LeaderModel;
use App\Models\OutletModel;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\File;

class OutletControllerLeader extends Controller
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
            $pgw = OutletModel::JoinOutletLeaderSession($leader->ID_Leader);
        }
    
        return view('pages/leader/outlet/index', ['pgw' => $pgw]);
    }
}