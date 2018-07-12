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
    Mail;
use User as UserModel;
use Category as CategoryModel,
    City as CityModel;
use Feedback as FeedbackModel,
    ReviewPhoto as ReviewPhotoModel;
use Store as StoreModel;
use Company as CompanyModel;
use Consumer as ConsumerModel;
use CommonFunction as CommonFunctionModel;
use WorldOfProfessional as WorldOfProfessionalModel;
use Website as WebsiteModel;
use Cart as CartModel,
    Chat as ChatModel;
use Office as OfficeModel;
use Stoffice as StofficeModel;
use Pclass as PclassModel;
use ProfSubClass as ProfSubClassModel;
use Languages as LanguagesModel;  
use PostRequest as PostRequestModel;
use Post as PostModel,
    PostCategory as PostCategoryModel;
use SiteLanguage;

class PostRequestController extends \BaseController {

    public function __construct()
    {
        $website = DB::table('website')->get();
        $type = $website[0]->value;
        if($type == "offline"){
           header('Location: '.MY_BASE_URL.'/maintenance'); 
        }
        parent::__construct();
    }

    public function index()
    {
        $param['pageNo'] = 33;
        $companyId = Session::get('company_id');
        if ($alert = Session::get('alert')) {
            $param['alert'] = $alert;
        }
        $allSubCatId = DB::table('prof_sub_class')->where('company_id', $companyId)->lists('sub_class_id');
        $param['requests'] = DB::table('post_request')->whereIn('sub_category', $allSubCatId)->get();
        return View::make('company.request.index')->with($param)->with('siteLanguage', $this->siteLanguage)->with('langLbl', $this->languageLabels)
                        ->with('currentLanguage', $this->currentLanguage);
    }

    public function delete($id) {
        $subcatIdArr = DB::table('post_request')->where('id', $id)->get();
        $user_details = DB::table('company')->where('id', Session::get('company_id'))->get();
        if(!empty($subcatIdArr)){
            $subcatId = $subcatIdArr[0]->sub_category;
        }else{
            $subcatId = 0;
        }
        PostRequestModel::find($id)->delete();
        $allCompanyId = DB::table('prof_sub_class')->where('sub_class_id', $subcatId)->lists('company_id');
            if(!empty($allCompanyId)){
                $allCompanyEmails = DB::table('company')->whereIn('id', $allCompanyId)->get();
                if(!empty($allCompanyEmails)){
                    $currentLang = $_COOKIE['current_lang'];
                    foreach($allCompanyEmails as $cd) {
                    $param = [
                                'company_name' => $cd->name,
                                'title'        => $subcatIdArr[0]->title,
                                'description'  => $subcatIdArr[0]->description,
                                'budget'       => $subcatIdArr[0]->budget,
                                'expiry_date'  => $subcatIdArr[0]->expiry_date,
                                'request_creator_name' => $user_details[0]->name
                             ];

                    $info = [   'reply_name' => REPLY_NAME,
                                'reply_email' => NOREPLY_EMAIL,
                                'email' => $cd->email,
                                'name' =>  $cd->name,
                                'subject' => $user_details[0]->name." ".$this->languageLabels['deleted a Request by DoveCercare!'],
                            ];
                    
                    if ($currentLang == 'es') {
                        Mail::send('email.post_request_delete_' . $currentLang, $param, function($message) use ($info) {
                                    $message->from($info['reply_email'], $info['reply_name']);
                                    $message->to($info['email'], $info['name'])
                                            ->subject($info['subject']);
                                });
                    } elseif ($currentLang == 'it') {
                        Mail::send('email.post_request_delete_' . $currentLang, $param, function($message) use ($info) {
                                    $message->from($info['reply_email'], $info['reply_name']);
                                    $message->to($info['email'], $info['name'])
                                            ->subject($info['subject']);
                                });
                    } else {
                        Mail::send('email.post_request_delete_'. $currentLang, $param, function($message) use ($info) {
                                    $message->from($info['reply_email'], $info['reply_name']);
                                    $message->to($info['email'], $info['name'])
                                            ->subject($info['subject']);
                                });
                    }
                  }
                }
              }
            $alert['msg'] = $this->languageLabels['Success'];
            $alert['type'] = 'success';
            return Redirect::route('company.request')->with('alert', $alert);
    }

    public function status($id,$status){
        $subcatIdArr = DB::table('post_request')->where('id', $id)->get();
        $user_details = DB::table('company')->where('id', Session::get('company_id'))->get();
        if(!empty($subcatIdArr)){
            $subcatId = $subcatIdArr[0]->sub_category;
        }else{
            $subcatId = 0;
        }
        DB::table('post_request')->where('id', $id)->update(array('status' => $status));
        $allCompanyId = DB::table('prof_sub_class')->where('sub_class_id', $subcatId)->lists('company_id');
        if(!empty($allCompanyId)){
            $allCompanyEmails = DB::table('company')->whereIn('id', $allCompanyId)->get();
            if(!empty($allCompanyEmails)){
                $currentLang = $_COOKIE['current_lang'];
                switch($subcatIdArr[0]->status){
                    case "0":
                        $request_status = $this->languageLabels['Closed'];
                        break;
                    case "1":
                        $request_status =  $this->languageLabels['Re-Open'];
                        break;
                    case "2":
                        $request_status =  $this->languageLabels['Pause'];
                        break;
                    default:
                        $request_status =  $this->languageLabels['None'];
                 }

                foreach($allCompanyEmails as $cd) {
                $param = [
                            'company_name' => $cd->name,
                            'title'        => $subcatIdArr[0]->title,
                            'description'  => $subcatIdArr[0]->description,
                            'budget'       => $subcatIdArr[0]->budget,
                            'expiry_date'  => $subcatIdArr[0]->expiry_date,
                            'status'       => $request_status,
                            'request_creator_name' => $user_details[0]->name
                         ];

                $info = [   'reply_name' => REPLY_NAME,
                            'reply_email' => NOREPLY_EMAIL,
                            'email' => $cd->email,
                            'name' =>  $cd->name,
                            'subject' => $user_details[0]->name." ".$this->languageLabels['changed status of Request by']."DoveCercare!",
                        ];
                
                if ($currentLang == 'es') {
                    Mail::send('email.post_request_status_' . $currentLang, $param, function($message) use ($info) {
                                $message->from($info['reply_email'], $info['reply_name']);
                                $message->to($info['email'], $info['name'])
                                        ->subject($info['subject']);
                            });
                } elseif ($currentLang == 'it') {
                    Mail::send('email.post_request_status_' . $currentLang, $param, function($message) use ($info) {
                                $message->from($info['reply_email'], $info['reply_name']);
                                $message->to($info['email'], $info['name'])
                                        ->subject($info['subject']);
                            });
                } else {
                    Mail::send('email.post_request_status_'. $currentLang, $param, function($message) use ($info) {
                                $message->from($info['reply_email'], $info['reply_name']);
                                $message->to($info['email'], $info['name'])
                                        ->subject($info['subject']);
                            });
                }
              }
            }
          }
        $alert['msg'] = $this->languageLabels['Success'];
        $alert['type'] = 'success';
        return Redirect::route('company.request')->with('alert', $alert);
    }



}
?>