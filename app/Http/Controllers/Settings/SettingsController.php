<?php

namespace App\Http\Controllers\Settings;

use App\Http\Controllers\Controller;
use App\Models\IncomeType;
use Illuminate\Http\Request;
use App\Models\Company;
use Auth;

class SettingsController extends Controller
{
	//Places model
	protected $companies;

	public function __construct(Company $company) {
		$this->middleware('auth');
		$this->companies = $company;
	}

	public function settings()
	{
		$companies = Auth::user()->companies()->paginate(10);
		$income_types = IncomeType::all();
		return view('settings.settings', compact('companies', 'income_types'));
	}
}
