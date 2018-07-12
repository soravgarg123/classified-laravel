@extends('main')    
    @section('page-styles')
        {{ HTML::style('/assets/metronic/global/plugins/typeahead/typeahead.css') }}
        {{ HTML::style('//fonts.googleapis.com/css?family=Bitter') }}
        {{ HTML::style('/assets/metronic/frontend/layout/css/style.css') }}
        {{ HTML::style('/assets/metronic/frontend/layout/css/style-responsive.css') }}
        {{ HTML::style('/assets/metronic/frontend/layout/css/themes/red.css') }}
        {{ HTML::style('/assets/metronic/frontend/layout/css/custom.css') }}
        {{ HTML::style('/assets/metronic/admin/layout/css/layout.css') }}
        {{ HTML::style('/assets/metronic/global/plugins/jquery-ui/jquery-ui-1.10.3.custom.min.css') }}
        {{ HTML::style('/assets/css/style_frontend.css') }}
        {{ HTML::style('/assets/css/messenger.css') }}
        {{ HTML::style('/assets/css/superlist.css') }}
    @stop

    @section('body')
        <body class="corporate" >
        	<div class="page-wrapper">
            @section('header')
            <?php
                if (!isset($pageNo)) {
                    $pageNo = 0;
                }                
            ?>
            <!--  live chat --> 
            @if(Session::has('user_id') && isset($prof_id))
			<div class="messenger bg-white  open">
			    <div class="chat-header text-white bg-gray-dark">
			    	<div class="titlebar clearfix">
			    		<div class="top-lfloat">
			    			<div class="usr-status isOnline"></div>
			    			<div class="usr-name">
			    				<strong>{{$prof_name}}</strong>
			    			</div>
			    		</div>
			    		<div class="open-chat-target open-close-chat"></div>
			    	</div>
			        
			        <a href="#" id="chat-toggle" class="pull-right chat-toggle">
			            <span class="glyphicon glyphicon-chevron-down"></span>
			        </a>
			    </div>
			    <div class="messenger-body" >
			        <ul class="chat-messages" id="chat-log">
			 
			        </ul>
			        <div class="chat-footer">
			            <div class="p-lr-10">
			                <textarea id="chat-message"
			                    class="input-light brad chat-search" placeholder="Your message..."></textarea>
			            </div>
			        </div>
			    </div>
			</div>
			
			@endif
<!-- / End live chat -->
                    
            <div class="header background-default" style="border-top: 5px solid #AE3030;">
            <a href="javascript:void(0);" class="mobi-toggler"><i class="fa fa-bars"></i></a>                   
                <div class="clearfix"></div>  
            	<div class="header-wrapper">
            		<div class="container">
            			<div class="header-inner">
	            			
	            			<div class="header-content">
	            				<div class="header-top">
	            					<ul class="header-nav-secondary nav nav-pills">
	            					@if (Session::has('user_id') )
		                            <li><a href="{{ URL::route('user.cart') }}" class="btn-menu {{ $pageNo == 1 ? 'active' : '' }}">{{Lang::get('user.cart')}}</a></li>
		                            
		                            <li><a href="{{ URL::route('user.profile') }}" class="btn-menu {{ $pageNo == 2 ? 'active' : '' }}">{{Lang::get('user.profile')}}</a></li>
		                            
		                            <li><a href="{{ URL::route('user.offers') }}" class="btn-menu {{ $pageNo == 3 ? 'active' : '' }}">{{Lang::get('user.offers')}}</a></li>
		                            
		                            <li><a class=".dropdown-toggle" data-toggle=".dropdown" data-hover=".dropdown" data-close-others="true" style="cursor:pointer;">{{Lang::get('user.messages')}}</a></li>
		                                                        
		                            <li><a href="{{ URL::route('user.doSignout') }}" class="btn-menu">{{Lang::get('user.signout')}}</a></li>
		                            @else
		                            <li><a href="{{ isset($redirect) && ($redirect != '') ? URL::route('user.login').'?redirect='.urlencode($redirect) : URL::route('user.login') }}" class="btn-menu {{ $pageNo == 51 ? 'active' : '' }}">{{Lang::get('user.login')}}</a></li>
		                            
		                            <li><a href="{{ isset($redirect) && ($redirect != '') ? URL::route('user.signup').'?redirect='.urlencode($redirect) : URL::route('user.signup') }}" class="btn-menu {{ $pageNo == 52 ? 'active' : '' }}">Register</a></li>                            
		                            
		                            <li><a href="{{ URL::route('company.auth') }}" class="btn-menu">Business Area</a></li>
		                            
		                            <li><a href="#" class="btn-menu">Request a service</a></li>
		                            @endif
		                            </ul>
		                            <div class="header-logo">
			            				<a href="{{ URL::route('user.home') }}">
			                                <img src="/assets/img/logo.png" alt="Finternet-Group" style="width:100%; max-width:270px; min-width:200px;">
			                            </a>
			            			</div>		                            
	            				</div>
	            				
	            				
	            			</div>
	            		</div>
            		 </div>
            		 <div class="header-content">
            		 	<div class="header-bottom">
            		 		<div class="header-navigation">
	            					<ul class="nav navbar-collapse">
				                        @foreach ($categories as $key => $value)
				                        <?php $cat_count = count($value->subCategories);?>
				                        <li class="{{$cat_count > 5 ? 'has-mega-menu' : ''}}">
				                            <a class="dropdown-toggle" data-toggle="dropdown" data-target="#" href="#" style="color: #FFF;">
				                                <i class="{{ $value->icon }}"></i>
				                                <b>{{ $value->name }}</b> <span class="caret"></span>
				                            </a>				                            
				                            @if($cat_count > 5)
				                            	<ul class="mega-menu">
				                            		<?php $i = 0; ?>
					                            	@foreach ($value->subCategories as $subKey => $subValue)
					                            		@if($i == 0)
					                            			<li><a href="#">Section 1</a><ul>
					                            		@endif
					                            		<?php if($i % 3 == 0){?>					                            			
					                            			<li><a href="{{ URL::route('store.search').'?keyword='.$subValue->name }}">{{ $subValue->name }}</a></li>					                            				
					                            		<?php }?>					                            		
							                      		
							                      		<?php $i++;?>
							             			@endforeach
							             			</ul></li>
							             			<?php $i = 0; ?>
					                            	@foreach ($value->subCategories as $subKey => $subValue)
					                            		@if($i == 0) <li><a href="#">Section 2</a><ul> @endif
					                            		<?php if($i % 3 == 1){?>					                            			
					                            			<li><a href="{{ URL::route('store.search').'?keyword='.$subValue->name }}">{{ $subValue->name }}</a></li>					                            				
					                            		<?php }?>					                            		
							                      		
							                      		<?php $i++;?>
							             			@endforeach
							             			</ul></li>
							             			<?php $i = 0; ?>
					                            	@foreach ($value->subCategories as $subKey => $subValue)
					                            		@if($i == 0) <li><a href="#">Section 3</a><ul> @endif
					                            		<?php if($i % 3 == 2){?>					                            			
					                            			<li><a href="{{ URL::route('store.search').'?keyword='.$subValue->name }}">{{ $subValue->name }}</a></li>					                            				
					                            		<?php }?>					                            		
							                      		
							                      		<?php $i++;?>
							             			@endforeach
							             			</ul></li>
					                            </ul>
				                            @else
					                            <ul class="sub-menu">				                            
					                            	@foreach ($value->subCategories as $subKey => $subValue)
							                      		<li><a href="{{ URL::route('store.search').'?keyword='.$subValue->name }}">{{ $subValue->name }}</a></li>
							             			@endforeach				                                                     
					                            </ul>
				                            @endif
				                        </li>
				                        @endforeach                       
				                    </ul>
				                 </div>
	            			</div>
            		 </div>
            	</div>
                          
            </div>            
                      
            @show

            @section('main')
            
            @show

            @section('footer')
            <div class="pre-footer">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-4 pre-footer-col">
                          <h2>DoveCercare</h2>
                          <ul>
                            <li><a href="#" target="_blank">How it works</a></li>
                            <li><a href="{{ URL::route('user.help') }}" target="_blank">Help</a></li>
                            <li><a href="#" target="_blank">{{Lang::get('user.contact')}}</a></li>
                            <li><a href="{{ URL::route('user.terms') }}" target="_blank">Terms & Condition</a></li>                            
                          </ul>
                           <?php 
		                    	$languages = array(
									'en'=>Lang::get('user.language_english'),
									'it'=>Lang::get('user.language_italy'),
									'es'=>Lang::get('user.language_spain')
									);
								if(!Session::has('locale')) Session::set('locale','en');
		                    ?>
                          <ul class="text-center">
	                    	<li class="dropdown" id="lng-drop" style="border: 1px solid;  padding-left: 10px;min-width:103px;list-style:none;max-width:103px;">
	                            <a class="dropdown-toggle  lng_caret" data-toggle="dropdown" data-target="#" href="#" style="padding:0 0 1px !important;color: #FFF; font-size:14px;">		                                
	                                {{$languages[Session::get('locale')]}} <span class="caret"></span>
	                            </a>
	                            
	                            <ul class="dropdown-menu lng_group" style="box-shadow:none;margin-top:0px;min-width:103px;background:#009CFF;">
	                            @foreach($languages as $key=>$value)
	                            	@if($key != Session::get('locale'))
	                                <li><a href="/language-chooser/{{$key}}" class="lng_bar" style="color:#fff;padding:3px 15px;"> {{ $value }} </a></li>
	                                @endif			                                
	                            @endforeach			                                
	                            </ul>
	                        </li>
	                    </ul>
                        </div>
                      
                        <div class="col-sm-4 pre-footer-col">
                          <h2>Press</h2>
                          <ul>
                            <li><a href="{{URL::route('store.posts') }}" >{{Lang::get('user.blog')}}</a></li>
                            <li><a href="{{ URL::route('post.professions' ) }}" >World of Professions</a></li>
                          </ul>
                        </div>
                        <div class="col-sm-4 pre-footer-col">
                            
                                <h2>Social</h2>
                                <ul>
                                	<li><a href="{{URL::route('store.posts') }}" >DoveCercare</a></li>
                            		<li><a href="https://www.facebook.com/" target="_blank"><i class="fa fa-facebook"></i> Facebook</a></li>
                                </ul>
                                <form action="#">
                                <div class="input-group">
                                    <input type="text" placeholder="For newsletters enter your email here." class="form-control">
                                    <span class="input-group-btn">
                                        <button class="btn btn-primary" type="submit">{{Lang::get('user.subscribe')}}</button>
                                    </span>
                                </div>
                                </form>
                            
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="footer">
                <div class="container">
                    <div class="row">
                        <div class="col-md-6 col-sm-6 padding-top-10">
                        2015 &copy; DoveCercare. ALL Rights Reserved.
                        </div>                        
                    </div>
                </div>
            </div>
            </div>
            <form method="get" action="{{ URL::route('store.search') }}" id="js-frm-search">
                <input type="hidden" name="keyword"/>
                <input type="hidden" name="location"/>
                <input type="hidden" name="lat"/>
                <input type="hidden" name="lng"/>
                <input type="hidden" name="dt"/>
                <input type="hidden" name="fromPrice" value="{{Session::has('fromPrice') ? Session::get('fromPrice') : 0}}"/>
                <input type="hidden" name="toPrice" value="{{Session::has('toPrice') ? Session::get('toPrice') : 1000}}"/>
                <input type="hidden" name="office_available" value="{{Session::has('office_available') ? Session::get('office_available') : 0}}" />
                <input type="hidden" name="online_payment" value="{{Session::has('online_payment') ? Session::get('online_payment') : 0}}" />
                <input type="hidden" name="discount_available" value="{{Session::has('discount_available') ? Session::get('discount_available') : 0}}" />
            	<input type="hidden" name="fromRate" value="{{Session::has('fromRate') ? Session::get('fromRate') : 0 }}" />
            </form>
            <form method="get" action="{{URL::route('store.profsearch')}}" id="prof-search-frm">
	            <input type="hidden" name="keyword"/>
	            <input type="hidden" name="location"/>
	            <input type="hidden" name="dt"/>
	            <input type="hidden" name="lat"/>
                <input type="hidden" name="lng"/>               
                <input type="hidden" name="prof_fromRate" value="{{Session::has('prof_fromRate') ? Session::get('prof_fromRate') : 0 }}" />
                <input type="hidden" name="fromPricePro" value="{{Session::has('fromPricePro') ? Session::get('fromPricePro') : 0}}"/>
                <input type="hidden" name="toPricePro" value="{{Session::has('toPricePro') ? Session::get('toPricePro') : 1000}}"/>
            </form>
            @show
        </body>
    @stop

    @section('page-scripts')
        {{ HTML::script('/assets/metronic/frontend/layout/scripts/back-to-top.js') }}
        {{ HTML::script('/assets/metronic/admin/layout/scripts/layout.js') }}        
        {{ HTML::script('/assets/metronic/frontend/layout/scripts/layout.js') }}
        {{ HTML::script('/assets/metronic/admin/pages/scripts/custom.js') }}
        {{ HTML::script('/assets/metronic/global/plugins/typeahead/handlebars.min.js') }}
        {{ HTML::script('/assets/metronic/global/plugins/typeahead/typeahead.bundle.min.js') }}        
        {{ HTML::script('//maps.googleapis.com/maps/api/js?v=3.exp&signed_in=true') }}
        {{ HTML::script('/assets/js/brain-socket.min.js') }}
        <script>
        jQuery(document).ready(function(){
        	
			// START RESPONSIVE TOGGLE MENU
				$(".mobi-toggler").on("click", function(event) {
		            event.preventDefault();//the default action of the event will not be triggered
		            
		            $(".header").toggleClass("menuOpened");
		            $(".header").find(".header-navigation").toggle(300);
		        });
				Layout.initFixHeaderWithPreHeader();
	
				$( ".header-navigation li.dropdown" ).click(function() {
					  $( this ).toggleClass( "open" );
				});
			// \ END RESPONSIVE TOOGGLE MENU
			
			
	// START PROFESSIONAL SEARCH
            
            //range max
            @if(Session::has('prof_fromRate'))
	                var fromRate = {{ Session::get('prof_fromRate')}};            	
	            	val = fromRate;
	            @else
	                val = 0;
	            @endif  
            $("#prof-rating-range-max").slider({
                isRTL: Metronic.isRTL(),
                range: "max",
                min: 0,
                max: 5,
                value: 0,
                slide: function (event, ui) {
                    $("#prof-rating-range-max-amount").text(ui.value);
                    $('input[name="prof_fromRate"]').val(ui.value);
                }
            });

            $("#prof-rating-range-max-amount").text($("#prof-rating-range-max").slider("value"));

         // START SERVICE PRICE RANGE SLIDER
            @if(Session::has('fromPricePro'))
                var fromPricePro = {{ Session::get('fromPricePro')}};
            	var toPricePro = {{ Session::get('toPricePro') }};
            	val = [fromPricePro, toPricePro];
            @else
                val = [0,1000];
            @endif        	
        	$("#hourly-range").slider({
                isRTL: Metronic.isRTL(),
                range: true,
                min: 0,
                max: 1000,
                values: val,
                slide: function (event, ui) {
                    $("#hourly-range-amount").text("\u20AC" + ui.values[0] + " - \u20AC" + ui.values[1]);
                    $('input[name="fromPricePro"]').val(ui.values[0]);
                    $('input[name="toPricePro"]').val(ui.values[1]);
                }
            });
        	 $("#hourly-range-amount").text("\u20AC" + $("#hourly-range").slider("values", 0) + " - \u20AC" + $("#hourly-range").slider("values", 1));
    	 // \END SERVICE PRICE RANGE SLIDER
            
	// \ END PROFESSIONAL SEARCH
		
		
		
         // START SERVICE SEARCH   
            // START SERVICE PRICE RANGE SLIDER
	            @if(Session::has('fromPrice'))
	                var fromPrice = {{ Session::get('fromPrice')}};
	            	var toPrice = {{ Session::get('toPrice') }};
	            	val = [fromPrice, toPrice];
	            @else
	                val = [0,1000];
	            @endif        	
	        	
	        	$("#slider-range").slider({
	                isRTL: Metronic.isRTL(),
	                range: true,
	                min: 0,
	                max: 1000,
	                values: val,
	                slide: function (event, ui) {
	                    $("#slider-range-amount").text("\u20AC" + ui.values[0] + " - \u20AC" + ui.values[1]);
	                    $('input[name="fromPrice"]').val(ui.values[0]);
	                    $('input[name="toPrice"]').val(ui.values[1]);
	                }
	            });
	        	 $("#slider-range-amount").text("\u20AC" + $("#slider-range").slider("values", 0) + " - \u20AC" + $("#slider-range").slider("values", 1));
        	 // \END SERVICE PRICE RANGE SLIDER
        	 
        	 // START SERVICE RATE RANGE SLIDER
	            @if(Session::has('fromRate'))
	                var fromRate = {{ Session::get('fromRate')}};            	
	            	val = fromRate;
	            @else
	                val = 0;
	            @endif        	
	        	
	            $("#slider-range-max").slider({
	                isRTL: Metronic.isRTL(),
	                range: "max",
	                min: 0,
	                max: 5,
	                value: val,
	                slide: function (event, ui) {
	                    $("#slider-range-max-amount").text(ui.value);
	                    $('input[name="fromRate"]').val(ui.value);
	                }
	            });
	
	            $("#slider-range-max-amount").text($("#slider-range-max").slider("value"));
        	 // \END SERVICE RATE RANGE SLIDER
        	 
 			//START AVAILABLE OUT OF OFFICE CHECKBOX OPTION
				$("#available_office").change(function (){
					if($(this).prop('checked'))
						$('input[name="office_available"]').val(1);
					else
						$('input[name="office_available"]').val(0);
				});
			// \END AVAILABLE OUT OF OFFICE CHECKBOX OPTION
			
			// START ONLINE PAYMENT CHECKBOX OPTION
				$("#online_payment").change(function (){
					if($(this).prop('checked'))
						$('input[name="online_payment"]').val(1);
					else
						$('input[name="online_payment"]').val(0);
				});
			// \ END ONLINE PAYMENT CHECKBOX OPTION
			
			// START DISCOUNT AVAILABLE CHECKBOX OPTION
				$("#discount_available").change(function (){
					if($(this).prop('checked'))
						$('input[name="discount_available"]').val(1);
					else
						$('input[name="discount_available"]').val(0);
				});
			// \ END DISCOUNT AVAILABLE CHECKBOX OPTION
        // \ END SERVICE SEARCH	
        
        	$('.scroller').slimScroll({
                color:'#57b5e3',        	
    			height:'275px'
            });
        	var html ='', title;
        	$('.top-menu .dropdown-quick-sidebar-toggler a, .page-quick-sidebar-toggler').click(function (e) {
                $('body').toggleClass('page-quick-sidebar-open'); 
            });
        	$(".multiSelect input[type=checkbox]").each(function(idx, elem) {            	      		   
 						if($(this).is(':checked')){ 							
 					        title = $(this).attr("data-title").split(':').pop() + ",";
 							html += '<span title="' + title + '">' + title + '</span>';
 							$(".hida").hide();
 						}
 						$('.multiSel').html(html);
      		});
        });

        var substringMatcher = function(strs) {
            return function findMatches(q, cb) {
                var matches, substrRegex;
                matches = [];
                substrRegex = new RegExp(q, 'i');
                $.each(strs, function(i, str) {
                    if (substrRegex.test(str)) {
                        matches.push({ value: str });
                    }
                });
                cb(matches);
            };
        };
           
        var officies = [];
        @foreach ($officies as $key => $value)
            officies[{{ $key }}] = "{{ $value->address }}";
        @endforeach

        var categories = [];
        @foreach ($categories as $key => $value)
            categories[categories.length] = '{{ $value->name }}';
            @foreach ($value->subCategories as $subKey => $subValue)
                categories[categories.length] = '{{ $subValue->name }}';
            @endforeach
        @endforeach            

        var classes = []; 
            @foreach ($classes as $key => $value)
            classes[classes.length] = '{{ $value->name }}';
            @foreach ($value->subclasses as $subKey => $subValue)
                classes[classes.length] = '{{ $subValue->name }}';
            @endforeach
        @endforeach

        $('#js-prof-keyword').typeahead({
            hint: true,
            highlight: true,
            minLength: 1
        }, {
            name: 'keywords',
            displayKey: 'value',
            source: substringMatcher(classes)
        });
        
        $('#js-text-keyword').typeahead({
            hint: true,
            highlight: true,
            minLength: 1
        }, {
            name: 'keywords',
            displayKey: 'value',
            source: substringMatcher(categories)
        });
            
        $('#js-text-location').typeahead({
            hint: true,
            highlight: true,
            minLength: 1
        }, {
            name: 'officies',
            displayKey: 'value',
            source: substringMatcher(officies)
        });
        $('#js-text-office').typeahead({
            hint: true,
            highlight: true,
            minLength: 1
        }, {
            name: 'officies',
            displayKey: 'value',
            source: substringMatcher(officies)
        });
        
        $("#js-text-keyword, #js-text-location").keyup(function(event) {
            if (event.keyCode == 13) {
                $("button#js-btn-search").click();
            }
        });
        
        $("button#js-btn-search").click(function() {            
        	$("input[name='keyword']").val($("#js-text-keyword").val());
            $("input[name='location']").val($("#js-text-location").val());
            $("#js-frm-search").submit();
        });

		$('button#js-prof-search').click(function(){
			
 			$("input[name='keyword']").val($("#js-prof-keyword").val());
 			$("input[name='location']").val($("#js-text-office").val());
 			$("#prof-search-frm").submit();
		});
        
        $('[data-toggle="tooltip"]').tooltip();
        $('input#js-number-rating').rating();
        
        $(document).ready(function() {
            if(navigator.geolocation) {
                navigator.geolocation.getCurrentPosition(function(position) {
                    $("input[name='lat']").val(position.coords.latitude);
                    $("input[name='lng']").val(position.coords.longitude);
                });
            }
            if($('.messenger').hasClass('open')){
            	$('.messenger').animate({height:"40px"}, 200);
        	    $('.messenger').removeClass("open");console.log('close');
        	    $('.messenger').addClass("close_cb");
        	    $('.chat-footer').hide();
        	    $('#chat-toggle span').removeClass('glyphicon-chevron-down');
        	    $('#chat-toggle span').addClass('glyphicon-chevron-up');
            }
        });

      //~*~*~*~*~*~*~*~*~*~*~*~ START LIVE CHAT ~*~*~*~*~*~*~*~*~*
        jQuery(function(){
            var prof_id = '';
 		@if(Session::has('user_id'))
        // var fake_user_id = Math.floor((Math.random()*1000)+1);
        var fake_user_id = {{ Session::get('user_id') }};
        @else 
            var fake_user_id = '';
        @endif

        @if(isset($prof_id))
            prof_id = {{$prof_id}};
        @endif
        
        //make sure to update the port number if your ws server is running on a different one.
        window.app = {};
 
        app.BrainSocket = new BrainSocket(
                new WebSocket('ws://23.229.247.199:8080'),
                new BrainSocketPubSub()
        );
 
        app.BrainSocket.Event.listen('generic.event',function(msg){
            console.log(msg);            
            if(msg.client.data.user_id == fake_user_id){
                $('#chat-log').append('<li><img src="{{ HTTP_USER_PATH. DEFAULT_PHOTO }}" class="img-circle" width="40"><div class="message">'+msg.client.data.message+'</div></li>');
            }else if(msg.client.data.receiver_id == fake_user_id){
                var str_test='<li class="right"><img src="'+msg.client.data.user_portrait+'" class="img-circle" width="40"><div class="message">'+msg.client.data.message+'</div></li>';
                $('#chat-log').append(str_test);
                if ($('.messenger').hasClass("close_cb"))
                	$('#chat-toggle').click();
            }
        });
 
        app.BrainSocket.Event.listen('app.success',function(data){
            console.log('An app success message was sent from the ws server!');
            console.log(data);
        });
 
        app.BrainSocket.Event.listen('app.error',function(data){
            console.log('An app error message was sent from the ws server!');
            console.log(data);
        });
        
        $('#chat-message').keypress(function(event) {
 
            if(event.keyCode == 13){
 
                app.BrainSocket.message('generic.event',
                        {
                            'message':$(this).val(),
                            'user_id':fake_user_id,
                            'user_portrait':'{{HTTP_USER_PATH. DEFAULT_PHOTO}}',
                            'receiver_id': prof_id
                        }
                );
				//save chat history in database by ajax
				var message = $(this).val();
				 $.ajax({
		            url: "{{ URL::route('async.user.savechat') }}",
		            dataType : "json",
		            type : "POST",
		            data : { 
		            	from : fake_user_id, 
		            	to : prof_id, 
		            	message : message,
		            	direction : 'up'
		            	},
		            success : function(data){
		            	
		            }
		            	
		        });
				// \ end ajax
				 $(this).val('');
            } 
            return event.keyCode != 13; }
        );
        
    });

        function scrollChat(){
        	  var s = $('.messenger-body').scrollTop();
        	  var h = $('.messenger-body').height();
        	  //alert( "scrollTop: " + s + " " + "height: " + h)
        	  $('.messenger-body').scrollTop(h);
        	}
        	// jQuery Animation
        	$('#chat-toggle, .open-close-chat').click( function(event){
        	  event.preventDefault();
        	  if ($('.messenger').hasClass("close_cb")){ //open chat box
        	    $('.messenger').animate({height:"395px"}, 200);console.log('open');
        	    $('.messenger').removeClass("close_cb");
        	    $('.messenger').addClass("open");
        	    $('.chat-footer').fadeIn();
        	    $('#chat-toggle span').removeClass('glyphicon-chevron-up');
        	    $('#chat-toggle span').addClass('glyphicon-chevron-down');
        	    scrollChat();
        	  } else{ // close chat box
        	    $('.messenger').animate({height:"40px"}, 200);
        	    $('.messenger').removeClass("open");console.log('close');
        	    $('.messenger').addClass("close_cb");
        	    $('.chat-footer').hide();
        	    $('#chat-toggle span').removeClass('glyphicon-chevron-down');
        	    $('#chat-toggle span').addClass('glyphicon-chevron-up');
        	  }
        	  return false;
        	});
        	// \~*~*~*~*~*~*~*~~*~*~*~ END LIVE CHAT ~*~*~*~*~*~*~*~*~*~*~*~*~*~*
        </script>      
    @stop
@stop