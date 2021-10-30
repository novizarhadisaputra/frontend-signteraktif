<?php

namespace App\Http\Controllers;

use App\Http\Requests\Login;
use App\Http\Requests\Registration;
use App\Http\Requests\UpdatePassword;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    protected $authRepo;

    public function __construct()
    {
        $this->authRepo = app()->make('repo.auth');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function login(Login $request)
    {
        try {
            $response = $this->authRepo->login($request);
            return $response;
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage())->withInput();
        }
    }

    public function registration(Registration $request)
    {
        $request->validated();
        try {
            $response = $this->authRepo->registration($request);
            return $response;
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage())->withInput();
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function logout(Request $request)
    {
        try {
            $response = $this->authRepo->logout($request);
            return $response;
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage())->withInput();
        }
    }

    public function verifying(Request $request, $email)
    {
        try {
            $response = $this->authRepo->verifying($email);
            return $response;
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage())->withInput();
        }
    }

    public function resetPassword(Request $request)
    {
        try {
            $response = $this->authRepo->resetPassword($request);
            return $response;
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage())->withInput();
        }
    }

    public function showResetPassword(Request $request)
    {
        $response = $this->authRepo->showResetPassword($request);
        return $response;
    }

    public function updatePassword(UpdatePassword $request)
    {
        try {
            $response = $this->authRepo->updatePassword($request);
            return $response;
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage())->withInput();
        }
    }

    public function changePassword(UpdatePassword $request)
    {
        try {
            $response = $this->authRepo->changePassword($request);
            return $response;
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage())->withInput();
        }
    }
}
