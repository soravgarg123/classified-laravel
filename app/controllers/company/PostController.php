<?php

namespace Company;

use Illuminate\Routing\Controllers\Controller;
use View,
    Input,
    Redirect,
    Session,
    Validator,
    DB,
    File;
use Store as StoreModel,
    Company as CompanyModel,
    City as CityModel;
use Category as CategoryModel,
    SubCategory as SubCategoryModel,
    StoreSubCategory as StoreSubCategoryModel;
use Office as OfficeModel;
use Stoffice as StofficeModel;
use Website as WebsiteModel;
use Post as PostModel,
    PostCategory as PostCategoryModel;
use PostSubCategory as PostSubCategoryModel,
    BlogSubCategory as BlogSubCategoryModel;
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

    public function index() {
        $param['pageNo'] = 16;
        $param['posts'] = PostModel::where('company_id', Session::get('company_id'))->get();
        if ($alert = Session::get('alert')) {
            $param['alert'] = $alert;
        }
        return View::make('company.post.index')->with($param)->with('siteLanguage', $this->siteLanguage)->with('langLbl', $this->languageLabels)
                        ->with('currentLanguage', $this->currentLanguage);
    }

    public function create() {
        $allServices = StoreModel::where('company_id', Session::get('company_id'))->get();
        if($allServices->count() == 0){
            $alert['msg'] = $this->languageLabels['need atleast one service'];
            $alert['type'] = 'danger';
            return Redirect::route('company.post')->with('alert', $alert);
        }
        $param['pageNo'] = 16;
        $param['company'] = CompanyModel::find(Session::get('company_id'));
        $param['officies'] = OfficeModel::where('company_id', Session::get('company_id'))->get();
        $param['categories'] = PostCategoryModel::all();
        return View::make('company.post.create')->with($param)->with('siteLanguage', $this->siteLanguage)->with('langLbl', $this->languageLabels)
                        ->with('currentLanguage', $this->currentLanguage);
    }

    public function edit($id) {
        $param['company'] = CompanyModel::find(Session::get('company_id'));
        $param['post'] = PostModel::find($id);
        $param['pageNo'] = 16;
        $param['categories'] = PostCategoryModel::all();
        return View::make('company.post.edit')->with($param)->with('siteLanguage', $this->siteLanguage)->with('langLbl', $this->languageLabels)
                        ->with('currentLanguage', $this->currentLanguage);
    }

    public function store() {
        
        $company = CompanyModel::find(Session::get('company_id'));
        $rules = ['post_title' => 'required','post_content' => 'required|min:80|max:1200'];
        $validator = Validator::make(Input::all(), $rules);
        if ($validator->fails()) {
            return Redirect::back()
                            ->withErrors($validator)
                            ->withInput();
        } else {
            if (Input::has('post_id')) {
                $id = Input::get('post_id');
                $post = PostModel::find($id);
            } else {
                $post = new PostModel;
            }

            if (Input::hasFile('featured_image')) {
                $filename = str_random(24) . "." . Input::file('featured_image')->getClientOriginalExtension();
                Input::file('featured_image')->move(ABS_POST_PATH, $filename);
                $post->featured_image = $filename;
            }

            foreach ($this->siteLanguage as $key => $value) {
                $nameCtrl = 'post_title' . $value;
                $descriptionCtrl = 'post_content' . $value;
                $post->$nameCtrl = Input::get($nameCtrl);
                $post->$descriptionCtrl = Input::get($descriptionCtrl);
            }

            $post->company_id = Session::get('company_id');

            $post->save();

            PostSubCategoryModel::where('post_id', $post->id)->delete();
            $postSubCategory = new PostSubCategoryModel;
            $postSubCategory->post_id = $post->id;
            $postSubCategory->category_id = Input::get('sub_category');
            $postSubCategory->save();
            /*if (Input::has('sub_category')) {
                foreach (Input::get('sub_category') as $subCategory) {
                    $Category = PostCategoryModel::find($subCategory);

                    $postSubCategory = new PostSubCategoryModel;
                    $postSubCategory->post_id = $post->id;
                    $postSubCategory->category_id = $Category->id;
                    $postSubCategory->save();
                }
            }*/
            $alert['msg'] = $this->languageLabels['Post has been saved successfully'];
            $alert['type'] = 'success';

            return Redirect::route('company.post')->with('alert', $alert);
        }
    }

    public function delete($id) {
        try {
            PostModel::find($id)->delete();
            StofficeModel::where('store_id', $id)->delete();
            $alert['msg'] = $this->languageLabels['Post has been deleted successfully'];
            $alert['type'] = 'success';
        } catch (\Exception $ex) {
            $alert['msg'] = $this->languageLabels['This post has been already used'];
            $alert['type'] = 'danger';
        }
        return Redirect::route('company.post')->with('alert', $alert);
    }

}
