<?php

namespace App\Repos;

use App\Models\Excuse;

class ExcusesRepository
{
    public static function create(array $data): Excuse
    {
        $data['document'] = $data['document']->storePublicly('excuses', 'public');
        return Excuse::create($data);
    }
}
