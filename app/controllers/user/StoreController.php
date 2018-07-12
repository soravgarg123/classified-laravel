<?php

namespace User;

use Illuminate\Routing\Controllers\Controller;
use View,
    Input,
    Redirect,
    Session,
    DB,
    Response,
    Mail;
use Category as CategoryModel,
    City as CityModel;
use Feedback as FeedbackModel,
    ReviewPhoto as ReviewPhotoModel;
use Store as StoreModel;
use Company as CompanyModel;
use Consumer as ConsumerModel;
use CommonFunction as CommonFunctionModel;
use Cart as CartModel,
    Chat as ChatModel;
use Office as OfficeModel;
use Stoffice as StofficeModel;
use Pclass as PclassModel;
use Website as WebsiteModel;
use ProfSubClass as ProfSubClassModel;
use Post as PostModel,
    PostCategory as PostCategoryModel;
use SiteLanguage;

class StoreController extends \BaseController {

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
        $param['classes'] = PclassModel::all();
        $param['officies'] = OfficeModel::all();

        if ($alert = Session::get('alert')) {
            $param['alert'] = $alert;
        }
        if (!Session::has('keyword')) {
            Session::set('keyword', '');
            Session::set('location', '');
        }

        // $param['stores'] = StoreModel::completed()->orderBy(DB::raw('RAND()'))->take(12)->get();
        $param['stores'] = StoreModel::orderBy(DB::raw('RAND()'))->take(12)->get();
        $param['feedbacks'] = FeedbackModel::orderBy('id', 'DESC')->take(8)->get();

        return View::make('user.store.home')->with($param)->with('siteLanguage', $this->siteLanguage)->with('langLbl', $this->languageLabels)
                        ->with('currentLanguage', $this->currentLanguage);
    }

    public function search() {
        $keyword = Input::has('keyword') ? Input::get('keyword') : '';
        $location = Input::has('location') ? Input::get('location') : '';
        $fromPrice = Input::get('fromPrice');
        $toPrice = Input::get('toPrice');
        $fromRate = Input::has('fromRate') ? Input::get('fromRate') : 0;
        $toRate = 5;
        $lat = Input::has('lat') ? Input::get('lat') : '';
        $lng = Input::has('lng') ? Input::get('lng') : '';
        $office_available = Input::get('office_available');
        $online_payment = Input::get('online_payment');
        $discount_available = Input::get('discount_available');

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
        $result = StoreModel::search($keyword, $location, $fromPrice, $toPrice, $fromRate, $toRate, $office_available, $online_payment, $discount_available);

        $tblStore = with(new StoreModel)->getTable();
        $param['categories'] = CategoryModel::orderBy('name' . $this->currentLanguage, 'ASC')->get();
        $param['officies'] = OfficeModel::all();
        $param['classes'] = PclassModel::all();

        if (Session::get('dt') == 'grid') {
            $param['stores'] = $result->whereBetween('ttt2.answer', array($fromRate, $toRate))->groupBy($tblStore . '.id')->orderBy('distance', 'ASC')->paginate(PAGINATION_SIZE * 4);
        } else {
            $param['stores'] = $result->whereBetween('ttt2.answer', array($fromRate, $toRate))->groupBy($tblStore . '.id')->orderBy('distance', 'ASC')->paginate(5);
        }
        $param['recent_posts'] = PostModel::where('company_id', 0)->orderBy('created_at', 'desc')->take(5)->get();
        $param['postcategory'] = PostCategoryModel::orderBy('name' . $this->currentLanguage, 'ASC')->get();
        Session::set('keyword', $keyword);
        Session::set('location', $location);
        Session::set('fromPrice', $fromPrice);
        Session::set('toPrice', $toPrice);
        Session::set('fromRate', $fromRate);
        Session::set('office_available', $office_available);
        Session::set('online_payment', $online_payment);
        Session::set('discount_available', $discount_available);

        return View::make('user.store.search')->with($param)->with('siteLanguage', $this->siteLanguage)->with('langLbl', $this->languageLabels)
                        ->with('currentLanguage', $this->currentLanguage);
    }

    public function profSearch() {
        $keyword = Input::has('keyword') ? Input::get('keyword') : '';
        $location = Input::has('location') ? Input::get('location') : '';
        $lat = Input::has('lat') ? Input::get('lat') : '';
        $lng = Input::has('lng') ? Input::get('lng') : '';
        $toPrice = Input::has('toPricePro') ? Input::get('toPricePro') : 1000;
        $fromPrice = Input::has('fromPricePro') ? Input::get('fromPricePro') : 0;
        $fromRate = Input::has('prof_fromRate') ? Input::get('prof_fromRate') : 0;
        $prof_office_available = Input::get('prof_office_available');
        $session_status = Input::get('session_status');

        $toRate = 5;
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
        $result = CompanyModel::Profsearch($keyword, $location, $fromRate, $toRate, $fromPrice, $toPrice, $prof_office_available, $session_status);
        $tblStore = with(new StoreModel)->getTable();
        $param['categories'] = CategoryModel::orderBy('name' . $this->currentLanguage, 'ASC')->get();
        $param['classes'] = PclassModel::all();
        $param['officies'] = OfficeModel::all();
        $param['recent_posts'] = PostModel::where('company_id', 0)->orderBy('created_at', 'desc')->take(5)->get();
        $param['postcategory'] = PostCategoryModel::orderBy('name' . $this->currentLanguage, 'ASC')->get();
        if (Session::get('dt') == 'grid') {
            $param['companies'] = $result->whereBetween('tt2.avgScore', array($fromRate, $toRate))->groupBy($tblStore . '.id')->orderBy('distance', 'ASC')->paginate(PAGINATION_SIZE * 4);
        } else {
            $param['companies'] = $result->whereBetween('tt2.avgScore', array($fromRate, $toRate))->groupBy($tblStore . '.id')->orderBy('distance', 'ASC')->paginate(5);
        }


        Session::set('prof_keyword', $keyword);
        Session::set('prof_location', $location);
        Session::set('prof_fromRate', $fromRate);
        Session::set('fromPricePro', $fromPrice);
        Session::set('toPricePro', $toPrice);
        Session::set('professional_office_available', $prof_office_available);
        Session::set('session_status', $session_status);

        return View::make('user.store.profsearch')->with($param)->with('siteLanguage', $this->siteLanguage)->with('langLbl', $this->languageLabels)
                        ->with('currentLanguage', $this->currentLanguage);
    }

    public function detailProfile($slug) {
        $store = StoreModel::findBySlug($slug);
        $storeId = $store->id;
        $store_sub_category_details = DB::table('store_sub_category')->where('store_id', $storeId)->first();
        if(!empty($store_sub_category_details)){
            $categoryID = $store_sub_category_details->category_id;
        }else{
            $categoryID = 0;
        }
        $param['category_details'] = DB::table('category')->where('id', $categoryID)->first();
        $param['stores'] = StoreModel::where('company_id', $store->company_id)->where('id', '<>', $store->id)->get();
        $param['prof_id'] = $store->company_id;
        $param['prof_name'] = $store->company->name;
        $param['store'] = $store;
        $param['booked_amount'] = CartModel::where('store_id', $store->id)->where('user_id', Session::get('user_id'))->where('status', 0)->count();
        $param['personal_officies'] = StofficeModel::where('store_id', $store->id)->get();
        $store->count_view = $store->count_view + 1;
        $store->save();
        $param['categories'] = CategoryModel::orderBy('name' . $this->currentLanguage, 'ASC')->get();
        $param['classes'] = PclassModel::all();
        $param['officies'] = OfficeModel::all();
        $param['subPageNo'] = 1;
        if ($alert = Session::get('alert')) {
            $param['alert'] = $alert;
        }

        if (Session::has('user_id')) {
            if (FeedbackModel::where('user_id', Session::get('user_id'))
                            ->where('store_id', $param['store']->id)
                            ->where('status', '<>', 'ST03')
                            ->get()
                            ->count() > 0) {
                $param['is_valid'] = FALSE;
            } else {
                $param['is_valid'] = TRUE;
            }
        } else {
            $param['is_valid'] = FALSE;
        }
        return View::make('user.store.detailProfile')->with($param)->with('store', $store)->with('siteLanguage', $this->siteLanguage)->with('langLbl', $this->languageLabels)
                        ->with('currentLanguage', $this->currentLanguage);
    }

    public function detailPhoto($slug) {
        $param['store'] = StoreModel::findBySlug($slug);
        $param['categories'] = CategoryModel::orderBy('name' . $this->currentLanguage, 'ASC')->get();
        $param['cities'] = CityModel::all();
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

    public function chatsave() {
        if (Input::get('direction') == 'up') {
            $from = 'u' . Input::get('from');
            $to = 'p' . Input::get('to');
        } else {
            $from = 'p' . Input::get('from');
            $to = 'u' . Input::get('to');
        }

        $message = Input::get('message');
        $sent = date("Y-m-d H:i:s");
        $chat = new ChatModel;
        $chat->from = $from;
        $chat->to = $to;
        $chat->message = $message;
        $chat->save();
        $result['result'] = 'success';
        return Response::json($result, 200);
    }

    public function asyncBookTime() {
        $ct = Input::get('ct');
        $store_id = Input::get('storeId');
        $result = CartModel::where('store_id', $store_id)->where('book_date', 'like', $ct . '%')->get();
        return Response::json($result, 200);
    }

    public function purchaseSuccess($slug) {
        $alert['msg'] = $this->languageLabels['You have purchased successfully.'];
        $alert['type'] = 'success';

        return Redirect::route('store.detail', $slug)->with('alert', $alert);
    }

    public function purchaseFailed($slug) {
        $alert['msg'] = $this->languageLabels['You have failed on purchasing.'];
        $alert['type'] = 'danger';

        return Redirect::route('store.detail', $slug)->with('alert', $alert);
    }

    public function purchaseIPN() {
        $req = 'cmd=_notify-validate';


        foreach ($_POST as $key => $value) {

            if ($key == "custom") {

                $custom = json_decode($value, true);

                $user_id = $custom["uid"];
                $company_id = $custom["cid"];
                $store_id = $custom["sid"];
                $book_date = $custom["book_date"];
                $duration = $custom["duration"];
                $addr = !empty($custom["addr"]) ? $custom['addr'] : null;
                $msg = $custom["msg"];
                $office_id = $custom['office_id'];
                if ($custom['service_available'] == 1) {
                    $options = ['service_available' => $custom['service_available']];
                } else {
                    $options = ['service_available' => $custom['service_available'], 'delivery_days' => $custom['delivery_days'], 'delivery_place' => $custom['delivery_place']];
                }
            }

            if ($key == "txn_id")
                $txn_id = $value;

            if ($key == "mc_gross")
                $mc_gross = $value;


            $value = urlencode(stripslashes($value));
            $req .= "&$key=$value";
        }


        //post back to PayPal system to validate
        $header = "POST /cgi-bin/webscr HTTP/1.1\r\n";
        $header .= "Content-Type: application/x-www-form-urlencoded\r\n";
        $header .= "Host: " . PAYPAL_SERVER . "\r\n";
        $header .= "Connection: close\r\n";
        $header .= "Content-Length: " . strlen($req) . "\r\n\r\n";
        $fp = fsockopen('ssl://' . PAYPAL_SERVER, 443, $errno, $errstr, 30);
        if ($fp) {

            fputs($fp, $header . $req);
            while (!feof($fp)) {
                $res = fgets($fp, 1024);
                $res = trim($res);

                if (strcmp($res, "VERIFIED") == 0) {
                    //insert order into database   				 

                    if (count(CartModel::where('txn_id', $txn_id)->get()) == 0) {
                        $cart = new CartModel;
                        $cart->user_id = $user_id;
                        $cart->company_id = $company_id;
                        $cart->store_id = $store_id;
                        $cart->txn_id = $txn_id;
                        $cart->price = $mc_gross;
                        $cart->book_date = $book_date;
                        $cart->duration = $duration;
                        $cart->user_address = $addr;
                        $cart->message = $msg;
                        $cart->office_id = $office_id;
                        $cart->status = 3;
                        $cart->options = serialize($options);
                        $file = fopen("test.txt", "w");
                        echo fwrite($file, print_r($cart, true));
                        fclose($file);
                        $cart->save();

                        if (!empty($addr)) {
                            $location = 'Home';
                            $addr = $addr;
                        } else {
                            $location = $cart->office->name;
                            $addr = $cart->office->address;
                        }
                        $books = CartModel::where('store_id', $store_id)->where('user_id', Session::get('user_id'))->firstOrFail();
                        $param = ['book_date' => $book_date,
                            'duration' => $duration,
                            'store_name' => $books->store->name,
                            'user_name' => $books->user->name,
                            'price' => $books->price,
                            'msg' => $msg,
                            'addr' => $addr,
                            'location' => $location,
                        ];
                        $info = [ 'reply_name' => REPLY_NAME,
                            'reply_email' => REPLY_EMAIL,
                            'email' => $books->user->email,
                            'name' => $books->user->name,
                            'subject' => SITE_NAME,
                        ];

                        $currentLang = $_COOKIE['current_lang'];
                        if ($currentLang == 'es') {
                            Mail::send('email.makeBook_' . $currentLang, $param, function($message) use ($info) {
                                        $message->from($info['reply_email'], $info['reply_name']);
                                        $message->to($info['email'], $info['name'])
                                                ->subject($info['subject']);
                                    });
                        } elseif ($currentLang == 'it') {
                            Mail::send('email.makeBook_' . $currentLang, $param, function($message) use ($info) {
                                        $message->from($info['reply_email'], $info['reply_name']);
                                        $message->to($info['email'], $info['name'])
                                                ->subject($info['subject']);
                                    });
                        } else {
                            Mail::send('email.makeBook', $param, function($message) use ($info) {
                                        $message->from($info['reply_email'], $info['reply_name']);
                                        $message->to($info['email'], $info['name'])
                                                ->subject($info['subject']);
                                    });
                        }

                        //  Mail::send('email.makeBook', $param, function($message) use ($info) {
                        //              $message->from($info['reply_email'], $info['reply_name']);
                        //              $message->to($info['email'], $info['name'])
                        //                      ->subject($info['subject']);
                        //          });
                        // \End send mail to customer
                        // Send mail to Store.
                        $info = [ 'reply_name' => REPLY_NAME,
                            'reply_email' => REPLY_EMAIL,
                            'email' => $books->store->company->email,
                            'name' => $books->store->name,
                            'subject' => SITE_NAME,
                        ];

                        $currentLang = $_COOKIE['current_lang'];
                        if ($currentLang == 'es') {
                            Mail::send('email.bookNoti_' . $currentLang, $param, function($message) use ($info) {
                                        $message->from($info['reply_email'], $info['reply_name']);
                                        $message->to($info['email'], $info['name'])
                                                ->subject($info['subject']);
                                    });
                        } elseif ($currentLang == 'it') {
                            Mail::send('email.bookNoti_' . $currentLang, $param, function($message) use ($info) {
                                        $message->from($info['reply_email'], $info['reply_name']);
                                        $message->to($info['email'], $info['name'])
                                                ->subject($info['subject']);
                                    });
                        } else {
                            Mail::send('email.bookNoti', $param, function($message) use ($info) {
                                        $message->from($info['reply_email'], $info['reply_name']);
                                        $message->to($info['email'], $info['name'])
                                                ->subject($info['subject']);
                                    });
                        }

                        //  Mail::send('email.bookNoti', $param, function($message) use ($info) {
                        //            $message->from($info['reply_email'], $info['reply_name']);
                        //          $message->to($info['email'], $info['name'])
                        //                ->subject($info['subject']);
                        //   });
                        // \ End Send mail to store    					
                    }
                }

                if (strcmp($res, "INVALID") == 0) {
                    
                }
            }
            fclose($fp);
        }
    }

}
