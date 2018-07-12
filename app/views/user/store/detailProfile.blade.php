@extends('user.layout')

@section('custom-styles')
{{ HTML::style('/assets/metronic/global/plugins/bootstrap-fileinput/bootstrap-fileinput.css') }}
{{ HTML::style('/assets/metronic/frontend/onepage/css/custom.css') }}
{{ HTML::style('/assets/metronic/global/plugins/bootstrap-modal/css/bootstrap-modal.css') }}
{{ HTML::style('/assets/css/bootstrap-checkbox.css') }}
<style>
    .faq-tabbable i {
        color: #000 !important;
    }
    .modal-scrollable{
        z-index:7900 !important;
    }
    .rating-xs{
        font-size: 1.2em !important;
    }
    .xdsoft_datetimepicker .xdsoft_datepicker{
        width:306px;
    }
    .xdsoft_datetimepicker .xdsoft_timepicker{
        width:85px;
    }
    .btn-secondary{
        padding:8px 15px !important;
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
<?php $company = $store->company; ?>

<!-- <div id="map-canvas" style="height: 450px; width: 100%;margin-top:0px;" class="margin-top-xs"></div> -->
<div class="mb80">
    <div class="detail-banner" style="background-image: url({{HTTP_STORE_PATH}}detail-banner-1.jpg);">
        <div class="container">
            <div class="detail-banner-left">
                <div class="detail-banner-info">
                </div><!-- /.detail-banner-info -->
                <h2 class="detail-title">
                    {{$store->$nameVal}}
                </h2>
                <h4 class="detail-title">
                    {{$category_details->$nameVal}}
                </h4>
                <div class="detail-banner-rating">
                    <input id="js-number-rating" data-symbol="&#8226;" type="number" class="rating" min=0 max=5 step=1 data-show-clear=false data-show-caption=false data-size='xs' value="{{ $store->getRatingScore() }}" readonly=true style="cursor: pointer;" data-symbol="&#8226;">
                </div><!-- /.detail-banner-rating -->
            </div><!-- /.detail-banner-left -->
        </div><!-- /.container -->
    </div><!-- /.detail-banner -->

</div>
<div class="container">
    <div class="row detail-content padding-bottom-normal">
        <!-- START LEFT SIDE -->
        <div class="col-sm-7">
            <div class="detail-gallery">
                <div class="detail-gallery-preview">
                    <a href="#" class="cboxElement">
                        <img src="{{ HTTP_STORE_PATH.$store->photo }}" style="width:622px;height:350px;" class="img-responsive thumbnail">
                    </a>
                </div>            
            </div><!-- /.detail-gallery -->

            <?php $options = unserialize($store->options); if($options['service_available']) { ?>
            <h2>{{ $langLbl['We Are Here'] }}</h2>
            <div class="background-white">
                <!-- Tab panes -->
                <div class="tab-content">
                    <div role="tabpanel" class="tab-pane fade in active" id="simple-map-panel">
                        <div class="detail-map">
                            <div class="map-position">
                                <div id="map-canvas" style="height: 450px; width: 100%;margin-top:0px;" class="margin-top-xs"></div>                            
                            </div><!-- /.map-property -->
                        </div><!-- /.detail-map -->
                    </div>                
                </div>
            </div>
            <?php } ?>

            @if (count($store->feedbacks) > 0)
            <h2 id="reviews">{{ $langLbl['All Reviews'] }}</h2>
            <div class="reviews">
            
                @foreach ($store->feedbacks as $feedback)
                <div class="review">
                    <div class="review-image">
                        <img class="img-responsive thumbnail" src="{{ HTTP_USER_PATH.$feedback->user->photo }}" alt="">
                    </div><!-- /.review-image -->

                    <div class="review-inner">
                        <div class="review-title">
                            <h2>{{ $feedback->user->name }}</h2>

                            <span class="report">
                                <span class="separator">•</span><i class="fa fa-flag" title="" data-toggle="tooltip" data-placement="top" data-original-title="{{ $langLbl['Report'] }}"></i>
                            </span>

                            <div class="review-overall-rating">
                                <?php
                                $total_rating = 0;
                                foreach ($feedback->ratings as $rating) {
                                    $total_rating += $rating->answer;
                                }
                                $avg_rating = (int) ($total_rating / 3);
                                ?>	                	

                                <input id="js-number-rating" data-symbol="&#8226;" type="number" class="rating" min=0 max=5 step=1 data-show-clear=false data-show-caption=false data-size='xs' value="{{ $avg_rating }}" readonly=true>
                            </div><!-- /.review-rating -->
                        </div><!-- /.review-title -->

                        <div class="review-content-wrapper">
                            <div class="review-content">
                                <div class="review-pros">
                                    <p>{{$feedback->description}}</p>
                                </div><!-- /.pros -->	                    
                            </div><!-- /.review-content -->

                            <div class="review-rating">
                                <dl>
                                    @foreach ($store->company->visibleRatingTypes as $ratingType)
                                    <dt>{{$ratingType->$nameVal}}</dt>
                                    <dd>
                                        @if ($ratingType->is_score)
                                        <input id="js-number-rating" data-symbol="&#8226;" type="number" class="rating" min=0 max=5 step=1 data-show-clear=false data-show-caption=false data-size='xs' value="{{ $feedback->getTypeScore($ratingType->id) }}" readonly=true>
                                        @else
                                        {{ $feedback->getTypeScore($ratingType->id) == -1 ? '--' :  ($feedback->getTypeScore($ratingType->id) == 0 ? 'No' : 'Yes') }}
                                        @endif
                                    </dd>
                                    @endforeach
                                </dl>
                            </div><!-- /.review-rating -->
                        </div><!-- /.review-content-wrapper -->

                    </div><!-- /.review-inner -->
                </div><!-- /.review -->
                @endforeach

            </div><!-- /.reviews -->
            @endif

        </div><!-- /.col-sm-7 -->
        <!-- END LEFT SIDE -->
        <!-- START RIGHT SIDE -->
        <div class="col-sm-5">
            <div class="background-white p20"> 
                <div class="rating_social clearfix">
                     <div class="detail-overview-rating">
                        <input id="js-number-rating" data-symbol="&#8226;" type="number" class="rating" min=0 max=5 step=1 data-show-clear=false data-show-caption=false data-size='xs' value="{{ $store->getRatingScore() }}" readonly=true style="cursor: pointer;">
                    </div>
                    <nav class="social_links">
                        <ul>
                            <?php $currentURL = $_SERVER['REQUEST_SCHEME']."://".$_SERVER['SERVER_NAME']."".$_SERVER['REQUEST_URI']; ?>
                            <li class="fb"><a target="_blank" title="Facebook" href="http://www.facebook.com/sharer.php?u=<?php echo $currentURL; ?>"><span class="fa fa-facebook"></span></a></li>
                            <li class="gp"><a target="_blank" title="Google Plus" href="https://plus.google.com/share?url=<?php echo $currentURL; ?>"><span class="fa fa-google"></span></a></li>
                            <li class="tw"><a target="_blank" title="Twitter" href="http://twitter.com/home?status=<?php echo $currentURL; ?>"><span class="fa fa-twitter"></span></a></li>
                            <li class="pt"><a target="_blank" title="Pinterest" href="https://www.pinterest.com/pin/create/button/?url=<?php echo $currentURL; ?>&description={{ $store->$descriptionVal }}&media={{ HTTP_STORE_PATH.$store->photo }}&title={{$store->$nameVal}}" data-pin-do="buttonPin" data-pin-config="above"><span class="fa fa-pinterest"></span></a></li>
                        </ul>
                    </nav>
                </div>
                <!-- START BOOKING DETAIL OPTIONS -->	
                <?php
                
                $available_officies = [];
                foreach ($personal_officies as $office) {
                    if ($office->office->office_available == '1')
                        $available_officies[] = $office;
                }
                $flag = 0; // out of office not avaialble
                ?>
                <div class="pi-price">
                    <?php if($options['service_available']) { ?>
                       <strong>&#8364;<em>{{ $store->price_value }}</em></strong>
                       <input type="hidden" id="price" value="{{ $store->price_value }}"/>
                    <?php } else{ ?>
                        <strong>{{ $langLbl['Free Service'] }}</strong>
                    <?php } ?>
                </div>

                @if( $options['discount_available'] == 1 )
                <div class="col-md-12" style="padding:0;">
                    <p><b style="color:#E6400C;font-size:17px;">&euro; {{ $options['discount_price'] }}</b> {{ $langLbl['with online payment'] }}!</p>
                    <input type="hidden" id="discount_price" value="{{$options['discount_price']}}">
                </div>
                @endif
                @if($options['service_available'] == 1)
                <p>{{ $langLbl['Duration of service'] }} {{$store->duration}}min</p>
                @else
                @if($options['delivery_place'] == 'online')
                <p>{{ $langLbl['Delivery by email'] }}</p>
                @else
                <p>{{ $langLbl['Delivery to the office'] }}</p>
                @endif
                @endif
                    <?php $serviceOfficies = [];
                    $holidays = []; ?>

                @if( ($options['delivery_place'] == 'office' && $options['office_available'] == '1') || $options['service_available'] == 1 )

                @if( ($options['office_available'] == '1' ) && (count($available_officies) > 0) ) 

                    <?php $flag = 1; ?>

                <div class="col-md-12 checkbox-list" style="padding:0px; margin-bottom:5px;">
                
                    <p><b>{{ $langLbl['Service Available in'] }}:</b></p>
                    @foreach($personal_officies as $office)

                    @if($office->office->office_available == 1)
                    <div style="padding-bottom: 15px;">
                        <p style="margin-bottom:0px;">{{$office->office->address}}</p>
                        <div class="usr-status isOnline" style="margin-top:5px;"></div><span style="font-size:13px;">&nbsp;{{ $langLbl['Available out of office'] }} max  {{$options['office_range']}}Km</span>
                    </div>
                    @endif
                    @endforeach
                    <div class="checkbox-list" style="background-color:#da4f49;">
                        <label style="color:#fff; font-size:13px;">
                            <input type="checkbox" id="home"><span style="margin-left:5px;">{{ $langLbl['I want to book offsite service'] }}</span></label>
                    </div>
                </div>
                @endif

                <!-- START OFFICE SETTING -->

                <div class="col-md-12" style="padding:0px; margin-bottom:20px;" id="officies">

                    @if(count($personal_officies)>1)

                    <select class="form-control" id="service_office">
                        <option disabled selected>{{ $langLbl['Select where'] }}</option>
                        <?php $i = 0; ?>
                        @foreach ($personal_officies as $office)
                        <?php $serviceOfficies[] = $office->office->opening;
                        $holidays[] = $office->office->holidays; ?>		                                		
                        <option value="{{$office->office->id}}"  office-index ="{{$i}}">{{$office->office->name}}</option>
                    <?php $i++; ?>
                        @endforeach
                    </select>
                    @else

                    <?php
                    if (isset($personal_officies[0])) {
                        $serviceOfficies[] = $personal_officies[0]->office->opening;
                        $holidays[] = $personal_officies[0]->office->holidays;
                        ?>
                        <span class="form-control" id="service_office" value="{{$personal_officies[0]->office->id}}" office-index="0">{{ $personal_officies[0]->office->name }}{{ ($personal_officies[0]->office->office_available == 1 && $flag == 1 ) ? '('. $langLbl['Available out of office'] .')': ''}}</span>
<?php } ?>
                    @endif
                </div>			                                
                @endif
                <!-- \ END OFFICE SETTING -->

                <!-- START SERVICE AVAILABLE -->
                @if($options['service_available'] == 1)
                <!-- START DATETIMEPICKER FOR BOOKING  -->
                <div class="col-md-12" style="padding:0px; margin-bottom:20px;">
                    <div class="input-group date form_datetime">
                        <input type="text" size="16" readonly="" class="form-control"  placeholder="{{ $langLbl['When'] }}?" id="date_picker">
                        <span class="input-group-btn">
                        <!-- <button class="btn default date-reset" type="button"><i class="fa fa-times"></i></button> -->
                            <button class="btn default date-set" type="button" onmousedown="jQuery('#date_picker').trigger('mousedown');" style="padding:7px 14px !important;"><i class="fa fa-calendar"></i></button>
                        </span>
                    </div>																			
                </div>
                <!-- \ END DATETIMEPICKER FOR BOOKING -->

                <!-- START DURATION SETTING -->
                <div class="col-md-12" style="padding:0px; margin-bottom:20px;">
                    @if($store->book_amount == 1)
                    <input type="hidden" value="1" id="duration" />
                    <input type="text" class="form-control" disabled value="{{ $langLbl['Book'] }} 1 (&euro;{{$store->price_value}})" />
                    @else
                    <select class="form-control" id="duration">
                        <option value="" disabled selected>Duration:</option>
                        @for($i = 1;$i <= $store->book_amount; $i++)
<?php $duration_price = $i * $store->price_value; ?>	                                			
                        <option value={{$i}}>{{ $langLbl['Book'] }} {{$i}} (&euro;{{$duration_price}})</option>
                        @endfor
                    </select>
                    @endif
                </div>
                <!-- \ END DURATION SETTING-->
                @else
                <p style="font-size:14px;"><b>{{ $langLbl['Max days for delivery'] }} : </b>{{ $options['delivery_days'] }} {{ $langLbl['days'] }}</p>				                           						                           		
                @endif
                <!-- \ END SERVICE AVAILABLE -->
                <!-- MODAL DIALOG FOR BOOK -->
                <div class="modal fade" id="basic" tabindex="-1" role="basic" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                                <h4 class="modal-title">{{ $langLbl['Your Booking'] }}</h4>
                            </div>
                            <div class="modal-body">
                                <form>															
                                    <div class="row">
                                        <div class="col-md-5">
                                            @if($options['service_available'] == 1)
                                            <span class="col-md-12 form-control">{{ $langLbl['Booking Date'] }}:</span></br></br>

                                            <span class="col-md-12 form-control">{{ $langLbl['Duration'] }}:</span></br></br>

                                            @else
                                            <span class="col-md-12 form-control">{{ $langLbl['Max days for delivery'] }}:</span></br></br>
                                            <span class="col-md-12 form-control">{{ $langLbl['Delivery Place'] }}:</span></br></br>
                                            @endif
                                            <?php if($options['service_available']) { ?>
                                            <span class="col-md-12 form-control">{{ $langLbl['Pay to the office'] }}(&#8364;):</span></br></br>
                                            <?php } ?>
                                            @if($options['discount_available'] == 1)
                                            <span class="col-md-12 form-control">{{ $langLbl['Pay Now'] }}(&#8364;):</span></br></br>
                                            @endif
                                        </div>
                                        <div class="col-md-7">
                                            @if($options['service_available'] == 1)
                                            <input type="text" readonly id="modal_date" class="col-md-12 form-control"></br></br>
                                            <input type="text" readonly  id="modal_duration" class="col-md-12 form-control"></br></br>

                                            @else
                                            <input type="text" readonly id="modal_maxdays" value="{{$options['delivery_days']}}" class="col-md-12 form-control" /></br></br>
                                            <input type="text" readonly id="modal_place" value="{{$options['delivery_place']}}" class="col-md-12 form-control" /></br></br>
                                            @endif
                                            <?php if($options['service_available']) { ?>
                                            <input type="text" readonly  id="modal_price" class="col-md-12 form-control"></br></br>
                                            <?php } ?>
                                            @if($options['discount_available'] == 1)
                                            <input type="text" readonly  id="modal_discount_price" class="col-md-12 form-control"></br></br>
                                            @endif
                                        </div>
                                        <div id="user_addr" class="col-md-12" style="margin-top:20px;">
                                            <input class="form-control" type="text" placeholder="Type your address" name="user_addr" style="display:none;" required>
                                            <textarea rows="5" placeholder="{{ $langLbl['Type your message'] }}..." name="user_msg" class="form-control" maxlength="250" style="margin-top:10px;height:137px !important;" id="booking-area"></textarea>
                                            <h5><span id="char_count">250</span> {{ $langLbl['characters left'] }}</h5>
                                            <p>{{ $langLbl['Remember that yuo can cancel your service untill 1 day before your appointemt date'] }}</p>
                                        </div>

                                    </div>																
                                </form>
                            </div>
                            <div class="modal-footer">
                            <?php if($options['service_available']) { ?>
                                <button type="button" id="js-btn-add-cart" class="btn btn-primary" data-dismiss="modal" company_id="{{ $store->company->id }}" data-id="{{ $store->id }}" data-user="{{ Session::has('user_id') ? Session::get('user_id') : '' }}">{{ $langLbl['Pay to the office'] }}</button>
                                <button type="button" id="js-btn-pay-now" class="btn btn-primary" company_id="{{ $store->company->id }}" data-id="{{ $store->id }}" data-user="{{ Session::has('user_id') ? Session::get('user_id') : '' }}">{{ $langLbl['Pay Now'] }}</button>
                            <?php } else { ?>
                                <button type="button" id="js-btn-add-free-cart" class="btn btn-primary" data-dismiss="modal" company_id="{{ $store->company->id }}" data-id="{{ $store->id }}" data-user="{{ Session::has('user_id') ? Session::get('user_id') : '' }}">{{ $langLbl['Book'] }}</button>
                            <?php } ?>
                            </div>
                        </div>

                    </div>
                    <!-- /.modal-content -->
                </div>
                <!-- /.modal-dialog -->
                <!-- END MODAL DIALOG FOR BOOK -->
                <!-- START MODAL DIALOG FOR ASK INFO -->

                <div class="row margin-top-normal modal fade" id="js-div-message" style="display: none;">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                                <h4 class="color-default">{{ $langLbl['Send Us A Message'] }}</h4>
                            </div>
                            <div class="modal-body">


                                <form action="{{ URL::route('user.sendMessage') }}" role="form" method="post">
                                    <input type="hidden" name="company_id" value="{{ $store->company->id }}"/>
                                    <input type="hidden" name="slug_name_hidden" value="{{ $store->name }}"/>
                                    <div class="form-group">
                                        <label for="contacts-name">{{ $langLbl['Name'] }}</label>
                                        <input type="text" required class="form-control" name="name">
                                    </div>
                                    <div class="form-group">
                                        <label for="contacts-email">{{ $langLbl['Email'] }}</label>
                                        <input type="email" required class="form-control" name="email">
                                    </div>
                                    <div class="form-group">
                                        <label for="contacts-message">{{ $langLbl['Message'] }}</label>
                                        <textarea class="form-control" required rows="5" name="description"></textarea>
                                    </div>
                                    <button type="submit" class="btn btn-primary pull-right"><i class="icon-ok"></i> {{ $langLbl['Send'] }}</button>
                                </form>  
                            </div>
                        </div>                          
                    </div>
                </div>
                <!-- END MODAL DIALOG FOR ASK INFO -->	
                <!-- END BOOKING DETAIL OPTIONS -->	
                <div class="detail-actions row">
                    <div class="col-sm-4">
                        <a  class="btn btn-primary btn-book" id="book_btn" data_id="{{ Session::has('user_id') ? Session::get('user_id') : ''  }}"  href="#basic"><i class="fa fa-shopping-cart"></i>{{$options['service_available'] == 1 ? $langLbl['Book'].'!' : $langLbl['Order'].'!' }}</a>
                    </div><!-- /.col-sm-4 -->
                    <div class="col-sm-4">                    
                        <a href="#js-div-message" class="btn btn-secondary btn-share" id="js-btn-send-message"><i class="fa fa-pencil-square-o"></i> {{ $langLbl['Ask Info'] }}</a>
                    </div><!-- /.col-sm-4 -->
                    <div class="col-sm-4">                    
                        <button class="btn btn-secondary btn-claim" id="js-btn-join" data-id="{{ $store->company->id }}"><i class="fa fa-user"></i> {{ $langLbl['Join now'] }}</button>
                    </div><!-- /.col-sm-4 -->
                </div><!-- /.detail-actions -->
            </div>

            <h2>{{ $langLbl['About'] }} <span class="text-secondary">{{ $store->$nameVal }}</span></h2>
            <div class="background-white p20">
                <div class="detail-vcard">
                    <div class="detail-logo">
                        <img class="img-responsive thumbnail" src="{{ HTTP_COMPANY_PATH.$company->photo }}">
                    </div><!-- /.detail-logo -->

                    <div class="detail-contact">
                        <div class="detail-contact-email">
                            <i class="fa fa-envelope-o"></i> <a href="mailto:#">{{$company->email}}</a>
                        </div>
                        <div class="detail-contact-phone">
                            <i class="fa fa-mobile-phone"></i> <a href="tel:#">{{$company->phone}}</a>
                        </div>
                        <div class="detail-contact-address">
                            <i class="fa fa-globe"></i>
                            {{$company->city}}
                        </div>
                    </div><!-- /.detail-contact -->
                </div><!-- /.detail-vcard -->

                <div class="detail-description">
                    <p class="drop-cap" style="text-align: justify;">{{ $store->$descriptionVal }}</p>
                    <a href="javascript:void(0);" class="read_more_btn">{{ $langLbl['Read More'] }}</a>
                    <a href="javascript:void(0);" style="display:none;" class="read_less_btn">{{ $langLbl['Read Less'] }}</a>
                </div>
            </div>

            <!-- START KEYWORDS -->

            @if($store->keyword)
            <h2>{{ $langLbl['Keywords'] }}</h2>
            <?php $keywords = explode(",", $store->keyword); ?>
            <div class="background-white p20">
                <ul class="detail-amenities">
                    @foreach ($keywords as $key => $value)
                    <li class="yes"><button class="btn-default btn btn-xs">{{ $value }}</button></li>
                    @endforeach   
                </ul>
            </div>
            @endif
            <!-- END KEYWORDS -->

            <!-- START REVIEW FORM -->
            @if ($is_valid || count($store->feedbacks) > 0)
            @if ($is_valid)
            <h2 class="margin-top-normal">{{ $langLbl['review'] }} &amp; {{ $langLbl['feedbacks'] }}</h2>
            @endif
            <div class="detail-enquire-form background-white p20">


                @if ($is_valid)
                <form method="post" action="{{ URL::route('user.giveFeedback') }}">
                    <input type="hidden" name="store_id" value="{{ $store->id }}"/>
                    <div class="row margin-top-xs">
                        <div class="col-sm-5">
                            @foreach ($store->company->visibleRatingTypes as $key => $value)
                            @if ($value->is_score)
                            <div class="row">
                                <div class="col-sm-6 text-right"><p style=""><b>{{ $value->$nameVal }} : </b></p></div>
                                <div class="col-sm-6">
                                    <input id="js-number-rating" data-symbol="&#8226;" type="number" name="rating[]" class="rating" min=0 max=5 step=1 data-show-caption=false data-show-clear=false data-size='xs' value=3>
                                    <input type="hidden" name="type_id[]" value="{{ $value->id }}">
                                </div>
                            </div>
                            @else
                            <div class="row">
                                <div class="form-group form-radio">
                                    <div class="col-sm-6 text-right"><p style="padding-top: 10px;"><b>{{ $value->$nameVal }}</b></p></div>
                                    <div class="col-md-6 padding-top-xs">
                                        <input type="hidden" name="type_id[]" value="{{ $value->id }}">
                                        <input type="hidden" name="rating[]" id="js-hidden-rating">
                                        <div class="btn-group" data-toggle="buttons">
                                            <label class="btn btn-default btn-sm" data-val=1 id="js-label-answer"><input type="radio" class="toggle"> {{ $langLbl['Yes'] }} </label>
                                            <label class="btn btn-default btn-sm" data-val=0 id="js-label-answer"><input type="radio" class="toggle"> {{ $langLbl['No'] }} </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endif
                            @endforeach
                        </div>
                        <div class="col-sm-7">
                            <textarea class="form-control" name="description" rows="9" placeholder="{{ $langLbl['Write feedback here'] }}..."></textarea>
                            <button class="btn btn-primary pull-right margin-top-sm" onclick="return validate()">{{ $langLbl['Give Feedback'] }}</button>
                        </div>
                    </div>
                </form>
            </div>
            @endif
            <!-- END REVIEW FORM -->        
        </div><!-- /.col-sm-5 -->
        @endif
        <!-- END RIGHT SIDE -->

    </div>            
</div>
</div>

<form id="js-frm-payment" method="post" action="{{ 'https://'.PAYPAL_SERVER.'/cgi-bin/webscr' }}" class="hide">
    <input type="hidden" name="business" value="{{ PAYPAL_BUSINESS }}" />
    <input type="hidden" name="cmd" value="_xclick">
    <input type="hidden" name="item_name" value="{{ SITE_NAME }} Offer Purchase">
    <input type="hidden" name="amount">
    <input type="hidden" name="custom" >
    <input type="hidden" name="currency_code" value="EUR">
    <input type="hidden" name="notify_url" value="{{ URL::route('offer.purchase.ipn') }}">
    <input type="hidden" name="return" value="{{ URL::route('offer.purchase.success', $store->slug) }}">
    <input type="hidden" name="cancel_return" value="{{ URL::route('offer.purchase.failed', $store->slug) }}">
    <input type="hidden" name="no_shipping" value="1">
    <input type="hidden" name="email">
</form>
<!-- Booking paypal -->
<form id="js-book-payment" method="post" action="{{ PAYPAL_URL }}" class="hide">
    <input type="hidden" name="business" value="{{ PAYPAL_BUSINESS }}">
    <input type="hidden" name="cmd" value="_xclick">
    <input type="hidden" name="item_name" value="{{ $store->name }}">
    <input type="hidden" name="user_id" value="{{ Session::has('user_id') ? Session::get('user_id') : ''  }}"/>
    <input type="hidden" name="store_id" value="{{ $store->id }}" />
    <input type="hidden" name="company_id" value="{{ $store->company->id }}" />
    <input type="hidden" name="amount">
    <input type="hidden" name="custom" >
    <input type="hidden" name="currency_code" value="EUR">
    <input type="hidden" name="notify_url" value="{{ URL::route('book.purchase.ipn') }}">
    <input type="hidden" name="return" value="{{ URL::route('book.purchase.success', $store->slug) }}">
    <input type="hidden" name="cancel_return" value="{{ URL::route('book.purchase.failed', $store->slug) }}">
    <input type="hidden" name="no_shipping" value="1">
    <input type='hidden' name='rm' value='2'>
    <input type="hidden" name="email">
</form>
<?php
$lat = [];
$lng = [];
$office_name = [];
$office_address = [];
if (empty($personal_officies)) {
    $lat[] = DEFAULT_LAT;
    $lng[] = DEFAULT_LNG;
} else {
    foreach ($personal_officies as $office) {
        $lat[] = $office->office->lat;
        $lng[] = $office->office->lng;
        $office_name[] = $office->office->name;
        $office_address[] = $office->office->address;
    }
}
?>

@stop

@section('custom-scripts')
{{ HTML::script('/assets/metronic/global/plugins/bootstrap-fileinput/bootstrap-fileinput.js') }}
{{ HTML::script('/assets/metronic/global/plugins/bootstrap-modal/js/bootstrap-modal.js') }}
{{ HTML::script('/assets/metronic/global/plugins/bootstrap-modal/js/bootstrap-modalmanager.js') }}
{{ HTML::script('/assets/js/bootstrap-checkbox.js') }}
<script type='text/javascript'>
<?php
$lat = json_encode($lat);
$lng = json_encode($lng);
$office_name = json_encode($office_name);
$office_address = json_encode($office_address);
$map_icon = $_SERVER['SERVER_NAME']."/mela/public/assets/img/Icon-map.png";
echo "var lat = " . $lat . ";\n";
echo "var lng = " . $lng . ";\n";
echo "var office_name = " . $office_name . ";\n";
echo "var office_address = " . $office_address . ";\n";
?>
</script>

<!-- free service script start -->

<script type="text/javascript">
    $(document).ready(function(){
       $('body').on('click','#js-btn-add-free-cart',function(){
         var company_id = $(this).attr('company_id');
         var store_id = $(this).attr('data-id');
         var user_id = $(this).attr('data-user');
         var service_available11 = "{{ $options['service_available'] }}";
         var max_days = $('#modal_maxdays').val();
         var modal_place = $('#modal_place').val();
         var user_msg = $('#booking-area').val();
         $.ajax({
            url: "{{ URL::route('async.user.cart.free_add') }}",
            type: "post",
            dataType: "json",
            data: {company_id:company_id,store_id:store_id,user_id:user_id,service_available11:service_available11,max_days:max_days,modal_place:modal_place,user_msg:user_msg},
            success:function(data){
                bootbox.alert(data.msg);
                window.setTimeout(function(){
                bootbox.hideAll();
                }, 2000);
            },
            error:function(error){
              console.log(error);
            }
         });
       });
    });
</script>

<!-- free service script end -->

<script>
    $(document).ready(function() {

    var desc_height = parseInt($('p.drop-cap').height());
        if(desc_height > 100){
            $('.read_more_btn').show();
            $('.read_less_btn').hide();
            var columnHeight = 100;
            $(".detail-description p").css('height', columnHeight + 'px');
        }else{
            $('.read_more_btn').hide();
            $('.read_less_btn').hide();
        }
        
    $("label#js-label-answer").click(function() {
    $(this).parents("div.form-radio").find("input#js-hidden-rating").val($(this).attr('data-val'));
    });
            $('#book_btn').click(function(){
    var user_id = $(this).attr('data_id');
    var service_available_val = "{{ $options['service_available'] }}";
            if (user_id == ''){
    var msg = "{{ $langLbl['You need to login.'] }}";
            bootbox.alert(msg);
            window.setTimeout(function(){
    bootbox.hideAll();
    }, 2000);
            return;
    } else if ($('#date_picker').val() == '' || ($('#duration').val() == null && $('#duration').length > 0)){
    var msg = "{{ $langLbl['You need to select booking date and duration'] }}";
            bootbox.alert(msg);
            window.setTimeout(function(){
    bootbox.hideAll();
    }, 2000);
            return;
    } else if (service_available_val != "" && ($('#service_office').val() == '' || $('#service_office').val() == null)){
    var msg = "{{ $langLbl['You need to select office.'] }}";
            bootbox.alert(msg);
            window.setTimeout(function(){
    bootbox.hideAll();
    }, 2000);
            return;
    }

    if ($('#home').prop('checked'))
            $('input[name="user_addr"]').css('display', 'block');
            else
            $('input[name="user_addr"]').css('display', 'none');
            $('#basic').modal('show');
            @if ($options['discount_available'] == 1)
            var discount_price = Number($("#discount_price").val());
            $('#modal_discount_price').val(discount_price);
            @endif
            var price = Number($('#price').val());
            @if ($options['service_available'] == 1)
            var book_id = Number($('#duration').val());
            var book_date = $('#date_picker').val();
            if ($('#duration').length > 0) {
    var duration = {{$store -> duration}};
            duration = book_id * Number(duration);
            $('#modal_duration').val(duration + ' min');
            $('input[name="duration"]').val(duration);
    }
    price = price * book_id;
            @if ($options['discount_available'] == 1)
            discount_price = discount_price * book_id;
            $('#modal_discount_price').val(discount_price);
            @endif
            $('#modal_price').val(price);
            $('input[name="book_date"]').val(book_date);
            $('#modal_date').val(book_date);
            @endif
            $('#modal_price').val(price);
            @if ($options['discount_available'] == 1)
            $('input[name="amount"]').val(discount_price);
            @else
            $('input[name="amount"]').val(price);
            @endif

    });
            });
            function validate() {
            var objList = $("input#js-hidden-rating");
                    for (var i = 0; i < objList.length; i++) {
            if (objList.eq(i).val() == '') {
            bootbox.alert("{{ $langLbl['Please answer the question.'] }}");
                    return false;
            }
            }
            }

    var dateToday = new Date();
            var daysofweek = ["sun", "mon", "tue", "wed", "thu", "fri", "sat"];
            var start_time, end_time;
            var storeId = '<?php echo $store->id; ?>';
            var flag = <?php echo $flag; ?>;
            var allow_time = new Array();
            var book_time = new Array();
            var days_opening, office_holidays;
            var openTimes =<?php echo json_encode($serviceOfficies); ?>;
            @if ($options['service_available'] == 1)
            var holidays = <?php echo json_encode($holidays); ?>;
            if (holidays.length > 0){
    office_holidays = holidays[0].split(",");
            office_holidays = getHolidays(office_holidays);
            }

    @endif
            var available_officies = <?php echo json_encode($available_officies); ?>;
            var personal_officies = <?php echo json_encode($personal_officies); ?>;
            days_opening = openTimes[0];
            function getHolidays(office_holidays){
            for (var k in office_holidays){
            office_holidays[k] = office_holidays[k].replace(/\s/g, '');
                    var value = new Date(office_holidays[k]);
                    var month = value.getMonth() + 1;
                    month = month < 10 ? '0' + month : '' + month;
                    var day = value.getDate();
                    day = day < 10 ? '0' + day : '' + day;
                    office_holidays[k] = value.getFullYear() + "/" + month + "/" + day;
            }//console.log(office_holidays);
            return office_holidays;
                    }
    @if ($options['service_available'] == 1)
            allow_time = getAllowTime(dateToday);
            @endif

            $(document).ready(function() {
    $('input[type="checkbox"]#home').checkbox({
    buttonStyle: 'btn-danger',
            buttonStyleChecked: 'btn-base',
            checkedClass: 'icon-check',
            uncheckedClass: 'icon-check-empty'
    });
            $('#home').change(function(){
    var html = '<select class="form-control" id="service_office">';
            var i = 0;
            if ($(this).prop('checked')){
    for (var k in available_officies){
    html += '<option value="' + available_officies[k].office.id + '" office-index ="' + i + '">' + available_officies[k].office.name;
            if (available_officies[k].office.office_available == 1 && flag == 1)
            html += "({{ $langLbl['Available out of office'] }})";
            html += '</option>';
    }
    } else{
    for (var k in personal_officies){
    html += '<option value="' + personal_officies[k].office.id + '" office-index ="' + i + '">' + personal_officies[k].office.name;
            if (personal_officies[k].office.office_available == 1 && flag == 1)
            html += "({{ $langLbl['Available out of office'] }})";
            html += '</option>';
    }
    }
    html += '</select>';
            $('#officies').html(html);
    });
    // START DATETIME PICKER Imak 20150517	
    $('#date_picker').datetimepicker({
        minDate:dateToday,
        onSelectDate:function(ct, $input){
            $('#date_picker').datetimepicker({
                minDate:dateToday,
                allowTimes:getAllowTime(ct),
                disabledDates:office_holidays, fomatDate:'m/d/Y'
            });
        },
        allowTimes:allow_time,
        disabledDates:office_holidays, fomatDate:'m/d/Y',
        lang: '{{ isset($_COOKIE["current_lang"]) ? $_COOKIE["current_lang"] : "en" }}'
    });
    // \ END DATETIME PICKER Imak 20150517

            // START CHANGE CALENDAR ACCORDING TO OFFICE
            $('#service_office').on('change', function (e) {
    var selectedValue = $("option:selected", this).attr('office-index');
            days_opening = openTimes[selectedValue];
            office_holidays = holidays[selectedValue].split(",");
            office_holidays = getHolidays(office_holidays);
            $('#date_picker').datetimepicker({
            minDate:dateToday,
            disabledDates:office_holidays, fomatDate:'m/d/Y',
        lang: '{{ isset($_COOKIE["current_lang"]) ? $_COOKIE["current_lang"] : "en" }}'
    });
    });
            // \ END CHANGE CALENDAR ACCORDINT TO OFFICE

            // START PAY TO OFFICE
            $("button#js-btn-add-cart").click(function() {
    var p = $('#modal_price').val();
            var office_id = '';
            var addr = $('input[name="user_addr"]').val();
            var msg = $('textarea[name="user_msg"]').val();
            if (addr == '' && $('#home').prop('checked')){
    bootbox.alert("{{ $langLbl['Please input your address'] }}");
            window.setTimeout(function(){
    bootbox.hideAll();
    }, 3000);
            return false;
    }
    // START WHEN BOOKING AVAIALBLE
    @if ($options['service_available'] == 1)
            var d = {{$store -> duration}}; // for duration
            var book_amount;
            var w = $('#date_picker').val();
            book_amount = $('#duration').val();
            d = Number(d) * book_amount;
            office_id = $('#service_office').val();
            var data = {
    service_available : 1,
            store_id : $(this).attr('data-id'),
            duration:d,
            when:w,
            company_id : $(this).attr('company_id'),
            price : p,
            addr : addr,
            msg : msg,
            office_id : office_id
    };
            // \ END WHEN BOOKING AVAILABLE
            @else
            // START WHEN BOOKING UNAVAILABLE
            office_id = $('#service_office').val();
            var delivery_days = <?php echo $options['delivery_days']; ?>;
            var delivery_place = "<?php echo $options['delivery_place']; ?>";
            var data = {
    service_available : 0,
            store_id:$(this).attr('data-id'),
            company_id : $(this).attr('company_id'),
            price : p,
            office_id : office_id,
            delivery_days : delivery_days,
            delivery_place : delivery_place,
            addr : addr,
            msg : msg
    }
    // \END WHEN BOOKING UNAVAILABLE
    @endif

            $.ajax({
    url: "{{ URL::route('async.user.cart.add') }}",
            dataType : "json",
            type : "POST",
            data : data,
            success : function(data){
    bootbox.alert(data.msg);
            window.setTimeout(function(){
    bootbox.hideAll();
    }, 5000);
    }
    });
    });
// \ END PAY TO OFFICE

            $("div.service-item").hover(function() {
    $(this).addClass('service-item-hover');
    }, function() {
    $(this).removeClass('service-item-hover');
    });
            $("#js-btn-send-message").click(function() {
    $("div#js-div-message").modal('show');
    });
            $("button#js-btn-purchase").click(function() {
    var userId = $(this).attr('data-user');
            var offerId = $(this).attr('data-id');
            var price = $(this).attr('data-price');
            if (userId == '') {
    window.location.href = "{{ URL::route('user.login').'?redirect='.urlencode(URL::route('store.detail', $store->slug)) }}";
    } else {
    var custom = '{"uid":' + userId + ',"oid":"' + offerId + '"}';
            $("input[name='custom']").val(custom);
            $("input[name='amount']").val(price);
            $("form#js-frm-payment").submit();
    }
    });
            $("button#js-btn-pay-now").click(function(){
    var addr = $('input[name="user_addr"]').val();
            if (addr == '' && $('#home').prop('checked')){
    bootbox.alert('Please Input your address');
            window.setTimeout(function(){
    bootbox.hideAll();
    }, 3000);
            return false;
    }
    var cmpId = $(this).attr('company_id');
            var storeId = $(this).attr('data-id');
            var userId = $(this).attr('data-user');
            var office_id = $('#service_office').val();
            var msg = $('textarea[name="user_msg"]').val();
            var service_available = {{$options['service_available'] == 1 ? 1 : 0}};
            @if ($options['service_available'] == 1)
            var book_date = $("#date_picker").val();
            var book_id = $("#duration").val();
            var duration = {{$store -> duration}};
            duration = Number(book_id) * duration;
            var custom = '{"uid":' + userId + ',"cid":' + cmpId + ',"sid":' + storeId + ',"book_date":"' + book_date + '","duration":"' + duration + '", "addr":"' + addr + '", "msg" : "' + msg + '", "office_id": "' + office_id + '", "service_available":' + service_available + '}';
            @else
            var delivery_days = <?php echo $options['delivery_days']; ?>;
            var delivery_place = "<?php echo $options['delivery_place']; ?>";
            var custom = '{"uid":' + userId + ',"cid":' + cmpId + ',"sid":' + storeId + ',"delivery_days":"' + delivery_days + '","delivery_place":"' + deilvery_place + '", "addr":"' + addr + '", "msg" : "' + msg + '", "office_id": "' + office_id + '", "service_available":' + service_available + '}';
            @endif

            $("input[name='custom']").val(custom);
            $("form#js-book-payment").submit();
    });
            $("button#js-btn-join").click(function() {
    $.ajax({
    url: "{{ URL::route('async.user.store.join') }}",
            dataType : "json",
            type : "POST",
            data : { company_id : $(this).attr('data-id') },
            success : function(data){
    bootbox.alert(data.msg);
            window.setTimeout(function(){
    bootbox.hideAll();
    }, 2000);
    }
    });
    });
            var markers = new Array();
            var myIcon = new google.maps.MarkerImage("{{ asset('upload/user/map_logo.png') }}", null, null, null, new google.maps.Size(30,40));
            var infowindow = new google.maps.InfoWindow();
            var bounds = new google.maps.LatLngBounds();
            var mapOptions = { zoom: 15, scrollwheel: false, };
            map = new google.maps.Map(document.getElementById('map-canvas'), mapOptions);
            for (var i = 0; i < lat.length; i++){
    var mapPosition = new google.maps.LatLng(lat[i], lng[i]);
            var content_string = ''
            + '<div style="width:220px;">'
            + '<strong>' + office_name[i] + '</strong>'
            + '<p>' + office_address[i] + '</p>'
            + '</div>';
            var marker = new google.maps.Marker({position: mapPosition, map: map, title: '{{ $store->name }}', info : content_string, icon: myIcon });
            google.maps.event.addListener(marker, 'click', function () {
    infowindow.setContent(this.info);
            infowindow.open(map, this);
    });
            bounds.extend(mapPosition);
            //markers.push(marker);
    }
    map.fitBounds(bounds);
            //   AutoCenter();
                    function AutoCenter() {
                    //  Create a new viewpoint bound
                    var bounds = new google.maps.LatLngBounds();
                            //  Go through each...
                            $.each(markers, function (index, marker) {
                    bounds.extend(marker.position);
                    });
                            //  Fit these bounds to the map
                            map.fitBounds(bounds);
                    }
            });
            function getAllowTime(ct){

            book_time = [];
                    var day_index = ct.getUTCDay();
                    var dd = ct.getDate();
                    var mm = ct.getMonth(); //January is 0!
                    var yyyy = ct.getFullYear();
                    var start_time, end_time;
                    var day = daysofweek[day_index];
                    var yyyy_str = ct.getFullYear().toString();
                    var mm_str = (ct.getMonth() + 1).toString(); // getMonth() is zero-based
                    var dd_str = ct.getDate().toString();
                    var bookDate = yyyy_str + '/' + (mm_str[1]?mm_str:"0" + mm_str[0]) + '/' + (dd_str[1]?dd_str:"0" + dd_str[0]);
                    $.ajax({
            url : "{{URL::route('async.user.bookTime') }}",
                    dataType : "json",
                    type : "POST",
                    data : {
            ct : bookDate,
                    storeId : storeId
            },
                    success : function (data){
            start_time = "00:00";
                    end_time = "23:00";
                    if ($('#home').prop('checked')){
            start_time = "00:00";
                    end_time = "23:00";
            } else{
            for (var key in days_opening) {
            if (days_opening.hasOwnProperty(key) && day + "_start" == key) {
            start_time = days_opening[key];
            }
            if (days_opening.hasOwnProperty(key) && day + "_end" == key) {
            end_time = days_opening[key];
            }
            }
            }
            start_time = start_time.split(':');
                    start_time = new Date(yyyy, mm, dd, start_time[0], start_time[1]);
                    end_time = end_time.split(':');
                    end_time = new Date(yyyy, mm, dd, end_time[0], end_time[1]);
                    allow_time = [];
                    for (var i = start_time.getHours(); i <= end_time.getHours(); i++) { // getting allow time 
            if (start_time.getMinutes() == 0){
            allow_time.push(i.toString() + ':00');
            } else if (start_time.getMinutes() == 30){
            if (i == start_time.getHours()){
            allow_time.push(i.toString() + ':30');
                    continue;
            }
            else allow_time.push(i.toString() + ':00');
            }
            if (i != end_time.getHours())
                    allow_time.push(i.toString() + ':30');
                    if (end_time.getMinutes() == 30 && i == end_time.getHours()){
            allow_time.push(i.toString() + ':30');
            }
            } // \ end getting allow time
            for (var i = 0; i <= data.length - 1; i++){
            var d = data[i].book_date;
                    d = new Date(d);
                    var h = addZero(d.getHours());
                    var m = addZero(d.getMinutes());
                    //book_time.push(h+':'+m);
                    var item = h + ':' + m;
                    var index = allow_time.indexOf(item);
                    allow_time.splice(index, 1);
            }
            $('#date_picker').datetimepicker({
            minDate:dateToday,
                    onSelectDate:function(ct, $input){
            $('#date_picker').datetimepicker({
            minDate:dateToday,
                    allowTimes:getAllowTime(ct),
                    disabledDates:office_holidays, fomatDate:'m/d/Y'
            });
            },
                    allowTimes:allow_time,
                    disabledDates:office_holidays, fomatDate:'m/d/Y',
        lang: '{{ isset($_COOKIE["current_lang"]) ? $_COOKIE["current_lang"] : "en" }}'
            });
                    return allow_time;
            } // \ end success function
            }); // \ end ajax				
                    }

    function addZero(i) {
    if (i < 10) {
    i = "0" + i;
    }
    return i;
            }



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

    $('body').on('keyup','#booking-area',function(){
        var msg_val = $('#booking-area').val();
        var msgLength = parseInt(msg_val.length);
        var remainingLength = 250 - msgLength;
        $('span#char_count').html(remainingLength);
    });
</script>
@stop

@stop