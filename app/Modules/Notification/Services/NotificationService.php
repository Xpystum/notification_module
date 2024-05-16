<?php

namespace App\Modules\Notification\Services;

use App\Modules\Notification\Action\CompleteNotificationAction;
use App\Modules\Notification\Action\CreateNotificationAction;
use App\Modules\Notification\Action\ExpiredNotificationAction;
use App\Modules\Notification\Action\GetMethodAction;
use App\Modules\Notification\Action\SendNotificationAction;
use App\Modules\Notification\Action\UpdateNotificationAction;
use App\Modules\Notification\Drivers\Factory\NotificationDriverFactory;
use App\Modules\Notification\Enums\NotificationDriverEnum;
use App\Modules\Notification\Interface\NotificationDriverInterface;
use App\Modules\Notification\Models\Notification;

class NotificationService
{

    public function getDriver(NotificationDriverEnum $driver): NotificationDriverInterface
    {
        return app(NotificationDriverFactory::class)->make($driver);
    }

    public function getNotificationMethod()
    {
        return app(GetMethodAction::class);
    }

    public function createNotification() : CreateNotificationAction
    {
        return app(CreateNotificationAction::class);
    }

    public function updateNotification() : UpdateNotificationAction
    {
        return app(UpdateNotificationAction::class);
    }

    public function completeNotification() : CompleteNotificationAction
    {
        return app(CompleteNotificationAction::class);
    }

    public function expiredNotification() : ExpiredNotificationAction
    {
        return app(ExpiredNotificationAction::class);
    }

    public function sendNotification() : SendNotificationAction
    {
        return new SendNotificationAction($this);
    }
    // public function waitingPayment() : WaitingPaymentAction
    // {
    //     return app(WaitingPaymentAction::class);
    // }

    // public function cancelPayment() : CancelPaymentAction
    // {
    //     return app(CancelPaymentAction::class);
    // }


}
