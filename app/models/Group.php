<?php

use Illuminate\Database\Eloquent\Model as Eloquent;

class Group extends Eloquent {
    
    protected $table = 'group';

    public function company()
    {
        return $this->belongsTo('Company', 'company_id');
    }    
    
}
