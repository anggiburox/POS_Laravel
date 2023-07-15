<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;


class LaporanModel extends Model
{
    use HasFactory;
    protected $table='laporan';  
    protected $fillable=[
        'ID_Laporan',
        'ID_Outlet',
        'Tanggal_Laporan',
        'Barang',
        'Pemasukan',
        'Pengeluaran',
    ];  
    public $timestamps = false;
    public $incrementing = false;
    protected $primaryKey = 'ID_Laporan';

    public static function Index()
    {   
        $Index =  DB::table('laporan')->select(
            'laporan.*',
            'outlet.Nama_Outlet',
            'leader_outlet.Nama_Leader',
            )
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
