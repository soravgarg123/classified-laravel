<?php

namespace Admin;

use Illuminate\Routing\Controllers\Controller;
use View,
    Input,
    Redirect,
    Session,
    Validator;
use Company as CompanyModel;
use City as CityModel;
use Store as StoreModel;
use Category as CategoryModel;
use SubCategory as SubCategoryModel;
use Stoffice as StofficeModel;
use Office as OfficeModel;
use StoreSubCategory as StoreSubCategoryModel;
use SiteLanguage;

class StoreController extends \BaseController {

    public function index() {
        $param['stores'] = StoreModel::paginate(PAGINATION_SIZE);
        $param['pageNo'] = 12;
        if ($alert = Session::get('alert')) {
            $param['alert'] = $alert;
        }

        return View::make('admin.store.index')->with($param)->with('siteLanguage', $this->siteLanguage)->with('langLbl', $this->languageLabels)
                        ->with('currentLanguage', $this->currentLanguage);
    }

    public function create() {
        $param['pageNo'] = 12;
        $param['categories'] = CategoryModel::all();
        $param['companies'] = CompanyModel::all();
        $param['cities'] = CityModel::all();
        return View::make('admin.store.create')->with($param)->with('siteLanguage', $this->siteLanguage)->with('langLbl', $this->languageLabels)
                        ->with('currentLanguage', $this->currentLanguage);
    }

    public function edit($id) {
        $param['pageNo'] = 12;
        $param['store'] = StoreModel::find($id);
        $param['sub_officies'] = StofficeModel::where('store_id', $param['store']->id)->get();
        $param['officies'] = OfficeModel::where('company_id', $param['store']->company_id)->get();
        $param['categories'] = CategoryModel::all();
        $param['companies'] = CompanyModel::all();

        return View::make('admin.store.edit')->with($param)->with('siteLanguage', $this->siteLanguage)->with('langLbl', $this->languageLabels)
                        ->with('currentLanguage', $this->currentLanguage);
    }

    public function store() {

        $rules = ['company_id' => 'required',
            'name' => 'required',
            'price_value' => 'required|numeric', //to do fix on validation task: |greaterThanInput:discount_price',
            'discount_price' => 'numeric',
            'book_amount' => 'numeric|max:5'
        ];
        $messages = array(
            'price_value.greater_than_input' => 'Discount price can not be greater than price.',
        );
        $validator = Validator::make(Input::all(), $rules, $messages);

        if ($validator->fails()) {
            return Redirect::back()
                            ->withErrors($validator)
                            ->withInput();
        } else {
            if (Input::has('store_id')) {
                $id = Input::get('store_id');
                $store = StoreModel::find($id);
                $store->company_id = Input::get('company_id');
            } else {
                $store = new StoreModel;
                $store->photo = DEFAULT_PHOTO;
                $store->token = strtoupper(str_random(5));
                $store->salt = str_random(8);
                $store->secure_key = md5($store->salt . '');
                $store->company_id = Input::get('company_id');
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
            );
            foreach ($this->siteLanguage as $key => $value) {
                $nameCtrl = 'name' . $value;
                $descCtrl = 'description' . $value;
                $store->$nameCtrl = Input::get($nameCtrl);
                $store->$descCtrl = Input::get($descCtrl);
            }
            $store->keyword = Input::get('keyword');
            $store->duration = Input::get('duration');
            $store->book_amount = Input::get('book_amount');
            $store->price_value = Input::get('price_value');
            $store->options = serialize($options);
            $store->save();

            StoreSubCategoryModel::where('store_id', $store->id)->delete();
            if (Input::has('sub_category')) {
                foreach (Input::get('sub_category') as $subCategory) {
                    $subCategory = SubCategoryModel::find($subCategory);
                    $storeSubCategory = new StoreSubCategoryModel;
                    $storeSubCategory->store_id = $store->id;
                    $storeSubCategory->category_id = $subCategory->category_id;
                    $storeSubCategory->sub_category_id = $subCategory->id;
                    $storeSubCategory->save();
                }
            }

            StofficeModel::where('store_id', $store->id)->delete();
            if (Input::has('office_id')) {
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

            return Redirect::route('admin.store')->with('alert', $alert);
        }
    }

    public function delete($id) {
        try {
            StoreModel::find($id)->delete();

            $alert['msg'] = $this->languageLabels['Store has been deleted successfully'];
            $alert['type'] = 'success';
        } catch (\Exception $ex) {
            $alert['msg'] = $this->languageLabels['This store has been already used'];
            $alert['type'] = 'danger';
        }

        return Redirect::route('admin.store')->with('alert', $alert);
    }

}
