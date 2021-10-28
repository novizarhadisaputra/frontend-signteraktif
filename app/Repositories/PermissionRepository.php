<?php

namespace App\Repositories;

use Exception;
use App\Models\Permission;
use Illuminate\Support\Facades\DB;

class PermissionRepository
{
    protected $permission;

    public function __construct(Permission $permission)
    {
        $this->permission = $permission;
    }

    public function store($request)
    {
        try {
            DB::beginTransaction();
            $this->permission->create($request->input());
            DB::commit();
            return redirect()->route('dashboard.settings.index', ['roleName' => strtolower(auth()->user()->role->name)])->with('success', 'Permission created');
        } catch (\Exception $e) {
            DB::rollback();
            throw new Exception($e->getMessage());
        }
    }

    public function update($request, $id)
    {
        try {
            DB::beginTransaction();
            $this->permission->where(['id' => $id])->update($request->except(['_method', '_token']));
            DB::commit();
            return redirect()->route('dashboard.settings.index', ['roleName' => strtolower(auth()->user()->role->name)])->with('success', 'Permission updated');
        } catch (\Exception $e) {
            DB::rollback();
            throw new Exception($e->getMessage());
        }
    }

    public function destroy($id)
    {
        try {
            DB::beginTransaction();
            $permission = $this->permission->find($id);
            $permission->delete();
            DB::commit();
            return redirect()->route('dashboard.settings.index', ['roleName' => strtolower(auth()->user()->role->name)])->with('success', 'Permission updated');
        } catch (\Exception $e) {
            DB::rollback();
            throw new Exception($e->getMessage());
        }
    }
}
