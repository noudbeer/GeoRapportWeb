<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use function Sodium\add;

class SiteController extends Controller
{
    public function index() {
        $user = Auth::user();
        $sites = array();

        foreach ($user->validatorSites as $site) {
            $sites[$site->cpdNumber] = $site->name;
        }

        foreach ($user->contributorSites as $site) {
            $sites[$site->cpdNumber] = $site->name;
        }

        foreach ($user->ownerSites as $site) {
            $sites[$site->cpdNumber] = $site->name;
        }

        return response()->json(['data' => $sites], 200, [], JSON_NUMERIC_CHECK);
    }
}
