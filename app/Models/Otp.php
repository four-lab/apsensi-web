<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Otp extends Model
{
    use HasFactory;

    protected $fillable = [
        'model_type',
        'model_id',
        'code',
        'expired',
    ];

    protected $casts = [
        'expired' => 'datetime',
    ];

    public function user()
    {
        return $this->morphto(__FUNCTION__, 'model_type', 'model_id');
    }

    protected static function boot()
    {
        parent::boot();

        static::creating(function (Otp $model) {
            do {
                $model->code = random_int(100000, 999999);
            } while (self::where('code', $model->code)->exists());
        });

        static::updating(function ($otp) {
            do {
                $otp->code = random_int(100000, 999999);
            } while (self::where('code', $otp->code)->exists());
        });
    }
}
