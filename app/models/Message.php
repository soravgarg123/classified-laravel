<?php namespace DirectoryService\Models;

use Illuminate\Database\Eloquent\Model as Eloquent;

class Message extends Eloquent {
    
    protected $table = 'message';

    public function company()
    {
        return $this->belongsTo('Company', 'company_id');
    }

    public function user()
    {
        return $this->belongsTo('User', 'user_id');
    }
    
    public function feedback()
    {
        return $this->belongsTo('Feedback', 'feedback_id');
    }    
    
}
