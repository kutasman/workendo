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
use Illuminate\View\View;
use Auth;

class HomeComposer {


	public function compose(View $view)
	{
		$shifts = Auth::user()->shifts()->whereMonth('date','=', date('m'))->orderBy('date', 'asc')->get();

		$companies = [];
		foreach ( Auth::user()->companies->toArray() as $company )
		{
			$companies[$company['id']] = $company['name'];
		}

		$view->with(compact('shifts', 'companies'));
	}

}