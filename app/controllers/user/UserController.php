<?php

namespace User;

use Illuminate\Routing\Controllers\Controller;
use View,
    Input,
    Redirect,
    Session,
    Cookie,
    Validator,
    Request,
    Response,
    Mail,
    URL;
use DB;
use User as UserModel,
    City as CityModel,
    Category as CategoryModel,
    Cart as CartModel;
use Comment as CommentModel,
    Contact as ContactModel,
    Offer as OfferModel,
    UserOffer as UserOfferModel;
use Feedback as FeedbackModel,
    Rating as RatingModel,
    ReviewPhoto as ReviewPhotoModel;
use Company as CompanyModel,
    Consumer as ConsumerModel,
    CommonFunction as CommonFunctionModel;
use Store as StoreModel;
use Website as WebsiteModel;
use Pclass as PclassModel;
use ProfSubClass as ProfSubClassModel;
use Office as OfficeModel;
use RatingType as RatingTypeModel;
use Post as PostModel,
    Country as CountryModel,
    Languages as LanguagesModel;
use SiteLanguage;  

class UserController extends \BaseController {

    public function __construct()
    {
        $website = DB::table('website')->get();
        $type = $website[0]->value;
        if($type == "offline"){
           header('Location: '.MY_BASE_URL.'/maintenance'); 
        }
        parent::__construct();
    }

    public function login() {
        if (Session::has('user_id')) {
            return Redirect::route('user.home');
        }

        $param['pageNo'] = 51;
        if ($alert = Session::get('alert')) {
            $param['alert'] = $alert;
        }

        $param['redirect'] = Input::has('redirect') ? Input::get('redirect') : '';
        $param['classes'] = PclassModel::all();
        $param['officies'] = OfficeModel::all();
        $param['categories'] = CategoryModel::orderBy('name' . $this->currentLanguage, 'ASC')->get();
        $param['cities'] = CityModel::all();
        return View::make('user.auth.login')->with($param)->with('siteLanguage', $this->siteLanguage)->with('langLbl', $this->languageLabels)
                        ->with('currentLanguage', $this->currentLanguage);
    }

    public function signup() {
        if (Session::has('user_id')) {
            return Redirect::route('user.home');
        }

        $param['pageNo'] = 52;
        if ($alert = Session::get('alert')) {
            $param['alert'] = $alert;
        }

        $param['redirect'] = Input::has('redirect') ? Input::get('redirect') : '';
        $param['classes'] = PclassModel::all();
        $param['officies'] = OfficeModel::all();
        $param['categories'] = CategoryModel::orderBy('name' . $this->currentLanguage, 'ASC')->get();
        $param['cities'] = CityModel::all();
        $param['countries'] = CountryModel::orderBy('short_name' . $this->currentLanguage, 'ASC')->get();
        $param['languages'] = LanguagesModel::orderBy('name' . $this->currentLanguage, 'ASC')->get();
        return View::make('user.auth.signup')->with($param)->with('siteLanguage', $this->siteLanguage)->with('langLbl', $this->languageLabels)
                        ->with('currentLanguage', $this->currentLanguage);
    }

    public function contactus() {
        $param['redirect'] = Input::has('redirect') ? Input::get('redirect') : '';
        $param['classes'] = PclassModel::all();
        $param['officies'] = OfficeModel::all();
        $param['categories'] = CategoryModel::orderBy('name' . $this->currentLanguage, 'ASC')->get();
        $param['cities'] = CityModel::all();
        $param['countries'] = CountryModel::orderBy('short_name' . $this->currentLanguage, 'ASC')->get();
        $param['languages'] = LanguagesModel::orderBy('name' . $this->currentLanguage, 'ASC')->get();
        return View::make('user.auth.contactus')->with($param)->with('siteLanguage', $this->siteLanguage)->with('langLbl', $this->languageLabels)
                        ->with('currentLanguage', $this->currentLanguage);

    }

    public function docontact(){
        $rules = [  'email'   => 'required|email',
                    'name'    => 'required',
                    'subject' => 'required',
                    'message' => 'required',
                 ];
        $validator = Validator::make(Input::all(), $rules);
        if ($validator->fails()) {
            return Redirect::back()
                            ->withErrors($validator)
                            ->with($_POST)
                            ->withInput();
        }else{
            $param = [ 'email' => Input::get('email'),  
                       'name' => Input::get('name'),
                       'message1' => Input::get('message')
                     ];

            $email = Input::get('email');
            $name = Input::get('name');
            $message1 = Input::get('message');

            $currentLang = $_COOKIE['current_lang'];
            if ($currentLang == 'es') {
                Mail::send('email.contactus_' . $currentLang, $param, function($message) use ($email,$name,$message1) {
                            $message->from(Input::get('email'), Input::get('name'));
                            $message->to('info@dovecercare.com')
                                    ->subject(Input::get('subject'));
                        });
            } elseif ($currentLang == 'it') {
                Mail::send('email.contactus_' . $currentLang, $param, function($message) use ($email,$name,$message1) {
                            $message->from(Input::get('email'), Input::get('name'));
                            $message->to('info@dovecercare.com')
                                    ->subject(Input::get('subject'));
                        });
            } else {
                Mail::send('email.contactus', $param, function($message) use ($email,$name,$message1) {
                            $message->from(Input::get('email'), Input::get('name'));
                            $message->to('info@dovecercare.com')
                                    ->subject(Input::get('subject'));
                        });
            }
            $alert['msg'] = $this->languageLabels['Contact Success'];
            $alert['type'] = 'success';
            return Redirect::route('user.contactus')->with('alert', $alert)->with('siteLanguage', $this->siteLanguage)->with('langLbl', $this->languageLabels)
                            ->with('currentLanguage', $this->currentLanguage);
        }
    }

    public function forgotPassword() {
        if (Session::has('user_id')) {
            return Redirect::route('user.home');
        }

        $param['pageNo'] = 51;
        if ($alert = Session::get('alert')) {
            $param['alert'] = $alert;
        }
        $param['classes'] = PclassModel::all();
        $param['officies'] = OfficeModel::all();
        $param['categories'] = CategoryModel::orderBy('name' . $this->currentLanguage, 'ASC')->get();
        $param['cities'] = CityModel::all();
        return View::make('user.auth.forgotPassword')->with($param)->with('siteLanguage', $this->siteLanguage)->with('langLbl', $this->languageLabels)
                        ->with('currentLanguage', $this->currentLanguage);
    }

    public function resetPassword($slug) {

        if (Session::has('user_id')) {
            return Redirect::route('user.home');
        }

        $users = UserModel::where('salt', $slug)->get();
        if (count($users) > 0) {
            $param['pageNo'] = 51;
            if ($alert = Session::get('alert')) {
                $param['alert'] = $alert;
            }
            $param['slug'] = $slug;
            $param['officies'] = OfficeModel::all();
            $param['classes'] = PclassModel::all();
            $param['categories'] = CategoryModel::all();
            $param['cities'] = CityModel::all();
            return View::make('user.auth.resetPassword')->with($param)->with('siteLanguage', $this->siteLanguage)->with('langLbl', $this->languageLabels)
                        ->with('currentLanguage', $this->currentLanguage);
        } else {
            $alert['msg'] = $this->languageLabels["Email is not exist"];
            $alert['type'] = 'danger';
            return Redirect::route('user.forgotpwd')->with('alert', $alert)->with('siteLanguage', $this->siteLanguage)->with('langLbl', $this->languageLabels)
                            ->with('currentLanguage', $this->currentLanguage);
        }
    }

    public function doResetPassword($slug) {
        $rules = ['password' => 'required'];

        $validator = Validator::make(Input::all(), $rules);

        if ($validator->fails()) {
            return Redirect::back()
                            ->withErrors($validator)
                            ->withInput();
        } else {
            $user = UserModel::where('salt', $slug)->firstOrFail();
            $user->secure_key = md5($user->salt . Input::get('password'));
            $user->save();

            $alert['msg'] = $this->languageLabels["Password has been reset successfully"];
            $alert['type'] = 'success';
            return Redirect::route('user.login')->with('alert', $alert);
        }
    }

    public function sendResetPasswordEmail() {
        $rules = ['email' => 'required|email'];

        $validator = Validator::make(Input::all(), $rules);

        if ($validator->fails()) {
            return Redirect::back()
                            ->withErrors($validator)
                            ->withInput();
        } else {
            $users = UserModel::where('email', Input::get('email'))->get();
            if (count($users) > 0) {
                $user = $users[0];

                $param = ['reset_link' => URL::route('user.resetPassword', $user->salt),];
                $info = [ 'reply_name' => REPLY_NAME,
                    'reply_email' => REPLY_EMAIL,
                    'email' => $user->email,
                    'name' => $user->name,
                    'subject' => SITE_NAME,
                ];

                $currentLang = $_COOKIE['current_lang'];
                if ($currentLang == 'es') {
                    Mail::send('email.resetPassword_' . $currentLang, $param, function($message) use ($info) {
                                $message->from($info['reply_email'], $info['reply_name']);
                                $message->to($info['email'], $info['name'])
                                        ->subject($info['subject']);
                            });
                } elseif ($currentLang == 'it') {
                    Mail::send('email.resetPassword_' . $currentLang, $param, function($message) use ($info) {
                                $message->from($info['reply_email'], $info['reply_name']);
                                $message->to($info['email'], $info['name'])
                                        ->subject($info['subject']);
                            });
                } else {
                    Mail::send('email.resetPassword', $param, function($message) use ($info) {
                                $message->from($info['reply_email'], $info['reply_name']);
                                $message->to($info['email'], $info['name'])
                                        ->subject($info['subject']);
                            });
                }

                //  Mail::send('email.resetPassword', $param, function($message) use ($info) {
                //              $message->from($info['reply_email'], $info['reply_name']);
                //              $message->to($info['email'], $info['name'])
                //                      ->subject($info['subject']);
                //          });

                $alert['msg'] = $this->languageLabels["Password changes email has been sent"];
                $alert['type'] = 'success';
            } else {
                $alert['msg'] = $this->languageLabels["Email does not exist."];
                $alert['type'] = 'danger';
            }
            return Redirect::route('user.forgotpwd')->with('alert', $alert);
        }
    }

    public function active($token) {
        $user = UserModel::where('token', $token)->firstOrFail();
        $user->is_active = TRUE;
        $user->suspend = TRUE;
        $user->save();
        $alert['msg'] = $this->languageLabels['You have successfully active your account'];
        $alert['type'] = 'success';
        return Redirect::route('user.auth.login')->with('alert', $alert);
    }

    public function doLogin() {
        $type = Input::get('type');
        if($type == "user"){
            $email = Input::get('email');
            $password = Input::get('password');
            $user = UserModel::whereRaw('email = ? and secure_key = md5(concat(salt, ?))', array($email, $password))->get();
            if (count($user) != 0) {
                if($user[0]->is_active == 0) {
                    $alert['msg'] = $this->languageLabels["You must verify your account to login."] . " <button class='btn btn-default pull-right btn-sm' data-id=" . $user[0]->id . " id='js-btn-resend'>" . $this->languageLabels['Resend Email'] . "</button>";
                    $alert['type'] = 'danger';
                    return Redirect::route('user.login')->with('alert', $alert);
                }
                if($user[0]->suspend == 0) {
                    $alert['msg'] = $this->languageLabels["your account has been blocked, please contact our support"];
                    $alert['type'] = 'danger';
                    return Redirect::route('user.login')->with('alert', $alert);
                }
                if ($user[0]->is_active == 1 && $user[0]->suspend == 1) {
                    Session::set('user_id', $user[0]->id);
                    Session::set('user_name', $user[0]->name);
                    Session::set('user_type', "user");
                    $user = UserModel::find($user[0]->id);
                    $user->session_status = 1;
                    $user->save();
                    return Redirect::back();
                    /*if (Input::has('redirect'))
                        return Redirect::to(Input::get('redirect'));
                    else
                        return Redirect::route('user.home');*/
                } 
            } else {
                $alert['msg'] = $this->languageLabels['Invalid Email and Password'];
                $alert['type'] = 'danger';
                return Redirect::route('user.login')->with('alert', $alert);
            }
        }else{
            $email = Input::get('email');
            $password = Input::get('password');
            $company = CompanyModel::whereRaw('email = ? and secure_key = md5(concat(salt, ?))', array($email, $password))->get();
            if (count($company) != 0 > 0) {
                if($company[0]->is_active == 0) {
                    $alert['msg'] = $this->languageLabels["You must verify your account to login."] . " <button class='btn btn-default pull-right btn-sm' data-id=" . $company[0]->id . " id='js-btn-resend'>" . $this->languageLabels['Resend Email'] . "</button>";
                    $alert['type'] = 'danger';
                    return Redirect::route('user.login')->with('alert', $alert);
                }
                if($company[0]->suspend == 0) {
                    $alert['msg'] = $this->languageLabels["your account has been blocked, please contact our support"];
                    $alert['type'] = 'danger';
                    return Redirect::route('user.login')->with('alert', $alert);
                }
              if ($company[0]->is_active == 1 && $company[0]->suspend == 1) {
                $default_lang = $company[0]->default_language;
                setcookie("current_lang", $default_lang, strtotime('+1 year'), "/");
                Session::set("current_lang", $default_lang == 'en' ? '' : $default_lang);
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
                return Redirect::route('user.login')->with('alert', $alert);
            }
        }
    }

    public function doSignup() {

        $rules = [  'email' => 'required|email',
                    'password' => 'required|confirmed',
                    'password_confirmation' => 'required',
                    'type' => 'required',
                ];

        $type = Input::get('type');

        $validator = Validator::make(Input::all(), $rules);

        if ($validator->fails()) {
            return Redirect::back()
                            ->withErrors($validator)
                            ->with($_POST)
                            ->withInput();
        } else {
            if($type == "user"){
            $is_exist = FALSE;
            $users = UserModel::where('email', Input::get('email'))->get();
            if ($users->count() > 0) {
                $user = $users[0];
                if ($user->secure_key != '') {
                    $is_exist = TRUE;
                }
            } else {
                $user = new UserModel;
            }

            if ($is_exist) {
                $alert['msg'] = $this->languageLabels['The account is already exist'];
                $alert['type'] = 'danger';
            } else {
                $user->email = Input::get('email');
                $user->photo = DEFAULT_PHOTO;
                $user->token = strtoupper(str_random(6));
                $user->salt = str_random(8);
                $user->secure_key = md5($user->salt . Input::get('password'));
                $user->is_active = FALSE;
                $user->save();

                $param = ['active_link' => URL::route('user.active', $user->token)];

                $info = [ 'reply_name' => REPLY_NAME,
                    'reply_email' => REPLY_EMAIL,
                    'email' => $user->email,
                    'name' => 'User',
                    'subject' => SITE_NAME,
                ];
                $currentLang = $_COOKIE['current_lang'];
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
            }

            return Redirect::route('user.signup')->with('alert', $alert);
            }else{
                $company = new CompanyModel;
                $company->name = Input::get('name');
                $company->email = Input::get('email');
                $company->phone = Input::get('phone');
                $company->photo = DEFAULT_PHOTO;
                $company->user_type = "basic";
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
            return Redirect::route('user.signup')->with('alert', $alert);
            }
        }
    }

    public function doSignout() {
        $user = UserModel::find(Session::get('user_id'));
        $user->session_status = 0;
        $user->save();
        Session::forget('user_id');
        Session::forget('user_type');
        Session::forget('user_name');
        setcookie("current_lang", 'en', strtotime('+1 year'), "/");
        return Redirect::route('user.home');
    }

    public function profile() {
        $param['pageNo'] = 2;
        $param['categories'] = CategoryModel::orderBy('name' . $this->currentLanguage, 'ASC')->get();
        $param['cities'] = CityModel::all();
        $param['classes'] = PclassModel::all();
        $param['officies'] = OfficeModel::all();
        $user = UserModel::find(Session::get('user_id'));
        $param['user'] = $user;
        if ($alert = Session::get('alert')) {
            $param['alert'] = $alert;
        }
        return View::make('user.auth.profile')->with($param)->with('siteLanguage', $this->siteLanguage)->with('langLbl', $this->languageLabels)
                        ->with('currentLanguage', $this->currentLanguage);
    }

    public function updateProfile() {
        $rules = ['email' => 'required|email',
            'name' => 'required',
        ];

        $user = UserModel::find(Session::get('user_id'));
        $user->email = Input::get('email');
        $user->name = Input::get('name');
        $user->phone = Input::get('phone');
        if (Input::get('password') != '') {
            $user->salt = str_random(8);
            $user->secure_key = md5($user->salt . Input::get('password'));
        }
        $user->default_language = Input::get('default_language');
        $user->save();

        $alert['msg'] = $this->languageLabels['User profile has been updated successfully'];
        $alert['type'] = 'success';

        return Redirect::route('user.profile')->with('alert', $alert);
    }

    public function cart() {
        $param['pageNo'] = 1;
        $param['categories'] = CategoryModel::orderBy('name' . $this->currentLanguage, 'ASC')->get();
        $param['cities'] = CityModel::all();
        $param['classes'] = PclassModel::all();
        $param['officies'] = OfficeModel::all();
        $param['carts'] = CartModel::where('user_id', Session::get('user_id'))->paginate(PAGINATION_SIZE);
        return View::make('user.carts.index')->with($param)->with('siteLanguage', $this->siteLanguage)->with('langLbl', $this->languageLabels)
                        ->with('currentLanguage', $this->currentLanguage);
    }

    public function offers() {
        $param['pageNo'] = 3;
        $param['categories'] = CategoryModel::orderBy('name' . $this->currentLanguage, 'ASC')->get();
        $param['cities'] = CityModel::all();
        $param['classes'] = PclassModel::all();
        $param['officies'] = OfficeModel::all();
        $param['userOffers'] = UserOfferModel::where('user_id', Session::get('user_id'))->where('is_used', FALSE)->get();
        return View::make('user.offers.index')->with($param)->with('siteLanguage', $this->siteLanguage)->with('langLbl', $this->languageLabels)
                        ->with('currentLanguage', $this->currentLanguage);
    }

    public function sendMessage() {
        $contact = new ContactModel;
        $contact->company_id = Input::get('company_id');
        $contact->name = Input::get('name');
        $contact->email = Input::get('email');
        $contact->description = Input::get('description');
        $contact->save();

        $alert['msg'] = $this->languageLabels['You sent your contact detail successfully'];
        $alert['type'] = 'success';
        return Redirect::route('store.detail', Input::get('slug_name_hidden'))->with('alert', $alert);
    }

    public function sendMessagepro() {
        $contact = new ContactModel;
        $contact->company_id = Input::get('company_id');
        $contact->name = Input::get('name');
        $contact->email = Input::get('email');
        $contact->description = Input::get('description');
        $contact->save();

        $alert['msg'] = $this->languageLabels['You sent your contact detail successfully'];
        $alert['type'] = 'success';
        return Redirect::route('store.detailpro', Input::get('slug_name_hidden'))->with('alert', $alert);
    }

    public function giveFeedback() {
        $store = StoreModel::find(Input::get('store_id'));
        $feedbacks = FeedbackModel::where('store_id', $store->id)->where('user_id', Session::get('user_id'));
        if ($feedbacks->count() > 0) {
            // RatingModel::where('feedback_id', $feedbacks[0]->id)->delete();
            $feedbacks->delete();
        }

        $feedback = new FeedbackModel;
        $feedback->store_id = $store->id;
        $feedback->user_id = Session::get('user_id');
        $feedback->description = Input::get('description');
        $feedback->save();

        foreach (Input::get('rating') as $key => $value) {
            $rating = new RatingModel;
            $rating->feedback_id = $feedback->id;
            $rating->type_id = Input::get('type_id')[$key];
            $rating->answer = $value;
            $rating->save();
        }


        $alert['msg'] = $this->languageLabels['You left the feedback successfully'];
        $alert['type'] = 'success';

        CommonFunctionModel::addConsumer($store->company->id, Session::get('user_id'), 0);
        CommonFunctionModel::addOffer($store->company->id, Session::get('user_id'));

        return Redirect::route('store.detail', $store->slug)->with('alert', $alert);
    }

    public function uploadPhoto() {
        $store = CompanyModel::find(Input::get('store_id'));
        if (Input::hasFile('photo')) {
            $filename = str_random(24) . "." . Input::file('photo')->getClientOriginalExtension();
            Input::file('photo')->move(ABS_REVIEW_PATH, $filename);

            $reviewPhoto = new ReviewPhotoModel;
            $reviewPhoto->photo = $filename;
            $reviewPhoto->description = Input::get('description');
            $reviewPhoto->store_id = $store->id;
            $reviewPhoto->user_id = Session::get('user_id');
            $reviewPhoto->save();
            $alert['msg'] = $this->languageLabels['Image has been uploaded successfully'];
            $alert['type'] = 'success';
        } else {
            $alert['msg'] = $this->languageLabels['Please select file to upload'];
            $alert['type'] = 'danger';
        }

        return Redirect::route('store.detail.photo', $company->slug)->with('alert', $alert);
    }

    public function asyncAddFreeCart()
    {
        $flag = 1;
        $service_available = Input::get('service_available11');
        if (Input::has('store_id') && Session::has('user_id') && $flag == 1) {
            $cart = new CartModel;
            $cart->store_id = Input::get('store_id');
            $cart->user_id = Session::get('user_id');
            $cart->company_id = Input::get('company_id');
            $cart->message = Input::get('user_msg');
            $options = ['service_available' => Input::get('service_available'), 'delivery_days' => Input::get('max_days'), 'delivery_place' => Input::get('modal_place')];
            $cart->options = serialize($options);
            $cart->save();
            $books = CartModel::where('store_id', Input::get('store_id'))->where('user_id', Session::get('user_id'))->firstOrFail();
            $param = [
                        'book_date' => Input::get('when'),
                        'delivery_days' => Input::get('max_days'),
                        'delivery_place' => Input::get('modal_place'),
                        'store_name' => $books->store->name,
                        'user_name' => $books->user->name,
                        'price' => $books->price,
                        'message' => Input::get('user_msg'),
                        'addr' => '',
                        'location' => 'Home',
                    ];

            $info = [ 
                        'reply_name' => REPLY_NAME,
                        'reply_email' => REPLY_EMAIL,
                        'email' => $books->user->email,
                        'name' => $books->user->name,
                        'subject' => SITE_NAME,
                    ];
            $currentLang = $_COOKIE['current_lang'];
            if ($currentLang == 'es') {
                Mail::send('email.makeBook_' . $currentLang, $param, function($message) use ($info) {
                            $message->from($info['reply_email'], $info['reply_name']);
                            $message->to($info['email'], $info['name'])
                                    ->subject($info['subject']);
                        });
            } elseif ($currentLang == 'it') {
                Mail::send('email.makeBook_' . $currentLang, $param, function($message) use ($info) {
                            $message->from($info['reply_email'], $info['reply_name']);
                            $message->to($info['email'], $info['name'])
                                    ->subject($info['subject']);
                        });
            } else {
                Mail::send('email.makeBook', $param, function($message) use ($info) {
                            $message->from($info['reply_email'], $info['reply_name']);
                            $message->to($info['email'], $info['name'])
                                    ->subject($info['subject']);
                        });
            }

            $info = [ 'reply_name' => REPLY_NAME,
                'reply_email' => REPLY_EMAIL,
                'email' => $books->store->company->email,
                'name' => $books->store->name,
                'subject' => SITE_NAME,
            ];
            $currentLang = $_COOKIE['current_lang'];
            if ($currentLang == 'es') {
                Mail::send('email.bookNoti_' . $currentLang, $param, function($message) use ($info) {
                            $message->from($info['reply_email'], $info['reply_name']);
                            $message->to($info['email'], $info['name'])
                                    ->subject($info['subject']);
                        });
            } elseif ($currentLang == 'it') {
                Mail::send('email.bookNoti_' . $currentLang, $param, function($message) use ($info) {
                            $message->from($info['reply_email'], $info['reply_name']);
                            $message->to($info['email'], $info['name'])
                                    ->subject($info['subject']);
                        });
            } else {
                Mail::send('email.bookNoti', $param, function($message) use ($info) {
                            $message->from($info['reply_email'], $info['reply_name']);
                            $message->to($info['email'], $info['name'])
                                    ->subject($info['subject']);
                        });
            }

            $result['result'] = "success";
            $result['msg'] = $this->languageLabels["Your book has been added on cart successfully"];
            return Response::json($result, 200);
        }else {
            $result['result'] = "failed";
            if (!Session::has('user_id')) {
                $result['msg'] = $this->languageLabels["You have to login"];
            }else{
                $result['msg'] = $this->languageLabels["Invalid Request"];
            }
            return Response::json($result, 200);
        }
    }

    public function asyncAddCart() {
        $flag = 1;
        $bookDate = Input::get('when');
        $resultData = DB::table('cart')
                        ->Where('book_date', $bookDate)
                        ->get();
        if(!empty($resultData)){
          $result['result'] = "success";
          $result['msg'] = $this->languageLabels["booked date should be different"];
          return Response::json($result, 200);  
        }
        
        if (Input::has('store_id') && Session::has('user_id') && $flag == 1) {
            $cart = new CartModel;
            $cart->store_id = Input::get('store_id');
            $cart->user_id = Session::get('user_id');
            if (Input::get('service_available') == 1) {
                $cart->book_date = Input::get('when');
                $cart->duration = Input::get('duration');
                $options = ['service_available' => Input::get('service_available')];
                $cart->options = serialize($options);
            } else {
                $options = ['service_available' => Input::get('service_available'), 'delivery_days' => Input::get('delivery_days'), 'delivery_place' => Input::get('delivery_place')];
                $cart->options = serialize($options);
            }

            $cart->company_id = Input::get('company_id');
            $cart->price = Input::get('price');
            $cart->message = Input::get('msg');
            $cart->user_address = Input::get('addr');
            $cart->office_id = Input::get('office_id');
            $cart->save();
            if (Input::has('addr')) {
                $location = 'Home';
                $addr = Input::get('addr');
            } else {
                $location = $cart->office->name;
                $addr = $cart->office->address;
            }
            // send mail to customer.
            $books = CartModel::where('store_id', Input::get('store_id'))->where('user_id', Session::get('user_id'))->firstOrFail();
            if (Input::get('service_available') == 1) {
                $param = ['book_date' => Input::get('when'),
                    'duration' => Input::get('duration'),
                    'store_name' => $books->store->name,
                    'user_name' => $books->user->name,
                    'price' => $books->price,
                    'msg' => Input::get('msg'),
                    'addr' => $addr,
                    'location' => $location,
                ];
            } else {
                $param = ['book_date' => Input::get('when'),
                    'delivery_days' => Input::get('delivery_days'),
                    'delivery_place' => Input::get('delivery_place'),
                    'store_name' => $books->store->name,
                    'user_name' => $books->user->name,
                    'price' => $books->price,
                    'msg' => Input::get('msg'),
                    'addr' => $addr,
                    'location' => $location,
                ];
            }


            $info = [ 'reply_name' => REPLY_NAME,
                'reply_email' => REPLY_EMAIL,
                'email' => $books->user->email,
                'name' => $books->user->name,
                'subject' => SITE_NAME,
            ];

            $currentLang = $_COOKIE['current_lang'];
            if ($currentLang == 'es') {
                Mail::send('email.makeBook_' . $currentLang, $param, function($message) use ($info) {
                            $message->from($info['reply_email'], $info['reply_name']);
                            $message->to($info['email'], $info['name'])
                                    ->subject($info['subject']);
                        });
            } elseif ($currentLang == 'it') {
                Mail::send('email.makeBook_' . $currentLang, $param, function($message) use ($info) {
                            $message->from($info['reply_email'], $info['reply_name']);
                            $message->to($info['email'], $info['name'])
                                    ->subject($info['subject']);
                        });
            } else {
                Mail::send('email.makeBook', $param, function($message) use ($info) {
                            $message->from($info['reply_email'], $info['reply_name']);
                            $message->to($info['email'], $info['name'])
                                    ->subject($info['subject']);
                        });
            }

            $info = [ 'reply_name' => REPLY_NAME,
                'reply_email' => REPLY_EMAIL,
                'email' => $books->store->company->email,
                'name' => $books->store->name,
                'subject' => SITE_NAME,
            ];
            $currentLang = $_COOKIE['current_lang'];
            if ($currentLang == 'es') {
                Mail::send('email.bookNoti_' . $currentLang, $param, function($message) use ($info) {
                            $message->from($info['reply_email'], $info['reply_name']);
                            $message->to($info['email'], $info['name'])
                                    ->subject($info['subject']);
                        });
            } elseif ($currentLang == 'it') {
                Mail::send('email.bookNoti_' . $currentLang, $param, function($message) use ($info) {
                            $message->from($info['reply_email'], $info['reply_name']);
                            $message->to($info['email'], $info['name'])
                                    ->subject($info['subject']);
                        });
            } else {
                Mail::send('email.bookNoti', $param, function($message) use ($info) {
                            $message->from($info['reply_email'], $info['reply_name']);
                            $message->to($info['email'], $info['name'])
                                    ->subject($info['subject']);
                        });
            }

            $result['result'] = "success";
            $result['msg'] = $this->languageLabels["Your book has been added on cart successfully"];
            return Response::json($result, 200);
        } else {
            $result['result'] = "failed";
            if (!Session::has('user_id')) {
                $result['msg'] = $this->languageLabels["You have to login"];
            } elseif (Input::get('price') == 'HP' && (!Input::has('duration') || !Input::has('when'))) {
                $result['msg'] = $this->languageLabels["Please pick a date and duration"];
            } elseif (Input::get('price') != 'HP' && !Input::has('when')) {
                $result['msg'] = $this->languageLabels["Please pick a date and duration"];
            }
            else
                $result['msg'] = $this->languageLabels["Invalid Request"];
            return Response::json($result, 200);
        }
    }

    public function asyncRemoveCart() {
        $id = Input::get('cart_id');
        $cartData  = CartModel::find($id);
        $userId    = $cartData->user_id;
        $companyId = $cartData->company_id;
        $storeId   = $cartData->store_id; 
        $company_data = CompanyModel::find($companyId);
        $user_data = UserModel::find($userId);
        $store_data = StoreModel::find($storeId);
        $currentLang = $_COOKIE['current_lang'];
        if($currentLang == "en"){
            $store_name = "name";
            $store_desc = "description";
        }
        if($currentLang == "es"){
            $store_name = "namees";
            $store_desc = "descriptiones";
        }
        if($currentLang == "it"){
            $store_name = "nameit";
            $store_desc = "descriptionit";
        }
        $bookedDate = str_replace("/", "-", $cartData->book_date);
        $splitDate = explode(" ", $bookedDate);
        $date1=date_create(date('Y-m-d'));
        $date2=date_create($splitDate[0]);
        $diff=date_diff($date1,$date2);
        $dateDiff = (int) $diff->format("%R%a");
        if($dateDiff > 1 || $dateDiff == 1){
        DB::table('cart')->where('id', $id)->update(array('status' => 2));
            $result['result'] = "success";
            $result['msg'] = $this->languageLabels["The company has been removed succssfully from the cart"];
            $usermsg = $this->languageLabels["Your service has been cancelled succssfully"];
            $companymsg = $this->languageLabels["User has cancelled your service"];
            $store_details = "";
            $store_details .= "<table border='2'>";
            $store_details .= "<thead>";
            $store_details .= "<tr>";
            $store_details .= "<td>".$this->languageLabels["Name"]."</td>";
            $store_details .= "<td>".$this->languageLabels["Email"]."</td>";
            $store_details .= "<td>".$this->languageLabels["Phone"]."</td>";
            $store_details .= "<td>".$this->languageLabels["Price"]."</td>";
            $store_details .= "<td>".$this->languageLabels["Duration"]."</td>";
            $store_details .= "<td>".$this->languageLabels["Description"]."</td>";
            $store_details .= "</tr>";
            $store_details .= "</thead>";
            $store_details .= "<tbody>";
            $store_details .= "<tr>";
            $store_details .= "<td>".$store_data->$store_name."</td>";
            $store_details .= "<td>".$store_data->email."</td>";
            $store_details .= "<td>".$store_data->phone."</td>";
            $store_details .= "<td> &pound; ".$store_data->price_value."</td>";
            $store_details .= "<td>".$store_data->duration." min</td>";
            $store_details .= "<td>".$store_data->$store_desc."</td>";
            $store_details .= "</tr>";
            $store_details .= "</tbody>";
            $store_details .= "</table>";
            $param1 = [ 'email1' => $company_data->email,
                        'name1'  => $company_data->name,
                        'message1' => $companymsg,
                        'store_details' => $store_details
                     ];
            $param2 = [ 'email2' => $user_data->email,
                        'name2'  => $user_data->name,
                        'message2' => $usermsg,
                        'store_details' => $store_details
                     ];
            $email1 = $company_data->email;
            $email2 = $user_data->email;
            $name1  = $company_data->name;
            $name2  = $user_data->name;
            $message1 = $companymsg;
            $message2 = $usermsg;
            if ($currentLang == 'es') 
            {
                Mail::send('email.cancel_cart_professional_' . $currentLang, $param1, function($message) use ($email1,$name1,$message1,$store_details) {
                            $message->from(REPLY_EMAIL, REPLY_NAME);
                            $message->to($email1)
                                    ->subject('cancelar el servicio');
                        });
                Mail::send('email.cancel_cart_user_' . $currentLang, $param2, function($message) use ($email2,$name2,$message2,$store_details) {
                            $message->from(REPLY_EMAIL, REPLY_NAME);
                            $message->to($email2)
                                    ->subject('cancelar el servicio');
                        });
            } 
            elseif ($currentLang == 'it')
             {
                Mail::send('email.cancel_cart_professional_' . $currentLang, $param1, function($message) use ($email1,$name1,$message1,$store_details) {
                            $message->from(REPLY_EMAIL, REPLY_NAME);
                            $message->to($email1)
                                    ->subject('annullare il servizio');
                        });
                Mail::send('email.cancel_cart_user_' . $currentLang, $param2, function($message) use ($email2,$name2,$message2,$store_details) {
                            $message->from(REPLY_EMAIL, REPLY_NAME);
                            $message->to($email2)
                                    ->subject('annullare il servizio');
                        });
            } else 
            {
                Mail::send('email.cancel_cart_professional_' . $currentLang, $param1, function($message) use ($email1,$name1,$message1,$store_details) {
                            $message->from(REPLY_EMAIL, REPLY_NAME);
                            $message->to($email1)
                                    ->subject('cancel service');
                        });
                Mail::send('email.cancel_cart_user_' . $currentLang, $param2, function($message) use ($email2,$name2,$message2,$store_details) {
                            $message->from(REPLY_EMAIL, REPLY_NAME);
                            $message->to($email2)
                                    ->subject('cancel service');
                        });
            }
        }else{
            $result['result'] = "error";
            $result['msg'] = $this->languageLabels["Appointment date should be atleast 1 day before"];
        }
        return Response::json($result, 200);
    }

    public function comment() {
        $comment = new CommentModel;
        $comment->user_id = Input::get('user_id');
        $comment->post_id = Input::get('post_id');
        $comment->content = Input::get('message');
        $comment->parent_id = Input::get('parent_id');
        $comment->save();
        $post = PostModel::find(Input::get('post_id'));
        $post->comment_count = $post->comment_count + 1;
        $post->save();
        $result['result'] = "success";
        $result['msg'] = $this->languageLabels["Your comment has been posted successfully."];
        return Response::json($result, 200);
    }

}
