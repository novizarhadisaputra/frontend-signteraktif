<?php

namespace Database\Seeders;

use App\Models\Permission;
use App\Models\Role;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    protected $permission, $role;

    public function __construct(Permission $permission, Role $role)
    {
        $this->permission = $permission;
        $this->role = $role;
    }
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $superadmin = $this->role->create(['name' => 'Developer']);
        $superadmin->permissions()->attach([1]);

        $admin = $this->role->create(['name' => 'Admin']);
        $adminPermissions = $this->permission->where('id', '<>', 1)->pluck('id');
        $admin->permissions()->attach($adminPermissions);

        $penerjemah = $this->role->create(['name' => 'Penerjemah']);
        $penerjemahPermissions = $this->permission->where('name', 'like', '%Menu%')->pluck('id');
        $penerjemah->permissions()->attach($penerjemahPermissions);

        $pengguna = $this->role->create(['name' => 'Pengguna']);
    }
}
