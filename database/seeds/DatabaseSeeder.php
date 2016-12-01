<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
	    $this->call(LaratrustSeeder::class);
	    $this->call(IncomesTypes::class);
	    //$this->call(SalaryTypesSeeder::class);
	    //$this->call(CompaniesSeeder::class);
	    //$this->call(ShiftSeeder::class);
    }
}
