<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\userModel;
class pages extends Controller
{
    public function checkPermission(){
        try{
           $id =  Session::get('userLog.id');
           $response = userModel::checkAccountPermissions($id);
           if($response['res']){
            return array(
                "res"=>true,
                "data" => $response['result'],
                "result"=>"success",
                "message"=>"query success"
            );
           }
        }catch(\Exception $e){
            return array(
                "res"=>false,
                //"data" => $response['result'],
                "result"=>"error",
                "message"=>"query failed"
            );
        }
    }
    //landing page
    public function loginPage(){
        try{
            return view('login');
        }catch(\Exception $e){
            $errorMessage = $e->getMessage();
            return view('error', compact('errorMessage'));
        }
    }

    //admin pages
    public function adminDashboard(){
        try{
            return view('admin/pages/dashboard');
        }catch(\Exception $e){
            $errorMessage = $e->getMessage();
            return view('error', compact('errorMessage'));
        }
    }
    public function admidUsers(){
        try{
            return view('admin/pages/users');
        }catch(\Exception $e){
            $errorMessage =  $e->getMessage();
            return view('error', compact('errorMessage'));
        }
    }
}
