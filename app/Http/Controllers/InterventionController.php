<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Intervention;
use App\Http\Resources\InterventionResource;

class InterventionController extends Controller
{
  public function __construct() {
		$this->middleware(['auth', 'verified']);
	}

  public function getInterventions($number) {
    $interventions = Intervention::all()->where('site_id', '=', $number);

    return InterventionResource::collection($interventions);
  }
}
