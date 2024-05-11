<?php

namespace App\Repos;

use App\Exceptions\ScheduleException;
use App\Models\Schedule;

class ScheduleRepository
{
    public function create(array $data)
    {
        $isOverlapping = Schedule::where('day', $data['day'])
            ->where('classroom_id', $data['classroom_id'])
            ->where(function ($query) use ($data) {
                $query->where('time_start', '<=', $data['time_end'])
                    ->where('time_end', '>=', $data['time_start']);
            })->exists();

        if ($isOverlapping)
            throw new ScheduleException('Jadwal telah ada pada jam tersebut');

        return Schedule::create($data);
    }
}
