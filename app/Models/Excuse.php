<?php

namespace App\Models;

use App\Enums\ExcuseStatus;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Excuse extends Model
{
    use HasFactory;

    protected $fillable = [
        'date_start',
        'date_end',
        'type',
        'status',
        'description',
        'document',
    ];

    protected $casts = [
        'status' => ExcuseStatus::class,
        'date_start' => 'date',
        'date_end' => 'date',
    ];
}
