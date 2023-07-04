<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class FinanceModel extends Model
{
    use HasFactory;

    protected $table='finance';  
    protected $fillable=['ID_Finance','Nama_Finance','Tempat_Lahir_Finance','Tanggal_Lahir_Finance','Jenis_Kelamin_Finance','Alamat_Finance','Nomor_Telepon_Finance'];  
    public $timestamps = false;
    public $incrementing = false;
    protected $primaryKey = 'ID_Finance';

    public static function kode()
    {
        $kode = DB::table('finance')->max('ID_Finance');
        $addNol = '';
        $kode = str_replace("IF-", "", $kode);
        $kode = (int) $kode + 1;
        $incrementKode = $kode;
    
        if (strlen($kode) == 1) {
            $addNol = "000";
        } elseif (strlen($kode) == 2) {
            $addNol = "00";
        } elseif (strlen($kode == 3)) {
            $addNol = "0";
        }
    
        $kodeBaru = "IF-".$addNol.$incrementKode;
        return $kodeBaru;
    }
}