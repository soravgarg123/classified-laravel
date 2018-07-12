@extends('user.layout')

@section('main')
<?php
$nameVal = 'name' . $currentLanguage;
$descriptionVal = 'description' . $currentLanguage;
?>
<div class="container">
    <div class="row">
        <div class="col-sm-10 col-sm-offset-1 margin-top-normal margin-bottom-normal">
            <div class="portlet box red margin-top-lg">
                <div class="portlet-title">
                    <div class="caption">
                        {{ $langLbl['My Offers'] }}
                    </div>
                </div>
                <div class="portlet-body">
                    <table class="table table-striped table-hover">
                        <tbody>
                            @foreach ($userOffers as $key => $value)
                            <tr>
                                <td style="line-height: 40px;" class="text-center"><span class="badge badge-danger">{{ $key + 1 }}</span></td>
                                <td>
                                    <div class="pull-left">
                                        <img src="{{ HTTP_OFFER_PATH.$value->offer->photo}}" style="height: 40px;">
                                    </div>
                                    <div class="pull-left" style="margin-left: 10px;">
                                        <div><b>{{ $value->offer->name }}</b></div>
                                        <div class="font-size-sm"><i>{{ $value->offer->$descriptionVal }}</i></div>                                        
                                    </div>
                                    <div class="clearfix"></div>
                                </td>
                                <td style="line-height: 40px;" class="text-center">
                                    <h3>{{ $value->code }}</h3>
                                </td>
                                <td style="line-height: 40px;" class="text-center">
                                    <h4 class="color-default">{{ !$value->offer->is_review ? $value->offer->price.'&euro;' : $langLbl['By Activity'] }}</h4>
                                </td>
                                <td>
                                    <div><a href="{{ URL::route('store.detail', $value->offer->company->slug) }}">{{ $value->offer->company->name }}</a></div>
                                    <div><i>{{ $langLbl['Get At'] }} : {{ $value->created_at }}</i></div>
                                    <div><i>{{ $langLbl['Expire At'] }} : {{ $value->offer->expire_at }}</i></div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>    
                </div>
            </div>                         
        </div>
    </div>
</div>
@stop

@stop
