<?php

use Illuminate\Database\Eloquent\Model as Eloquent;

class MarketingHistory extends Eloquent {
    
    protected $table = 'marketing_history';

    public function group()
    {
        return $this->belongsTo('Group', 'group_id');
    }
    
}
