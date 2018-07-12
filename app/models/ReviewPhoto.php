<?php

use Illuminate\Database\Eloquent\Model as Eloquent;

class ReviewPhoto extends Eloquent{
    protected $table = 'review_photo';
    public function user()
    {
        return $this->belongsTo('User', 'user_id');
    }    
}
