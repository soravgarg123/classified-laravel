<?php

namespace Company;

use Illuminate\Routing\Controllers\Controller;
use View,
    Input,
    Redirect,
    Session,
    Validator,
    Cookie,
    Mail,
    DB,
    URL;
use Company as CompanyModel,
    CompanyDetail as CompanyDetailModel;
use City as CityModel,
    Category as CategoryModel,
    CompanySubCategory as CompanySubCategoryModel,
    SubCategory as SubCategoryModel;
use RatingType as RatingTypeModel;
use Pclass as PclassModel;
use ProfSubClass as ProfSubClassModel;
use SubClass as SubClassModel;
use Website as WebsiteModel;
use Plan as PlanModel;
use CompanyTransaction as CompanyTransactionModel;
use Country as CountryModel,
    Languages as LanguagesModel;
use SiteLanguage;

class AuthController extends \BaseController {

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
        if (Session::has('company_id')) {
            return Redirect::route('company.dashboard');
        } else {
            return Redirect::route('company.auth.login');
        }
    }

    public function login() {
        if (Session::has('company_id')) {
            return Redirect::route('company.dashboard');
        }
        $param['pageNo'] = 51;
        if ($alert = Session::get('alert')) {
            $param['alert'] = $alert;
        }
        return View::make('company.auth.login')->with($param)->with('siteLanguage', $this->siteLanguage)->with('langLbl', $this->languageLabels)
                        ->with('currentLanguage', $this->currentLanguage);
    }

    public function doLogin() {
        $email = Input::get('email');
        $password = Input::get('password');
        $company = CompanyModel::whereRaw('email = ? and secure_key = md5(concat(salt, ?))', array($email, $password))->get();
        if (count($company) != 0 > 0) {
            if($company[0]->is_active == 0) {
                $alert['msg'] = $this->languageLabels["You must verify your account to login."] . " <button class='btn btn-default pull-right btn-sm' data-id=" . $company[0]->id . " id='js-btn-resend'>" . $this->languageLabels['Resend Email'] . "</button>";
                $alert['type'] = 'danger';
                return Redirect::route('company.auth.login')->with('alert', $alert);
            }
            if($company[0]->suspend == 0) {
                $alert['msg'] = $this->languageLabels["your account has been blocked, please contact our support"];
                $alert['type'] = 'danger';
                return Redirect::route('company.auth.login')->with('alert', $alert);
            }
          if ($company[0]->is_active == 1 && $company[0]->suspend == 1) {
            Session::set('company_id', $company[0]->id);
            Session::set('company_name', $company[0]->name);
            Session::set('company_type', $company[0]->user_type);
            Session::set('user_type', "professional");
            Session::set('company_service_amount', $company[0]->service_amount);
            $user = CompanyModel::find($company[0]->id);
            $user->session_status = 1;
            $user->save();
            return Redirect::route('company.dashboard');
            } 
        } else {
            $alert['msg'] = $this->languageLabels['Invalid username and password'];
            $alert['type'] = 'danger';
            return Redirect::route('company.auth.login')->with('alert', $alert);
        }
    }

    public function signup($type, $price) {
        if (Session::has('company_id')) {
            return Redirect::route('company.dashboard');
        }
        $param['pageNo'] = 52;
        if ($alert = Session::get('alert')) {
            $param['alert'] = $alert;
        }
        $param['type'] = $type;
        $param['price'] = $price;
        $param['plans'] = Planmodel::All();
        $param['countries'] = CountryModel::orderBy('short_name' . $this->currentLanguage, 'ASC')->get();
        $param['languages'] = LanguagesModel::orderBy('name' . $this->currentLanguage, 'ASC')->get();
        return View::make('company.auth.signup')->with($param)->with('siteLanguage', $this->siteLanguage)->with('langLbl', $this->languageLabels)
                        ->with('currentLanguage', $this->currentLanguage);
    }

    public function signSuccess() {
        $alert['msg'] = $this->languageLabels['You have registered successfully.'];
        $alert['type'] = 'success';
        return Redirect::route('company.auth.login')->with('alert', $alert);
    }

    public function signFailed() {
        $alert['msg'] = $this->languageLabels['You have failed on signup.'];
        $alert['type'] = 'danger';
        return Redirect::route('company.auth.signup')->with('alert', $alert);
    }

    public function membership() {
        if (Session::has('company_id')) {
            return Redirect::route('company.dashboard');
        }
        $param['pageNo'] = 52;
        if ($alert = Session::get('alert')) {
            $param['alert'] = $alert;
        }
        $param['plans'] = PlanModel::All();
        return View::make('company.auth.membership')->with($param)->with('siteLanguage', $this->siteLanguage)->with('langLbl', $this->languageLabels);
    }

    public function doSignup() {
        $rules = ['email' => 'required|email|unique:company',
                  'password' => 'required|confirmed',
                  'password_confirmation' => 'required',
                  'name' => 'required',
                 ];
        $validator = Validator::make(Input::all(), $rules);

        if ($validator->fails()) {
            return Redirect::back()
                            ->withErrors($validator)
                            ->withInput();
        } else {
            $company = new CompanyModel;
            $company->name = Input::get('name');
            $company->email = Input::get('email');
            $company->phone = Input::get('phone');
            $company->photo = DEFAULT_PHOTO;
            $company->keyword = Input::get('keyword') ? Input::get('keyword') : '';
            $company->user_type = Input::get('user_type');
            $company->languages = implode(",", Input::get('languages'));
            $company->country = Input::get('country');
            $company->rate = Input::get('rate');
            if (Input::get('user_type') == 'basic')
            $company->service_amount = 1;
            $company->count_email = 0;
            $company->count_sms = 0;
            $company->is_completed = FALSE;
            $company->token = strtoupper(str_random(8));
            $company->salt = str_random(8);
            $company->secure_key = md5($company->salt . Input::get('password'));
            $company->save();



            foreach (['Service', 'Quality', 'Clean'] as $value) {
                $ratingType = new RatingTypeModel;
                $ratingType->company_id = $company->id;
                $ratingType->name = $value;
                $ratingType->save();
            }

            $param = ['active_link' => URL::route('professional.active', $company->token)];

                $info = [ 'reply_name' => REPLY_NAME,
                    'reply_email' => REPLY_EMAIL,
                    'email' => $company->email,
                    'name' => $company->name,
                    'subject' => SITE_NAME,
                ];
                $currentLang = $_COOKIE['current_lang'];
                if(empty($currentLanguage)){
                    $currentLang = "english";
                }
                if ($currentLang == 'es') {
                    Mail::send('email.active_' . $currentLang, $param, function($message) use ($info) {
                                $message->from($info['reply_email'], $info['reply_name']);
                                $message->to($info['email'], $info['name'])
                                        ->subject($info['subject']);
                            });
                } elseif ($currentLang == 'it') {
                    Mail::send('email.active_' . $currentLang, $param, function($message) use ($info) {
                                $message->from($info['reply_email'], $info['reply_name']);
                                $message->to($info['email'], $info['name'])
                                        ->subject($info['subject']);
                            });
                } else {
                    Mail::send('email.active', $param, function($message) use ($info) {
                                $message->from($info['reply_email'], $info['reply_name']);
                                $message->to($info['email'], $info['name'])
                                        ->subject($info['subject']);
                            });
                }

            $alert['msg'] = $this->languageLabels['Check your email to verify your account'];
            $alert['type'] = 'success';
            return Redirect::route('company.auth.login')->with('alert', $alert);
        }
    }

    public function active($token) {
        $company = CompanyModel::where('token', $token)->firstOrFail();
        $company->is_active = TRUE;
        $company->suspend = TRUE;
        $company->save();
        $alert['msg'] = $this->languageLabels['You have successfully active your account'];
        $alert['type'] = 'success';
        return Redirect::route('company.auth.login')->with('alert', $alert);
    }

    public function logout() {
        $user = CompanyModel::find(Session::get('company_id'));
        $user->session_status = 0;
        $user->save();
        Session::forget('company_id');
        Session::forget('company_name');
        Session::forget('user_type');
        setcookie("current_lang", 'en', strtotime('+1 year'), "/");
        return Redirect::route('user.login');
    }

    public function profile($id = 1) {
        $param['pageNo'] = 9;
        $param['tabNo'] = $id;
        if ($alert = Session::get('alert')) {
            $param['alert'] = $alert;
        }
        $param['countries'] = CountryModel::orderBy('short_name' . $this->currentLanguage, 'ASC')->get();
        $param['languages'] = LanguagesModel::orderBy('name' . $this->currentLanguage, 'ASC')->get();
        $param['company'] = CompanyModel::find(Session::get('company_id'));
        $param['categories'] = PclassModel::all();
        return View::make('company.auth.profile')->with($param)->with('siteLanguage', $this->siteLanguage)->with('langLbl', $this->languageLabels)
                        ->with('currentLanguage', $this->currentLanguage);
    }

    public function changePassword() {
        $rules = ['password_current' => 'required',
            'password' => 'required|confirmed',
            'password_confirmation' => 'required',
        ];

        $validator = Validator::make(Input::all(), $rules);

        if ($validator->fails()) {
            return Redirect::back()
                            ->withErrors($validator)
                            ->withInput();
        } else {
            $company = CompanyModel::find(Session::get('company_id'));
            if ($company->secure_key == md5($company->salt . Input::get('password_current'))) {
                $company->secure_key = md5($company->salt . Input::get('password'));
                $company->save();

                $alert['msg'] = $this->languageLabels['Password has been updated successfully'];
                $alert['type'] = 'success';
            } else {
                $alert['msg'] = $this->languageLabels['Current Password is incorrect'];
                $alert['type'] = 'danger';
            }
            return Redirect::route('company.profile', 4)->with('alert', $alert);
        }
    }

    public function updateCompany() {
        $defaultLang = "";
            if($_COOKIE['current_lang'] == "es"){
                $defaultLang = "descriptiones";
            }elseif($_COOKIE['current_lang'] == "it"){
                $defaultLang = "descriptionit";
            }else{
                $defaultLang = "description";
            }
       $rules = [   'name'    => 'required',
                    'email' => 'required|email',
                    'country' => 'required',
                    'languages' => 'required',
                    'phone'     => 'required',
                    'rate'     => 'required',
                    'sub_category' => 'required',
                    $defaultLang => 'required|min:80|max:1200',
                 ];

        $messages = [
                'name.required' => 'Enter your name',
                'email.required' => 'Enter your email',
                'country.required' => 'Select your country',
                'languages.required' => 'Select your languages spoken',
                'phone.required'    => 'Enter your phone number including area code. Ex. +393937003535',
                'rate.required'     => 'Enter hourly rate in Euro Ex: 45,00',
                $defaultLang.'.required' => 'Enter profile information',
            ];


        if(isset($_POST['register']) && $_POST['register'] != ""){
            $rules['register'] = 'required';
            $rules['city'] = 'required';
            $rules['reg_no'] = 'required';
            $messages['register.required'] = 'Enter Your Registration Type';
            $messages['city.required'] = 'Enter the city where you are registered';
            $messages['reg_no.required'] = 'Enter your registration number';
        }

        $validator = Validator::make(Input::all(), $rules,$messages);
        $description = Input::get('description');
        $descriptionit = Input::get('descriptionit');
        $descriptiones = Input::get('descriptiones');
        $sub_category = Input::get('sub_category');
        $reg_exUrl = "/(http|https|ftp|ftps)\:\/\/[a-zA-Z0-9\-\.]+\.[a-zA-Z]{2,3}(\/\S*)?/";
        $urls = array();
        $specialChar = strpos($description,"@");
        $specialCharit = strpos($descriptionit,"@");
        $specialChares = strpos($descriptiones,"@");
        if ($validator->fails()) {
            return Redirect::back()
                            ->withErrors($validator)
                            ->with($_POST)
                            ->withInput();
        }
        if(count($sub_category) > 5){
            $alert['msg'] = $this->languageLabels['max five category'];
            $alert['type'] = 'danger';
            return Redirect::route('company.profile', 1)->with('alert', $alert);
        }
        if($specialChar > 0 || $specialCharit > 0 || $specialChares > 0){
            $alert['msg'] = $this->languageLabels['@ not allowed'];
            $alert['type'] = 'danger';
            return Redirect::route('company.profile', 1)->with('alert', $alert);
        }
        if(preg_match_all($reg_exUrl, $description, $urls) || preg_match_all($reg_exUrl, $descriptionit, $urls) || preg_match_all($reg_exUrl, $descriptiones, $urls)){
            $alert['msg'] = $this->languageLabels['links not allowed'];
            $alert['type'] = 'danger';
            return Redirect::route('company.profile', 1)->with('alert', $alert);
        }
            $company = CompanyModel::find(Session::get('company_id'));
            foreach ($this->siteLanguage as $key => $value) {
                $descriptionCtrl = 'description' . $value;
                $company->$descriptionCtrl = Input::get($descriptionCtrl);
            }
            $company->default_language = Input::get('default_language');
            $company->name = Input::get('name');
            $company->register = Input::get('register');
            $company->email = Input::get('email');
            $company->phone = Input::get('phone');
            $company->vat_id = Input::get('vat_id');
            $company->keyword = Input::get('keyword');
            $company->languages = implode(",", Input::get('languages'));
            $company->description = $description;
            //$company->paypal_id = Input::get('paypal_id');
            $company->country = Input::get('country');
            $company->rate = Input::get('rate');
            $company->reg_no = Input::get('reg_no');

            $company->city = Input::get('city');
            $company->user_key = Input::get('user_key');
            $company->is_completed = TRUE;
            $company->save();

            ProfSubClassModel::where('company_id', Session::get('company_id'))->delete();
            if (Input::has('sub_category')) {
                foreach (Input::get('sub_category') as $subCategory) {
                    $subCategory = SubClassModel::find($subCategory);
                    $companySubCategory = new ProfSubClassModel;
                    $companySubCategory->company_id = Session::get('company_id');
                    $companySubCategory->class_id = $subCategory->class_id;
                    $companySubCategory->sub_class_id = $subCategory->id;
                    $companySubCategory->save();
                }
            }

            $alert['msg'] = $this->languageLabels['Professional has been updated successfully'];
            $alert['type'] = 'success';

            return Redirect::route('company.profile', 1)->with('alert', $alert);
    }

    public function updateInvoiceMgmt()
    {
        $rules = [  'company_name'    => 'required',
                    'street' => 'required',
                    'no' => 'required',
                    'country'     => 'required',
                    'region' => 'required',
                    'invoice_city' => 'required',
                    'country_tax' => 'required',
                    'invoice_vat_id' => 'required',
                    'payment_gateway' => 'required',
                    'payment_email' => 'required|email'
                 ];
        $validator = Validator::make(Input::all(), $rules);
        if ($validator->fails()) {
            return Redirect::back()
                        ->withErrors($validator)
                        ->with($_POST)
                        ->withInput();
        }

        $company = CompanyModel::find(Session::get('company_id'));
        $company->company_name = Input::get('company_name');
        $company->street = Input::get('street');
        $company->no = Input::get('no');
        $company->region = Input::get('region');
        $company->invoice_city = Input::get('invoice_city');
        $company->country_tax = Input::get('country_tax');
        $company->invoice_vat_id = Input::get('invoice_vat_id');
        $company->payment_gateway = Input::get('payment_gateway');
        $company->payment_email = Input::get('payment_email');
        $company->save();

        $alert['msg'] = $this->languageLabels['Invoice Update Successfully'];
        $alert['type'] = 'success';

        return Redirect::route('company.profile', 2)->with('alert', $alert);
    }

    public function updatePhoto() {
        $company = CompanyModel::find(Session::get('company_id'));
        if (Input::hasFile('photo')) {
            $filename = str_random(24) . "." . Input::file('photo')->getClientOriginalExtension();
            Input::file('photo')->move(ABS_COMPANY_PATH, $filename);
            $company->photo = $filename;
        }
        $company->save();

        $alert['msg'] = $this->languageLabels['Professional Photo has been updated successfully'];
        $alert['type'] = 'success';

        return Redirect::route('company.profile', 3)->with('alert', $alert);
    }

    public function updateHolidays() {
        $company = CompanyModel::find(Session::get('company_id'));
        if (Input::has('holidays')) {
            $company->holidays = Input::get('holidays');
        }
        $company->save();
        $alert['msg'] = $this->languageLabels['Holidays has been updated successfully'];
        $alert['type'] = 'success';
        return Redirect::route('company.profile', 2)->with('alert', $alert);
    }

    public function purchaseIPN() {
        $req = 'cmd=_notify-validate';
        foreach ($_POST as $key => $value) {
            if ($key == "custom") {

                $custom = json_decode($value, true);
                if (!isset($custom['com_id'])) {
                    $email = $custom["email"];
                    $name = $custom["name"];
                    $phone = $custom["phone"];
                    $keyword = $custom["keyword"];
                    $password = $custom["password"];
                }
                else
                    $com_id = $custom["com_id"];
                if (isset($custom["service_number"]))
                    $service_number = $custom["service_number"];

                $user_type = $custom['type'];
            }

            if ($key == "txn_id")
                $txn_id = $value;

            if ($key == "mc_gross")
                $mc_gross = $value;

            if ($key == 'receiver_id')
                $subscr = $value;

            $value = urlencode(stripslashes($value));
            $req .= "&$key=$value";
        }


        //post back to PayPal system to validate
        $header = "POST /cgi-bin/webscr HTTP/1.1\r\n";
        $header .= "Content-Type: application/x-www-form-urlencoded\r\n";
        $header .= "Host: " . PAYPAL_SERVER . "\r\n";
        $header .= "Connection: close\r\n";
        $header .= "Content-Length: " . strlen($req) . "\r\n\r\n";
        $fp = fsockopen('ssl://' . PAYPAL_SERVER, 443, $errno, $errstr, 30);
        if ($fp) {

            fputs($fp, $header . $req);
            while (!feof($fp)) {
                $res = fgets($fp, 1024);
                $res = trim($res);

                if (strcmp($res, "VERIFIED") == 0) {
                    //insert order into database
                    if (isset($com_id)) {

                        $company = CompanyModel::find($com_id);
                        $company->user_type = $user_type;
                        if (isset($service_number))
                            $company->service_amount = (int) $service_number + $company->service_amount;

                        $company->save();
                        $companyTransaction = new CompanyTransactionModel;
                        $companyTransaction->company_id = $company->id;
                        $companyTransaction->subscr_id = $subscr;
                        $companyTransaction->txn_id = $txn_id;
                        $companyTransaction->amount = $mc_gross;
                        $companyTransaction->save();
                    }else {
                        $company = new CompanyModel;
                        $company->name = $name;
                        $company->email = $email;
                        $company->phone = $phone;
                        $company->count_email = 0;
                        $company->count_sms = 0;
                        $company->keyword = $keyword;
                        $company->user_type = $user_type;
                        $company->photo = DEFAULT_PHOTO;
                        if (isset($service_number))
                            $company->service_amount = $service_number;
                        $company->is_completed = FALSE;
                        $company->token = strtoupper(str_random(8));
                        $company->salt = str_random(8);
                        $company->secure_key = md5($company->salt . $password);
                        if (count(CompanyTransactionModel::where('txn_id', $txn_id)->get()) == 0) {
                            $company->save();
                            $companyOpening = new CompanyOpeningModel;
                            $companyOpening->company_id = $company->id;
                            foreach (['mon', 'tue', 'wed', 'thu', 'fri', 'sat', 'sun',] as $key) {
                                $companyOpening->{ $key . '_start'} = DEFAULT_START_TIME;
                                $companyOpening->{ $key . '_end'} = DEFAULT_END_TIME;
                            }
                            $companyOpening->save();

                            foreach (['Service', 'Quality', 'Clean'] as $value) {
                                $ratingType = new RatingTypeModel;
                                $ratingType->company_id = $company->id;
                                $ratingType->name = $value;
                                $ratingType->save();
                            }

                            $companyTransaction = new CompanyTransactionModel;
                            $companyTransaction->company_id = $company->id;
                            $companyTransaction->subscr_id = $subscr;
                            $companyTransaction->txn_id = $txn_id;
                            $companyTransaction->amount = $mc_gross;

                            $companyTransaction->save();

                            $param = [
                                'company_name' => $company->name,
                                'link' => URL::route('company.auth.login')
                            ];
                            $info = [
                                'reply_name' => REPLY_NAME,
                                'reply_email' => REPLY_EMAIL,
                                'email' => $company->email,
                                'name' => $company->name,
                                'subject' => SITE_NAME,
                            ];

                            $currentLang = $_COOKIE['current_lang'];
                            if ($currentLang == 'es') {
                                Mail::send('email.comReg_' . $currentLang, $param, function($message) use ($info) {
                                            $message->from($info['reply_email'], $info['reply_name']);
                                            $message->to($info['email'], $info['name'])
                                                    ->subject($info['subject']);
                                        });
                            } elseif ($currentLang == 'it') {
                                Mail::send('email.comReg_' . $currentLang, $param, function($message) use ($info) {
                                            $message->from($info['reply_email'], $info['reply_name']);
                                            $message->to($info['email'], $info['name'])
                                                    ->subject($info['subject']);
                                        });
                            } else {
                                Mail::send('email.comReg', $param, function($message) use ($info) {
                                            $message->from($info['reply_email'], $info['reply_name']);
                                            $message->to($info['email'], $info['name'])
                                                    ->subject($info['subject']);
                                        });
                            }

                            //  Mail::send('email.comReg', $param, function($message) use ($info) {
                            //              $message->from($info['reply_email'], $info['reply_name']);
                            //              $message->to($info['email'], $info['name'])
                            //                      ->subject($info['subject']);
                            //          });
                            // \End send mail to customer
                        }
                    }
                }
                if (strcmp($res, "INVALID") == 0) {
                    
                }
            }
            fclose($fp);
        }
    }

}
