<?php

namespace App\Modules\Notification\Lesteners;

use App\Models\User;
use App\Modules\Notification\Enums\ActiveStatusEnum;
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

    public function handle(SendNotificationEvent $event): void
    {
        switch($event->notifyMethod->name->value)
        {
            case 'email':
            {
                $this->notificationEmail($event);
                break;
            }

            case 'phone':
            {
                ##метода для телефона
                break;
            }

            default:
            {
                throw new \InvalidArgumentException("Invalid MethodName");
                Log::info("Ошибка выбора Метода нотификации: " . now() . ' ----> ' . __DIR__ );
                break;
            }
        }

    }

    private function notificationEmail(SendNotificationEvent $event)
    {
        $user = $event->user;

        /**
        * @var Notification
        */
        $notifyModel = $user->lastNotify;

        if($this->existNotificationModelAndComplteted($notifyModel))
        {

            Log::info("зашли в event - где заявка уже выполнена" . now());
            return;
        }


        if($this->existNotificationModelAndPending($notifyModel))
        {
            $status = $this->service->updateNotification()
                ->updateCode()
                ->run($notifyModel);

            !($status) ? Log::info("при обновлении coda в модели Notification произошла ошибка: " . now()) : '' ;

            $notification = new SendMessageSmtpNotification($notifyModel);
            $event->user->notify($notification);

            return;

        } else {

            /**
            * @var Notification
            */
            $notifyModel = $this->service->createNotification()
            ->user($event->user)
            ->method($event->notifyMethod)
            ->run();

            $notification = new SendMessageSmtpNotification($notifyModel);
            $event->user->notify($notification);
        }
    }

    //существует ли уже заявка на подвтреждение в статусе completed
    private function existNotificationModelAndComplteted(Notification $notifyModel)
    {

        if($notifyModel && ActiveStatusEnum::completed->is($notifyModel->status))
        {
            return true;
        }

        return false;

    }

    //существует ли уже заявка на подвтреждение в статусе pending
    private function existNotificationModelAndPending(Notification $notifyModel)
    {

        if($notifyModel && ActiveStatusEnum::pending->is($notifyModel->status))
        {
            return true;
        }

        return false;
    }
}
