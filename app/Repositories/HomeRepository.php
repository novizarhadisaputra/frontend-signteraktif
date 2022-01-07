<?php

namespace App\Repositories;

use App\Models\User;
use App\Models\Schedule;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\Builder;

class HomeRepository
{
    const partnerRole = 3;

    protected $user, $schedules, $partners;

    public function __construct(User $user, Schedule $schedules)
    {
        $this->user = $user;
        $this->schedules = $schedules;
    }

    public function index($request)
    {
        $home = 'active';
        $request->per_page = $request->per_page ?? 4;
        $request->province = $request->province ?? 'All';

        if (!$request->filled('date')) {
            $request->merge(['date' => date('Y-m-d')]);
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
        return view('welcome', compact('schedules', 'home'));
    }
}
