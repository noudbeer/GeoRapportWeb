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
        $role_admin = new Role();
        $role_admin->name = 'admin';
        $role_admin->save();

        $role_contributor = new Role();
        $role_contributor->name = 'contributor';
        $role_contributor->save();

        $role_other = new Role();
        $role_other->name = 'other';
        $role_other->save();
    }
}
