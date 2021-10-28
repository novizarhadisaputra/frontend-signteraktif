<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\TransactionCreate;

class NotificationController extends Controller
{
    protected $notification;

    public function __construct()
    {
        $this->notification = app()->make('repo.notification');
    }
}
