@extends('company.layout')

@section('breadcrumb')
<div class="row">
    <div class="col-md-12">
        <ul class="page-breadcrumb breadcrumb">
            <li>
                <i class="fa fa-home"></i>
                <span>{{ $langLbl['Subscribe'] }}</span>
            </li>
        </ul>
    </div>
</div>
@stop

@section('content')
@if ($company->plan_id == '')
@foreach ($plans as $key => $value)
<div class="col-md-4">
    <div class="pricing pricing-active hover-effect">
        <div class="pricing-head pricing-head-active">
            <h3>{{$value->name}}
                <span>
                    Officia deserunt mollitia
                </span>
            </h3>
            <h4><i>&euro;</i>{{$value->price}}
                <input type="hidden" id="type_{{$value->type}}" value="{{$value->type}}" />
                <input type="hidden" id="price_{{$value->type}}" value="{{$value->price}}" />
                <input type="hidden" id="com_id" value="{{Session::get('company_id')}}"/>
                <span>
                    {{$value->type == 'py' ? $langLbl['Per Year'] : $langLbl['Per Service'] }}
                </span>
            </h4>
        </div>
        <ul class="pricing-content list-unstyled">
            <li>
                <i class="fa fa-tags"></i>{{ $langLbl['VIEWING YOUR PROFESSIONAL DETAILS'] }}
            </li>
            <li>
                <i class="fa fa-asterisk"></i>{{ $langLbl['PERSONAL ADMINISTRATOR PANEL'] }}
            </li>
            <li>
                <i class="fa fa-heart"></i>{{ $langLbl['MULTIPLE SERVICES AND MULTIPLE OFFICES'] }}
            </li>
            <li>
                <i class="fa fa-star"></i>{{ $langLbl['PERSONAL CONNECTION URL'] }}
            </li>
            <li>
                <i class="fa fa-shopping-cart"></i>{{ $langLbl['INDEX PROFILE'] }}
            </li>
            <li>
                <i class="fa fa-tree"></i>{{ $langLbl['OFFERS PUBLICATION'] }}
            </li>
            <li>
                <i class="fa fa-child"></i>{{ $langLbl['SECTION PERSONAL ITEMS'] }}
            </li>
            @if($value->type == 'ps')
            <li>
                <input type="text" id="svc_amount" placeholder="How many services?" class="form-control"/>
            </li>
            @endif
        </ul>
        <div class="pricing-footer">
            <p>
                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut non libero magna psum olor .
            </p>
            <button type="button" id="btn-{{$value->type}}" class="btn btn-primary">
                {{ $langLbl['Pay Now'] }} <i class="m-icon-swapright m-icon-white"></i>
                </a>
        </div>
    </div>
</div>
@endforeach
@else
<a href="{{ URL::route('company.subscribe.cancel') }}">{{ $langLbl['Cancel Subscription'] }}</a>
@endif
<!-- Anually Signup -->
<form id="js-frm-pysign" method="post" action="{{ 'https://'.PAYPAL_SERVER.'/cgi-bin/webscr' }}" class="hide">
    <input type="hidden" name="cmd" value="_xclick-subscriptions">
    <input type="hidden" name="business" value="{{PAYPAL_BUSINESS}}">
    <input type="hidden" name="item_name" value="{{ SITE_NAME }}">
    <input type="hidden" name="no_shipping" value="1">
    <input type="hidden" name="return" value="{{ URL::route('company.auth.success') }}">
    <input type="hidden" name="cancel_return" value="{{ URL::route('company.auth.signFailed') }}">
    <input type="hidden" name="a1" value="0.00"> <!-- free trial=yes -->
    <input type="hidden" name="p1" value="1"> <!-- length of trial period -->
    <input type="hidden" name="t1" value="Y"> <!-- period of trial=month -->
    <input type="hidden" name="a3" value=""> <!-- price of subscription -->
    <input type="hidden" name="amount" value="">
    <input type="hidden" name="p3" value="1"> <!-- billing cycle length -->
    <input type="hidden" name="t3" value="Y"> <!-- billing cycle unit=month -->
    <input type="hidden" name="notify_url" value="{{ URL::route('company.purchase.ipn') }}">
    <input type="hidden" name="custom" />
    <input type="hidden" name="currency_code" value="EUR">
</form>

<!-- Service Signup -->
<form id="js-frm-pssign" method="post" action="{{ 'https://'.PAYPAL_SERVER.'/cgi-bin/webscr' }}" class="hide">
    <input type="hidden" name="business" value="{{PAYPAL_BUSINESS}}" />
    <input type="hidden" name="cmd" value="_xclick">
    <input type="hidden" name="item_name" value="{{ SITE_NAME }}">
    <input type="hidden" name="amount" value="">
    <input type="hidden" name="quantity" />
    <input type="hidden" name="custom" >
    <input type="hidden" name="currency_code" value="EUR">
    <input type="hidden" name="notify_url" value="{{ URL::route('company.purchase.ipn') }}">
    <input type="hidden" name="return" value="{{ URL::route('company.auth.success') }}">
    <input type="hidden" name="cancel_return" value="{{ URL::route('company.auth.signFailed') }}">
    <input type="hidden" name="no_shipping" value="1">
    <input type="hidden" name="email">
</form>
@stop
@section('custom-scripts')
<script  type='text/javascript'>
    $('button#btn-py').click(function() {
        var com_id = $('#com_id').val();
        var custom = '{"type":"pro_ps", "com_id":"' + com_id + '"}';
        $('input[name="custom"]').val(custom);
        $('#js-frm-pysign input[name="a3"]').val($('#price_py').val());
        $('#js-frm-pysign input[name="amount"]').val($('#price_py').val());
        $('form#js-frm-pysign').submit();
    });

    $('button#btn-ps').click(function() {
        var com_id = $('#com_id').val();
        var sn = $('#svc_amount').val();
        if (sn == '')
            bootbox.alert('Please input service amount.');
        $('input[name="quantity"]').val(sn);
        var custom = '{"service_number":"' + sn + '","type":"pro_ps", "com_id":"' + com_id + '"}';
        $('input[name="custom"]').val(custom);
        $('#js-frm-pssign input[name="amount"]').val($('#price_ps').val());
        $('form#js-frm-pssign').submit();
    });
</script>
@stop


@stop
