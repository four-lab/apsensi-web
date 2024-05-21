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

if (!function_exists('obfuscate_email')) {
    function obfuscate_email(string $email)
    {
        $parts = explode('@', $email);
        $domain = array_pop($parts);
        $name = implode('@', $parts);
        $hiddenName = str_repeat('*', strlen($name));

        return $hiddenName . '@' . $domain;
    }
}
