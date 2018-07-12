<?php

namespace User;

use Illuminate\Routing\Controllers\Controller;
use View,
    Input,
    Redirect,
    Session,
    DB,
    Response;
use Category as CategoryModel;
use Pclass as PclassModel;
use Company as CompanyModel;
use Store as StoreModel;
use Office as OfficeModel,
    Post as PostModel,
    PostCategory as PostCategoryModel;
use SiteLanguage;

class WebsiteController extends \BaseController {

	public function maintenance() {
		$param['website_mode'] = DB::table('website')->get();
        if($param['website_mode'][0]->value == "online"){
            $param['categories'] = CategoryModel::orderBy('name' . $this->currentLanguage, 'ASC')->get();
            $param['officies'] = OfficeModel::all();
            $param['classes'] = PclassModel::all();
            $param['companies'] = CompanyModel::orderBy(DB::raw('RAND()'))->take(12)->get();
            $param['stores'] = StoreModel::orderBy(DB::raw('RAND()'))->take(12)->get();
            $param['posts'] = PostModel::orderBy('created_at', 'DESC')->paginate(4);
            $param['professions'] = PostModel::where('company_id', 0)->orderBy('created_at', 'desc')->paginate(8);
            return Redirect::route('user.home');                      
        }else{
            return View::make('website.maintenance')->with($param)->with('siteLanguage', $this->siteLanguage)->with('langLbl', $this->languageLabels)
                        ->with('currentLanguage', $this->currentLanguage);
        }
    }
}
