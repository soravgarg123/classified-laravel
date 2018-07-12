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
use Category as CategoryModel,
    SubCategory as SubCategoryModel,
    StoreSubCategory as StoreSubCategoryModel;
use Office as OfficeModel,
    OfficeOpening as OfficeOpeningModel;
use SiteLanguage;

class OfficeController extends \BaseController {

    public function index() {
        $param['pageNo'] = 10;
        $param['officies'] = OfficeModel::paginate(PAGINATION_SIZE);

        if ($alert = Session::get('alert')) {
            $param['alert'] = $alert;
        }

        return View::make('admin.office.index')->with($param)->with('siteLanguage', $this->siteLanguage)->with('langLbl', $this->languageLabels)
                        ->with('currentLanguage', $this->currentLanguage);
    }

    public function create() {
        $param['pageNo'] = 10;
        $param['companies'] = CompanyModel::all();
        return View::make('admin.office.create')->with($param)->with('siteLanguage', $this->siteLanguage)->with('langLbl', $this->languageLabels)
                        ->with('currentLanguage', $this->currentLanguage);
    }

    public function edit($id) {
        $param['office'] = OfficeModel::find($id);
        $param['pageNo'] = 10;
        $param['companies'] = CompanyModel::all();
        return View::make('admin.office.edit')->with($param)->with('siteLanguage', $this->siteLanguage)->with('langLbl', $this->languageLabels)
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
            if (Input::has('office_id')) {
                $id = Input::get('office_id');
                $office = OfficeModel::find($id);
                $officeOpening = OfficeModel::find($id)->opening;
            } else {
                $office = new OfficeModel;
                $officeOpening = new OfficeOpeningModel;
            }
            $office->company_id = Input::get('company_id');
            $office->name = Input::get('name');
            $office->address = Input::get('address');
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

            return Redirect::route('admin.office')->with('alert', $alert);
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

        return Redirect::route('admin.office')->with('alert', $alert);
    }

}
