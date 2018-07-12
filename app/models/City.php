<?php

use Illuminate\Database\Eloquent\Model as Eloquent;
use Cviebrock\EloquentSluggable\SluggableInterface;
use Cviebrock\EloquentSluggable\SluggableTrait;

class City extends Eloquent implements SluggableInterface {
    use SluggableTrait;
    
    protected $table = 'city';
    
    protected $sluggable = array(
        'build_from' => 'name',
        'save_to'    => 'slug',
    );    
    
}
