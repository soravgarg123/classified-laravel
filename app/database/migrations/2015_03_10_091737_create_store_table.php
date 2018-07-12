<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStoreTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		//
	    Schema::create('store', function($t) {
	        $t->engine ='InnoDB';
	        $t->increments('id')->unsigned();
	        $t->integer('company_id')->unsigned();
	        $t->string('name', 128);
	        $t->string('email', 64)->nullable();
	        $t->integer('city_id')->unsigned()->nullable();
	        $t->string('phone', 32);
	        $t->string('photo', 128);
	        $t->string('zip_code', 16);
	        $t->string('address', 64);
	        $t->decimal('lat', 10, 6);
	        $t->decimal('lng', 10, 6);
	        $t->text('description');
	        $t->string('keyword', 512)->nullable();
	        $t->integer('count_view');
	        $t->string('token', 8);
	        $t->string('secure_key', 32);
	        $t->string('salt', 8);
	        $t->string('slug', 128);
	        $t->timestamps();
	        $t->foreign('company_id')->references('id')->on('company')
	            ->onUpdate('cascade')->onDelete('cascade');
	        $t->foreign('city_id')->references('id')->on('city')
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
	    Schema::table('store', function ($t) {
	        $t->dropForeign('store_company_id_foreign');
	        $t->dropForeign('store_city_id_foreign');
	    });
	    Schema::drop('store');		
	}

}
