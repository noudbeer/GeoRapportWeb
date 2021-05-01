<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Society;

class SocietySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $example = new Society();
        $example->name = "Entreprise test";
        $example->save();

        $example = new Society();
        $example->name = "ONF";
        $example->save();
    }
}
