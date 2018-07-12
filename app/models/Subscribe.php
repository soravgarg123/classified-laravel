<?php

use Illuminate\Database\Eloquent\Model as Eloquent;

class Subscribe extends Eloquent {
    
    protected $table = 'subscribe';
    
    public function plan()
    {
        return $this->belongsTo('Plan', 'plan_id');
    }

    public function company()
    {
        return $this->belongsTo('Company', 'company_id');
    }    
}
