<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContactTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		//
	    Schema::create('contact', function($t) {
	        $t->engine ='InnoDB';
	        $t->increments('id')->unsigned();
	        $t->integer('company_id')->unsigned();
	        $t->string('name', 64);
	        $t->string('email', 64);
	        $t->text('description');
	        $t->boolean('is_processed')->default(0);
	        $t->timestamps();
	        $t->foreign('company_id')->references('id')->on('company')
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
	    Schema::table('contact', function ($t) {
	        $t->dropForeign('contact_company_id_foreign');
	    });
	    Schema::drop('contact');		
	}
}
