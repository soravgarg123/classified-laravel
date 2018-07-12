@extends('user.layout')
@section('custom-styles')
{{ HTML::style('/assets/metronic/global/plugins/carousel-owl-carousel/owl-carousel/owl.carousel.css') }}
<style>
    #owl-demo .item{
        margin: 7px;
    }
    p.dark-text{
        color:#555;
    }
</style>
@stop

@section('main')
<?php
$nameVal = 'name' . $currentLanguage;
$descriptionVal = 'description' . $currentLanguage;
$postTitleVal = 'post_title' . $currentLanguage;
$postContentVal = 'post_content' . $currentLanguage;
?>
<div class="container">   
    <div class="row margin-bottom-30 padding-top-normal">

        <div class="col-md-3 front-carousel">
            <div style="position: relative;" class="thumbnail">
                <?php
                $tooltip = "<h4>" . $company->name . "</h4>";
                $tooltip.= "<p><b>" . $langLbl['Keywords'] . " : </b>";
                $keywords = explode(",", $company->keyword);
                foreach ($keywords as $subKey => $value) {
                    if ($subKey != 0)
                        $tooltip.=", ";
                    $tooltip.= $value;
                }
                $tooltip.= "</p>";
                $tooltip.= "<p><b>" . $langLbl['Email'] . " : </b>" . $company->email . "</p>";
                $tooltip.= "<p><b>" . $langLbl['Phone'] . " : </b>" . $company->phone . "</p>";
                $tooltip.= "<p><b>" . $langLbl['VAT ID'] . " : </b>" . $company->vat_id . "</p>";
                $tooltip.= "<p><b>" . $langLbl['Zip Code'] . " : </b>" . $company->zip_code . "</p>";
                $tooltip.= "<p><b>" . $langLbl['Address'] . " : </b>" . $company->address . "</p>";
                $tooltip.= "<p><b>" . $langLbl['Description'] . " : </b>" . substr($company->$descriptionVal, 0, 300) . "</p>";
                ?>
                <a href="{{ URL::route('company.detail', $company->slug) }}" >
                    <div style="height: 250px; width: 100%; background: url({{ HTTP_COMPANY_PATH.$company->photo }}); background-size: cover;" data-placement="right" data-toggle="tooltip" data-html="true" data-title="{{ $tooltip }}"></div>
                </a>
                <h4 class="color-default margin-top-xs">
                    <a href="{{ URL::route('company.detail', $company->slug) }}" data-toggle="tooltip"  data-html="true" data-title="{{ $tooltip }}">
                        {{ $company->name }}
                    </a>
                </h4>
                <div class="pull-left">
                    @if((int)$company->session_status == 1)
                    <div class="usr-status isOnline"></div><span style="color:#60cc00;"><b>&nbsp;{{ $langLbl['ONLINE'] }}</b></span>
                    @else
                    <div class="usr-status isOffline"></div><span style="color:#cccccc;"><b>&nbsp;{{ $langLbl['OFFLINE'] }}</b></span>
                    @endif
                </div>
                <div class="icons">
                    <ul>
                        <li><img title="{{ $langLbl['Email-id Verified'] }}" src="{{ MY_BASE_URL }}/icons/Email Verified.png"></li>
                        @if((int)$company->phone_verified == 0)
                            <li><img title="{{ $langLbl['Phone Verified'] }}" src="{{ MY_BASE_URL }}/icons/Telephone Verified.png"></li>
                        @else
                            <li><img title="{{ $langLbl['Phone Not Verified'] }}" src="{{ MY_BASE_URL }}/icons/phone.png"></li>
                        @endif

                        @if((int)$company->payment_verified == 0)
                            <li><img title="{{ $langLbl['Payment Verified'] }}" src="{{ MY_BASE_URL }}/icons/Payment Verified.png"></li>
                        @else
                            <li><img title="{{ $langLbl['Payment Not Verified'] }}" src="{{ MY_BASE_URL }}/icons/euro.png"></li>
                        @endif
                        
                    </ul>
                </div>
                <div class="clearfix"></div>
                <div class="pull-left">                            
                    <input id="js-number-rating" data-symbol="&#8226;" type="number" class="rating" min=0 max=5 step=1 data-show-clear=false data-show-caption=false data-size='xs' value="{{ $company->getRatingScore() }}" readonly=true>
                </div>
                <span class="pull-left company-highlight" style="padding:12px;">( {{$company->getRatingCount()}} {{ $langLbl['Reviews'] }} )</span>
                <div class="clearfix"></div>

            </div>
        </div>
        <div class="col-md-6" id="detail_div_blog">
            <div  style="background:transparent;border:none;margin-bottom:20px;">
                @foreach($company->subClasses as $subClass)
                <span style="font-size:14px;margin-right:10px;"><b><i class="{{$subClass->subClasses->icon}}"></i> {{$subClass->subClasses->$nameVal}}</b></span>
                @endforeach               			
            </div>
            <h2>{{ $langLbl['About Me'] }}</h2>
            <nav class="social_links">
            <ul>
                <li class="fb"><a target="_blank" title="Facebook" href="http://www.facebook.com/sharer.php?u={{ URL::route('company.detail', $company->slug) }}"><span class="fa fa-facebook"></span></a></li>
                <li class="gp"><a target="_blank" title="Google Plus" href="https://plus.google.com/share?url={{ URL::route('company.detail', $company->slug) }}"><span class="fa fa-google"></span></a></li>
                <li class="tw"><a target="_blank" title="Twitter" href="http://twitter.com/home?status={{ URL::route('company.detail', $company->slug) }}"><span class="fa fa-twitter"></span></a></li>
                <li class="pt"><a target="_blank" title="Pinterest" href="https://www.pinterest.com/pin/create/button/?url={{ URL::route('company.detail', $company->slug) }}&description={{ $company->$descriptionVal }}&media={{ HTTP_COMPANY_PATH.$company->photo }}&title={{ $company->name }}" data-pin-do="buttonPin" data-pin-config="above"><span class="fa fa-pinterest"></span></a></li>
            </ul>
        </nav>
            <p style="word-wrap:break-word;text-align: justify;" class="drop-cap">
            <?php if(empty($company->$descriptionVal)){
                     echo $company->description;
            }else{ 
                    echo $company->$descriptionVal.$company->$descriptionVal.$company->$descriptionVal.$company->$descriptionVal;
            } ?>
            </p>
            <a href="javascript:void(0);" class="read_more_btn">{{ $langLbl['Read More'] }}</a>
            <a href="javascript:void(0);" style="display:none;" class="read_less_btn">{{ $langLbl['Read Less'] }}</a>
        </div>


        <div class="col-md-3 testimonials-v1">
            <div class="portlet yellow box" style="border:none;background-color:transparent;">
                <div class="portlet-body" style="display:inline-block;">
                    <?php
                    $originalDate = $company->created_at;
                    $newDate = $langLbl[date("M", strtotime($originalDate))] . ' ' . date("Y", strtotime($originalDate));
                    ?>
                    <p><b><i class="fa fa-group"></i>&nbsp;{{ $langLbl['Member Since'] }} </b>{{$newDate}}</p>
                    @if($company->country)
                    <p><b><i class="fa fa-globe"></i>&nbsp;{{ $langLbl['From'] }} </b>{{$company->getCountryName()->short_name}}</p>
                    @endif
                    @if($company->languages)
                    <p><b><i class="fa fa-comments"></i>&nbsp;{{ $langLbl['Speaks'] }} </b>{{$company->getLang()}}</p>
                    @endif
                    @if($company->register != '')
                    <p class="dark-text"><b>{{ $langLbl['Registered to'] }}</b></p>
                    <p class="dark-text">{{ $langLbl[$company->register] }}</p>
                    @endif
                    @if($company->user_key != '')
                    <p class="dark-text"><b>No. </b>{{$company->user_key}}</p>
                    @endif
                    @if($company->city != '')
                    <p class="dark-text"><b>{{ $langLbl['City of'] }}</b> {{$company->city}}</p>
                    @endif
                    @if($company->reg_no != '')
                    <p class="dark-text"><b>{{ $langLbl['reg no'] }}</b> {{$company->reg_no}}</p>
                    @endif
                    @if($company->rate)
                    <p><b>EUR </b>€ {{$company->rate}},00</p>
                    @endif
                    <p><b>{{ $langLbl['Skills Booked'] }} </b>{{$company->getBooked()}}</p>
                    <?php
                    $office_available = 0;
                    foreach ($stores as $store) {
                        $options = unserialize($store->options);
                        if ($options['office_available'] == 1) {
                            $office_available = 1;
                            break;
                        }
                    }
                    ?>
                    @if($office_available == 1)
                    <p><div class="usr-status isOnline"></div><span style="color:#F3565D;"><b>&nbsp;{{$langLbl['Available for Offsite Service'] }}</b></span></p>
                    @endif
                    <div class="row">
                        <?php $sessData = Session::all(); 
                            if(isset($sessData['user_type']) && ($sessData['user_type'] == "user" || $sessData['user_type'] == "professional")) { ?>
                                <button class="btn btn-primary btn-lg btn-block" main="{{$company->id}}" u_type="professional" id="js-btn-send-message"><i class="fa fa-wechat"></i> {{ $langLbl['CONTACT NOW'] }}</button>
                            <?php } else{ ?>
                                <a href="{{ URL::route('user.login') }}" class="btn btn-primary btn-lg btn-block"><i class="fa fa-wechat"></i> {{ $langLbl['CONTACT NOW'] }}</a>
                            <?php } ?>
                    </div>
                    <!-- <div class="row margin-top-normal" id="js-div-message" style="display: none;">	                            
                        <h4 class="color-default">{{$langLbl['Send Message'] }}</h4>
                        <form action="{{ URL::route('user.sendMessagepro') }}" role="form" method="post">
                            <input type="hidden" name="company_id" value="{{ $company->id }}"/>
                            <input type="hidden" value="{{ $company->slug }}" name="slug_name_hidden">
                            <div class="form-group">
                                <label for="contacts-name">{{$langLbl['Name'] }}</label>
                                <input required type="text" class="form-control" name="name">
                            </div>
                            <div class="form-group">
                                <label for="contacts-email">{{$langLbl['Email'] }}</label>
                                <input required type="email" class="form-control" name="email">
                            </div>
                            <div class="form-group">
                                <label for="contacts-message">{{$langLbl['Message'] }}</label>
                                <textarea required class="form-control" rows="5" name="description"></textarea>
                            </div>
                            <button type="submit" class="btn btn-primary pull-right"><i class="icon-ok"></i> {{$langLbl['Send'] }}</button>
                        </form>	                            
                    </div> -->
                </div>
            </div>
        </div>
        <div class="row padding-top-normal padding-bottom-normal">
            <div class="col-sm-12 text-center padding-top-normal padding-bottom-normal"><h2 class="color-default">{{$langLbl['Featured Services'] }}</h2></div>        
        </div>
        <div class="row">
            @foreach ($stores as $key => $store)
            <div class="col-sm-3">
                <div style="position: relative;" class="thumbnail">
                    <?php
                    $tooltip = "<h4>" . $store->$nameVal . "</h4>";
                    $tooltip.= "<p><b>" . $langLbl['Keywords'] . " : </b>";
                    $keywords = explode(",", $store->keyword);
                    foreach ($keywords as $subKey => $value) {
                        if ($subKey != 0)
                            $tooltip.=", ";
                        $tooltip.= $value;
                    }
                    $tooltip.= "</p>";
                    $tooltip.= "<p><b>" . $langLbl['Email'] . " : </b>" . $store->company->email . "</p>";
                    $tooltip.= "<p><b>" . $langLbl['Phone'] . " : </b>" . $store->company->phone . "</p>";
                    $tooltip.= "<p><b>" . $langLbl['Price'] . " : </b> &euro;" . $store->price_value;
                    $tooltip.= "<p><b>" . $langLbl['VAT ID'] . " : </b>" . $store->company->vat_id . "</p>";
                    $tooltip.= "<p><b>" . $langLbl['Description'] . " : </b>" . substr($store->$descriptionVal, 0, 300) . "</p>";
                    ?>
                    <a href="{{ URL::route('store.detail', $store->slug) }}">
                        <div style="height: 145px; width: 100%; background: url({{ HTTP_STORE_PATH.$store->photo }}); background-size: cover;" data-toggle="tooltip" data-placement="{{ $key % 4 == 3 ? 'left' : 'right' }}" data-html="true" data-title="{{ $tooltip }}"></div>
                    </a>
                    <h4 class="color-default margin-top-xs">
                        <a href="{{ URL::route('store.detail', $store->slug) }}" data-toggle="tooltip" data-placement="{{ $key % 4 == 3 ? 'left' : 'right' }}" data-html="true" data-title="{{ $tooltip }}">
                            {{ $store->name }}
                        </a>
                    </h4>

                    <div class="pull-left">                            
                        <input id="js-number-rating" data-symbol="&#8226;" type="number" class="rating" min=0 max=5 step=1 data-show-clear=false data-show-caption=false data-size='xs' value="{{ $store->getRatingScore() }}" readonly=true>
                    </div>
                    <span class="pull-left company-highlight" style="padding:12px;">( {{$store->getRatingCount()}} {{ $langLbl['Reviews'] }} )</span>
                    <div class="clearfix"></div>

                </div>
            </div>
            @endforeach
        </div>

        <!-- START PLACE POST  AREA-->
        @if(count($posts) > 0)
        <div class="row padding-top-normal padding-bottom-normal">
            <div class="col-sm-12 text-center padding-top-normal padding-bottom-normal"><h2 class="color-default">{{ $langLbl['Posts Published'] }}</h2></div>        
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
            <div class="col-md-6 margin-top-xs">
                <div class="col-md-4 col-sm-4">
                    <?php $slug = str_replace(" ", "_", $post->$postTitleVal); ?>
                    <a href="{{ URL::route('post.detail', array($post->id, $slug)) }}">
                        <img class="img-responsive img-rounded" alt="" src="{{ HTTP_POST_PATH.$post->featured_image }}" >
                    </a>
                </div>
                <div class="col-md-8 col-sm-8">
                    <h4 class="" style="text-transform: uppercase;">
                        <a href="{{ URL::route('post.detail', array($post->id, $slug))  }}">{{ $post->$postTitleVal }}</a>
                    </h4>

                    <div class="clearfix"></div>
                    <p>{{ substr($post->$postContentVal, 0, 150) }}</p>
                    <a href="{{ URL::route('post.detail', $post->id ) }}" class="more">{{ $langLbl['Read More'] }} <i class="icon-angle-right"></i></a>                        
                </div>
            </div>

            @endforeach
        </div>
        @endif
        <!-- END PLACE POST  AREA-->
        <hr/>
        <div class="row padding-top-normal padding-bottom-normal">
            <div class="col-sm-12 text-center"><h2 class="color-default">{{ $langLbl['Recent Reviews'] }}</h2></div>        
        </div>
        <div class="row padding-bottom-normal">
            <div class="col-sm-12">
                <div id="owl-demo" class="owl-carousel owl-theme">
                    @foreach ($feedbacks as $feedback)
                    <div class="item">
                        <div class="testimonials-v1">
                            <blockquote><p>{{ $feedback->description }}</p></blockquote>
                            <table>
                                @foreach ($feedback->ratings as $rating)
                                <tr>
                                    <td class="text-right"><b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{ $rating->type->$nameVal }}&nbsp;:&nbsp;</b></td>
                                    <td>
                                        <input id="js-number-rating" data-symbol="&#8226;" type="number" class="rating" min=0 max=5 step=1 data-show-clear=false data-show-caption=false data-size='xs' value="{{ $rating->answer }}" readonly=true>                                
                                    </td>
                                </tr>
                                @endforeach
                            </table>
                            <div class="carousel-info">
                                <img class="pull-left" src="{{ HTTP_USER_PATH.$feedback->user->photo }}" style="height: 60px; width: 60px;">
                                <div class="pull-left">
                                    <span class="testimonials-name" style="margin-top: 10px;">{{ $feedback->user->name }}</span>
                                    <span class="testimonials-post"><i class="fa fa-clock-o"></i>&nbsp;{{ date(DATE_FORMAT, strtotime($feedback->created_at)) }}</span>
                                </div>
                            </div>                    
                        </div>
                    </div>
                    @endforeach
                </div>    
            </div>        
        </div>
    </div>
</div>

@stop

@section('custom-scripts')
{{ HTML::script('/assets/metronic/global/plugins/carousel-owl-carousel/owl-carousel/owl.carousel.min.js') }}
{{ HTML::script('/assets/js/bootstrap-tooltip.js') }}
@include('js.user.home.index')
@include('chating_common')
<script>
    $(document).ready(function() {
        var desc_height = parseInt($('p.drop-cap').height());
        if(desc_height > 240){
            $('.read_more_btn').show();
            $('.read_less_btn').hide();
            var columnHeight = 240;
            $("#detail_div_blog p").css('height', columnHeight + 'px');
        }else{
            $('.read_more_btn').hide();
            $('.read_less_btn').hide();
        }
        $("#owl-demo").owlCarousel({
            autoPlay: 3000, //Set AutoPlay to 3 seconds       
            items: 4,
            itemsDesktop: [1199, 3],
            itemsDesktopSmall: [979, 3]
        });
        $('.prof_scroller').slimScroll({
            color: '#57b5e3',
            height: '480px'
        });
    });

/*    $("button#js-btn-send-message").click(function() {
        if ($("div#js-div-message").css("display") == "none") {
            $("div#js-div-message").show();
        } else {
            $("div#js-div-message").hide();
        }
    });*/

    $(".read_more_btn").click(function(){
    $('.read_less_btn').show();
    $('.read_more_btn').hide();
    $("p.drop-cap").addClass("para_text");
    });
    $(".read_less_btn").click(function(){
        $('.read_less_btn').hide();
        $('.read_more_btn').show();
        $("p.drop-cap").removeClass("para_text");
    });
</script>

<!-- Text-Chating Script Start -->
    
<script type="text/javascript">
    $(document).ready(function(){
        $('body').on('click','#js-btn-send-message',function(){
            var userid = $(this).attr('main');
            var u_type = $(this).attr('u_type');
            var unique_id;
            if(u_type == "professional"){
                unique_id = "p" + userid;
            }else{
                unique_id = "u" + userid;
            }
            var user_string = $('#hidden_array').val();
            var chatingURL = "<?php echo url(); ?>"; 
            var user_array = user_string.split(",");
            if($.inArray(unique_id,user_array) == -1){
                  user_array.push(unique_id); // insert id in id array
                  var usertostring = user_array.toString();
                  $('#hidden_array').val(usertostring); // set array string in hidden value 
                  $(".chatting_main").append('<div class="chating_wind_wrapper chat_window_'+unique_id+'"></div>');
                  $(".chat_window_"+unique_id).load(chatingURL+'/chatbox/'+unique_id);
              }else{
                return false;
              }
        });
    });
</script>

<!-- Text-Chating Script End -->

@stop
@stop