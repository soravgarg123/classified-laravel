<?php

namespace Admin;

use Illuminate\Routing\Controllers\Controller;
use View,
    Input,
    Redirect,
    Session,
    Validator,
    File;
use Store as StoreModel,
    Company as CompanyModel,
    City as CityModel;
use PostCategory as PostCategoryModel,
    PostSubCategory as PostSubCategoryModel,
    BlogSubCategory as BlogSubCategoryModel;
use Office as OfficeModel;
use Stoffice as StofficeModel;
use Post as PostModel;
use SiteLanguage;


class PostController extends \BaseController {

    public function index() {
        $param['pageNo'] = 13;
        $param['posts'] = PostModel::where('company_id', '<>', 0)->paginate(PAGINATION_SIZE);

        if ($alert = Session::get('alert')) {
            $param['alert'] = $alert;
        }

        return View::make('admin.post.index')->with($param)->with('siteLanguage', $this->siteLanguage)->with('langLbl', $this->languageLabels)
                        ->with('currentLanguage', $this->currentLanguage);
    }

    public function create() {
        $param['pageNo'] = 13;
        $param['categories'] = PostCategoryModel::all();
        return View::make('admin.post.create')->with($param)->with('siteLanguage', $this->siteLanguage)->with('langLbl', $this->languageLabels)
                        ->with('currentLanguage', $this->currentLanguage);
    }

    public function edit($id) {
        $param['post'] = PostModel::find($id);
        $param['pageNo'] = 13;
        $param['categories'] = PostCategoryModel::all();
        return View::make('admin.post.edit')->with($param)->with('siteLanguage', $this->siteLanguage)->with('langLbl', $this->languageLabels)
                        ->with('currentLanguage', $this->currentLanguage);
    }

    public function profindex() {
        $param['pageNo'] = 21;
        $param['posts'] = PostModel::where('company_id', 0)->paginate(PAGINATION_SIZE);
        if ($alert = Session::get('alert')) {
            $param['alert'] = $alert;
        }

        return View::make('admin.post.profindex')->with($param)->with('siteLanguage', $this->siteLanguage)->with('langLbl', $this->languageLabels)
                        ->with('currentLanguage', $this->currentLanguage);
    }

    public function profcreate() {
        $param['pageNo'] = 21;
        $param['categories'] = PostCategoryModel::all();
        return View::make('admin.post.profcreate')->with($param)->with('siteLanguage', $this->siteLanguage)->with('langLbl', $this->languageLabels)
                        ->with('currentLanguage', $this->currentLanguage);
    }

    public function profedit($id) {
        $param['post'] = PostModel::find($id);
        $param['pageNo'] = 21;
        $param['categories'] = PostCategoryModel::all();
        return View::make('admin.post.profedit')->with($param)->with('siteLanguage', $this->siteLanguage)->with('langLbl', $this->languageLabels)
                        ->with('currentLanguage', $this->currentLanguage);
    }

    public function store() {
        $rules = ['post_title' => 'required',
        ];

        $validator = Validator::make(Input::all(), $rules);

        if ($validator->fails()) {
            return Redirect::back()
                            ->withErrors($validator)
                            ->withInput();
        } else {
            if (Input::has('post_id')) {
                $id = Input::get('post_id');
                $post = PostModel::find($id);
                $post->company_id = $post->company_id;
            } else {
                $post = new PostModel;
                $post->company_id = 0;
            }

            if (Input::hasFile('featured_image')) {
                $filename = str_random(24) . "." . Input::file('featured_image')->getClientOriginalExtension();
                Input::file('featured_image')->move(SUB_DIR.ABS_POST_PATH, $filename);
                $post->featured_image = $filename;
            }

            foreach ($this->siteLanguage as $key => $value) {
                $nameCtrl = 'post_title' . $value;
                $contentCtrl = 'post_content' . $value;
                $post->$nameCtrl = Input::get($nameCtrl);
                $post->$contentCtrl = Input::get($contentCtrl);
            }


            $post->save();

            PostSubCategoryModel::where('post_id', $post->id)->delete();
            if (Input::has('sub_category')) {
                foreach (Input::get('sub_category') as $subCategory) {
                    $Category = PostCategoryModel::find($subCategory);
                    $postSubCategory = new PostSubCategoryModel;
                    $postSubCategory->post_id = $post->id;
                    $postSubCategory->category_id = $Category->id;
                    $postSubCategory->save();
                }
            }

            $alert['msg'] = $this->languageLabels['Post has been saved successfully'];
            $alert['type'] = 'success';
            if (Input::get('prof') == 1)
                return Redirect::route('admin.profession')->with('alert', $alert);
            else
                return Redirect::route('admin.post')->with('alert', $alert);
        }
    }

    public function delete($id) {
        try {
            PostModel::find($id)->delete();
            $alert['msg'] = $this->languageLabels['Post has been deleted successfully'];
            $alert['type'] = 'success';
        } catch (\Exception $ex) {
            $alert['msg'] = $this->languageLabels['This post has been already used'];
            $alert['type'] = 'danger';
        }
        return Redirect::route('admin.post')->with('alert', $alert);
    }

    public function profdelete($id){
        try {
            PostModel::find($id)->delete();
            $alert['msg'] = $this->languageLabels['Post has been deleted successfully'];
            $alert['type'] = 'success';
        } catch (\Exception $ex) {
            $alert['msg'] = $this->languageLabels['This post has been already used'];
            $alert['type'] = 'danger';
        }
        return Redirect::route('admin.profession')->with('alert', $alert);
    }

}
