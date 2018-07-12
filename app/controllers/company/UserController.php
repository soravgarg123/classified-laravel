<?php

namespace Company;

use Illuminate\Routing\Controllers\Controller;
use View,
    Input,
    Redirect,
    Session,
    Validator,
    DB,
    Response,
    Request,
    Mail;
use User as UserModel,
    Consumer as ConsumerModel;
use Offer as OfferModel,
    UserOffer as UserOfferModel;
use Loyalty as LoyaltyModel,
    UserLoyalty as UserLoyaltyModel;
use CommonFunction as CommonFunctionModel;
use Website as WebsiteModel;
use Company as CompanyModel;
use Group as GroupModel,
    Member as MemberModel,
    MarketingHistory as MarketingHistoryModel;
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

    public function index() {
        $latest = Input::has('latest') ? Input::get('latest') : 0;
        $keyword = Input::has('keyword') ? Input::get('keyword') : '';
        if ($latest == 1) {
            $consumers = ConsumerModel::where('company_id', Session::get('company_id'))->orderBy('id', 'DESC');
            $param['consumers'] = $consumers->take(30)->get();
        } else {
            $consumers = ConsumerModel::search(Session::get('company_id'), $keyword)->orderBy('id', 'DESC');
            $param['consumers'] = $consumers->paginate(30);
        }

        $param['company'] = CompanyModel::find(Session::get('company_id'));
        $param['pageNo'] = 2;
        $param['keyword'] = $keyword;
        $param['latest'] = $latest;
        if ($alert = Session::get('alert')) {
            $param['alert'] = $alert;
        }
        return View::make('company.user.index')->with($param)->with('siteLanguage', $this->siteLanguage)->with('langLbl', $this->languageLabels)
                        ->with('currentLanguage', $this->currentLanguage);
    }

    public function register() {
        $param['pageNo'] = 2;
        return View::make('company.user.register')->with($param)->with('siteLanguage', $this->siteLanguage)->with('langLbl', $this->languageLabels)
                        ->with('currentLanguage', $this->currentLanguage);
    }

    public function doRegister() {
        $rules = ['email' => 'required|email',
            'name' => 'required',
        ];

        $email = Input::get('email');
        $name = Input::get('name');
        $phone = Input::get('phone');

        $users = UserModel::where('email', $email)->get();
        if ($users->count() > 0) {
            $user = $users[0];
            $consumers = ConsumerModel::where('company_id', Session::get('company_id'))
                    ->where('user_id', $user->id);
            if ($consumers->get()->count() > 0) {
                $alert['msg'] = $this->languageLabels['This consumer already registered on our business'];
                $alert['type'] = 'info';
            } else {
                CommonFunctionModel::addConsumer(Session::get('company_id'), $user->id, 0);
                $alert['msg'] = $this->languageLabels['This consumer has been registered successfully on our business'];
                $alert['type'] = 'success';
            }
        } else {
            $user = new UserModel;
            foreach ($this->siteLanguage as $key => $value) {
                $nameCtrl = 'name' . $value;
                $user->$nameCtrl = Input::get($nameCtrl);
            }

            //$user->name = $name;
            $user->email = $email;
            $user->phone = $phone;
            $user->photo = DEFAULT_PHOTO;
            $user->token = strtoupper(str_random(6));
            $user->salt = str_random(8);
            $user->secure_key = md5($user->salt . Input::get('password'));
            $user->is_active = FALSE;
            $user->save();

            CommonFunctionModel::addConsumer(Session::get('company_id'), $user->id, 0);

            $alert['msg'] = $this->languageLabels['This consumer has been registered successfully on our business'];
            $alert['type'] = 'success';
        }
        return Redirect::route('company.user')->with('alert', $alert);
    }

    public function detail($id) {
        $consumer = ConsumerModel::where('user_id', $id)->where('company_id', Session::get('company_id'))->firstOrFail();
        $user = UserModel::find($id);
        $param['pageNo'] = 2;
        $param['user'] = $user;
        $param['consumer'] = $consumer;
        $param['company'] = CompanyModel::find(Session::get('company_id'));

        $offer_ids = [];
        $offer_ids[] = 0;
        foreach (OfferModel::where('company_id', Session::get('company_id'))->get() as $offer) {
            $offer_ids[] = $offer->id;
        }
        $param['userOffers'] = UserOfferModel::where('user_id', $id)
                ->whereIn('offer_id', $offer_ids)
                ->where('is_used', FALSE)
                ->get();

        $param['loyalties'] = LoyaltyModel::where('company_id', Session::get('company_id'))
                ->where('count_stamp', '<=', $consumer->count_stamp)
                ->get();

        if ($alert = Session::get('alert')) {
            $param['alert'] = $alert;
        }
        return View::make('company.user.detail')->with($param)->with('siteLanguage', $this->siteLanguage)->with('langLbl', $this->languageLabels)
                        ->with('currentLanguage', $this->currentLanguage);
    }

    public function useOffer($id, $id2) {
        $userOffer = UserOfferModel::find($id);
        $userOffer->is_used = TRUE;
        $userOffer->save();

        $alert['msg'] = $this->languageLabels['Offer has been used.'];
        $alert['type'] = 'success';

        return Redirect::route('company.user.detail', $id2)->with('alert', $alert);
    }

    public function useLoyalty($id, $id2) {
        $loyalty = LoyaltyModel::find($id);
        $consumer = ConsumerModel::find($id2);
        $consumer->count_stamp -= $loyalty->count_visit;
        $consumer->save();

        $userLoyalty = new UserLoyaltyModel;
        $userLoyalty->user_id = $consumer->user_id;
        $userLoyalty->loyalty_id = $loyalty->id;
        $userLoyalty->save();

        $alert['msg'] = $this->languageLabels['Loyalty has been used.'];
        $alert['type'] = 'success';
        return Redirect::route('company.user.detail', $id2)->with('alert', $alert);
    }

    public function doMarketing() {
        $strUserIds = Input::get('user_ids');
        $description = Input::get('description');
        $isEmail = Input::get('is_email') == 1 ? TRUE : FALSE;
        $userIds = explode(",", $strUserIds);

        $company = CompanyModel::find(Session::get('company_id'));

        // if (($company->count_email - count($userIds) >= 0 && $isEmail) || ($company->count_sms - count($userIds) >= 0 && !$isEmail)) {
            $group = new GroupModel;
            $group->company_id = Session::get('company_id');
            $group->name = '';
            $group->is_once = TRUE;
            $group->save();

            foreach ($userIds as $userId) {
                $member = new MemberModel;
                $member->group_id = $group->id;
                $member->user_id = $userId;
                $member->save();

                if ($isEmail) {
                    $data = ['company_name' => $company->name,
                        'msg' => $description,
                    ];

                    $info = [ 'reply_name' => REPLY_NAME,
                        'reply_email' => REPLY_EMAIL,
                        'email' => $member->user->email,
                        'name' => $member->user->name,
                        'subject' => SITE_NAME,
                    ];
                    $currentLang = $_COOKIE['current_lang'];
                    if ($currentLang == 'es') {
                        Mail::send('email.marketing_' . $currentLang, $data, function($message) use ($info) {
                                    $message->from($info['reply_email'], $info['reply_name']);
                                    $message->to($info['email'], $info['name'])
                                            ->subject($info['subject']);
                                });
                    } elseif ($currentLang == 'it') {
                        Mail::send('email.marketing_' . $currentLang, $data, function($message) use ($info) {
                                    $message->from($info['reply_email'], $info['reply_name']);
                                    $message->to($info['email'], $info['name'])
                                            ->subject($info['subject']);
                                });
                    } else {
                        Mail::send('email.marketing', $data, function($message) use ($info) {
                                    $message->from($info['reply_email'], $info['reply_name']);
                                    $message->to($info['email'], $info['name'])
                                            ->subject($info['subject']);
                                });
                    }
                } else {
                    CommonFunctionModel::sendSMS($company->name, $member->user->phone, $description);
                }
            }

            $marketingHistory = new MarketingHistoryModel;
            $marketingHistory->description = $description;
            $marketingHistory->group_id = $group->id;
            $marketingHistory->is_email = $isEmail;
            $marketingHistory->save();

            if ($isEmail) {
                $company->count_email = $company->count_email - count($userIds);
            } else {
                $company->count_sms = $company->count_sms - count($userIds);
            }
            $company->save();

            $alert['msg'] = $this->languageLabels['Message has been sent successfully'];
            $alert['type'] = 'info';
        /*} else {
            $alert['msg'] = $this->languageLabels["You dont have enough credits for sending Message"];
            $alert['type'] = 'danger';
        }*/
        return Redirect::route('company.user')->with('alert', $alert);
    }

    public function asyncAddStamp() {
        $userId = Input::get('user_id');
        CommonFunctionModel::addConsumer(Session::get('company_id'), $userId, 1);
        return Response::json(['result' => 'success', 'msg' => $this->languageLabels['Stamp has been added successfully.']], 200);
    }

    public function asyncAutoCompleteEmail() {
        $query = Input::get('query');
        $users = UserModel::where('email', 'like', '%' . $query . '%')->take(5)->get();
        $results = [];
        foreach ($users as $user) {
            $results[] = ["email" => $user->email, "name2" => $user->name, "phone" => $user->phone,];
        }
        return Response::json($results, 200);
    }

}
