<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCityTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		//
		Schema::create('city', function($t) {
		    $t->engine ='InnoDB';
		    $t->increments('id')->unsigned();
		    $t->string('name', 64);
		    $t->string('slug', 64);
		    $t->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		//
	    Schema::drop('city');
	}

}
