<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class UsersModel extends Model
{
    use HasFactory;

    protected $table='users';  
    protected $fillable=['ID_User','ID_Leader','ID_Finance','Username','Password','ID_User_Roles'];  
    public $timestamps = false;
    public $incrementing = false;
    protected $primaryKey = 'ID_User';


    public static function fetchusers($id)
    {
        $brng =  DB::table('users')
        ->where('users.ID_User',$id)
        ->first();
        return $brng;
    }

    //leader
    
    public static function joinuserleader(){
        $brng =  DB::table('users')
        ->join('leader_otlet', 'leader_otlet.ID_Leader', '=', 'users.ID_Leader')
        ->get();
        return $brng;
    }   
    
    public static function fetchUserJoinLeader($id)
    {   
        $brng =  DB::table('users')
        ->join('leader_otlet', 'leader_otlet.ID_Finance', '=', 'users.ID_Finance')
        ->where('users.ID_User', $id)
        ->get();
        return $brng;
    }

    public static function fetchjoinuserleader($id)
    {
        $brng =  DB::table('users')
        ->join('leader_otlet', 'leader_otlet.ID_Leader', '=', 'users.ID_Leader')
        ->where('ID_User',$id)
        ->first();
        return $brng;
    }

    //finance
    
    public static function joinuserfinance(){
        $brng =  DB::table('users')
        ->join('finance', 'leader_otlet.ID_Leader', '=', 'users.ID_Leader')
        ->get();
        return $brng;
    }   

    public static function fetchUserJoinFinance($id)
    {   
        $brng =  DB::table('users')
        ->join('finance', 'leader_otlet.ID_Leader', '=', 'users.ID_Leader')
        ->where('users.ID_User', $id)
        ->get();
        return $brng;
    }

    public static function fetchjoinuserfinance($id)
    {
        $brng =  DB::table('users')
        ->join('finance', 'leader_otlet.ID_Leader', '=', 'users.ID_Leader')
        ->where('ID_User',$id)
        ->first();
        return $brng;
    }
}