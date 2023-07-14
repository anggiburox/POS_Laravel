<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth;
use App\Http\Controllers\DashboardAdmin;
use App\Http\Controllers\DashboardControllerFinance;
use App\Http\Controllers\DashboardControllerLeader;
use App\Http\Controllers\FinanceControllerAdmin;
use App\Http\Controllers\OutletControllersAdmin;
use App\Http\Controllers\OutletControllerLeader;
use App\Http\Controllers\ProfileControllerFinance;
use App\Http\Controllers\ProfileControllerLeader;
use App\Http\Controllers\ReportHarianControllersAdmin;
use App\Http\Controllers\ReportHarianControllerFinance;
use App\Http\Controllers\ReportHarianControllerLeader;
use App\Http\Controllers\LeaderControllersAdmin;
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

    //route admin report harian
    Route::get('/admin/report_harian/', [ReportHarianControllersAdmin::class, 'index']);
    Route::get('/admin/report_harian/tambah', [ReportHarianControllersAdmin::class, 'tambah']);
    Route::post('/admin/report_harian/store', [ReportHarianControllersAdmin::class, 'store']);
    Route::get('/admin/report_harian/edit/{id}',[ReportHarianControllersAdmin::class, 'edit']);
    Route::post('/admin/report_harian/update',[ReportHarianControllersAdmin::class, 'update']);    
    Route::get('/admin/report_harian/hapus/{id}',[ReportHarianControllersAdmin::class, 'hapus']);
    Route::get('/admin/report_harian/cetak/{id}',[ReportHarianControllersAdmin::class, 'cetak']);

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

    //route leader outlet
    Route::get('/leader/outlet/', [OutletControllerLeader::class, 'index']);

});
Route::get('/ajax/report_ayam/{id}',[ReportHarianControllersAdmin::class, 'list_ayam']);
Route::get('/ajax/report_pemasukan/{id}',[ReportHarianControllersAdmin::class, 'list_pemasukan']);
Route::get('/ajax/report_pengeluaran/{id}',[ReportHarianControllersAdmin::class, 'list_pengeluaran']);