<?php

namespace App\Http\Controllers;

use App\Http\Requests\NotificationMidtrans;
use Illuminate\Http\Request;

class NotificationController extends Controller
{
    protected $notification;

    public function __construct()
    {
        $this->notification = app()->make('repo.notification');
    }

    public function fromMidtrans(NotificationMidtrans $request)
    {
        try {
            $response = $this->notification->fromMidtrans($request);
            return $response;
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage())->withInput();
        }
    }
}
