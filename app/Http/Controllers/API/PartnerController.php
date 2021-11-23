<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\RegistrationPartner;
use Illuminate\Http\Request;
use Symfony\Component\Console\Output\ConsoleOutput;

class PartnerController extends Controller
{
    protected $partner;

    public function __construct()
    {
        $this->partner = app()->make('repo.api.partners');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        try {
            $response = $this->partner->index($request);
            return $response;
        } catch (\Exception $e) {
            return response()->json(['message' => $e->getMessage()], getCode($e->getCode()));
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RegistrationPartner $request)
    {
        try {
            $response = $this->partner->store($request);
            return $response;
        } catch (\Exception $e) {
            return response()->json(['message' => $e->getMessage()], getCode($e->getCode()));
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
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        try {
            $response = $this->partner->update($request, $id);
            return $response;
        } catch (\Exception $e) {
            return response()->json(['message' => $e->getMessage()], getCode($e->getCode()));
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
        //
    }

    public function schedules(Request $request, $schedules)
    {
        try {
            $response = $this->partner->schedules($request, $schedules);
            return $response;
        } catch (\Exception $e) {
            return response()->json(['message' => $e->getMessage()], getCode($e->getCode()));
        }
    }

    public function listActive(Request $request)
    {
        try {
            $response = $this->partner->listActive($request);
            return $response;
        } catch (\Exception $e) {
            return response()->json(['message' => $e->getMessage()], getCode($e->getCode()));
        }
    }
}
