<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
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
        try {
            $request->validate([
                'users' => 'required|mimes:xlsx,xls',
            ]);
        Excel::import(new UsersImport, $request->file('users'));

        return redirect('/redirect')->with('success', 'Data imported and saved successfully.');
    } catch (\Throwable $e) {
        \Log::error($e->getMessage());
        return redirect('/redirect')->with('error', 'An error occurred during import.');
    }
    }
}
