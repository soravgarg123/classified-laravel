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
use Howitworks as HowitworksModel;
use SiteLanguage;

class HowitworksController extends \BaseController {

	public function index()
	{
		$param['pageNo'] = 18;
        $param['howitworks'] = HowitworksModel::paginate(PAGINATION_SIZE);
        if ($alert = Session::get('alert')) {
            $param['alert'] = $alert;
        }
        return View::make('admin.howitworks.index')->with($param)->with('siteLanguage', $this->siteLanguage)->with('langLbl', $this->languageLabels)
                        ->with('currentLanguage', $this->currentLanguage);
	}

	public function create()
	{
		$param['pageNo'] = 15;
        return View::make('admin.howitworks.create')->with($param)->with('siteLanguage', $this->siteLanguage)->with('langLbl', $this->languageLabels)
                        ->with('currentLanguage', $this->currentLanguage);
	}

	public function store() {
		if (Input::has('howitworks_id')){
            $id = Input::get('howitworks_id');
            $howitworks = HowitworksModel::find($id);
        } else {
            $howitworks = new HowitworksModel;
        }
        if (Input::hasFile('image')) {
            $filename = str_random(24) . "." . Input::file('image')->getClientOriginalExtension();
            Input::file('image')->move(ABS_HOWITWORKS_PATH, $filename);
            $howitworks->image = $filename;
        }
        $howitworks->titleen = Input::get('titleen');
        $howitworks->titleit = Input::get('titleit');
        $howitworks->titlees = Input::get('titlees');
        $howitworks->type = Input::get('type');
        $howitworks->contenten = Input::get('contenten');
        $howitworks->contentit = Input::get('contentit');
        $howitworks->contentes = Input::get('contentes');
        $howitworks->save();
        $alert['msg'] = $this->languageLabels['Success'];
        $alert['type'] = 'success';
    	return Redirect::route('admin.howitworks')->with('alert', $alert);
    }

	public function edit($id) {
        $param['howitworks'] = HowitworksModel::find($id);
        $param['pageNo'] = 18;
        return View::make('admin.howitworks.edit')->with($param)->with('siteLanguage', $this->siteLanguage)->with('langLbl', $this->languageLabels)
                        ->with('currentLanguage', $this->currentLanguage);
    }

	public function update($id)
	{
		//
	}

	public function delete($id) {
        try {
            HowitworksModel::find($id)->delete();
            HowitworksModel::where('id', $id)->delete();
            $alert['msg'] = $this->languageLabels['Success'];
            $alert['type'] = 'success';
        } catch (\Exception $ex) {
            $alert['msg'] = $this->languageLabels['Error'];
            $alert['type'] = 'danger';
        }
        return Redirect::route('admin.howitworks')->with('alert', $alert);
    }


}
