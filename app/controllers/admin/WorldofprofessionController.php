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
use WorldOfProfessional as WorldOfProfessionalModel;
use Stoffice as StofficeModel;
use Post as PostModel;
use SiteLanguage;


class WorldofprofessionController extends \BaseController {

    public function index() {
        $param['pageNo'] = 31;
        $param['worldofprofessional'] = WorldOfProfessionalModel::paginate(PAGINATION_SIZE);

        if ($alert = Session::get('alert')) {
            $param['alert'] = $alert;
        }

        return View::make('admin.worldofprofessional.index')->with($param)->with('siteLanguage', $this->siteLanguage)->with('langLbl', $this->languageLabels)
                        ->with('currentLanguage', $this->currentLanguage);
    }

    public function create() {
        $param['pageNo'] = 32;
        return View::make('admin.worldofprofessional.create')->with($param)->with('siteLanguage', $this->siteLanguage)->with('langLbl', $this->languageLabels)
                        ->with('currentLanguage', $this->currentLanguage);
    }

    public function edit($id) {
        $param['wof'] = WorldOfProfessionalModel::find($id);
        $param['pageNo'] = 33;
        return View::make('admin.worldofprofessional.edit')->with($param)->with('siteLanguage', $this->siteLanguage)->with('langLbl', $this->languageLabels)
                        ->with('currentLanguage', $this->currentLanguage);
    }


    public function store() {
        if (Input::has('wof_id')){
            $id = Input::get('wof_id');
            $worldofprofessional = WorldOfProfessionalModel::find($id);
        } else {
            $worldofprofessional = new WorldOfProfessionalModel;
        }
        if (Input::hasFile('image')) {
            $filename = str_random(24) . "." . Input::file('image')->getClientOriginalExtension();
            Input::file('image')->move(ABS_HOWITWORKS_PATH, $filename);
            $worldofprofessional->image = $filename;
        }
        $worldofprofessional->post_titleen = Input::get('titleen');
        $worldofprofessional->post_titleit = Input::get('titleit');
        $worldofprofessional->post_titlees = Input::get('titlees');
        $worldofprofessional->post_contenten = Input::get('contenten');
        $worldofprofessional->post_contentit = Input::get('contentit');
        $worldofprofessional->post_contentes = Input::get('contentes');
        $worldofprofessional->save();
        $alert['msg'] = $this->languageLabels['Success'];
        $alert['type'] = 'success';
        return Redirect::route('admin.worldofprofession')->with('alert', $alert);
    }

    public function delete($id) {
        try {
            WorldOfProfessionalModel::find($id)->delete();
            $alert['msg'] = $this->languageLabels['Success'];
            $alert['type'] = 'success';
        } catch (\Exception $ex) {
            $alert['msg'] = $this->languageLabels['Error'];
            $alert['type'] = 'danger';
        }
        return Redirect::route('admin.worldofprofession')->with('alert', $alert);
    }

}
