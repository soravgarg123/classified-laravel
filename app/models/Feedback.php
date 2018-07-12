<?php

use Illuminate\Database\Eloquent\Model as Eloquent;

class Feedback extends Eloquent {
    
    protected $table = 'feedback';
    
    public function ratings()
    {
        return $this->hasMany('Rating', 'feedback_id');
    }
    
    public function messages()
    {
        return $this->hasMany('\DirectoryService\Models\Message', 'feedback_id')
                    ->orderBy('id', 'DESC');
    }    
    
    public function user()
    {
        return $this->belongsTo('User', 'user_id');
    }

    public function store()
    {
        return $this->belongsTo('Store', 'store_id');
    }
    
    public function getTypeScore($typeId) {
        $prefix = DB::getTablePrefix();
        
        $tblRating =with(new Rating)->getTable();
        $tblRatingType =with(new RatingType)->getTable();

        $feedbackId = $this->id;
        
        $sql = "SELECT IFNULL(AVG(answer), -1) AS avgScore
                  FROM ".$prefix.$tblRating."
                 WHERE type_id = $typeId
                   AND feedback_id = $feedbackId";
        $result = DB::select($sql);
        $score = $result[0]->avgScore;
        
        $sql = "SELECT is_score
                  FROM ".$prefix.$tblRatingType."
                 WHERE id = $typeId";
        $resultType = DB::select($sql);
        if ($resultType[0]->is_score && $score == -1) {
            $score = 0;
        }
        return $score;
    }
}
