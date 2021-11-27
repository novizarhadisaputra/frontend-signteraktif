<?php

namespace App\Repositories;

use Exception;
use App\Models\User;
use Illuminate\Support\Str;
use App\Mail\RegistrationMail;
use App\Mail\ForgotPasswordMail;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
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
        $this->user->where(['id' => auth()->user()->id])->update(['is_online' => 1]);
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
            return redirect()->route('root')->with('success', 'Registration success');
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
        return redirect()->route('root')->with('success', 'Verify Success');
    }

    public function resetPassword($request)
    {
        $this->user->where(['email' => $request->email])->update(['security_code' => Str::random(8)]);
        $user = $this->user->where(['email' => $request->email])->first();
        Mail::to($request->email)->send(new ForgotPasswordMail($user));
        return redirect()->back()->with('success', 'Request sent');
    }

    public function showResetPassword($request)
    {
        if (!$user = $this->user->where(['security_code' => $request->security_code])->first()) {
            abort(404);
        }
        return view('auth.reset-password', compact('user'));
    }

    public function checkSecurityCode($request)
    {
        if (!$user = $this->user->where(['security_code' => $request->security_code])->first()) {
            return abort(404);
        }
    }

    public function updatePassword($request)
    {
        try {
            DB::beginTransaction();
            if (!$user = $this->user->where(['security_code' => $request->security_code])->first()) {
                abort(404);
            }
            $this->user->where(['email' => $user->email])
                ->update([
                    'password' => Hash::make($request->password),
                    'password_user' => $request->password,
                    'security_code' => null
                ]);
            $user = $this->user->where(['email' => $user->email])->first();
            DB::commit();
            return redirect()->route('root')->with('success', 'Update Password success!');
        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->route('root')->with('error', 'Update Password failed! Because ' . $e->getMessage());
        }
    }

    public function changePassword($request)
    {
        try {
            DB::beginTransaction();
            if (auth()->user()->password_user != $request->current_password) {
                return redirect()->back()->with('error', 'Password invalid');
            }
            $this->user->where(['email' => auth()->user()->email])
                ->update([
                    'password' => Hash::make($request->password),
                    'password_user' => $request->password,
                    'security_code' => null
                ]);
            DB::commit();
            auth()->logout();
            return redirect()->route('root')->with('success', 'Update Password success!');
        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->back()->with('error', 'Update Password failed! Because ' . $e->getMessage());
        }
    }
}
