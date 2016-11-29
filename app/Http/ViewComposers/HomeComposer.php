<?php
/**
 * Created by PhpStorm.
 * User: kutas
 * Date: 21.11.16
 * Time: 0:11
 */

namespace App\Http\ViewComposers;

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
		$companies = Auth::user()->companies;

		/*foreach ( $userCompanies->toArray() as $company )
		{
			$companies[$company['id']] = $company['name'];
		}*/

		//Report data

		$tip = $shifts->sum('tip');

		$salary = 0;
		foreach ($shifts->groupBy('company_id') as $company_id => $shiftsInCompany){
			$salary += $shiftsInCompany->count() * $companies->where('id', $company_id)->first()->salary;
		}
		$total = $tip + $salary;
		//Send date to view
		$view->with(compact('shifts', 'companies', 'shiftsErrors', 'tip', 'salary', 'total'));
	}

}