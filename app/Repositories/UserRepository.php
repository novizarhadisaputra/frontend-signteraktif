<?php

namespace App\Repositories;

use Exception;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Symfony\Component\Console\Output\ConsoleOutput;

class UserRepository
{
    protected $console, $notifications, $transactions, $user;

    public function __construct(ConsoleOutput $console, User $user)
    {
        $this->console = $console;
        $this->notifications = app()->make('repo.notification');
        $this->transactions = app()->make('repo.transaction');
        $this->user = $user;
    }

    // public function index($request)
    // {
    //     $title = 'Users';
    //     $usersPage = 'active';
    //     $users = $this->user->all();
    //     return view('pages.users.index', compact('users', 'title'));
    // }

    public function show($id)
    {
        $user = $this->user->find($id);
        return view('user.profile', compact('user'));
    }

    public function edit($id)
    {
        $user = $this->user->find($id);
        return view('user.profile', compact('user'));
    }

    public function update($request, $id)
    {
        try {
            DB::beginTransaction();
            $user = $this->user->find($id);

            if ($request->email != $user->email) {
                if ($this->userEmail($request->email)) {
                    throw new Exception('Email already');
                }
            }

            if ($request->hasFile('photo_profile')) {
                if (isset($user->image->url)) {
                    if (file_exists(asset($user->image->url))) {
                        unlink(asset($user->image->url));
                    }
                }
                $user->image()->delete();
                $fileName = Str::slug($user->id . ' ' . $user->name . ' ' . Str::random(10));
                $path = Storage::disk('public_assets')->putFileAs('photo', $request->file('photo_profile'), $fileName . '.png');
                $user->image()->create(['url' => $path]);
            }

            $user->name = $request->name ?? $user->name;
            $user->password = $request->password ?? $user->password_user;
            $user->password_user = $request->password ?? $user->password_user;
            $user->email = $request->email ?? $user->email;
            $user->is_active = $request->is_active ? 1 : 0;

            $detail['title'] = $request->title ?? $user->detail->title;
            $detail['phone'] = $request->phone ?? $user->detail->phone;
            $detail['province'] = $request->province ?? $user->detail->province;
            $detail['city'] = $request->city ?? $user->detail->city;
            $detail['address'] = $request->address ?? $user->detail->address;
            $detail['sex'] = $request->sex ?? $user->detail->sex;
            $detail['description'] = $request->description ?? $user->detail->description;
            $detail['has_whatsapp'] = $request->has_whatsapp ?? $user->detail->has_whatsapp;
            $detail['has_telegram'] = $request->has_telegram ?? $user->detail->has_telegram;
            $user->detail()->update($detail);
            $user->save();
            DB::commit();
            return redirect()->back()->with('success', 'Updating success');
        } catch (\Exception $e) {
            DB::rollback();
            throw new Exception($e->getMessage());
        }
    }

    public function destroy($id)
    {
        $user = $this->user->find($id);
        $user->image()->delete();
        $user->detail()->delete();
        $user->delete();
        return redirect()->back()->with('success', 'Deleting success');
    }

    public function userEmail($email)
    {
        return $this->user->where(['email' => $email])->first();
    }

    public function upcomingEvent($request)
    {
        $nav = 'upcoming';
        $upcomings = $this->transactions->upcomingEvent($request);
        $transactions = $this->transactions->listOrder($request);
        $this->console->writeln(json_encode($upcomings));
        return view('user.event', compact('upcomings', 'transactions', 'nav'));
    }

    public function listOrder($request)
    {
        $nav = 'booking';
        $upcomings = $this->transactions->upcomingEvent($request);
        $transactions = $this->transactions->listOrder($request);
        $this->console->writeln(json_encode($transactions));
        return view('user.event', compact('upcomings', 'transactions', 'nav'));
    }

    public function listNotification($request)
    {
        $notifications = $this->notifications->listNotification($request);
        return view('user.notification', compact('notifications'));
    }
}
