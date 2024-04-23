<?php

namespace App\Repos;

use App\Models\Setting;

class SettingRepository
{
    public function get(string $key, bool $isJson = false)
    {
        $value = Setting::where('key', $key)->first();

        if (!is_null($value))
            return $isJson ? json_decode($value->value) : $value->value;

        return null;
    }

    public function set(string $key, $value)
    {
        $setting = Setting::where('key', $key)->first();
        $value = is_string($value) ? $value : json_encode($value);

        if (!$setting)
            return Setting::create(compact('key', 'value'));

        $setting->update(compact('value'));
        return $setting;
    }
}
