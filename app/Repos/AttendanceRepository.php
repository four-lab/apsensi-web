<?php

namespace App\Repos;

use App\Enums\AttendanceStatus;
use App\Models\Attendance;
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

    public function endUfinished(string $date): void
    {
        $attendances = Attendance::where('date', '<', $date)
            ->where('status', '!=', AttendanceStatus::ABSENT)
            ->get();

        $attendances->map(fn ($att) => $att->update(['time_end' => $att->subject_end]));
    }

    private function isHoliday(string $date): bool
    {
        return Holiday::where(function ($q) use ($date) {
            $q->where('date_start', '<=', $date);
            $q->where('date_end', '>=', $date);
        })->exists();
    }
}
