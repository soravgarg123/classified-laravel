<?php

use Illuminate\Database\Eloquent\Model as Eloquent;
use Consumer as ConsumerModel;
use Offer as OfferModel, UserOffer as UserOfferModel, User as UserModel;

class CommonFunction extends Eloquent {
    public static function addConsumer($companyId, $userId, $count_plus) {
        $consumers = ConsumerModel::where('company_id', $companyId)->where('user_id', $userId);
        if ($consumers->get()->count() == 0) {
            $consumer = new ConsumerModel;
            $consumer->company_id = $companyId;
            $consumer->user_id = $userId;
            $consumer->count_visit = $count_plus;
            $consumer->count_stamp = $count_plus;
            $consumer->save();
        } elseif ($count_plus != 0) {
            $consumer = $consumers->firstOrFail();
            $consumer->count_visit = $consumer->count_visit + $count_plus;
            $consumer->count_stamp = $consumer->count_stamp + $count_plus;
            $consumer->save();
        }
    }

    public static function addOffer($companyId, $userId) {
        $offers = OfferModel::where('company_id', $companyId)->where('is_review', TRUE)->get();
        if (count($offers) > 0) {
            $offer = $offers[0];
            $userOffer = new UserOfferModel;
            $userOffer->user_id = $userId;
            $userOffer->offer_id = $offer->id;
            $userOffer->is_used = FALSE;
            $userOffer->code = strtoupper(str_random(6));
            $userOffer->save();
    
            $user = UserModel::find($userId);
            $data = ['offer_name' => $offer->name,
                     'offer_description' => $offer->description,
                     'offer_code' => $userOffer->code,
                     'company_name' => $userOffer->offer->company->name,
                     'company_link' => URL::route('store.detail', $userOffer->offer->company->slug  ),
                    ];
    
            $info = [ 'reply_name'  => REPLY_NAME,
                      'reply_email' => REPLY_EMAIL,
                      'email'       => $user->email,
                      'name'        => $user->name,
                      'subject'     => SITE_NAME,
                    ];
    
            Mail::send('email.getOffer', $data, function($message) use ($info) {
                $message->from($info['reply_email'], $info['reply_name']);
                $message->to($info['email'], $info['name'])
                    ->subject($info['subject']);
            });
        }
    }

    public static function sendSMS($from, $to, $sms_body, $msg_id = '') {
        if ($to == '') {
            return;
        }
        
        if (substr($to, 0, 1) == "0") {
            $to = PHONE_PREFIX.substr($to, 1);
        }
        
        if(substr($to, 0, 1) != "+" && strlen($to) != 5) {
            $to = "+".$to;
        }
         
        $msg_id = ($msg_id == '') ? time() : $msg_id;
        $postUrl = "http://api.infobip.com/api/v3/sendsms/xml";
        $infobip_username = INFOBIP_USERNAME;
        $infobip_password = INFOBIP_PASSWORD;
         
        $no_of_sms_will_send=ceil(strlen($sms_body)/160);
        for ($i = 0; $i < $no_of_sms_will_send; $i++) {
            $sms_part = substr( $sms_body, 0, 160);
            if (strlen($sms_body) > 160) {
                $sms_body = substr($sms_body, 160);
            }
             
            $xmlString = "
            <SMS>
            <authentification>
            <username>$infobip_username</username>
            <password>$infobip_password</password>
            </authentification>
            <message>
            <sender>$from</sender>
            <text>$sms_part</text>
            <flash></flash>
            <type></type>
            <wapurl></wapurl>
            <binary></binary>
            <datacoding></datacoding>
            <esmclass></esmclass>
            <srcton></srcton>
            <srcnpi></srcnpi>
            <destton></destton>
            <destnpi></destnpi>
            <ValidityPeriod>23:59</ValidityPeriod>
            </message>
            <recipients>
            <gsm messageId=\"$msg_id\">$to</gsm>
            </recipients>
            </SMS>";
            $fields = "XML=".urlencode($xmlString);
        
            $ch  = curl_init();
            curl_setopt($ch, CURLOPT_URL, $postUrl);
            curl_setopt($ch, CURLOPT_POST, 1);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true );
            curl_setopt($ch, CURLOPT_HEADER, true );
            curl_setopt($ch, CURLOPT_POSTFIELDS, $fields);
        
            $response  = curl_exec($ch);
            curl_close($ch);
        }
        return $msg_id;        
    }
}
