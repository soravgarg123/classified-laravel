<?php

namespace Company;

use Illuminate\Routing\Controllers\Controller;
use View,
    Input,
    Redirect,
    Session,
    Validator,
    Response,
    DB,
    Request,
    Mail;
use Feedback as FeedbackModel;
use \DirectoryService\Models\Message as MessageModel;
use Company as CompanyModel;
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
        $param['pageNo'] = 14;
        $compnayid = Session::get('company_id');
        $chat_company_id = "'"."p".$compnayid."'";
        $param['company_detail'] = DB::table('company')->where('id', $compnayid)->get();
        $param['messages'] = DB::select("SELECT (
                                        CASE WHEN (
                                        ds_chat.`from` =  $chat_company_id
                                        )
                                        THEN SUBSTRING( ds_chat.`to` , 2 ) 
                                        ELSE SUBSTRING( ds_chat.`from` , 2 ) 
                                        END
                                        ) AS user_id, IF( (

                                        CASE WHEN (
                                        ds_chat.`from` =  $chat_company_id
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
                                        ds_chat.`from` =  $chat_company_id
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
                                        ds_chat.`from` =  $chat_company_id
                                        )
                                        OR (
                                        ds_chat.to =  $chat_company_id
                                        )
                                        ORDER BY ds_chat.id DESC");
        return View::make('company.message.index')->with($param)->with('siteLanguage', $this->siteLanguage)->with('langLbl', $this->languageLabels)
                        ->with('currentLanguage', $this->currentLanguage);
    }

    public function detail($id) {
        $param['pageNo'] = 14;
        $param['feedback'] = FeedbackModel::find($id);
        if ($alert = Session::get('alert')) {
            $param['alert'] = $alert;
        }
        return View::make('company.message.detail')->with($param)->with('siteLanguage', $this->siteLanguage)->with('langLbl', $this->languageLabels)
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
        return Redirect::route('company.message')->with('alert', $alert);
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
        $message->is_company_sent = TRUE;
        $message->save();

        $feedback->status = 'ST03';
        $feedback->save();

        $company = CompanyModel::find(Session::get('company_id'));
        $company->count_email = $company->count_email - 1;
        $company->save();

        $data = [ 'company_name' => $company->name,
            'description' => $description,
        ];

        $info = [ 'reply_name' => REPLY_NAME,
            'reply_email' => REPLY_EMAIL,
            'email' => $feedback->user->email,
            'name' => $feedback->user->name,
            'subject' => SITE_NAME,
        ];

        $currentLang = $_COOKIE['current_lang'];
        if ($currentLang == 'es') {
            Mail::send('email.message_' . $currentLang, $data, function($message) use ($info) {
                        $message->from($info['reply_email'], $info['reply_name']);
                        $message->to($info['email'], $info['name'])
                                ->subject($info['subject']);
                    });
        } elseif ($currentLang == 'it') {
            Mail::send('email.message_' . $currentLang, $data, function($message) use ($info) {
                        $message->from($info['reply_email'], $info['reply_name']);
                        $message->to($info['email'], $info['name'])
                                ->subject($info['subject']);
                    });
        } else {
            Mail::send('email.message', $data, function($message) use ($info) {
                        $message->from($info['reply_email'], $info['reply_name']);
                        $message->to($info['email'], $info['name'])
                                ->subject($info['subject']);
                    });
        }

        $alert['msg'] = $this->languageLabels['Message has been sent successfully'];
        $alert['type'] = 'success';

        return Redirect::route('company.message.detail', $feedbackId)->with('alert', $alert);
    }

}
