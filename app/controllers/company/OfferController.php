<?php

namespace Company;

use Illuminate\Routing\Controllers\Controller;
use View,
    Input,
    Redirect,
    Session,
    DB,
    Validator;
use Offer as OfferModel,
    UserOffer as UserOfferModel;
use Website as WebsiteModel;    
use SiteLanguage;

class OfferController extends \BaseController {

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
        $param['pageNo'] = 7;
        $param['purchaseOffers'] = OfferModel::where('company_id', Session::get('company_id'))->purchase()->paginate(PAGINATION_SIZE);
        $param['activityOffers'] = OfferModel::where('company_id', Session::get('company_id'))->activity()->paginate(PAGINATION_SIZE);
        if ($alert = Session::get('alert')) {
            $param['alert'] = $alert;
        }

        return View::make('company.offer.index')->with($param)->with('siteLanguage', $this->siteLanguage)->with('langLbl', $this->languageLabels)
                        ->with('currentLanguage', $this->currentLanguage);
    }

    public function createPurchase() {
        $param['pageNo'] = 7;
        return View::make('company.offer.createPurchase')->with($param)->with('siteLanguage', $this->siteLanguage)->with('langLbl', $this->languageLabels)
                        ->with('currentLanguage', $this->currentLanguage);
    }

    public function editPurchase($id) {
        $param['pageNo'] = 7;
        $param['offer'] = OfferModel::find($id);
        return View::make('company.offer.editPurchase')->with($param)->with('siteLanguage', $this->siteLanguage)->with('langLbl', $this->languageLabels)
                        ->with('currentLanguage', $this->currentLanguage);
    }

    public function createActivity() {
        $param['pageNo'] = 7;
        return View::make('company.offer.createActivity')->with($param)->with('siteLanguage', $this->siteLanguage)->with('langLbl', $this->languageLabels)
                        ->with('currentLanguage', $this->currentLanguage);
    }

    public function editActivity($id) {
        $param['pageNo'] = 7;
        $param['offer'] = OfferModel::find($id);
        return View::make('company.offer.editActivity')->with($param)->with('siteLanguage', $this->siteLanguage)->with('langLbl', $this->languageLabels)
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
            if (Input::has('offer_id')) {
                $id = Input::get('offer_id');
                $offer = OfferModel::find($id);
            } else {
                $offer = new OfferModel;
                if (!Input::hasFile('photo')) {
                    $offer->photo = DEFAULT_PHOTO;
                }
            }
            if (Input::hasFile('photo')) {
                $filename = str_random(24) . "." . Input::file('photo')->getClientOriginalExtension();
                Input::file('photo')->move(ABS_OFFER_PATH, $filename);
                $offer->photo = $filename;
            }

            foreach ($this->siteLanguage as $key => $value) {
                $nameCtrl = 'name' . $value;
                $descriptionCtrl = 'description' . $value;
                $offer->$nameCtrl = Input::get($nameCtrl);
                $offer->$descriptionCtrl = Input::get($descriptionCtrl);
            }

            $offer->company_id = Session::get('company_id');

            if (Input::get('price') != '')
                $offer->price = Input::get('price');
            $offer->expire_at = Input::has('expire_at') ? Input::get('expire_at') : '';
            $offer->is_review = Input::get('is_review');
            $offer->save();

            $alert['msg'] = $this->languageLabels['Offer has been saved successfully'];
            $alert['type'] = 'success';

            return Redirect::route('company.offer')->with('alert', $alert);
        }
    }

    public function delete($id) {
        try {
            OfferModel::find($id)->delete();
            $alert['msg'] = $this->languageLabels['Offer has been deleted successfully'];
            $alert['type'] = 'success';
        } catch (\Exception $ex) {
            $alert['msg'] = $this->languageLabels['This offer has been already used'];
            $alert['type'] = 'danger';
        }
        return Redirect::route('company.offer')->with('alert', $alert);
    }

    public function sold($id) {
        $param['pageNo'] = 7;
        $param['soldOffers'] = UserOfferModel::where('offer_id', $id)->paginate(PAGINATION_SIZE);
        return View::make('company.offer.sold')->with($param)->with('siteLanguage', $this->siteLanguage)->with('langLbl', $this->languageLabels)
                        ->with('currentLanguage', $this->currentLanguage);
    }

}
