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
use Terms as TermsModel;
use SiteLanguage;

class TermsController extends \BaseController {

	public function index()
	{
        $param['pageNo'] = 16;
        $param['terms'] = TermsModel::paginate(PAGINATION_SIZE);

        if ($alert = Session::get('alert')) {
            $param['alert'] = $alert;
        }

        return View::make('admin.terms.index')->with($param)->with('siteLanguage', $this->siteLanguage)->with('langLbl', $this->languageLabels)
                        ->with('currentLanguage', $this->currentLanguage);
	}

	public function create()
	{
		$param['pageNo'] = 16;
        return View::make('admin.terms.create')->with($param)->with('siteLanguage', $this->siteLanguage)->with('langLbl', $this->languageLabels)
                        ->with('currentLanguage', $this->currentLanguage);
	}

	public function store() {
		if (Input::has('terms_id')){
            $id = Input::get('terms_id');
            $terms = TermsModel::find($id);
        } else {
            $terms = new TermsModel;
        }
        $terms->titleen = Input::get('titleen');
        $terms->titleit = Input::get('titleit');
        $terms->titlees = Input::get('titlees');
        $terms->contenten = Input::get('contenten');
        $terms->contentit = Input::get('contentit');
        $terms->contentes = Input::get('contentes');
        $terms->save();
        $alert['msg'] = $this->languageLabels['Success'];
        $alert['type'] = 'success';
    	return Redirect::route('admin.terms')->with('alert', $alert);
    }

	public function edit($id) {
        $param['terms'] = TermsModel::find($id);
        $param['pageNo'] = 16;
        return View::make('admin.terms.edit')->with($param)->with('siteLanguage', $this->siteLanguage)->with('langLbl', $this->languageLabels)
                        ->with('currentLanguage', $this->currentLanguage);
    }

	public function delete($id) {
        try {
            TermsModel::find($id)->delete();
            TermsModel::where('id', $id)->delete();
            $alert['msg'] = $this->languageLabels['Success'];
            $alert['type'] = 'success';
        } catch (\Exception $ex) {
            $alert['msg'] = $this->languageLabels['Error'];
            $alert['type'] = 'danger';
        }
        return Redirect::route('admin.terms')->with('alert', $alert);
    }


}
