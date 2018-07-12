<?php

namespace Admin;

use Illuminate\Routing\Controllers\Controller;
use View,
    Input,
    Redirect,
    Session,
    Response,
    Validator;
use DB;
use Company as CompanyModel;
use CompanyOpening as CompanyOpeningModel;
use RatingType as RatingTypeModel;
use Category as CategoryModel;
use SubCategory as SubCategoryModel;
use CompanySubCategory as CompanySubCategoryModel;
use Pclass as PclassModel,
    Country as CountryModel,
    Languages as LanguagesModel;
use ProfSubClass as ProfSubClassModel;
use SiteLanguage;

class CompanyController extends \BaseController {

    public function index() {
        $param['companies'] = CompanyModel::paginate(PAGINATION_SIZE);
        $param['pageNo'] = 3;
        if ($alert = Session::get('alert')) {
            $param['alert'] = $alert;
        }

        return View::make('admin.company.index')->with($param)->with('siteLanguage', $this->siteLanguage)->with('langLbl', $this->languageLabels)
                        ->with('currentLanguage', $this->currentLanguage);
    }

    public function create() {
        $param['pageNo'] = 3;
        $param['categories'] = PclassModel::all();
        $param['countries'] = CountryModel::orderBy('short_name' . $this->currentLanguage, 'ASC')->get();
        $param['languages'] = LanguagesModel::orderBy('name' . $this->currentLanguage, 'ASC')->get();
        return View::make('admin.company.create')->with($param)->with('siteLanguage', $this->siteLanguage)->with('langLbl', $this->languageLabels)
                        ->with('currentLanguage', $this->currentLanguage);
    }

    public function edit($id) {
        $param['pageNo'] = 3;
        $param['company'] = CompanyModel::find($id);
        $param['countries'] = CountryModel::orderBy('short_name' . $this->currentLanguage, 'ASC')->get();
        $param['languages'] = LanguagesModel::orderBy('name' . $this->currentLanguage, 'ASC')->get();
        $param['categories'] = PclassModel::all();

        return View::make('admin.company.edit')->with($param)->with('siteLanguage', $this->siteLanguage)->with('langLbl', $this->languageLabels)
                        ->with('currentLanguage', $this->currentLanguage);
    }

    public function unblock($id) {
        $param['companies'] = CompanyModel::paginate(PAGINATION_SIZE);
        DB::table('company')->where('id', $id)->update(array('suspend' => 1));
        $alert['msg'] = $this->languageLabels['Professional user unblocked'];
        $alert['type'] = 'success';
        return Redirect::route('admin.company')->with('alert', $alert);
    }

    public function block($id) {
        $param['companies'] = CompanyModel::paginate(PAGINATION_SIZE);
        DB::table('company')->where('id', $id)->update(array('suspend' => 0));
        $alert['msg'] = $this->languageLabels['Professional user blocked'];
        $alert['type'] = 'success';
        return Redirect::route('admin.company')->with('alert', $alert);
    }

    public function verify(){
        $type = Input::get('type');
        $compnay_id = Input::get('compnay_id');
        $status = Input::get('status');
        DB::table('company')->where('id', $compnay_id)->update(array($type => $status));
        $result['result'] = "success";
        $result['msg'] = $this->languageLabels["Success"];
        return Response::json($result, 200);
    }

    public function store() {

        $rules = ['email' => 'required|email',
            'name' => 'required',
        ];
        $validator = Validator::make(Input::all(), $rules);

        if ($validator->fails()) {
            return Redirect::back()
                            ->withErrors($validator)
                            ->withInput();
        } else {
            if (Input::has('company_id')) {
                $id = Input::get('company_id');
                $company = CompanyModel::find($id);
            } else {
                $company = new CompanyModel;
                $company->photo = DEFAULT_PHOTO;

                $company->token = strtoupper(str_random(8));
                $company->salt = str_random(8);
                $company->count_email = 0;
                $company->count_sms = 0;
            }

            if (Input::hasFile('photo')) {
                $filename = str_random(24) . "." . Input::file('photo')->getClientOriginalExtension();
                Input::file('photo')->move(ABS_COMPANY_PATH, $filename);
                $company->photo = $filename;
            }

            foreach ($this->siteLanguage as $key => $value) {
                $descCtrl = 'description' . $value;
                $company->$descCtrl = Input::get($descCtrl);
            }

            $company->name = Input::get('name');
            $company->email = Input::get('email');
            $company->phone = Input::get('phone');
            $company->keyword = Input::get('keyword');
            $company->vat_id = Input::get('vat_id');
            $company->country = Input::get('country');
            $company->languages = implode(",", Input::get('languages'));
            $company->rate = Input::get('rate');
            $company->register = Input::get('register');
            $company->city = Input::get('city');

            if (Input::has('password')) {
                $company->secure_key = md5($company->salt . Input::get('password'));
            }
            $company->save();
            /*
              if (!Input::has('company_id')) {
              $companyOpening = new CompanyOpeningModel;
              $companyOpening->company_id = $company->id;
              foreach (['mon', 'tue', 'wed', 'thu', 'fri', 'sat', 'sun', ] as $key) {
              $companyOpening->{ $key.'_start'} = DEFAULT_START_TIME;
              $companyOpening->{ $key.'_end'} = DEFAULT_END_TIME;
              }
              $companyOpening->save();

              foreach (['Service', 'Quality', 'Clean'] as $value) {
              $ratingType = new RatingTypeModel;
              $ratingType->company_id = $company->id;
              $ratingType->name = $value;
              $ratingType->save();
              }
              }
             */
            ProfSubClassModel::where('company_id', $company->id)->delete();
            if (Input::has('sub_category')) {
                foreach (Input::get('sub_category') as $subCategory) {
                    $subCategory = SubCategoryModel::find($subCategory);
                    $companySubCategory = new ProfSubClassModel;
                    $companySubCategory->company_id = $company->id;
                    $companySubCategory->class_id = $subCategory->category_id;
                    $companySubCategory->sub_class_id = $subCategory->id;
                    $companySubCategory->save();
                }
            }

            $alert['msg'] = $this->languageLabels['Company has been saved successfully'];
            $alert['type'] = 'success';

            return Redirect::route('admin.company')->with('alert', $alert);
        }
    }

    public function feedback($id) {
        $param['pageNo'] = 3;
        $param['company'] = CompanyModel::find($id);
        return View::make('admin.company.feedback')->with($param)->with('siteLanguage', $this->siteLanguage)->with('langLbl', $this->languageLabels)
                        ->with('currentLanguage', $this->currentLanguage);
    }

    public function delete($id) {
        try {
            CompanyModel::find($id)->delete();

            $alert['msg'] = $this->languageLabels['Company has been deleted successfully'];
            $alert['type'] = 'success';
        } catch (\Exception $ex) {
            $alert['msg'] = $this->languageLabels['This company has been already used'];
            $alert['type'] = 'danger';
        }

        return Redirect::route('admin.company')->with('alert', $alert);
    }

}
