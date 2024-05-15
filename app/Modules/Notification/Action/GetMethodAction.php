<?php

namespace App\Modules\Notification\Action;

use App\Modules\Notification\Enums\MethodNotificationEnum;
use App\Modules\Notification\Repositories\NotificationMethodRepository;
use App\Modules\Notification\Traits\ConstructRepository;
use Illuminate\Support\Facades\Cache;

class GetMethodAction
{
    use ConstructRepository;

    private readonly MethodNotificationEnum $enum;

    private bool $flag = false;

    public function activeCache() : static
    {
        $this->flag = true;

        return $this;
    }

    public function methodEnum(MethodNotificationEnum $enum) : static
    {
        $this->enum = $enum;

        return $this;
    }

    public function first()
    {

        if($this->flag){

            $valueCache = Cache::remember('notificationMethod', 360, function ()  {

                return $this->repositoryMethod->getMethodsAll();

            });

            return $valueCache->firstWhere('name', $this->enum);
        }

        return $this->repositoryMethod->getMethodByEnum($this->enum);

    }

}
