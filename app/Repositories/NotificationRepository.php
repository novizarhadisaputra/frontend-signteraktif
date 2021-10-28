<?php

namespace App\Repositories;

use Exception;
use App\Models\Notification;
use Illuminate\Support\Facades\DB;
use Symfony\Component\Console\Output\ConsoleOutput;

class NotificationRepository
{
    protected $firebase, $notifications;

    public function __construct(
        Notification $notifications,
    ) {
        $this->notifications = $notifications;
        $this->firebase = app()->make('repo.api.firebase');
    }

    public function listNotification($request)
    {
        return $this->notifications->all();
    }
}
