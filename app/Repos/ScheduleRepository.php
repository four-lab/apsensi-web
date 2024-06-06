<?php

namespace App\Repos;

use App\Exceptions\ScheduleException;
use App\Models\Employee;
use App\Models\Schedule;

class ScheduleRepository
{
    public function create(array $data)
    {
        $bufferTime = 60;

        $timeStart = strtotime($data['time_start']) + $bufferTime;
        $timeEnd = strtotime($data['time_end']) - $bufferTime;

        $isOverlapping = Schedule::where('day', $data['day'])
            ->where('classroom_id', $data['classroom_id'])
            ->where(function ($query) use ($timeStart, $timeEnd) {
                $query->where('time_start', '<=', date('H:i:s', $timeEnd))
                    ->where('time_end', '>=', date('H:i:s', $timeStart));
            })->exists();

        if ($isOverlapping)
            throw new ScheduleException('Jadwal telah ada pada jam tersebut');

        return Schedule::create($data);
    }

    public static function getByDate(string $date, ?Employee $employee = null)
    {
        $timestamp = strtotime($date);
        $day = date('N', $timestamp);

        $schedule =  Schedule::where('day', $day)
            ->with('subject', 'employee', 'classroom');

        if ($employee)
            $schedule = $schedule->where('employee_id', $employee->id);

        return $schedule->get();
    }
}
