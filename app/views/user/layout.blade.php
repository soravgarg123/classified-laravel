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
{{ HTML::style('/assets/metronic/global/plugins/select2/select2.css') }}
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

        <div class="header background-default" style="border-top: 5px solid #AE3030;">  
            <div class="clearfix"></div>  
            <div class="header-wrapper">
                <div class="container">
                    <div class="header-inner">
                        <div class="header-content">
                            <div class="header-top">
                                <a href="javascript:void(0);" class="innr_mob"><i class="fa fa-bars"></i></a> 
                                <ul class="nav innr_mob_toggle">
                                    @if (Session::has('user_id') )
                                    <li><a href="{{ URL::route('user.cart') }}" class="btn-menu {{ $pageNo == 1 ? 'active' : '' }}">{{ $langLbl['Cart'] }}</a></li>

                                    <li><a href="{{ URL::route('user.profile') }}" class="btn-menu {{ $pageNo == 2 ? 'active' : '' }}">{{ $langLbl['Profile'] }}</a></li>

                                    <li><a href="{{ URL::route('user.requests') }}" class="btn-menu {{ $pageNo == 34 ? 'active' : '' }}">{{ $langLbl['My Requests'] }}</a></li>
                                    
                                    <li><a href="{{ URL::route('user.messages') }}" class=".dropdown-toggle" data-toggle=".dropdown" data-hover=".dropdown" data-close-others="true" style="cursor:pointer;">{{ $langLbl['Messages'] }}</a></li>

                                    <li><a href="{{ URL::route('request.create') }}" style="color:#3c763d !important" class="btn-menu">{{ $langLbl['Request a service'] }}</a></li>

                                    <li><a href="{{ URL::route('user.doSignout') }}" class="btn-menu">{{ $langLbl['Sign Out'] }}</a></li>
                                    @else
                                    <li><a href="{{ isset($redirect) && ($redirect != '') ? URL::route('user.login').'?redirect='.urlencode($redirect) : URL::route('user.login') }}" class="btn-menu {{ $pageNo == 51 ? 'active' : '' }}">{{ $langLbl['Login'] }}</a></li>

                                    <li><a href="{{ isset($redirect) && ($redirect != '') ? URL::route('user.signup').'?redirect='.urlencode($redirect) : URL::route('user.signup') }}" class="btn-menu {{ $pageNo == 52 ? 'active' : '' }}">{{ $langLbl['Register'] }}</a></li>                            

                                    <!-- <li>
                                        <a href="javascript:void(0);" class="btn-menu">{{ $langLbl['Business Area'] }} <span class="caret"></span></a>
                                        <ul class="bld">
                                            <li>
                                                <a href="{{ URL::route('company.auth.login') }}" class="dropdown-toggle">{{ $langLbl['Login'] }}</a>
                                            </li>
                                            <li>
                                                <a href="{{ URL::route('company.auth.membership') }}" class="dropdown-toggle">{{ $langLbl['Register'] }}</a>
                                            </li>
                                        </ul>
                                    </li> -->

                                    <li><a href="{{ URL::route('request.create') }}" style="color:#3c763d !important" class="btn-menu">{{ $langLbl['Request a service'] }}</a></li>
                                    <li><a href="{{ URL::route('user.howitworks') }}" target="_blank" class="btn-menu">{{ $langLbl['How it works'] }}</a></li>
                                    <li>
                                        <a href="#" style="color: #FFF;" class="btn-menu">{{ $langLbl['Select Language'] }} <span class="caret"></span></a>
                                        <ul>
                                            @if($siteLanguage)
                                            @foreach($siteLanguage as $sLangKey => $sLangVal)
                                            <li>
                                                <a href="javascript:void(0);" lang="{{ $sLangVal == '' ? 'en' : $sLangVal }}" class="langDD dropdown-toggle @if((isset($_COOKIE['current_lang']) ? $_COOKIE['current_lang'] : 'en') == ($sLangVal == '' ? 'en' : $sLangVal)) active @endif">
                                                    {{ $langLbl[$sLangKey] }} 
                                                </a>
                                            </li> 
                                            @endforeach
                                            @endif
                                        </ul>
                                    </li>                        
                                    @endif
                                </ul>
                                <ul class="header-nav-secondary nav nav-pills desk_tp">
                                    @if (Session::has('user_id') )
                                    <li><a href="{{ URL::route('user.cart') }}" class="btn-menu {{ $pageNo == 1 ? 'active' : '' }}">{{ $langLbl['Cart'] }}</a></li>

                                    <li><a href="{{ URL::route('user.profile') }}" class="btn-menu {{ $pageNo == 2 ? 'active' : '' }}">{{ $langLbl['Profile'] }}</a></li>

                                    <li><a href="{{ URL::route('user.requests') }}" class="btn-menu {{ $pageNo == 34 ? 'active' : '' }}">{{ $langLbl['My Requests'] }}</a></li>

                                    <!-- <li><a href="{{ URL::route('user.offers') }}" class="btn-menu {{ $pageNo == 3 ? 'active' : '' }}">{{ $langLbl['Offers'] }}</a></li> -->

                                    <li><a href="{{ URL::route('user.messages') }}" class=".dropdown-toggle" data-toggle=".dropdown" data-hover=".dropdown" data-close-others="true" style="cursor:pointer;">{{ $langLbl['Messages'] }}</a></li>

                                    <li><a href="{{ URL::route('request.create') }}" style="color:#3c763d !important" class="btn-menu">{{ $langLbl['Request a service'] }}</a></li>

                                    <li><a href="{{ URL::route('user.doSignout') }}" class="btn-menu">{{ $langLbl['Sign Out'] }}</a></li>
                                    @else
                                    <li><a href="{{ isset($redirect) && ($redirect != '') ? URL::route('user.login').'?redirect='.urlencode($redirect) : URL::route('user.login') }}" class="btn-menu {{ $pageNo == 51 ? 'active' : '' }}">{{ $langLbl['Login'] }}</a></li>

                                    <li><a href="{{ isset($redirect) && ($redirect != '') ? URL::route('user.signup').'?redirect='.urlencode($redirect) : URL::route('user.signup') }}" class="btn-menu {{ $pageNo == 52 ? 'active' : '' }}">{{ $langLbl['Register'] }}</a></li>                            

                                    <!-- <li><a href="{{ URL::route('company.auth') }}" class="btn-menu">{{ $langLbl['Business Area'] }}</a></li> -->

                                    <li><a href="{{ URL::route('request.create') }}" class="btn-menu" style="color:#3c763d !important">{{ $langLbl['Request a service'] }}</a></li>
                                    @endif
                                </ul>

                                <div class="header-logo">
                                    <a href="{{ URL::route('user.home') }}"><img src="{{ asset('assets/img/logo.png') }}" alt="Finternet-Group" style="width:100%; max-width:270px; min-width:200px;">
                                    </a>
                                </div>

                                <a href="javascript:void(0);" class="mobi-toggler moble"><i class="fa fa-bars"></i></a>   
                            </div>


                        </div>
                    </div>
                </div>
                <div class="container container_in" id="container_menu" style="display:none;">
                    <div class="header-content">
                        <div class="header-bottom">
                            <div class="header-navigation">
                                <?php
                                $allcateids = array(1, 2, 5, 6, 8, 9, 10, 14, 15, 16);
                                ?>
                                <ul class="nav nav01 navbar-collapse">
                                    @foreach ($categories as $key => $value)
                                    <?php
                                    $nameVal = 'name' . $currentLanguage;
                                    if ($value->$nameVal != $langLbl['Other']) {
                                        $cat_count = count($value->subCategories);
                                        if ($cat_count > 0) {
                                            $submenuclass = 'submenuclass';
                                        } else {
                                            $submenuclass = '';
                                        }

                                        if (in_array($value->id, $allcateids)) {
                                            $forrightclass = '';
                                        } else {
                                            $forrightclass = 'forright';
                                        }
                                        ?>
                                        <li class="<?php echo $submenuclass; ?>{{$cat_count > 5 ? ' has-mega-menu' : ''}} valchk <?php echo $forrightclass; ?>">
                                            <a class="dropdown-toggle" data-toggle="dropdown" data-target="#" href="#" style="color: #FFF;">
                                                <i class="{{ $value->icon }}"></i>
                                                <b>{{ ucfirst($value->$nameVal) }}</b>
                                                <?php if ($cat_count > 0) { ?>
                                                    <span class="caret"></span>
                                                <?php } ?>
                                            </a>				                            
                                            @if($cat_count > 5)
                                            <ul class="mega-menu">
                                                <?php $i = 0; ?>
                                                @foreach ($value->subCategories as $subKey => $subValue)
                                                @if($i == 0)
                                                <li><ul>
                                                        @endif
                                                        <?php if ($i % 3 == 0) { ?>					                            			
                                                            <li><a href="{{ URL::route('store.search').'?keyword='.$subValue->name }}">{{ $subValue->$nameVal }}</a></li>					                            				
                                                        <?php } ?>					                            		

                                                        <?php $i++; ?>
                                                        @endforeach
                                                    </ul></li>
                                                <?php $i = 0; ?>
                                                @foreach ($value->subCategories as $subKey => $subValue)
                                                @if($i == 0) <li><ul> @endif
                                                        <?php if ($i % 3 == 1) { ?>					                            			
                                                            <li><a href="{{ URL::route('store.search').'?keyword='.$subValue->name }}">{{ $subValue->$nameVal }}</a></li>					                            				
                                                        <?php } ?>					                            		

                                                        <?php $i++; ?>
                                                        @endforeach
                                                    </ul></li>
                                                <?php $i = 0; ?>
                                                @foreach ($value->subCategories as $subKey => $subValue)
                                                @if($i == 0) <li><ul> @endif
                                                        <?php if ($i % 3 == 2) { ?>					                            			
                                                            <li><a href="{{ URL::route('store.search').'?keyword='.$subValue->name }}">{{ $subValue->$nameVal }}</a></li>					                            				
                                                        <?php } ?>					                            		

                                                        <?php $i++; ?>
                                                        @endforeach
                                                    </ul>
                                                </li>
                                            </ul>
                                            @else
                                            <?php if (count($value->subCategories) > 0) { ?>
                                                <ul class="sub-menu">		                            
                                                    @foreach ($value->subCategories as $subKey => $subValue)
                                                    <li><a href="{{ URL::route('store.search').'?keyword='.$subValue->name }}">{{ $subValue->$nameVal }}</a></li>
                                                    @endforeach
                                                </ul>
                                                <?php
                                            }
                                            ?>

                                            @endif
                                        </li>
                                        <?php
                                    } else {
                                        $otherval = $value;
                                    }
                                    ?>
                                    @endforeach
                                    <?php
                                    if (!empty($otherval)) {
                                        $value = $otherval;
                                        $cat_count = count($value->subCategories);
                                        if ($cat_count > 0) {
                                            $submenuclass = 'submenuclass';
                                        } else {
                                            $submenuclass = '';
                                        }
                                        if (in_array($value->id, $allcateids)) {
                                            $forrightclass = '';
                                        } else {
                                            $forrightclass = 'forright';
                                        }
                                        ?>
                                        <li class="<?php echo $submenuclass; ?>{{$cat_count > 5 ? ' has-mega-menu' : ''}} valchk <?php echo $forrightclass; ?>">
                                            <a class="dropdown-toggle" data-toggle="dropdown" data-target="#" href="#" style="color: #FFF;">
                                                <i class="{{ $value->icon }}"></i>
                                                <b>{{ ucfirst($value->$nameVal) }}</b>
                                                <?php if ($cat_count > 0) { ?>
                                                    <span class="caret"></span>
                                                <?php } ?>
                                            </a>				                            
                                            @if($cat_count > 5)
                                            <ul class="mega-menu">
                                                <?php $i = 0; ?>
                                                @foreach ($value->subCategories as $subKey => $subValue)
                                                @if($i == 0)
                                                <li><ul>
                                                        @endif
                                                        <?php if ($i % 3 == 0) { ?>					                            			
                                                            <li><a href="{{ URL::route('store.search').'?keyword='.$subValue->name }}">{{ $subValue->$nameVal }}</a></li>					                            				
                                                        <?php } ?>					                            		

                                                        <?php $i++; ?>
                                                        @endforeach
                                                    </ul></li>
                                                <?php $i = 0; ?>
                                                @foreach ($value->subCategories as $subKey => $subValue)
                                                @if($i == 0) <li><ul> @endif
                                                        <?php if ($i % 3 == 1) { ?>					                            			
                                                            <li><a href="{{ URL::route('store.search').'?keyword='.$subValue->name }}">{{ $subValue->$nameVal }}</a></li>					                            				
                                                        <?php } ?>					                            		

                                                        <?php $i++; ?>
                                                        @endforeach
                                                    </ul></li>
                                                <?php $i = 0; ?>
                                                @foreach ($value->subCategories as $subKey => $subValue)
                                                @if($i == 0) <li><ul> @endif
                                                        <?php if ($i % 3 == 2) { ?>					                            			
                                                            <li><a href="{{ URL::route('store.search').'?keyword='.$subValue->name }}">{{ $subValue->$nameVal }}</a></li>					                            				
                                                        <?php } ?>					                            		

                                                        <?php $i++; ?>
                                                        @endforeach
                                                    </ul>
                                                </li>
                                            </ul>
                                            @else
                                            <?php if (count($value->subCategories) > 0) { ?>
                                                <ul class="sub-menu">		                            
                                                    @foreach ($value->subCategories as $subKey => $subValue)
                                                    <li><a href="{{ URL::route('store.search').'?keyword='.$subValue->name }}">{{ $subValue->$nameVal }}</a></li>
                                                    @endforeach
                                                </ul>
                                                <?php
                                            }
                                            ?>

                                            @endif
                                        </li>
                                        <?php
                                    }
                                    ?>
                                    <div class="more"><span class="span_1"><span style="float:left;padding-left:15px;">{{ $langLbl['See More'] }}</span><img style="width:40px; height:28px;float:right;padding-right:15px;padding-top:3px;" src="{{ asset('assets/metronic/frontend/layout/img/down.png') }}" /></span>
                                        <span class="span_2"><span style="float:left;padding-left:15px;">{{ $langLbl['See Less'] }}</span><img style="width:40px; height:28px;float:right;padding-right:15px;padding-top:3px;" src="{{ asset('assets/metronic/frontend/layout/img/up.png') }}" /></span>
                                    </div>
                                </ul>
                            </div>

                            <div class="header-navigation-left mobile_nav"  >
                                <ul class="header-nav-secondary nav nav-pills">
                                    @if (Session::has('user_id') )
                                    <li><a href="{{ URL::route('user.cart') }}" class="btn-menu {{ $pageNo == 1 ? 'active' : '' }}">{{ $langLbl['Cart'] }}</a></li>

                                    <li><a href="{{ URL::route('user.profile') }}" class="btn-menu {{ $pageNo == 2 ? 'active' : '' }}">{{ $langLbl['Profile'] }}</a></li>

                                    li><a href="{{ URL::route('user.requests') }}" class="btn-menu {{ $pageNo == 34 ? 'active' : '' }}">{{ $langLbl['My Requests'] }}</a></li>

                                    <li><a href="{{ URL::route('user.offers') }}" class="btn-menu {{ $pageNo == 3 ? 'active' : '' }}">{{ $langLbl['Offers'] }}</a></li>

                                    <li><a href="{{ URL::route('user.messages') }}" class=".dropdown-toggle" data-toggle=".dropdown" data-hover=".dropdown" data-close-others="true" style="cursor:pointer;">{{ $langLbl['Messages'] }}</a></li>

                                    <li><a href="{{ URL::route('user.doSignout') }}" class="btn-menu">{{ $langLbl['Sign Out'] }}</a></li>
                                    @else
                                    <li><a href="{{ isset($redirect) && ($redirect != '') ? URL::route('user.login').'?redirect='.urlencode($redirect) : URL::route('user.login') }}" class="btn-menu {{ $pageNo == 51 ? 'active' : '' }}">{{ $langLbl['Login'] }}</a></li>

                                    <li><a href="{{ isset($redirect) && ($redirect != '') ? URL::route('user.signup').'?redirect='.urlencode($redirect) : URL::route('user.signup') }}" class="btn-menu {{ $pageNo == 52 ? 'active' : '' }}">{{ $langLbl['Register'] }}</a></li>                            

                                    <!-- <li>
                                        <a href="#" style="color: #FFF;" class="btn-menu">{{ $langLbl['Business Area'] }}</a>
                                        <ul>
                                            <li>
                                                <a href="{{ URL::route('company.auth.login') }}" class="dropdown-toggle">{{ $langLbl['Login'] }}</a>
                                            </li>
                                            <li>
                                                <a href="{{ URL::route('company.auth.membership') }}" class="dropdown-toggle">{{ $langLbl['Register'] }}</a>
                                            </li>
                                        </ul>
                                    </li> -->

                                    <li><a href="{{ URL::route('request.create') }}" class="btn-menu" style="color:#3c763d !important">{{ $langLbl['Request a service'] }}</a></li>
                                    @endif                                         
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>            

        @show

        @section('main')

        @show

        @section('footer')

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
                      <form method="post" class="form-signin" id="invite_form" novalidate="novalidate">
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
                                    @endforeach	<span class="caret2"></span>
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
                            <li><a href="{{URL::route('store.posts') }}" >{{ $langLbl['Blog'] }}</a></li>
                            <li><a href="{{ URL::route('post.professions' ) }}" >{{ $langLbl['World of Professions'] }}</a></li>
                            <li><a href="{{ URL::route('user.signup' ) }}"  >{{ $langLbl['Write On DoveCercare'] }}</a></li>
                        </ul>
                    </div>
                    <div class="col-sm-4 col-md-2 pre-footer-col">                            
                        <h2>Social</h2>
                        <ul>
                            <li><a href="{{URL::route('store.posts') }}" >DoveCercare</a></li>
                            <li><a href="https://www.facebook.com/dovecercare" target="_blank">Facebook</a></li>
                            <li><a href="javascript:void(0);" id="invite-btn" data-toggle="modal" data-target="#categoryModal" data-keyboard="false" data-backdrop="static">{{ $langLbl['Invite'] }}</a></li>
                        </ul>
                    </div>


                    <div class="col-md-2 pre-footer-col">&nbsp;</div>
                </div>
            </div>
        </div>

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
        <input type="hidden" name="prof_office_available" value="{{Session::has('professional_office_available') ? Session::get('professional_office_available') : 0}}" />
        <input type="hidden" name="session_status" value="{{Session::has('session_status') ? Session::get('session_status') : 0}}" />
    </form>
    @show
</body>
@stop

@section('page-scripts')
@include('chating_common')
{{ HTML::script('/assets/metronic/frontend/layout/scripts/back-to-top.js') }}
{{ HTML::script('/assets/metronic/admin/layout/scripts/layout.js') }}        
{{ HTML::script('/assets/metronic/frontend/layout/scripts/layout.js') }}
{{ HTML::script('/assets/metronic/admin/pages/scripts/custom.js') }}
{{ HTML::script('/assets/metronic/global/plugins/typeahead/handlebars.min.js') }}
{{ HTML::script('/assets/metronic/global/plugins/typeahead/typeahead.bundle.min.js') }}        
{{ HTML::script('//maps.googleapis.com/maps/api/js?v=3.exp&signed_in=true') }}
{{ HTML::script('/assets/js/brain-socket.min.js') }}
{{ HTML::script('/assets/js/socket.io-1.2.0.js') }}
{{ HTML::script('/assets/metronic/global/plugins/select2/select2.min.js') }}
<script>
    $(document).ready(function(){

        // START RESPONSIVE TOGGLE MENU
        $(".mobi-toggler").on("click", function(event) {
            event.preventDefault(); //the default action of the event will not be triggered
            $(".innr_mob_toggle").removeClass("menuOpened");
            $(".header").toggleClass("menuOpened");
            $(".header").find(".header-navigation").toggle(300);
        });
        Layout.initFixHeaderWithPreHeader();
        $(".header-navigation li.dropdown").click(function() {
            $(this).toggleClass("open");
        });
        // \ END RESPONSIVE TOOGGLE MENU
        $(".innr_mob").on("click", function(event) {
            event.preventDefault(); //the default action of the event will not be triggered
            $(".header").find(".header-navigation").hide();
            $(".innr_mob_toggle").toggleClass("menuOpened");
        });
        $("#lng_caretlink").on("click", function(event) {
            event.preventDefault(); //the default action of the event will not be triggered
            $("#lng_group_list").toggleClass("menuOpened");
        });
        // START PROFESSIONAL SEARCH
        var val = 0;
        //range max
        @if (Session::has('prof_fromRate'))
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
        @if (Session::has('fromPricePro'))
        var fromPricePro = {{ Session::get('fromPricePro')}};
        var toPricePro = {{ Session::get('toPricePro') }};
        val = [fromPricePro, toPricePro];
        @else
        val = [0, 1000];
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
        @if (Session::has('fromPrice'))
        var fromPrice = {{ Session::get('fromPrice')}};
        var toPrice = {{ Session::get('toPrice') }};
        val = [fromPrice, toPrice];
        @else
        val = [0, 1000];
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
            @if (Session::has('fromRate'))
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
    if ($(this).prop('checked'))
            $('input[name="office_available"]').val(1);
            else
            $('input[name="office_available"]').val(0);
    });
            // \END AVAILABLE OUT OF OFFICE CHECKBOX OPTION

            // START ONLINE PAYMENT CHECKBOX OPTION
            $("#online_payment").change(function (){
    if ($(this).prop('checked'))
            $('input[name="online_payment"]').val(1);
            else
            $('input[name="online_payment"]').val(0);
    });
            // \ END ONLINE PAYMENT CHECKBOX OPTION

            // START DISCOUNT AVAILABLE CHECKBOX OPTION
            $("#discount_available").change(function (){
    if ($(this).prop('checked'))
            $('input[name="discount_available"]').val(1);
            else
            $('input[name="discount_available"]').val(0);
    });
            // \ END DISCOUNT AVAILABLE CHECKBOX OPTION

            // START ONLINE STATUS CHECKBOX OPTION
            $("#session_status").change(function (){
    if ($(this).prop('checked'))
            $('input[name="session_status"]').val(1);
            else
            $('input[name="session_status"]').val(0);
    });
            // \ END ONLINE STATUS CHECKBOX OPTION

            // START PROF OFFICE AVAILABLE CHECKBOX OPTION
            $("#prof_office_available").change(function (){
    if ($(this).prop('checked'))
            $('input[name="prof_office_available"]').val(1);
            else
            $('input[name="prof_office_available"]').val(0);
    });
            // \ END PROF OFFICE AVAILABLE CHECKBOX OPTION
            // \ END SERVICE SEARCH	

            $('.scroller').slimScroll({
    color:'#57b5e3',
            height:'275px'
    });
            var html = '', title;
            $('.top-menu .dropdown-quick-sidebar-toggler a, .page-quick-sidebar-toggler').click(function (e) {
    $('body').toggleClass('page-quick-sidebar-open');
    });
            $(".multiSelect input[type=checkbox]").each(function(idx, elem) {
    if ($(this).is(':checked')){
    title = $(this).attr("data-title").split(':').pop() + ",";
            html += '<span title="' + title + '">' + title + '</span>';
            $(".hida").hide();
    }
    $('.multiSel').html(html);
    });
    });
            var internaWidth = $(".header-navigation ul").width();
            var width = 0;
//    $(".valchk").each(function( index ) {
//        width += parseFloat($(this).width());
//        if(width <=internaWidth)
//        {
//            //alert(width);
//            //alert(internaWidth);
//            //$(this).addClass('forleft');
//        }
//        else
//        {
//            width = parseFloat($(this).width());            
//            $(this).prev().addClass('forright');
//        }
//    });

            $('#professional-main-menu').change(function () {
    $('input[name="prof_fromRate"]').val($(this).val());
    });
            $('#professional-price-main-menu').change(function () {

    switch ($(this).val()) {
    case '1':
            $('input[name="fromPricePro"]').val('1');
            $('input[name="toPricePro"]').val('20');
            break;
            case '2':
            $('input[name="fromPricePro"]').val('21');
            $('input[name="toPricePro"]').val('50');
            break;
            case '3':
            $('input[name="fromPricePro"]').val('51');
            $('input[name="toPricePro"]').val('200');
            break;
            case '4':
            $('input[name="fromPricePro"]').val('200');
            $('input[name="toPricePro"]').val('1000');
            break;
    }
    });
            $('#search-main-menu').change(function () {
    $('input[name="fromRate"]').val($(this).val());
    });
            $('#search-price-main-menu').change(function () {

    switch ($(this).val()) {
    case '1':
            $('input[name="fromPrice"]').val('1');
            $('input[name="toPrice"]').val('20');
            break;
            case '2':
            $('input[name="fromPrice"]').val('21');
            $('input[name="toPrice"]').val('50');
            break;
            case '3':
            $('input[name="fromPrice"]').val('51');
            $('input[name="toPrice"]').val('200');
            break;
            case '4':
            $('input[name="fromPrice"]').val('200');
            $('input[name="toPrice"]').val('1000');
            break;
    }
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
            @foreach ($value -> subCategories as $subKey => $subValue)
            categories[categories.length] = '{{ $subValue->name }}';
            @endforeach
            @endforeach

            var classes = [];
            @foreach ($classes as $key => $value)
            classes[classes.length] = '{{ $value->name }}';
            @foreach ($value -> subclasses as $subKey => $subValue)
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
            $("#clk_sidebar_tab_1").click(function() {
    alert('hi');
    });
            $("#clk_sidebar_tab_2").click(function() {
    alert('hi45345');
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
    if (navigator.geolocation) {
    navigator.geolocation.getCurrentPosition(function(position) {
    $("input[name='lat']").val(position.coords.latitude);
            $("input[name='lng']").val(position.coords.longitude);
    });
    }
    if ($('.messenger').hasClass('open')){
    $('.messenger').animate({height:"40px"}, 200);
            $('.messenger').removeClass("open"); console.log('close');
            $('.messenger').addClass("close_cb");
            $('.chat-footer').hide();
            $('#chat-toggle span').removeClass('glyphicon-chevron-down');
            $('#chat-toggle span').addClass('glyphicon-chevron-up');
    }
    });
            //~*~*~*~*~*~*~*~*~*~*~*~ START LIVE CHAT ~*~*~*~*~*~*~*~*~*
            jQuery(function(){
    var prof_id = '';
            @if (Session::has('user_id'))
            // var fake_user_id = Math.floor((Math.random()*1000)+1);
            var fake_user_id = {{ Session::get('user_id') }};
            @else
            var fake_user_id = '';
            @endif

            @if (isset($prof_id))
            prof_id = {{$prof_id}};
            @endif

            //make sure to update the port number if your ws server is running on a different one.
            window.app = {};
            app.BrainSocket = new BrainSocket(
            new WebSocket('ws://23.229.247.199:8080'),
            new BrainSocketPubSub()
            );
            app.BrainSocket.Event.listen('generic.event', function(msg){
    console.log(msg);
            if (msg.client.data.user_id == fake_user_id){
    $('#chat-log').append('<li><img src="{{ HTTP_USER_PATH. DEFAULT_PHOTO }}" class="img-circle" width="40"><div class="message">' + msg.client.data.message + '</div></li>');
    } else if (msg.client.data.receiver_id == fake_user_id){
    var str_test = '<li class="right"><img src="' + msg.client.data.user_portrait + '" class="img-circle" width="40"><div class="message">' + msg.client.data.message + '</div></li>';
            $('#chat-log').append(str_test);
            if ($('.messenger').hasClass("close_cb"))
            $('#chat-toggle').click();
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
    $('#chat-toggle, .open-close-chat').click(function(event){
    event.preventDefault();
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
            // \~*~*~*~*~*~*~*~~*~*~*~ END LIVE CHAT ~*~*~*~*~*~*~*~*~*~*~*~*~*~*

            $(".more").click(function(event){
    event.preventDefault();
            var hig = $(window).height();
            var txt3 = hig - 61;
            if ($('.more').hasClass("see_more")){
    $('.more').removeClass("see_more");
            $(".nav01").removeClass("tog");
            $('.navbar-collapse').css('height', '215');
            $('.more').css('position', 'absolute');
            $(".navbar-collapse").scrollTop('0');
    } else{
    $('.more').addClass("see_more");
            $(".nav01").addClass("tog");
            $('.tog').css('height', txt3);
            $('.see_more').css('position', 'relative');
    }
    return false;
    });
            $(window).load(function() {
    $("#container_menu").show();
            //$('#container_menu').attr('display','block') //to show
    })
</script>     
<script>
    $(document).ready(function() {
    /*Metronic.init(); // init metronic core components
            Layout.init(); // init current layout

            $("a#js-a-delete").click(function(event) {
    event.preventDefault();
            var url = $(this).attr('href');
            bootbox.confirm("{{ $langLbl['Are you sure?'] }}", function(result) {
    if (result) {
    window.location.href = url;
    }
    });
    });*/
    $('#langDD').select2({
        placeholder: "Select an option",
        minimumResultsForSearch: - 1
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

<!-- Invite Friend Script End --> 
@stop
@stop
