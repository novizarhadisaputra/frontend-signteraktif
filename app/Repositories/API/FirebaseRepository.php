<?php

namespace App\Repositories\API;

use Exception;
use App\Models\User;
use App\Models\Schedule;
use Illuminate\Support\Str;
use App\Models\Notification;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\Builder;
use Symfony\Component\Console\Output\ConsoleOutput;

class FirebaseRepository
{
    protected $notification, $user;

    public function __construct(Notification $notification, User $user)
    {
        $this->notification = $notification;
        $this->user = $user;
    }
    public function index($request)
    {
        $request->per_page = $request->per_page ?? 10;
        $notifications = $this->notification;
        if($request->filled('user_id')) {
            $notifications = $notifications->where(['user_id' => $request->user_id]);
        }
        $notifications = $notifications->paginate($request->per_page)->getCollection();

        return response()->json([
            'message' => 'List noti$notification',
            'data' => compact('notifications')
        ], 200);
    }

    public function store($request)
    {
        try {
            DB::beginTransaction();
            $notification = Notification::create($request->input());
            $notification->detail()->create($request->input());
            DB::commit();
            return response()->json(['message' => 'Notification created'], 201);
        } catch (\Exception $e) {
            DB::rollback();
            throw new Exception($e->getMessage());
        }
    }

    public function storeToken($request)
    {
        try {
            DB::beginTransaction();
            $this->user->where(['email' => $request->email])->update(['device_key' => $request->device_key]);
            $user = $this->user->where(['email' => $request->email])->first();
            DB::commit();
            return response()->json(['message' => 'Token Updated', 'data' => compact('user')], 201);
        } catch (\Exception $e) {
            DB::rollback();
            throw new Exception($e->getMessage());
        }
    }

    public function sendTopic($request, $topic)
    {
        fcm()
            ->toTopic($topic) // $topic must an string (topic name)
            ->priority('normal')
            ->timeToLive(0)
            ->notification([
                'title' => $request->title,
                'body' => $request->body,
            ])
            ->send();
    }

    public function sendRecipients($request, $recipients)
    {
        fcm()
            ->to($recipients)
            ->priority('high')
            ->timeToLive(0)
            ->data([
                'title' => $request->title,
                'body' => $request->body,
            ])
            ->send();
    }
}
