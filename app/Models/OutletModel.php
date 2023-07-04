<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class OutletModel extends Model
{
    use HasFactory;

    protected $table='outlet';  
    protected $fillable=['ID_Outlet','ID_Leader','Nama_Outlet','Alamat_Outlet'];  
    public $timestamps = false;
    public $incrementing = false;
    protected $primaryKey = 'ID_Outlet';

    public static function kode()
    {
        $kode = DB::table('outlet')->max('ID_Outlet');
        $addNol = '';
        $kode = str_replace("IO-", "", $kode);
        $kode = (int) $kode + 1;
        $incrementKode = $kode;
    
        if (strlen($kode) == 1) {
            $addNol = "000";
        } elseif (strlen($kode) == 2) {
            $addNol = "00";
        } elseif (strlen($kode == 3)) {
            $addNol = "0";
        }
    
        $kodeBaru = "IO-".$addNol.$incrementKode;
        return $kodeBaru;
    }

    public static function JoinOutletLeader()
    {   
        $brng =  DB::table('outlet')
        ->join('leader_outlet', 'leader_outlet.ID_Leader', '=', 'outlet.ID_Leader')
        ->get();
        return $brng;
    }
}