<?php

namespace App\Repositories;

use Exception;
use App\Models\User;
use Illuminate\Support\Str;
use App\Mail\RegistrationMail;
use App\Mail\ForgotPasswordMail;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;
use Laravel\Socialite\Facades\Socialite;

class GoogleRepository
{
    protected $user;

    public function __construct(User $user)
    {
        $this->user = $user;
    }

    public function loginWithGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    public function callbackFromGoogle()
    {
        try {
            $user = Socialite::driver('google')->user();

            // Check Users Email If Already There
            $is_user = $this->user->where('email', $user->getEmail())->first();
            if (!$is_user) {

                $saveUser = $this->user->updateOrCreate([
                    'google_id' => $user->getId(),
                ], [
                    'name' => $user->getName(),
                    'email' => $user->getEmail(),
                    'password' => Hash::make($user->getName() . '@' . $user->getId())
                ]);
            } else {
                $saveUser = $this->user->where('email',  $user->getEmail())->update([
                    'google_id' => $user->getId(),
                ]);
                $saveUser = $this->user->where('email', $user->getEmail())->first();
            }


            auth()->loginUsingId($saveUser->id);

            return redirect()->route('home');
        } catch (\Throwable $th) {
            throw $th;
        }
    }
}
