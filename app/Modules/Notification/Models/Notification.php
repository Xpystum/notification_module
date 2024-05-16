<?php

namespace App\Modules\Notification\Models;

use App\Modules\Notification\Enums\ActiveStatusEnum;
use App\Modules\Notification\Traits\HasCode;
use App\Modules\Notification\Traits\HasUuid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    protected $table = 'notification';
    use HasFactory;
    use HasUuid;
    use HasCode;

    protected $fillable = [

        'uuid',
        'method_id',
        'user_id',
        'status',
        'code',

    ];

    protected $casts = [

        'status' => ActiveStatusEnum::class,

    ];
}
