<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;
use App\employee;

class employeecontroller extends BaseController
{
    public function save(Request $req)
      {
        
          $user = new employee;
          $user->firstname=$req->firstname;
          $user->lastname=$req->lastname;
          $user->email=$req->email;
          $user->password=$req->password;
          $user->phone=$req->phone;
          $user->roleid=$req->roleid;
          $user->managerid=$req->managerid;
          $user->leavecount=$req->leavecount;
          $user->save();
          return response()->json(array("status" =>"ok"));
      }
    }