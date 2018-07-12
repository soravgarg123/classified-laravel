<?php

namespace Admin;

use Illuminate\Routing\Controllers\Controller;
use View,
    Input,
    Redirect,
    Session,
    Mail,
    Validator;
use DB;
use User as UserModel;
use Company as CompanyModel;
use SiteLanguage;

class MessageController extends \BaseController {


	public function professionalmsg()
	{
        $param['companies'] = CompanyModel::paginate(PAGINATION_SIZE);
        $param['pageNo'] = 13;
        if ($alert = Session::get('alert')) 
        {
            $param['alert'] = $alert;
        }

        return View::make('admin.msg.professionalmsg')->with($param)->with('siteLanguage', $this->siteLanguage)->with('langLbl', $this->languageLabels)
                        ->with('currentLanguage', $this->currentLanguage);


	}
  //===============================================================================
    public function generalmsg()
    {
        $param['users'] = UserModel::paginate(PAGINATION_SIZE);
        $param['pageNo'] =14;
        if ($alert = Session::get('alert'))
         {
            $param['alert'] = $alert;
         }

        return View::make('admin.msg.generalmsg')->with($param)->with('siteLanguage', $this->siteLanguage)->with('langLbl', $this->languageLabels)
                        ->with('currentLanguage', $this->currentLanguage);

          
    }	
 //===============================================================================
   public function usermessage()
   {
      $rules = [ 'allmessage'    => 'required' ];
        $messages = array(
            'allmessage.required' => 'Required message field'
        );
        $validator = Validator::make(Input::all(), $rules, $messages);
        if ($validator->fails()) {
            return Redirect::back()
                            ->withErrors($validator)
                            ->withInput();
        }
      $data=$_POST;
      $emails = Input::get('userMail');
      $all=array();
      $all=explode(',',$emails[0]);
       for($i=0;$i<count($all);$i++)
       {
            $email = $all[$i];
            $param = [ 'email' => $email,
                       'name' => 'keshav',
                       'message1' => $data['allmessage']
                     ];
            $name = REPLY_NAME;
            $message1 = $data['allmessage'];
            $currentLang = $_COOKIE['current_lang'];
            if ($currentLang == 'es') 
            {
                Mail::send('email.usermessage_' . $currentLang, $param, function($message) use ($email,$name,$message1) {
                            $message->from(REPLY_EMAIL, REPLY_NAME);
                            $message->to($email)
                                    ->subject('Contactar con administración');
                        });
            } 
            elseif ($currentLang == 'it')
             {
                Mail::send('email.usermessage_' . $currentLang, $param, function($message) use ($email,$name,$message1) {
                            $message->from(REPLY_EMAIL,REPLY_NAME);
                            $message->to($email)
                                    ->subject("Contattare Admin");
                          });
            } else 
            {
                Mail::send('email.usermessage_'. $currentLang, $param, function($message) use ($email,$name,$message1)
                 {
                            $message->from(REPLY_EMAIL, REPLY_NAME);
                            $message->to($email)
                                    ->subject("Admin Contact");
                 }
                 );
            }
            $alert['msg'] = $this->languageLabels['Contact Success'];
            $alert['type'] = 'success';
            return Redirect::route('admin.generalmsg')->with('alert', $alert);
      }
       
    }   
     //========================================================================
    public function profes_msg()
    {
        $rules = [ 'allmessage'    => 'required' ];
        $messages = array(
            'allmessage.required' => 'Required message field'
        );
        $validator = Validator::make(Input::all(), $rules, $messages);
        if ($validator->fails()) {
            return Redirect::back()
                            ->withErrors($validator)
                            ->withInput();
        }
      $data=$_POST;
      $emails = Input::get('userMail');
      $all=array();
      $all=explode(',',$emails[0]);
       for($i=0;$i<count($all);$i++)
       {
            $email = $all[$i];
            $param = [ 
                       'email' => $email,
                       'name' => 'User',
                       'message1' => $data['allmessage']
                     ];

            
            $name = REPLY_NAME;
            $message1 = $data['allmessage'];
            $currentLang = $_COOKIE['current_lang'];
            if ($currentLang == 'es') 
            {
                Mail::send('email.professionalmsg_' . $currentLang, $param, function($message) use ($email,$name,$message1) {
                              $message->from(REPLY_EMAIL, REPLY_NAME);
                              $message->to($email)
                                    ->subject('Contactar con administración');
                        });
            } elseif ($currentLang == 'it')
             {
                Mail::send('email.professionalmsg_' . $currentLang, $param, function($message) use ($email,$name,$message1) 
                {
                            $message->from(REPLY_EMAIL, REPLY_NAME);
                            $message->to($email)
                                    ->subject("Contattare Admin");
                        });
            } else 
            {
               Mail::send('email.professionalmsg_' . $currentLang , $param, function($message) use ($email,$name,$message1)
                {
                            $message->from(REPLY_EMAIL, REPLY_NAME);
                            $message->to($email)
                                    ->subject("Admin Contact");
                }
                );
            }
            $alert['msg'] = $this->languageLabels['Contact Success'];
            $alert['type'] = 'success';
            return Redirect::route('admin.professionalmsg')->with('alert', $alert);
      }     
    }

 //========== ************** ============ ****************   
}



