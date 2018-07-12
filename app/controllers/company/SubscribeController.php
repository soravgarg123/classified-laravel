<?php

namespace Company;

use Illuminate\Routing\Controllers\Controller;
use View,
    Input,
    Redirect,
    Session,
    DB,
    Validator,
    Response,
    Request,
    Log;
use Company as CompanyModel,
    Plan as PlanModel,
    Subscribe as SubscribeModel;
use Website as WebsiteModel;    
use Stripe;
use SiteLanguage;

class SubscribeController extends \BaseController {

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
        $param['pageNo'] = 12;
        $param['plans'] = PlanModel::all();
        $param['company'] = CompanyModel::find(Session::get('company_id'));
        if ($alert = Session::get('alert')) {
            $param['alert'] = $alert;
        }
        return View::make('company.subscribe.index')->with($param)->with('siteLanguage', $this->siteLanguage)->with('langLbl', $this->languageLabels)
                        ->with('currentLanguage', $this->currentLanguage);
    }

    public function success() {
        $param['pageNo'] = 12;
        if ($alert = Session::get('alert')) {
            $param['alert'] = $alert;
        }
        return View::make('company.subscribe.success')->with($param)->with('siteLanguage', $this->siteLanguage)->with('langLbl', $this->languageLabels)
                        ->with('currentLanguage', $this->currentLanguage);
    }

    public function create($planCode) {
        $stripeToken = Input::get('stripeToken');
        $stripeTokenType = Input::get('stripeTokenType');
        $stripeEmail = Input::get('stripeEmail');

        \Stripe\Stripe::setApiKey(STRIPE_SECRET_KEY);

        $customer = \Stripe\Customer::create(array(
                    "source" => $stripeToken,
                    "plan" => $planCode,
                    "email" => $stripeEmail
        ));

        $plan = PlanModel::where('code', $planCode)->firstOrFail();

        $subscribe = new SubscribeModel;
        $subscribe->company_id = Session::get('company_id');
        $subscribe->plan_id = $plan->id;
        $subscribe->customer_code = $customer->id;
        $subscribe->price = $plan->price;
        $subscribe->save();

        $alert['msg'] = $this->languageLabels['You subscribed successfully'];
        $alert['type'] = 'success';

        return Redirect::route('company.subscribe.success')->with('alert', $alert);
    }

    public function cancel() {
        $subscribe = SubscribeModel::where('company_id', Session::get('company_id'))->orderBy('id', 'DESC')->take(1)->firstOrFail();

        \Stripe\Stripe::setApiKey(STRIPE_SECRET_KEY);

        $customer = \Stripe\Customer::retrieve($subscribe->customer_code);
        $subscription = $customer->subscriptions->retrieve($subscribe->code);
        $subscription->cancel();

        $alert['msg'] = $this->languageLabels['Subscribed cancelled successfully'];
        $alert['type'] = 'danger';

        return Redirect::route('company.subscribe.success')->with('alert', $alert);
    }

    public function webhook() {
        $input = @file_get_contents("php://input");
        $result = json_decode($input);

        if ($result->type == 'customer.subscription.created') {
            $customerCode = $result->data->object->customer;
            $subscribe = SubscribeModel::where('customer_code', $customerCode)->orderBy('id', 'DESC')->take(1)->firstOrFail();
            $subscribe->code = $result->data->object->id;
            $subscribe->save();

            $plan = PlanModel::find($subscribe->plan_id);

            $company = CompanyModel::find($subscribe->company_id);
            $company->plan_id = $subscribe->plan_id;
            $company->count_email += $plan->count_email;
            $company->count_sms += $plan->count_sms;
            $company->save();
        } elseif ($result->type == 'customer.subscription.deleted') {
            $customerCode = $result->data->object->customer;
            $subscribe = SubscribeModel::where('customer_code', $customerCode)->orderBy('id', 'DESC')->take(1)->firstOrFail();

            $company = CompanyModel::find($subscribe->company_id);
            $company->plan_id = null;
            $company->save();
        }

        http_response_code(200);
    }

}
