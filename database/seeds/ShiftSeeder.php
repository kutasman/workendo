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
        $shifts = factory(App\Models\Shift::class, 100)->create();
    }

    private function truncateShiftsTabel()
    {
	    DB::statement('SET FOREIGN_KEY_CHECKS = 0');
	    DB::table('shifts')->truncate();
	    DB::statement('SET FOREIGN_KEY_CHECKS = 1');
    }
}
