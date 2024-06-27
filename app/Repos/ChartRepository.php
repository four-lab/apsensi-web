<?php

namespace App\Repos;

use App\Enums\AttendanceStatus;
use App\Models\Attendance;

class ChartRepository
{
    private $months = [
        '1' => 'Januari',
        '2' => 'Februari',
        '3' => 'Maret',
        '4' => 'April',
        '5' => 'Mei',
        '6' => 'Juni',
        '7' => 'Juli',
        '8' => 'Agustus',
        '9' => 'September',
        '10' => 'Oktober',
        '11' => 'November',
        '12' => 'Desember',
    ];

    private $status = [
        'absent' => 'Absen',
        'present' => 'Hadir',
        'late' => 'Terlambat',
        'excused' => 'Izin',
    ];

    public function getData(int $months)
    {
        $month = now()->subMonth($months - 1);
        $attendances = Attendance::selectRaw('MONTH(`date`) AS month, COUNT(*) AS total, status')
            ->where('date', '>=', $month)
            ->groupByRaw('MONTH(date), status')
            ->get();

        $months = array_reverse(range(now()->format('m'), $month->format('m')));

        return [
            'months' => array_map(fn ($month) => $this->months[$month], $months),
            'series' => array_map(function ($status) use ($months, $attendances) {
                $status = AttendanceStatus::tryFrom($status);

                return [
                    'name' => $this->status[$status->value],
                    'data' => $this->seriesData($months, $status, $attendances),
                ];
            }, AttendanceStatus::values()),
        ];
    }

    private function seriesData(array $months, AttendanceStatus $status, $attendances)
    {
        $filtered = $attendances->filter(fn ($att) => $att->status == $status);

        return array_map(function ($month) use ($filtered) {
            return $filtered->where('month', $month)->first()->total ?? 0;
        }, $months);
    }
}
