<?php

use Illuminate\Database\Eloquent\Model as Eloquent;
use Cviebrock\EloquentSluggable\SluggableInterface;
use Cviebrock\EloquentSluggable\SluggableTrait;

class Post extends Eloquent implements SluggableInterface{
    use SluggableTrait;
    
    protected $table = 'posts';
    protected $sluggable = array(
    		'build_from' => 'post_title',
    		'save_to'    => 'slug',
    );
   
    
    public function company()
    {
        return $this->belongsTo('Company', 'company_id');
    }
	public function comments()
    {
        return $this->hasMany('Comments', 'post_id');
    }
    
    public function subCategories()
    {
    	return $this->hasMany('PostSubCategory', 'post_id');
    }
    
	public function time_elapsed_string($datetime, $full = false) {
	    $now = new DateTime;
	    $ago = new DateTime($datetime);
	    $diff = $now->diff($ago);
	
	    $diff->w = floor($diff->d / 7);
	    $diff->d -= $diff->w * 7;
	
	    $string = array(
	        'y' => 'year',
	        'm' => 'month',
	        'w' => 'week',
	        'd' => 'day',
	        'h' => 'hour',
	        'i' => 'minute',
	        's' => 'second',
	    );
	    foreach ($string as $k => &$v) {
	        if ($diff->$k) {
	            $v = $diff->$k . ' ' . $v . ($diff->$k > 1 ? 's' : '');
	        } else {
	            unset($string[$k]);
	        }
	    }
	
	    if (!$full) $string = array_slice($string, 0, 1);
	    return $string ? implode(', ', $string) . ' ago' : 'just now';
	}
    
    public function getComments($parent_id,$post_id)
    {	
    	$prefix = DB::getTablePrefix();
    	$tblComments = with(new Comment)->getTable();
    	$tblUser = with(new User)->getTable();
    	$sql = "SELECT t1.id,t1.post_id,t1.parent_id,t1.content, t1.created_at as created, t2.name  FROM ".$prefix.$tblComments." as t1 LEFT JOIN ".$prefix.$tblUser." as t2 ON t1.user_id = t2.id WHERE t1.post_id = $post_id AND t1.parent_id = $parent_id";
    	
    	$res = DB::select($sql);
    	if (count($res))
    	{
    		echo '<div class="comments">';
    		foreach ($res as $dat)
    		{
    			echo '<div class="media">                    
	                      <a href="#" class="pull-left">
	                      <img src="'.HTTP_USER_PATH.'default.jpg" alt="" class="media-object">
	                      </a>
	                      <div class="media-body">
	                        <h4 class="media-heading">', $dat->name, '<span>', $this->time_elapsed_string($dat->created), ' / <a style="cursor:pointer" onclick="return replyToggle('.$dat->id.')">Reply</a></span></h4><p>',
	                        $dat->content, 
	                      '</p><form role="form" id="reply_form_'.$dat->id.'" class="reply_form">				                      
	                      <div class="form-group">				                       
	                        <textarea class="form-control" rows="3"></textarea>
	                      </div>
	                      <p><button class="btn btn-primary" type="button" class="reply_btn" onclick="return postComment('.$dat->id.')">Reply</button></p>
	                    </form>', $this->getComments($dat->id, $post_id), '</div></div>';
    		}
    		echo "</div>";
    	}
    	else
    		echo ($parent_id === 0) ? 'No Comments!' : "";
    }
    
    public function scopeSearch($query, $keyword){
    	$prefix = DB::getTablePrefix();
    	$tblPostSubCategory =with(new PostSubCategory)->getTable();
    	$tblPostCategory = with(new PostCategory)->getTable();
    	
    	
    	$result = $query->select($this->table.'.*')
    		->leftJoin($tblPostSubCategory, $tblPostSubCategory.'.post_id', '=', $this->table.'.id')
    		->leftJoin($tblPostCategory, $tblPostSubCategory.'.category_id', '=', $tblPostCategory.'.id');
    		
    	if($keyword != ''){
    		$result = $result->where(function($query) use ($keyword, $tblPostCategory) {
    			$query->where($tblPostCategory.'.name', 'like', '%'.$keyword.'%')    			
    			->orWhere($this->table.'.post_title', 'like', '%'.$keyword.'%')
    			->orWhere($this->table.'.post_content', 'like', '%'.$keyword.'%');    			
    		});
    	}
    	return $result;
    }
    
    public function scopeGetPostByCategory($query, $slug){
    	$prefix = DB::getTablePrefix();
    	$tblPostSubCategory =with(new PostSubCategory)->getTable();
    	$tblPostCategory = with(new PostCategory)->getTable();
    	 
    	 
    	$result = $query->select($this->table.'.*')
    	->leftJoin($tblPostSubCategory, $tblPostSubCategory.'.post_id', '=', $this->table.'.id')
    	->leftJoin($tblPostCategory, $tblPostSubCategory.'.category_id', '=', $tblPostCategory.'.id')
    	->where($tblPostCategory.'.slug',$slug);
    	return $result;
    }
    
    public function scopeGetPostByAuthor($query, $slug){
    	$prefix = DB::getTablePrefix();
    	$tblPostSubCategory =with(new PostSubCategory)->getTable();
    	$tblPostCategory = with(new PostCategory)->getTable();
    	$tblCompany = with(new Company)->getTable();
    	if($slug == 'admin')
    		$result = $query->select($this->table.'.*')    		
    		->leftJoin($tblPostSubCategory, $tblPostSubCategory.'.post_id', '=', $this->table.'.id')
    		->leftJoin($tblPostCategory, $tblPostSubCategory.'.category_id', '=', $tblPostCategory.'.id')
    		->where($this->table.'.company_id',0);
    	else
	    	$result = $query->select($this->table.'.*')
	    	->leftJoin($tblCompany, $tblCompany.'.id', '=', $this->table.'.company_id')
	    	->leftJoin($tblPostSubCategory, $tblPostSubCategory.'.post_id', '=', $this->table.'.id')
	    	->leftJoin($tblPostCategory, $tblPostSubCategory.'.category_id', '=', $tblPostCategory.'.id')
	    	->where($tblCompany.'.slug',$slug);
    	return $result;
    }
}