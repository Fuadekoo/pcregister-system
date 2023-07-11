<?php

namespace App\Exports;

use App\Models\User;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class UsersExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return User::where('usertype', 0)->get(['name', 'email','password']);
    }
    public function headings(): array
    {
        return ['Name', 'Email','password'];
    }
}
