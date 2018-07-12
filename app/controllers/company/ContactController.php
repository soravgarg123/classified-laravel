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
use Company as CompanyModel;
use Website as WebsiteModel;
use SiteLanguage;

class ContactController extends \BaseController {

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
        $param['pageNo'] = 15;
        $param['company'] = CompanyModel::find(Session::get('company_id'));
        return View::make('company.contact.index')->with($param)->with('siteLanguage', $this->siteLanguage)->with('langLbl', $this->languageLabels)
                        ->with('currentLanguage', $this->currentLanguage);
    }

}
