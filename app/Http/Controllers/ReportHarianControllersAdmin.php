<?php

namespace App\Http\Controllers;

use App\Models\LaporanModel;
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
		$pgw = LaporanModel::get();
		return view('pages/admin/report_harian/index', ['pgw' => $pgw]);
	}


	public function tambah()
	{
		return view('pages/admin/report_harian/tambah');
	}

	public function store(Request $request)
	{

		// insert data ke table report_harian
		$arrayBarang = $request->barang;
		$jsonArrayBarang = [];

		for ($i = 1; $i <= count($arrayBarang); $i += 3) {
			$jsonArrayBarang[] = json_encode([
				'name' => $arrayBarang[$i],
				'value1' => $arrayBarang[$i + 1],
				'value2' => $arrayBarang[$i + 2]
			]);
		}
		$arrayPemasukan = $request->pemasukan;
		$jsonArrayPemasukan = [];

		for ($j = 1; $j <= count($arrayPemasukan); $j += 3) {
			$jsonArrayPemasukan[] = json_encode([
				'name' => $arrayPemasukan[$j],
				'value1' => $arrayPemasukan[$j + 1],
				'value2' => $arrayPemasukan[$j + 2]
			]);
		}
		$arrayPengeluaran = $request->pengeluaran;
		$jsonArrayPengeluaran = [];

		for ($k = 1; $k <= count($arrayPengeluaran); $k += 3) {
			$jsonArrayPengeluaran[] = json_encode([
				'name' => $arrayPengeluaran[$k],
				'value1' => $arrayPengeluaran[$k + 1],
				'value2' => $arrayPengeluaran[$k + 2]
			]);
		}
		
		DB::table('laporan')->insert([
			'ID_Outlet' => $request->id_outlet,
			// 'ID_Leader' => $request->id_leader,
			'Tanggal_Laporan' => $request->tanggal_laporan,
			'Barang' => json_encode($jsonArrayBarang),
			'Pemasukan' => json_encode($jsonArrayPemasukan),
			'Pengeluaran' => json_encode($jsonArrayPengeluaran),
			// 'Alamat_report_harian' => $request->alamat_report_harian,
		]);

		// alihkan halaman ke halaman report_harian
		return redirect('/admin/report_harian/')->withSuccess('Data berhasil disimpan');
	}

	public function edit($id)
	{
		// mengambil data keberangkatan berdasarkan id yang dipilih
		$pgw = DB::table('report_harian')
			->where('ID_report_harian', $id)
			->get();
		$leader = LeaderModel::get();
		// passing data keberangkatan yang didapat ke view edit.blade.php
		return view('pages/admin/report_harian/edit', ['pgw' => $pgw, 'leader' => $leader]);
	}

	// update data report_harian
	public function update(Request $request)
	{
		// update data report_harian
		DB::table('report_harian')->where('ID_report_harian', $request->id_report_harian)->update([
			'ID_Leader' => $request->id_leader,
			'Nama_report_harian' => $request->nama_report_harian,
			'Alamat_report_harian' => $request->alamat_report_harian,
		]);


		// alihkan halaman ke halaman report_harian
		return redirect('/admin/report_harian')->withSuccess('Data berhasil diperbaharui');
	}

	public function hapus($id)
	{

		// Menghapus data report_harian dari tabel
		DB::table('laporan')->where('ID_Laporan', $id)->delete();
		// Alihkan halaman ke halaman report_harian jika tidak ada data report_harian dengan ID tersebut
		return redirect('/admin/report_harian')->withDanger('Data report_harian tidak ditemukan');
	}
	public function list_ayam($id)
	{

		// Menghapus data report_harian dari tabel
		$list = DB::table('laporan')->select('Barang')->where('ID_Laporan', $id)->get();
		$listBarang = json_decode($list[0]->Barang);
		// dd($listBarang);

		// Alihkan halaman ke halaman report_harian jika tidak ada data report_harian dengan ID tersebut
		return response()->json($listBarang);
	}
	public function list_pemasukan($id)
	{

		// Menghapus data report_harian dari tabel
		$list = DB::table('laporan')->select('Pemasukan')->where('ID_Laporan', $id)->get();
		$listPemasukan = json_decode($list[0]->Pemasukan);
		// dd($listPemasukan);

		// Alihkan halaman ke halaman report_harian jika tidak ada data report_harian dengan ID tersebut
		return response()->json($listPemasukan);
	}
	public function list_pengeluaran($id)
	{

		// Menghapus data report_harian dari tabel
		$list = DB::table('laporan')->select('Pengeluaran')->where('ID_Laporan', $id)->get();
		$listPengeluaran = json_decode($list[0]->Pengeluaran);
		// dd($listPengeluaran);

		// Alihkan halaman ke halaman report_harian jika tidak ada data report_harian dengan ID tersebut
		return response()->json($listPengeluaran);
	}
}
