<?php

use Illuminate\Database\Eloquent\Model as Eloquent;

class Cart extends Eloquent {
    
    protected $table = 'cart';
    
    public function user()
    {
        return $this->belongsTo('User', 'user_id');
    }

    public function store()
    {
        return $this->belongsTo('Store', 'store_id');
    }
        
    public function office(){
    	return $this->belongsTo('Office', 'office_id');
    }
    
    public function company(){
    	return $this->belongsTo('Company', 'company_id');
    }
}
