@extends('widget.layout')

@section('header')
@if ($company->widget->is_header)
<div class="header-background-color">
    <div class="container">
        <div class="row padding-top-xs">
            <div class="col-sm-12 margin-bottom-xs">
                <div class="col-sm-2">
                    <a href="{{ URL::route('widget.registration.home', $company->token) }}">
                        <img src="{{ ($company->widget) ? HTTP_LOGO_PATH.$company->widget->logo : HTTP_LOGO_PATH.DEFAULT_PHOTO }}" style="height: 50px;"/>
                    </a>
                </div>
                <div class="col-sm-10 text-center">
                    <h3 class="color-white padding-top-xs"><b>{{ $langLbl['Offers'] }}</b></h3>
                </div>
            </div>
        </div>
    </div>
</div>
@endif
@show

@section('main')
<div class="margin-top-sm margin-bottom-sm container">
    @if (isset($alert))
    <div class="alert alert-{{ $alert['type'] }} alert-dismissibl fade in">
        <button type="button" class="close" data-dismiss="alert">
            <span aria-hidden="true">&times;</span>
            <span class="sr-only">{{ $langLbl['Close'] }}</span>
        </button>
        <p>
            {{ $alert['msg'] }}
        </p>
    </div>
    @endif

    <div class="page-content">
        <div class="portlet box red">
            <div class="portlet-title">
                <div class="caption">
                    {{ $langLbl['Our Offers'] }}
                </div>
            </div>
            <div class="portlet-body">

                @foreach ($company->offers as $key => $value)
                @if (!$value->is_review)
                <div class="row">
                    <div class="col-sm-6">
                        <div class="pull-left" style="margin-right: 10px;"><span class="badge badge-danger">{{ $key + 1 }}</span></div>
                        <div class="pull-left">
                            <img src="{{ HTTP_OFFER_PATH.$value->photo }}" style="height: 40px;">
                        </div>
                        <div class="pull-left" style="margin-left: 10px;">
                            <div><b>{{ $value->name }}</b>&nbsp;&nbsp;&nbsp;(<i class="color-default">{{ $value->price.'&euro;' }}</i>)</div>
                            <div class="font-size-sm"><i>{{ $value->description }}</i></div>                                        
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <div class="col-sm-6 text-right">

                        <div>{{ $langLbl['Expires In'] }} : {{ $value->expire_in }} {{ $langLbl['days'] }}</div>
                        <button class="btn btn-primary btn-sm" id="js-btn-purchase" data-price="{{ $value->price }}" data-id="{{ $value->id }}" data-user="{{ Session::has('user_id') ? Session::get('user_id') : '' }}">
                            <i class="fa fa-heart"></i> {{ $langLbl['Buy'] }}
                        </button>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12"><hr/></div>
                </div>
                @endif
                @endforeach
            </div>
        </div>                                  
    </div>          
</div>
@include('chating_common')
@stop

@stop
