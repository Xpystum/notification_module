<?php

namespace App\Modules\Notification\Events;

use App\Models\User;
use App\Modules\Notification\Models\NotificationMethod;
use Illuminate\Contracts\Events\ShouldDispatchAfterCommit;

class SendNotificationEvent //implements ShouldDispatchAfterCommit
{

    public function __construct(

        public User $user,
        public NotificationMethod $notifyMethod,

    ) {  }

}
