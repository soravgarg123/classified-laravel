<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReviewPhotoTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		//
	    Schema::create('review_photo', function($t) {
	        $t->engine ='InnoDB';
	        $t->increments('id')->unsigned();
	        $t->integer('store_id')->unsigned();
	        $t->integer('user_id')->unsigned();
	        $t->string('photo', 128);
	        $t->string('description', 256)->nullable();
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
	    Schema::table('review_photo', function ($t) {
	        $t->dropForeign('review_photo_store_id_foreign');
	        $t->dropForeign('review_photo_user_id_foreign');
	    });
	    Schema::drop('review_photo');
	}

}
