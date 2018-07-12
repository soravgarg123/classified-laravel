<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCartTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		//
	    Schema::create('cart', function($t) {
	        $t->engine ='InnoDB';
	        $t->increments('id')->unsigned();
	        $t->integer('user_id')->unsigned();
	        $t->integer('store_id')->unsigned();
	        $t->timestamps();
	        $t->foreign('store_id')->references('id')->on('store')
	            ->onUpdate('cascade')->onDelete('cascade');
	        $t->foreign('user_id')->references('id')->on('user')
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
	    Schema::table('cart', function ($t) {
	        $t->dropForeign('cart_store_id_foreign');
	        $t->dropForeign('cart_user_id_foreign');
	    });
	    Schema::drop('cart');		
	}

}
