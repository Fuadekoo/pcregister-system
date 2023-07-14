<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\pcregister;

class HomeController extends Controller
{
    public function index(){
        return view('home.scanQrcode');
    }
    public function redirect(){
        $user=auth()->user();
        if($user){   
        // $usertype=auth::user()->usertype;
        if( $user->usertype == 1){
            $alluser=user::all()->count();
            $user=user::where('usertype','0')->count();
            $admin=user::where('usertype','1')->count();
            $fake=user::where('usertype','2')->count();
            $studentpc=pcregister::where('description','student')->count();
            $teacherpc=pcregister::where('description','teacher')->count();
            $otherpc=pcregister::where('description','others')->count();
            return view('admin.dashboard',compact('alluser','user','admin','fake','studentpc','teacherpc','otherpc'));
            // return view('admin.home');
        }
        elseif($user->usertype == 0){
            return view('home.scanQrcode');
        }
        else
        {
            return view('home.fake');
             
        }
        

    }
    return view('auth.login');
    
}
}
