<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\ReportHarianModel;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\File;

class ReportHarianControllersAdmin extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */    
    public function index()
    {   
        $pgw = ReportHarianModel::get();
        return view('pages/admin/report_harian/index',['pgw' => $pgw]);
    }

	
    public function tambah(){
        return view('pages/admin/report_harian/tambah');
    }

    public function store(Request $request){

	// insert data ke table report_harian
	DB::table('report_harian')->insert([
		'ID_Leader' => $request->id_leader,
		'Nama_report_harian' => $request->nama_report_harian,
		'Alamat_report_harian' => $request->alamat_report_harian,
	]);

	// alihkan halaman ke halaman report_harian
	return redirect('/admin/report_harian/')->withSuccess('Data berhasil disimpan');
    }

    public function edit($id)
	{
		// mengambil data keberangkatan berdasarkan id yang dipilih
		$pgw = DB::table('report_harian')
		->where('ID_report_harian',$id)
		->get();
		$leader = LeaderModel::get();
		// passing data keberangkatan yang didapat ke view edit.blade.php
		return view('pages/admin/report_harian/edit',['pgw' => $pgw, 'leader'=>$leader]);
	}

	// update data report_harian
	public function update(Request $request){
		// update data report_harian
		DB::table('report_harian')->where('ID_report_harian',$request->id_report_harian)->update([
			'ID_Leader' => $request->id_leader,
			'Nama_report_harian' => $request->nama_report_harian,
			'Alamat_report_harian' => $request->alamat_report_harian,
        ]);
		
		
		// alihkan halaman ke halaman report_harian
		return redirect('/admin/report_harian')->withSuccess('Data berhasil diperbaharui');
    }

	public function hapus($id){
   
        // Menghapus data report_harian dari tabel
        DB::table('report_harian')->where('ID_report_harian', $id)->delete();
		// Alihkan halaman ke halaman report_harian jika tidak ada data report_harian dengan ID tersebut
		return redirect('/admin/report_harian')->withDanger('Data report_harian tidak ditemukan');
	}

	
}