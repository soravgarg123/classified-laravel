<?php

namespace User;

use Illuminate\Routing\Controllers\Controller;
use View,
    Input,
    Redirect,
    Session,
    DB,
    Mail,
    Response;
use Category as CategoryModel,
    City as CityModel;
use Feedback as FeedbackModel,
    ReviewPhoto as ReviewPhotoModel;
use Company as CompanyModel;
use Consumer as ConsumerModel;
use Store as StoreModel;
use Chat as ChatModel;
use CommonFunction as CommonFunctionModel;
use Pclass as PclassModel;
use Help as HelpModel;
use Howitworks as HowitworksModel;
use Terms as TermsModel;
use Policy as PolicyModel;
use User as UserModel;
use Website as WebsiteModel;
use WorldOfProfessional as WorldOfProfessionalModel;
use Office as OfficeModel,
    Post as PostModel,
    PostCategory as PostCategoryModel;
use SiteLanguage;

class CompanyController extends \BaseController {

    public function __construct()
    {
        $website = DB::table('website')->get();
        $type = $website[0]->value;
        if($type == "offline"){
           header('Location: '.MY_BASE_URL.'/maintenance'); 
        }
        parent::__construct();
    }

    public function home() {
        $param['categories'] = CategoryModel::orderBy('name' . $this->currentLanguage, 'ASC')->get();
        $param['officies'] = OfficeModel::all();
        $param['wof'] = WorldOfProfessionalModel::all();
        $param['classes'] = PclassModel::all();
        if ($alert = Session::get('alert')) {
            $param['alert'] = $alert;
        }
        if (!Session::has('keyword')) {
            Session::set('keyword', '');
            Session::set('location', '');
        }

        $param['companies'] = CompanyModel::orderBy(DB::raw('RAND()'))->take(12)->get();
        $param['stores'] = StoreModel::orderBy(DB::raw('RAND()'))->take(12)->get();
        $param['posts'] = PostModel::orderBy('created_at', 'DESC')->paginate(4);
        $param['professions'] = PostModel::where('company_id', 0)->orderBy('created_at', 'desc')->paginate(8);

        return View::make('user.company.home')->with($param)->with('siteLanguage', $this->siteLanguage)->with('langLbl', $this->languageLabels)
                        ->with('currentLanguage', $this->currentLanguage);
    }

    public function help() {
        $param['categories'] = CategoryModel::orderBy('name' . $this->currentLanguage, 'ASC')->get();
        $param['officies'] = OfficeModel::all();
        $param['classes'] = PclassModel::all();
        $param['help'] = HelpModel::all();
        $param['postcategory'] = PostCategoryModel::orderBy('name' . $this->currentLanguage, 'ASC')->get();
        $param['recent_posts'] = PostModel::where('company_id', 0)->orderBy('created_at', 'desc')->take(5)->get();
        if ($alert = Session::get('alert')) {
            $param['alert'] = $alert;
        }
        if (!Session::has('keyword')) {
            Session::set('keyword', '');
            Session::set('location', '');
        }

        $param['companies'] = CompanyModel::orderBy(DB::raw('RAND()'))->take(12)->get();
        $param['stores'] = StoreModel::orderBy(DB::raw('RAND()'))->take(12)->get();
        $param['feedbacks'] = FeedbackModel::orderBy('id', 'DESC')->take(8)->get();

        return View::make('user.company.help')->with($param)->with('siteLanguage', $this->siteLanguage)->with('langLbl', $this->languageLabels)
                        ->with('currentLanguage', $this->currentLanguage);
    }

    public function termsandcondition() {
        $param['categories'] = CategoryModel::orderBy('name' . $this->currentLanguage, 'ASC')->get();
        $param['officies'] = OfficeModel::all();
        $param['classes'] = PclassModel::all();
        $param['terms'] = TermsModel::all();
        $param['postcategory'] = PostCategoryModel::orderBy('name' . $this->currentLanguage, 'ASC')->get();
        $param['recent_posts'] = PostModel::where('company_id', 0)->orderBy('created_at', 'desc')->take(5)->get();
        if ($alert = Session::get('alert')) {
            $param['alert'] = $alert;
        }
        if (!Session::has('keyword')) {
            Session::set('keyword', '');
            Session::set('location', '');
        }

        //$param['stores'] = StoreModel::completed()->orderBy(DB::raw('RAND()'))->take(12)->get();
        $param['companies'] = CompanyModel::orderBy(DB::raw('RAND()'))->take(12)->get();
        $param['stores'] = StoreModel::orderBy(DB::raw('RAND()'))->take(12)->get();
        $param['feedbacks'] = FeedbackModel::orderBy('id', 'DESC')->take(8)->get();

        return View::make('user.company.terms')->with($param)->with('siteLanguage', $this->siteLanguage)->with('langLbl', $this->languageLabels)
                        ->with('currentLanguage', $this->currentLanguage);
    }

    public function howitworks() {
        $param['categories'] = CategoryModel::orderBy('name' . $this->currentLanguage, 'ASC')->get();
        $param['officies'] = OfficeModel::all();
        $param['classes'] = PclassModel::all();
        $param['howitworks'] = HowitworksModel::all();
        $param['postcategory'] = PostCategoryModel::orderBy('name' . $this->currentLanguage, 'ASC')->get();
        $param['recent_posts'] = PostModel::where('company_id', 0)->orderBy('created_at', 'desc')->take(5)->get();
        if ($alert = Session::get('alert')) {
            $param['alert'] = $alert;
        }
        if (!Session::has('keyword')) {
            Session::set('keyword', '');
            Session::set('location', '');
        }

        $param['companies'] = CompanyModel::orderBy(DB::raw('RAND()'))->take(12)->get();
        $param['stores'] = StoreModel::orderBy(DB::raw('RAND()'))->take(12)->get();
        $param['feedbacks'] = FeedbackModel::orderBy('id', 'DESC')->take(8)->get();

        return View::make('user.company.howitworks')->with($param)->with('siteLanguage', $this->siteLanguage)->with('langLbl', $this->languageLabels)
                        ->with('currentLanguage', $this->currentLanguage);
    }

    public function privacypolicy() {
        $param['categories'] = CategoryModel::orderBy('name' . $this->currentLanguage, 'ASC')->get();
        $param['officies'] = OfficeModel::all();
        $param['classes'] = PclassModel::all();
        $param['policy'] = PolicyModel::all();
        $param['postcategory'] = PostCategoryModel::orderBy('name' . $this->currentLanguage, 'ASC')->get();
        $param['recent_posts'] = PostModel::where('company_id', 0)->orderBy('created_at', 'desc')->take(5)->get();
        if ($alert = Session::get('alert')) {
            $param['alert'] = $alert;
        }
        if (!Session::has('keyword')) {
            Session::set('keyword', '');
            Session::set('location', '');
        }

        //$param['stores'] = StoreModel::completed()->orderBy(DB::raw('RAND()'))->take(12)->get();
        $param['companies'] = CompanyModel::orderBy(DB::raw('RAND()'))->take(12)->get();
        $param['stores'] = StoreModel::orderBy(DB::raw('RAND()'))->take(12)->get();
        $param['feedbacks'] = FeedbackModel::orderBy('id', 'DESC')->take(8)->get();

        return View::make('user.company.privacypolicy')->with($param)->with('siteLanguage', $this->siteLanguage)->with('langLbl', $this->languageLabels)
                        ->with('currentLanguage', $this->currentLanguage);
    }



    public function search() {
        $keyword = Input::has('keyword') ? Input::get('keyword') : '';
        $location = Input::has('location') ? Input::get('location') : '';
        $lat = Input::has('lat') ? Input::get('lat') : '';
        $lng = Input::has('lng') ? Input::get('lng') : '';

        if ($lat == '' && $lng == '') {
            $ipAddr = $_SERVER['REMOTE_ADDR'];
            $geoPlugin = unserialize(file_get_contents('http://www.geoplugin.net/php.gp?ip=' . $ipAddr));

            if (is_numeric($geoPlugin['geoplugin_latitude']) && is_numeric($geoPlugin['geoplugin_longitude'])) {
                $lat = $geoPlugin['geoplugin_latitude'];
                $lng = $geoPlugin['geoplugin_longitude'];
            }
        }

        if (Input::has('dt')) {
            Session::set('dt', Input::get('dt'));
        } elseif (!Session::has('dt')) {
            Session::set('dt', 'list');
        }

        // $result = StoreModel::completed()->search($keyword, $location);
        $result = StoreModel::search($keyword, $location);

        $tblStore = with(new StoreModel)->getTable();

        $param['categories'] = CategoryModel::orderBy('name' . $this->currentLanguage, 'ASC')->get();
        $param['officies'] = OfficeModel::all();
        if (Session::get('dt') == 'grid')
            $param['stores'] = $result->groupBy($tblStore . '.id')->orderBy('distance', 'ASC')->paginate(PAGINATION_SIZE * 4);
        else
            $param['stores'] = $result->groupBy($tblStore . '.id')->orderBy('distance', 'ASC')->paginate(PAGINATION_SIZE);

        Session::set('keyword', $keyword);
        Session::set('location', $location);

        return View::make('user.store.search')->with($param)->with('siteLanguage', $this->siteLanguage)->with('langLbl', $this->languageLabels)
                        ->with('currentLanguage', $this->currentLanguage);
    }

    public function detailProfile($slug) {
        $param['categories'] = CategoryModel::orderBy('name' . $this->currentLanguage, 'ASC')->get();
        $param['officies'] = OfficeModel::all();
        $param['classes'] = PclassModel::all();
        $company = CompanyModel::findBySlug($slug);
        $param['company'] = CompanyModel::find($company->id);
        $param['prof_id'] = $company->id;
        $param['prof_name'] = $company->name;
        $param['featured_companies'] = CompanyModel::orderBy(DB::raw('RAND()'))->take(12)->get();
        $param['stores'] = StoreModel::where('company_id', $company->id)->orderBy(DB::raw('RAND()'))->take(12)->get();
        $param['feedbacks'] = FeedbackModel::orderBy('id', 'DESC')->take(8)->get();
        $param['posts'] = PostModel::where('company_id', $company->id)->orderBy('created_at', 'DESC')->paginate(4);
        return View::make('user.company.detailProfile')->with($param)->with('siteLanguage', $this->siteLanguage)->with('langLbl', $this->languageLabels)
                        ->with('currentLanguage', $this->currentLanguage);
    }

    public function detailPhoto($slug) {
        $param['store'] = StoreModel::findBySlug($slug);
        $param['categories'] = CategoryModel::orderBy('name' . $this->currentLanguage, 'ASC')->get();
        $param['classes'] = PclassModel::all();
        $param['officies'] = OfficeModel::all();
        $param['subPageNo'] = 2;
        if ($alert = Session::get('alert')) {
            $param['alert'] = $alert;
        }
        if (Session::has('user_id')) {
            if (ReviewPhotoModel::where('user_id', Session::get('user_id'))
                            ->where('store_id', $param['store']->id)
                            ->get()
                            ->count() > 0) {
                $param['is_valid'] = FALSE;
            } else {
                $param['is_valid'] = TRUE;
            }
        } else {
            $param['is_valid'] = FALSE;
        }
        return View::make('user.store.detailPhoto')->with($param)->with('siteLanguage', $this->siteLanguage)->with('langLbl', $this->languageLabels)
                        ->with('currentLanguage', $this->currentLanguage);
    }

    public function asyncJoin() {
        if (Session::has('user_id')) {
            $companyId = Input::get('company_id');
            $userId = Session::get('user_id');
            $consumer = ConsumerModel::where('company_id', $companyId)->where('user_id', $userId)->get();
            if ($consumer->count() > 0) {
                $result['result'] = "failed";
                $result['msg'] = $this->languageLabels["You have already joined on this store."];
            } else {
                CommonFunctionModel::addConsumer($companyId, $userId, 0);
                $result['result'] = "success";
                $result['msg'] = $this->languageLabels["You have successfully joined on this store."];
            }
        } else {
            $result['result'] = "failed";
            $result['msg'] = $this->languageLabels["You have to login"];
        }

        return Response::json($result, 200);
    }

    public function chatbox($company_id) {
        if(strpos($company_id,"p") > -1){
            $userArr = explode("p", $company_id);
            if(!empty($userArr)){
                $user_id = $userArr[1];
            }else{
                $user_id = 0;
            }
            $user_type = "professional";
            $result['company'] = CompanyModel::find($user_id);
        }elseif(strpos($company_id,"u") > -1){
            $userArr = explode("u", $company_id);
            if(!empty($userArr)){
                $user_id = $userArr[1];
            }else{
                $user_id = 0;
            }
            $user_type = "user";
            $result['company'] = UserModel::find($user_id);
        }  
        $result['unique_id'] = $company_id;
        $result['user_type'] = $user_type;
        $current_user = Session::get('user_type');
        if($current_user == "professional"){
            $result['ownprofile'] = json_decode(CompanyModel::find(Session::get('company_id')));
            $currentUserId = "p".Session::get('company_id');
        }else{
            $result['ownprofile'] = json_decode(UserModel::find(Session::get('user_id')));
            $currentUserId = "u".Session::get('user_id');
        }
        $result['chating_data'] = DB::select(DB::raw(' SELECT * FROM `ds_chat` AS `c` WHERE (`c`.`from` = "' . $currentUserId .'" AND `c`.`to` = "' . $company_id .'") OR (`c`.`from` = "' . $company_id .'" AND `c`.`to` = "' . $currentUserId .'") ORDER BY `c`.`id` ASC '));
        return View::make('chatbox')->with($result)->with('siteLanguage', $this->siteLanguage)->with('langLbl', $this->languageLabels)
                    ->with('currentLanguage', $this->currentLanguage);
    }

    public function savechat()
    {
        $data = Input::all();
        $chat = new ChatModel;
        $chat->from = $data['sender_id'];
        $chat->to = $data['reciever_id'];
        $chat->message = $data['msg'];
        $chat->sent =  date('Y-m-d H:i:s');
        $chat->save();
        $result['type'] = 'success';
        return Response::json($result, 200);
    }

    public function invite()
    {
        $data = Input::all();
        if($data['description'] == ""){
            $description = $this->languageLabels["Hello, I visited http://mela.dovecercare.com/ and it's great, you should visit it and sign up."];
        }else{
            $description = $data['description'];
        }
        $email = $data['email'];
        $info = [   'reply_name' => REPLY_NAME,
                    'reply_email'=> "info@dovecercare.com",
                    'email'      => $email,
                    'name'       => 'User',
                    'subject'    => $this->languageLabels['Invited you to join']."DoveCercare",
                ];
        
        $param = [  'reply_name' => REPLY_NAME,
                    'reply_email'=> "info@dovecercare.com",
                    'email'      => $email,
                    'name'       => 'User',
                    'subject'    => $this->languageLabels['Invited you to join']."DoveCercare",
                    'description'    => $description
                ];
        $subject = $this->languageLabels['Invited you to join']."DoveCercare";
        $currentLang = $_COOKIE['current_lang'];
            if ($currentLang == 'es') 
            {
                Mail::send('email.invite_' . $currentLang, $param, function($message) use ($email,$subject,$description) {
                              $message->from(REPLY_EMAIL, REPLY_NAME);
                              $message->to($email)
                                    ->subject($subject);
                        });
            } elseif ($currentLang == 'it')
             {
                Mail::send('email.invite_' . $currentLang, $param, function($message) use ($email,$subject,$description) 
                {
                            $message->from(REPLY_EMAIL, REPLY_NAME);
                            $message->to($email)
                                    ->subject($subject);
                        });
            } else 
            {
               Mail::send('email.invite_' . $currentLang , $param, function($message) use ($email,$subject,$description)
                {
                            $message->from(REPLY_EMAIL, REPLY_NAME);
                            $message->to($email)
                                    ->subject($subject);
                }
                );
            }
        $result['type'] = 'success';
        return Response::json($result, 200);
    }

}
