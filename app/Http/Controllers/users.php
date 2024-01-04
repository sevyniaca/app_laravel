<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\userModel;

class users extends Controller
{
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
                    //"data" => $data,
                    "result"=>"error",
                    "message"=>$e->getMessage()
                )
            );
        }
    }
}
