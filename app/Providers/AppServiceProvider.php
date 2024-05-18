<?php

namespace App\Providers;

use App\Modules\Notification\Events\NotificationEvent;
use App\Modules\Notification\Events\SendNotificationEvent;
use App\Modules\Notification\Lesteners\NotificationChangeStatusListener;
use App\Modules\Notification\Lesteners\SendNotificationLestener;
use App\Modules\User\Console\Commands\CreateUserCommand;
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

        $this->commands([
            CreateUserCommand::class,
        ]);

        Event::listen(
            SendNotificationEvent::class,
            SendNotificationLestener::class,
        );

        Event::listen(
            NotificationEvent::class,
            NotificationChangeStatusListener::class,
        );
    }
}
