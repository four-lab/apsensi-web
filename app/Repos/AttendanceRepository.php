<?php

namespace App\Repos;

use App\Enums\AttendanceStatus;
use App\Enums\ExcuseStatus;
use App\Models\Attendance;
use App\Models\Employee;
use App\Models\Excuse;
use App\Models\Holiday;
use App\Models\Schedule;
use Carbon\Carbon;

class AttendanceRepository
{
    public function insertDaily(string $date)
    {
        $date = Carbon::createFromFormat('Y-m-d', $date);

        if ($this->isHoliday($date->format('Y-m-d')))
            return false;

        $schedules = Schedule::where('day', $date->format('N'))->get();

        $schedules->map(function ($schedule) use ($date) {
            Attendance::firstOrCreate([
                'employee_id' => $schedule->employee_id,
                'classroom_id' => $schedule->classroom_id,
                'subject_id' => $schedule->subject_id,
                'date' => $date->format('Y-m-d'),
            ], [
                'subject_start' => $schedule->time_start,
                'subject_end' => $schedule->time_end,
            ]);
        });
    }

    public function makeAbsent(string $date): void
    {
        Attendance::where('date', '<', $date)->whereNull('time_start')
            ->update(['status' => AttendanceStatus::ABSENT]);
    }

    public function makeExcused(string $date): void
    {
        $excuses = Excuse::where('status', ExcuseStatus::ACCEPTED)
            ->whereDate('date_start', '<=', $date)
            ->whereDate('date_end', '>=', $date)
            ->pluck('employee_id');

        Attendance::where('date', $date)
            ->whereNull('time_start')
            ->whereIn('employee_id', $excuses)
            ->update(['status' => AttendanceStatus::EXCUSED]);
    }

    public function endUnfinished(string $date): void
    {
        $attendances = Attendance::where('date', '<', $date)
            ->where('status', '!=', AttendanceStatus::ABSENT)
            ->get();

        $attendances->map(fn ($att) => $att->update(['time_end' => $att->subject_end]));
    }

    public function getStatus(Employee $employee)
    {
        $datetime = Carbon::now();
        $attemptedAttendance = Attendance::where('employee_id', $employee->id)
            ->where('date', $datetime->format('Y-m-d'))
            ->whereNotNull('status')
            ->exists();

        $activeSchedule = Attendance::where('employee_id', $employee->id)
            ->where('date', $datetime->format('Y-m-d'))
            ->where(function ($query) {
                $query->whereNull('time_start');
                $query->orWhereNull('time_end');
            })
            ->whereTime('subject_start', '<=', $datetime->format('H:i:s'))
            ->whereTime('subject_end', '>=', $datetime->format('H:i:s'))
            ->first();

        $canAttempt = $activeSchedule ? true : false;
        $isActive = $activeSchedule ?
            ($activeSchedule->time_start && !$activeSchedule->time_end) : false;

        return (object) [
            'canAttempt' => $canAttempt,
            'alreadyScanned' => $attemptedAttendance,
            'isActive' => $isActive,
            'attendance' => $activeSchedule,
        ];
    }

    private function isHoliday(string $date): bool
    {
        return Holiday::where(function ($q) use ($date) {
            $q->where('date_start', '<=', $date);
            $q->where('date_end', '>=', $date);
        })->exists();
    }
}
