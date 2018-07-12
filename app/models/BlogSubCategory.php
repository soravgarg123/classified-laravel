<?php

use Illuminate\Database\Eloquent\Model as Eloquent;
use Cviebrock\EloquentSluggable\SluggableInterface;
use Cviebrock\EloquentSluggable\SluggableTrait;

class BlogSubCategory extends Eloquent implements SluggableInterface {
    use SluggableTrait;
    
    protected $table = 'postsubcategory';
    
    protected $sluggable = array(
        'build_from' => 'name',
        'save_to'    => 'slug',
    );
    
    public function category() {
        return $this->belongsTo('PostCategory', 'category_id');
    }

    public function posts() {
        return $this->hasMany('PostSubCategory', 'sub_category_id');
    }
}
