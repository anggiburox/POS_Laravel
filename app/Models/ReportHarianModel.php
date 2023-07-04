<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class ReportHarianModel extends Model
{
    use HasFactory;

    protected $table='report_harian';  
    protected $fillable=['ID_Report_Harian','ID_Leader','Nama_Outlet','Alamat_Outlet'];  
    public $timestamps = false;
    public $incrementing = false;
    protected $primaryKey = 'report_harian';
}