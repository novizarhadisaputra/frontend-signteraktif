<?php

namespace App\Http\Controllers;

use App\Http\Requests\Registration;
use App\Http\Requests\UpdateProfile;
use Illuminate\Http\Request;
use Symfony\Component\HttpKernel\Event\RequestEvent;

class UserController extends Controller
{
    protected $userRepo;

    public function __construct()
    {
        $this->userRepo = app()->make('repo.users');
    }

    public function index(Request $request)
    {
        try {
            $response = $this->userRepo->index($request);
            return $response;
        } catch (\Exception $e) {
            return redirect()->back()->with('errorMessage', $e->getMessage())->withInput();
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        try {
            $response = $this->userRepo->create();
            return $response;
        } catch (\Exception $e) {
            return redirect()->back()->with('errorMessage', $e->getMessage())->withInput();
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Registration $request)
    {
        $request->validated();
        try {
            $response = $this->userRepo->store($request);
            return $response;
        } catch (\Exception $e) {
            return redirect()->back()->with('errorMessage', $e->getMessage())->withInput();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        try {
            $response = $this->userRepo->show($id);
            return $response;
        } catch (\Exception $e) {
            return redirect()->back()->with('errorMessage', $e->getMessage())->withInput();
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        try {
            $response = $this->userRepo->edit($id);
            return $response;
        } catch (\Exception $e) {
            return redirect()->back()->with('errorMessage', $e->getMessage())->withInput();
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateProfile $request, $id)
    {
        try {
            $response = $this->userRepo->update($request, $id);
            return $response;
        } catch (\Exception $e) {
            return redirect()->back()->with('errorMessage', $e->getMessage())->withInput();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $response = $this->userRepo->destroy($id);
            return $response;
        } catch (\Exception $e) {
            return redirect()->back()->with('errorMessage', $e->getMessage())->withInput();
        }
    }

    public function upcomingEvent(Request $request)
    {
        try {
            $response = $this->userRepo->upcomingEvent($request);
            return $response;
        } catch (\Exception $e) {
            return redirect()->back()->with('errorMessage', $e->getMessage())->withInput();
        }
    }

    public function listOrder(Request $request)
    {
        try {
            $response = $this->userRepo->listOrder($request);
            return $response;
        } catch (\Exception $e) {
            return redirect()->back()->with('errorMessage', $e->getMessage())->withInput();
        }
    }

    public function listNotification(Request $request)
    {
        try {
            $response = $this->userRepo->listNotification($request);
            return $response;
        } catch (\Exception $e) {
            return redirect()->back()->with('errorMessage', $e->getMessage())->withInput();
        }
    }
}
