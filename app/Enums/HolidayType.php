<?php

namespace App\Enums;

enum HolidayType: string
{
    use EnumHelper;

    case REGULAR = 'regular';
    case EDUCATIONAL = 'educational';
}
