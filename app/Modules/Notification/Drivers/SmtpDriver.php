<?php

namespace App\Modules\Notification\Drivers;

use App\Modules\Notification\Drivers\Base\BaseDriver;
use App\Modules\Notification\DTO\Base\BaseDto;
use App\Modules\Notification\DTO\SmtpDto;
use App\Modules\Notification\Events\SendNotificationEvent;
use App\Modules\Notification\Interface\NotificationDriverInterface;


class SmtpDriver extends BaseDriver implements NotificationDriverInterface
{

    public function send(BaseDto $dto) : void
    {
        if ($dto instanceof SmtpDTO) {
            event(new SendNotificationEvent($dto->user, $this->getMethodDriver()) );
        } else {
            throw new \InvalidArgumentException("Invalid DTO type");
        }
    }

    public function check()
    {

    }


    public function getNameString() : string
    {
        return $this->name->value;
    }
}
