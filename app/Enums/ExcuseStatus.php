<?php

namespace App\Enums;

enum ExcuseStatus: string
{
    use EnumHelper;

    case ACCEPTED = 'accepted';
    case REJECTED = 'rejected';
    case PENDING = 'pending';
}
