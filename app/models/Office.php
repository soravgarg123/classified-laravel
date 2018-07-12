<?php

use Illuminate\Database\Eloquent\Model as Eloquent;
//use Cviebrock\EloquentSluggable\SluggableInterface;
//use Cviebrock\EloquentSluggable\SluggableTrait;

class Office extends Eloquent {
    //use SluggableTrait;
    
    protected $table = 'office';
    
    public function company()
    {
        return $this->belongsTo('Company', 'company_id');
    }    
    
    public function opening()
    {
    	return $this->hasOne('OfficeOpening', 'office_id');
    }
}
