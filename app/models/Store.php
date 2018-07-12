<?php

use Illuminate\Database\Eloquent\Model as Eloquent;
use Cviebrock\EloquentSluggable\SluggableInterface;
use Cviebrock\EloquentSluggable\SluggableTrait;

class Store extends Eloquent implements SluggableInterface {
    use SluggableTrait;
    
    protected $table = 'store';
    
    protected $sluggable = array(
        'build_from' => 'name',
        'save_to'    => 'slug',
    );
    
    public function city()
    {
        return $this->belongsTo('City', 'city_id');
    }     
    
    
    public function company()
    {
        return $this->belongsTo('Company', 'company_id');
    }    

    public function subCategories()
    {
        return $this->hasMany('StoreSubCategory', 'store_id');
    }
    
    public function officies(){
    	return $this->hasMany('Stoffice','store_id');
    }
    
    public function feedbacks()
    {
        return $this->hasMany('Feedback', 'store_id')->orderBy('created_at', 'DESC');
    }

    public function getRatingScore() {
        $prefix = DB::getTablePrefix();
        
        $tblFeedback = with(new Feedback)->getTable();
        $tblRating = with(new Rating)->getTable();
        $tblRatingType = with(new RatingType)->getTable();
        
        $sql = "SELECT IFNULL(AVG(t3.answer), 0) AS avgScore
                  FROM ".$prefix."$this->table as t1, ".$prefix."$tblFeedback t2, ".$prefix."$tblRating t3, ".$prefix."$tblRatingType t4
                 WHERE t1.id = t2.store_id
                   AND t2.id = t3.feedback_id
                   AND t3.type_id = t4.id
                   AND t4.is_score
                   AND t1.id = $this->id";
        
        $result = DB::select($sql);
        return $result[0]->avgScore;
    }
	public function getRatingCount(){
		$prefix = DB::getTablePrefix();
		
		$tblFeedback = with(new Feedback)->getTable();
		$tblRating = with(new Rating)->getTable();
		$tblRatingType = with(new RatingType)->getTable();
		
		$sql = "SELECT COUNT(*) AS count
                  FROM ".$prefix."$tblFeedback t1
		                  WHERE t1.store_id = $this->id";
		
		$result = DB::select($sql);
		return $result[0]->count;
	}
    
    public function scopeSimilar($query) {
        $storeId = $this->id;
        
        $prefix = DB::getTablePrefix();
        
        $tblStoreSubCategory =with(new StoreSubCategory)->getTable();
        $tblCategory = with(new Category)->getTable();
        $tblSubCategory = with(new SubCategory)->getTable();
        $tblCity = with(new City)->getTable();
        
        $sql = "SELECT sub_category_id 
                  FROM ".$prefix.$tblStoreSubCategory."
                 WHERE store_id = $storeId";
        $subCategoreis = DB::select($sql);
        
        $subCategoryIds = [];
        $subCategoryIds[] = 0;
        foreach ($subCategoreis as $key => $value) {
            $subCategoryIds[] = $value->sub_category_id;
        }
        
        return $query->select($this->table.'.*')
                        ->leftJoin($tblStoreSubCategory, $tblStoreSubCategory.'.store_id', '=', $this->table.'.id')
                        ->leftJoin($tblCategory, $tblStoreSubCategory.'.category_id', '=', $tblCategory.'.id')
                        ->leftJoin($tblSubCategory, $tblStoreSubCategory.'.sub_category_id', '=', $tblSubCategory.'.id')
                        ->leftJoin($tblCity, $this->table.'.city_id', '=', $tblCity.'.id')
                        ->whereIn('sub_category_id', $subCategoryIds)
                        ->where($this->table.'.id', '<>', $storeId)
                        ->groupBy($this->table.'.id')
                        ->take(8)
                        ->get();
    }

    public function scopeSearch($query, $keyword, $location, $fromPrice, $toPrice, $fromRate, $toRate, $office_available, $online_payment, $discount_available, $lat = 0, $lng = 0)
    {
        $prefix = DB::getTablePrefix();
        
        $tblStoreSubCategory =with(new StoreSubCategory)->getTable();
        $tblCategory = with(new Category)->getTable();
        $tblSubCategory = with(new SubCategory)->getTable();
        $tblOffice = with(new Office)->getTable();
        $tblStoreOffice = with(new Stoffice)->getTable();
        
        
        
        $result =  $query->select($this->table.'.*',$tblSubCategory.'.name AS subcat_name',$tblCategory.'.name AS catname', DB::raw(pow(($this->table.".lat" - $lat), 2) + pow(($this->table.".lng" - $lng), 2)." as distance"), DB::raw('IFNULL(ds_ttt2.answer, 0)') )
                        ->leftJoin($tblStoreSubCategory, $tblStoreSubCategory.'.store_id', '=', $this->table.'.id')
                        ->leftJoin($tblStoreOffice, $this->table.'.id', '=', $tblStoreOffice.'.store_id')
                        ->leftJoin($tblSubCategory, $tblStoreSubCategory.'.sub_category_id', '=', $tblSubCategory.'.id')
                        ->leftJoin($tblCategory, $tblStoreSubCategory.'.category_id', '=', $tblCategory.'.id')                        
                        ->leftJoin($tblOffice, $tblStoreOffice.'.office_id', '=', $tblOffice.'.id')
        				->leftJoin(DB::raw('(select t2.id, t2.store_id, tt3.answer from ds_feedback t2 left join (select t3.id,AVG(t3.answer) AS answer, t3.feedback_id AS feedback_id FROM ds_rating t3
    					LEFT JOIN ds_rating_type t4 ON t4.id = t3.type_id AND t4.is_score GROUP BY t3.feedback_id) tt3 ON tt3.feedback_id = t2.id GROUP BY t2.id) ds_ttt2'), $this->table.'.id', '=', 'ttt2.store_id');

		//$keyword = urldecode($keyword);    
		
       
        if ($location != '') {
            $result = $result->where($tblOffice.'.address', 'like', '%'.$location.'%');
        }
        
        
        if($online_payment == 1) {
        	$result = $result->where('options', 'like', '%"delivery_place";s:6:"online"%');
        }
        
        if($discount_available == 1){
        	$result = $result->where('options', 'like', '%"discount_available";s:1:"1"%');
        }
                        
        if($office_available == 1)
        	$result = $result->where($tblOffice.'.office_available', 1);
        if($fromPrice != '' || $toPrice != '')
        	$result = $result->whereBetween($this->table.'.price_value',array($fromPrice,$toPrice));
        
       
        if ($keyword != '') {
        	$result = $result->where(function($query) use ($keyword, $tblCategory, $tblSubCategory) {
        		$query->where($tblCategory.'.name', "LIKE", "%".$keyword."%")
        		->orWhere($tblSubCategory.'.name', 'like', '%'.$keyword.'%')
        		->orWhere($this->table.'.name', 'like', '%'.$keyword.'%')
        		->orWhere($this->table.'.keyword', 'like', '%'.$keyword.'%');
        	});
        }
        
        return $result;
    }
    
    
    
    public function scopePeriodFeedback($query, $year = '2015', $month = '04') {
        $start = $year."-".$month."-01 00:00:00";
        $end = $year."-".$month."-31 23:59:59";
        
        return $this->hasMany('Feedback', 'store_id')
                ->where('created_at', '>=', $start)
                ->where('created_at', '<=', $end)
                ->orderBy('created_at', 'DESC');
    }
    
    public function scopeProvidedFeedbacks($query, $userId) {
        $tblFeedback =with(new Feedback)->getTable();
        return $this->hasMany('Feedback', 'store_id')->where($tblFeedback.'.user_id', $userId);        
    }
}
