<?php

namespace App\Providers;

use App\Modules\Notification\Events\SendNotificationEvent;
use App\Modules\Notification\Lesteners\SendNotificationLestener;
use Illuminate\Support\Facades\Event;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {

        Event::listen(
            SendNotificationEvent::class,
            SendNotificationLestener::class,
        );
    }
}
