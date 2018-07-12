<?php

namespace Company;

use Illuminate\Routing\Controllers\Controller;
use View,
    Input,
    Redirect,
    Session,
    DB,
    Validator;
use Loyalty as LoyaltyModel;
use Website as WebsiteModel;
use SiteLanguage;

class LoyaltyController extends \BaseController {

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
        $param['loyalties'] = LoyaltyModel::where('company_id', Session::get('company_id'))->paginate(PAGINATION_SIZE);
        $param['pageNo'] = 8;
        if ($alert = Session::get('alert')) {
            $param['alert'] = $alert;
        }
        return View::make('company.loyalty.index')->with($param)->with('siteLanguage', $this->siteLanguage)->with('langLbl', $this->languageLabels)
                        ->with('currentLanguage', $this->currentLanguage);
    }

    public function create() {
        $param['pageNo'] = 8;
        return View::make('company.loyalty.create')->with($param)->with($param)->with('siteLanguage', $this->siteLanguage)->with('langLbl', $this->languageLabels)
                        ->with('currentLanguage', $this->currentLanguage);
    }

    public function edit($id) {
        $param['pageNo'] = 8;
        $param['loyalty'] = LoyaltyModel::find($id);
        return View::make('company.loyalty.edit')->with($param)->with($param)->with('siteLanguage', $this->siteLanguage)->with('langLbl', $this->languageLabels)
                        ->with('currentLanguage', $this->currentLanguage);
    }

    public function store() {
        $rules = ['name' => 'required',
            'count_visit' => 'required|numeric'];
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
                if (!Input::hasFile('photo')) {
                    $loyalty->photo = DEFAULT_PHOTO;
                }
            }

            if (Input::hasFile('photo')) {
                $filename = str_random(24) . "." . Input::file('photo')->getClientOriginalExtension();
                Input::file('photo')->move(ABS_LOYALTY_PATH, $filename);
                $loyalty->photo = $filename;
            }

            foreach ($this->siteLanguage as $key => $value) {
                $nameCtrl = 'name' . $value;
                $descriptionCtrl = 'description' . $value;
                $loyalty->$nameCtrl = Input::get($nameCtrl);
                $loyalty->$descriptionCtrl = Input::get($descriptionCtrl);
            }

            $loyalty->company_id = Session::get('company_id');
            $loyalty->count_stamp = Input::get('count_visit');
            $loyalty->save();

            $alert['msg'] = $this->languageLabels['Loyalty has been saved successfully'];
            $alert['type'] = 'success';

            return Redirect::route('company.loyalty')->with('alert', $alert);
        }
    }

    public function delete($id) {
        try {
            LoyaltyModel::find($id)->delete();
            $alert['msg'] = $this->languageLabels['Loyalty has been deleted successfully'];
            $alert['type'] = 'success';
        } catch (\Exception $ex) {
            $alert['msg'] = $this->languageLabels['This Loyalty has been already used'];
            $alert['type'] = 'danger';
        }
        return Redirect::route('company.loyalty')->with('alert', $alert);
    }

}
