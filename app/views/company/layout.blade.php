@extends('main')
@section('page-styles')
{{ HTML::style('/assets/metronic/admin/layout/css/layout.css') }}
{{ HTML::style('/assets/metronic/admin/layout/css/themes/default.css') }}
{{ HTML::style('/assets/metronic/admin/layout/css/custom.css') }}
{{ HTML::style('/assets/css/style_company.css') }}
{{ HTML::style('/assets/css/messenger.css') }}
{{ HTML::style('/assets/metronic/global/plugins/select2/select2.css') }}
@stop

@section('body')
<body class="page-header-fixed page-quick-sidebar-over-content company_section">
    @section('header')

    <div class="page-header navbar navbar-fixed-top">
        <!-- BEGIN HEADER INNER -->
        <div class="page-header-inner">
        <!-- container start -->
        <div class="container">
            <!-- BEGIN LOGO -->
            <div class="page-logo">
                <a href="{{ URL::route('user.home') }}">
                    <img src="{{ asset('assets/img/logo.png') }}" alt="logo" class="logo-default img-responsive" style="height: 38px; margin-top: 3px;">
                </a>
            </div>
            <!-- END LOGO -->
            <!-- BEGIN RESPONSIVE MENU TOGGLER -->
            <a href="javascript:;" class="menu-toggler responsive-toggler" data-toggle="collapse" data-target="">
            </a>
            <!-- END RESPONSIVE MENU TOGGLER -->
           <div class="page-sidebar-wrapper">
            <div class="page-sidebar navbar-collapse" id="toggle_id">
                <ul class="page-sidebar-menu" data-auto-scroll="true" data-slide-speed="200">
                    <li class="sidebar-toggler-wrapper">
                        <div class="sidebar-toggler"></div>
                    </li>

                    <!-- <li class="start {{ ($pageNo == 1) ? 'active' : '' }}">
                        <a href="{{ URL::route('company.dashboard') }}">
                            <i class="icon-bar-chart"></i>
                            <span class="title">{{ $langLbl['Dashboard'] }}</span>
                        </a>
                    </li> -->
                    <li class="last {{ ($pageNo == 9) ? 'active' : '' }}">
                        <a href="{{ URL::route('company.profile') }}">
                            <i class="fa fa-building"></i>
                            
                            <span class="title">Professional Profile</span>
                        </a>
                    </li>
                    <li class="{{ ($pageNo == 5) ? 'active' : '' }}">
                        <a href="{{ URL::route('company.office') }}">
                            <i class="fa fa-map-marker"></i>
                           
                            <span class="title">Offices</span>
                        </a>
                    </li>

                    <li class="{{ ($pageNo == 13) ? 'active' : '' }}">
                        <a href="{{ URL::route('company.store') }}">
                            <i class="fa fa-bank"></i>
                           
                            <span class="title">Services</span>
                        </a>
                    </li>    
                    <li class="{{ ($pageNo == 33) ? 'active' : '' }}">
                        <a href="{{ URL::route('company.request') }}">
                            <i class="fa fa-edit"></i>
                            
                            <span class="title">Requests</span>
                        </a>
                    </li>                         
                    <li class="{{ ($pageNo == 3) ? 'active' : '' }}">
                        <a href="{{ URL::route('company.book') }}">
                            <i class="fa fa-shopping-cart"></i>
                            
                            <span class="title">Booking</span>
                        </a>
                    </li>
                    <li class="{{ ($pageNo == 2) ? 'active' : '' }}">
                        <a href="{{ URL::route('company.user') }}">
                            <i class="icon-users"></i>
                            
                            <span class="title">Consumer</span>
                        </a>
                    </li>
                    <li class="{{ ($pageNo == 6) ? 'active' : '' }}">
                        <a href="{{ URL::route('company.feedback') }}">
                            <i class="fa fa-edit"></i>
                            
                            <span class="title">Feedback</span>
                        </a>
                    </li>

                    <li class="{{ ($pageNo == 14) ? 'active' : '' }}">
                        <a href="{{ URL::route('company.message') }}">
                            <i class="fa fa-comment"></i>
                            
                            <span class="title">Messages</span>
                        </a>
                    </li>                            
                    @if(Session::get('company_type') != 'pro_py')
                    @endif
                    <li class="{{ ($pageNo == 16) ? 'active' : '' }}">
                        <a href="{{ URL::route('company.post') }}">
                            <i class="fa fa-table"></i>
                            
                            <span class="title">Posts</span>
                        </a>
                    </li>
                    <li class="dropdown dropdown-quick-sidebar-toggler">
                        <a href="{{ URL::route('company.auth.logout') }}" class="dropdown-toggle">
                            	 {{ $langLbl['Sign Out'] }}
                        </a>
                    </li>
                </ul>
            </div>
        </div>

            <!-- container end -->
            </div>	
        </div>
        <!-- END HEADER INNER -->
    </div>
    <div class="clearfix"></div>
    @show

    @section('main')
    <?php
    if (!isset($pageNo)) {
        $pageNo = 0;
    }
    ?>
    <div class="page-container">
       
        <div class="page-content-wrapper">
            <div class="page-content">
                <div class="container">
                @yield('breadcrumb')
                @yield('content')
                </div>
            </div>
        </div>
    </div>            
    @show

    @section('footer')
            <div class="pre-footer">
            <div class="container">
                <div class="row">
                    <div class="col-md-2 pre-footer-col">&nbsp;</div>
                    <div class="col-sm-4 col-md-3 pre-footer-col">
                        <h2>DoveCercare</h2>
                        <ul>
                            <li><a href="{{ URL::route('user.howitworks') }}" target="_blank">{{ $langLbl['How it works'] }}</a></li>
                            <li><a href="{{ URL::route('user.help') }}" target="_blank">{{ $langLbl['Help'] }}</a></li>
                            <li><a href="{{ URL::route('user.contactus') }}" target="_blank">{{ $langLbl['Contact and Support'] }}</a></li>
                        </ul>
                        <ul class="text-center">
                            <li class="dropdown" id="lng-drop" style="border: 1px solid;  padding-left: 10px;min-width:103px;list-style:none;max-width:103px;">
                            <span class="globe_icon"><i class="fa fa-globe"></i></span>


                                <a class="dropdown-toggle  lng_caret" id="lng_caretlink" data-toggle="dropdown" data-target="#" href="#" style="padding:0 0 1px !important;color: grey; font-size:12px;">                                       
                                    @foreach($siteLanguage as $sLangKey => $sLangVal)
                                    @if(($sLangVal == '' ? 'en' : $sLangVal) == (isset($_COOKIE['current_lang']) ? $_COOKIE['current_lang'] : 'en'))
                                        {{ $langLbl[$sLangKey] }}
                                    @endif
                                    @endforeach <span class="caret2"></span>
                                </a>

                                <ul class="dropdown-menu lng_group menuOpenedfrt" id="lng_group_list" style="box-shadow: none; left: -1px; min-width: 103px; background: rgb(49, 48, 48) none repeat scroll 0px 0px;
                                    border-top: 1px solid grey ! important; border-left: 1px solid grey;
                                    border-right: 1px solid grey; border-bottom: 0px none; text-align: center; padding: 0px; margin-top: -80px;">
                                    @foreach($siteLanguage as $sLangKey => $sLangVal)
                                    @if(($sLangVal == '' ? 'en' : $sLangVal) != (isset($_COOKIE['current_lang']) ? $_COOKIE['current_lang'] : 'en'))
                                    <li><a href="javascript:void(0)" lang="{{ $sLangVal == '' ? 'en' : $sLangVal }}" class="langDD lng_bar" style="color:grey;padding:3px 15px;"> {{ $langLbl[$sLangKey] }} </a></li>
                                    @endif
                                    @endforeach                                         
                                </ul>
                            </li>
                        </ul>
                    </div>
                    <div class="col-sm-4 col-md-3 pre-footer-col">
                        <h2>Press</h2>
                        <ul>
                            <li><a href="{{URL::route('store.posts') }}" target="_blank">{{ $langLbl['Blog'] }}</a></li>
                            <li><a href="{{ URL::route('post.professions' ) }}" target="_blank">{{ $langLbl['World of Professions'] }}</a></li>
                            <li><a href="{{ URL::route('user.signup' ) }}"  target="_blank">{{ $langLbl['Write On DoveCercare'] }}</a></li>
                        </ul>
                    </div>
                    <div class="col-sm-4 col-md-2 pre-footer-col">                            
                        <h2>Social</h2>
                        <ul>
                            <li><a href="{{URL::route('store.posts') }}" target="_blank">DoveCercare</a></li>
                            <li><a href="https://www.facebook.com/dovecercare" target="_blank">Facebook</a></li>
                            <li><a href="javascript:void(0);" id="invite-btn" data-toggle="modal" data-target="#categoryModal" data-keyboard="false" data-backdrop="static">{{ $langLbl['Invite'] }}</a></li>
                        </ul>
                    </div>


                    <div class="col-md-2 pre-footer-col">&nbsp;</div>
                </div>
            </div>
        </div>

                <!-- Invite Friend Modal Start -->

        <div class="modal fade modal_hide" id="categoryModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
          <div role="document" class="modal-dialog modal-xs">
                <div class="modal-content custom_modal">
                  <div class="modal-header">
                    <button aria-label="Close" data-dismiss="modal" class="close" type="button"><span aria-hidden="true">×</span></button>
                    <h4 id="myModalLabel" class="modal-title"><i class="fa fa-user"></i> {{ $langLbl['Invite Message'] }}</h4>
                  </div>
                  <div class="modal-body modal_body" id="invite-section">
                      <?php
                        $errmsg = "";
                        $errmsg .= "<div id='error_msg' style='display:none' class='alert alert-danger alert-dismissable'>";
                        $errmsg .= "<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>";
                        $errmsg .= "<b></b><center><i class='fa fa-times'></i> </center></div>";
                        echo $errmsg;

                        $successmsg = "";
                        $successmsg .= "<div id='success_msg' style='display:none' class='alert alert-success alert-dismissable'>";
                        $successmsg .= "<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>";
                        $successmsg .= "<b></b><center><i class='fa fa-check'></i> </center></div>";
                        echo $successmsg;
                      ?>
                      <h5>{{ $langLbl['Invite your friend by typing email address below: '] }}</h5>
                      <form method="post" class="form-signin" id="invite_form" novalidate>
                        <div class="form-group">
                          <input type="email"  id="email" class="form-control" placeholder="{{ $langLbl['Email Address'] }}" >
                        </div>
                        <div class="form-group">
                          <textarea maxlength="250" class="form-control invite-msg" name="description" id="description" placeholder="{{ $langLbl['Description'] }}" rows="2"></textarea>
                        </div>
                        <h5><span id="char_count">250</span> {{ $langLbl['characters left'] }}</h5>
                        <button type="button" id="invite-submit-btn" class="btn btn-lg orange_btn btn-block">{{ $langLbl['Invite Friend'] }}</button>
                      </form>
                  </div>
                </div>
              </div>
        </div>

        <!-- Invite Friend Modal End -->

        <div class="page-wrapper footercol">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 col-sm-6 padding-top-10 foot_border" style="padding-bottom:10px;color:grey;">
                        Copyright &copy; 2010-<?php echo date("Y"); ?> DoveCercare.
                        <a style="color:grey;" class="bordr" href="{{ URL::route('user.terms') }}" target="_blank">{{ $langLbl['Terms and Condition'] }}</a>
                        <a style="color:grey;" href="{{ URL::route('user.privacy') }}" target="_blank">{{ $langLbl['Privacy Policy'] }}</a>
                    </div>                        
                </div>
            </div>
        </div>
<!--     <div class="page-footer footer-background">
        <div class="page-footer-inner">
            &copy; {{ $langLbl['Copyright'] }} <?php echo date('Y'); ?> | {{ $langLbl['All Rights Reserved'] }} 
        </div>
        <div class="page-footer-tools">
            <span class="go-top">
                <i class="fa fa-angle-up"></i>
            </span>
        </div>
    </div> -->
    @show
</body>
@stop

@section('page-scripts')   
@include('chating_common')     
{{ HTML::script('/assets/metronic/admin/layout/scripts/layout.js') }}
{{ HTML::script('/assets/metronic/admin/layout/scripts/quick-sidebar.js') }}
{{ HTML::script('/assets/metronic/admin/layout/scripts/layout.js') }}
{{ HTML::script('/assets/metronic/admin/pages/scripts/components-form-tools.js') }}
{{ HTML::script('/assets/js/brain-socket.min.js') }}
{{ HTML::script('/assets/js/socket.io-1.2.0.js') }}
{{ HTML::script('/assets/metronic/global/plugins/select2/select2.min.js') }}
<script>
    jQuery(document).ready(function() {
    Metronic.init(); // init metronic core components
            Layout.init(); // init current layout
            QuickSidebar.init() // init quick sidebar

            $("a#js-a-delete").click(function(event) {
    event.preventDefault();
            var url = $(this).attr('href');
            bootbox.confirm("Are you sure?", function(result) {
    if (result) {
    window.location.href = url;
    }
    });
    });
            $('[data-toggle="tooltip"]').tooltip();
            if ($('.messenger').hasClass('open')){
    $('.messenger').animate({height:"40px"}, 200);
            $('.messenger').removeClass("open"); console.log('close');
            $('.messenger').addClass("close_cb");
            $('.chat-footer').hide();
            $('#chat-toggle span').removeClass('glyphicon-chevron-down');
            $('#chat-toggle span').addClass('glyphicon-chevron-up');
    }
    });
//~*~*~*~*~*~*~*~ START LIVE CHAT ~*~*~*~~*~*~*~*~*~**~

            jQuery(function(){
    var receiver_id = 1;
            @if (Session::has('company_id'))
            var fake_user_id = {{ Session::get('company_id') }};
            @else
            var fake_user_id = ''
            @endif
//make sure to update the port number if your ws server is running on a different one.
            window.app = {};
            app.BrainSocket = new BrainSocket(
            new WebSocket('ws://23.229.247.199:8080'),
            new BrainSocketPubSub()
            );
            app.BrainSocket.Event.listen('generic.event', function(msg){
    console.log(msg);
            receiver_id = msg.client.data.user_id;
            if (msg.client.data.user_id == fake_user_id){
    $('#chat-log').append('<li><img src="{{ HTTP_USER_PATH. DEFAULT_PHOTO }}" class="img-circle" width="40"><div class="message">' + msg.client.data.message + '</div></li>');
    } else if (msg.client.data.receiver_id == fake_user_id){
    var str_test = '<li class="right"><img src="' + msg.client.data.user_portrait + '" class="img-circle" width="40"><div class="message">' + msg.client.data.message + '</div></li>';
            $('#chat-log').append(str_test);
            if ($('.messenger').hasClass("close_cb"))
            $('#chat-toggle').eq(0).click();
    }
    });
            app.BrainSocket.Event.listen('app.success', function(data){
    console.log('An app success message was sent from the ws server!');
            console.log(data);
    });
            app.BrainSocket.Event.listen('app.error', function(data){
    console.log('An app error message was sent from the ws server!');
            console.log(data);
    });
            $('#chat-message').keypress(function(event) {

    if (event.keyCode == 13){
    console.log(fake_user_id);
            app.BrainSocket.message('generic.event',
    {
    'message':$(this).val(),
            'user_id':fake_user_id,
            'user_portrait':'{{HTTP_USER_PATH. DEFAULT_PHOTO}}',
            'receiver_id': receiver_id
    }
    );
            var message = $(this).val();
            $.ajax({
    url: "{{ URL::route('async.user.savechat') }}",
            dataType : "json",
            type : "POST",
            data : {
    from : fake_user_id,
            to : receiver_id,
            message : message,
            direction : 'pu'
    },
            success : function(data){

    }
    });
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
    $('#chat-toggle, .open-close-chat').click(function(event){
    event.stopPropagation();
            if ($('.messenger').hasClass("close_cb")){ //open chat box
    $('.messenger').animate({height:"395px"}, 200); console.log('open');
            $('.messenger').removeClass("close_cb");
            $('.messenger').addClass("open");
            $('.chat-footer').fadeIn();
            $('#chat-toggle span').removeClass('glyphicon-chevron-up');
            $('#chat-toggle span').addClass('glyphicon-chevron-down');
            scrollChat();
    } else{ // close chat box
    $('.messenger').animate({height:"40px"}, 200);
            $('.messenger').removeClass("open"); console.log('close');
            $('.messenger').addClass("close_cb");
            $('.chat-footer').hide();
            $('#chat-toggle span').removeClass('glyphicon-chevron-down');
            $('#chat-toggle span').addClass('glyphicon-chevron-up');
    }
    return false;
    });
// \ ~*~*~~*~*~*~*~*~* END LIVE CHAT ~*~*~~*~*~*~*~*  	
</script> 
<script>
    jQuery(document).ready(function() {
        Metronic.init(); // init metronic core components
        Layout.init(); // init current layout
        QuickSidebar.init() // init quick sidebar
      //  ComponentsDropdowns.init();

        $("a#js-a-delete").click(function(event) {
            event.preventDefault();
            var url = $(this).attr('href');
            bootbox.confirm("Are you sure?", function(result) {
                if (result) {
                    window.location.href = url;
                }
            });
        });
        
        $('#langDD').select2({
            placeholder: "Select an option",
            minimumResultsForSearch: - 1
        });
        $("#langDD").on('change', function() {
            $.post("{{ url('change-language') }}", {lang:  $("#langDD").val()}, function() {
                location.href = location.href;
            });
        });
        var currentLang = '';
        $(".langDD").on('click', function() {
            currentLang = $(this).attr('lang');
            $.post("{{ url('change-language') }}", {lang:  $(this).attr('lang')}, function(data) {
                setTimeout(function(){
                    location.href = location.href;
                }, 1000);
                
            });
        });
    });
</script>   
 
<!-- Invite Friend Script Strat --> 

<script type="text/javascript">
  $(document).ready(function(){
    $('body').on('click','#invite-submit-btn',function(){
        $('#invite-section #success_msg').hide();
        $('#invite-section #error_msg').hide();
        var email = $('#email').val();
        var description = $('#description').val();
        var filter = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
        if(!filter.test(email) || email == "")
        {
            $('#invite-section #error_msg').html("<center><i class='fa fa-times'> {{ $langLbl['valid email'] }} </i></center>").show();
            return false;
        }
        $('#invite-section #error_msg').hide();
        $.ajax({
            url : "{{ MY_BASE_URL }}/invite",
            type: "post",
            data: {email:email,description:description},
            success:function(response){
                console.log(response);
                $('#email, #description').val("");
                $('span#char_count').html('250');
                $('#invite-section #success_msg').html("<center><i class='fa fa-check'> {{ $langLbl['Success'] }} </i></center>").show();
            },
            error:function(error){
                console.log(error);
                $('#invite-section #error_msg').html("<center><i class='fa fa-times'> {{ $langLbl['Error'] }} </i></center>").show();
            }
        });
      });
    
    $('body').on('keyup','.invite-msg',function(){
        var msg_val = $('.invite-msg').val();
        var msgLength = parseInt(msg_val.length);
        var remainingLength = 250 - msgLength;
        $('span#char_count').html(remainingLength);
    });
 });
</script>

<script>
$(document).ready(function(){
    $(".menu-toggler").click(function(){
        $("#toggle_id").slideToggle();
    });
});
</script>

<!-- Invite Friend Script End -->        
@stop
@stop
