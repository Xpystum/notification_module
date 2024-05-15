<?php

namespace App\Modules\Notification\Action;

use App\Modules\Notification\Enums\ActiveStatusEnum;
use App\Modules\Notification\Enums\NotificationDriverEnum;
use App\Modules\Notification\Models\Notification;
use App\Modules\Notification\Models\NotificationMethod;

class CreateNotificationAction
{
    private readonly NotificationMethod $method;

     /**
     * установка метода нотификации
     *
     * @param NotificationMethod $driver
     * @return static
     *
     */
    public function method(NotificationMethod $method) : static
    {
        $this->method = $method;

        return $this;
    }

    public function run() : ?Notification
    {
        if(!is_null($this->method))
        {
            $model = Notification::query()
                ->create([
                    'method_id' => $this->method->id,
                    'status' => ActiveStatusEnum::pending->value,
                ]);

            return $model;
        }

        return null;
    }
}
