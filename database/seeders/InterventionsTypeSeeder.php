<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\InterventionsType;

class InterventionsTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $type = new InterventionsType();
        $type->name = 'test interventionType';
        $type->save();
    }
}
