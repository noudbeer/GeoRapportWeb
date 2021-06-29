<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\UnitOfTime;

class UnitOfTimeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $hours = new UnitOfTime();
        $hours->name = "heure(s)";
        $hours->save();

        $days = new UnitOfTime();
        $days->name = "jour(s)";
        $days->save();
    }
}
