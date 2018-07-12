<?php

use Illuminate\Database\Eloquent\Model as Eloquent;

class PostSubCategory extends Eloquent {

    protected $table = 'post_sub_category';
    
  
    public function Category()
    {
    	return $this->belongsTo('PostCategory', 'category_id');
    }      
}
