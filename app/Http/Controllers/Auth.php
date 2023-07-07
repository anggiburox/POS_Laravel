<?php

namespace App\Http\Controllers;
use App\Models\UsersModel;
use App\Models\MasyarakatModel;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class Auth extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {  
        return view('pages/auth/loginforgot');
    }
    
    // update data diskusi
	public function updatelupapassword(Request $request){
        $user = UsersModel::where('username', $request->username)->first();
        if ($user) {
            // jika username ditemukan
            // update data users
            DB::table('users')->where('Username',$request->username)->update([
                'Password' =>  $request->password,
            ]);
            // alihkan halaman ke halaman lupa_password
            return redirect('/')->withSuccess('Password berhasil diperbarui');
        } else {
            // jika username tidak ditemukan
            return back()->with('error', 'Username tidak ditemukan');
        }
    }

    public function login(Request $request){  
        $post = request()->all();
        $user = UsersModel::where('Username', $post['username'])->first();
        if ($user) {
            $role = $user->ID_User_Roles;
            if ($role == 1) {
                $tutor = UsersModel::fetchusers($user->ID_User);
                if ($post['password'] == $user->Password) {
                    $params = [
                        'islogin'   => true,
                        'username'  => $tutor->Username,
                        'password'  =>$tutor->Password,
                        'id_user'   => $user->ID_User,
                        'role'      => $tutor->ID_User_Roles
                    ];
                    $request->session()->put($params);
                    if ($role == 1) {
                        return redirect()->to('/admin/dashboard');
                    } 
                } else { 
                    return redirect()->back()->with('error', 'Password salah!');
                }
            } else if ($role == 2) {
                $finance = UsersModel::fetchjoinfinance($user->ID_User);
                if ($post['password'] == $user->Password) {
                    $params = [
                        'islogin'       => true,
                        'id_user'       => $user->ID_User,
                        'username'      => $finance->Username,
                        'password'      => $finance->Password,
                        'id_finance'    => $finance->ID_Finance,
                        'nama_finance'  => $finance->Nama_Finance,
                        'role'          => $finance->ID_User_Roles
                    ];          
                    $request->session()->put($params);
                    return redirect()->to('/finance/dashboard');
                } else {
                    return redirect()->back()->with('error', 'Password salah!');
                }
            } else if ($role == 3) {
                $leader = UsersModel::fetchjoinleader($user->ID_User);
                if ($post['password'] == $user->Password) {
                    $params = [
                        'islogin'       => true,
                        'id_user'       => $user->ID_User,
                        'username'      => $leader->Username,
                        'password'      => $leader->Password,
                        'id_leader'     => $leader->ID_Leader,
                        'nama_leader'   => $leader->Nama_Leader,
                        'role'          => $leader->ID_User_Roles
                    ];          
                    $request->session()->put($params);
                    return redirect()->to('/leader/dashboard');
                } else {
                    return redirect()->back()->with('error', 'Password salah!');
                }
            } 
            }else{
                return redirect()->back()->with('error', 'Username salah!');
            }
    }
    

    public function logout(){
        Session::forget('id_user');
        Session::forget('islogin');
        Session::forget('username');
        Session::forget('password');
        Session::forget('id_leader');
        Session::forget('id_finance');
        Session::forget('role');
        Session::flush();
        return redirect()->to('/');
    }
}