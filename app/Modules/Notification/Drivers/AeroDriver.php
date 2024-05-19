<?php

namespace App\Modules\Notification\Drivers;

use App\Modules\Notification\Drivers\Base\BaseDriver;
use App\Modules\Notification\DTO\AeroDTO;
use App\Modules\Notification\DTO\Base\BaseDto;
use App\Modules\Notification\Interface\NotificationDriverInterface;

class AeroDriver extends BaseDriver implements NotificationDriverInterface
{
    public function send(BaseDto $dto) : void
    {
        if ($dto instanceof AeroDTO) {
            // Логика отправки почты через Aero Phone
            dd('AeroDriver');
        }
        throw new \InvalidArgumentException("Invalid DTO type");
    }

    public function getNameString() : string
    {
        return $this->name->value;
    }
}
