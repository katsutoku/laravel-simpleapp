<?php

namespace App\Listeners;

use Illuminate\Auth\Events\Login;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Cookie;
use App\Models\LoginDevice;

class RecordLoginDevice
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(Login $event): void
    {
        $token = Str::random(60);

        LoginDevice::create([
            'user_id' => $event->user->id,
            'device_token' => hash('sha256', $token),
            'ip_address' => request()->ip(),
            'user_agent' => request()->userAgent(),
            'last_login_at' => now(),
            'expires_at' => now()->addDays(30),
        ]);

        Cookie::queue('device_token', $token, 60 * 24 * 30, null, null, false, true);
    }
}