<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCompanyTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		//
	    Schema::create('company', function($t) {
	        $t->engine ='InnoDB';
	        $t->increments('id')->unsigned();
	        $t->string('name', 128);
	        $t->string('email', 64);
	        $t->string('phone', 32)->nullable();
	        $t->string('photo', 128);
	        $t->string('vat_id', 64)->nullable();
	        $t->string('keyword', 512)->nullable();
	        $t->integer('count_email')->unsigned()->default(0);
	        $t->integer('count_sms')->unsigned()->default(0);
	        $t->integer('plan_id')->unsigned()->nullable();
	        $t->boolean('is_completed')->default(0);
	        $t->string('token', 8);
	        $t->string('secure_key', 32);
	        $t->string('salt', 8);
	        $t->string('slug', 128);
	        $t->timestamps();
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
	    Schema::table('company', function ($t) {
	        $t->dropForeign('company_plan_id_foreign');
	    });
	    Schema::drop('company');
	}

}
