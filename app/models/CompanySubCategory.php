<?php

use Illuminate\Database\Eloquent\Model as Eloquent;

class CompanySubCategory extends Eloquent {

    protected $table = 'company_sub_category';
    
    public function subCategory()
    {
        return $this->belongsTo('SubCategory', 'sub_category_id');
    }    

}
