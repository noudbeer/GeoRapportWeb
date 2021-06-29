<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Status;

class StatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $finished = new Status();
        $finished->name = "Ouvert";
        $finished->save();

        $inProgress = new Status();
        $inProgress->name = "En cours";
        $inProgress->save();

        $finished = new Status();
        $finished->name = "Cloturé";
        $finished->save();
    }
}
