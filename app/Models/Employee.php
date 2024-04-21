<?php

namespace App\Models;

use App\Enums\Gender;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;

    protected $fillable = [
        'nik',
        'email',
        'username',
        'password',
        'fullname',
        'birthplace',
        'birthdate',
        'photos',
        'gender',
        'address',
    ];

    protected $casts = [
        'photos' => 'object',
        'gender' => Gender::class,
        'birthdate' => 'date',
    ];
}
