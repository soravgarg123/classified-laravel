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
    User as UserModel,
    Store as StoreModel;
use Feedback as FeedbackModel,
    Rating as RatingModel,
    Offer as OfferModel,
    UserOffer as UserOfferModel;
use CommonFunction as CommonFunctionModel;
use Visit as VisitModel;
use Website as WebsiteModel;
use SiteLanguage;

class EmbedController extends \BaseController {

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
        $stores = StoreModel::where('token', $slug)->get();
        if (count($stores) > 0) {
            $store = $stores[0];
            $param['store'] = $store;
            $param['company'] = $store->company;
        } else {
            return Redirect::route('user.home');
        }

        if ($alert = Session::get('alert')) {
            $param['alert'] = $alert;
        }

        if (Session::has('user_id')) {
            $user = UserModel::find(Session::has('user_id'));
            if (FeedbackModel::where('store_id', $store->id)
                            ->where('user_id', Session::get('user_id'))
                            ->where('status', '<>', 'ST03')
                            ->get()
                            ->count() > 0) {
                $param['is_reviewed'] = TRUE;
            } else {
                $param['is_reviewed'] = FALSE;
            }
        } else {
            $param['is_reviewed'] = FALSE;
        }
        return View::make('widget.embed.home')->with($param)->with('siteLanguage', $this->siteLanguage)->with('langLbl', $this->languageLabels)
                        ->with('currentLanguage', $this->currentLanguage);
    }

    public function login($slug) {
        $stores = StoreModel::where('token', $slug)->get();
        if (count($stores) > 0) {
            $store = $stores[0];
            $param['store'] = $store;
            $param['company'] = $store->company;
        } else {
            return Redirect::route('user.home');
        }

        if ($alert = Session::get('alert')) {
            $param['alert'] = $alert;
        }

        $param['pageNo'] = 1;
        return View::make('widget.embed.login')->with($param)->with('siteLanguage', $this->siteLanguage)->with('langLbl', $this->languageLabels)
                        ->with('currentLanguage', $this->currentLanguage);
    }

    public function signup($slug) {
        $stores = StoreModel::where('token', $slug)->get();
        if (count($stores) > 0) {
            $store = $stores[0];
            $param['store'] = $store;
            $param['company'] = $store->company;
        } else {
            return Redirect::route('user.home');
        }

        if ($alert = Session::get('alert')) {
            $param['alert'] = $alert;
        }

        $param['pageNo'] = 2;
        return View::make('widget.embed.signup')->with($param)->with('siteLanguage', $this->siteLanguage)->with('langLbl', $this->languageLabels)
                        ->with('currentLanguage', $this->currentLanguage);
    }

    public function doLogin($slug) {
        $email = Input::get('email');
        $password = Input::get('password');

        $stores = StoreModel::where('token', $slug)->get();
        if (count($stores) > 0) {
            $store = $stores[0];
            $param['store'] = $store;
            $param['company'] = $store->company;
        } else {
            return Redirect::route('user.home');
        }

        $user = UserModel::whereRaw('email = ? and secure_key = md5(concat(salt, ?))', array($email, $password))->get();
        if (count($user) != 0) {
            if ($user[0]->is_active) {
                Session::set('user_id', $user[0]->id);
                Session::set('user_name', $user[0]->name);
                return Redirect::route('widget.embed.home', $store->token);
            } else {
                $alert['msg'] = $this->languageLabels["You must verify your account to login."] . " <button class='btn btn-default pull-right btn-sm' data-id=" . $user[0]->id . " id='js-btn-resend'>" . $this->languageLabels['Resend Email'] . "</button>";
                $alert['type'] = 'danger';
                return Redirect::route('widget.embed.login', $store->token)->with('alert', $alert);
            }
        } else {
            $alert['msg'] = $this->languageLabels['Invalid Email and Password'];
            $alert['type'] = 'danger';
            return Redirect::route('user.login', $store->token)->with('alert', $alert);
        }
    }

    public function doSignup($slug) {
        $rules = ['email' => 'required|email',
            'password' => 'required|confirmed',
            'password_confirmation' => 'required',
            'name' => 'required',
        ];

        $stores = StoreModel::where('token', $slug)->get();
        if (count($stores) > 0) {
            $store = $stores[0];
            $param['store'] = $store;
            $param['company'] = $store->company;
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

                CommonFunctionModel:: addConsumer($store->company->id, $user->id, 0);

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

            return Redirect::route('widget.embed.signup', $store->token)->with('alert', $alert);
        }
    }

    public function submitReview($slug) {
        $stores = StoreModel::where('token', $slug)->get();
        if (count($stores) > 0) {
            $store = $stores[0];
            $param['store'] = $store;
            $param['company'] = $store->company;
        } else {
            return Redirect::route('user.home');
        }

        if (Session::has('user_id')) {
            $userId = Session::get('user_id');
        } else {
            $users = UserModel::where('email', Input::get('email'))->get();
            if ($users->count() > 0) {
                $user = $users[0];
            } else {
                $user = new UserModel;
                $user->name = Input::get('name');
                $user->email = Input::get('email');
                $user->phone = Input::get('phone');
                $user->photo = DEFAULT_PHOTO;
                $user->token = strtoupper(str_random(6));
                $user->salt = '';
                $user->secure_key = '';
                $user->is_active = FALSE;
                $user->save();
            }
            $userId = $user->id;
        } $feedbacks = FeedbackModel:: where('store_id', $store->id)->where('user_id', $userId);
        if ($feedbacks->count() > 0) {
            $feedbacks->delete();
        }

        $feedback = new FeedbackModel;
        $feedback->store_id = $store->id;
        $feedback->user_id = $userId;
        $feedback->description = Input::get('description');
        $feedback->save();


        foreach (Input::get('rating') as $key => $value) {
            $rating = new RatingModel;
            $rating->feedback_id = $feedback->id;
            $rating->type_id = Input::get('type_id')[$key];
            $rating->answer = $value;
            $rating->save();
        }

        $alert['msg'] = $this->languageLabels['You left the feedback successfully. You got the Offer. Check your email.'];
        $alert['type'] = 'success';
        CommonFunctionModel::addConsumer($store->company->id, $userId, 0);
        CommonFunctionModel::addOffer($store->company->id, $userId);

        return Redirect::route('widget.embed.home', $store->token)->with('alert', $alert);
    }

    public function doLogout($slug) {
        $stores = StoreModel::where('token', $slug)->get();
        if (count($stores) > 0) {
            $store = $stores[0];
            $param['store'] = $store;
            $param['company'] = $store->company;
        } else {
            return Redirect::route('user.home');
        }

        Session::forget('user_id');
        Session::forget('user_name');
        return Redirect::route('widget.embed.home', $store->token);
    }

}
