<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\Login;
use Illuminate\Http\Request;
use App\Http\Requests\Registration;
use App\Http\Requests\SecurityCode;
use App\Http\Controllers\Controller;
use App\Http\Requests\LoginThirdParty;
use App\Http\Requests\ResetPassword;
use Symfony\Component\Console\Output\ConsoleOutput;

class AuthController extends Controller
{
    protected $auth;

    public function __construct()
    {
        $this->auth = app()->make('repo.api.auth');
    }

    public function login(Login $request) {
        try {
            $response = $this->auth->login($request);
            return $response;
        } catch (\Exception $e) {
            return response()->json(['message' => $e->getMessage()], $e->getCode() ?? 500);
        }
    }

    public function loginCustomer(Login $request) {
        try {
            $response = $this->auth->loginCustomer($request);
            return $response;
        } catch (\Exception $e) {
            return response()->json(['message' => $e->getMessage()], $e->getCode() ?? 500);
        }
    }

    public function loginThirdParty(LoginThirdParty $request) {
        try {
            $response = $this->auth->loginThirdParty($request);
            return $response;
        } catch (\Exception $e) {
            return response()->json(['message' => $e->getMessage()], $e->getCode() ?? 500);
        }
    }

    public function me() {
        try {
            $response = $this->auth->me();
            return $response;
        } catch (\Exception $e) {
            return response()->json(['message' => $e->getMessage()], $e->getCode() ?? 500);
        }
    }

    public function registration(Registration $request) {
        try {
            $response = $this->auth->registration($request);
            return $response;
        } catch (\Exception $e) {
            return response()->json(['message' => $e->getMessage()], $e->getCode() ?? 500);
        }
    }

    public function logout() {
        try {
            $response = $this->auth->logout();
            return $response;
        } catch (\Exception $e) {
            return response()->json(['message' => $e->getMessage()], $e->getCode() ?? 500);
        }
    }

    public function requestResetPassword(ResetPassword $request)
    {
        try {
            $response = $this->auth->requestResetPassword($request);
            return $response;
        } catch (\Exception $e) {
            return response()->json(['message' => $e->getMessage()], $e->getCode() ?? 500);
        }
    }

    public function checkSecurityCode(SecurityCode $request)
    {
        try {
            $response = $this->auth->checkSecurityCode($request);
            return $response;
        } catch (\Exception $e) {
            return response()->json(['message' => $e->getMessage()], $e->getCode() ?? 500);
        }
    }

    public function updatePassword(Request $request)
    {
        try {
            $response = $this->auth->updatePassword($request);
            return $response;
        } catch (\Exception $e) {
            return response()->json(['message' => $e->getMessage()], $e->getCode() ?? 500);
        }
    }
}
