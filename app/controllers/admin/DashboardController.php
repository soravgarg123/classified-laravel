<?php

namespace Admin;

use Illuminate\Routing\Controllers\Controller;
use View,
    Input,
    Redirect,
    Session,
    Validator,
    DB;
use SiteLanguage;

class DashboardController extends \BaseController {

    public function index() {
        $param['pageNo'] = 1;
        return View::make('admin.dashboard.index')->with($param)->with('siteLanguage', $this->siteLanguage)->with('langLbl', $this->languageLabels)
                        ->with('currentLanguage', $this->currentLanguage);
    }

}
