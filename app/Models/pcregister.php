<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pcregister extends Model
{
    use HasFactory;
    protected $fillable=[
        "user_id",
        "username",
        "photo",
        "description",
        "pc_name",
        "serial_number"
    ];
} 
