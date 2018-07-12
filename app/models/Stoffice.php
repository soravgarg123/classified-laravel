<?php

use Illuminate\Database\Eloquent\Model as Eloquent;


class Stoffice extends Eloquent {
    //use SluggableTrait;
    
    protected $table = 'store_office';

        
    
    public function store()
    {
        return $this->belongsTo('Store', 'store_id');
    }
    public function office()
    {
    	return $this->belongsTo('Office', 'office_id');
    }    
}
