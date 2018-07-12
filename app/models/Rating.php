<?php

use Illuminate\Database\Eloquent\Model as Eloquent;

class Rating extends Eloquent{
    protected $table = 'rating';
    
    public function type()
    {
        return $this->belongsTo('RatingType', 'type_id');
    }
}
