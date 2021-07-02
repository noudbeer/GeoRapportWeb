<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role_user = new Role();
        $role_user->name = 'user';
        $role_user->save();

        $role_client = new Role();
        $role_client->name = 'client';
        $role_client->save();

        $role_admin = new Role();
        $role_admin->name = 'admin';
        $role_admin->save();   
    }
}
