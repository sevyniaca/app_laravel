<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class userModel extends Model
{
    use HasFactory;

    public static function login($user,$pass){
        try{
            $result =  DB::table('accounts')
            ->join('user_infos', 'accounts.id', '=', 'user_infos.accountID')
            ->select('accounts.*','user_infos.name','user_infos.address','user_infos.phoneNumber')
            ->where('accounts.username', '=', $user)
            ->where('accounts.password', '=', DB::raw("MD5('$pass')"))
            ->get();
            
            return array(
                "res" => true,
                "result" => $result,
                "message" => "success"
            );
        }catch(\Exception $e){
            return array(
                "res" => false,
                "message" => $e->getMessage()
            );  
        }
    }

    public static function userAccounts(){
        try{
            $result =  DB::table('accounts')
            ->join('user_infos', 'accounts.id', '=', 'user_infos.accountID')
            ->select('accounts.*','user_infos.name','user_infos.address','user_infos.phoneNumber')
            ->get();

            return array(
                "res" => true,
                "result" => $result,
                "message" => "success"
            );

        }catch(\Exception $e){
            return array(
                "res" => false,
                "message" => $e->getMessage()
            );  
        }
    }
}
