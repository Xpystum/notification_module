<?php

use App\Modules\Notification\View\Http\Controllers\NotificationController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/notification', NotificationController::class);
