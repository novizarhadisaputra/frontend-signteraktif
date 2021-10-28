<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GoogleController extends Controller
{
    protected $googleRepo;

    public function __construct()
    {
        $this->googleRepo = app()->make('repo.google');
    }

    public function loginWithGoogle()
    {
        try {
            $response = $this->googleRepo->loginWithGoogle();
            return $response;
        } catch (\Exception $e) {
            return redirect()->back()->with('errorMessage', $e->getMessage())->withInput();
        }
    }

    public function callbackFromGoogle()
    {
        try {
            $response = $this->googleRepo->callbackFromGoogle();
            return $response;
        } catch (\Exception $e) {
            return redirect()->back()->with('errorMessage', $e->getMessage())->withInput();
        }
    }
}
