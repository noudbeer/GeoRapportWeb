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

  /**
   * Return the page of one intervention data
   */
  public function index($id) {
    $intervention = new InterventionResource(Intervention::where('id', '=', $id)->first());
    
    return view('siteInfo', compact('intervention'));
  }

  /**
   * Return the interventions of one site
   */
  public function getInterventions($number) {

    return InterventionResource::collection(
              Intervention::where('site_id', '=', $number)->get()->sortByDesc('datetimeOfIntervention')
            );
  }

  /**
   * return data of one intervention
   */
  public function getIntervention($id) {
    return new InterventionResource(Intervention::where('id', '=', $id)->first());
  }
}
