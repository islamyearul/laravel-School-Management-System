<?php

namespace App\Http\Controllers\user;
use Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function index(){
        // $userID = Auth::user()->id;
        // $userData = User::find($userID);
     
    }
    public function editUser($id=null){
     
         $editData = User::find($id);
        return view('/backend/users/edit-user', compact('editData'));
       
    }
}
