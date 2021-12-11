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

            if ($request->filled('sex')) {
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

        if (!$request->filled('date')) {
            $request->merge(['date' => date('Y-m-d')]);
        }

        $endDate = date('Y-m-d', strtotime($request->date . '+1 day'));
        $schedules = $this->schedules->whereHas('user', function (Builder $query) {
            $query->where(['role_id' => self::partnerRole])
                ->where(['is_active' => 1]);
        })->where('start_date', '>=', $request->date)->where('end_date', '<', $endDate)
            ->paginate($request->per_page)->getCollection();
        return view('welcome', compact('schedules', 'home'));
    }
}
