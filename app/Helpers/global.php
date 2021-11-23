<?php

use App\Models\Role;
use App\Models\Transaction;

function hasPermission($namePermission)
{
    $role = Role::find(auth()->user()->role->id);
    if ($role->permissions()->where(['name' => $namePermission])->first()) return true;
    return false;
}

function hasManyPermission($namePermission)
{
    $role = Role::find(auth()->user()->role->id);
    if ($role->permissions()->whereIn(['name' => $namePermission])->first()) return true;
    return false;
}

function hasRole($nameRole)
{
    $role = Role::where(['name' => $nameRole])->first();
    return $role->id == auth()->user()->role->id;
}

function hasManyRole($nameRole)
{
    $roles = collect($nameRole);
    return $roles->search(auth()->user()->role->name);
}

function getLastTransactionId()
{
    return Transaction::orderBy('id', 'desc')->first()->id;
}

function getCode($code)
{
    if($code) {
        if($code >= 500) {
            return 500;
        } else {
            return $code;
        }
    }
    return 500;
}
