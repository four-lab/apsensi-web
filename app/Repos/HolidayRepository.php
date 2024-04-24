<?php

namespace App\Repos;

use App\Enums\HolidayType;
use App\Models\Holiday;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Http;

class HolidayRepository
{
    public static function get(int $month, int $year): Collection
    {
        (new self)->syncHoliday($month, $year);

        return Holiday::where(function ($query) use ($month, $year) {
            $query->whereYear('date_start', $year)
                ->whereMonth('date_start', $month);
        })->orWhere(function ($query) use ($month, $year) {
            $query->whereYear('date_end', $year)
                ->whereMonth('date_end', $month);
        })->get();
    }

    private function syncHoliday(int $month, int $year): void
    {
        $loadedHolidays = setting('holidays', true, []);

        if (in_array("{$month}-{$year}", $loadedHolidays))
            return;

        $response = Http::get(
            'https://api-harilibur.vercel.app/api',
            compact('month', 'year')
        );

        $holidays = $this->parseHoliday(
            array_filter(
                $response->object() ?? [],
                fn ($holiday) => $holiday->is_national_holiday
            )
        );

        array_map(fn ($holiday) => Holiday::create($holiday), $holidays);
        save_setting('holidays', array_merge($loadedHolidays, ["{$month}-{$year}"]));
    }

    private function parseHoliday(array $holidays): array
    {
        $groupedHolidays = [];
        $parsedHolidays = [];

        foreach ($holidays as $holiday)
            $groupedHolidays[$holiday->holiday_name][] = $holiday->holiday_date;

        foreach ($groupedHolidays as $name => $dates)
            $parsedHolidays[] = [
                'information' => $name,
                'date_start' => min($dates),
                'date_end' => max($dates),
                'type' => HolidayType::REGULAR,
            ];

        return $parsedHolidays;
    }
}
