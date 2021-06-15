<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Status;
use App\Models\Site;
use App\Http\Resources\SiteResource;
use App\Models\ContributorSite;
use App\Models\ControllerSite;

class MapController extends Controller
{
    /**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct() {
		$this->middleware(['auth', 'verified']);
	}

	/**
	 * Show the application dashboard.
	 *
	 * @return \Illuminate\Contracts\Support\Renderable
	 */
	public function index() {

		$status	= Status::all();
		$user 	= auth()->user()->id;
		
		$sites = Site::where("owner_id", $user)->get()
				->concat(ControllerSite::where('user_id', $user)->get()->map(function ($obj) {
					return $obj->site;
				}))
				->concat(ContributorSite::where('user_id', $user)->get()->map(function ($obj) {
					return $obj->site;
				}));

		$sites = SiteResource::collection($sites)->toJson();
		
		return view('map', compact('sites', 'status'));
	}
}