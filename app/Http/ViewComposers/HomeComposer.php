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
		$shifts = Auth::user()->shifts()->whereMonth('date','=', Carbon::today()->toDateString())->orderBy('date', 'asc')->get();

		//Companies
		$companies = [];
		foreach ( Auth::user()->companies->toArray() as $company )
		{
			$companies[$company['id']] = $company['name'];
		}

		//Send date to view
		$view->with(compact('shifts', 'companies', 'shiftsErrors'));
	}

}