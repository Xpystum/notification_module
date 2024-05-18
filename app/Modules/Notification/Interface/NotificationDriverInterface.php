<?php

namespace App\Modules\Notification\Interface;

use App\Modules\Notification\DTO\Base\BaseDto;
use Illuminate\Database\Eloquent\Model;

interface NotificationDriverInterface
{

    public function send(BaseDto $dto) : void;
    public function getMethodDriver() : Model;
    // public function check() : bool;
    public function check();
}
