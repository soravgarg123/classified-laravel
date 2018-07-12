<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserLoyaltyTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		//
	    Schema::create('user_loyalty', function($t) {
	        $t->engine ='InnoDB';
	        $t->increments('id')->unsigned();
	        $t->integer('user_id')->unsigned();
	        $t->integer('loyalty_id')->unsigned();
	        $t->timestamps();
	        $t->foreign('user_id')->references('id')->on('user')
	            ->onUpdate('cascade')->onDelete('cascade');
	        $t->foreign('loyalty_id')->references('id')->on('loyalty')
	            ->onUpdate('cascade')->onDelete('cascade');
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
	    Schema::table('user_loyalty', function ($t) {
	        $t->dropForeign('user_loyalty_user_id_foreign');
	        $t->dropForeign('user_loyalty_loyalty_id_foreign');
	    });
	    Schema::drop('user_loyalty');		
	}
}
