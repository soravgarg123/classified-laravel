<?php

use Illuminate\Database\Eloquent\Model as Eloquent;
use Cviebrock\EloquentSluggable\SluggableInterface;
use Cviebrock\EloquentSluggable\SluggableTrait;

class PostCategory extends Eloquent implements SluggableInterface {

    use SluggableTrait;

    protected $table = 'postcategory';
    protected $sluggable = array(
        'build_from' => 'name',
        'save_to' => 'slug',
    );

    public function Category() {
        return $this->belongsTo('Category', 'category_id');
    }

    public function subCategories() {
        $current_lang = isset($_COOKIE['current_lang']) ? ($_COOKIE['current_lang'] != 'en' ? $_COOKIE['current_lang'] : '') : '';
        return $this->hasMany('BlogSubCategory', 'category_id')->orderBy('name' . $current_lang, 'ASC');
    }

    public function getCatCount($id) {
        $prefix = DB::getTablePrefix();
        $tblCat = with(new PostSubCategory)->getTable();
        $sql = "select * from " . $prefix . $tblCat . " where category_id = " . $id;

        $res = DB::select($sql);
        return count($res);
    }

}
