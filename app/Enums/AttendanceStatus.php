<?php

namespace App\Enums;

use App\Enums\EnumHelper;

enum AttendanceStatus: string
{
    use EnumHelper;

    case PRESENT = 'present';
    case LATE = 'late';
    case ABSENT = 'absent';
    case EXCUSED = 'excused';
}
