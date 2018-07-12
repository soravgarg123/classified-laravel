<?php

use Illuminate\Database\Eloquent\Model as Eloquent;

class Loyalty extends Eloquent {
    
    protected $table = 'loyalty';
    
    public function company()
    {
        return $this->belongsTo('Company', 'company_id');
    }    
    
}
