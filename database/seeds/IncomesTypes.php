<?php

use Illuminate\Database\Seeder;
use App\Models\IncomeType;
class IncomesTypes extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        IncomeType::create([
        	'income_type_name' => 'Songs out of turn',
	        'income_type_slug' => 'song',
	        'income_type_desc' => '',
        ]);
        IncomeType::create([
	        'income_type_name' => 'Salary',
	        'income_type_slug' => 'salary',
	        'income_type_desc' => '',
        ]);
	    IncomeType::create([
		    'income_type_name' => 'Rate',
		    'income_type_slug' => 'rate',
		    'income_type_desc' => '',
	    ]);
    }
}
