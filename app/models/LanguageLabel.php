<?php

use Illuminate\Database\Eloquent\Model as Eloquent;

class LanguageLabel extends Eloquent {

    protected $table = 'language_labels';

    public static function chooser() {
        if (isset($_COOKIE['current_lang'])) {
            if (Input::get('lang') != '') {
                setcookie("current_lang", Input::get('lang'), strtotime('+1 year'), "/");
                Session::set("current_lang", Input::get('lang') == 'en' ? '' : Input::get('lang'));
            } else {
                Session::set("current_lang", $_COOKIE['current_lang'] == 'en' ? '' : $_COOKIE['current_lang']);
            }
        } else {
            if (Session::has('admin_id')) {
                setcookie("current_lang", Input::get('lang', 'en'), strtotime('+1 year'), "/");
                Session::set("current_lang", Input::get('lang', 'en') == 'en' ? '' : Input::get('lang'));
            } else if (Session::has('company_id')) {
                $userDetail = \Company::find(Session::get('company_id'));
                $language = isset($userDetail->default_language) && $userDetail->default_language != null ? $userDetail->default_language : 'en';
                setcookie("current_lang", $language, strtotime('+1 year'), "/");
                Session::set("current_lang", $language == 'en' ? '' : $language);
            } else if (Session::has('user_id')) {
                $userDetail = \User::find(Session::get('user_id'));
                $language = isset($userDetail->default_language) && $userDetail->default_language != null ? $userDetail->default_language : 'en';
                setcookie("current_lang", $language, strtotime('+1 year'), "/");
                Session::set("current_lang", $language == 'en' ? '' : $language);
            } else {
                // country code by ip.
                $IPaddress = $_SERVER['REMOTE_ADDR'] != '127.0.0.1' ? $_SERVER['REMOTE_ADDR'] : '14.98.140.143';
                $countryCode = self::ip_info("$IPaddress", "Country Code");
                $language = strtolower($countryCode) != 'it' && strtolower($countryCode) != 'es' ? 'en' : strtolower($countryCode);
                setcookie("current_lang", $language, strtotime('+1 year'), "/");
                Session::set("current_lang", $language == 'en' ? '' : $language);
            }
        }
        return Session::get("current_lang");
    }

    public static function ip_info($ip = NULL, $purpose = "location", $deep_detect = TRUE) {
        $output = NULL;
        if (filter_var($ip, FILTER_VALIDATE_IP) === FALSE) {
            $ip = $_SERVER["REMOTE_ADDR"];
            if ($deep_detect) {
                if (filter_var(@$_SERVER['HTTP_X_FORWARDED_FOR'], FILTER_VALIDATE_IP))
                    $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
                if (filter_var(@$_SERVER['HTTP_CLIENT_IP'], FILTER_VALIDATE_IP))
                    $ip = $_SERVER['HTTP_CLIENT_IP'];
            }
        }
        $purpose = str_replace(array("name", "\n", "\t", " ", "-", "_"), NULL, strtolower(trim($purpose)));
        $support = array("country", "countrycode", "state", "region", "city", "location", "address");
        $continents = array(
            "AF" => "Africa",
            "AN" => "Antarctica",
            "AS" => "Asia",
            "EU" => "Europe",
            "OC" => "Australia (Oceania)",
            "NA" => "North America",
            "SA" => "South America"
        );
        if (filter_var($ip, FILTER_VALIDATE_IP) && in_array($purpose, $support)) {
            $ipdat = @json_decode(file_get_contents("http://www.geoplugin.net/json.gp?ip=" . $ip));
            if (@strlen(trim($ipdat->geoplugin_countryCode)) == 2) {
                switch ($purpose) {
                    case "location":
                        $output = array(
                            "city" => @$ipdat->geoplugin_city,
                            "state" => @$ipdat->geoplugin_regionName,
                            "country" => @$ipdat->geoplugin_countryName,
                            "country_code" => @$ipdat->geoplugin_countryCode,
                            "continent" => @$continents[strtoupper($ipdat->geoplugin_continentCode)],
                            "continent_code" => @$ipdat->geoplugin_continentCode
                        );
                        break;
                    case "address":
                        $address = array($ipdat->geoplugin_countryName);
                        if (@strlen($ipdat->geoplugin_regionName) >= 1)
                            $address[] = $ipdat->geoplugin_regionName;
                        if (@strlen($ipdat->geoplugin_city) >= 1)
                            $address[] = $ipdat->geoplugin_city;
                        $output = implode(", ", array_reverse($address));
                        break;
                    case "city":
                        $output = @$ipdat->geoplugin_city;
                        break;
                    case "state":
                        $output = @$ipdat->geoplugin_regionName;
                        break;
                    case "region":
                        $output = @$ipdat->geoplugin_regionName;
                        break;
                    case "country":
                        $output = @$ipdat->geoplugin_countryName;
                        break;
                    case "countrycode":
                        $output = @$ipdat->geoplugin_countryCode;
                        break;
                }
            }
        }
        return $output;
    }

}
