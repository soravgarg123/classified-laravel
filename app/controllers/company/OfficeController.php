<?php

namespace Company;

use Illuminate\Routing\Controllers\Controller;
use View,
    Input,
    Redirect,
    Session,
    DB,
    Validator,
    File;
use Store as StoreModel,
    Company as CompanyModel,
    City as CityModel;
use Category as CategoryModel,
    SubCategory as SubCategoryModel,
    StoreSubCategory as StoreSubCategoryModel;
use Office as OfficeModel,
    OfficeOpening as OfficeOpeningModel;
use Website as WebsiteModel;  
use Country as CountryModel;  
use SiteLanguage;

class OfficeController extends \BaseController {

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
        $param['pageNo'] = 5;
        $param['officies'] = OfficeModel::where('company_id', Session::get('company_id'))->get();
        if ($alert = Session::get('alert')) {
            $param['alert'] = $alert;
        }
        return View::make('company.office.index')->with($param)->with('siteLanguage', $this->siteLanguage)->with('langLbl', $this->languageLabels)
                        ->with('currentLanguage', $this->currentLanguage);
    }

    public function create() {
        $company = CompanyModel::find(Session::get('company_id'));
        $total_offices = DB::table('office')
                            ->where('company_id', Session::get('company_id'))
                            ->get();
        if(count($total_offices) == 5){
            $alert['msg'] = $this->languageLabels['you can create maximum 5 offices'];
            $alert['type'] = 'danger';
            return Redirect::route('company.office')->with('alert', $alert);
        }
        $payment_gateway = $company->payment_gateway;
        $payment_email = $company->payment_email;

        if($payment_gateway == "" && $payment_email == ""){
            $alert['msg'] = $this->languageLabels['Need to have an payment account'];
            $alert['type'] = 'danger';
            return Redirect::route('company.office')->with('alert', $alert);
        }
        $param['pageNo'] = 5;
        $param['countries'] = CountryModel::orderBy('short_name' . $this->currentLanguage, 'ASC')->get();
        return View::make('company.office.create')->with($param)->with($param)->with('siteLanguage', $this->siteLanguage)->with('langLbl', $this->languageLabels)
                        ->with('currentLanguage', $this->currentLanguage);
    }

    public function edit($id) {
        $param['office'] = OfficeModel::find($id);
        $param['pageNo'] = 5;
        $param['countries'] = CountryModel::orderBy('short_name' . $this->currentLanguage, 'ASC')->get();
        return View::make('company.office.edit')->with($param)->with($param)->with('siteLanguage', $this->siteLanguage)->with('langLbl', $this->languageLabels)
                        ->with('currentLanguage', $this->currentLanguage);
    }

    public function store() {
        $office_available = Input::get('office_available'); 
        $rules = ['name' => 'required','address_area' => 'required','telephone' => 'required'];
        if($office_available == 1){ 
            $select_availability = Input::get('select_availability'); 
            $rules['select_availability'] = 'required';
            if($select_availability == "Available within max km range"){
               $rules['km_range'] = 'required'; 
            }
        }

        $validator = Validator::make(Input::all(), $rules);
        if ($validator->fails()) {
            return Redirect::back()
                            ->withErrors($validator)
                            ->withInput();
        } else {
            if (Input::has('office_id')) {
                $id = Input::get('office_id');
                $office = OfficeModel::find($id);
                $officeOpening = OfficeModel::find($id)->opening;
            } else {
                $office = new OfficeModel;
                $officeOpening = new OfficeOpeningModel;
            }

            $office->company_id = Session::get('company_id');
            $office->name = Input::get('name');
            $office->address = Input::get('address');
            $office->address_area = Input::get('address_area');
            $office->telephone = Input::get('telephone');
            $office->select_availability = Input::get('select_availability');
            $office->km_range = Input::get('km_range');
            $office->office_city = Input::get('office_city');
            $office->office_country = Input::get('office_country');
            $office->lat = Input::get('lat');
            $office->lng = Input::get('lng');
            $office->holidays = Input::get('holidays');
            $office->office_available = Input::get('office_available');
            $office->save();
            $officeOpening->office_id = $office->id;
            foreach (['mon', 'tue', 'wed', 'thu', 'fri', 'sat', 'sun',] as $key) {
                $officeOpening->{ $key . '_start'} = Input::get($key . '_start');
                $officeOpening->{ $key . '_end'} = Input::get($key . '_end');
            }
            $officeOpening->save();
            $alert['msg'] = $this->languageLabels['Office has been saved successfully'];
            $alert['type'] = 'success';

            return Redirect::route('company.office')->with('alert', $alert);
        }
    }

    public function delete($id) {
        try {
            OfficeModel::find($id)->delete();
            $alert['msg'] = $this->languageLabels['Office has been deleted successfully'];
            $alert['type'] = 'success';
        } catch (\Exception $ex) {
            $alert['msg'] = $this->languageLabels['This office has been already used'];
            $alert['type'] = 'danger';
        }
        return Redirect::route('company.office')->with('alert', $alert);
    }

}
