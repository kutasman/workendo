<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCompaniesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('companies', function (Blueprint $table) {
            $table->increments('id');
	        $table->string('name');
	        $table->string('address')->nullable();
	        $table->integer('salary', false, true);
	        $table->string('salary_type', 25);
	        $table->integer('song_percent', false, true)->nullable();
            $table->timestamps();
        });
	    Schema::create('company_user', function ( Blueprint $table){
		    $table->integer('company_id', false, true);
		    $table->integer('user_id', false, true);

		    $table->foreign('company_id')->references('id')->on('companies');
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


        Schema::dropIfExists('companies');
        Schema::dropIfExists('company_user');

	    Schema::enableForeignKeyConstraints();

    }
}
