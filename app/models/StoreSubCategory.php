<?php

use Illuminate\Database\Eloquent\Model as Eloquent;

class StoreSubCategory extends Eloquent {

    protected $table = 'store_sub_category';
    
    public function subCategory()
    {
        return $this->belongsTo('SubCategory', 'sub_category_id');
    }    

}
