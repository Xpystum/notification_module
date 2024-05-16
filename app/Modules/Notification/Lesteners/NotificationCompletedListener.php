<?php

namespace App\Modules\Notification\Lesteners;

use App\Modules\Notification\Events\NotificationEvent;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Log;

class NotificationCompletedListener implements ShouldQueue
{
    public function __construct()
    {

    }

    public function handle(NotificationEvent $event): void
    {
        $update = $event->model->update(['status' => $event->status]);

        (!$update) && Log::info('Ошибка обновление статуса в Notification: '. now());
    }
}
