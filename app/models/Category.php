<?php

use Illuminate\Database\Eloquent\Model as Eloquent;
use Cviebrock\EloquentSluggable\SluggableInterface;
use Cviebrock\EloquentSluggable\SluggableTrait;

class Category extends Eloquent implements SluggableInterface {

    use SluggableTrait;

    protected $table = 'category';
    protected $sluggable = array(
        'build_from' => 'name',
        'save_to' => 'slug',
    );

    public function subCategories() {
        $current_lang = isset($_COOKIE['current_lang']) ? ($_COOKIE['current_lang'] != 'en' ? $_COOKIE['current_lang'] : '') : '';
        return $this->hasMany('SubCategory', 'category_id')->orderBy('name' . $current_lang, 'ASC');
    }

    public function companies() {
        return $this->hasMany('CompanySubCategory', 'category_id');
    }

    public function stores() {
        return $this->hasMany('StoreSubCategory', 'category_id');
    }

}
