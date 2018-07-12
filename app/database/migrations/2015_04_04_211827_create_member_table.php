<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMemberTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		//
	    Schema::create('member', function($t) {
	        $t->engine ='InnoDB';
	        $t->increments('id')->unsigned();
	        $t->integer('group_id')->unsigned();
	        $t->integer('user_id')->unsigned();
	        $t->timestamps();
	        $t->foreign('group_id')->references('id')->on('group')
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
	    Schema::table('member', function ($t) {
	        $t->dropForeign('member_group_id_foreign');
	        $t->dropForeign('member_user_id_foreign');
	    });
	    Schema::drop('member');
	}

}
