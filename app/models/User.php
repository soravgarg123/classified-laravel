<?php

use Illuminate\Database\Eloquent\Model as Eloquent;
use Cviebrock\EloquentSluggable\SluggableInterface;
use Cviebrock\EloquentSluggable\SluggableTrait;

class User extends Eloquent implements SluggableInterface {
    use SluggableTrait;
    
    protected $table = 'user';
    
    protected $sluggable = array(
        'build_from' => 'name',
        'save_to'    => 'slug',
    );
    
    public function offers()
    {
        return $this->hasMany('UserOffer', 'user_id');
    }
    
    public function messages()
    {
        return $this->hasMany('\DirectoryService\Models\Message', 'user_id')
                    ->orderBy('id', 'DESC');
    }
    
    public function scopeAvailableLoyalties($query) {
        $prefix = DB::getTablePrefix();
        
        $companyId = Session::get('company_id');
        $userId = $this->id;
        $tblConsumer =with(new Consumer)->getTable();
        $tblLoyalty =with(new Loyalty)->getTable();
        
        $sql = "SELECT count_stamp 
                  FROM ".$prefix.$tblConsumer."
                 WHERE company_id = $companyId
                   AND user_id = $userId";
        $count_stamp = DB::select($sql);
        $count_stamp = $count_stamp[0]->count_stamp;
        
        $sql = "SELECT *
                  FROM ".$prefix.$tblLoyalty."
                 WHERE company_id = $companyId
                   AND count_stamp <= $count_stamp";
        $result = DB::select($sql);
        return $result;
    }
}
