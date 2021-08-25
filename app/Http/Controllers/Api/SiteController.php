<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Intervention;
use App\Models\InterventionsGroup;
use App\Models\InterventionsType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\UnitOfTime;
use phpDocumentor\Reflection\Type;
use Psy\Util\Json;
use function Sodium\add;

class SiteController extends Controller
{
    public function index() {
        $user = Auth::user();

        $sites = $user->allSites();

        foreach ($sites as $site) {
            $site->points = json_decode($site->points);
            $site->interventions = $site->getInterventions()->get();

            foreach ($site->interventions as $it) {
                $it->location = json_decode($it->location);

                // Retrieveing names from ids
                $unitOfTime = UnitOfTime::where('id', $it->unitOfTime_id)->pluck('name')->first();
                $interventionGroup = InterventionsGroup::where('id', $it->interventionsGroup_id)->pluck('name')->first();
                $interventionType = InterventionsType::where('id', $it->type_id)->pluck('name')->first();
                
                // Setting names instead of ids
                $it->quantity = implode(' ', array($it->quantity, $it->unit));
                $it->timeSpent = implode(' ', array($it->timeSpent, $unitOfTime));
                $it->interventionsGroup = $interventionGroup;
                $it->interventionsType = $interventionType;
            }
        }

        // return response()->json();
        return response()->json(['sites' => $sites], 200, [], JSON_NUMERIC_CHECK);
    }
}
