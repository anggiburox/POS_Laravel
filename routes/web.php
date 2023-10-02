<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth;
use App\Http\Controllers\DashboardAdmin;
use App\Http\Controllers\DashboardControllerFinance;
use App\Http\Controllers\FinanceControllerAdmin;
use App\Http\Controllers\OutletControllersAdmin;
use App\Http\Controllers\ProfileControllerFinance;
use App\Http\Controllers\ReportHarianControllersAdmin;
use App\Http\Controllers\ReportHarianControllerFinance;
use App\Http\Controllers\LeaderControllersAdmin;
use App\Http\Controllers\RekapPengeluaranControllersAdmin;
use App\Http\Controllers\BarangControllerAdmin;
use App\Http\Controllers\RekapPemasukanControllerAdmin;
use App\Http\Controllers\PembayaranControllerAdmin;
use App\Http\Controllers\RekapJenisLayananControllerAdmin;

//LEADER
use App\Http\Controllers\ProfileControllerLeader;
use App\Http\Controllers\DashboardControllerLeader;
use App\Http\Controllers\OutletControllerLeader;
use App\Http\Controllers\ReportHarianControllerLeader;
use App\Http\Controllers\BarangControllerLeader;
use App\Http\Controllers\PembayaranControllerLeader;
use App\Http\Controllers\RekapJenisLayananControllerLeader;
use App\Http\Controllers\RekapPemasukanControllerLeader;
use App\Http\Controllers\RekapPengeluaranControllersLeader;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [Auth::class, 'index'])->name('login');
Route::post('/login', [Auth::class, 'login']);
Route::get('/logout', [Auth::class, 'logout']);

Route::post('/auth/loginforgot/updatelupapassword/',[Auth::class, 'updatelupapassword']);

Route::middleware(['auth','admin'])->group(function () {

    Route::get('/admin/dashboard/', [DashboardAdmin::class, 'index']);


    //route admin outlet
    Route::get('/admin/outlet/', [OutletControllersAdmin::class, 'index']);
    Route::get('/admin/outlet/tambah', [OutletControllersAdmin::class, 'tambah']);
    Route::post('/admin/outlet/store', [OutletControllersAdmin::class, 'store']);
    Route::get('/admin/outlet/edit/{id}',[OutletControllersAdmin::class, 'edit']);
    Route::post('/admin/outlet/update',[OutletControllersAdmin::class, 'update']);
    Route::get('/admin/outlet/hapus/{id}',[OutletControllersAdmin::class, 'hapus']);

    //route admin leader
    Route::get('/admin/leader/', [LeaderControllersAdmin::class, 'index']);
    Route::get('/admin/leader/tambah', [LeaderControllersAdmin::class, 'tambah']);
    Route::post('/admin/leader/store', [LeaderControllersAdmin::class, 'store']);
    Route::get('/admin/leader/edit/{id}',[LeaderControllersAdmin::class, 'edit']);
    Route::post('/admin/leader/update',[LeaderControllersAdmin::class, 'update']);
    Route::get('/admin/leader/hapus/{id}',[LeaderControllersAdmin::class, 'hapus']);
    Route::get('/admin/leader/detail/{id}',[LeaderControllersAdmin::class, 'detail']);

    //route admin finance
    Route::get('/admin/finance/', [FinanceControllerAdmin::class, 'index']);
    Route::get('/admin/finance/tambah', [FinanceControllerAdmin::class, 'tambah']);
    Route::post('/admin/finance/store', [FinanceControllerAdmin::class, 'store']);
    Route::get('/admin/finance/edit/{id}',[FinanceControllerAdmin::class, 'edit']);
    Route::post('/admin/finance/update',[FinanceControllerAdmin::class, 'update']);
    Route::get('/admin/finance/hapus/{id}',[FinanceControllerAdmin::class, 'hapus']);
    Route::get('/admin/finance/detail/{id}',[FinanceControllerAdmin::class, 'detail']);

    //route admin barang
    Route::get('/admin/barang/', [BarangControllerAdmin::class, 'index']);
    Route::get('/admin/barang/tambah', [BarangControllerAdmin::class, 'tambah']);
    Route::post('/admin/barang/store', [BarangControllerAdmin::class, 'store']);
    Route::get('/admin/barang/edit/{id}',[BarangControllerAdmin::class, 'edit']);
    Route::post('/admin/barang/update',[BarangControllerAdmin::class, 'update']);
    Route::get('/admin/barang/hapus/{id}',[BarangControllerAdmin::class, 'hapus']);

    //route admin report harian
    Route::get('/admin/report_harian/', [ReportHarianControllersAdmin::class, 'index']);
    Route::get('/admin/report_harian/tambah', [ReportHarianControllersAdmin::class, 'tambah']);
    Route::post('/admin/report_harian/store', [ReportHarianControllersAdmin::class, 'store']);
    Route::get('/admin/report_harian/edit/{id}',[ReportHarianControllersAdmin::class, 'edit']);
    Route::post('/admin/report_harian/update',[ReportHarianControllersAdmin::class, 'update']);    
    Route::get('/admin/report_harian/hapus/{id}',[ReportHarianControllersAdmin::class, 'hapus']);
    Route::get('/admin/report_harian/cetak/{id}',[ReportHarianControllersAdmin::class, 'cetak']);

    //route admin rekap pengeluaran
    Route::get('/admin/rekap_pengeluaran/', [RekapPengeluaranControllersAdmin::class, 'index']);
    Route::get('/admin/rekap_pengeluaran/tambah', [RekapPengeluaranControllersAdmin::class, 'tambah']);
    Route::post('/admin/rekap_pengeluaran/store', [RekapPengeluaranControllersAdmin::class, 'store']);
    Route::get('/admin/rekap_pengeluaran/edit/{id}',[RekapPengeluaranControllersAdmin::class, 'edit']);
    Route::post('/admin/rekap_pengeluaran/update',[RekapPengeluaranControllersAdmin::class, 'update']);    
    Route::get('/admin/rekap_pengeluaran/hapus/{id}',[RekapPengeluaranControllersAdmin::class, 'hapus']);
    Route::get('/admin/rekap_pengeluaran/cetak/{id}',[RekapPengeluaranControllersAdmin::class, 'cetak']);

    //route admin rekap pemasukan
    Route::get('/admin/rekap_pemasukan/', [RekapPemasukanControllerAdmin::class, 'index']);
    Route::get('/admin/rekap_pemasukan/tambah', [RekapPemasukanControllerAdmin::class, 'tambah']);
    Route::post('/admin/rekap_pemasukan/store', [RekapPemasukanControllerAdmin::class, 'store']);
    Route::get('/admin/rekap_pemasukan/edit/{id}',[RekapPemasukanControllerAdmin::class, 'edit']);
    Route::post('/admin/rekap_pemasukan/update',[RekapPemasukanControllerAdmin::class, 'update']);
    Route::get('/admin/rekap_pemasukan/hapus/{id}',[RekapPemasukanControllerAdmin::class, 'hapus']);
    Route::get('/admin/rekap_pemasukan/cetak/{id}',[RekapPemasukanControllerAdmin::class, 'cetak']);
    
    //route admin rekap jenis layanan
    Route::get('/admin/rekap_jenis_layanan/', [RekapJenisLayananControllerAdmin::class, 'index']);
    Route::get('/admin/rekap_jenis_layanan/tambah', [RekapJenisLayananControllerAdmin::class, 'tambah']);
    Route::post('/admin/rekap_jenis_layanan/store', [RekapJenisLayananControllerAdmin::class, 'store']);
    Route::get('/admin/rekap_jenis_layanan/edit/{id}',[RekapJenisLayananControllerAdmin::class, 'edit']);
    Route::post('/admin/rekap_jenis_layanan/update',[RekapJenisLayananControllerAdmin::class, 'update']);
    Route::get('/admin/rekap_jenis_layanan/hapus/{id}',[RekapJenisLayananControllerAdmin::class, 'hapus']);
    
    //route admin pembayaran
    Route::get('/admin/pembayaran/', [PembayaranControllerAdmin::class, 'index']);
    Route::get('/admin/pembayaran/tambah', [PembayaranControllerAdmin::class, 'tambah']);
    Route::post('/admin/pembayaran/store', [PembayaranControllerAdmin::class, 'store']);
    Route::get('/admin/pembayaran/edit/{id}',[PembayaranControllerAdmin::class, 'edit']);
    Route::post('/admin/pembayaran/update',[PembayaranControllerAdmin::class, 'update']);
    Route::get('/admin/pembayaran/hapus/{id}',[PembayaranControllerAdmin::class, 'hapus']);

});

Route::middleware(['auth','finance'])->group(function () {
    //route finance
    Route::get('/finance/dashboard', [DashboardControllerFinance::class, 'index']);

    Route::get('/finance/profile', [ProfileControllerFinance::class, 'index']);
    Route::post('/finance/profile/{id}',[ProfileControllerFinance::class, 'editprofile']);
    
    //route finance report harian
    Route::get('/finance/report_harian/', [ReportHarianControllerFinance::class, 'index']);
    Route::get('/finance/report_harian/cetak_pdf_satuan/{id}',[ReportHarianControllerFinance::class, 'cetak_pdf_satuan']);

});

Route::middleware(['auth','leader'])->group(function () {
    //route leader
    Route::get('/leader/dashboard', [DashboardControllerLeader::class, 'index']);

    Route::get('/leader/profile', [ProfileControllerLeader::class, 'index']);
    Route::post('/leader/profile/{id}',[ProfileControllerLeader::class, 'editprofile']);
    
    //route leader report harian
    Route::get('/leader/report_harian/', [ReportHarianControllerLeader::class, 'index']);
    Route::get('/leader/report_harian/cetak_pdf_satuan/{id}',[ReportHarianControllerLeader::class, 'cetak_pdf_satuan']);
    Route::get('/leader/report_harian/tambah', [ReportHarianControllerLeader::class, 'tambah']);
    Route::get('/leader/report_harian/edit/{id}',[ReportHarianControllerLeader::class, 'edit']);  
    Route::post('/leader/report_harian/store', [ReportHarianControllerLeader::class, 'store']);
    Route::post('/leader/report_harian/update',[ReportHarianControllerLeader::class, 'update']);    
    Route::get('/leader/report_harian/hapus/{id}',[ReportHarianControllerLeader::class, 'hapus']);
    Route::get('/leader/report_harian/cetak/{id}',[ReportHarianControllerLeader::class, 'cetak']);
    //route leader outlet
    Route::get('/leader/outlet/', [OutletControllerLeader::class, 'index']);

     //route leader barang
     Route::get('/leader/barang/', [BarangControllerLeader::class, 'index']);
     Route::get('/leader/barang/tambah', [BarangControllerLeader::class, 'tambah']);
     Route::post('/leader/barang/store', [BarangControllerLeader::class, 'store']);
     Route::get('/leader/barang/edit/{id}',[BarangControllerLeader::class, 'edit']);
     Route::post('/leader/barang/update',[BarangControllerLeader::class, 'update']);
     Route::get('/leader/barang/hapus/{id}',[BarangControllerLeader::class, 'hapus']);

    //route leader pembayaran
    Route::get('/leader/pembayaran/', [PembayaranControllerLeader::class, 'index']);
    Route::get('/leader/pembayaran/tambah', [PembayaranControllerLeader::class, 'tambah']);
    Route::post('/leader/pembayaran/store', [PembayaranControllerLeader::class, 'store']);
    Route::get('/leader/pembayaran/edit/{id}',[PembayaranControllerLeader::class, 'edit']);
    Route::post('/leader/pembayaran/update',[PembayaranControllerLeader::class, 'update']);
    Route::get('/leader/pembayaran/hapus/{id}',[PembayaranControllerLeader::class, 'hapus']);
     
    //route leader rekap jenis layanan
    Route::get('/leader/rekap_jenis_layanan/', [RekapJenisLayananControllerLeader::class, 'index']);
    Route::get('/leader/rekap_jenis_layanan/tambah', [RekapJenisLayananControllerLeader::class, 'tambah']);
    Route::post('/leader/rekap_jenis_layanan/store', [RekapJenisLayananControllerLeader::class, 'store']);
    Route::get('/leader/rekap_jenis_layanan/edit/{id}',[RekapJenisLayananControllerLeader::class, 'edit']);
    Route::post('/leader/rekap_jenis_layanan/update',[RekapJenisLayananControllerLeader::class, 'update']);
    Route::get('/leader/rekap_jenis_layanan/hapus/{id}',[RekapJenisLayananControllerLeader::class, 'hapus']);
   
    //route leader rekap pemasukan
    Route::get('/leader/rekap_pemasukan/', [RekapPemasukanControllerLeader::class, 'index']);
    Route::get('/leader/rekap_pemasukan/tambah', [RekapPemasukanControllerLeader::class, 'tambah']);
    Route::post('/leader/rekap_pemasukan/store', [RekapPemasukanControllerLeader::class, 'store']);
    Route::get('/leader/rekap_pemasukan/edit/{id}',[RekapPemasukanControllerLeader::class, 'edit']);
    Route::post('/leader/rekap_pemasukan/update',[RekapPemasukanControllerLeader::class, 'update']);
    Route::get('/leader/rekap_pemasukan/hapus/{id}',[RekapPemasukanControllerLeader::class, 'hapus']);
    Route::get('/leader/rekap_pemasukan/cetak/{id}',[RekapPemasukanControllerLeader::class, 'cetak']);

    //route leader rekap pengeluaran
    Route::get('/leader/rekap_pengeluaran/', [RekapPengeluaranControllersLeader::class, 'index']);
    Route::get('/leader/rekap_pengeluaran/tambah', [RekapPengeluaranControllersLeader::class, 'tambah']);
    Route::post('/leader/rekap_pengeluaran/store', [RekapPengeluaranControllersLeader::class, 'store']);
    Route::get('/leader/rekap_pengeluaran/edit/{id}',[RekapPengeluaranControllersLeader::class, 'edit']);
    Route::post('/leader/rekap_pengeluaran/update',[RekapPengeluaranControllersLeader::class, 'update']);    
    Route::get('/leader/rekap_pengeluaran/hapus/{id}',[RekapPengeluaranControllersLeader::class, 'hapus']);
    Route::get('/leader/rekap_pengeluaran/cetak/{id}',[RekapPengeluaranControllersLeader::class, 'cetak']);

    

});
Route::get('/ajax/report_ayam/{id}',[ReportHarianControllersAdmin::class, 'list_ayam']);
Route::get('/ajax/report_pemasukan/{id}',[ReportHarianControllersAdmin::class, 'list_pemasukan']);
Route::get('/ajax/rekap_pengeluaran/{id}',[ReportHarianControllersAdmin::class, 'list_pengeluaran']);