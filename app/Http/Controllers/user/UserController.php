<?php

namespace App\Http\Controllers\user;
use Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function index(){
        $userID = Auth::user()->id;
        $userData = User::find($userID);
        return view('backend/users/profile', compact('userData'));
    }
}
