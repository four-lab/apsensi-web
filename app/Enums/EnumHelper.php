<?php

namespace App\Enums;

trait EnumHelper
{
    public static function values()
    {
        return array_map(function ($value) {
            return $value->value;
        }, self::cases());
    }
}
