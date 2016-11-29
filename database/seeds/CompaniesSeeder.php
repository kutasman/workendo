<?php

use Illuminate\Database\Seeder;

class CompaniesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$this->truncateSalaryTypesTables();

	    \App\Models\User::where(['id' => 1])->first()->companies()->create([
		    'name' => 'Avalon',
		    'address' => 'Address',
		    'salary' => 400,
		    'salary_type_id' => 1
	    ]);
	    \App\Models\User::where(['id' => 1])->first()->companies()->create([
		    'name' => 'Beeze',
		    'address' => 'Address 2',
		    'salary' => 300,
		    'salary_type_id' => 1
	    ]);
    }
	protected function truncateSalaryTypesTables()
	{
		DB::statement('SET FOREIGN_KEY_CHECKS = 0');
		DB::table('companies')->truncate();
		\App\Models\Company::truncate();
		DB::statement('SET FOREIGN_KEY_CHECKS = 1');
	}
}
