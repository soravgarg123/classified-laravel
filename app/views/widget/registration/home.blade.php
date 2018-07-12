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
                    <h3 class="color-white padding-top-xs"><b>{{ $langLbl['Registration Page'] }}</b></h3>
                </div>
            </div>
        </div>
    </div>
</div>
@endif
@show

@section('main')
<div class="margin-top-sm margin-bottom-sm container">
    <form method="post" action="{{ URL::route('widget.embed.doSignup', $company->token) }}">
        <div class="row">
            <?php if (isset($alert)) { ?>
                <div class="col-sm-12 margin-top-normal">
                    <div class="alert alert-<?php echo $alert['type']; ?> alert-dismissibl fade in">
                        <button type="button" class="close" data-dismiss="alert">
                            <span aria-hidden="true">&times;</span>
                            <span class="sr-only">{{ $langLbl['Close'] }}</span>
                        </button>
                        <p>
                            <?php echo $alert['msg']; ?>
                        </p>
                    </div>
                </div>
            <?php } ?>

            <div class="col-sm-12 margin-top-sm">
                <div class="form-group">
                    <label class="control-label">{{ $langLbl['Name'] }} *</label>
                    <input type="text" class="form-control input-lg" placeholder="{{ $langLbl['Name'] }}" name="name">
                </div>
            </div>

            <div class="col-sm-12 margin-top-sm">
                <div class="form-group">
                    <label class="control-label">{{ $langLbl['Email'] }} *</label>
                    <input type="text" class="form-control input-lg" placeholder="{{ $langLbl['Email Address'] }}" name="email">
                </div>
            </div>

            <div class="col-sm-12 margin-top-sm">
                <div class="form-group">
                    <label class="control-label">{{ $langLbl['Password'] }} *</label>
                    <input type="password" class="form-control input-lg" placeholder="{{ $langLbl['Password'] }}" name="password">
                </div>
            </div>

            <div class="col-sm-12 margin-top-sm">
                <div class="form-group">
                    <label class="control-label">{{ $langLbl['Password Confirmation'] }} *</label>
                    <input type="password" class="form-control input-lg" placeholder="{{ $langLbl['Password Confirmation'] }}" name="password_confirmation">
                </div>
            </div>

            <div class="col-sm-12 margin-top-sm">
                <div class="form-group">
                    <label class="control-label">{{ $langLbl['Phone'] }}</label>
                    <input type="text" class="form-control input-lg" placeholder="{{ $langLbl['Phone'] }} ({{ $langLbl['optional'] }})" name="phone">
                </div>
            </div>           

            <div class="col-sm-12 margin-top-sm">
                <div class="form-group">
                    <button class="btn btn-primary btn-block btn-lg"><i class="fa fa-pencil-square-o"></i> {{ $langLbl['Register'] }}</button>
                </div>
            </div>                        
        </div>
    </form>
</div>
@include('chating_common')
@stop

@stop
