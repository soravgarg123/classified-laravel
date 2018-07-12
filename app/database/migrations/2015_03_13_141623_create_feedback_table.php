<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFeedbackTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		//
	    Schema::create('feedback', function($t) {
	        $t->engine ='InnoDB';
	        $t->increments('id')->unsigned();
	        $t->integer('store_id')->unsigned();
	        $t->integer('user_id')->unsigned();
            $t->text('description');
            $t->string('status', 4)->default('ST01');
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
	    Schema::table('feedback', function ($t) {
	        $t->dropForeign('feedback_store_id_foreign');
	        $t->dropForeign('feedback_user_id_foreign');
	    });
	    Schema::drop('feedback');
	}
}
