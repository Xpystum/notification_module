<?php

namespace App\Modules\Notification\DTO\Phone;

class AeroPhoneDTO
{
    public function __construct(

        public string $number,
        public string $sign,
        public string $text,
        public ?string $callbackUrl,

    ) { }

}
