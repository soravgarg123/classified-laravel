<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCompanyWidgetTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		//
	    Schema::create('company_widget', function($t) {
	        $t->engine ='InnoDB';
	        $t->increments('id')->unsigned();
	        $t->integer('company_id')->unsigned();
	        $t->string('logo', 256);
	        $t->string('color', 8);
	        $t->string('header', 8);
	        $t->string('background', 8);
	        $t->text('custom_css');
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
	    Schema::table('company_widget', function ($t) {
	        $t->dropForeign('company_widget_company_id_foreign');
	    });
	    Schema::drop('company_widget');		
	}

}
