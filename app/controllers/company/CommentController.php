<?php

namespace Company;

use Illuminate\Routing\Controllers\Controller;
use View,
    Input,
    Redirect,
    DB,
    Session,
    Validator;
use Comment as CommentModel;
use Website as WebsiteModel;
use SiteLanguage;

class CommentController extends \BaseController {

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
        $param['comments'] = CommentModel::where('company_id', Session::get('company_id'))->orderBy('id', 'DESC')->paginate(PAGINATION_SIZE);
        $param['pageNo'] = 4;
        if ($alert = Session::get('alert')) {
            $param['alert'] = $alert;
        }

        return View::make('company.comment.index')->with($param)->with('siteLanguage', $this->siteLanguage)->with('langLbl', $this->languageLabels)
                        ->with('currentLanguage', $this->currentLanguage);
    }

    public function delete($id) {
        try {
            CommentModel::find($id)->delete();
            $alert['msg'] = $this->languageLabels['Comment has been deleted successfully'];
            $alert['type'] = 'success';
        } catch (\Exception $ex) {
            $alert['msg'] = $this->languageLabels['This comment has been already used'];
            $alert['type'] = 'danger';
        }

        return Redirect::route('company.comment')->with('alert', $alert);
    }

}
