<?php

namespace Admin;

use Illuminate\Routing\Controllers\Controller;
use View,
    Input,
    Redirect,
    Session,
    Validator;
use DB;
use User as UserModel;
use SiteLanguage;

class UserController extends \BaseController {

    public function index() {
        $param['users'] = UserModel::paginate(PAGINATION_SIZE);
        $param['pageNo'] = 2;
        if ($alert = Session::get('alert')) {
            $param['alert'] = $alert;
        }

        return View::make('admin.user.index')->with($param)->with('siteLanguage', $this->siteLanguage)->with('langLbl', $this->languageLabels)
                        ->with('currentLanguage', $this->currentLanguage);
    }

    public function create() {
        $param['pageNo'] = 2;
        return View::make('admin.user.create')->with($param)->with('siteLanguage', $this->siteLanguage)->with('langLbl', $this->languageLabels)
                        ->with('currentLanguage', $this->currentLanguage);
    }

    public function edit($id) {
        $param['pageNo'] = 2;
        $param['user'] = UserModel::find($id);

        return View::make('admin.user.edit')->with($param)->with('siteLanguage', $this->siteLanguage)->with('langLbl', $this->languageLabels)
                        ->with('currentLanguage', $this->currentLanguage);
    }

    public function unblock($id) {
        $param['users'] = UserModel::paginate(PAGINATION_SIZE);
        DB::table('user')->where('id', $id)->update(array('suspend' => 1));
        $alert['msg'] = $this->languageLabels['user unblocked'];
        $alert['type'] = 'success';
        return Redirect::route('admin.user')->with('alert', $alert);
    }

    public function block($id) {
        $param['users'] = UserModel::paginate(PAGINATION_SIZE);
        DB::table('user')->where('id', $id)->update(array('suspend' => 0));
        $alert['msg'] = $this->languageLabels['user blocked'];
        $alert['type'] = 'success';
        return Redirect::route('admin.user')->with('alert', $alert);
    }

    public function store() {

        $rules = ['email' => 'required|email',
            'name' => 'required',
        ];
        $validator = Validator::make(Input::all(), $rules);

        if ($validator->fails()) {
            return Redirect::back()
                            ->withErrors($validator)
                            ->withInput();
        } else {
            if (Input::has('user_id')) {
                $id = Input::get('user_id');
                $user = UserModel::find($id);
            } else {
                $user = new UserModel;
                $user->photo = DEFAULT_PHOTO;

                $user->token = strtoupper(str_random(6));
                $user->salt = str_random(8);
                $user->is_active = TRUE;
            }

            if (Input::hasFile('photo')) {
                $filename = str_random(24) . "." . Input::file('photo')->getClientOriginalExtension();
                Input::file('photo')->move(ABS_USER_PATH, $filename);
                $user->photo = $filename;
            }
            foreach ($this->siteLanguage as $key => $value) {
                $nameCtrl = 'name' . $value;
                $user->$nameCtrl = Input::get($nameCtrl);
            }
            $user->email = Input::get('email');
            $user->phone = Input::get('phone');

            if (Input::has('password')) {
                $user->secure_key = md5($user->salt . Input::get('password'));
            }
            $user->save();

            $alert['msg'] = $this->languageLabels['User has been saved successfully'];
            $alert['type'] = 'success';

            return Redirect::route('admin.user')->with('alert', $alert);
        }
    }

    public function delete($id) {
        try {
            UserModel::find($id)->delete();

            $alert['msg'] = $this->languageLabels['User has been deleted successfully'];
            $alert['type'] = 'success';
        } catch (\Exception $ex) {
            $alert['msg'] = $this->languageLabels['This user has been already used'];
            $alert['type'] = 'danger';
        }

        return Redirect::route('admin.user')->with('alert', $alert);
    }

}
