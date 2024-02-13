<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class userModel extends Model
{
    use HasFactory;
    public static function checkAccountPermissions($id){
        try{
            $result =  DB::table('accounts')
            ->join('accountpermissions', 'accounts.id', '=', 'accountpermissions.accountID')
            ->select('accounts.*','accountpermissions.writeAccess','accountpermissions.readAccess')
            ->where('accounts.id', '=', $id)
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
    public static function checkUserAvailability($username){
        try{
            $response= false;
            $message = "available";

            $result =  DB::table('accounts')
            ->select('*')
            ->where('username','=',$username)
            ->exists();

            if($result){
                $response= true;
                $message = "exist";
            }

            return array(
                "res" => $response,
                "result" => $result,
                "message" => $message
            );
        }catch(\Exception $e){
            return array(
                "res" => false,
               // "result" => "error",
                "message" => $e->getMessage()
            );  
        }
    }
    public static function createAccount($field1,$field2){
        try{
            //begin of database request
            DB::beginTransaction();

            $response = false;
            $message = "error";
            //insert to main table
            $relatedId = DB::table('accounts')->insertGetId($field1);
            //insert to relation table
            $checkInsertStatus=DB::table('user_infos')->insert([
                'name'=>$field2['name'],
                'address'=>$field2['address'],
                'phoneNumber'=>$field2['phoneNumber'],
                'accountID'=>$relatedId
            ]);

            //check if two table insert successfully
            if($relatedId&&$checkInsertStatus){
                $response = true;
                $message = "success";
                //query insert to database
                DB::commit();
            }else{
              //if fail, rollback
              DB::rollback();
            }

            return array(
                "res" => $response,
                // "result" => "success",
                "message" => $message
            );
        }catch(\Exception $e){
            //if error it will rollback
            DB::rollback();
            return array(
                "res" => false,
                "message" => $e->getMessage()
            );  
        }
    }

    public static function selectAccount($id){
        try{
            $result =  DB::table('accounts')
            ->join('user_infos', 'accounts.id', '=', 'user_infos.accountID')
            ->select('accounts.*','user_infos.name','user_infos.address','user_infos.phoneNumber')
            ->where('accounts.id', '=', $id)
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

    public static function editInfo($id,$data){

        try{
            DB::table('user_infos')
            ->where('accountID','=',$id)
            ->update($data);

            return array(
                "res" => true,
                //"result" => $result,
                "message" => "success"
            );
        }catch(\Exception $e){
            return array(
                "res" => false,
                "message" => $e->getMessage()
            );  
        }
       
    }

    public static function editRole($id,$data){

        try{
            DB::table('accounts')
            ->where('id','=',$id)
            ->update($data);

            return array(
                "res" => true,
                //"result" => $result,
                "message" => "success"
            );
        }catch(\Exception $e){
            return array(
                "res" => false,
                "message" => $e->getMessage()
            );  
        }
       
    }

    public static function changeStatus($id,$data){

        try{
            DB::table('accounts')
            ->where('id','=',$id)
            ->update($data);

            return array(
                "res" => true,
                //"result" => $result,
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
