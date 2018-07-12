<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMarketingHistoryTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		//
	    Schema::create('marketing_history', function($t) {
	        $t->engine ='InnoDB';
	        $t->increments('id')->unsigned();
	        $t->integer('group_id')->unsigned();
	        $t->text('description');
	        $t->boolean('is_email')->default(1);
	        $t->timestamps();
	        $t->foreign('group_id')->references('id')->on('group')
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
	    Schema::table('marketing_history', function ($t) {
	        $t->dropForeign('marketing_history_group_id_foreign');
	    });
	    Schema::drop('marketing_history');		
	}

}
