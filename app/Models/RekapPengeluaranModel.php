<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;


class RekapPengeluaranModel extends Model
{
    use HasFactory;
    protected $table='rekap_pengeluaran';  
    protected $fillable=[
        'ID_Rekap_Pengeluaran',
        'ID_Pemasukan',
        'Tanggal_Pengeluaran',
        'Pengeluaran',
    ];  
    public $timestamps = false;
    public $incrementing = false;
    protected $primaryKey = 'ID_Rekap_Pengeluaran';

    public static function kode()
    {
        $kode = DB::table('rekap_pengeluaran')->max('ID_Rekap_Pengeluaran');
        $addNol = '';
        $kode = str_replace("IRPN-", "", $kode);
        $kode = (int) $kode + 1;
        $incrementKode = $kode;
    
        if (strlen($kode) == 1) {
            $addNol = "000";
        } elseif (strlen($kode) == 2) {
            $addNol = "00";
        } elseif (strlen($kode == 3)) {
            $addNol = "0";
        }
    
        $kodeBaru = "IRPN-".$addNol.$incrementKode;
        return $kodeBaru;
    }

    public static function IndexJoin()
{   
    $Index =  DB::table('rekap_pengeluaran')
    ->join('rekap_pemasukan','rekap_pemasukan.ID_Pemasukan','=','rekap_pengeluaran.ID_Pemasukan')
    ->join('outlet','outlet.ID_Outlet','=','rekap_pemasukan.ID_Outlet')
    ->join('leader_outlet','leader_outlet.ID_Leader','=','outlet.ID_Leader')
    ->get();

    return $Index;
}

public static function IndexJoinSession($id)
{   
    $Index =  DB::table('rekap_pengeluaran')
    ->join('rekap_pemasukan','rekap_pemasukan.ID_Pemasukan','=','rekap_pengeluaran.ID_Pemasukan')
    ->join('outlet','outlet.ID_Outlet','=','rekap_pemasukan.ID_Outlet')
    ->join('leader_outlet','leader_outlet.ID_Leader','=','outlet.ID_Leader')
    ->where('leader_outlet.ID_Leader', $id)
    ->get();

    return $Index;
}


    

    public static function PengeluaranJoinReportHarian()
    {   
        $Index =  DB::table('rekap_pengeluaran')
        ->join('laporan','laporan.ID_Laporan','=','rekap_pengeluaran.ID_Laporan')
        ->join('outlet','outlet.ID_Outlet','=','laporan.ID_Outlet')
        ->join('leader_outlet','leader_outlet.ID_Leader','=','outlet.ID_Leader')
        ->get();
        return $Index;
    }
    public static function LaporanLeader($id)
    {   
        $LaporanLeader =  DB::table('laporan')->select(
            'laporan.*',
            'outlet.Nama_Outlet',
            'leader_outlet.Nama_Leader',
            )
        ->join('outlet','outlet.ID_Outlet','=','laporan.ID_Outlet')
        ->join('leader_outlet','leader_outlet.ID_Leader','=','outlet.ID_Leader')
        ->where('leader_outlet.ID_Leader',$id)
        ->get();
        return $LaporanLeader;
    }
    public static function laporanleadercount($id)
    {   
        $LaporanLeader =  DB::table('laporan')->select(
            'laporan.*',
            'outlet.Nama_Outlet',
            'leader_outlet.Nama_Leader',
            )
        ->join('outlet','outlet.ID_Outlet','=','laporan.ID_Outlet')
        ->join('leader_outlet','leader_outlet.ID_Leader','=','outlet.ID_Leader')
        ->where('leader_outlet.ID_Leader',$id)
        ->count();
        return $LaporanLeader;
    }

    
}