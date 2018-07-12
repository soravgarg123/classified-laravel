<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCompanyOpeningTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		//
	    Schema::create('company_opening', function($t) {
	        $t->engine ='InnoDB';
	        $t->increments('id')->unsigned();
	        $t->integer('company_id')->unsigned();
	        $t->string('mon_start', 8);
	        $t->string('mon_end', 8);
	        $t->string('tue_start', 8);
	        $t->string('tue_end', 8);
	        $t->string('wed_start', 8);
	        $t->string('wed_end', 8);
	        $t->string('thu_start', 8);
	        $t->string('thu_end', 8);
	        $t->string('fri_start', 8);
	        $t->string('fri_end', 8);
	        $t->string('sat_start', 8);
	        $t->string('sat_end', 8);
	        $t->string('sun_start', 8);
	        $t->string('sun_end', 8);
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
	    Schema::table('company_opening', function ($t) {
	        $t->dropForeign('company_opening_company_id_foreign');
	    });
	    Schema::drop('company_opening');
	}

}
