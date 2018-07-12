<?php

namespace Admin;

use Illuminate\Routing\Controllers\Controller;
use View,
    Input,
    Redirect,
    Session,
    Validator;
use DB;
use Plan as PlanModel;
use Website as WebsiteModel;
use SiteLanguage;

class PlanController extends \BaseController {

    public function index() {
        $param['plans'] = PlanModel::paginate(PAGINATION_SIZE);
        $param['pageNo'] = 11;
        if ($alert = Session::get('alert')) {
            $param['alert'] = $alert;
        }

        return View::make('admin.plan.index')->with($param)->with('siteLanguage', $this->siteLanguage)->with('langLbl', $this->languageLabels)
                        ->with('currentLanguage', $this->currentLanguage);
    }

    public function create() {
        $param['pageNo'] = 11;
        return View::make('admin.plan.create')->with($param)->with('siteLanguage', $this->siteLanguage)->with('langLbl', $this->languageLabels)
                        ->with('currentLanguage', $this->currentLanguage);
    }


    public function edit($id) {
        $param['pageNo'] = 11;
        $param['plan'] = PlanModel::find($id);

        return View::make('admin.plan.edit')->with($param)->with('siteLanguage', $this->siteLanguage)->with('langLbl', $this->languageLabels)
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
            if (Input::has('plan_id')) {
                $id = Input::get('plan_id');
                $plan = PlanModel::find($id);
            } else {
                $plan = new PlanModel;
            }
            foreach ($this->siteLanguage as $key => $value) {
                $nameCtrl = 'name' . $value;
                $plan->$nameCtrl = Input::get($nameCtrl);
            }
            $plan->price = Input::get('price');
            $plan->type = Input::get('type');
            $plan->code = Input::get('code');
            $plan->save();

            $alert['msg'] = $this->languageLabels['Plan has been saved successfully'];
            $alert['type'] = 'success';

            return Redirect::route('admin.plan')->with('alert', $alert);
        }
    }

    public function delete($id) {
        try {
            PlanModel::find($id)->delete();

            $alert['msg'] = $this->languageLabels['Plan has been deleted successfully'];
            $alert['type'] = 'success';
        } catch (\Exception $ex) {
            $alert['msg'] = $this->languageLabels['This plan has been already used'];
            $alert['type'] = 'danger';
        }

        return Redirect::route('admin.plan')->with('alert', $alert);
    }

    public function website() {  
        $param['website_mode'] = DB::table('website')->get();
        $param['pageNo'] = 12;
        if ($alert = Session::get('alert')) {
            $param['alert'] = $alert;
        }
        return View::make('admin.plan.website')->with($param)->with('siteLanguage', $this->siteLanguage)->with('langLbl', $this->languageLabels)
                        ->with('currentLanguage', $this->currentLanguage);
    }

    public function managewebsite()
    {
        $param['pageNo'] = 12;
        $param['website_mode'] = DB::table('website')->get();
        if ($alert = Session::get('alert')) {
            $param['alert'] = $alert;
        }
        $id = Input::get('website_id');
        $value = Input::get('value');
        $insertArr = array('value' => $value);
        /*if (Input::hasFile('image')) {
            $filename = str_random(24) . "." . Input::file('image')->getClientOriginalExtension();
            Input::file('image')->move(ABS_HOWITWORKS_PATH, $filename);
            $insertArr['image'] = $filename;
        }*/
        DB::table('website')->where('id', $id)->update($insertArr);
        $alert['msg'] = $this->languageLabels['Success'];
        $alert['type'] = 'success';
        return Redirect::route('admin.website')->with('alert', $alert);
    }

}
