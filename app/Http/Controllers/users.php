<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\userModel;

class users extends Controller
{

   
    function login(Request $req){
        try{
     
            $username = $req->input('username');
            $password = $req->input('password');
            $response = userModel::login($username,$password);


            if($response['res']){

                $session = [
                    'id' =>$response['result'][0]->id, 
                    'username' =>$response['result'][0]->username, 
                    'name'=> $response['result'][0]->name,
                    'role'=> $response['result'][0]->role
                ];

                Session::put('userLog', $session);

                return response()->json(
                    array(
                    'result' => true, 
                    'message' =>"login success",
                    'redirect_url'=>'/dashboard'
                    )
                );
              
            }

        }catch(\Exception $e){
            return response()->json(
                array(
                //'data'=>$data,
                'result' => false, 
                'message' =>"error:". $e->getMessage(),
                'redirect_url'=>'/'
                )
            );
        }
    }

    function logout(){
        try{
            Session::flush();
            return redirect('/');
        }catch(\Exception $e){
            echo 'Caught exception: ',  $e->getMessage(), "\n";
        }
    }

    function accountList(){
        try{
            $response = userModel::userAccounts();
            $data = array();

            if($response['res']){
                foreach($response['result'] as $rows){
                    $actions ="<select class=' appointmentActionBtn'  data-id='$rows->id'>
                                <option value='' selected disabled>Select Option</option>
                                <option value='delete'>Delete</option>
                                <option value='edit'>Edit</option>
                                </select>";
        
                    array_push(
                        $data,
                        array(
                            'actions'=>$actions,
                            'username'=>$rows->username,
                            'role'=>$rows->role,
                            'name'=>$rows->name,
                            'address'=>$rows->address,
                            'phoneNumber'=>$rows->phoneNumber
                        )
                    );
                }
            }

            return response()->json(
                array(
                    "data" => $data,
                    "result"=>"success",
                    "message"=>"query success"
                )
            );

        }catch(\Exception $e){
            return response()->json(
                array(
                    
                    "result"=>"error",
                    "message"=>$e->getMessage()
                )
            );
        }
    }
}
