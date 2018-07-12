<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		//
	    Schema::create('user', function($t) {
	        $t->engine ='InnoDB';
	        $t->increments('id')->unsigned();
	        $t->string('name', 64);
	        $t->string('email', 64);
	        $t->string('phone', 32)->nullable();
	        $t->string('photo', 128);
	        $t->string('token', 16);
	        $t->string('secure_key', 32);
	        $t->string('salt', 8);
	        $t->string('slug', 64);
	        $t->boolean('is_active')->default(0);
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
	    Schema::drop('user');		
	}

}
