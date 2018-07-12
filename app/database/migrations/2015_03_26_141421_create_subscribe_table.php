<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSubscribeTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		//
	    Schema::create('subscribe', function($t) {
	        $t->engine ='InnoDB';
	        $t->increments('id')->unsigned();
	        $t->integer('company_id')->unsigned();
	        $t->integer('plan_id')->unsigned();
	        $t->decimal('price', 8, 2);
	        $t->string('customer_code', 64);
	        $t->string('code', 64)->nullable();
	        $t->timestamps();
	        $t->foreign('company_id')->references('id')->on('company')
	            ->onUpdate('cascade')->onDelete('cascade');
	        $t->foreign('plan_id')->references('id')->on('plan')
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
	    Schema::table('subscribe', function ($t) {
	        $t->dropForeign('subscribe_company_id_foreign');
	        $t->dropForeign('subscribe_plan_id_foreign');
	    });
	    Schema::drop('subscribe');
	}
}
