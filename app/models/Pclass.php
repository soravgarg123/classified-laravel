<?php

use Illuminate\Database\Eloquent\Model as Eloquent;
use Cviebrock\EloquentSluggable\SluggableInterface;
use Cviebrock\EloquentSluggable\SluggableTrait;

class Pclass extends Eloquent implements SluggableInterface {

    use SluggableTrait;

    protected $table = 'class';
    protected $sluggable = array(
        'build_from' => 'name',
        'save_to' => 'slug',
    );

    public function subClasses() {
        return $this->hasMany('SubClass', 'class_id');
    }

    public function companies() {
        return $this->hasMany('ProfSubClass', 'class_id');
    }

}
