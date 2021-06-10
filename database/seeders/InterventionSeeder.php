<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Intervention;
use App\Models\InterventionsGroup;
use App\Models\InterventionsType;
use App\Models\User;
use App\Models\Site;
use App\Models\UnitOfTime;

class InterventionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $test = new Intervention();
        $test->site_id = Site::find(1)->id;
        $test->location = '[{"lat":45.9236921010712,"lng":6.085739135742188},{"lat":45.937064449821484,"lng":6.111145019531251},{"lat":45.94028765874568,"lng":6.138267517089845},{"lat":45.93646753871873,"lng":6.167106628417969},{"lat":45.919870837827965,"lng":6.173629760742188},{"lat":45.904702604307666,"lng":6.168823242187501},{"lat":45.90529985724799,"lng":6.151485443115234},{"lat":45.902194071790355,"lng":6.129512786865235},{"lat":45.89383147810292,"lng":6.119728088378907},{"lat":45.899088112583115,"lng":6.089000701904297}]';
        $test->datetimeOfIntervention = new \DateTime;
        $test->owner_id = User::where('firstname', 'simon')->first()->id;
        $test->teamMembers = 'Team Issou';
        $test->interventionsGroup_id = InterventionsGroup::find(1)->id;
        $test->type_id = InterventionsType::find(1)->id;
        $test->quantity = 1;
        $test->unit = 'arbre';
        $test->description = 'description test';
        $test->timeSpent = 50;
        $test->unitOfTime_id = UnitOfTime::find(1)->id;
        $test->save();

        $test = new Intervention();
        $test->site_id = Site::find(1)->id;
        $test->location = '[{"lat":45.9236921010712,"lng":6.085739135742188}]';
        $test->datetimeOfIntervention = new \DateTime;
        $test->owner_id = User::where('firstname', 'simon')->first()->id;
        $test->teamMembers = 'Michel';
        $test->interventionsGroup_id = InterventionsGroup::find(1)->id;
        $test->type_id = InterventionsType::find(1)->id;
        $test->quantity = 2;
        $test->unit = 'panneaux';
        $test->description = 'description test';
        $test->timeSpent = 50;
        $test->unitOfTime_id = UnitOfTime::find(1)->id;
        $test->save();

        $test = new Intervention();
        $test->site_id = Site::find(1)->id;
        $test->location = '[{"lat":45.94028765874568,"lng":6.138267517089845},{"lat":45.93646753871873,"lng":6.167106628417969}]';
        $test->datetimeOfIntervention = new \DateTime;
        $test->owner_id = User::where('firstname', 'simon')->first()->id;
        $test->teamMembers = 'Jack';
        $test->interventionsGroup_id = InterventionsGroup::find(1)->id;
        $test->type_id = InterventionsType::find(1)->id;
        $test->quantity = 1;
        $test->unit = 'test d\'unité';
        $test->description = 'description test';
        $test->timeSpent = 50;
        $test->unitOfTime_id = UnitOfTime::find(1)->id;
        $test->save();
    }
}
