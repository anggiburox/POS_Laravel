<?php

namespace App\Http\Controllers;
use App\Models\UsersModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProfileControllerFinance extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        // mengambil data dari table 
		$pgw = UsersModel::fetchUserJoinFinance(session()->get('id_user'));
    	// mengirim data ke view index
        return view('pages/finance/profile', ['pgw'=>$pgw]);
    }

    public function editprofile(Request $request){
        $user = UsersModel::find($request->id_user);

		if($user){
            $username_lama = $user->Username;
            $validatedData = $request->validate([
                'username' => $username_lama == $request->username ? '' : 'unique:users,Username',
            ],[      
                'username.unique' => 'Username sudah terdaftar, silahkan masukkan username lain.',
            ]);
            
		   // update data jamaah
        DB::table('finance')->where('ID_Finance',$request->id_finance)->update([
            'Nama_Finance' => $request->nama_finance,
            'Tempat_Lahir_Finance' => $request->tempat_lahir,
            'Tanggal_Lahir_Finance' => $request->tanggal_lahir,
            'Jenis_Kelamin_Finance' => $request->jenis_kelamin,
            'Alamat_Finance' => $request->alamat_finance,
            'Nomor_Telepon_Finance' => $request->telepon_finance,
        ]);
			
		DB::table('users')->where('ID_User',$request->id_user)->update([
			'Username' => $request->username,
            'Password' =>  $request->password,
		]);
		// alihkan halaman ke halaman pasien
		return redirect('/finance/profile')->withSuccess('Data berhasil diperbaharui');
        }
        return redirect()->back()->withErrors(['ID_User' => 'User tidak ditemukan']);
    }
}