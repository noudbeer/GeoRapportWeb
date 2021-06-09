<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Status;
use App\Models\Site;
use App\Http\Resources\SiteResource;

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
		$sites	   = SiteResource::collection(Site::all())->toJson();
		$status    = Status::all();

		return view('map', compact('sites', 'status'));
	}
}