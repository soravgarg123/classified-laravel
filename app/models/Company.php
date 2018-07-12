<?php

use Illuminate\Database\Eloquent\Model as Eloquent;
use Cviebrock\EloquentSluggable\SluggableInterface;
use Cviebrock\EloquentSluggable\SluggableTrait;

class Company extends Eloquent implements SluggableInterface {
    use SluggableTrait;
    
    protected $table = 'company';
    
    protected $sluggable = array(
        'build_from' => 'name',
        'save_to'    => 'slug',
    );    
    
    
    public function plan()
    {
        return $this->belongsTo('Plan', 'plan_id');
    }  

    public function getCountryName() {
    	return Country::where('iso2', $this->country)->firstOrFail();
    }
    
    public function getLang(){
    	$short_langs = explode(",", $this->languages);
    	$langs = [];
    	foreach($short_langs as $sl){
    		$lang_obj = Languages::where('alpha2', $sl)->firstOrFail();
    		$langs[] = $lang_obj->name;
    	}
    	$langs = implode(",", $langs);
    	return $langs;
    }
    
    public function getBooked(){
    	return Cart::where('company_id', $this->id)->get()->count();
    }
    
    public function widget()
    {
        return $this->hasOne('CompanyWidget', 'company_id');
    }    

    public function subCategories()
    {
        return $this->hasMany('CompanySubCategory', 'company_id');
    }
    
    public function subClasses(){
    	return $this->hasMany('ProfSubClass', 'company_id');
    }
    
    public function messages()
    {
        return $this->hasMany('\DirectoryService\Models\Message', 'company_id')
                    ->orderBy('id', 'DESC');
    }        
    
    public function stores()
    {
        return $this->hasMany('Store', 'company_id');
    }
    
    public function officies()
    {
    	return $this->hasMany('Office', 'company_id');
    }
    
    public function contacts()
    {
        return $this->hasMany('Contact', 'company_id');
    }    
    
    public function ratingTypes()
    {
        return $this->hasMany('RatingType', 'company_id');
    }

    public function visibleRatingTypes()
    {
        $tblRatingType =with(new RatingType)->getTable();
        return $this->hasMany('RatingType', 'company_id')->where($tblRatingType.'.is_visible', TRUE);
    }    

    public function offers()
    {
        return $this->hasMany('Offer', 'company_id');
    }
    
    public function purchaseOffers()
    {
        $tblOffer =with(new Offer)->getTable();
        return $this->hasMany('Offer', 'company_id')->where($tblOffer.'.is_review', FALSE);
    }
    
    public function loyalties()
    {
        return $this->hasMany('Loyalty', 'company_id');
    }
    
    public function consumers()
    {
        return $this->hasMany('Consumer', 'company_id');
    }
    
    public function scopeCompleted($query) {
        return $query->where('is_completed', TRUE);
    }
    
    public function feedbacks($year = '2015', $month = '04') {
        $tblFeedback =with(new Feedback)->getTable();
        return $this->hasManyThrough('Feedback', 'Store', 'company_id', 'store_id')
                    ->where($tblFeedback.'.created_at', '>=', "$year-$month-01 00:00:00")
                    ->where($tblFeedback.'.created_at', '<=', "$year-$month-31 23:59:59");
    }
    
    public function periodFeedbacks($startDate, $endDate) {
        $tblFeedback =with(new Feedback)->getTable();
        return $this->hasManyThrough('Feedback', 'Store', 'company_id', 'store_id')
                    ->where($tblFeedback.'.created_at', '>=', "$startDate 00:00:00")
                    ->where($tblFeedback.'.created_at', '<=', "$endDate 23:59:59");
    }
    

    public function registers($startDate, $endDate) {
        $tblConsumer = with(new Consumer)->getTable();
        return $this->belongsToMany('User', 'consumer', 'company_id', 'user_id')
                    ->where($tblConsumer.'.created_at', '>=', "$startDate 00:00:00")
                    ->where($tblConsumer.'.created_at', '<=', "$endDate 23:59:59");
    }
    public function getRatingScore() {
    	$prefix = DB::getTablePrefix();
    
    	$tblFeedback = with(new Feedback)->getTable();
    	$tblRating = with(new Rating)->getTable();
    	$tblRatingType = with(new RatingType)->getTable();
    	$tblStore = with(new Store)->getTable();
    
    	$sql = "SELECT IFNULL(AVG(t3.answer), 0) AS avgScore
                  FROM ".$prefix."$this->table as t1, ".$prefix."$tblFeedback t2, ".$prefix."$tblRating t3, ".$prefix."$tblRatingType t4,".$prefix."$tblStore t5
                      WHERE t1.id = t5.company_id
                      AND t5.id = t2.store_id
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
    	$tblStore = with(new Store)->getTable();
    	
    	$sql = "SELECT COUNT(*) as count FROM ".$prefix."$this->table t1, ".$prefix."$tblStore t2, ".$prefix."$tblFeedback t3 WHERE t1.id = t2.company_id AND t2.id = t3.store_id AND t1.id = $this->id";
    	
    	$result = DB::select($sql);
    	return $result[0]->count;
    	
    }
    
    public function scopeProfSearch($query, $keyword, $location, $fromRate, $toRate,$fromPrice, $toPrice, $lat = 0, $lng = 0){
    	$prefix = DB::getTablePrefix();
    	$tblSubClass =with(new SubClass)->getTable();
    	$tblClass = with(new Pclass)->getTable();
    	$tblStore = with(new Store)->getTable();
    	$tblOffice = with(new Office)->getTable();
    	$tblStoreOffice = with(new Stoffice)->getTable();
    	$tblCompanySubClass = with(new ProfSubClass)->getTable();
    	
    	$tblFeedback = with(new Feedback)->getTable();
    	$tblRating = with(new Rating)->getTable();
    	$tblRatingType = with(new RatingType)->getTable();
    	
    	$result =  $query->select($this->table.'.*', DB::raw(pow(($tblOffice.".lat" - $lat), 2) + pow(($tblOffice.".lng" - $lng), 2)." as distance"))
	    	->leftJoin($tblCompanySubClass, $this->table.'.id', '=', $tblCompanySubClass.'.company_id')
	    	->leftJoin($tblClass, $tblCompanySubClass.'.class_id', '=', $tblClass.'.id')
	    	->leftJoin($tblSubClass, $tblSubClass.'.id', '=', $tblCompanySubClass.'.sub_class_id')
	    	->leftJoin($tblStore, $tblStore.'.company_id', '=', $this->table.'.id')
	    	->leftJoin($tblStoreOffice, $tblStoreOffice.'.store_id', '=', $tblStore.'.id')
	    	->leftJoin($tblOffice, $tblStoreOffice.'.office_id', '=', $tblOffice.'.id')
    		->leftJoin(DB::raw("(SELECT IFNULL(AVG(t3.answer), 0) AS avgScore, t5.company_id
                  FROM ".$prefix."$this->table as t1, ".$prefix."$tblFeedback t2, ".$prefix."$tblRating t3, ".$prefix."$tblRatingType t4,".$prefix."$tblStore t5
                      WHERE t1.id = t5.company_id
                      AND t5.id = t2.store_id
                      AND t2.id = t3.feedback_id
                      AND t3.type_id = t4.id
                      AND t4.is_score GROUP BY t5.company_id) ds_tt2"), $this->table.'.id', '=', 'tt2.company_id' );
    	//echo $result->toSql();exit;
    	if ($keyword != '') {
    		$result = $result->where(function($query) use ($keyword, $tblClass, $tblSubClass) {
    			$query->where($tblClass.'.name', 'like', '%'.$keyword.'%')
    			->orWhere($tblSubClass.'.name', 'like', '%'.$keyword.'%')
    			->orWhere($this->table.'.name', 'like', '%'.$keyword.'%')
    			->orWhere($this->table.'.keyword', 'like', '%'.$keyword.'%');
    		});
    	}
    	
    	if($fromPrice != '' || $toPrice != '')
    		$result = $result->whereBetween($this->table.'.rate',array($fromPrice,$toPrice));
    	
    	if ($location != '') {
    		$result = $result->where($tblOffice.'.address', 'like', '%'.$location.'%');    		
    	}    	
    	return $result->distinct();
    	 
    }
}
