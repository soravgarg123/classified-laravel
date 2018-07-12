<?php

namespace User;

use Illuminate\Routing\Controllers\Controller;
use View,
    Input,
    Redirect,
    Session,
    DB,
    Response,
    Mail;
use Category as CategoryModel,
    City as CityModel;
use Feedback as FeedbackModel,
    ReviewPhoto as ReviewPhotoModel;
use Store as StoreModel;
use Company as CompanyModel;
use Consumer as ConsumerModel;
use CommonFunction as CommonFunctionModel;
use WorldOfProfessional as WorldOfProfessionalModel;
use Website as WebsiteModel;
use Cart as CartModel,
    Chat as ChatModel;
use Office as OfficeModel;
use Stoffice as StofficeModel;
use Pclass as PclassModel;
use ProfSubClass as ProfSubClassModel;
use Post as PostModel,
    PostCategory as PostCategoryModel;
use SiteLanguage;

class PostController extends \BaseController {

    public function __construct()
    {
        $website = DB::table('website')->get();
        $type = $website[0]->value;
        if($type == "offline"){
           header('Location: '.MY_BASE_URL.'/maintenance'); 
        }
        parent::__construct();
    }

    public function viewPosts() {
        $param['categories'] = CategoryModel::orderBy('name' . $this->currentLanguage, 'ASC')->get();
        $param['postcategory'] = PostCategoryModel::orderBy('name' . $this->currentLanguage, 'ASC')->get();
        $param['classes'] = PclassModel::all();
        $param['officies'] = OfficeModel::all();
        $param['posts'] = PostModel::where('company_id', '<>', 0)->orderBy('created_at', 'desc')->paginate(5);
        $param['cntAdminPost'] = PostModel::where('company_id', 0)->count();
        return View::make('user.post.index')->with($param)->with('siteLanguage', $this->siteLanguage)->with('langLbl', $this->languageLabels)
                        ->with('currentLanguage', $this->currentLanguage);
    }

    public function viewProfessionPosts() {
        $param['categories'] = CategoryModel::orderBy('name' . $this->currentLanguage, 'ASC')->get();
        $param['postcategory'] = PostCategoryModel::orderBy('name' . $this->currentLanguage, 'ASC')->get();
        $param['classes'] = PclassModel::all();
        $param['officies'] = OfficeModel::all();
        $param['posts'] = PostModel::where('company_id', 0)->orderBy('created_at', 'desc')->paginate(5);
        $param['wof'] = WorldOfProfessionalModel::all();
        $param['sideposts'] = PostModel::where('company_id', 0)->orderBy('created_at', 'desc')->paginate(10);
        $param['recent_posts'] = PostModel::where('company_id', 0)->orderBy('created_at', 'desc')->take(5)->get();
        $param['cntAdminPost'] = PostModel::where('company_id', 0)->count();
        return View::make('user.post.adminPosts')->with($param)->with('siteLanguage', $this->siteLanguage)->with('langLbl', $this->languageLabels)
                        ->with('currentLanguage', $this->currentLanguage);
    }

    public function detail($slug) {
        $param['categories'] = CategoryModel::orderBy('name' . $this->currentLanguage, 'ASC')->get();
        $param['postcategory'] = PostCategoryModel::orderBy('name' . $this->currentLanguage, 'ASC')->get();
        $param['classes'] = PclassModel::all();
        $param['officies'] = OfficeModel::all();
        $param['post'] = PostModel::findBySlug($slug);
        $param['recent_posts'] = PostModel::orderBy('created_at', 'desc')->take(5)->get();
        return View::make('user.post.detail')->with($param)->with('siteLanguage', $this->siteLanguage)->with('langLbl', $this->languageLabels)
                        ->with('currentLanguage', $this->currentLanguage);
    }

    public function profdetail($slug) {
        $param['categories'] = CategoryModel::orderBy('name' . $this->currentLanguage, 'ASC')->get();
        $param['postcategory'] = PostCategoryModel::orderBy('name' . $this->currentLanguage, 'ASC')->get();
        $param['classes'] = PclassModel::all();
        $param['officies'] = OfficeModel::all();
        $param['sideposts'] = PostModel::where('company_id', 0)->orderBy('created_at', 'desc')->paginate(10);
        $param['posts'] = PostModel::where('company_id', 0)->orderBy('created_at', 'desc')->get();
        $param['post'] = PostModel::findBySlug($slug);
        $param['recent_posts'] = PostModel::where('company_id', 0)->orderBy('created_at', 'desc')->take(5)->get();
        return View::make('user.post.profdetail')->with($param)->with('siteLanguage', $this->siteLanguage)->with('langLbl', $this->languageLabels)
                        ->with('currentLanguage', $this->currentLanguage);
    }

    public function wofdetail($slug) {
        $param['categories'] = CategoryModel::orderBy('name' . $this->currentLanguage, 'ASC')->get();
        $param['postcategory'] = PostCategoryModel::orderBy('name' . $this->currentLanguage, 'ASC')->get();
        $param['classes'] = PclassModel::all();
        $param['officies'] = OfficeModel::all();
        $param['sideposts'] = PostModel::where('company_id', 0)->orderBy('created_at', 'desc')->paginate(10);
        $param['posts'] = PostModel::where('company_id', 0)->orderBy('created_at', 'desc')->get();
        $param['post'] = WorldOfProfessionalModel::find($slug);
        $param['recent_posts'] = PostModel::where('company_id', 0)->orderBy('created_at', 'desc')->take(5)->get();
        return View::make('user.post.wofdetail')->with($param)->with('siteLanguage', $this->siteLanguage)->with('langLbl', $this->languageLabels)
                        ->with('currentLanguage', $this->currentLanguage);
    }

    public function GetPostByCategory($slug) {
        $tblPost = with(new PostModel)->getTable();
        $result = PostModel::getPostByCategory($slug);
        $param['categories'] = CategoryModel::orderBy('name' . $this->currentLanguage, 'ASC')->get();

        $param['postcategory'] = PostCategoryModel::orderBy('name' . $this->currentLanguage, 'ASC')->get();
        $param['classes'] = PclassModel::all();
        $param['officies'] = OfficeModel::all();
        $param['posts'] = $result->groupBy($tblPost . '.id')->orderBy('created_at', 'DESC')->paginate(5);

        return View::make('user.post.search')->with($param)->with('siteLanguage', $this->siteLanguage)->with('langLbl', $this->languageLabels)
                        ->with('currentLanguage', $this->currentLanguage);
    }

    public function GetPostByAuthor($slug) {
        $tblPost = with(new PostModel)->getTable();
        $result = PostModel::getPostByAuthor($slug);
        $param['categories'] = CategoryModel::orderBy('name' . $this->currentLanguage, 'ASC')->get();
        $param['postcategory'] = PostCategoryModel::orderBy('name' . $this->currentLanguage, 'ASC')->get();
        $param['classes'] = PclassModel::all();
        $param['officies'] = OfficeModel::all();
        $param['posts'] = $result->groupBy($tblPost . '.id')->orderBy('created_at', 'DESC')->paginate(5);

        return View::make('user.post.search')->with($param)->with('siteLanguage', $this->siteLanguage)->with('langLbl', $this->languageLabels)
                        ->with('currentLanguage', $this->currentLanguage);
    }

    public function search() {
        $keyword = Input::has('keyword') ? Input::get('keyword') : '';
        $tblPost = with(new PostModel)->getTable();
        $result = PostModel::search($keyword);
        $param['categories'] = CategoryModel::orderBy('name' . $this->currentLanguage, 'ASC')->get();
        $param['postcategory'] = PostCategoryModel::orderBy('name' . $this->currentLanguage, 'ASC')->get();
        $param['classes'] = PclassModel::all();
        $param['officies'] = OfficeModel::all();
        $param['posts'] = $result->groupBy($tblPost . '.id')->orderBy('created_at', 'DESC')->paginate(5);
        Session::set('post_keyword', $keyword);
        return View::make('user.post.search')->with($param)->with('siteLanguage', $this->siteLanguage)->with('langLbl', $this->languageLabels)
                        ->with('currentLanguage', $this->currentLanguage);
    }

}