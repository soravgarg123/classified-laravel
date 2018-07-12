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
use Help as HelpModel;
use SiteLanguage;

class HelpController extends \BaseController {

	public function index()
	{
        $param['pageNo'] = 17;
        $param['help'] = HelpModel::paginate(PAGINATION_SIZE);

        if ($alert = Session::get('alert')) {
            $param['alert'] = $alert;
        }

        return View::make('admin.help.index')->with($param)->with('siteLanguage', $this->siteLanguage)->with('langLbl', $this->languageLabels)
                        ->with('currentLanguage', $this->currentLanguage);
	}

	public function create()
	{
		$param['pageNo'] = 17;
        return View::make('admin.help.create')->with($param)->with('siteLanguage', $this->siteLanguage)->with('langLbl', $this->languageLabels)
                        ->with('currentLanguage', $this->currentLanguage);
	}

	public function store() {
		if (Input::has('help_id')){
            $id = Input::get('help_id');
            $help = HelpModel::find($id);
        } else {
            $help = new HelpModel;
        }
        $help->contenten = Input::get('contenten');
        $help->contentit = Input::get('contentit');
        $help->contentes = Input::get('contentes');
        $help->titleen = Input::get('titleen');
        $help->titleit = Input::get('titleit');
        $help->titlees = Input::get('titlees');
        $help->save();
        $alert['msg'] = $this->languageLabels['Success'];
        $alert['type'] = 'success';
    	return Redirect::route('admin.help')->with('alert', $alert);
    }

	public function edit($id) {
        $param['help'] = HelpModel::find($id);
        $param['pageNo'] = 17;
        return View::make('admin.help.edit')->with($param)->with('siteLanguage', $this->siteLanguage)->with('langLbl', $this->languageLabels)
                        ->with('currentLanguage', $this->currentLanguage);
    }

	public function delete($id) {
        try {
            HelpModel::find($id)->delete();
            HelpModel::where('id', $id)->delete();
            $alert['msg'] = $this->languageLabels['Success'];
            $alert['type'] = 'success';
        } catch (\Exception $ex) {
            $alert['msg'] = $this->languageLabels['Error'];
            $alert['type'] = 'danger';
        }
        return Redirect::route('admin.help')->with('alert', $alert);
    }


}
