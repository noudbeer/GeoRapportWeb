<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use phpDocumentor\Reflection\Type;
use Psy\Util\Json;
use function Sodium\add;

class SiteController extends Controller
{
    public function index() {
        $user = Auth::user();
        $sites = array();

        $sites = $user->validatorSites()->get();
        $sites = $sites->merge($user->contributorSites()->get());
        $sites = $sites->merge($user->ownerSites()->get());

        foreach ($sites as $site) {
            $site->points = json_decode($site->points);
        }

         return response()->json(['data' => $sites], 200, [], JSON_NUMERIC_CHECK);
    }
}
