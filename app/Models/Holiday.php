<?php

namespace App\Models;

use App\Enums\HolidayType;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Holiday extends Model
{
    use HasFactory;

    protected $fillable = [
        'information',
        'date_start',
        'date_end',
        'type',
    ];

    protected $casts = [
        'date_start' => 'date',
        'date_end' => 'date',
        'type' => HolidayType::class,
    ];
}
