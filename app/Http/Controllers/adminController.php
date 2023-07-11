<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\pcregister;
use App\Models\user;

class adminController extends Controller
{
    //
    public function component(){
        $user=user::where('usertype','0')->count();
        $admin=user::where('usertype','1')->count();
        $studentpc=pcregister::where('description','student')->count();
        $teacherpc=pcregister::where('description','teacher')->count();
        $otherpc=pcregister::where('description','others')->count();
        return view('admin.component',compact('user','admin','studentpc','teacherpc','otherpc'));
    }
    public function showsecurity(){
        $users = user::all();
        return view('admin.securitylist', compact('users'));
    }
    public function showpc(){
        $pcregisters = pcregister::all();
        return view('admin.pclist', compact('pcregisters'));
    }
   public function allregister(){
    return view('admin.register');
   }
    public function permission()
    {
        $users = User::all();
        $userType = User::where('usertype', 2)->value('usertype'); // Default user type value
        return view('admin.permission', compact('users', 'userType'));
    }
 
    public function update(Request $request)
    {
        $userId = $request->user_id; // Update parameter name to 'user_id'
        $userType = $request->usertype;
    
        $user = User::find($userId);
    
        if ($user) {
            $user->usertype = $userType;
            $user->save();
    
            return redirect()->back()->with('success', 'User Granted successfully.');
        }
    
        return redirect()->back()->with('error', 'User not Granted!!.');
    }
    public function about(){
        return view('admin.about');

    }



}
