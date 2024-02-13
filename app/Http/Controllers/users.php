<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\userModel;
use Illuminate\Support\Facades\Hash;
class users extends Controller
{
    // public function sampleFunction(){
    //     try{
            
    //     }catch(\Exception $e){
            
    //     }
    // }
   

    public function login(Request $req){
        try{
     

            $username = $req->input('username');
            $password = $req->input('password');

            $response =userModel::login($username,$password);
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
                    $actions ="<select class='userAccountActionBtn'  data-id='$rows->id'>
                                <option value='' selected disabled hidden>Select Option</option>
                                <option value='editInfo'>Edit Personal Info</option>
                                <option value='editRole'>Change Role</option>
                                <option value='activate'>Activate</option>
                                <option value='deactivate'>Deactivate</option>
                                </select>";
        
                    array_push(
                        $data,
                        array(
                            'actions'=>$actions,
                            'status'=>$rows->status,
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

    
    public function createAccount(Request $req){
        try{
            $checkUserAvailability = userModel::checkUserAvailability($req->input('username'));
            $NotificationType = "Account Creation";

            if(!$checkUserAvailability['res'] && $checkUserAvailability['message']=="available"){
                $field1 = [
                    'username'=>$req->input('username'),
                    'password' =>md5($req->input('password')),
                    'role'=>$req->input('role'),
                    'imgPath'=>"",
                    'status'=>"inactive"
                 ];
     
     
                 $field2 =[
                     'name'=>$req->input('name'),
                     'address'=>$req->input('address'),
                     'phoneNumber'=>$req->input('phoneNumber')
                 ];
     
                 $response = userModel::createAccount($field1,$field2);
                 
              
                 $notificationResponse = false;
                 $NotificationDescription = "Failed to create account | user:".$field1['username']." name:". $field2['name']."";
                 $NotificationResult = "error";
     
                 if($response['res']){
                     $NotificationDescription = "Successfully to create account | user:".$field1['username']." name:". $field2['name'] ."";
                     $NotificationResult = "success";
                     $notificationResponse = true;
                 }
            }
            else{
               
                $notificationResponse = false;
                $NotificationDescription = "The user is already exist";
                $NotificationResult = "error";
            }

           

            return response()->json(
                array(
                    'res'=>$notificationResponse,
                    "type" => $NotificationType,
                    "description" => $NotificationDescription,
                    "result" => $NotificationResult
                )
            );

        }catch(\Exception $e){
            $notificationResponse = false;
            $NotificationDescription = "failed to create account | user:".$field1['username']." name:". $field2['name'] ."<br> Error message:". $e->getMessage();
            $NotificationResult = "error";
            
            return response()->json(
                array(
                    'res'=> $notificationResponse,
                    "type" => $NotificationType,
                    "description" => $NotificationDescription,
                    "result" => $NotificationResult
                )
            );

        }
    }

    public function selectAccount(Request $req){
        try{
            $response = userModel::selectAccount($req->input('id'));
            if($response['res']){
                return response()->json(
                    array(
                        'data'=>$response['result'],
                        'result' => true, 
                    )
                );
            }
        }catch(\Exception $e){
            return response()->json(
                array(
                    "result"=>"error",
                    "message"=>$e->getMessage()
                )
            );
        }
       
    }

    public function editInfo(Request $req){
        try{
            $NotificationType = "Change Information";

            $data = [
                'name'=>$req->input('name'),
                'address'=>$req->input('address'),
                'phoneNumber'=>$req->input('phoneNumber')
            ];
            $id = $req->input('id');
            $response = userModel::editInfo($id,$data);
            if($response['res']){
                $NotificationDescription = "Successfully to update account name:".$data['name'].". Account ID:".$id;
                $NotificationResult = "success";
                $notificationResponse = true;
            }

            return response()->json(
                array(
                    'res'=> $notificationResponse,
                    "type" => $NotificationType,
                    "description" => $NotificationDescription,
                    "result" => $NotificationResult
                )
            );

        }catch(\Exception $e){
            $notificationResponse = false;
            $NotificationDescription = "Failed to update account name:".$data['name'].". Account ID:".$id."<br> Error message:".$e->getMessage();
            $NotificationResult = "error";
            return response()->json(
                array(
                    'res'=> $notificationResponse,
                    "type" => $NotificationType,
                    "description" => $NotificationDescription,
                    "result" => $NotificationResult
                )
            );
        }
    }

    public function editRole(Request $req){
        try{
            $NotificationType = "Change Account Role";
            $data = [
                'role'=>$req->input('role'),
            ];
            $id = $req->input('id');
            $response = userModel::editRole($id,$data);
            if($response['res']){
                $NotificationDescription = "Successfully to update account role. Account ID:".$id;
                $NotificationResult = "success";
                $notificationResponse = true;
            }

            return response()->json(
                array(
                    'res'=> $notificationResponse,
                    "type" => $NotificationType,
                    "description" => $NotificationDescription,
                    "result" => $NotificationResult
                )
            );
        }catch(\Exception $e){
            $notificationResponse = false;
            $NotificationDescription ="Failed to update account role. Account ID:".$id. ".<br> Error message:".$e->getMessage();
            $NotificationResult = "error";

            return response()->json(
                array(
                    'res'=> $notificationResponse,
                    "type" => $NotificationType,
                    "description" => $NotificationDescription,
                    "result" => $NotificationResult
                )
            );
        }
    }

  
     public function changeStatus(Request $req){
        try{
            $NotificationType = "Change Account Status";
          
            $data =[
                'status'=>$req->input('status')
            ];

            $id = $req->input('id');

            $response = userModel::changeStatus($id,$data);
            if($response['res']){
                $NotificationDescription = "Successfully to update account status to -".$data['status'].". Account ID:".$id;
                $NotificationResult = "success";
                $notificationResponse = true;
            }

            return response()->json(
                array(
                    'res'=> $notificationResponse,
                    "type" => $NotificationType,
                    "description" => $NotificationDescription,
                    "result" => $NotificationResult
                )
            );
        }catch(\Exception $e){
            $notificationResponse = false;
            $NotificationDescription ="Failed to update account status to -".$data['status']." Account ID:".$id. ".<br> Error message:".$e->getMessage();
            $NotificationResult = "error";

            return response()->json(
                array(
                    'res'=> $notificationResponse,
                    "type" => $NotificationType,
                    "description" => $NotificationDescription,
                    "result" => $NotificationResult
                )
            );
        }
    }
}
