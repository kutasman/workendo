<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateShiftsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shifts', function (Blueprint $table) {
            $table->increments('id');
	        $table->date('date');
	        $table->smallInteger('songs', false, true)->nullable();
	        $table->integer('tip', false, true)->nullable();
	        $table->integer('place_id', false, true);
	        $table->integer('user_id', false, true);
	        $table->timestamps();

	        $table->foreign('place_id')->references('id')->on('places');
	        $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
	    Schema::disableForeignKeyConstraints();

	    Schema::dropIfExists('shifts');

	    Schema::enableForeignKeyConstraints();
    }
}
