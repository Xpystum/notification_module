<?php

namespace App\Modules\Notification\Enums;

enum NotificationDriverEnum: string
{
    case aero = 'aero';

    case smtp = 'smtp';

    // public function name(): string
    // {
    //     return match($this){

    //         self::test => 'Тестовый провайдер',
    //         self::ykassa => 'Юкасса',

    //     };
    // }

    // private function is(PaymentDriverEnum $status): bool
    // {
    //     return $this === $status;
    // }

    // public function isTest(): bool
    // {
    //     return $this->is(PaymentDriverEnum::test);
    // }

}
