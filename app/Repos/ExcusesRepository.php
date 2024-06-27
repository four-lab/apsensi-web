<?php

namespace App\Repos;

use App\Enums\AttendanceStatus;
use App\Enums\ExcuseStatus;
use App\Models\Attendance;
use App\Models\Employee;
use App\Models\Excuse;
use Carbon\Carbon;

class ExcusesRepository
{
    public static function create(Employee $employee, array $data): Excuse
    {
        $data['employee_id'] = $employee->id;
        $data['document'] = $data['document']->storePublicly('excuses', 'public');
        $data['date_start'] = $data['date'] ?? now();
        $data['date_end'] = Carbon::createFromFormat('Y-m-d', $data['date_start'])
            ->addDays($data['duration']);

        return Excuse::create($data);
    }

    public static function confirm(Excuse $excuse): void
    {
        $start = $excuse->date_start->format('Y-m-d');
        $end = $excuse->date_end->format('Y-m-d');
        $attendances = Attendance::whereNull('time_start')
            ->whereDate('date', '>=', $start)
            ->whereDate('date', '<=', $end)
            ->where('employee_id', $excuse->employee_id);

        $excuse->update(['status' => ExcuseStatus::ACCEPTED]);
        $attendances->update(['status' => AttendanceStatus::EXCUSED]);
    }

    public static function reject(Excuse $excuse): void
    {
        $start = $excuse->date_start->format('Y-m-d');
        $end = $excuse->date_end->format('Y-m-d');
        $attendances = Attendance::whereNull('time_start')
            ->whereDate('date', '>=', $start)
            ->whereDate('date', '<=', $end)
            ->where('employee_id', $excuse->employee_id)
            ->get();

        $excuse->update(['status' => ExcuseStatus::REJECTED]);
        $attendances->map(function ($att) use ($excuse) {
            $status = $att->date->isSameDay(now()) ?
                null : AttendanceStatus::ABSENT;

            $att->update(compact('status'));
        });
    }
}
