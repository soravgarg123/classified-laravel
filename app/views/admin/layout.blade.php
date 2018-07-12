@extends('main')
@section('page-styles')
<!-- BEGIN GLOBAL MANDATORY STYLES -->
<link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css"/>
{{ HTML::style('/assets/metronic/global/plugins/font-awesome/css/font-awesome.min.css') }}
{{ HTML::style('/assets/metronic/global/plugins/simple-line-icons/simple-line-icons.min.css') }}
{{ HTML::style('/assets/metronic/global/plugins/bootstrap/css/bootstrap.min.css') }}
{{ HTML::style('/assets/metronic/global/plugins/uniform/css/uniform.default.css') }}
<!-- END GLOBAL MANDATORY STYLES -->
<!-- BEGIN THEME STYLES -->
{{ HTML::style('/assets/metronic/global/css/components.css') }}
<!-- END THEME STYLES -->    
{{ HTML::style('/assets/metronic/global/plugins/bootstrap-switch/css/bootstrap-switch.min.css') }}
{{ HTML::style('/assets/metronic/global/css/plugins.css') }}
{{ HTML::style('/assets/metronic/admin/layout/css/layout.css') }}
{{ HTML::style('/assets/metronic/admin/layout/css/themes/blue.css') }}
{{ HTML::style('/assets/metronic/admin/layout/css/custom.css') }}
{{ HTML::style('/assets/css/style_admin.css') }}
{{ HTML::style('/assets/metronic/global/plugins/select2/select2.css') }}
@stop

@section('body')
<body class="page-header-fixed page-quick-sidebar-over-content">
    @section('header')
    <div class="page-header navbar navbar-fixed-top">
        <!-- BEGIN HEADER INNER -->
        <div class="page-header-inner">
            <!-- BEGIN LOGO -->
            <div class="page-logo">
                <a href="{{ URL::route('admin.dashboard') }}">
                    <img src="/assets/img/logo.png" alt="logo" class="logo-default" style="height: 38px; margin-top: 3px;">
                </a>
            </div>
            <!-- END LOGO -->
            <!-- BEGIN RESPONSIVE MENU TOGGLER -->
            <a href="javascript:;" class="menu-toggler responsive-toggler" data-toggle="collapse" data-target=".navbar-collapse">
            </a>
            <!-- END RESPONSIVE MENU TOGGLER -->

            <!-- BEGIN TOP NAVIGATION MENU -->
            <div class="top-menu">
                @if (Session::has('admin_id'))
                <ul class="nav navbar-nav pull-right">
                    @if($siteLanguage)
                    <li class="dropdown dropdown-quick-sidebar-toggler" style="padding-top: 10px;">
                        <select id="langDD" class="select2" style="width: 150px;">
                            @foreach($siteLanguage as $sLangKey => $sLangVal)
                            <option value="{{ $sLangVal == '' ? 'en' : $sLangVal }}" @if(($sLangVal == '' ? 'en' : $sLangVal) == (isset($_COOKIE['current_lang']) ? $_COOKIE['current_lang'] : 'en')) selected @endif>{{ $sLangKey }}</option>
                            @endforeach
                        </select>
                    </li>                        
                    @endif
                    <li class="dropdown dropdown-quick-sidebar-toggler">
                        <a href="#" class="dropdown-toggle">
                            {{ Session::get('admin_name') }}
                        </a>
                    </li>                        
                    <li class="dropdown dropdown-quick-sidebar-toggler">
                        <a href="{{ URL::route('admin.auth.logout') }}" class="dropdown-toggle">
                            <i class="icon-logout"></i> {{ $langLbl['Sign Out'] }}
                        </a>
                    </li>
                </ul>
                @endif
            </div>
            <!-- END TOP NAVIGATION MENU -->
        </div>
        <!-- END HEADER INNER -->
    </div>
    <div class="clearfix"></div>
    @show
    @section('main')
    <?php
    if (!isset($pageNo)) {
        $pageNo = 1;
    }
    ?>
    <div class="page-container">
        <div class="page-sidebar-wrapper">
            <div class="page-sidebar navbar-collapse collapse">
                <ul class="page-sidebar-menu" data-auto-scroll="true" data-slide-speed="200">
                    <li class="sidebar-toggler-wrapper">
                        <div class="sidebar-toggler"></div>
                    </li>
                    <li class="start {{ ($pageNo == 1) ? 'active' : '' }}">
                        <a href="#">
                            <i class="icon-bar-chart"></i>
                            <span class="title">{{ $langLbl['Dashboard'] }}</span>
                        </a>
                    </li>
                    <!-- PROFESSIONAL MANAGEMENT -->
                    <li class="{{ ($pageNo == 3)||($pageNo == 18) ? 'active open' : '' }}">
                        <a href="javascript:;">
                            <i class="fa fa-building"></i>
                            <span class="title">{{ $langLbl['Professional Management'] }}</span>
                            <span class="arrow "></span>
                        </a>
                        <ul class="sub-menu">
                            <li class="{{ ($pageNo == 3) ? 'active' : '' }}">
                                <a href="{{ URL::route('admin.company') }}">
                                    <i class="fa fa-child"></i>
                                    <span class="title">{{ $langLbl['Professional Management'] }}</span>
                                </a>
                            </li>
                            <li class="{{ ($pageNo == 18) ? 'active' : '' }}">
                                <a href="{{ URL::route('admin.class') }}">
                                    <i class="fa fa-leaf"></i>
                                    <span class="title">{{ $langLbl['Category Management'] }}</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <!-- SERVICE MANAGEMENT -->
                    <li class="{{ ($pageNo == 12)||($pageNo == 5) ? 'active open' : '' }}">
                        <a href="javascript:;">
                            <i class="fa fa-bank"></i>
                            <span class="title">{{ $langLbl['Service Management'] }}</span>
                            <span class="arrow "></span>
                        </a>
                        <ul class="sub-menu">
                            <li class="{{ ($pageNo == 12) ? 'active' : '' }}">
                                <a href="{{ URL::route('admin.store') }}">
                                    <i class="fa fa-leaf"></i>
                                    <span class="title">{{ $langLbl['Service Management'] }}</span>
                                </a>
                            </li>
                            <li class="{{ ($pageNo == 5) ? 'active' : '' }}">
                                <a href="{{ URL::route('admin.category') }}">
                                    <i class="fa fa-tag"></i>
                                    <span class="title">{{ $langLbl['Category Management'] }}</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <!-- POST MANAGEMENT -->
                    <li class="{{ ($pageNo == 13)||($pageNo == 14) ||($pageNo == 15) ||($pageNo == 16) ||($pageNo == 17) ||($pageNo == 18) ? 'active open' : '' }}">
                        <a href="javascript:;">
                            <i class="fa fa-heart"></i>
                            <span class="title">{{ $langLbl['Post Management'] }}</span>
                            <span class="arrow "></span>
                        </a>
                        <ul class="sub-menu">
                            <li class="{{ ($pageNo == 13) ? 'active' : '' }}">
                                <a href="{{ URL::route('admin.post') }}">
                                    <i class="fa fa-leaf"></i>
                                    <span class="title">{{ $langLbl['Post Management'] }}</span>
                                </a>
                            </li>
                            <li class="{{ ($pageNo == 14) ? 'active' : '' }}">
                                <a href="{{ URL::route('admin.postcategory') }}">
                                    <i class="fa fa-tag"></i>
                                    <span class="title">{{ $langLbl['Category Management'] }}</span>
                                </a>
                            </li>
                            <li class="{{ ($pageNo == 15) ? 'active' : '' }}">
                                <a href="{{ URL::route('admin.policy') }}">
                                    <i class="fa fa-tag"></i>
                                    <span class="title">{{ $langLbl['Privacy Policy Management'] }}</span>
                                </a>
                            </li>
                            <li class="{{ ($pageNo == 16) ? 'active' : '' }}">
                                <a href="{{ URL::route('admin.terms') }}">
                                    <i class="fa fa-tag"></i>
                                    <span class="title">{{ $langLbl['Terms Condition Management'] }}</span>
                                </a>
                            </li>
                            <li class="{{ ($pageNo == 17) ? 'active' : '' }}">
                                <a href="{{ URL::route('admin.help') }}">
                                    <i class="fa fa-tag"></i>
                                    <span class="title">{{ $langLbl['Help Management'] }}</span>
                                </a>
                            </li>
                            <li class="{{ ($pageNo == 18) ? 'active' : '' }}">
                                <a href="{{ URL::route('admin.howitworks') }}">
                                    <i class="fa fa-tag"></i>
                                    <span class="title">{{ $langLbl['How it works Management'] }}</span>
                                </a>
                            </li> 
                        </ul>
                    </li>
                    <!-- PROFESSION MANAGEMENT -->
                    <li class="{{ ($pageNo == 31) ? 'active open' : '' }}">
                        <a href="{{ URL::route('admin.worldofprofession') }}">
                            <i class="fa fa-graduation-cap"></i>
                            <span class="title">{{ $langLbl['World of Profession'] }}</span>                                    
                        </a>                                
                    </li>
                    <!-- USER MANAGEMENT -->
                    <li class="{{ ($pageNo == 2) ? 'active' : '' }}">
                        <a href="{{ URL::route('admin.user') }}">
                            <i class="icon-users"></i>
                            <span class="title">{{ $langLbl['User Management'] }}</span>
                        </a>
                    </li>


                    <!--  <li class="{{ ($pageNo == 4) ? 'active' : '' }}">
                         <a href="{{ URL::route('admin.city') }}">
                             <i class="fa fa-map-marker"></i>
                             <span class="title">City Management</span>
                         </a>
                     </li> -->                            

                    <!-- li class="{{ ($pageNo == 6) ? 'active' : '' }}">
                        <a href="#">
                            <i class="fa fa-comments"></i>
                            <span class="title">Comments Management</span>
                        </a>
                    </li -->
                    <!-- li class="{{ ($pageNo == 7) ? 'active' : '' }}">
                        <a href="#">
                            <i class="fa fa-cogs"></i>
                            <span class="title">Settings</span>
                        </a>
                    </li -->
                    <!-- OFFER MANAGEMENT -->
                    <li class="{{ ($pageNo == 8) ? 'active' : '' }}">
                        <a href="{{ URL::route('admin.offer') }}">
                            <i class="fa fa-gavel"></i>
                            <span class="title">{{ $langLbl['Offer Management'] }}</span>
                        </a>
                    </li>
                    <!-- LOYALTY MANAGEMENT --> 
                    <li class="{{ ($pageNo == 9) ? 'active' : '' }}">
                        <a href="{{ URL::route('admin.loyalty') }}">
                            <i class="fa fa-heart"></i>
                            <span class="title">{{ $langLbl['Loyalty Management'] }}</span>
                        </a>
                    </li>

                    <li class="{{ ($pageNo == 10) ? 'active' : '' }}">
                        <a href="{{URL::route('admin.office')}}">
                            <i class="fa fa-gear"></i>
                            <span class="title">{{ $langLbl['Office Management'] }}</span>
                        </a>
                    </li>
                    <!-- PLAN MANAGEMENT -->
                    <li class="{{ ($pageNo == 11) ? 'active' : '' }}">
                        <a href="{{ URL::route('admin.plan') }}">
                            <i class="icon-envelope-open"></i>
                            <span class="title">{{ $langLbl['Plan Management'] }}</span>
                        </a>
                    </li>

                    <li class="{{ ($pageNo == 13)||($pageNo == 14) ? 'active open' : '' }}">
                        <a href="javascript:;">
                            <i class="icon-envelope-open"></i>
                            <span class="title">{{ $langLbl['Message Management'] }}</span>
                            <span class="arrow "></span>
                        </a>
                        <ul class="sub-menu">
                            <li class="{{ ($pageNo == 13) ? 'active' : '' }}">
                                <a href="{{ URL::route('admin.professionalmsg') }}">
                                    <i class="fa fa-users"></i>
                                    <span class="title">{{ $langLbl['Profesional User'] }}</span>
                                </a>
                            </li>
                            <li class="{{ ($pageNo == 14) ? 'active' : '' }}">
                                <a href="{{ URL::route('admin.generalmsg') }}">
                                    <i class="fa fa-users"></i>
                                    <span class="title">{{ $langLbl['general user '] }}</span>
                                </a>
                            </li>
                        </ul>
                    </li>

                    <li class="{{ ($pageNo == 12) ? 'active' : '' }}">
                        <a href="{{ URL::route('admin.website') }}">
                            <i class="icon-envelope-open"></i>
                            <span class="title">{{ $langLbl['Website Management'] }}</span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="page-content-wrapper">
            <div class="page-content">
                @yield('breadcrumb')
                @yield('content')
            </div>
        </div>
    </div>
    @show

    @section('footer')
    <div class="page-footer footer-background">
        <div class="page-footer-inner">
            &copy; {{ $langLbl['Copyright'] }} 2015 | {{ $langLbl['All Rights Reserved'] }} | {{ $langLbl['Powered by'] }} Itdepth
        </div>
        <div class="page-footer-tools">
            <span class="go-top">
                <i class="fa fa-angle-up"></i>
            </span>
        </div>
    </div>
    @show
</body>
@stop

@section('page-scripts')
{{ HTML::script('//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js') }}
{{ HTML::script('//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js') }}

<!-- BEGIN JAVASCRIPTS(Load javascripts at bottom, this will reduce page load time) -->
<!-- BEGIN CORE PLUGINS -->
<!--[if lt IE 9]>
{{ HTML::script('/assets/metronic/global/plugins/respond.min.js') }}
{{ HTML::script('/assets/metronic/global/plugins/excanvas.min.js') }}
<![endif]-->
{{ HTML::script('/assets/metronic/global/plugins/jquery-1.11.0.min.js') }}
{{ HTML::script('/assets/metronic/global/plugins/jquery-migrate-1.2.1.min.js') }}
<!-- IMPORTANT! Load jquery-ui-1.10.3.custom.min.js before bootstrap.min.js to fix bootstrap tooltip conflict with jquery ui tooltip -->
{{ HTML::script('/assets/metronic/global/plugins/jquery-ui/jquery-ui-1.10.3.custom.min.js') }}
{{ HTML::script('/assets/metronic/global/plugins/bootstrap/js/bootstrap.min.js') }}
<!-- END CORE PLUGINS -->

{{ HTML::script('/assets/metronic/global/plugins/bootstrap-hover-dropdown/bootstrap-hover-dropdown.min.js') }}
{{ HTML::script('/assets/metronic/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js') }}
{{ HTML::script('/assets/metronic/global/plugins/jquery.blockui.min.js') }}    
{{ HTML::script('/assets/metronic/global/plugins/jquery.cokie.min.js') }}
{{ HTML::script('/assets/metronic/global/plugins/uniform/jquery.uniform.min.js') }}
{{ HTML::script('/assets/metronic/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js') }}    

{{ HTML::script('/assets/metronic/global/scripts/metronic.js') }}
{{ HTML::script('/assets/metronic/admin/layout/scripts/layout.js') }}
{{ HTML::script('/assets/metronic/admin/layout/scripts/quick-sidebar.js') }}
{{ HTML::script('/assets/metronic/global/plugins/bootbox/bootbox.min.js') }}
{{ HTML::script('/assets/metronic/admin/pages/scripts/components-form-tools.js') }}
{{ HTML::script('/assets/metronic/global/plugins/jquery-multi-select/js/jquery.multi-select.js') }}
{{ HTML::script('/assets/metronic/admin/pages/scripts/components-dropdowns.js') }}
{{ HTML::script('/assets/metronic/global/plugins/select2/select2.min.js') }}
<script>
    jQuery(document).ready(function() {
        Metronic.init(); // init metronic core components
        Layout.init(); // init current layout
        QuickSidebar.init() // init quick sidebar
        ComponentsDropdowns.init();

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
    });
</script>        
@stop
@stop
