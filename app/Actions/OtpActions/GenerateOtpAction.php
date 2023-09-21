<?php

namespace App\Actions\OtpActions;

use App\Models\OTP;

class GenerateOtpAction
{
    public function execute(int $userId)
    {
        $otp = OTP::create([
            'otp' => rand(1000, 9999),
            'user_id' => $userId,
            'expire_at' => now()->addMinutes(10),
        ]);

        return $otp->otp;
    }
}
