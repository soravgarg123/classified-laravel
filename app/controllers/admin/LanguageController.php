<?php

namespace Admin;

use Illuminate\Routing\Controllers\Controller;
use View,
    Input,
    Redirect,
    Session,
    Validator,
    Response,
    Request,
    Mail;

class LanguageController extends \BaseController {

    public function chooser() {
        return \LanguageLabel::chooser();
    }

}

?>
