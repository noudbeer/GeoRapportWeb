<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\InterventionsGroup;

class InterventionsGroupSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $interventionGroup = new InterventionsGroup();
        $interventionGroup->name = 'test interventionGroup';
        $interventionGroup->save();
    }
}
