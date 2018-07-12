<?php

use Illuminate\Database\Eloquent\Model as Eloquent;
use UserOffer as UserOfferModel, User as UserModel;

class Offer extends Eloquent {
    
    protected $table = 'offer';
    
    public function company()
    {
        return $this->belongsTo('Company', 'company_id');
    }
    
    public function scopePurchase($query)
    {
        return $query->where('is_review', '=', 0);
    }

    public function scopeActivity($query)
    {
        return $query->where('is_review', '=', 1);
    }    
    
    public function scopeActive($query)
    {
        return $query->where('is_review', '=', 0)
            ->where('expire', '>=', date('Y-m-d'));
    }
    
    public function scopeExpire($query)
    {
        return $query->where('is_review', '=', 0)
            ->where('expire', '<', date('Y-m-d'));
    }

    public function userOffers()
    {
        return $this->hasMany('UserOffer', 'offer_id');
    }    

}
