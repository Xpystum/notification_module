<?php

namespace App\Modules\Notification\Action;

use App\Modules\Notification\Drivers\DriverContextStrategy;
use App\Modules\Notification\DTO\Base\BaseDTO;
use App\Modules\Notification\Enums\NotificationDriverEnum;
use App\Modules\Notification\Interface\NotificationDriverInterface;
use App\Modules\Notification\Services\NotificationService;

class SendNotificationAction
{
    private readonly string $typeDriver;
    private readonly BaseDTO $dto;

    public function __construct(

        public NotificationService $notifyService

    ) { }

    public function typeDriver(string $typeDriver){

        $this->typeDriver = strtolower($typeDriver);

        return $this;
    }

    public function dto(BaseDTO $dto)
    {
        $this->dto = $dto;

        return $this;
    }

    public function run()
    {

        switch($this->typeDriver){

            case 'smtp':
            {
                $enum = NotificationDriverEnum::objectByName($this->typeDriver);

                $this->driverContextStrategy($enum);
                break;
            }

            case 'aero':
            {
                $enum = NotificationDriverEnum::objectByName($this->typeDriver);
                $this->driverContextStrategy($enum);
                break;
            }

            default:
            {
                throw new \Exception("Unsupported Driver type");
            }

        }
    }

    private function driverContextStrategy(NotificationDriverEnum $enum) : bool
    {

        /**
        * @var NotificationDriverInterface
        */
        $driver = $this->notifyService->getDriver($enum);
        $context = new DriverContextStrategy($driver);
        $context->send($this->dto);

        return true;
    }
}
