<?php

namespace App\Http\Controllers;

use Acaronlex\LaravelCalendar\Calendar;
use App\Http\Requests\ScheduleCreate;
use App\Models\Schedule;
use Illuminate\Http\Request;

class ScheduleController extends Controller
{
    protected $scheduleRepo;

    public function __construct()
    {
        $this->scheduleRepo  = app()->make('repo.schedule');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        try {
            $response = $this->scheduleRepo->index($request);
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
            $response = $this->scheduleRepo->create();
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
    public function store(ScheduleCreate $request)
    {
        try {
            $response = $this->scheduleRepo->store($request);
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
    public function show($roleName, $id)
    {
        try {
            $response = $this->scheduleRepo->show($id);
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
    public function edit($roleName, $id)
    {
        try {
            $response = $this->scheduleRepo->edit($id);
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
    public function update(Request $request, $roleName, $id)
    {
        try {
            $response = $this->scheduleRepo->update($request, $id);
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
    public function destroy($roleName, $id)
    {
        try {
            $response = $this->scheduleRepo->destroy($id);
            return $response;
        } catch (\Exception $e) {
            return redirect()->back()->with('errorMessage', $e->getMessage())->withInput();
        }
    }
}
