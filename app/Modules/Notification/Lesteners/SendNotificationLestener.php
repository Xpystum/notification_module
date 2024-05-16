<?php

namespace App\Modules\Notification\Lesteners;

use App\Modules\Notification\Events\SendNotificationEvent;
use App\Modules\Notification\Models\Notification;
use App\Modules\Notification\Notify\SendMessageSmtpNotification;
use App\Modules\Notification\Services\NotificationService;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Log;

class SendNotificationLestener //implements ShouldQueue
{

    private $service;

    public function __construct(NotificationService $service)
    {
        $this->service = $service;
    }

    public function handle(SendNotificationEvent $event, ): void
    {
        /**
        * @var Notification
        */
        $notifyModel = $this->service->createNotification()
                    ->user($event->user)
                    ->method($event->notifyMethod)
                    ->run();
        Log::info("зашли в event " . $notifyModel);

        $notification = new SendMessageSmtpNotification($notifyModel);
        $event->user->notify($notification);
    }
}
