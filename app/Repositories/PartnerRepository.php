<?php

namespace App\Repositories;

use Exception;
use App\Models\User;
use App\Models\Schedule;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\Builder;

class PartnerRepository
{
    const partnerRole = 3;

    protected $user, $schedules;

    public function __construct(User $user, Schedule $schedules)
    {
        $this->user = $user;
        $this->schedules = $schedules;
    }
    public function index($request)
    {
        $partner = 'active';
        $request->per_page = $request->per_page ?? 4;
        $request->province = $request->province ?? 'All';

        if (!$request->filled('date')) {
            $request->merge(['date' => date('Y-m-d H:i:s')]);
        }

        $currentDate = strtotime(date('Y-m-d'));

        $requestDate = strtotime(date('Y-m-d', strtotime($request->date)));

        if ($requestDate > $currentDate) {
            $request->merge(['date' => date('Y-m-d', strtotime($request->date))]);
        }

        $endDate = date('Y-m-d', strtotime($request->date . '+1 day'));
        $schedules = $this->schedules->whereHas('user', function (Builder $query) use ($request) {
            $query->where(['role_id' => self::partnerRole])
                ->where(['is_active' => 1]);
            $query->whereHas('detail', function (Builder $query) use ($request) {
                if ($request->filled('province')) {
                    if ($request->province != 'All') {
                        $query->where('province', $request->province);
                    }
                }

                if ($request->filled('sex')) {
                    if ($request->sex == 'Woman') {
                        $query->where('sex', 0);
                    } else if ($request->sex == 'Man') {
                        $query->where('sex', 1);
                    }
                }
            });
        })->where('start_date', '>=', $request->date)->where('end_date', '<', $endDate)->where(['is_available' => 1])
            ->paginate($request->per_page)->getCollection();
        return view('partner.index', compact('schedules', 'partner'));
    }

    public function listActive($request)
    {
        $request->per_page = $request->per_page ?? 10;
        $request->province = $request->province ?? 'All';
        $user = $this->user->whereHas('detail', function (Builder $query) use ($request) {
            if ($request->filled('province')) {
                if ($request->province == 'All') {
                    $query->where('province', '<>', null);
                } else {
                    $query->where('province', $request->province);
                }
            }

            if ($request->filled('sex')) {
                if ($request->sex == 'All') {
                    $query->where('sex', '<>', null);
                } else  if ($request->sex == 'Man') {
                    $query->where('sex', 1);
                } else {
                    $query->where('sex', 0);
                }
            }
        })->with(['detail' => function ($query) use ($request) {
            if ($request->filled('province')) {
                if ($request->province == 'All') {
                    $query->where('province', '<>', null);
                } else {
                    $query->where('province', $request->province);
                }
            }

            if ($request->filled('province')) {
                if ($request->sex == 'All') {
                    $query->where('sex', '<>', null);
                } else  if ($request->sex == 'Man') {
                    $query->where('sex', 1);
                } else {
                    $query->where('sex', 0);
                }
            }
        }]);

        if ($request->filled('search')) {
            $user->where('name', 'like', '%' . $request->search . '%');
        }

        $partners = $user->whereHas('schedules', function (Builder $query) use ($request) {
            $endDate = date('Y-m-d', strtotime($request->date . '+1 day'));
            $query->where('start_date', '>=', $request->date);
            $query->where('end_date', '<', $endDate);
            $query->where(['is_available' => 1]);
        })->with(['schedules' => function ($query) use ($request) {
            $endDate = date('Y-m-d', strtotime($request->date . '+1 day'));
            $query->where('start_date', '>=', $request->date);
            $query->where('end_date', '<', $endDate)->orderBy('start_date');
            $query->where(['is_available' => 1]);
        }])->where(['role_id' => self::partnerRole])->where(['is_active' => 1])->paginate($request->per_page)->getCollection();

        return response()->json([
            'message' => 'List partners',
            'data' => compact('partners')
        ], 200);
    }

    public function store($request)
    {
        try {
            DB::beginTransaction();
            $user = User::create($request->input());
            $user->detail()->create($request->input());
            DB::commit();
            return response()->json(['message' => 'User created'], 201);
        } catch (\Exception $e) {
            DB::rollback();
            throw new Exception($e->getMessage());
        }
    }

    public function upload_avatar($request, $id)
    {
        try {
            DB::beginTransaction();
            $user = $this->user->find($id);
            if ($request->photo_profile) {
                $fileName = Str::slug($user->id . ' ' . $user->name . ' ' . Str::random(10));
                $data = substr($request->photo_profile, strpos($request->photo_profile, ',') + 1);
                $data = base64_decode($data);
                $path = Storage::disk('public_assets')->put('/photo/' . $fileName . '.png', $data);
                $user->image()->delete();
                $user->image()->create(['url' => $path]);
            }
            DB::commit();
            return response()->json(['message' => 'User created'], 201);
        } catch (\Exception $e) {
            DB::rollback();
            throw new Exception($e->getMessage());
        }
    }

    public function schedules($request, $id)
    {
        $request->per_page = $request->per_page ?? 10;
        $schedules = $this->schedules->where(['user_id' => $id]);
        if ($request->date) {
            $endDate = date('Y-m-d', strtotime($request->date . '+1 day'));
            $schedules = $schedules->where('start_date', '>=', $request->date)->where('end_date', '<', $endDate);
        }
        $schedules = $schedules->where(['is_available' => 1])->paginate($request->per_page)->getCollection();
        return $schedules;
    }

    public function find($id)
    {
        return $this->user->find($id);
    }
}
