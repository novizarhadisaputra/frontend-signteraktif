<?php

namespace App\Repositories;

use App\Mail\ForgotPasswordMail;
use App\Mail\RegistrationMail;
use Exception;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;

class AuthRepository
{
    protected $user;

    public function __construct(User $user)
    {
        $this->user = $user;
    }

    public function login($request)
    {
        if (!auth()->attempt(['email' => $request->email, 'password' => $request->password, 'is_active' => 1, 'role_id' => 4])) {
            return redirect()->back()->with('error', 'Email and password not valid')->withInput();
        }
        $this->user->where(['id' => auth('api')->user()->id])->update(['is_online' => 1]);
        return redirect()->back()->with('success', 'Login success')->withInput();
    }

    public function registration($request)
    {
        try {
            DB::beginTransaction();
            $request->merge([
                'password_user' => $request->password,
                'email_verified_at' => date('Y-m-d H:i:s'),
                'is_active' => 1,
                'role_id' => isset($request->role_id) ? $request->role_id : 4
            ]);
            $user = $this->user->create($request->input());
            $user->detail()->create($request->input());
            Mail::to($request->email)->send(new RegistrationMail($user));
            DB::commit();
            return redirect()->back()->with('success', 'Registration success');
        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    public function logout()
    {
        $this->user->where(['id' => auth()->user()->id])->update(['is_online' => 0]);
        auth()->logout();
        return redirect()->back();
    }

    public function verifying($email)
    {
        if (!$user = $this->user->where(['email' => $email])->first()) {
            abort(404);
        }
        if ($user->role->id == 3) {
            $verified = $this->user->where(['email' => $email])->update(['email_verified_at' => date('Y-m-d H:i:s')]);
        } else {
            $verified = $this->user->where(['email' => $email])->update(['email_verified_at' => date('Y-m-d H:i:s'), 'is_active' => 1]);
        }
        return view('pages.auth.verify-registration', compact('email'));
    }

    public function resetPassword($email)
    {
        Mail::to($email)->send(new ForgotPasswordMail($email));
        return redirect()->back()->with('success', 'Request sent');
    }
}
