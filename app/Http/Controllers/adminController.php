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

    }

}
