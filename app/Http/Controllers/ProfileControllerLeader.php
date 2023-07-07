<?php

namespace App\Http\Controllers;
use App\Models\UsersModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProfileControllerLeader extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        // mengambil data dari table 
		$pgw = UsersModel::fetchUserJoinLeader(session()->get('id_user'));
    	// mengirim data ke view index
        return view('pages/leader/profile', ['pgw'=>$pgw]);
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
            
		// update data outlet
        DB::table('leader_outlet')->where('ID_Leader',$request->id_leader)->update([
            'Nama_Leader' => $request->nama_leader,
            'Tempat_Lahir_Leader' => $request->tempat_lahir,
            'Tanggal_Lahir_Leader' => $request->tanggal_lahir,
            'Jenis_Kelamin_Leader' => $request->jenis_kelamin,
            'Alamat_Leader' => $request->alamat_leader,
            'Nomor_Telepon_Leader' => $request->telepon_leader,
        ]);
			
		DB::table('users')->where('ID_User',$request->id_user)->update([
			'Username' => $request->username,
            'Password' =>  $request->password,
		]);
		// alihkan halaman ke halaman pasien
		return redirect('/leader/profile')->withSuccess('Data berhasil diperbaharui');
        }
        return redirect()->back()->withErrors(['ID_User' => 'User tidak ditemukan']);
    }
}