<?php
/**
 * Created by PhpStorm.
 * User: kutas
 * Date: 21.11.16
 * Time: 0:11
 */

namespace App\Http\ViewComposers;

use App\Models\Company;
use App\Models\Shift;
use Carbon\Carbon;
use Request;
use Illuminate\View\View;
use Auth;
use Session;

class HomeComposer {


	public function compose(View $view)
	{
		// Shifts form errors
		$errors = Session::get('errors');
		$shiftsErrors = [];
		if ( $errors ){
			$shiftsErrors = $errors->has('tip') || $errors->has('company_id') || $errors->has('date') || $errors->has('songs');
		}

		//Fetch shifts
		$shifts = Auth::user()->shifts()->whereMonth('date','=', date('m'))->orderBy('date', 'asc')->get();

		//Companies
		$companies = Auth::user()->companies()->get();
		if (!$companies->isEmpty()){
			$companies->load(['incomes']);
		}



		//Report data

		//Tip
		$tip = $shifts->sum('tip');

		//Songs percent


		$salaries = $shifts->groupBy('company_id')->map(function ($shiftsInCompany, $company_id){
			$salary = Company::where('id', $company_id)->first()->incomes()->where('income_type_slug', 'salary')->first()['rules']['value'];
			$rate = Company::where('id', $company_id)->first()->incomes()->where('income_type_slug', 'rate')->first()['rules']['value'];
			return $salary + $rate * $shiftsInCompany->count();
		});
		$salary = $salaries->sum();

		$total = $salary + $tip;

		//Send date to view
		$view->with(compact('shifts', 'companies', 'shiftsErrors', 'tip', 'total', 'salary'));
	}

}