<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class HomeController extends Controller
{
    public function index(){
        return view('home.scanQrcode');
    }
    public function redirect(){
        $usertype=auth::user()->usertype;
        if($usertype == 1){
            return view('admin.home');
        }
        elseif($usertype == 0){
            return view('home.scanQrcode');
        }
        else
        {
            return view('home.fake');
             
        }

    }
    
}
