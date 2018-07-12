<?php

use Illuminate\Database\Eloquent\Model as Eloquent;

class UserLoyalty extends Eloquent {
    
    protected $table = 'user_loyalty';
    
    public function user()
    {
        return $this->belongsTo('User', 'user_id');
    }
    
    public function offer()
    {
        return $this->belongsTo('Offer', 'offer_id');
    }
    
    public function scopeUsedLoyalties($query, $companyId, $startDate, $endDate) {
    
        $tblLoyalty = with(new Loyalty)->getTable();
        $loyalties = $query->select($this->table.'.*')
                        ->join($tblLoyalty, $tblLoyalty.'.id', '=', $this->table.'.loyalty_id')
                        ->where($tblLoyalty.'.company_id', '=', $companyId);
        if ($startDate != '') {
            $loyalties = $loyalties->where($this->table.'.created_at', '>=', $startDate.' 00:00:00');
        }
        if ($endDate != '') {
            $loyalties = $loyalties->where($this->table.'.created_at', '<=', $endDate.' 23:59:59');
        }
        return $loyalties->get();
    
    }    
}
