<?php

namespace User;

use Illuminate\Routing\Controllers\Controller;
use View,
    Input,
    Redirect,
    Session,
    DB,
    Validator,
    Response,
    Request,
    Mail;
use Feedback as FeedbackModel;
use \DirectoryService\Models\Message as MessageModel;
use User as UserModel;
use City as CityModel;
use Category as CategoryModel;
use Pclass as PclassModel;
use Office as OfficeModel;
use Chat as ChatModel;
use Website as WebsiteModel;
use SiteLanguage;

class MessageController extends \BaseController {

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
        $param['categories'] = CategoryModel::orderBy('name' . $this->currentLanguage, 'ASC')->get();
        $param['cities'] = CityModel::all();
        $param['classes'] = PclassModel::all();
        $param['officies'] = OfficeModel::all();
        $param['pageNo'] = 4;
        $userId = Session::get('user_id');
        $chat_user_id = "'"."u".$userId."'";
        $param['user_detail'] = DB::table('user')->where('id', $userId)->get();
        $param['messages'] = DB::select("SELECT (
                                        CASE WHEN (
                                        ds_chat.`from` =  $chat_user_id
                                        )
                                        THEN SUBSTRING( ds_chat.`to` , 2 ) 
                                        ELSE SUBSTRING( ds_chat.`from` , 2 ) 
                                        END
                                        ) AS user_id, IF( (

                                        CASE WHEN (
                                        ds_chat.`from` =  $chat_user_id
                                        )
                                        THEN SUBSTRING( ds_chat.`to` , 1, 1 ) 
                                        ELSE SUBSTRING( ds_chat.`from` , 1, 1 ) 
                                        END ) =  'u', (

                                        SELECT name
                                        FROM ds_user
                                        WHERE ds_user.id = user_id
                                        ), (

                                        SELECT name
                                        FROM ds_company
                                        WHERE ds_company.id = user_id
                                        )
                                        ) AS user_name, IF( (

                                        CASE WHEN (
                                        ds_chat.`from` =  $chat_user_id
                                        )
                                        THEN SUBSTRING( ds_chat.`to` , 1, 1 ) 
                                        ELSE SUBSTRING( ds_chat.`from` , 1, 1 ) 
                                        END ) =  'u', (

                                        SELECT photo
                                        FROM ds_user
                                        WHERE ds_user.id = user_id
                                        ), (

                                        SELECT photo
                                        FROM ds_company
                                        WHERE ds_company.id = user_id
                                        )
                                        ) AS photo, ds_chat . * 
                                        FROM ds_chat
                                        WHERE (
                                        ds_chat.`from` =  $chat_user_id
                                        )
                                        OR (
                                        ds_chat.to =  $chat_user_id
                                        )
                                        ORDER BY ds_chat.id DESC");
        return View::make('user.message.index')->with($param)->with('siteLanguage', $this->siteLanguage)->with('langLbl', $this->languageLabels)
                        ->with('currentLanguage', $this->currentLanguage);
    }

    public function detail($id) {
        $param['categories'] = CategoryModel::orderBy('name' . $this->currentLanguage, 'ASC')->get();
        $param['cities'] = CityModel::all();
        $param['classes'] = PclassModel::all();
        $param['officies'] = OfficeModel::all();
        $param['pageNo'] = 4;
        $param['feedback'] = FeedbackModel::find($id);

        if ($alert = Session::get('alert')) {
            $param['alert'] = $alert;
        }

        return View::make('user.message.detail')->with($param)->with('siteLanguage', $this->siteLanguage)->with('langLbl', $this->languageLabels)
                        ->with('currentLanguage', $this->currentLanguage);
    }

    public function delete($id) {
        try {
            ChatModel::find($id)->delete();
            $alert['msg'] = $this->languageLabels['Office has been deleted successfully'];
            $alert['type'] = 'success';
        } catch (\Exception $ex) {
            $alert['msg'] = $this->languageLabels['This office has been already used'];
            $alert['type'] = 'danger';
        }
        return Redirect::route('user.messages')->with('alert', $alert);
    }

    public function doSend() {
        $feedbackId = Input::get('feedback_id');
        $description = Input::get('description');
        $feedback = FeedbackModel::find($feedbackId);

        $message = new MessageModel;
        $message->feedback_id = $feedbackId;
        $message->company_id = $feedback->store->company->id;
        $message->user_id = $feedback->user_id;
        $message->description = $description;
        $message->is_company_sent = FALSE;
        $message->save();

        $feedback->status = 'ST04';
        $feedback->save();

        $alert['msg'] = $this->languageLabels['Message has been sent successfully'];
        $alert['type'] = 'success';

        return Redirect::route('user.message.detail', $feedbackId)->with('alert', $alert);
    }

}
