<?php

namespace App\Modules\Notification\Drivers;

use App\Modules\Notification\DTO\AeroDTO;
use App\Modules\Notification\DTO\Base\BaseDto;
use App\Modules\Notification\Interface\NotificationDriverInterface;

class AeroDriver implements NotificationDriverInterface
{
    public function send(BaseDto $dto)
    {
        if ($dto instanceof AeroDTO) {
            // Логика отправки почты через Aero Phone
            dd('AeroDriver');
        }
        throw new \InvalidArgumentException("Invalid DTO type");
    }
}
