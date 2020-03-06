<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;
use App\employee;
use DB;

class userController extends BaseController
{
    public function register(Request $req)
      {
        
        
          $user = new employee;
          $user->firstname=$req->input('firstname');
          $user->lastname=$req->input('lastname');
          $user->email=$req->input('email');
          $user->password=$req->input('password');
          $user->phone=$req->input('phone');
          $user->roleid=2;
          $user->managerid=$req->input('managerid');
          $user->leavecount=$req->input('leavecount');
          
          //$data=array("firstname"->$user->firstname,"lastname"->$user->lastname);
          //return response()->json(array($data));
          //return response()->json($req->input());
          $user->save();
          return response()->json(array("status" =>"ok"));
          
          
         
      }
      public function login(Request $req)
          
      {
         // $token=$req->input('token');

        
         
          $email=$req->input('email');
          $password=$req->input('password');
          
          $check= DB::table('employee')->where('email',$email)->where('password',$password)->get()->count();
          if(($check)>0)
          {
        
           $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ'; 
            $token = ''; 
          
            for ($i = 0; $i < 10; $i++) { 
                $index = rand(0, strlen($characters) - 1); 
                $token .= $characters[$index]; 
            } 
            //return response()->json($token);
            $data=DB::table('employee')->where('email',$email)->where('password',$password);
            $empid=$data->value('empid');
            $roleid=$data->value('roleid');
            DB::table('token')->insert(
                ['empid'=>$empid, 'token'=>$token]);
            return response()->json(array(
                'token' => $token,
                'roleid'=> $roleid
            ));
           
           }
        else{
            
            return response()->json("invalid");
      }
    }
} 
