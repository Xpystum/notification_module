<?php

namespace App\Modules\Notification\Drivers;

use App\Modules\Notification\DTO\Base\BaseDto;
use App\Modules\Notification\DTO\SmtpDto;
use App\Modules\Notification\Interface\NotificationDriverInterface;

class SmtpDriver implements NotificationDriverInterface
{
    public function send(BaseDto $dto)
    {
        if ($dto instanceof SmtpDto) {
            // Логика отправки почты через SMTP
            dd('SmtpDriver');
        }
        throw new \InvalidArgumentException("Invalid DTO type");
    }
}
