<?php

use Illuminate\Database\Seeder;
use App\Model\Role;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if (Role::count() == 0) {
            Role::create([
                'name'           => 'admin',
                'display_name'           => 'Admin',
            ]);
            Role::create([
                'name'           => 'normal',
                'display_name'           => 'Normal',
            ]);
        }
    }
}
