<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Intervention;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use phpDocumentor\Reflection\Type;
use Psy\Util\Json;
use function Sodium\add;

class SiteController extends Controller
{
    public function index() {
        $user = Auth::user();
        $interventions = Intervention::all();

        $sites = $user->allSites();
//        $sites = $user->validatorSites()->get();
//        $sites = $sites->merge($user->contributorSites()->get());
//        $sites = $sites->merge($user->ownerSites()->get());

        foreach ($sites as $site) {
            $site->points = json_decode($site->points);
            $site->interventions = $interventions->where('site_id', $site->id);

            foreach ($site->interventions as $it) {
                $it->location = json_decode($it->location);
            }
        }

         return response()->json(['sites' => $sites], 200, [], JSON_NUMERIC_CHECK);
    }
}
