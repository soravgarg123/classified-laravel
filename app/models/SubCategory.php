<?php

use Illuminate\Database\Eloquent\Model as Eloquent;
use Cviebrock\EloquentSluggable\SluggableInterface;
use Cviebrock\EloquentSluggable\SluggableTrait;

class SubCategory extends Eloquent implements SluggableInterface {
    use SluggableTrait;
    
    protected $table = 'sub_category';
    
    protected $sluggable = array(
        'build_from' => 'name',
        'save_to'    => 'slug',
    );
    
    public function category() {
        return $this->belongsTo('Category', 'category_id');
    }

    public function companies() {
        return $this->hasMany('CompanySubCategory', 'sub_category_id');
    }

    public function stores() {
        return $this->hasMany('StoreSubCategory', 'sub_category_id');
    }    
    
}
