<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStoreSubCategoryTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		//
	    Schema::create('store_sub_category', function($t) {
	        $t->engine ='InnoDB';
	        $t->increments('id')->unsigned();
	        $t->integer('store_id')->unsigned();
	        $t->integer('category_id')->unsigned();
	        $t->integer('sub_category_id')->unsigned();
	        $t->timestamps();
	        $t->foreign('store_id')->references('id')->on('store')
	            ->onUpdate('cascade')->onDelete('cascade');
	        $t->foreign('category_id')->references('id')->on('category')
	            ->onUpdate('cascade')->onDelete('cascade');
	        $t->foreign('sub_category_id')->references('id')->on('sub_category')
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
	    Schema::table('store_sub_category', function ($t) {
	        $t->dropForeign('store_sub_category_store_id_foreign');
	        $t->dropForeign('store_sub_category_category_id_foreign');
	        $t->dropForeign('store_sub_category_sub_category_id_foreign');	        
	    });
	    Schema::drop('store_sub_category');		
	}

}
