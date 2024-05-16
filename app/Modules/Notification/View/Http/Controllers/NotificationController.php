<?php

namespace App\Modules\Notification\View\Http\Controllers;

use App\Modules\Notification\DTO\AeroDTO;
use App\Modules\Notification\DTO\SmtpDto;
use App\Modules\Notification\Enums\MethodNotificationEnum;
use App\Modules\Notification\Services\NotificationService;
use App\Modules\Notification\Models\NotificationMethod;
use Illuminate\Support\Facades\Log;

use function App\Modules\Notification\Helpers\code;

class NotificationController
{
    public function __invoke(NotificationService $service)
    {

        /**
        * @var NotificationMethod
        */
        // $modelMethod = $service->getNotificationMethod()
        //             ->activeCache()
        //             ->methodEnum(MethodNotificationEnum::phone)
        //             ->first();

        // $model = $service->createNotification()
        //         ->method($modelMethod)
        //         ->run();

        $service->sendNotification()
            ->typeDriver('aero')
            ->dto(new AeroDTO)
            ->run();
        // $service->updateNotification()->updateCode()->run($model);


    }
}
