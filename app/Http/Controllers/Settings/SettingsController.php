<?php

namespace App\Http\Controllers\Settings;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Place;

class SettingsController extends Controller
{
	//Places model
	protected $places;

	public function __construct(Place $places) {
		$this->middleware('auth');
		$this->places = $places;
	}

	public function settings()
	{
		$places = $this->places->paginate(10);
		return view('settings.settings', compact('places'));
	}
}
