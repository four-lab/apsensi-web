<?php

namespace App\Jobs;

use App\Mail\OtpVerification;
use App\Models\Otp;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;

class SendOtp implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     */
    public function __construct(
        private Otp $otp
    ) {
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        Mail::to($this->otp->user)->send(
            new OtpVerification($this->otp)
        );
    }
}
