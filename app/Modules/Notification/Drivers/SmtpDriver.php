<?php

namespace App\Modules\Notification\Drivers;

use App\Modules\Notification\DTO\Base\BaseDto;
use App\Modules\Notification\DTO\SmtpDto;
use App\Modules\Notification\Enums\NotificationDriverEnum;
use App\Modules\Notification\Events\SendNotificationEvent;
use App\Modules\Notification\Interface\NotificationDriverInterface;
use App\Modules\Notification\Models\NotificationMethod;
use App\Modules\Notification\Services\NotificationService;
use Illuminate\Support\Facades\Log;

class SmtpDriver implements NotificationDriverInterface
{
    private NotificationDriverEnum $name;
    private NotificationService $services;

    public function __construct()
    {
        $this->services = app(NotificationService::class);
        $this->name = NotificationDriverEnum::objectByName('smtp');
    }

    public function send(BaseDto $dto) : void
    {

        if ($dto instanceof SmtpDTO) {

            event(new SendNotificationEvent($dto->user, $this->getMethodDriver()) );

        } else {

            throw new \InvalidArgumentException("Invalid DTO type");

        }

    }


    public function getMethodDriver() : NotificationMethod
    {
        return $this->services->getNotificationMethod()
            ->activeCache()
            ->methodDriver($this->name)
            ->first();
    }
}
