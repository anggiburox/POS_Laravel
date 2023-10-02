<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class PembayaranModel extends Model
{
    use HasFactory;

    protected $table='pembayaran';  
    protected $fillable=['ID_Pembayaran','Jenis_Pembayaran','No_Rekening','Pemilik_Rekening'];  
    public $timestamps = false;
    public $incrementing = false;
    protected $primaryKey = 'ID_Pembayaran';

    public static function kode()
{
    $kode = DB::table('pembayaran')->max('ID_Pembayaran');
    $addNol = '';
    $kode = str_replace("IPB-", "", $kode);
    $kode = (int) $kode + 1;
    $incrementKode = $kode;

    if (strlen($kode) == 1) {
        $addNol = "000";
    } elseif (strlen($kode) == 2) {
        $addNol = "00";
    } elseif (strlen($kode == 3)) {
        $addNol = "0";
    }

    $kodeBaru = "IPB-".$addNol.$incrementKode;
    return $kodeBaru;
}

}