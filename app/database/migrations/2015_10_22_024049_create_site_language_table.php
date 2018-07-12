<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSiteLanguageTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        //
        Schema::create('site_languages', function($t) {
                    $t->engine = 'InnoDB';
                    $t->increments('id')->unsigned();
                    $t->string('name', 256);
                    $t->text('slug')->nullable();
                    $t->timestamps();
                });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {

        Schema::drop('site_languages');
    }

}
