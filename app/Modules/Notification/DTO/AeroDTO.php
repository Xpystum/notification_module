<?php

namespace App\Modules\Notification\DTO;

use App\Modules\Notification\DTO\Base\BaseDTO;

class AeroDTO extends BaseDTO
{
    public function __construct(
        public string $number,
        public string $sign,
        public string $text,
        public ?string $callbackUrl,
    ) { }
}
