<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRatingTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		//
	    Schema::create('rating', function($t) {
	        $t->engine ='InnoDB';
	        $t->increments('id')->unsigned();
	        $t->integer('feedback_id')->unsigned();
	        $t->integer('type_id')->unsigned();
	        $t->integer('answer')->unsigned();
	        $t->timestamps();
	        $t->foreign('feedback_id')->references('id')->on('feedback')
	            ->onUpdate('cascade')->onDelete('cascade');
	        $t->foreign('type_id')->references('id')->on('rating_type')
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
	    Schema::table('rating', function ($t) {
	        $t->dropForeign('rating_feedback_id_foreign');
	        $t->dropForeign('rating_type_id_foreign');
	    });
	    Schema::drop('rating');		
	}

}
