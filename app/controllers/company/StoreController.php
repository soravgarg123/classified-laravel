<?php

namespace Company;

use Illuminate\Routing\Controllers\Controller;
use View,
    Input,
    Redirect,
    Session,
    Validator,
    File;
use DB;
use Store as StoreModel,
    Company as CompanyModel,
    City as CityModel;
use Category as CategoryModel,
    SubCategory as SubCategoryModel,
    StoreSubCategory as StoreSubCategoryModel;
use Office as OfficeModel;
use Website as WebsiteModel;
use Stoffice as StofficeModel;
use SiteLanguage;

class StoreController extends \BaseController {

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
        $param['pageNo'] = 13;
        $param['stores'] = StoreModel::where('company_id', Session::get('company_id'))->get();
        if ($alert = Session::get('alert')) {
            $param['alert'] = $alert;
        }
        return View::make('company.store.index')->with($param)->with('siteLanguage', $this->siteLanguage)->with('langLbl', $this->languageLabels)
                        ->with('currentLanguage', $this->currentLanguage);
    }

    public function create() {
        $allOffices = OfficeModel::where('company_id', Session::get('company_id'))->get();
        if($allOffices->count() == 0){
            $alert['msg'] = $this->languageLabels['need atleast one office'];
            $alert['type'] = 'danger';
            return Redirect::route('company.store')->with('alert', $alert);
        }
        $param['pageNo'] = 13;
        $param['company'] = CompanyModel::find(Session::get('company_id'));
        $param['officies'] = OfficeModel::where('company_id', Session::get('company_id'))->get();
        $param['categories'] = CategoryModel::all();
        return View::make('company.store.create')->with($param)->with('siteLanguage', $this->siteLanguage)->with('langLbl', $this->languageLabels)
                        ->with('currentLanguage', $this->currentLanguage);
    }

    public function edit($id) {
        $param['company'] = CompanyModel::find(Session::get('company_id'));
        $param['store'] = StoreModel::find($id);
        $param['sub_officies'] = StofficeModel::where('store_id', $param['store']->id)->get();
        $param['pageNo'] = 13;
        $param['officies'] = OfficeModel::where('company_id', Session::get('company_id'))->get();
        $offices_data = json_decode($param['officies']);
        foreach($offices_data as $od){
            $param['ofices_id'][] = $od->id;
        }
        $param['categories'] = CategoryModel::all();
        return View::make('company.store.edit')->with($param)->with('siteLanguage', $this->siteLanguage)->with('langLbl', $this->languageLabels)
                        ->with('currentLanguage', $this->currentLanguage);
    }

    public function store() {
        $lang = $this->currentLanguage;
        $totalDuartion = Input::get('duration');  
        $service_available = Input::get('service_available');  
        $free_service  = Input::get('free_service');
        $discount_available = Input::get('discount_available');
        $company = CompanyModel::find(Session::get('company_id'));
        $rules = [
            'name'.$lang => 'required',
            'description'.$lang => 'required|min:80|max:1200',
            'sub_category' => 'required',
        ];
        $messages = array();
        if($service_available == 1){ // for duration
            $rules['duration']  = 'required|numeric|min:15|max:60';
            $rules['office_id'] = 'required';
        }

        if($service_available == 0){ 
            $rules['delivery_days'] = 'required|max:30';
        }

        if($free_service == 0){ // for paid services
            $rules['price_value'] = 'required|numeric';
        }

        if($discount_available == 1){ // for discount services
            $rules['discount_price'] = 'required|numeric';
            $messages['price_value.greater_than_input'] = 'Discount price can not be greater than price.';
        }
            
        $validator = Validator::make(Input::all(), $rules, $messages);

        if ($validator->fails()) {
            return Redirect::back()
                            ->withErrors($validator)
                            ->withInput();
        } else {
            $img_array = array(
                '1' => 'Appraisals-Consulting.jpg',
                '2' => 'Beauty-Relax.jpg',
                '3' => 'Cinema-Entertainment.jpg',
                '4' => 'Courses-Training.jpg',
                '5' => 'Engineering.jpg',
                '6' => 'Graphics-Photography.jpg',
                '7' => 'Business-Finance.jpg',
                '8' => 'Architecture-Archeology.jpg',
                '9' => 'Healthcare-Wellness.jpg',
                '10'=> 'Laws-Rights.jpg',
                '11'=> 'Lifestyle-Taste.jpg',
                '12'=> 'Management.jpg',
                '13'=> 'Marketing-Advertising.jpg',
                '14'=> 'Mechanics-Repairs.jpg',
                '15'=> 'Mediation-Arbitration.jpg',
                '16'=> 'Programming-Technology.jpg',
                '17'=> 'Specialized Medicine.jpg',
                '18'=> 'Writing-Translation.jpg',
                '19'=> 'Video-Music.jpg',
                '20'=> 'Other.jpg'
            );
        $subcatId  = Input::get('sub_category');
        $subcatArr = DB::table('sub_category')->where('id', $subcatId)->first();
        $catId     = $subcatArr->category_id;

            if (Input::has('store_id')) {
                $id = Input::get('store_id');
                $store = StoreModel::find($id);
                $store->company_id = Session::get('company_id');
            } else {
                $store = new StoreModel();
                if (!Input::hasFile('photo')) {
                    $filename = str_random(24) . "." . pathinfo($company->photo, PATHINFO_EXTENSION);
                    File::copy(ABS_COMPANY_PATH . $company->photo, ABS_STORE_PATH . $filename);
                    $store->photo = $img_array[$catId];
                }

                $store->token = strtoupper(str_random(5));
                $store->salt = str_random(8);
                $store->secure_key = md5($store->salt . '');
                $store->company_id = Session::get('company_id');
            }

            if (Input::hasFile('photo')) {
                $filename = str_random(24) . "." . Input::file('photo')->getClientOriginalExtension();
                Input::file('photo')->move(ABS_STORE_PATH, $filename);
                $store->photo = $filename;
            }
            $options = array(
                'service_available' => Input::get('service_available'),
                'delivery_days' => Input::get('delivery_days'),
                'delivery_place' => Input::get('delivery_place'),
                'office_available' => Input::get('office_available'),
                'office_range' => Input::get('office_range'),
                'discount_available' => Input::get('discount_available'),
                'discount_price' => Input::get('discount_price'),
                'free_service' => Input::get('free_service'),
            );

            foreach ($this->siteLanguage as $key => $value) {
                $nameCtrl = 'name' . $value;
                $descriptionCtrl = 'description' . $value;
                $store->$nameCtrl = Input::get($nameCtrl);
                $store->$descriptionCtrl = Input::get($descriptionCtrl);
            }
            $store->price_value = Input::get('price_value');
            $store->duration = Input::get('duration');
            $store->book_amount = implode(",",Input::get('book_amount'));
            $store->options = serialize($options);
            $store->save();

            StoreSubCategoryModel::where('store_id', $store->id)->delete();
            if (Input::has('sub_category')) {
                $subCategory = SubCategoryModel::find(Input::get('sub_category'));
                $storeSubCategory = new StoreSubCategoryModel;
                $storeSubCategory->store_id = $store->id;
                $storeSubCategory->category_id = $subCategory->category_id;
                $storeSubCategory->sub_category_id = $subCategory->id;
                $storeSubCategory->save();
            }

            StofficeModel::where('store_id', $store->id)->delete();
            if (count(Input::has('office_id')) > 0) {
                if (is_array(Input::get('office_id')) || is_object(Input::get('office_id'))) {
                    foreach (Input::get('office_id') as $office_id) {
                        $stoffice = new StofficeModel;
                        $stoffice->store_id = $store->id;
                        $stoffice->office_id = $office_id;
                        $stoffice->save();
                    }
                }
            }
            $alert['msg'] = $this->languageLabels['Store has been saved successfully'];
            $alert['type'] = 'success';

            return Redirect::route('company.store')->with('alert', $alert);
        }
    }

    public function delete($id) {
        try {
            StoreModel::find($id)->delete();
            StofficeModel::where('store_id', $id)->delete();
            $alert['msg'] = $this->languageLabels['Store has been deleted successfully'];
            $alert['type'] = 'success';
        } catch (\Exception $ex) {
            $alert['msg'] = $this->languageLabels['This store has been already used'];
            $alert['type'] = 'danger';
        }
        return Redirect::route('company.store')->with('alert', $alert);
    }

}
