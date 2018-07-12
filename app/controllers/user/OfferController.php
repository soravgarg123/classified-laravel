<?php

namespace User;

use Illuminate\Routing\Controllers\Controller;
use View,
    Input,
    Redirect,
    Session,
    DB,
    URL,
    Mail;
use Company as CompanyModel,
    User as UserModel;
use Category as CategoryModel,
    City as CityModel;
use Transaction as TransactionModel;
use Website as WebsiteModel;
use Offer as OfferModel,
    UserOffer as UserOfferModel;
use SiteLanguage;

class OfferController extends \BaseController {

    public function __construct()
    {
        $website = DB::table('website')->get();
        $type = $website[0]->value;
        if($type == "offline"){
           header('Location: '.MY_BASE_URL.'/maintenance'); 
        }
        parent::__construct();
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
                    $custom = Input::get('custom');
                    $custom = json_decode($custom, true);
                    $userId = $custom['uid'];
                    $offerId = $custom['oid'];

                    $transaction = new TransactionModel;
                    $transaction->user_id = $userId;
                    $transaction->offer_id = $offerId;
                    $transaction->txn_id = Input::get('txn_id');
                    $transaction->amount = Input::get('mc_gross');
                    $transaction->ip = $_SERVER['REMOTE_ADDR'];
                    $transaction->data = var_export($_POST, true);
                    $transaction->save();


                    $userOffer = new UserOfferModel;
                    $userOffer->user_id = $userId;
                    $userOffer->offer_id = $offerId;
                    $userOffer->is_used = FALSE;
                    $userOffer->code = strtoupper(str_random(6));
                    $userOffer->save();

                    $user = UserModel::find($userId);
                    $offer = OfferModel::find($offerId);

                    $data = ['offer_name' => $offer->name,
                        'offer_description' => $offer->description,
                        'offer_code' => $userOffer->code,
                        'company_name' => $userOffer->offer->company->name,
                        'company_link' => URL::route('store.detail', $userOffer->offer->company->slug),
                    ];

                    $info = [ 'reply_name' => REPLY_NAME,
                        'reply_email' => REPLY_EMAIL,
                        'email' => $user->email,
                        'name' => $user->name,
                        'subject' => SITE_NAME,
                    ];

                    $currentLang = $_COOKIE['current_lang'];
                    if ($currentLang == 'es') {
                        Mail::send('email.getOffer_' . $currentLang, $data, function($message) use ($info) {
                                    $message->from($info['reply_email'], $info['reply_name']);
                                    $message->to($info['email'], $info['name'])
                                            ->subject($info['subject']);
                                });
                    } elseif ($currentLang == 'it') {
                        Mail::send('email.getOffer_' . $currentLang, $data, function($message) use ($info) {
                                    $message->from($info['reply_email'], $info['reply_name']);
                                    $message->to($info['email'], $info['name'])
                                            ->subject($info['subject']);
                                });
                    } else {
                        Mail::send('email.getOffer', $data, function($message) use ($info) {
                                    $message->from($info['reply_email'], $info['reply_name']);
                                    $message->to($info['email'], $info['name'])
                                            ->subject($info['subject']);
                                });
                    }
                    // Mail::send('email.getOffer', $data, function($message) use ($info) {
                    //             $message->from($info['reply_email'], $info['reply_name']);
                    //             $message->to($info['email'], $info['name'])
                    //                     ->subject($info['subject']);
                    //         });
                }

                if (strcmp($res, "INVALID") == 0) {
                    
                }
            }
            fclose($fp);
        }
    }

}
