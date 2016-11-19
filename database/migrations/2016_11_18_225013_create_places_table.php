<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePlacesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('places', function (Blueprint $table) {
            $table->increments('id');
	        $table->string('name');
	        $table->string('address')->nullable();
	        $table->integer('salary', false, true);
	        $table->integer('song_percent', false, true)->nullable();
            $table->timestamps();
        });
	    Schema::create('place_user', function ( Blueprint $table){
		    $table->integer('place_id', false, true);
		    $table->integer('user_id', false, true);

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


        Schema::dropIfExists('places');
        Schema::dropIfExists('place_user');

	    Schema::enableForeignKeyConstraints();

    }
}
