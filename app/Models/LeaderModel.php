<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class LeaderModel extends Model
{
    use HasFactory;

    protected $table='leader_outlet';  
    protected $fillable=['ID_Leader','Nama_Leader','Tempat_Lahir_Leader','Tanggal_Lahir_Leader','Jenis_Kelamin_Leader','Alamat_Leader','Nomor_Telepon_Leader'];  
    public $timestamps = false;
    public $incrementing = false;
    protected $primaryKey = 'ID_Leader';

    public static function kode()
    {
        $kode = DB::table('leader_outlet')->max('ID_Leader');
        $addNol = '';
        $kode = str_replace("ILO-", "", $kode);
        $kode = (int) $kode + 1;
        $incrementKode = $kode;
    
        if (strlen($kode) == 1) {
            $addNol = "000";
        } elseif (strlen($kode) == 2) {
            $addNol = "00";
        } elseif (strlen($kode == 3)) {
            $addNol = "0";
        }
    
        $kodeBaru = "ILO-".$addNol.$incrementKode;
        return $kodeBaru;
    }
}