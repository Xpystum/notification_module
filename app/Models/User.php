<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

use App\Modules\Notification\Enums\ActiveStatusEnum;
use App\Modules\Notification\Models\Notification;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',

        'email_confirmed_at',
        'phone_confirmed_at',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'password' => 'hashed',
            'email_confirmed_at' => 'datetime',
            'phone_confirmed_at' => 'datetime',
        ];
    }

    public function notifycation(): HasMany
    {
        return $this->hasMany(Notification::class);
    }

    public function lastNotify() : HasOne
    {
        return $this->hasOne(Notification::class)->latestOfMany();
    }

    public function lastNotifyAndPending()
    {
        // return $this->hasOne(Notification::class)->latestOfMany()->where('status', ActiveStatusEnum::pending);
        return $this->lastNotify()->where('status', ActiveStatusEnum::pending);
    }

    public function lastNotifyAndCompleted()
    {
        // return $this->hasOne(Notification::class)->latestOfMany()->where('status', ActiveStatusEnum::pending);
        return $this->lastNotify()->where('status', ActiveStatusEnum::completed);
    }

}
