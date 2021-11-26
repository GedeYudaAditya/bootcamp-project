<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class akun extends Model
{
    use HasFactory;

    protected $guarded = [
        'Id_akun'
    ];

    protected $hidden = [
        'Password'
    ];
}
