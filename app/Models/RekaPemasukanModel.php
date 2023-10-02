<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class RekaPemasukanModel extends Model
{
    use HasFactory;

    protected $table='rekap_pemasukan';  
    protected $fillable=['ID_Pemasukan','Tanggal_Pemasukan','ID_Outlet','ID_Pembayaran','Total_Pemasukan'];  
    public $timestamps = false;
    public $incrementing = false;
    protected $primaryKey = 'ID_Pemasukan';

    public static function kode()
{
    $kode = DB::table('rekap_pemasukan')->max('ID_Pemasukan');
    $addNol = '';
    $kode = str_replace("IRPM-", "", $kode);
    $kode = (int) $kode + 1;
    $incrementKode = $kode;

    if (strlen($kode) == 1) {
        $addNol = "000";
    } elseif (strlen($kode) == 2) {
        $addNol = "00";
    } elseif (strlen($kode == 3)) {
        $addNol = "0";
    }

    $kodeBaru = "IRPM-".$addNol.$incrementKode;
    return $kodeBaru;
}

public static function IndexJoin()
{   
    $Index =  DB::table('rekap_pemasukan')
    ->join('outlet','outlet.ID_Outlet','=','rekap_pemasukan.ID_Outlet')
    ->join('leader_outlet','leader_outlet.ID_Leader','=','outlet.ID_Leader')
    ->join('detail_rekap_pemasukan','detail_rekap_pemasukan.ID_Pemasukan','=','rekap_pemasukan.ID_Pemasukan')
    ->join('barang','barang.ID_Barang','=','detail_rekap_pemasukan.ID_Barang')
    ->join('pembayaran','pembayaran.ID_Pembayaran','=','rekap_pemasukan.ID_Pembayaran')
    ->select(
        'rekap_pemasukan.ID_Pemasukan',
        'rekap_pemasukan.Tanggal_Pemasukan',
        'rekap_pemasukan.ID_Outlet',
        'rekap_pemasukan.ID_Pembayaran',
        'rekap_pemasukan.ID_Pembayaran',
        'rekap_pemasukan.Total_Pemasukan',
        'outlet.Nama_Outlet',
        'leader_outlet.Nama_Leader',
        DB::raw('GROUP_CONCAT(barang.Nama_Barang SEPARATOR ", ") as Nama_Barang'),
        DB::raw('GROUP_CONCAT(pembayaran.Jenis_Pembayaran SEPARATOR ", ") as Jenis_Pembayaran'),
        'pembayaran.No_Rekening',
        'pembayaran.Jenis_Pembayaran',
        'pembayaran.Pemilik_Rekening'
    )
    ->groupBy(
        'rekap_pemasukan.ID_Pemasukan',
        'rekap_pemasukan.Tanggal_Pemasukan',
        'rekap_pemasukan.ID_Outlet',
        'rekap_pemasukan.ID_Pembayaran',
        'rekap_pemasukan.Total_Pemasukan',
        'outlet.Nama_Outlet',
        'leader_outlet.Nama_Leader',
        'pembayaran.No_Rekening',
        'pembayaran.Jenis_Pembayaran',
        'pembayaran.Pemilik_Rekening'
    )
    ->get();

    return $Index;
}

public static function IndexJoinSession($leaderId)
{   
    $Index =  DB::table('rekap_pemasukan')
    ->join('outlet','outlet.ID_Outlet','=','rekap_pemasukan.ID_Outlet')
    ->join('leader_outlet','leader_outlet.ID_Leader','=','outlet.ID_Leader')
    ->join('detail_rekap_pemasukan','detail_rekap_pemasukan.ID_Pemasukan','=','rekap_pemasukan.ID_Pemasukan')
    ->join('barang','barang.ID_Barang','=','detail_rekap_pemasukan.ID_Barang')
    ->join('pembayaran','pembayaran.ID_Pembayaran','=','rekap_pemasukan.ID_Pembayaran')
    ->select(
        'rekap_pemasukan.ID_Pemasukan',
        'rekap_pemasukan.Tanggal_Pemasukan',
        'rekap_pemasukan.ID_Outlet',
        'rekap_pemasukan.ID_Pembayaran',
        'rekap_pemasukan.ID_Pembayaran',
        'rekap_pemasukan.Total_Pemasukan',
        'outlet.Nama_Outlet',
        'leader_outlet.Nama_Leader',
        DB::raw('GROUP_CONCAT(barang.Nama_Barang SEPARATOR ", ") as Nama_Barang'),
        DB::raw('GROUP_CONCAT(pembayaran.Jenis_Pembayaran SEPARATOR ", ") as Jenis_Pembayaran'),
        'pembayaran.No_Rekening',
        'pembayaran.Jenis_Pembayaran',
        'pembayaran.Pemilik_Rekening'
    )
    ->groupBy(
        'rekap_pemasukan.ID_Pemasukan',
        'rekap_pemasukan.Tanggal_Pemasukan',
        'rekap_pemasukan.ID_Outlet',
        'rekap_pemasukan.ID_Pembayaran',
        'rekap_pemasukan.Total_Pemasukan',
        'outlet.Nama_Outlet',
        'leader_outlet.Nama_Leader',
        'pembayaran.No_Rekening',
        'pembayaran.Jenis_Pembayaran',
        'pembayaran.Pemilik_Rekening'
    ) 
    ->where('leader_outlet.ID_Leader', $leaderId)
    ->get();

    return $Index;
}

public static function JoinOutletLeaderPemasukan()
{   
    $brng =  DB::table('rekap_pemasukan')
    ->join('outlet', 'outlet.ID_Outlet', '=', 'rekap_pemasukan.ID_Outlet')
    ->join('leader_outlet', 'leader_outlet.ID_Leader', '=', 'outlet.ID_Leader')
    ->get();
    return $brng;
}

public static function JoinOutletLeaderPemasukanSession($id)
{   
    $brng =  DB::table('rekap_pemasukan')
    ->join('outlet', 'outlet.ID_Outlet', '=', 'rekap_pemasukan.ID_Outlet')
    ->join('leader_outlet', 'leader_outlet.ID_Leader', '=', 'outlet.ID_Leader')
    ->where('leader_outlet.ID_Leader', $id)
    ->get();
    return $brng;
}
}