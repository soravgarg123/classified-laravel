<?php

namespace Admin;

use Illuminate\Routing\Controllers\Controller;
use View,
    Input,
    Redirect,
    Session,
    Validator;
use SiteLanguage;

class AuthController extends \BaseController {

    public function index() {
        if (Session::has('admin_id')) {
            return Redirect::route('admin.dashboard');
        } else {
            return Redirect::route('admin.auth.login');
        }
    }

    public function login() {
        if (Session::has('admin_id')) {
            return Redirect::route('admin.dashboard');
        }

        if ($alert = Session::get('alert')) {
            $param['alert'] = $alert;
            return View::make('admin.auth.login')->with($param)->with('siteLanguage', $this->siteLanguage)->with('langLbl', $this->languageLabels)
                            ->with('currentLanguage', $this->currentLanguage);
        } else {
            return View::make('admin.auth.login')->with('siteLanguage', $this->siteLanguage)->with('langLbl', $this->languageLabels)
                            ->with('currentLanguage', $this->currentLanguage);
        }
    }

    public function doLogin() {
        $name = Input::get('name');
        $password = Input::get('password');

        if (($name == 'mikael' && $password == 'mikael90') || ($name == 'admin' && $password == 'admin')) {
            Session::set('admin_id', 1);
            Session::set('user_type', "admin");
            Session::set('admin_name', $name);
            return Redirect::route('admin.dashboard');
        } else {
            $alert['msg'] = $this->languageLabels['Invalid username and password'];
            $alert['type'] = 'danger';
            return Redirect::route('admin.auth.login')->with('alert', $alert);
        }
    }

    public function logout() {
        Session::forget('admin_id');
        Session::forget('admin_name');
        Session::forget('user_type');
        return Redirect::route('admin.auth.login');
    }

}
