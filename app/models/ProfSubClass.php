<?php

use Illuminate\Database\Eloquent\Model as Eloquent;

class ProfSubClass extends Eloquent {

    protected $table = 'prof_sub_class';
    
    public function subClasses()
    {
        return $this->belongsTo('SubClass', 'sub_class_id');
    }    

}
