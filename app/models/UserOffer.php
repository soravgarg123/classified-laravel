<?php

use Illuminate\Database\Eloquent\Model as Eloquent;

class UserOffer extends Eloquent {
    
    protected $table = 'user_offer';
    
    public function user()
    {
        return $this->belongsTo('User', 'user_id');
    }
    
    public function offer()
    {
        return $this->belongsTo('Offer', 'offer_id');
    }
    
    public function scopeSoldOffers($query, $companyId, $startDate, $endDate) {
        
        $tblOffer = with(new Offer)->getTable();
        $offers = $query->select($this->table.'.*')
                ->join($tblOffer, $tblOffer.'.id', '=', $this->table.'.offer_id')
                ->where($tblOffer.'.company_id', '=', $companyId);
        if ($startDate != '') {
            $offers = $offers->where($this->table.'.created_at', '>=', $startDate.' 00:00:00');
        }
        if ($endDate != '') {
            $offers = $offers->where($this->table.'.created_at', '<=', $endDate.' 23:59:59');
        }
        return $offers->get();
                        
    }
}
