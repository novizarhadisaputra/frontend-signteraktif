<?php

namespace Database\Seeders;

use App\Models\Permission;
use Illuminate\Database\Seeder;

class PermissionSeeder extends Seeder
{
    protected $permission;

    public function __construct(Permission $permission)
    {
        $this->permission = $permission;
    }
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->permission->insert([
            [
                'name' => 'All Access'
            ],
            [
                'name' => 'Access Dashboard Menu'
            ],
            [
                'name' => 'Access Users Menu'
            ],
            [
                'name' => 'Access Users Edit'
            ],
            [
                'name' => 'Access Users Detail'
            ],
            [
                'name' => 'Access Users Delete'
            ],
            [
                'name' => 'Access News Menu'
            ],
            [
                'name' => 'Access News Edit'
            ],
            [
                'name' => 'Access News Detail'
            ],
            [
                'name' => 'Access News Delete'
            ],
            [
                'name' => 'Access Settings Menu'
            ],
            [
                'name' => 'Access Settings Edit'
            ],
            [
                'name' => 'Access Settings Detail'
            ],
            [
                'name' => 'Access Settings Delete'
            ],
            [
                'name' => 'Access Schedules Menu'
            ],
            [
                'name' => 'Access Schedules Edit'
            ],
            [
                'name' => 'Access Schedules Detail'
            ],
            [
                'name' => 'Access Schedules Delete'
            ],
            [
                'name' => 'All Data'
            ],
            [
                'name' => 'All Data Users'
            ],
            [
                'name' => 'Not All Data Users'
            ],
            [
                'name' => 'All Data Roles'
            ],
            [
                'name' => 'Not All Data Roles'
            ],
            [
                'name' => 'All Data Permissions'
            ],
            [
                'name' => 'Not All Data Permissions'
            ],
            [
                'name' => 'All Data News'
            ],
            [
                'name' => 'Not All Data News'
            ],
        ]);
    }
}
