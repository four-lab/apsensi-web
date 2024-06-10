<?php

namespace App\Repos;

use App\Models\Excuse;

class ExcusesRepository
{
    public static function create(array $data): Excuse
    {
        $data['document'] = $data['document']->storePublicly('excuses', 'public');
        $data['date_start'] = now();
        $data['date_end'] = now()->addDays($data['duration']);

        return Excuse::create($data);
    }
}
