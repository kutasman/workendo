<?php

namespace App\Providers;

use Carbon\Carbon;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;

class ComposerServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        View::composer('home', 'App\Http\ViewComposers\HomeComposer');

	    View::composer(['shifts.create', 'shifts.edit'], function ($view){
				$view->with([
					'today' => Carbon::today()->format('Y-m-d'),
					'yesterday' => Carbon::yesterday()->format('Y-m-d'),
				]);
	    });
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
