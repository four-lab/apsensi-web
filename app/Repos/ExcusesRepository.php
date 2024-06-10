<?php

namespace App\Repos;

use App\Models\Excuses;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class ExcusesRepository
{
    public static function show()
    {
        return Excuses::all();
    }
    public static function create(array $data) : Excuses
    {
        $data['document'] = $data['document']->store('public/excuses');

        return Excuses::create($data);       
    }
}