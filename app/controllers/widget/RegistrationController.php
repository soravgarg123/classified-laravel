<?php

namespace Widget;

use Illuminate\Routing\Controllers\Controller;
use View,
    Input,
    Redirect,
    Session,
    DB,
    Mail,
    Validator,
    URL;
use Company as CompanyModel,
    User as UserModel;
use Feedback as FeedbackModel,
    Rating as RatingModel,
    Offer as OfferModel,
    UserOffer as UserOfferModel;
use CommonFunction as CommonFunctionModel;
use Visit as VisitModel;
use Website as WebsiteModel;
use SiteLanguage;

class RegistrationController extends \BaseController {

    public function __construct()
    {
        $website = DB::table('website')->get();
        $type = $website[0]->value;
        if($type == "offline"){
           header('Location: '.MY_BASE_URL.'/maintenance'); 
        }
        parent::__construct();
    }

    public function home($slug) {
        $companies = CompanyModel::where('token', $slug)->get();
        if (count($companies) > 0) {
            $company = $companies[0];
            $param['company'] = $company;
        } else {
            return Redirect::route('user.home');
        }

        if ($alert = Session::get('alert')) {
            $param['alert'] = $alert;
        }
        return View::make('widget.registration.home')->with($param)->with('siteLanguage', $this->siteLanguage)->with('langLbl', $this->languageLabels)
                        ->with('currentLanguage', $this->currentLanguage);
    }

    public function doSignup($slug) {
        $rules = ['email' => 'required|email',
            'password' => 'required|confirmed',
            'password_confirmation' => 'required',
            'name' => 'required',
        ];

        $companies = CompanyModel::where('token', $slug)->get();
        if (count($companies) > 0) {
            $company = $companies[0];
            $param['company'] = $company;
        } else {
            return Redirect::route('user.home');
        }

        $validator = Validator::make(Input::all(), $rules);

        if ($validator->fails()) {
            return Redirect::back()
                            ->withErrors($validator)
                            ->withInput();
        } else {
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
                $user->name = Input::get('name');
                $user->email = Input::get('email');
                $user->phone = Input::get('phone');
                $user->photo = DEFAULT_PHOTO;
                $user->token = strtoupper(str_random(6));
                $user->salt = str_random(8);
                $user->secure_key = md5($user->salt . Input::get('password'));
                $user->is_active = FALSE;
                $user->save();

                CommonFunctionModel::addConsumer($company->id, $user->id, 0);

                $param = ['active_link' => URL::route('user.active', $user->token)];

                $info = [ 'reply_name' => REPLY_NAME,
                    'reply_email' => REPLY_EMAIL,
                    'email' => $user->email,
                    'name' => $user->name,
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

            return Redirect::route('widget.registration.signup', $company->token)->with('alert', $alert);
        }
    }

}
