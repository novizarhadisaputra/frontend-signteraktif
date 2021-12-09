<?php

namespace App\Repositories\API;

use Exception;
use App\Models\User;
use Illuminate\Support\Str;
use App\Mail\RegistrationMail;
use App\Mail\ResetPasswordMail;
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
        $credentials = $request->only(['email', 'password']);

        if (!$token = auth('api')->attempt($credentials)) {
            return response()->json(['message' => 'Unauthorized'], 401);
        }
        $this->user->where(['id' => auth('api')->user()->id])->update(['is_online' => 1]);
        $user = $this->user->where(['id' => auth('api')->user()->id])->first();
        $token = $this->respondWithToken($token)->original;
        return response()->json(['message' => 'Login success', 'data' => compact('user', 'token')], 200);
    }

    public function loginCustomer($request)
    {
        if (!$token = auth('api')->attempt(['email' => $request->email, 'password' => $request->password, 'is_active' => 1, 'role_id' => 4])) {
            return response()->json(['message' => 'Unauthorized'], 401);
        }
        $this->user->where(['id' => auth('api')->user()->id])->update(['is_online' => 1]);
        $user = $this->user->where(['id' => auth('api')->user()->id])->first();
        $token = $this->respondWithToken($token)->original;
        return response()->json(['message' => 'Login success', 'data' => compact('user', 'token')], 200);
    }

    public function loginPartner($request)
    {
        if (!$token = auth('api')->attempt(['email' => $request->email, 'password' => $request->password, 'is_active' => 1, 'role_id' => 3])) {
            return response()->json(['message' => 'Unauthorized'], 401);
        }
        $this->user->where(['id' => auth('api')->user()->id])->update(['is_online' => 1]);
        $user = $this->user->where(['id' => auth('api')->user()->id])->first();
        $token = $this->respondWithToken($token)->original;
        return response()->json(['message' => 'Login success', 'data' => compact('user', 'token')], 200);
    }

    public function loginThirdParty($request)
    {
        if (!$user = $this->user->where(['email' => $request->email])->first()) {
            return response()->json(['message' => 'Unauthorized'], 401);
        }
        $token = auth('api')->login($user);
        $this->user->where(['id' => auth('api')->user()->id])->update(['is_online' => 1]);
        $user = $this->user->where(['id' => auth('api')->user()->id])->first();
        $token = $this->respondWithToken($token)->original;
        return response()->json(['message' => 'Login success', 'data' => compact('user', 'token')], 200);
    }

    public function registration($request)
    {
        try {
            DB::beginTransaction();
            $request->merge(['password_user' => $request->password]);
            $user = $this->user->create($request->input());
            if ($request->photo_profile) {
                $fileName = Str::slug($user->id . ' ' . $user->name . ' ' . Str::random(10));
                $data = substr($request->photo_profile, strpos($request->photo_profile, ',') + 1);
                $data = base64_decode($data);
                $path = Storage::disk('public_assets')->put('/photo/' . $fileName . '.png', $data);
                $user->image()->create(['url' => '/photo/' . $fileName . '.png']);
            }
            $user->detail()->create($request->input());
            Mail::to($request->email)->send(new RegistrationMail($user));
            DB::commit();
            return response()->json(['message' => 'Registrasion success', 'data' => compact('user')], 200);
        } catch (\Exception $e) {
            DB::rollback();
            throw $e;
        }
    }

    public function requestResetPassword($request)
    {
        try {
            DB::beginTransaction();
            if (!$user = $this->user->where(['email' => $request->email])->first()) {
                throw new Exception('Email not valid', 400);
            }
            $this->user->where(['email' => $request->email])->update(['security_code' => Str::random(8)]);
            $user = $this->user->where(['email' => $request->email])->first();
            Mail::to($request->email)->send(new ResetPasswordMail($user));
            DB::commit();
            return response()->json(['message' => 'Reset Password Berhasil', 'data' => compact('user')], 200);
        } catch (\Exception $e) {
            DB::rollback();
            throw $e;
        }
    }

    public function checkSecurityCode($request)
    {
        if (!$user = $this->user->where(['security_code' => $request->security_code])->first()) {
            throw new Exception('Security code not valid', 400);
        }

        return response()->json(['message' => 'Security code valid', 'data' => compact('user')], 200);
    }

    public function updatePassword($request)
    {
        try {
            DB::beginTransaction();
            if (!$this->user->where(['email' => $request->email])->first()) {
                throw new Exception('Email not valid', 400);
            }
            $this->user->where(['email' => $request->email])
                ->update([
                    'password' => Hash::make($request->new_password),
                    'password_user' => $request->new_password,
                    'security_code' => null
                ]);
            $user = $this->user->where(['email' => $request->email])->first();
            DB::commit();
            return response()->json(['message' => 'Reset Password Berhasil', 'data' => compact('user')], 200);
        } catch (\Exception $e) {
            DB::rollback();
            throw $e;
        }
    }

    public function me()
    {
        $user = $this->user->with('image')->find(auth('api')->user()->id);
        return response()->json(['message' => 'My Profile', 'data' => $user]);
    }

    public function logout()
    {
        $this->user->where(['id' => auth('api')->user()->id])->update(['is_online' => 0]);
        auth('api')->logout();
        return response()->json(['message' => 'Successfully logged out']);
    }

    public function refresh()
    {
        return $this->respondWithToken(auth('api')->refresh());
    }

    protected function respondWithToken($token)
    {
        return response()->json([
            'access_token' => $token,
            'token_type' => 'Bearer',
            'expires_in' => auth('api')->factory()->getTTL() * 60
        ]);
    }
}
