<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Excuses extends Model
{
    use HasFactory;

    protected $fillable = [
        'type',
        'status',
        'description',
        'document',
    ];
}
