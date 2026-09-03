<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Event;
use Illuminate\Auth\Events\Login;
use App\Listeners\RecordLoginDevice;
use App\Listeners\PreventSuspendedUserLogin;

class AppServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        //
    }

    public function boot(): void
    {
        Event::listen(Login::class, PreventSuspendedUserLogin::class);
        Event::listen(Login::class, RecordLoginDevice::class);
    }
}
