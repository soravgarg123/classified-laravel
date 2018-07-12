<?php

namespace Admin;

use Illuminate\Routing\Controllers\Controller;
use View,
    Input,
    Redirect,
    Session,
    Validator;
use Loyalty as LoyaltyModel;
use Company as CompanyModel;
use SiteLanguage;

class LoyaltyController extends \BaseController {

    public function index() {
        $param['loyalties'] = LoyaltyModel::paginate(PAGINATION_SIZE);
        $param['pageNo'] = 9;
        if ($alert = Session::get('alert')) {
            $param['alert'] = $alert;
        }

        return View::make('admin.loyalty.index')->with($param)->with('siteLanguage', $this->siteLanguage)->with('langLbl', $this->languageLabels)
                        ->with('currentLanguage', $this->currentLanguage);
    }

    public function create() {
        $param['pageNo'] = 9;
        $param['companies'] = CompanyModel::all();
        return View::make('admin.loyalty.create')->with($param)->with('siteLanguage', $this->siteLanguage)->with('langLbl', $this->languageLabels)
                        ->with('currentLanguage', $this->currentLanguage);
    }

    public function edit($id) {
        $param['pageNo'] = 9;
        $param['loyalty'] = LoyaltyModel::find($id);
        $param['companies'] = CompanyModel::all();

        return View::make('admin.loyalty.edit')->with($param)->with('siteLanguage', $this->siteLanguage)->with('langLbl', $this->languageLabels)
                        ->with('currentLanguage', $this->currentLanguage);
    }

    public function store() {

        $rules = ['name' => 'required',
            'company_id' => 'required',];
        $validator = Validator::make(Input::all(), $rules);

        if ($validator->fails()) {
            return Redirect::back()
                            ->withErrors($validator)
                            ->withInput();
        } else {
            if (Input::has('loyalty_id')) {
                $id = Input::get('loyalty_id');
                $loyalty = LoyaltyModel::find($id);
            } else {
                $loyalty = new LoyaltyModel;
                $loyalty->photo = DEFAULT_PHOTO;
            }

            foreach ($this->siteLanguage as $key => $value) {
                $nameCtrl = 'name' . $value;
                $descCtrl = 'description' . $value;
                $loyalty->$nameCtrl = Input::get($nameCtrl);
                $loyalty->$descCtrl = Input::get($descCtrl);
            }
            $loyalty->company_id = Input::get('company_id');
            $loyalty->count_stamp = Input::get('count_stamp');
            $loyalty->save();

            $alert['msg'] = $this->languageLabels['Loyalty has been saved successfully'];
            $alert['type'] = 'success';

            return Redirect::route('admin.loyalty')->with('alert', $alert);
        }
    }

    public function delete($id) {
        try {
            LoyaltyModel::find($id)->delete();

            $alert['msg'] = $this->languageLabels['Loyalty has been deleted successfully'];
            $alert['type'] = 'success';
        } catch (\Exception $ex) {
            $alert['msg'] = $this->languageLabels['This loyalty has been already used'];
            $alert['type'] = 'danger';
        }

        return Redirect::route('admin.loyalty')->with('alert', $alert);
    }

}
