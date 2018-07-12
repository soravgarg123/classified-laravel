<?php

use Illuminate\Database\Eloquent\Model as Eloquent;
use Cviebrock\EloquentSluggable\SluggableInterface;
use Cviebrock\EloquentSluggable\SluggableTrait;

class SubClass extends Eloquent implements SluggableInterface {
    use SluggableTrait;
    
    protected $table = 'sub_class';
    
    protected $sluggable = array(
        'build_from' => 'name',
        'save_to'    => 'slug',
    );
    
    public function category() {
        return $this->belongsTo('Class', 'class_id');
    }

    public function companies() {
        return $this->hasMany('ProfSubClass', 'sub_class_id');
    }
    

}