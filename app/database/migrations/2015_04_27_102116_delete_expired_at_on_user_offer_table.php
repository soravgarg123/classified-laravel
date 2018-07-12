<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class DeleteExpiredAtOnUserOfferTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		//
	    Schema::table('user_offer', function ($t) {
	        $t->dropColumn('expired_at');
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
	    Schema::table('user_offer', function($t) {
	        $t->string('expired_at', 10)->after('code');
	    });		
	}

}
