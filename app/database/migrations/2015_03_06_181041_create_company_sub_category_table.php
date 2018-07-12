<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCompanySubCategoryTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		//
	    Schema::create('company_sub_category', function($t) {
            $t->engine ='InnoDB';
            $t->increments('id')->unsigned();
            $t->integer('company_id')->unsigned();
            $t->integer('category_id')->unsigned();
            $t->integer('sub_category_id')->unsigned();
            $t->timestamps();
            $t->foreign('company_id')->references('id')->on('company')
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
	    Schema::table('company_sub_category', function ($t) {
	        $t->dropForeign('company_sub_category_company_id_foreign');
	        $t->dropForeign('company_sub_category_category_id_foreign');
	        $t->dropForeign('company_sub_category_sub_category_id_foreign');
	    });
	    Schema::drop('company_sub_category');
	}

}
