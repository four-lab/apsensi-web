<?php

namespace App\Enums;

use App\Enums\EnumHelper;

enum AttendanceStatus: string
{
    use EnumHelper;

    case ABSENT = 'absent';
    case EXCUSED = 'excused';
    case LATE = 'late';
    case PRESENT = 'present';
}
