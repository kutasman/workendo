<?php

use Illuminate\Database\Seeder;

class ShiftSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

	    $this->truncateShiftsTabel();
	    \App\Models\User::where(['id' => 1])->first()->companies()->create([
	    	'name' => 'Test',
		    'address' => 'Address',
		    'salary' => '500',
		    'salary_type' => 'shift'
	    ]);
        $shifts = factory(App\Models\Shift::class, 100)->create();
    }

    private function truncateShiftsTabel()
    {
	    DB::statement('SET FOREIGN_KEY_CHECKS = 0');
	    DB::table('shifts')->truncate();
	    DB::statement('SET FOREIGN_KEY_CHECKS = 1');
    }
}
