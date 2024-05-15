<?php

namespace App\Modules\Notification\Traits;

use App\Modules\Notification\Repositories\NotificationMethodRepository;

trait ConstructRepository
{
    public function __construct(

        public NotificationMethodRepository $repositoryMethod

    ) { }
}
