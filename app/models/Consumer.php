<?php

use Illuminate\Database\Eloquent\Model as Eloquent;

class Consumer extends Eloquent {
    
    protected $table = 'consumer';
    
    public function user()
    {
        return $this->belongsTo('User', 'user_id');
    }

    public function company()
    {
        return $this->belongsTo('Company', 'company_id');
    }

    public function scopeSearch($query, $companyId, $keyword = '') {
        $prefix = DB::getTablePrefix();
    
        $tblUser = with(new User)->getTable();
        $result =  $query->select($this->table.'.*')
                        ->leftJoin($tblUser, $tblUser.'.id', '=', $this->table.'.user_id');
        $result = $result->where('company_id', '=', $companyId);
    
        if ($keyword != '') {
            $result = $result->where(function($query) use ($keyword, $tblUser) {
                $query->where($tblUser.'.name', 'like', '%'.$keyword.'%')
                        ->orWhere($tblUser.'.phone', 'like', '%'.$keyword.'%')
                        ->orWhere($tblUser.'.email', 'like', '%'.$keyword.'%');
            });
        }
        return $result;
    }
    
}
