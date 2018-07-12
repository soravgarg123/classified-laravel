<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddIsHeaderOnCompanyWidgetTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		//
	    Schema::table('company_widget', function($t) {
	        $t->boolean('is_header')->default(1)->after('background');
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
	        $t->dropColumn('is_header');
	    });
	}

}
