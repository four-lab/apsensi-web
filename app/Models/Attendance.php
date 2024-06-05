<?php

namespace App\Models;

use App\Enums\AttendanceStatus;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attendance extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'employee_id',
        'classroom_id',
        'subject_id',
        'subject_start',
        'subject_end',
        'date',
        'time_start',
        'time_end',
        'status',
    ];

    protected $casts = [
        'status' => AttendanceStatus::class,
    ];

    public function employee()
    {
        return $this->belongsTo(Employee::class);
    }

    public function classroom()
    {
        return $this->belongsTo(Classroom::class);
    }

    public function subject()
    {
        return $this->belongsTo(Subject::class);
    }
}
