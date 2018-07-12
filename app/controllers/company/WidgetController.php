<?php

namespace Company;

use Illuminate\Routing\Controllers\Controller;
use View,
    Input,
    Redirect,
    DB,
    Session,
    Validator,
    Response,
    Request;
use Company as CompanyModel,
    CompanyWidget as CompanyWidgetModel;
use Website as WebsiteModel;    
use SiteLanguage;

class WidgetController extends \BaseController {

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
        $param['pageNo'] = 10;
        $param['company'] = CompanyModel::find(Session::get('company_id'));
        return View::make('company.widget.index')->with($param)->with('siteLanguage', $this->siteLanguage)->with('langLbl', $this->languageLabels)
                        ->with('currentLanguage', $this->currentLanguage);
    }

    public function store() {
        $company = CompanyModel::find(Session::get('company_id'));

        if (count($company->widget) == 0) {
            $companyWidget = new CompanyWidgetModel;
        } else {
            $companyWidget = $company->widget;
        }

        $companyWidget->company_id = Session::get('company_id');
        $companyWidget->color = Input::get('color');
        $companyWidget->header = Input::get('header');
        $companyWidget->background = Input::get('background');
        $companyWidget->custom_css = Input::has('custom_css') ? Input::get('custom_css') : '';
        $companyWidget->is_header = Input::get('is_header');

        if (Input::hasFile('logo')) {
            $filename = str_random(24) . "." . Input::file('logo')->getClientOriginalExtension();
            Input::file('logo')->move(ABS_LOGO_PATH, $filename);
            $companyWidget->logo = $filename;
        }

        if (count($company->widget) == 0 && !Input::hasFile('logo')) {
            $companyWidget->logo = 'default.jpg';
        }
        $companyWidget->save();

        $alert['msg'] = $this->languageLabels['Widget Setting has been updated successfully.'];
        $alert['type'] = 'success';

        return Redirect::route('company.widget.index')->with('alert', $alert);
    }

}
