<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardAdmin;
use App\Http\Controllers\FinanceControllerAdmin;
use App\Http\Controllers\OutletControllersAdmin;
use App\Http\Controllers\ReportHarianControllersAdmin;
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

Route::get('/', [DashboardAdmin::class, 'index']);

//route admin outlet
Route::get('/admin/outlet/', [OutletControllersAdmin::class, 'index']);
Route::get('/admin/outlet/tambah', [OutletControllersAdmin::class, 'tambah']);
Route::post('/admin/outlet/store', [OutletControllersAdmin::class, 'store']);
Route::get('/admin/outlet/edit/{id}',[OutletControllersAdmin::class, 'edit']);
Route::post('/admin/outlet/update',[OutletControllersAdmin::class, 'update']);
Route::get('/admin/outlet/hapus/{id}',[OutletControllersAdmin::class, 'hapus']);

//route admin leader
Route::get('/admin/leader/', [FinanceControllerAdmin::class, 'index']);
Route::get('/admin/leader/tambah', [FinanceControllerAdmin::class, 'tambah']);
Route::post('/admin/leader/store', [FinanceControllerAdmin::class, 'store']);
Route::get('/admin/leader/edit/{id}',[FinanceControllerAdmin::class, 'edit']);
Route::post('/admin/leader/update',[FinanceControllerAdmin::class, 'update']);
Route::get('/admin/leader/hapus/{id}',[FinanceControllerAdmin::class, 'hapus']);

//route admin finance
Route::get('/admin/finance/', [FinanceControllerAdmin::class, 'index']);
Route::get('/admin/finance/tambah', [FinanceControllerAdmin::class, 'tambah']);
Route::post('/admin/finance/store', [FinanceControllerAdmin::class, 'store']);
Route::get('/admin/finance/edit/{id}',[FinanceControllerAdmin::class, 'edit']);
Route::post('/admin/finance/update',[FinanceControllerAdmin::class, 'update']);
Route::get('/admin/finance/hapus/{id}',[FinanceControllerAdmin::class, 'hapus']);


//route admin report harian
Route::get('/admin/report_harian/', [ReportHarianControllersAdmin::class, 'index']);
Route::get('/admin/report_harian/tambah', [ReportHarianControllersAdmin::class, 'tambah']);
Route::post('/admin/report_harian/store', [ReportHarianControllersAdmin::class, 'store']);
Route::get('/admin/report_harian/edit/{id}',[ReportHarianControllersAdmin::class, 'edit']);
Route::post('/admin/report_harian/update',[ReportHarianControllersAdmin::class, 'update']);
Route::get('/admin/report_harian/hapus/{id}',[ReportHarianControllersAdmin::class, 'hapus']);
Route::get('/ajax/report_ayam/{id}',[ReportHarianControllersAdmin::class, 'list_ayam']);
Route::get('/ajax/report_pemasukan/{id}',[ReportHarianControllersAdmin::class, 'list_pemasukan']);
Route::get('/ajax/report_pengeluaran/{id}',[ReportHarianControllersAdmin::class, 'list_pengeluaran']);