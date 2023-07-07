<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
}
