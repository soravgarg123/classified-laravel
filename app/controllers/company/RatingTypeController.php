<?php

namespace Company;

use Illuminate\Routing\Controllers\Controller;
use View,
    Input,
    Redirect,
    Session,
    DB,
    Validator;
use RatingType as RatingTypeModel;
use Website as WebsiteModel;
use SiteLanguage;

class RatingTypeController extends \BaseController {

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
        $param['ratingTypes'] = RatingTypeModel::where('company_id', Session::get('company_id'))->paginate(PAGINATION_SIZE);
        $param['pageNo'] = 11;
        if ($alert = Session::get('alert')) {
            $param['alert'] = $alert;
        }
        return View::make('company.ratingType.index')->with($param)->with('siteLanguage', $this->siteLanguage)->with('langLbl', $this->languageLabels)
                        ->with('currentLanguage', $this->currentLanguage);
    }

    public function create() {
        $param['pageNo'] = 11;
        return View::make('company.ratingType.create')->with($param)->with('siteLanguage', $this->siteLanguage)->with('langLbl', $this->languageLabels)
                        ->with('currentLanguage', $this->currentLanguage);
    }

    public function edit($id) {
        $param['pageNo'] = 11;
        $param['ratingType'] = RatingTypeModel::find($id);
        return View::make('company.ratingType.edit')->with($param)->with('siteLanguage', $this->siteLanguage)->with('langLbl', $this->languageLabels)
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
            if (Input::has('rating_type_id')) {
                $id = Input::get('rating_type_id');
                $ratingType = RatingTypeModel::find($id);
            } else {
                $ratingType = new RatingTypeModel;
            }
            $ratingType->company_id = Session::get('company_id');

            foreach ($this->siteLanguage as $key => $value) {
                $nameCtrl = 'name' . $value;

                $ratingType->$nameCtrl = Input::get($nameCtrl);
            }

            $ratingType->is_visible = Input::get('is_visible');
            $ratingType->is_score = Input::get('is_score');
            $ratingType->save();

            $alert['msg'] = $this->languageLabels['Rating type has been saved successfully'];
            $alert['type'] = 'success';
            return Redirect::route('company.ratingType')->with('alert', $alert);
        }
    }

    public function delete($id) {
        try {
            RatingTypeModel::find($id)->delete();
            $alert['msg'] = $this->languageLabels['Rating type has been deleted successfully'];
            $alert['type'] = 'success';
        } catch (\Exception $ex) {
            $alert['msg'] = $this->languageLabels['This rating type has been already used'];
            $alert['type'] = 'danger';
        }
        return Redirect::route('company.ratingType')->with('alert', $alert);
    }

}
