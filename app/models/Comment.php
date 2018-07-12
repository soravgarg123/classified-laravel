<?php

use Illuminate\Database\Eloquent\Model as Eloquent;

class Comment extends Eloquent {
    
    protected $table = 'comments';
    
    public function user()
    {
        return $this->belongsTo('User', 'user_id');
    }    
    
}
