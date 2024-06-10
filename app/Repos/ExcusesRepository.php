<?php

namespace App\Repos;

use App\Models\Excuse;
use Carbon\Carbon;

class ExcusesRepository
{
    public static function create(array $data): Excuse
    {
        $data['document'] = $data['document']->storePublicly('excuses', 'public');
        $data['date_start'] = $data['date'] ?? now();
        $data['date_end'] = Carbon::createFromFormat('Y-m-d', $data['date_start'])
            ->addDays($data['duration']);

        return Excuse::create($data);
    }
}
