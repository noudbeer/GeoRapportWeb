<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Role;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role_admin = Role::where('name', 'admin')->first();

        $admin = new User();
        $admin->name = 'Simon';
        $admin->email = 'simon@onf.fr';
        $admin->password = Hash::make('bernoud');
        $admin->role_id = $role_admin->id;
	    $admin->email_verified_at = new \DateTime;
        $admin->save();
    }
}
