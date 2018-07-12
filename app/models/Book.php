<?php

use Illuminate\Database\Eloquent\Model as Eloquent;

class Book extends Eloquent {
    
    protected $table = 'cart';
    
    public function company()
    {
        return $this->belongsTo('Company', 'company_id');
    }      
    
    public function user()
    {
    	return $this->belongsTo('User', 'user_id');
    }
   public function store()
    {
    	return $this->belongsTo('Store', 'store_id');
    }
}