<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Exception;
use Illuminate\Http\Request;

class UserController extends Controller
{
    protected $userRepo;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->userRepo = app()->make('repo.api.user');
    }

    public function index()
    {
        try {
            $response = $this->userRepo->index();
            return $response;
        } catch (\Exception $th) {
            throw $th;
        }
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
    public function store(Request $request)
    {
        //
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
            throw $e;
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
            $response = $this->userRepo->update($request, $id);
            return $response;
        } catch (\Exception $e) {
            throw $e;
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

    public function upload_avatar()
    {
        try {
            $response = $this->userRepo->upload_avatar();
            return $response;
        } catch (\Exception $e) {
            return response()->json(['message' => $e->getMessage()], 500);
        }
    }
}
