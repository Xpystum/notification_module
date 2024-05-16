<?php

namespace App\Modules\Notification\View\Http\Controllers;

use App\Models\User;
use App\Modules\Notification\DTO\SmtpDTO;
use App\Modules\Notification\Services\NotificationService;
use App\Modules\Notification\Models\NotificationMethod;

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

        // $service->sendNotification()
        //     ->typeDriver('smtp')
        //     ->dto(new SmtpDto)
        //     ->run();

        // $service->updateNotification()->updateCode()->run($model);

        /**
        * @var User
        */
        $user = User::first();

        $service->sendNotification()
            ->typeDriver('smtp')
            ->dto(new SmtpDTO($user))->run();

    }
}
