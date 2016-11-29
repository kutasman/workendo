<?php

use Illuminate\Database\Seeder;

class SalaryTypesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
		$this->truncateSalaryTypesTables();

        \App\Models\SalaryType::create([
        	'type' => 'shift',
        	'description' => 'per shift'
        ]);
	    \App\Models\SalaryType::create([
	    	'type' => 'month',
		    'description' => 'per month'
	    ]);
    }

    protected function truncateSalaryTypesTables()
    {
	    DB::statement('SET FOREIGN_KEY_CHECKS = 0');
	    DB::table('salary_types')->truncate();
	    \App\Models\SalaryType::truncate();
	    DB::statement('SET FOREIGN_KEY_CHECKS = 1');
    }
}
