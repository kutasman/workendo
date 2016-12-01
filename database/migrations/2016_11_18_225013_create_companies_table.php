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
        Schema::create('companies', function ( Blueprint $table ) {
            $table->increments('id');
	        $table->string('name');
	        $table->string('address')->nullable();
            $table->timestamps();
        });
	    Schema::create('company_user', function ( Blueprint $table ){
		    $table->integer('company_id', false, true);
		    $table->integer('user_id', false, true);

		    $table->foreign('company_id')->references('id')->on('companies');
		    $table->foreign('user_id')->references('id')->on('users');
	    });
	    Schema::create('incomes', function ( Blueprint $table ){
	    	$table->increments('id');
	    	$table->string('description');
		    $table->integer('income_type_id', false, true);
		    $table->integer('company_id', false, true);
		    $table->json('rules');

		    $table->foreign('company_id')->references('id')->on('companies');
	    });
	    Schema::create('income_types', function ( Blueprint $table ){
		    $table->increments('id');
		    $table->string('income_type_name', 45);
		    $table->string('income_type_slug', 45);
		    $table->string('income_type_desc', 255);

	    });
	    Schema::create('incomes_income_types', function (Blueprint $table){
			$table->integer('income_id', false, true);
			$table->integer('income_type_id', false, true);

			$table->foreign('income_id')->references('id')->on('incomes');
			$table->foreign('income_type_id')->references('id')->on('income_types');
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

	    Schema::dropIfExists('incomes_income_types');
	    Schema::dropIfExists('incomes');
		Schema::dropIfExists('income_types');
        Schema::dropIfExists('companies');
        Schema::dropIfExists('company_user');

	    Schema::enableForeignKeyConstraints();

    }
}
