<?php

namespace App\Services;

use App\Exceptions\OtpException;
use App\Models\Employee;
use App\Models\Otp;
use App\Models\User;

class OtpService
{
    public static function verify(User|Employee $user, string $otp, bool $isDeleted = true)
    {
        $otp = Otp::where([
            'model_type' => $user::class,
            'model_id' => $user->id,
            'code' => $otp,
        ])->first();

        if (!$otp)
            return throw new OtpException('Kode OTP Tidak Valid');

        if ($otp->expired->lt(now())) {
            $otp->delete();
            return throw new OtpException('Kode OTP Telah Kadaluarsa');
        }

        if ($isDeleted)
            $otp->delete();

        return true;
    }
}
