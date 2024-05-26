<?php

namespace App\Models;

use App\Enums\Gender;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laravel\Sanctum\HasApiTokens;

class Employee extends Authenticatable
{
    use HasFactory, HasApiTokens;

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