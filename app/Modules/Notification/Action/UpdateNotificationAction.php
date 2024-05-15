<?php

namespace App\Modules\Notification\Action;

use App\Modules\Notification\Models\Notification;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

use function App\Modules\Notification\Helpers\code;

class UpdateNotificationAction
{

    private ?string $code = null;

    public function updateCode()
    {

        $this->code = code();

        return $this;
    }

    public function run(Notification $model)
    {
        if($this->code)
        {
            $model->code = code();
        }

        return $model->save();
    }

}
