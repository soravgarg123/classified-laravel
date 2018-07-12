@extends('main')    
    @section('page-styles')
        {{ HTML::style('/assets/metronic/global/plugins/typeahead/typeahead.css') }}
        {{ HTML::style('//fonts.googleapis.com/css?family=Bitter') }}        
        {{ HTML::style('/assets/metronic/frontend/layout/css/style.css') }}
        {{ HTML::style('/assets/metronic/frontend/layout/css/style-responsive.css') }}
        {{ HTML::style('/assets/metronic/frontend/layout/css/themes/red.css') }}
        
        {{ HTML::style('/assets/css/star-rating.min.css') }}
        {{ HTML::style('/assets/css/style_widget.css') }}
        
        <style>
        body {
            background: {{ count($company->widget) > 0 ? $company->widget->background : DEFAULT_WIDGET_BACKGROUND }};
        }
        
        .color-font {
            color : {{ count($company->widget) > 0 ? $company->widget->color : DEFAULT_WIDGET_COLOR }};
        }
        
        .background-default {
            background : {{ count($company->widget) > 0 ? $company->widget->header : DEFAULT_WIDGET_HEADER }} !important;
        }
        
        {{ $company->widget->custom_css }}
        
        </style>        
        
    @stop

    @section('body')
        <body class="corporate">
                @section('header')
                    @if ($company->widget->is_header)
                    <div class="header-background-color">
                        <div class="container">
                            <div class="row padding-top-xs">
                                <div class="col-sm-12 margin-bottom-xs">
                                    <div class="col-sm-6">
                                        <a href="{{ URL::route('widget.embed.home', $company->token) }}">
                                            <img src="{{ ($company->widget) ? HTTP_LOGO_PATH.$company->widget->logo : HTTP_LOGO_PATH.DEFAULT_PHOTO }}" style="height: 50px;"/>
                                        </a>
                                    </div>
                                    <?php if (!isset($pageNo)) { $pageNo = 0; } ?>
                                    @if (Session::has('user_id'))
                                    <div class="col-sm-3">
                                        &nbsp;
                                    </div>
                                    <div class="col-sm-3">
                                        <a class="btn red btn-block" href="{{ URL::route('widget.embed.doLogout', $company->token) }}"><b>Log Out</b></a>
                                    </div>
                                    @else
                                    <div class="col-sm-3">
                                        <a class="btn {{ $pageNo == 1 ? 'red' :'btn-primary' }} btn-block" href="{{ URL::route('widget.embed.login', $company->token) }}"><b>Login</b></a>
                                    </div>
                                    <div class="col-sm-3">
                                        <a class="btn {{ $pageNo == 2 ? 'red' :'btn-primary' }} btn-block" href="{{ URL::route('widget.embed.signup', $company->token) }}"><b>Sign Up</b></a>
                                    </div>                                    
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                    @endif
                @show
    
                @section('main')
                
                @show
    
                @section('footer')
                    @if ($company->widget->is_header)
                        <div class="pre-footer">
                            <div class="container" style="padding-top: 10px;">
                                <div class="row">
                                    <div class="col-sm-12 text-center">
                                        <h3 class="color-white"><b>{{ $company->name }}</b></h3>
                                    </div>
                                </div>
                                <div class="row margin-top-xs">
                                    <div class="col-sm-12 pre-footer-col text-center">
                                      <b class="color-default">Phone : </b>{{ $company->phone }}<br>
                                      <b class="color-default">Email : </b>{{ $company->email }}<br>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif
                @show
        </body>
    @stop

    @section('page-scripts')
        {{ HTML::script('/assets/metronic/frontend/layout/scripts/back-to-top.js') }}
        {{ HTML::script('/assets/metronic/frontend/layout/scripts/layout.js') }}
        {{ HTML::script('/assets/metronic/global/plugins/bootbox/bootbox.min.js') }}
        {{ HTML::script('/assets/js/star-rating.min.js') }}      
    @stop
    @include('chating_common')
@stop
