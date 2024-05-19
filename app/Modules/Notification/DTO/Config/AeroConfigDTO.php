<?php

namespace App\Modules\Notification\DTO\Config;

class AeroConfigDTO
{
    public function __construct(
        public string $email,
        public string $apiKey,
    ) { }
}
