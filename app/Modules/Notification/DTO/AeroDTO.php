<?php

namespace App\Modules\Notification\DTO;

use App\Models\User;
use App\Modules\Notification\DTO\Base\BaseDTO;
use App\Modules\Notification\DTO\Config\AeroConfigDTO;
use App\Modules\Notification\DTO\Phone\AeroPhoneDTO;

class AeroDTO extends BaseDTO
{
    public function __construct(

        public AeroConfigDTO $config,
        public User $user,
        public AeroPhoneDTO $phoneData,

    ) { }
}
