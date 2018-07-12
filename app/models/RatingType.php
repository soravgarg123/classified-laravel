<?php

use Illuminate\Database\Eloquent\Model as Eloquent;

class RatingType extends Eloquent{
    protected $table = 'rating_type';
    
    public function scopeVisible($query) {
        return $query->where('is_visible', TRUE);
    }
    
    public function scopeScore($query) {
        return $query->where('is_score', TRUE);
    }    
    
    public function getCompanyAvgScore($year = '2015', $month = '04') {
        $typeId = $this->id;
        $prefix = DB::getTablePrefix();
        $tblRating = with(new Rating)->getTable();
        
        $start = $year."-".$month."-01 00:00:00";
        $end = $year."-".$month."-31 23:59:59";

        $sql = "SELECT ROUND(IFNULL(AVG(answer), 0), 2) AS avgScore
                  FROM ".$prefix.$tblRating."
                 WHERE type_id = $typeId
                   AND created_at >= '$start'
                   AND created_at <= '$end'";
        
        $result = DB::select($sql);
        return $result[0]->avgScore;
    }
    
    public function getCompanyCountAnswer($year = '2015', $month = '04', $answer = 1) {
        $typeId = $this->id;
        $prefix = DB::getTablePrefix();
        $tblRating = with(new Rating)->getTable();
        
        $start = $year."-".$month."-01 00:00:00";
        $end = $year."-".$month."-31 23:59:59";
        
        $sql = "SELECT COUNT(*) AS cntAnswer
                  FROM ".$prefix.$tblRating."
                 WHERE type_id = $typeId
                   AND answer = $answer
                   AND created_at >= '$start'
                   AND created_at <= '$end'";
        
        $result = DB::select($sql);
        return $result[0]->cntAnswer;        
    }
    
    public function getStoreAvgScore($storeId, $year = '2015', $month = '04') {
        $typeId = $this->id;
        $prefix = DB::getTablePrefix();
        $tblRating = with(new Rating)->getTable();
        $tblFeedback = with(new Feedback)->getTable();
    
        $start = $year."-".$month."-01 00:00:00";
        $end = $year."-".$month."-31 23:59:59";
    
        $sql = "SELECT ROUND(IFNULL(AVG(answer), 0), 2) AS avgScore
                  FROM ".$prefix.$tblRating." AS t1, ".$prefix.$tblFeedback." AS t2
                      WHERE t1.type_id = $typeId
                      AND t1.created_at >= '$start'
                      AND t1.created_at <= '$end'
                      AND t1.feedback_id = t2.id
                      AND t2.store_id = $storeId";
    
        $result = DB::select($sql);
        return $result[0]->avgScore;
    }
    
    public function getStoreCountAnswer($storeId, $year = '2015', $month = '04', $answer = 1) {
        $typeId = $this->id;
        $prefix = DB::getTablePrefix();
        $tblRating = with(new Rating)->getTable();
        $tblFeedback = with(new Feedback)->getTable();
    
        $start = $year."-".$month."-01 00:00:00";
        $end = $year."-".$month."-31 23:59:59";
    
        $sql = "SELECT COUNT(*) AS cntAnswer
                  FROM ".$prefix.$tblRating." AS t1, ".$prefix.$tblFeedback." AS t2
                      WHERE t1.type_id = $typeId
                      AND t1.answer = $answer
                      AND t1.created_at >= '$start'
                      AND t1.created_at <= '$end'
                      AND t1.feedback_id = t2.id
                      AND t2.store_id = $storeId";
    
        $result = DB::select($sql);
        return $result[0]->cntAnswer;
    }    
}
