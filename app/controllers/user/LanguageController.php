<?php

namespace User;

use Illuminate\Routing\Controllers\Controller;
use View,
    Input,
    Redirect,
    Session,
    Validator,
    Response,
    Request,
    Mail;
use SiteLanguage;

class LanguageController extends \BaseController {

    public function chooser($slug) {
        Session::set('locale', $slug);
        return Redirect::back();
    }

}

?>