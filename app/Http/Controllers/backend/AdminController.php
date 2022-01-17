<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Hash;
use Auth;
use App\Models\User;

class AdminController extends Controller
{
    
    public function index(){
    $allusersData = User::all();
       return view('backend/users/users', compact('allusersData'));;
    }
    public function edituser($id){
    $editusersData = User::find($id);
     return view('backend/users/edit-user', compact('editusersData'));;
    }
    public function updateuser(Request $request, $id){

       $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'photo' => 'nullable|mimes:jpg,jpeg,png|max:2048',
            //'password' => 'required|min:5|max:50',
        ]);
       // $validatedData['password'] = Hash::make($request['password']);

     

       $OldData = User::find($id);
       $OldData->name = $request->name; 
       $OldData->email = $request->email; 
       $OldData->role = $request->role; 
       if ($request->file('photo')) {
        $photoname = $request->file('photo')->getClientOriginalName();
        $request->photo->storeAs('images', $photoname);
        $OldData->profile_photo_path = $photoname; 
       }
       $OldData->update();

     
    return redirect('/admin/users')->with('success', 'User created successfully.'); 
    }





    public function logout(){
        Auth::logout();
        return redirect('login');
    }

}
