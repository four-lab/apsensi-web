<?php

namespace App\Models;

use App\Enums\AttendanceStatus;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attendance extends Model
{
    use HasFactory;

    protected $fillable = [
        'employee_id',
        'subject_id',
        'date',
        'time_start',
        'time_end',
        'status',
    ];

    protected $casts = [
        'status' => AttendanceStatus::class,
    ];
}
