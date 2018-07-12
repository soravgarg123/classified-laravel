<?php

namespace Admin;

use Illuminate\Routing\Controllers\Controller;
use View,
    Input,
    Redirect,
    Session,
    Validator;
use City as CityModel;
use SiteLanguage;

class CityController extends \BaseController {

    public function index() {
        $param['cities'] = CityModel::paginate(PAGINATION_SIZE);
        $param['pageNo'] = 4;
        if ($alert = Session::get('alert')) {
            $param['alert'] = $alert;
        }

        return View::make('admin.city.index')->with($param)->with('siteLanguage', $this->siteLanguage)->with('langLbl', $this->languageLabels)
                        ->with('currentLanguage', $this->currentLanguage);
    }

    public function create() {
        $param['pageNo'] = 4;
        return View::make('admin.city.create')->with($param)->with('siteLanguage', $this->siteLanguage)->with('langLbl', $this->languageLabels)
                        ->with('currentLanguage', $this->currentLanguage);
    }

    public function edit($id) {
        $param['pageNo'] = 4;
        $param['city'] = CityModel::find($id);

        return View::make('admin.city.edit')->with($param)->with('siteLanguage', $this->siteLanguage)->with('langLbl', $this->languageLabels)
                        ->with('currentLanguage', $this->currentLanguage);
    }

    public function store() {

        $rules = ['name' => 'required'];
        $validator = Validator::make(Input::all(), $rules);

        if ($validator->fails()) {
            return Redirect::back()
                            ->withErrors($validator)
                            ->withInput();
        } else {
            if (Input::has('city_id')) {
                $id = Input::get('city_id');
                $city = CityModel::find($id);
            } else {
                $city = new CityModel;
            }
            $city->name = Input::get('name');
            $city->save();

            $alert['msg'] = $this->languageLabels['City has been saved successfully'];
            $alert['type'] = 'success';

            return Redirect::route('admin.city')->with('alert', $alert);
        }
    }

    public function delete($id) {
        try {
            CityModel::find($id)->delete();

            $alert['msg'] = $this->languageLabels['City has been deleted successfully'];
            $alert['type'] = 'success';
        } catch (\Exception $ex) {
            $alert['msg'] = $this->languageLabels['This city has been already used'];
            $alert['type'] = 'danger';
        }

        return Redirect::route('admin.city')->with('alert', $alert);
    }

}
