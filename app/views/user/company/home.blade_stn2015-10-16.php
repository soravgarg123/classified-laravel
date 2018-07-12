@extends('user.layout')

@section('custom-styles')
{{ HTML::style('/assets/metronic/global/plugins/carousel-owl-carousel/owl-carousel/owl.carousel.css') }}
{{ HTML::style('/assets/metronic/global/plugins/slider-revolution-slider/rs-plugin/css/settings.css') }}
{{ HTML::style('/assets/metronic/frontend/pages/css/style-revolution-slider.css') }}
<style>
    #owl-demo .item{
      margin: 7px;
    }
</style>
@stop

@section('main')
<div data-vide-bg="mp4: {{ HTTP_COMPANY_PATH }}video.mp4," data-vide-options="posterType: jpg, loop: true, auto-play:true, muted: false, position: 0% 0%"style="height:650px;z-index:9;">
      <!-- START SIDEBAR TOGGLER FOR SEARCH -->
		<div class="search-box-wrapper" >
			<div class="container">
				<div class="row">
		            <div class="col-md-3 searchbar" style="padding:0;float:right;">
							<div class="page-quick-sidebar">
								<div class="nav-justified">
									<ul class="nav nav-tabs nav-justified">
										<li class="active">
											<a href="#quick_sidebar_tab_1" data-toggle="tab">
											{{Lang::get('user.professional')}}
											</a>
										</li>
										<li>
											<a href="#quick_sidebar_tab_2" data-toggle="tab">
											{{Lang::get('user.service')}}
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
				                                            <input type="text" class="form-control input-lg input-circle custom-typeahead" id="js-prof-keyword" placeholder="Enter Keyword" value="{{ Session::get('prof_keyword') }}">
				                                        </div>
				                                    </div>              
				                                </div>
				                                <div class="col-sm-12">
				                                    <div class="form-group">
				                                        <div class="input-icon">
				                                            <i class="fa fa-map-marker"></i>
				                                            <input type="text" class="form-control input-lg input-circle custom-typeahead" id="js-text-office" placeholder="Rome, Italy"  value="{{ Session::get('prof_location') }}">
				                                        </div>
				                                    </div>
				                                </div>
				                                
				                       <!---- START HOURLY RATE ---->
				                                <div class="col-sm-12" style="color:#fff;">
				                                	<div class="form-group">
														<label class="col-md-6 control-label" style="padding-left:0px;">Hourly Rate</label>
														<div>
															<span id="hourly-range-amount"></span>
														</div>
														<div class="col-md-12" style="padding:0;">
															<div id="hourly-range" class="slider bg-blue"></div>
														</div>
													</div>
				                                </div>
			                            <!---- \ END HOURLY RATE ---->
				                               
		                                <!---- START RATING RANGE ---->
				                                <div class="col-sm-12" style="color:#fff;">
				                                	<div class="form-group">
														<label class="col-md-6 control-label" style="padding-left:0px;">{{Lang::get('user.rating_range')}}</label>
														<div class="slider-value">
																 {{Lang::get('user.minimum')}}: <span id="prof-rating-range-max-amount">
																</span>
														</div>
														<div class="col-md-12" style="padding:0">
															<div id="prof-rating-range-max" class="slider bg-purple"></div>
														</div>
													</div>
				                                </div>
		                                <!---- \ END RATING RANGE ---->
				                                <div class="col-sm-12 text-center">
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
												<div class="col-sm-12">
				                                    <div class="form-group">
				                                        <div class="input-icon">
				                                            <i class="fa fa-pencil" style="margin-top: 16px;"></i>
				                                            <input type="text" class="form-control input-lg input-circle custom-typeahead" id="js-text-keyword" placeholder="Enter Keyword" value="{{ Session::get('keyword') }}">
				                                        </div>
				                                    </div>              
				                                </div>
				                                <div class="col-sm-12">
				                                    <div class="form-group">
				                                        <div class="input-icon">
				                                            <i class="fa fa-map-marker" style="margin-top: 16px;"></i>
				                                            <input type="text" class="form-control input-lg input-circle custom-typeahead" id="js-text-location" placeholder="Rome, Italy"  value="{{ Session::get('location') }}">
				                                        </div>
				                                    </div>
				                                </div>
			                            <!---- START PRICING RANGE ---->
				                                <div class="col-sm-12" style="color:#fff;">
				                                	<div class="form-group">
														<label class="col-md-6 control-label" style="padding-left:0px;">{{Lang::get('user.price_range')}}</label>
														<div>
															<span id="slider-range-amount"></span>
														</div>
														<div class="col-md-12" style="padding:0;">
															<div id="slider-range" class="slider bg-blue"></div>
														</div>
													</div>
				                                </div>
			                            <!---- \ END PRICING RANGE ---->
		                                <!---- START RATING RANGE ---->
				                                <div class="col-sm-12" style="color:#fff;">
				                                	<div class="form-group">
														<label class="col-md-6 control-label" style="padding-left:0px;">{{Lang::get('user.rating_range')}}</label>
														<div class="slider-value">
																 {{Lang::get('user.minimum')}}: <span id="slider-range-max-amount">
																</span>
														</div>
														<div class="col-md-12" style="padding:0">
															<div id="slider-range-max" class="slider bg-purple"></div>
														</div>
													</div>
				                                </div>
		                                <!---- \ END RATING RANGE ---->
		                                <!---- AVAILABLE OUT OF OFFICE ---->
				                                <div class="col-sm-12" style="color:#fff;">
				                                	<div class="form-group">
				                                		<input type="checkbox" id="available_office" value="0" class="col-sm-1" style="height:15px;" {{Session::get('office_available') == 1 ? 'checked': ''}}/>
				                                		<label class="col-sm-11" for="available_office" style="font-size: 15px; margin-top: 2px;">{{Lang::get('user.office_available')}}</label>
				                                	</div>
				                                </div>
		                                <!---- \END AVAILABLE OUT OF OFFICE ---->
				                                
		                                <!---- START ONLINE PAYMENT ---->
				                                <div class="col-sm-12" style="color:#fff;">
				                                	<div class="form-group">
				                                		<input type="checkbox" id="online_payment" value="0" class="col-sm-1" style="height:15px;" {{Session::get('online_payment') == 1 ? 'checked' : ''}}/>
				                                		<label class="col-sm-11" for="online_payment" style="font-size: 15px; margin-top: 2px;">{{Lang::get('user.online_payment')}}</label>
				                                	</div>
				                                </div>
		                                <!---- \ END ONLINE PAYMENT ---->
		                                
		                                <!---- START DISCOUNT AVAILABLE ---->
				                                <div class="col-sm-12" style="color:#fff;">
				                                	<div class="form-group">
				                                		<input type="checkbox" id="discount_available" value="0" class="col-sm-1" style="height:15px;" {{Session::get('discount_available') == 1 ? 'checked' : ''}}/>
				                                		<label class="col-sm-11" for="discount_available" style="font-size: 15px; margin-top: 2px;">Discount Available</label>
				                                	</div>
				                                </div>
		                                <!---- \ END DISCOUNT AVAILABLE ---->
				                                
				                                <div class="col-sm-12 text-center" style="margin-top:15px;">
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
        <div class="row padding-top-normal padding-bottom-normal">
            <div class="col-sm-12 text-center"><h2 class="color-default">{{Lang::get('user.featured_professional')}}</h2></div>
        </div>
        <div class="row">
            @foreach ($companies as $key => $company)
            <div class="col-sm-2">
                <div style="position: relative;" class="thumbnail companies">
                    <?php 
                        $tooltip = "<h4>".$company->name."</h4>";
                        
                        if($company->keyword != ''){
                        	$tooltip.= "<p><b>".Lang::get('user.keywords')." : </b>";
							$keywords = explode(",", $company->keyword);
							foreach ($keywords as $subKey => $value) {
								if ($subKey != 0)
									$tooltip.=", ";
								$tooltip.= $value;
							}	
							$tooltip.= "</p>";
                        }
                        
                        
                        $tooltip.= "<p><b>".Lang::get('user.email')." : </b>".$company->email."</p>";
                        $tooltip.= "<p><b>".Lang::get('user.phone')." : </b>".$company->phone."</p>";                        
                        $tooltip.= "<p><b>".Lang::get('user.vat_id')." : </b>".$company->vat_id."</p>";
                        $tooltip.= "<p><b>".Lang::get('user.description')." : </b>".substr($company->description, 0, 300)."</p>";
                    ?>
                    <a href="{{ URL::route('company.detail', $company->slug) }}">
                        <div style="height: 145px; width: 100%; background: url({{ HTTP_COMPANY_PATH.$company->photo }}); background-size: cover;" data-toggle="tooltip" data-placement="{{ $key % 6 >=3 ? 'left' : 'right' }}" data-html="true" data-title="{{ $tooltip }}"></div>
                    </a>
                    <div class="featured-company-offer">
                    @if (count($company->offers) > 0)
                        @foreach ($company->offers as $offer)
                            @if (!$offer->is_review)
                            <div class="color-default store-offers"><b>{{ $offer->name." : " }}</b>{{ $offer->price."&euro;" }}</div>
                            @endif
                        @endforeach                    
                    @endif
                    </div>
                    <h4 class="color-default margin-top-xs">
                        <a href="{{ URL::route('company.detail', $company->slug) }}" data-toggle="tooltip" data-placement="{{ $key % 4 == 3 ? 'left' : 'right' }}" data-html="true" data-title="{{ $tooltip }}">
                            
                            <?php 
                            if (strlen($company->name) > 10)
                            	$company->name = substr($company->name, 0, 10) . '...';
                            ?>
                            {{ $company->name }}
                        </a>
                    </h4>                    
                    <div class="pull-left">
                        <a href="{{ URL::route('company.detail', $company->slug) }}">
                            {{Lang::get('user.detail')}}&nbsp;<i class="fa fa-angle-double-right"></i>
                        </a>
                    </div>
                    <div class="pull-right">                            
                        <input id="js-number-rating" data-symbol="&#8226;" type="number" class="rating" min=0 max=5 step=1 data-show-clear=false data-show-caption=false data-size='xxs' value="{{ $company->getRatingScore() }}" readonly=true>
                    </div>
                    <div class="clearfix"></div>
                    
                </div>
            </div>
            @endforeach
        </div>
     </div>
     <div style="background:#eee;">
	     <div class="container">
	     	<div class="row padding-top-normal padding-bottom-normal">
	            <div class="col-sm-12 text-center"><h2 class="color-default">{{Lang::get('user.featured_services')}}</h2>
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
	                			<?php if (strlen($store->name) > 20)
   										$store->name = substr($store->name, 0, 20) . '...';?>
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
	                                <a href="{{ URL::route('store.search').'?keyword='.$value->subCategory->name }}">{{ $value->subCategory->name }}</a>
	                                <?php break;?>                                
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
        <div class="row padding-top-normal">
            <div class="col-sm-12 text-center"><h2 class="color-default">{{Lang::get('user.recent_reviews')}}</h2></div>        
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
                                    <td class="text-right"><b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{ $rating->type->name }}&nbsp;:&nbsp;</b></td>
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
    	jQuery('.fullwidthabnner').revolution({startheight:650});
        $("#owl-demo").owlCarousel({            
            autoPlay: 3000, //Set AutoPlay to 3 seconds       
            items : 4,
            itemsDesktop : [1199,3],
            itemsDesktopSmall : [979,3]
        });        
    });    
    </script>      
@stop

@stop
