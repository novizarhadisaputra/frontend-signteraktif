<?php

namespace App\Repositories\API;

use Exception;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\Builder;
use Symfony\Component\Console\Output\ConsoleOutput;

class UserRepository
{
    protected $user;

    public function __construct(User $user)
    {
        $this->user = $user;
    }
    public function index($request)
    {
        $request->per_page = $request->per_page ?? 10;
        $users = $this->user->paginate($request->per_page)->getCollection();
        return response()->json([
            'message' => 'List users',
            'data' => compact('users')
        ], 200);
    }

    public function store($request)
    {
        try {
            DB::beginTransaction();
            $user = $this->user->create($request->input());
            $user->detail()->create($request->input());
            DB::commit();
            return response()->json(['message' => 'User created'], 201);
        } catch (\Exception $e) {
            DB::rollback();
            throw new Exception($e->getMessage());
        }
    }

    public function show($id)
    {
        $user = $this->user->with(['schedules', 'detail'])->find($id);
        return response()->json([
            'message' => 'Detail User',
            'data' => compact('user')
        ], 200);
    }

    public function update($request, $id)
    {
        try {
            DB::beginTransaction();
            $user = $this->user->find($id);
            $data = [];
            foreach ($request->input() as $key => $value) {
                if($request->filled($key)) {
                    $data[$key] = $value;
                }
            }
            $user->update($data);
            $user = $this->user->find($id);
            DB::commit();
            return response()->json(['message' => 'User updated', 'data' => compact('user')], 201);
        } catch (\Exception $e) {
            DB::rollback();
            throw new Exception($e->getMessage());
        }
    }

    public function upload_avatar($request)
    {
        try {
            DB::beginTransaction();
            $user = $this->user->find(auth('api')->user()->id);
            if ($request->photo_profile) {
                $fileName = Str::slug($request->name . ' ' . Str::random(10));
                $path = Storage::disk('public_assets')->putFileAs('photo', $request->file('photo_profile'), $fileName . '.png');
                $user->image()->delete();
                $user->image()->create(['url' => $path]);
            }
            $user = $this->user->with('image')->find(auth('api')->user()->id);
            DB::commit();
            return response()->json(['message' => 'User created', 'data' => compact('user')], 201);
        } catch (\Exception $e) {
            DB::rollback();
            throw new Exception($e->getMessage());
        }
    }
}
