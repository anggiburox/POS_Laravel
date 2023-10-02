<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class RekapJenisLayananModel extends Model
{
    use HasFactory;

    protected $table='rekap_jenis_layanan';  
    protected $fillable=['ID_Jenis_Layanan','Nama_Layanan'];  
    public $timestamps = false;
    public $incrementing = false;
    protected $primaryKey = 'ID_Jenis_Layanan';

    public static function kode()
{
    $kode = DB::table('rekap_jenis_layanan')->max('ID_Jenis_Layanan');
    $addNol = '';
    $kode = str_replace("IRJL-", "", $kode);
    $kode = (int) $kode + 1;
    $incrementKode = $kode;

    if (strlen($kode) == 1) {
        $addNol = "000";
    } elseif (strlen($kode) == 2) {
        $addNol = "00";
    } elseif (strlen($kode == 3)) {
        $addNol = "0";
    }

    $kodeBaru = "IRJL-".$addNol.$incrementKode;
    return $kodeBaru;
}

}