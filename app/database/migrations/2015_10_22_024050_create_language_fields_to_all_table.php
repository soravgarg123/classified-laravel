<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLanguageFieldsToAllTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::table('category', function($t) {
                    $t->string('nameit');
                    $t->string('namees');
                    $t->string('descriptionit');
                    $t->string('descriptiones');
                });
        Schema::table('city', function($t) {
                    $t->string('nameit');
                    $t->string('namees');
                });
        Schema::table('class', function($t) {
                    $t->string('nameit');
                    $t->string('namees');
                    $t->string('descriptionit');
                    $t->string('descriptiones');
                });
        Schema::table('company', function($t) {
                    $t->string('nameit');
                    $t->string('namees');
                    $t->string('registerit');
                    $t->string('registeres');
                    $t->string('descriptionit');
                    $t->string('descriptiones'); 
                    $t->string('default_language');      
                });
        Schema::table('contact', function($t) {
                    $t->string('nameit');
                    $t->string('namees');
                    $t->string('descriptionit');
                    $t->string('descriptiones');
                });
        Schema::table('country', function($t) {
                    $t->string('short_nameit');
                    $t->string('short_namees');
                    $t->string('long_nameit');
                    $t->string('long_namees');
                });
        Schema::table('loyalty', function($t) {
                    $t->string('nameit');
                    $t->string('namees');
                    $t->string('descriptionit');
                    $t->string('descriptiones');
                });
        Schema::table('offer', function($t) {
                    $t->string('nameit');
                    $t->string('namees');
                    $t->string('descriptionit');
                    $t->string('descriptiones');
                });
        Schema::table('plan', function($t) {
                    $t->string('nameit');
                    $t->string('namees');
                });
        Schema::table('postcategory', function($t) {
                    $t->string('nameit');
                    $t->string('namees');
                    $t->string('descriptionit');
                    $t->string('descriptiones');
                });
        Schema::table('rating_type', function($t) {
                    $t->string('nameit');
                    $t->string('namees');
                });
        Schema::table('store', function($t) {
                    $t->string('nameit');
                    $t->string('namees');
                    $t->string('descriptionit');
                    $t->string('descriptiones');
                });
        Schema::table('sub_category', function($t) {
                    $t->string('nameit');
                    $t->string('namees');
                    $t->string('descriptionit');
                    $t->string('descriptiones');
                });
        Schema::table('sub_class', function($t) {
                    $t->string('nameit');
                    $t->string('namees');
                    $t->string('descriptionit');
                    $t->string('descriptiones');
                });
        Schema::table('user', function($t) {
                    $t->string('nameit');
                    $t->string('namees');
                });
        Schema::table('office', function($t) {
                    $t->string('nameit');
                    $t->string('namees');
                });
        Schema::table('posts', function($t) {
                    $t->string('post_contentit');
                    $t->string('post_contentes');
                    $t->string('post_titleit');
                    $t->string('post_titlees');
                });
        Schema::table('postsubcategory', function($t) {
                    $t->string('nameit');
                    $t->string('namees');
                    $t->string('descriptionit');
                    $t->string('descriptiones');
                });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::table('category', function($table) {
                    $table->dropColumn(array('nameit', 'namees', 'descriptionit', 'descriptiones'));
                });
        Schema::table('city', function($table) {
                    $table->dropColumn(array('nameit', 'namees'));
                });
        Schema::table('class', function($table) {
                    $table->dropColumn(array('nameit', 'namees', 'descriptionit', 'descriptiones'));
                });
        Schema::table('company', function($table) {
                    $table->dropColumn(array('nameit', 'namees', 'registerit', 'registeres', 'descriptionit', 'descriptiones'));
                });
        Schema::table('contact', function($table) {
                    $table->dropColumn(array('nameit', 'namees', 'descriptionit', 'descriptiones'));
                });
        Schema::table('country', function($table) {
                    $table->dropColumn(array('short_nameit', 'short_namees', 'long_nameit', 'long_namees'));
                });
        Schema::table('loyalty', function($table) {
                    $table->dropColumn(array('nameit', 'namees', 'descriptionit', 'descriptiones'));
                });
        Schema::table('offer', function($table) {
                    $table->dropColumn(array('nameit', 'namees', 'descriptionit', 'descriptiones'));
                });
        Schema::table('plan', function($table) {
                    $table->dropColumn(array('nameit', 'namees'));
                });
        Schema::table('postcategory', function($table) {
                    $table->dropColumn(array('nameit', 'namees', 'descriptionit', 'descriptiones'));
                });
        Schema::table('ratingtype', function($table) {
                    $table->dropColumn(array('nameit', 'namees'));
                });
        Schema::table('store', function($table) {
                    $table->dropColumn(array('nameit', 'namees', 'descriptionit', 'descriptiones'));
                });
        Schema::table('subcategory', function($table) {
                    $table->dropColumn(array('nameit', 'namees', 'descriptionit', 'descriptiones'));
                });
        Schema::table('subclass', function($table) {
                    $table->dropColumn(array('nameit', 'namees', 'descriptionit', 'descriptiones'));
                });
        Schema::table('user', function($table) {
                    $table->dropColumn(array('nameit', 'namees'));
                });
        Schema::table('office', function($table) {
                    $table->dropColumn(array('nameit', 'namees'));
                });
        Schema::table('posts', function($table) {
                    $table->dropColumn(array('post_contentit', 'post_contentes', 'post_titleit', 'post_titlees'));
                });
        Schema::table('postsubcategory', function($table) {
                    $table->dropColumn(array('nameit', 'namees', 'descriptionit', 'descriptiones'));
                });
    }

}
