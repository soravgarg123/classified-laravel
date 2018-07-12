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
use Policy as PolicyModel;
use SiteLanguage;

class PolicyController extends \BaseController {


	public function index()
	{
        $param['pageNo'] = 15;
        $param['policy'] = PolicyModel::paginate(PAGINATION_SIZE);

        if ($alert = Session::get('alert')) {
            $param['alert'] = $alert;
        }

        return View::make('admin.policy.index')->with($param)->with('siteLanguage', $this->siteLanguage)->with('langLbl', $this->languageLabels)
                        ->with('currentLanguage', $this->currentLanguage);
	}

	public function create()
	{
		$param['pageNo'] = 15;
        return View::make('admin.policy.create')->with($param)->with('siteLanguage', $this->siteLanguage)->with('langLbl', $this->languageLabels)
                        ->with('currentLanguage', $this->currentLanguage);
	}

	public function store() {
		if (Input::has('policy_id')){
            $id = Input::get('policy_id');
            $policy = PolicyModel::find($id);
        } else {
            $policy = new PolicyModel;
        }
        $policy->titleen = Input::get('titleen');
        $policy->titleit = Input::get('titleit');
        $policy->titlees = Input::get('titlees');
        $policy->contenten = Input::get('contenten');
        $policy->contentit = Input::get('contentit');
        $policy->contentes = Input::get('contentes');
        $policy->save();
        $alert['msg'] = $this->languageLabels['Success'];
        $alert['type'] = 'success';
    	return Redirect::route('admin.policy')->with('alert', $alert);
    }

	public function edit($id) {
        $param['policy'] = PolicyModel::find($id);
        $param['pageNo'] = 15;
        return View::make('admin.policy.edit')->with($param)->with('siteLanguage', $this->siteLanguage)->with('langLbl', $this->languageLabels)
                        ->with('currentLanguage', $this->currentLanguage);
    }

	public function delete($id) {
        try {
            PolicyModel::find($id)->delete();
            PolicyModel::where('id', $id)->delete();
            $alert['msg'] = $this->languageLabels['Success'];
            $alert['type'] = 'success';
        } catch (\Exception $ex) {
            $alert['msg'] = $this->languageLabels['Error'];
            $alert['type'] = 'danger';
        }
        return Redirect::route('admin.policy')->with('alert', $alert);
    }


}
