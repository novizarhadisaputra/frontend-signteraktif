<?php

namespace Database\Seeders;

use App\Models\Permission;
use App\Models\Role;
use Illuminate\Database\Seeder;

class AgencySeeder extends Seeder
{
    protected $agency;

    public function __construct(Role $agency)
    {
        $this->agency = $agency;
    }
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->agency->insert([
            [
                'name' => 'PLJ Yogyakarta'
            ],
            [
                'name' => 'JBI Dengar'
            ],
            [
                'name' => 'JBI Tulis'
            ]
        ]);
    }
}
