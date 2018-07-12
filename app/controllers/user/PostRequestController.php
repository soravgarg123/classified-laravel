<?php

namespace User;

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

    public function index(){
        $user_id = Session::get('user_id');
        $param['redirect'] = Input::has('redirect') ? Input::get('redirect') : '';
        $param['classes'] = PclassModel::all();
        $param['officies'] = OfficeModel::all();
        $param['categories'] = CategoryModel::orderBy('name' . $this->currentLanguage, 'ASC')->get();
        $param['cities'] = CityModel::all();
        $param['languages'] = LanguagesModel::orderBy('name' . $this->currentLanguage, 'ASC')->get();
        $param['requests'] = DB::select('SELECT *,`pr`.`id` AS `request_id`,`pr`.`description` AS `request_description` FROM `ds_post_request` AS `pr` INNER JOIN `ds_sub_class` AS `sc` ON `sc`.`id` = `pr`.`sub_category` WHERE `pr`.`user_id` = '.$user_id.' ORDER BY `pr`.`id` DESC ');
        return View::make('user.request.index')->with($param)->with('siteLanguage', $this->siteLanguage)->with('langLbl', $this->languageLabels)
                        ->with('currentLanguage', $this->currentLanguage);
    }

    public function create() {
        $user_type = Session::get('user_type');
        if(empty($user_type) || $user_type == "admin"){
            $alert['msg'] = $this->languageLabels['you need to login'];
            $alert['type'] = 'danger';
            Session::set('login_required', 'required');
            return Redirect::route('user.home')->with('alert', $alert);
        }
        $param['redirect'] = Input::has('redirect') ? Input::get('redirect') : '';
        $param['classes'] = PclassModel::all();
        $param['officies'] = OfficeModel::all();
        $param['categories'] = CategoryModel::orderBy('name' . $this->currentLanguage, 'ASC')->get();
        $param['cities'] = CityModel::all();
        $param['languages'] = LanguagesModel::orderBy('name' . $this->currentLanguage, 'ASC')->get();
        return View::make('user.request.create')->with($param)->with('siteLanguage', $this->siteLanguage)->with('langLbl', $this->languageLabels)
                        ->with('currentLanguage', $this->currentLanguage);
    }  

    public function add()
    {
        $user_type = Session::get('user_type');
        $rules = [  'title' => 'required',
                    'sub_category' => 'required',
                    'days' => 'required|numeric|max:30',
                    'budget' => 'required|numeric|min:5',
                    'description' => 'required',
                ];

        $validator = Validator::make(Input::all(), $rules);

        if ($validator->fails()) {
            return Redirect::back()
                            ->withErrors($validator)
                            ->with($_POST)
                            ->withInput();
        } else {
                $days = Input::get('days');
                $expiry_date =  date('d/m/Y', strtotime("+".$days." days"));
                $postrequest = new PostRequestModel;
                if (Input::hasFile('file')) {
                    $filename = "request_".str_random(24) . "." . Input::file('file')->getClientOriginalExtension();
                    Input::file('file')->move(ABS_HOWITWORKS_PATH, $filename);
                    $postrequest->file = $filename;
                }
                if($user_type == "user") {
                    $postrequest->user_id = Session::get('user_id');
                    $user_details = UserModel::where('id', Session::get('user_id'))->get();
                }  
                if($user_type == "professional") {
                    $postrequest->company_id = Session::get('company_id');
                    $user_details = CompanyModel::where('id', Session::get('company_id'))->get();
                }
                $postrequest->title = Input::get('title');
                $postrequest->sub_category = Input::get('sub_category');
                $postrequest->days = Input::get('days');
                $postrequest->budget = Input::get('budget');
                $postrequest->expiry_date = $expiry_date;
                $postrequest->description = Input::get('description');
                $postrequest->status = 1;
                $postrequest->save();
                $LastInsertId = $postrequest->id;

                $subcatId = Input::get('sub_category');
                $allCompanyId = DB::table('prof_sub_class')->where('sub_class_id', $subcatId)->lists('company_id');
                if(!empty($allCompanyId)){
                    $allCompanyEmails = DB::table('company')->whereIn('id', $allCompanyId)->get();
                    if(!empty($allCompanyEmails)){
                        $currentLang = $_COOKIE['current_lang'];
                        foreach($allCompanyEmails as $cd) {

                        $param = [
                                    'company_name' => $cd->name,
                                    'title'        => Input::get('title'),
                                    'description'  => Input::get('description'),
                                    'budget'       => Input::get('budget'),
                                    'expiry_date'  => $expiry_date,
                                    'base_url'     => MY_BASE_URL,
                                    'insert_id'    => $LastInsertId,
                                    'request_creator_name' => $user_details[0]->name
                                 ];

                        $info = [   'reply_name' => REPLY_NAME,
                                    'reply_email' => NOREPLY_EMAIL,
                                    'email' => $cd->email,
                                    'name' =>  $cd->name,
                                    'subject' => $user_details[0]->name." ".$this->languageLabels['made a New Request by DoveCercare!'],
                                ];
                        
                        if ($currentLang == 'es') {
                            Mail::send('email.post_request_' . $currentLang, $param, function($message) use ($info) {
                                        $message->from($info['reply_email'], $info['reply_name']);
                                        $message->to($info['email'], $info['name'])
                                                ->subject($info['subject']);
                                    });
                        } elseif ($currentLang == 'it') {
                            Mail::send('email.post_request_' . $currentLang, $param, function($message) use ($info) {
                                        $message->from($info['reply_email'], $info['reply_name']);
                                        $message->to($info['email'], $info['name'])
                                                ->subject($info['subject']);
                                    });
                        } else {
                            Mail::send('email.post_request_'. $currentLang, $param, function($message) use ($info) {
                                        $message->from($info['reply_email'], $info['reply_name']);
                                        $message->to($info['email'], $info['name'])
                                                ->subject($info['subject']);
                                    });
                        }
                      }
                    }
                  }

                $alert['msg'] = $this->languageLabels['Your request successfully created'];
                $alert['type'] = 'success';
                Session::set('request_success', 'created');
                return Redirect::route('request.create')->with('alert', $alert);
        }   
    }

    public function delete($id) {
        $subcatIdArr = DB::table('post_request')->where('id', $id)->get();
        $user_details = DB::table('user')->where('id', Session::get('user_id'))->get();
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
            return Redirect::route('user.requests')->with('alert', $alert);
    }

    public function status($id,$status){
        $subcatIdArr = DB::table('post_request')->where('id', $id)->get();
        $user_details = DB::table('user')->where('id', Session::get('user_id'))->get();
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
        return Redirect::route('user.requests')->with('alert', $alert);
    }

    public function detail($id){
        $param['redirect'] = Input::has('redirect') ? Input::get('redirect') : '';
        $param['classes'] = PclassModel::all();
        $param['officies'] = OfficeModel::all();
        $param['categories'] = CategoryModel::orderBy('name' . $this->currentLanguage, 'ASC')->get();
        $param['cities'] = CityModel::all();
        $param['languages'] = LanguagesModel::orderBy('name' . $this->currentLanguage, 'ASC')->get();
        $param['requests'] = DB::select('SELECT *,`pr`.`id` AS `request_id`,`pr`.`description` AS `request_description` FROM `ds_post_request` AS `pr` INNER JOIN `ds_sub_class` AS `sc` ON `sc`.`id` = `pr`.`sub_category` WHERE `pr`.`id` = '.$id);
        return View::make('user.request.detail')->with($param)->with('siteLanguage', $this->siteLanguage)->with('langLbl', $this->languageLabels)
                        ->with('currentLanguage', $this->currentLanguage);
    }

    public function reply($id){
        $param['redirect'] = Input::has('redirect') ? Input::get('redirect') : '';
        $param['classes'] = PclassModel::all();
        $param['officies'] = OfficeModel::all();
        $param['categories'] = CategoryModel::orderBy('name' . $this->currentLanguage, 'ASC')->get();
        $param['cities'] = CityModel::all();
        $param['languages'] = LanguagesModel::orderBy('name' . $this->currentLanguage, 'ASC')->get();
        $param['requests'] = DB::select('SELECT *,`pr`.`id` AS `request_id`,`pr`.`description` AS `request_description` FROM `ds_post_request` AS `pr` INNER JOIN `ds_sub_class` AS `sc` ON `sc`.`id` = `pr`.`sub_category` WHERE `pr`.`id` = '.$id);
        return View::make('user.request.reply')->with($param)->with('siteLanguage', $this->siteLanguage)->with('langLbl', $this->languageLabels)
                        ->with('currentLanguage', $this->currentLanguage);
    }

    public function doReply()
    {
        $company_id = Session::get('company_id');
        if(empty($company_id)){
            $result['result'] = "error";
            $result['msg'] = $this->languageLabels["you need to login"];
            return Response::json($result, 200);
        }

        $live_user_details = DB::table('company')->where('id', $company_id)->get();
        $reply_msg = Input::get('msg');
        $request_id = Input::get('request_id');
        $request_details = DB::select('SELECT *,`pr`.`id` AS `request_id`,`pr`.`description` AS `request_description` FROM `ds_post_request` AS `pr` INNER JOIN `ds_sub_class` AS `sc` ON `sc`.`id` = `pr`.`sub_category` WHERE `pr`.`id` = '.$request_id);

        if($request_details[0]->user_id){
            $reciever_user_details = DB::table('user')->where('id', $request_details[0]->user_id)->get();
        }else{
            $reciever_user_details = DB::table('company')->where('id', $request_details[0]->company_id)->get();
        }

        $currentLang = $_COOKIE['current_lang'];
        $param = [
                    'user_name'    => $reciever_user_details[0]->name,
                    'title'        => $request_details[0]->title,
                    'description'  => $request_details[0]->request_description,
                    'budget'       => $request_details[0]->budget,
                    'expiry_date'  => $request_details[0]->expiry_date,
                    'reply_name'   => $live_user_details[0]->name,
                    'reply_message'=> $reply_msg
                 ];

        $info = [   'reply_name'  => REPLY_NAME,
                    'reply_email' => NOREPLY_EMAIL,
                    'email'       => $reciever_user_details[0]->email,
                    'name'        => $reciever_user_details[0]->name,
                    'subject'     => $live_user_details[0]->name." ".$this->languageLabels['has replied on your post request']." by DoveCercare!",
                ];
                
        if ($currentLang == 'es') {
            Mail::send('email.post_request_reply_' . $currentLang, $param, function($message) use ($info) {
                        $message->from($info['reply_email'], $info['reply_name']);
                        $message->to($info['email'], $info['name'])
                                ->subject($info['subject']);
                    });
        } elseif ($currentLang == 'it') {
            Mail::send('email.post_request_reply_' . $currentLang, $param, function($message) use ($info) {
                        $message->from($info['reply_email'], $info['reply_name']);
                        $message->to($info['email'], $info['name'])
                                ->subject($info['subject']);
                    });
        } else {
            Mail::send('email.post_request_reply_'. $currentLang, $param, function($message) use ($info) {
                        $message->from($info['reply_email'], $info['reply_name']);
                        $message->to($info['email'], $info['name'])
                                ->subject($info['subject']);
                    });
        }
        $result['result'] = "success";
        $result['msg'] = $this->languageLabels["Success"];
        return Response::json($result, 200);
    }

}
?>