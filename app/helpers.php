<?php

use App\Repos\SettingRepository;

if (!function_exists('setting')) {
    function setting($key, bool $isJson = false, $default = null)
    {
        return app(SettingRepository::class)->get($key, $isJson) ?? $default;
    }
}

if (!function_exists('save_setting')) {
    function save_setting($key, $value)
    {
        return app(SettingRepository::class)->set($key, $value);
    }
}
