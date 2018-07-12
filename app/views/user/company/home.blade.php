@extends('user.layout')

@section('custom-styles')
{{ HTML::style('/assets/metronic/global/plugins/carousel-owl-carousel/owl-carousel/owl.carousel.css') }}
{{ HTML::style('/assets/metronic/global/plugins/slider-revolution-slider/rs-plugin/css/settings.css') }}
{{ HTML::style('/assets/metronic/frontend/pages/css/style-revolution-slider.css') }}
<style>
    #owl-demo .item{
        margin: 7px;
    }
    .searchbar .control-label{font-family:Open Sans!important;}
</style>
@stop

@section('main')
<?php
$nameVal = 'name' . $currentLanguage;
$descriptionVal = 'description' . $currentLanguage;
$postTitleVal = 'post_title' . $currentLanguage;
$postContentVal = 'post_content' . $currentLanguage;
?>
<div data-vide-bg="mp4: {{ HTTP_COMPANY_PATH }}video.mp4," data-vide-options="posterType: jpg, loop: true, auto-play:true, muted: false, position: 0% 0%" class="vdio" style="height:650px;z-index:9;">
    <!-- START SIDEBAR TOGGLER FOR SEARCH -->
    <div class="search-box-wrapper" >
        <div class="container">
            <div class="row">
                <div class="col-md-7 col-lg-8 col-xs-10 heading_s">
                    <h1>{{ $langLbl['Directory Template'] }}</h1>
                    <p>
                        {{ $langLbl['Create your own directory website by using Superlist template incorporating all features of modern directory website.'] }}
                    </p>
                </div>
                <!--<div class="col-md-3 searchbar" style="padding:0;float:right;">-->
                <div class="col-md-5 col-lg-4 col-xs-10 searchbar" style="padding:0px;float:right;overflow:hidden;margin:0 auto;font-family:'Open Sans';">
                    <div class="page-quick-sidebar">
                        <h2 class="heading_ms">{{ $langLbl['Start Searching'] }}</h2>
                        <div class="nav-justified">
                            <ul class="nav nav-tabs nav-justified">
                                <li class="">
                                    <a href="#quick_sidebar_tab_1" data-toggle="tab">
                                        {{ $langLbl['Professionals'] }}
                                    </a>
                                </li>
                                <li>
                                    <a href="#quick_sidebar_tab_2" data-toggle="tab">
                                        {{ $langLbl['Services'] }}
                                    </a>
                                </li>								
                            </ul>
                            <div class="tab-content">
                                <!-- START PROFESSIONAL SEARCH -->
                                <div class="tab-pane active page-quick-sidebar-chat" id="quick_sidebar_tab_1">
                                    <div class="page-quick-sidebar-chat-users" data-rail-color="#ddd" data-wrapper-class="page-quick-sidebar-list">
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <div class="input-icon">
                                                    <i class="fa fa-pencil" style="margin-top:16px;"></i>
                                                    <input type="text" class="form-control input-lg input-circle custom-typeahead" id="js-prof-keyword" placeholder="{{ $langLbl['Enter Keyword'] }}" value="{{ Session::get('prof_keyword') }}">
                                                </div>
                                            </div>              
                                        </div>
                                        <div class="col-sm-12 col-xs-12">
                                            <div class="form-group">
                                                <div class="input-icon">
                                                    <i class="fa fa-map-marker" style="margin-top:16px;"></i>
                                                    <input type="text" class="form-control input-lg input-circle custom-typeahead" id="js-text-office" placeholder="Rome, Italy"  value="{{ Session::get('prof_location') }}">
                                                </div>
                                            </div>
                                        </div>

                                        <!---- START HOURLY RATE ---->
                                        <div class="col-sm-12 col-xs-12" style="color:#fff;">
                                            <div class="form-group">
                                                <!--label class="col-md-12 control-label" style="padding-left:0px;">{{ $langLbl['Hourly Rate'] }}</labe-->
                                                <div class="col-md-12" style="padding:0;">
                                                    <select class="mobile-menu nav-tabs" id="professional-price-main-menu">
                                                        <option value="">{{ $langLbl['Select Hourly Rate'] }}</option>
                                                        <option class="placeholder_css" value="1">1-20</option>
                                                        <option class="placeholder_css" value="2">21-50</option>
                                                        <option class="placeholder_css" value="3">51-200</option>
                                                        <option class="placeholder_css" value="4">> 200</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <!---- \ END HOURLY RATE ---->

                                        <!---- START RATING RANGE ---->
                                        <div class="col-sm-12 col-xs-12" style="color:#fff;">
                                            <div class="form-group" style="margin:0px;">
                                                <!--label class="col-md-12 col-xs-12 control-label" style="padding-left:0px;">{{Lang::get('user.rating_range')}}</label-->

                                                <div class="col-sm-12 col-xs-12" style="padding:0">
                                                    <select class="mobile-menu nav-tabs" id="professional-main-menu">
                                                        <option value="">{{ $langLbl['Select Rating Range'] }}</option>
                                                        <option value="1">1</option>
                                                        <option value="2">2</option>
                                                        <option value="3">3</option>
                                                        <option value="4">4</option>
                                                        <option value="5">5</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <!---- \ END RATING RANGE ---->
                                        <!---- Online for Chat ---->
                                        <div class="col-sm-12 col-xs-12" style="color:#fff;">
                                            <div class="form-group" style="margin:0px;">
                                                <input type="checkbox" id="session_status" value="0" class="col-sm-1" style="height:15px;" {{Session::get('session_status') == 1 ? 'checked': ''}}/>
                                                <label class="col-sm-11" for="session_status" style="font-size: 15px; margin-top: 2px;">{{ $langLbl['Online for Chat'] }}</label>
                                            </div>
                                        </div>
                                        <!---- \END Online for Chat ---->
                                        <!---- AVAILABLE OUT OF OFFICE ---->
                                        <div class="col-sm-12 col-xs-12" style="color:#fff;">
                                            <div class="form-group" style="margin:0px;">
                                                <input type="checkbox" id="prof_office_available" value="0" class="col-sm-1" style="height:15px;" {{Session::get('professional_office_available') == 1 ? 'checked': ''}}/>
                                                <label class="col-sm-11" for="prof_office_available" style="font-size: 15px; margin-top: 2px;">{{ $langLbl['Offsite Available'] }}</label>
                                            </div>
                                        </div>
                                        <!---- \END AVAILABLE OUT OF OFFICE ---->
                                        <div class="col-sm-12 col-xs-12 text-center">
                                            <div class="form-group">
                                                <button type="button" class="btn green btn-block btn-circle btn-lg" id="js-prof-search">
                                                    <i class="fa fa-search"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </div>									
                                </div>
                                <!-- \ END PROFESSIONAL SERARCH -->


                                <!-- START SERVICE SEARCH -->
                                <div class="tab-pane page-quick-sidebar-alerts" id="quick_sidebar_tab_2">
                                    <div class="page-quick-sidebar-alerts-list">
                                        <div class="col-sm-12 col-xs-12">
                                            <div class="form-group">
                                                <div class="input-icon">
                                                    <i class="fa fa-pencil" style="margin-top:16px;"></i>
                                                    <input type="text" class="form-control input-lg input-circle custom-typeahead" id="js-text-keyword" placeholder="{{ $langLbl['Enter Keyword'] }}" value="{{ Session::get('keyword') }}">
                                                </div>
                                            </div>              
                                        </div>
                                        <div class="col-sm-12 col-xs-12">
                                            <div class="form-group">
                                                <div class="input-icon">
                                                    <i class="fa fa-map-marker" style="margin-top:16px;"></i>
                                                    <input type="text" class="form-control input-lg input-circle custom-typeahead" id="js-text-location" placeholder="Rome, Italy"  value="{{ Session::get('location') }}">
                                                </div>
                                            </div>
                                        </div>
                                        <!---- START PRICING RANGE ---->
                                        <div class="col-sm-12 col-xs-12" style="color:#fff;">
                                            <div class="form-group" style="margin:0px;">
                                                <!--label class="col-md-12 control-label" style="padding-left:0px;">{{ $langLbl['Price Range'] }}</label-->

                                                <div class="col-md-12" style="padding:0;">
                                                    <select class="mobile-menu nav-tabs" id="search-price-main-menu">
                                                        <option value="">{{ $langLbl['Select Price Range'] }}</option>
                                                        <option value="1">1-20</option>
                                                        <option value="2">21-50</option>
                                                        <option value="3">51-200</option>
                                                        <option value="4">> 200</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <!---- \ END PRICING RANGE ---->
                                        <!---- START RATING RANGE ---->

                                        <div class="col-sm-12 col-xs-12" style="color:#fff;">
                                            <div class="form-group" style="margin:0px;">
                                                <!--label class="col-md-12 control-label" style="padding-left:0px;">{{Lang::get('user.rating_range')}}</label-->
                                                <div class="col-md-12" style="padding:0">
                                                    <select class="mobile-menu nav-tabs" id="search-main-menu">
                                                        <option value="">{{ $langLbl['Select Rating Range'] }}</option>
                                                        <option value="1">1</option>
                                                        <option value="2">2</option>
                                                        <option value="3">3</option>
                                                        <option value="4">4</option>
                                                        <option value="5">5</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <!---- \ END RATING RANGE ---->
                                        <!---- AVAILABLE OUT OF OFFICE ---->
                                        <div class="col-sm-12 col-xs-12" style="color:#fff;">
                                            <div class="form-group" style="margin:0px;">
                                                <input type="checkbox" id="available_office" value="0" class="col-sm-1" style="height:15px;" {{Session::get('office_available') == 1 ? 'checked': ''}}/>
                                                <label class="col-sm-11" for="available_office" style="font-size: 15px; margin-top: 2px;">{{ $langLbl['Available offsite Services'] }}</label>
                                            </div>
                                        </div>
                                        <!---- \END AVAILABLE OUT OF OFFICE ---->

                                        <!---- START ONLINE PAYMENT ---->
                                        <div class="col-sm-12 col-xs-12" style="color:#fff;">
                                            <div class="form-group" style="margin:0px;">
                                                <input type="checkbox" id="online_payment" value="0" class="col-sm-1" style="height:15px;" {{Session::get('online_payment') == 1 ? 'checked' : ''}}/>
                                                <label class="col-sm-11" for="online_payment" style="font-size: 15px; margin-top: 2px;">{{ $langLbl['Online Payment'] }}</label>
                                            </div>
                                        </div>
                                        <!---- \ END ONLINE PAYMENT ---->

                                        <!---- START DISCOUNT AVAILABLE ---->
                                        <div class="col-sm-12 col-xs-12" style="color:#fff;">
                                            <div class="form-group" style="margin:0px;">
                                                <input type="checkbox" id="discount_available" value="0" class="col-sm-1" style="height:15px;" {{Session::get('discount_available') == 1 ? 'checked' : ''}}/>
                                                <label class="col-sm-11" for="discount_available" style="font-size: 15px; margin-top: 2px;">{{ $langLbl['Discount Available'] }}</label>
                                            </div>
                                        </div>
                                        <!---- \ END DISCOUNT AVAILABLE ---->

                                        <div class="col-sm-12 col-xs-12 text-center" style="margin-top:15px;">
                                            <div class="form-group">
                                                <button type="button" class="btn green btn-block btn-circle btn-lg" id="js-btn-search">
                                                    <i class="fa fa-search"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- \ END SERVICE SEARCH -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- / END SIDEBAR TOGGLER FOR SEARCH -->
</div>
<!-- END SLIDER -->
<div class="container">
    <div class="row">
        <div class="col-xs-12 fp"><div class="page-header" style="margin-bottom:25px!important;"><h2 class="color-default">{{ $langLbl['How it works'] }}</h2></div></div>
        <div class="col-xs-12 col-sm-4 ">
            <div class="flatpage-icon">
                <img alt="" src="/assets/img/1.png">
            </div>
            <h4>{{ $langLbl['Find a dog sitter near you'] }}</h4>
            <p class="blurb">
                {{ $langLbl['With thousands of trusted and insured dog sitters, you are sure to find the perfect one'] }}
            </p>
        </div>
        <div class="col-xs-12 col-sm-4 ">
            <div class="flatpage-icon">
                <img alt="" src="/assets/img/2.png">
            </div>
            <h4>{{ $langLbl['Schedule, book and pay online'] }}</h4>

            <p class="blurb">
                {{ $langLbl['No need for cash, and all bookings through the site are covered by pet insurance and a 24/7 vet line.'] }}
            </p>
        </div>
        <div class="col-xs-12 col-sm-4 ">
            <div class="flatpage-icon">
                <img alt="" src="/assets/img/3.png">
            </div>
            <h4>{{ $langLbl['Happy Dog!'] }}</h4>

            <p class="blurb">
                {{ $langLbl['Send your pooch on his own holiday confident he will have more fun than you.'] }}
            </p>
        </div>


    </div>
</div>    

<div class="container">
    <div class="row padding-top-normal padding-bottom-normal">
        <div class="col-sm-12 text-center"><h2 class="color-default">{{ $langLbl['Featured Professional'] }}</h2></div>
    </div>

    <div class="row">

        @foreach ($companies as $key => $company)
        <div class="col-sm-3">
            <div style="background: url({{ HTTP_COMPANY_PATH.$company->photo }});" class="card-simple">
                <div class="card-simple-background">
                    <div class="card-simple-content">
                        <h2>
                            <a href="{{ URL::route('company.detail', $company->slug) }}">
                                <?php
                                if (strlen($company->name) > 20)
                                    $company->name = substr($company->name, 0, 20) . '...';
                                ?>
                                {{ $company->name }}                     
                            </a>
                        </h2>
                        <div class="card-simple-rating">
                            <input id="js-number-rating" data-symbol="&#8226;" type="number" class="rating" min=0 max=5 step=1 data-show-clear=false data-show-caption=false data-size='xs' value="{{ $company->getRatingScore() }}" readonly=true>
                        </div>

                        <div class="card-simple-actions">
                            <a class="fa fa-search" href="{{ URL::route('company.detail', $company->slug) }}"></a>
                        </div>
                    </div>
                    <?php
                    foreach ($company->subClasses as $subClass) {
                        ?>                        
                        <div class="card-simple-price">{{$subClass->subClasses->$nameVal}}</div>
                        <?php
                        break;
                    }
                    ?>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
<div style="background:#eee;">
    <div class="container">
        <div class="row padding-top-normal padding-bottom-normal">
            <div class="col-sm-12 text-center"><h2 class="color-default">{{ $langLbl['Featured Services'] }}</h2>
                <!-- <img src="{{HTTP_COMPANY_PATH}}FeaturedServiceLogo.png" style="max-width: 100%;"/> -->
            </div>        
        </div>
    </div>
</div>
<!-- <div data-vide-bg="mp4: {{ HTTP_COMPANY_PATH }}home_old.mp4," data-vide-options="posterType: jpg, loop: true, auto-play:true, muted: false, position: 0% 0%"style="padding:70px 0;"> -->
<div style="background:#eee;padding-bottom:50px;">
    <div class="container">        
        <div class="row">
            @foreach ($stores as $key => $store)
            <div class="col-sm-3">
                <div style="background: url({{ HTTP_STORE_PATH.$store->photo }});" class="card-simple">
                    <div class="card-simple-background">
                        <div class="card-simple-content">
                            <h2><a href="{{ URL::route('store.detail', $store->slug) }}">
                                    <?php
                                    if (strlen($store->$nameVal) > 20)
                                        $store->name = substr($store->$nameVal, 0, 20) . '...';
                                    ?>
                                    {{ $store->name }}</a></h2>
                            <div class="card-simple-rating">
                                <input id="js-number-rating" data-symbol="&#8226;" type="number" class="rating" min=0 max=5 step=1 data-show-clear=false data-show-caption=false data-size='xs' value="{{ $store->getRatingScore() }}" readonly=true>
                            </div>
                            <div class="card-simple-actions">
                                <a href="{{ URL::route('store.detail', $store->slug) }}" class="fa fa-search"></a>
                            </div>
                        </div>
                        <div class="card-simple-label">                			
                            @foreach ($store->subCategories as $key => $value)
                            <a href="{{ URL::route('store.search').'?keyword='.$value->subCategory->name }}">{{ $value->subCategory->$nameVal }}</a>
                            <?php break; ?>                                
                            @endforeach
                        </div>
                        <?php $options = unserialize($store->options); ?>
                        <div class="card-simple-price">
                            &euro;{{ $store->price_value }}
                            @if($options['service_available'] == 1)
                            / {{$store->duration}}min
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>

<div class="container">

    <!-- START PLACE POST  AREA-->
    @if(count($posts) > 0)
    <div class="row">
        <div class="col-sm-12 text-center">
            <a href="{{ URL::route('store.posts' ) }}"><h2 class="color-default">{{ $langLbl['Latest Posts from our Professionals'] }}</h2></a>
        </div>        
    </div>
    <div class="row">
        @foreach($posts as $post)
        <?php
        $company = $post->company;
        $name = [];
        $subCategories = $post->subCategories;
        foreach ($subCategories as $s) {
            $name[] = $s->Category->$nameVal;
        }
        $cat_name = implode(",", $name);
        ?>
        <div class="col-md-6 col-sm-12 col-xs-6 margin-top-xs center_in">
         <div class="block_list1">
          <div class="row">
            <div class="col-md-4 col-xs-12 col-sm-4">
                <?php $slug = str_replace(" ", "_", $post->$postTitleVal); ?>
                <a href="{{ URL::route('post.detail', $post->slug) }}">
                    <img class="img-responsive img-rounded thumbanil" alt="" src="{{ HTTP_POST_PATH.$post->featured_image }}" >
                </a>
            </div>
            <div class="col-md-8 col-xs-12 col-sm-8">
                <h4 class="" style="text-transform: uppercase;">
                    <a href="{{ URL::route('post.detail', $post->slug) }}">{{ $post->$postTitleVal }}</a>
                </h4>

                <div class="clearfix"></div>
                <p style="word-wrap:break-word;">{{ substr($post->$postContentVal, 0, 150) }}</p>
                <a href="{{ URL::route('post.detail', $post->slug) }}" class="more1">{{ $langLbl['Read More'] }} <i class="icon-angle-right"></i></a>                        
            </div>
          </div>
        </div>
        </div>

        @endforeach
    </div>
    @endif
    <!-- END PLACE POST  AREA-->

    <!-- START PLACE professions POST  AREA-->
    @if(count($professions) > 0)
    <div class="row">
        <div class="col-sm-12 text-center"><a href="{{ URL::route('post.professions' ) }}"><h2 class="color-default">{{ $langLbl['World of Professionals'] }}</h2></a></div>       
    </div>                    
    <div class="row">
        @foreach($wof as $post)
        <?php 
            $currentLang1 = (isset($_COOKIE['current_lang']))? $_COOKIE['current_lang'] : "en";
            $content = "post_content".$currentLang1;
            $title = "post_title".$currentLang1;
        ?>
        <div class="col-md-6 col-sm-12 col-xs-6 margin-top-xs center_in">
          <div class="block_list2">
           <div class="row">
            <div class="col-md-4 col-xs-12 col-sm-4">
                <?php $slug = str_replace(" ", "_", $post->$title); ?>
                <a href="{{ URL::route('wof.detail', $post->id) }}">
                    <img class="img-responsive img-rounded thumbanil" alt="" src="{{ HTTP_HOWITWORKS_PATH.$post->image }}" >
                </a>
            </div>
            <div class="col-md-8 col-xs-12 col-sm-8">
                <h4 class="" style="text-transform: uppercase;">
                    <a href="{{ URL::route('wof.detail', $post->id) }}">{{ $post->$title }}</a>
                </h4>

                <div class="clearfix"></div>
                <p>{{ substr($post->$content, 0, 150) }}</p>
                <a href="{{ URL::route('wof.detail', $post->id) }}" class="more1">{{ $langLbl['Read More'] }} <i class="icon-angle-right"></i></a>                        
            </div>
           </div>
          </div>
        </div>

        @endforeach
    </div>    
    @endif
    <!-- END PLACE  professions POST  AREA-->
</div>
@stop

@section('custom-scripts')
{{ HTML::script('/assets/metronic/global/plugins/carousel-owl-carousel/owl-carousel/owl.carousel.min.js') }}
{{ HTML::script('/assets/metronic/global/plugins/jquery.vide.js') }}
{{ HTML::script('/assets/metronic/global/plugins/slider-revolution-slider/rs-plugin/js/jquery.themepunch.plugins.min.js') }}
{{ HTML::script('/assets/metronic/global/plugins/slider-revolution-slider/rs-plugin/js/jquery.themepunch.revolution.min.js') }}
{{ HTML::script('/assets/metronic/frontend/pages/scripts/revo-slider-init.js') }}
{{ HTML::script('/assets/js/bootstrap-tooltip.js') }}
@include('js.user.home.index')
<script>
    $(document).ready(function() {
        var login_required = "<?php echo Session::get('login_required'); ?>";
        if(login_required == "required"){
            var login_required_flush = "<?php Session::forget('login_required'); ?>";
                bootbox.alert("{{ $langLbl['you need to login'] }}");
                    window.setTimeout(function(){
                    bootbox.hideAll();
                }, 4000);
            }
    
        jQuery('.fullwidthabnner').revolution({startheight: 650});
        $("#owl-demo").owlCarousel({
            autoPlay: 3000, //Set AutoPlay to 3 seconds       
            items: 4,
            itemsDesktop: [1199, 3],
            itemsDesktopSmall: [979, 3]
        });
    });
</script>      
@stop

@stop
