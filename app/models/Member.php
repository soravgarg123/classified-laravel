<?php

use Illuminate\Database\Eloquent\Model as Eloquent;

class Member extends Eloquent {
    
    protected $table = 'member';

    public function group()
    {
        return $this->belongsTo('Group', 'group_id');
    }

    public function user()
    {
        return $this->belongsTo('User', 'user_id');
    }    
    
}
