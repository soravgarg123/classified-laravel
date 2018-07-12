<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserOfferTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		//
	    Schema::create('user_offer', function($t) {
	        $t->engine ='InnoDB';
	        $t->increments('id')->unsigned();
	        $t->integer('user_id')->unsigned();
	        $t->integer('offer_id')->unsigned();
	        $t->boolean('is_used')->default(0);
	        $t->string('code', 8);
	        $t->string('expired_at', 10);
	        $t->timestamps();
	        $t->foreign('user_id')->references('id')->on('user')
	            ->onUpdate('cascade')->onDelete('cascade');
	        $t->foreign('offer_id')->references('id')->on('offer')
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
	    Schema::table('user_offer', function ($t) {
	        $t->dropForeign('user_offer_user_id_foreign');
	        $t->dropForeign('user_offer_offer_id_foreign');
	    });
	    Schema::drop('user_offer');
	}

}
