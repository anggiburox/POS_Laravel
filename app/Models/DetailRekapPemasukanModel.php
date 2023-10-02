<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailRekapPemasukanModel extends Model
{
    use HasFactory;

    protected $table='detail_rekap_pemasukan';  
    protected $fillable=[
        'ID_Detail_Pemasukan',
        'ID_Pemasukan',
        'ID_Jenis_Layanan',
        'ID_Barang',
        'QTY',
        'PCS',
        'Harga_Barang',
    ];  
    public $timestamps = false;
    public $incrementing = true;
    protected $primaryKey = 'ID_Detail_Pemasukan';
}