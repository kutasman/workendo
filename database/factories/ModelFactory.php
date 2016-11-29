<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

$factory->define(App\Models\User::class, function (Faker\Generator $faker) {
    static $password;

    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => $password ?: $password = bcrypt('secret'),
        'remember_token' => str_random(10),
    ];
});

$factory->define(App\Models\Shift::class, function (Faker\Generator $faker){
	static $date;

	$date = $date ? $date->addDay() : \Carbon\Carbon::createFromDate(2016, 11, 01);
	return [
		'date' => $date->format('Y-m-d'),
		'company_id' => random_int(1,2),
		'user_id' => 1,
		'tip' => random_int(100,1000),
	];
});