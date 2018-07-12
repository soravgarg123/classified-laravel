<!DOCTYPE html>
<html lang="en">
    <head>
        @section('meta')
            <meta charset="utf-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            @yield('meta-seo')
        @show
        <link rel="shortcut icon" href="/favicon.png">

        <title>
            @section('title')
                {{ SITE_NAME }}
            @show
        </title>

        @section('common-styles')
            <!-- BEGIN GLOBAL MANDATORY STYLES -->
            <link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css"/>
            {{ HTML::style('/assets/metronic/global/plugins/simple-line-icons/simple-line-icons.min.css') }}
            {{ HTML::style('/assets/metronic/global/plugins/font-awesome/css/font-awesome.min.css') }}
            {{ HTML::style('/assets/metronic/global/plugins/bootstrap/css/bootstrap.min.css') }}
            {{ HTML::style('/assets/metronic/global/plugins/uniform/css/uniform.default.css') }}
            {{ HTML::style('/assets/metronic/global/plugins/bootstrap-switch/css/bootstrap-switch.min.css') }}
            {{ HTML::style('/assets/metronic/global/plugins/bootstrap-datetimepicker/css/jquery.datetimepicker.css') }}
            <!-- END GLOBAL MANDATORY STYLES -->

            <!-- BEGIN THEME STYLES -->
        {{ HTML::style('/assets/metronic/global/css/components.css') }}
        {{ HTML::style('/assets/metronic/global/css/plugins.css') }}
            <!-- END THEME STYLES -->
        @show

        @yield('page-styles')

        @yield('custom-styles')        

        <!-- BEGIN CUSTOM STYLES -->
        {{ HTML::style('/assets/css/star-rating.min.css') }}
        {{ HTML::style('/assets/css/style_bootstrap.css') }}
        {{ HTML::style('/assets/css/style_common.css') }}
        <!-- BEGIN END STYLES -->

        <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>

    @yield('body')
    
    @section('common-scripts')
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
        {{ HTML::script('/assets/metronic/global/plugins/bootbox/bootbox.min.js') }}
        {{ HTML::script('/assets/metronic/global/plugins/bootstrap-datetimepicker/js/jquery.datetimepicker.js') }}
        {{ HTML::script('/assets/js/star-rating.min.js') }}
        {{ HTML::script('/assets/js/bootstrap-tooltip.js') }}
    @show    
    
    @yield('page-scripts')
    
    @yield('custom-scripts')
</html>
