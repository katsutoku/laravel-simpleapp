<?php

namespace App\Listeners;

use Illuminate\Auth\Events\Login;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;
use Laravel\Fortify\Fortify;

class PreventSuspendedUserLogin
{
    public function handle(Login $event): void
    {
        if ($event->user->status === 'suspended') {
            Auth::logout();
            request()->session()->invalidate();
            request()->session()->regenerateToken();

            throw ValidationException::withMessages([
                Fortify::username() => 'このアカウントは停止されています。',
            ]);
        }
    }
}