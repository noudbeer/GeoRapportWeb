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
        $seconds = new UnitOfTime();
        $seconds->name = "seconde(s)";
        $seconds->save();
        
        $minutes = new UnitOfTime();
        $minutes->name = "minute(s)";
        $minutes->save();

        $hours = new UnitOfTime();
        $hours->name = "heure(s)";
        $hours->save();

        $days = new UnitOfTime();
        $days->name = "jour(s)";
        $days->save();

        $month = new UnitOfTime();
        $month->name = "mois";
        $month->save();

        $years = new UnitOfTime();
        $years->name = "année(s)";
        $years->save();

        $decade = new UnitOfTime();
        $decade->name = "décennie(s)";
        $decade->save();

        $century = new UnitOfTime();
        $century->name = "siècle(s)";
        $century->save();
    }
}
