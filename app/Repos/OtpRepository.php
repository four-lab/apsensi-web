<?php

namespace App\Repos;

use App\Jobs\SendOtp;
use App\Models\Employee;
use App\Models\Otp;
use App\Models\User;

class OtpRepository
{
    public static function send(User|Employee $model): Otp
    {
        $otp = Otp::updateOrCreate([
            'model_type' => $model::class,
            'model_id' => $model->id,
        ], [
            'expired' => now()->addMinute(10),
        ]);

        SendOtp::dispatch($otp);
        return $otp;
    }
}
