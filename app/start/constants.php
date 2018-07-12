<?php
    define("DEVELOPEMENT", "LOCAL");
    
    define('SITE_NAME',                 'DoveCercare');
    define('PAGINATION_SIZE',           10);    
    define('DEFAULT_ICON',              'fa fa-star');
    define('DEFAULT_PHOTO',             'default.jpg');
        
    define('DEFAULT_WIDGET_COLOR',      '#e6400c');
    define('DEFAULT_WIDGET_HEADER',     '#e6400c');
    define('DEFAULT_WIDGET_BACKGROUND', '#ffffff');
    
    define('DEFAULT_START_TIME',        '09:00');
    define('DEFAULT_END_TIME',          '18:00');
    
      
    define('DEFAULT_LAT',               41.902784);
    define('DEFAULT_LNG',               12.496366);
    
    define('REPLY_EMAIL',               'info@dovecercare.com');
    define('NOREPLY_EMAIL',               'noreply@dovecercare.com');
    define('REPLY_NAME',                'dovecercare.com');
    
    define('DATE_FORMAT', "d M Y");
    define('TIME_FORMAT', "d/m/Y H:i:s");   
    $domain = $_SERVER['SERVER_NAME']; 
    if($domain == "localhost"){
        $baseURL = "http://localhost/mela/public";
        $sub = "";
        $sub_dir = "public";
    }
    if($domain == "letshop247.com"){
        $baseURL = "http://letshop247.com/ci/mela/public";
        $sub = "";
        $sub_dir = "public";
    }
    if($domain == "mela.dovecercare.com"){
        $baseURL = "http://mela.dovecercare.com";
        $sub = "/public";
        $sub_dir = "";
    }
    define('MY_BASE_URL',$baseURL);
    define('SUB_DIR',$sub_dir);
    define('MAINTENANCE_IMG',$baseURL.$sub.'/upload/maintenance/maintenance.png');

    if (DEVELOPEMENT == "LOCAL") {
        define('HTTP_HOST',               $baseURL);
        define('PAYPAL_SERVER',		    'www.sandbox.paypal.com');
        define('PAYPAL_BUSINESS',	    'ankorvisitor003@gmail.com');
        define('PAYPAL_URL', 'https://www.sandbox.paypal.com/cgi-bin/webscr');
        define('STRIPE_SECRET_KEY',		    'sk_test_xiBipAcqPYOnXWWDUop1Pveg');
        define('STRIPE_PUBLISH_KEY',	    'pk_test_LsObZosxYmpM5VX9eBqVh4SP');
        define("INFOBIP_USERNAME", 'varaa6');
        define("INFOBIP_PASSWORD", 'varaa12');
        define("PHONE_PREFIX", '+855');
    } else {
        define('HTTP_HOST',                 "http://pesca.dovecercare.com");
        define('PAYPAL_SERVER',		    'www.sandbox.paypal.com');
        define('PAYPAL_URL', 'https://www.sandbox.paypal.com/cgi-bin/webscr');
        define('PAYPAL_BUSINESS',	    'ankorvisitor003@gmail.com');
        define('STRIPE_SECRET_KEY',		    'sk_test_xiBipAcqPYOnXWWDUop1Pveg');
        define('STRIPE_PUBLISH_KEY',	    'pk_test_LsObZosxYmpM5VX9eBqVh4SP');
        define("INFOBIP_USERNAME", 'varaa6');
        define("INFOBIP_PASSWORD", 'varaa12');
        define("PHONE_PREFIX", '+358');        
    }

    if($domain == "localhost"){
        define('HTTP_USER_PATH',            HTTP_HOST.'/upload/user/');
        define('ABS_USER_PATH',             $_SERVER['DOCUMENT_ROOT'].'/mela/public/upload/user/');
        
        define('HTTP_COMPANY_PATH',         HTTP_HOST.'/upload/company/');
        define('ABS_COMPANY_PATH',          $_SERVER['DOCUMENT_ROOT'].'/mela/public/upload/company/');

        define('HTTP_HOWITWORKS_PATH',         HTTP_HOST.'/upload/howitworks/');
        define('ABS_HOWITWORKS_PATH',          $_SERVER['DOCUMENT_ROOT'].'/mela/public/upload/howitworks/');
        
        define('HTTP_STORE_PATH',         HTTP_HOST.'/upload/store/');
        define('ABS_STORE_PATH',          $_SERVER['DOCUMENT_ROOT'].'/mela/public/upload/store/');    
        
        define('HTTP_POST_PATH',         HTTP_HOST.'/upload/post/');
        define('ABS_POST_PATH',          $_SERVER['DOCUMENT_ROOT'].'/mela/public/upload/post/');
        
        define('HTTP_COVER_PATH',         HTTP_HOST.'/upload/cover/');
        define('ABS_COVER_PATH',          $_SERVER['DOCUMENT_ROOT'].'/mela/public/upload/cover/');    

        define('HTTP_REVIEW_PATH',      HTTP_HOST.'/upload/review/');
        define('ABS_REVIEW_PATH',       $_SERVER['DOCUMENT_ROOT'].'/mela/public/upload/review/');    
        
        define('HTTP_OFFER_PATH',      HTTP_HOST.'/upload/offer/');
        define('ABS_OFFER_PATH',       $_SERVER['DOCUMENT_ROOT'].'/mela/public/upload/offer/');

        define('HTTP_LOYALTY_PATH',      HTTP_HOST.'/upload/loyalty/');
        define('ABS_LOYALTY_PATH',       $_SERVER['DOCUMENT_ROOT'].'/mela/public/upload/loyalty/');
        
        define('HTTP_LOGO_PATH',      HTTP_HOST.'/upload/logo/');
        define('ABS_LOGO_PATH',       $_SERVER['DOCUMENT_ROOT'].'/mela/public/upload/logo/'); 

        define('HTTP_IMG_PATH',      HTTP_HOST.'/assets/img/');
        define('ABS_IMG_PATH',       $_SERVER['DOCUMENT_ROOT'].'/mela/public/assets/img/');
    }
    if($domain == "letshop247.com"){
        define('HTTP_USER_PATH',            HTTP_HOST.'/upload/user/');
        define('ABS_USER_PATH',             $_SERVER['DOCUMENT_ROOT'].'/ci/mela/public/upload/user/');
        
        define('HTTP_COMPANY_PATH',         HTTP_HOST.'/upload/company/');
        define('ABS_COMPANY_PATH',          $_SERVER['DOCUMENT_ROOT'].'/ci/mela/public/upload/company/');

        define('HTTP_HOWITWORKS_PATH',         HTTP_HOST.'/upload/howitworks/');
        define('ABS_HOWITWORKS_PATH',          $_SERVER['DOCUMENT_ROOT'].'/ci/mela/public/upload/howitworks/');
        
        define('HTTP_STORE_PATH',         HTTP_HOST.'/upload/store/');
        define('ABS_STORE_PATH',          $_SERVER['DOCUMENT_ROOT'].'/ci/mela/public/upload/store/');    
        
        define('HTTP_POST_PATH',         HTTP_HOST.'/upload/post/');
        define('ABS_POST_PATH',          $_SERVER['DOCUMENT_ROOT'].'/ci/mela/public/upload/post/');
        
        define('HTTP_COVER_PATH',         HTTP_HOST.'/upload/cover/');
        define('ABS_COVER_PATH',          $_SERVER['DOCUMENT_ROOT'].'/ci/mela/public/upload/cover/');    

        define('HTTP_REVIEW_PATH',      HTTP_HOST.'/upload/review/');
        define('ABS_REVIEW_PATH',       $_SERVER['DOCUMENT_ROOT'].'/ci/mela/public/upload/review/');    
        
        define('HTTP_OFFER_PATH',      HTTP_HOST.'/upload/offer/');
        define('ABS_OFFER_PATH',       $_SERVER['DOCUMENT_ROOT'].'/ci/mela/public/upload/offer/');

        define('HTTP_LOYALTY_PATH',      HTTP_HOST.'/upload/loyalty/');
        define('ABS_LOYALTY_PATH',       $_SERVER['DOCUMENT_ROOT'].'/ci/mela/public/upload/loyalty/');
        
        define('HTTP_LOGO_PATH',      HTTP_HOST.'/upload/logo/');
        define('ABS_LOGO_PATH',       $_SERVER['DOCUMENT_ROOT'].'/ci/mela/public/upload/logo/'); 

        define('HTTP_IMG_PATH',      HTTP_HOST.'/assets/img/');
        define('ABS_IMG_PATH',       $_SERVER['DOCUMENT_ROOT'].'/ci/mela/public/assets/img/');
    }
    if($domain == "mela.dovecercare.com"){
        define('HTTP_USER_PATH',            HTTP_HOST.'/upload/user/');
        define('ABS_USER_PATH',             $_SERVER['DOCUMENT_ROOT'].'/upload/user/');
        
        define('HTTP_COMPANY_PATH',         HTTP_HOST.'/upload/company/');
        define('ABS_COMPANY_PATH',          $_SERVER['DOCUMENT_ROOT'].'/upload/company/');

        define('HTTP_HOWITWORKS_PATH',         HTTP_HOST.'/upload/howitworks/');
        define('ABS_HOWITWORKS_PATH',          $_SERVER['DOCUMENT_ROOT'].'/upload/howitworks/');
        
        define('HTTP_STORE_PATH',         HTTP_HOST.'/upload/store/');
        define('ABS_STORE_PATH',          $_SERVER['DOCUMENT_ROOT'].'/upload/store/');    
        
        define('HTTP_POST_PATH',         HTTP_HOST.'/upload/post/');
        define('ABS_POST_PATH',          $_SERVER['DOCUMENT_ROOT'].'/upload/post/');
        
        define('HTTP_COVER_PATH',         HTTP_HOST.'/upload/cover/');
        define('ABS_COVER_PATH',          $_SERVER['DOCUMENT_ROOT'].'/upload/cover/');    

        define('HTTP_REVIEW_PATH',      HTTP_HOST.'/upload/review/');
        define('ABS_REVIEW_PATH',       $_SERVER['DOCUMENT_ROOT'].'/upload/review/');    
        
        define('HTTP_OFFER_PATH',      HTTP_HOST.'/upload/offer/');
        define('ABS_OFFER_PATH',       $_SERVER['DOCUMENT_ROOT'].'/upload/offer/');

        define('HTTP_LOYALTY_PATH',      HTTP_HOST.'/upload/loyalty/');
        define('ABS_LOYALTY_PATH',       $_SERVER['DOCUMENT_ROOT'].'/upload/loyalty/');
        
        define('HTTP_LOGO_PATH',      HTTP_HOST.'/upload/logo/');
        define('ABS_LOGO_PATH',       $_SERVER['DOCUMENT_ROOT'].'/upload/logo/'); 

        define('HTTP_IMG_PATH',      HTTP_HOST.'/assets/img/');
        define('ABS_IMG_PATH',       $_SERVER['DOCUMENT_ROOT'].'/assets/img/'); 
    }
    
    
    

    
