<?php

namespace App\Imports;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\SkipsOnError;
use Throwable;

class UsersImport implements ToModel,WithHeadingRow,SkipsOnError
{
    use Importable;
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {

        try {
            return new User([
                'security_id' => $row['security_id'],
                'name'        => $row['name'],
                'email'       => $row['email'],
                'phone'       => $row['phone'],
                'address'     => $row['address'],
                'password'    => Hash::make($row['password']),
            ]);
        } catch (Throwable $e) {
            // Handle the error, log it, or perform any necessary actions
            // For example, you can log the error message:
            \Log::error($e->getMessage());

            // Return null to skip the row and continue importing other rows
            return null;
        }
    }

    public function onError(Throwable $error)
    {
        // Handle the error, log it, or perform any necessary actions
        // For example, you can log the error message:
        \Log::error($error->getMessage());
    }
}
