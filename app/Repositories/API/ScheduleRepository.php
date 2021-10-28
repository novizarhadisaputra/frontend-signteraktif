<?php

namespace App\Repositories\API;

use Exception;
use App\Models\Schedule;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\Builder;
use Symfony\Component\Console\Output\ConsoleOutput;

class ScheduleRepository
{
    protected $schedule;

    public function __construct(Schedule $schedule)
    {
        $this->schedule = $schedule;
    }
    public function index($request)
    {
        $request->per_page = $request->per_page ?? 10;
        $schedules = $this->schedule->paginate($request->per_page)->getCollection();
        return response()->json([
            'message' => 'List schedules',
            'data' => compact('schedules')
        ], 200);
    }

    public function store($request)
    {
        try {
            DB::beginTransaction();
            $schedule = $this->schedule->create($request->input());
            $schedule->detail()->create($request->input());
            DB::commit();
            return response()->json(['message' => 'Schedule created'], 201);
        } catch (\Exception $e) {
            DB::rollback();
            throw new Exception($e->getMessage());
        }
    }

    public function show($id)
    {
        $schedule = $this->schedule->with(['schedules', 'detail'])->find($id);
        return response()->json([
            'message' => 'Detail Schedule',
            'data' => compact('schedule')
        ], 200);
    }

    public function update($request, $id)
    {
        try {
            DB::beginTransaction();
            $schedule = $this->schedule->find($id);
            $data = [];
            foreach ($request->input() as $key => $value) {
                if ($request->filled($key)) {
                    $data[$key] = $value;
                }
            }
            $schedule->update($data);
            $schedule = $this->schedule->find($id);
            DB::commit();
            return response()->json(['message' => 'Schedule updated', 'data' => compact('schedule')], 201);
        } catch (\Exception $e) {
            DB::rollback();
            throw new Exception($e->getMessage());
        }
    }

    public function listActive($request)
    {
        $schedules = $this->schedule->where(['is_available' => 1]);
        if ($request->date) {
            $schedules = $schedules->where('start_date', '>=', $request->date);
        }
        $schedules = $schedules->get();
        return response()->json([
            'message' => 'List schedules',
            'data' => compact('schedules')
        ], 200);
    }
}
