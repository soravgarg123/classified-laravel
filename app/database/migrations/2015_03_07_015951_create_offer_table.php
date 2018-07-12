<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOfferTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		//
	    Schema::create('offer', function($t) {
	        $t->engine ='InnoDB';
	        $t->increments('id')->unsigned();
	        $t->integer('company_id')->unsigned();
            $t->string('name', 256);
            $t->string('photo', 128);
            $t->text('description')->nullable();            
            $t->decimal('price', 6, 2)->nullable();
            $t->integer('expire_in')->unsigned();
            $t->boolean('is_review')->default(0);
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
	    Schema::table('offer', function ($t) {
	        $t->dropForeign('offer_company_id_foreign');
	    });
	    Schema::drop('offer');		
	}

}
