<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Exports\UsersExport;
use App\Imports\UsersImport;
use Maatwebsite\Excel\Facades\Excel;
class Excelcontroller extends Controller
{
    //
    public function export() 
    {
        return Excel::download(new UsersExport, 'users.xlsx');
    }
    public function import(Request $request) 
    {
        $request->validate(['users'=>['required']]);
        Excel::import(new UsersImport, $request->file('users'));
        
        return redirect('/')->with('success', 'All good!');
    }
}
