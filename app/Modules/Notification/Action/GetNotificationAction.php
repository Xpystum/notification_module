<?php

namespace App\Modules\Notification\Action;

use App\Models\User;
use App\Modules\Notification\Models\NotificationMethod;
use App\Modules\Notification\Traits\ConstructNotifyRepository;

#TODO сделать возврат нотификации в зависимости от условий
class GetNotificationAction
{
    use ConstructNotifyRepository;

    private readonly User $user;

    private NotificationMethod $notifyMethod;

    public function user(User $user): static
    {
        $this->user = $user;
        return $this;
    }

    public function notifyMethod(NotificationMethod $notifyMethod): static
    {
        $this->notifyMethod = $notifyMethod;
        return $this;
    }

}
