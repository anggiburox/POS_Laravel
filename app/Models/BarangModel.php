<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class BarangModel extends Model
{
    use HasFactory;

    protected $table='barang';  
    protected $fillable=['ID_Barang','Nama_Barang'];  
    public $timestamps = false;
    public $incrementing = false;
    protected $primaryKey = 'ID_Barang';

    public static function kode()
{
    $kode = DB::table('barang')->max('ID_Barang');
    $addNol = '';
    $kode = str_replace("IB-", "", $kode);
    $kode = (int) $kode + 1;
    $incrementKode = $kode;

    if (strlen($kode) == 1) {
        $addNol = "000";
    } elseif (strlen($kode) == 2) {
        $addNol = "00";
    } elseif (strlen($kode == 3)) {
        $addNol = "0";
    }

    $kodeBaru = "IB-".$addNol.$incrementKode;
    return $kodeBaru;
}

}