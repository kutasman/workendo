<?php
/**
 * Created by PhpStorm.
 * User: kutas
 * Date: 21.11.16
 * Time: 0:11
 */

namespace App\Http\ViewComposers;

use Carbon\Carbon;
use Illuminate\View\View;
use Auth;

class HomeComposer {


	public function compose(View $view)
	{
		$shifts = Auth::user()->shifts()->paginate(10);
		$view->with(compact('shifts'));
	}

}