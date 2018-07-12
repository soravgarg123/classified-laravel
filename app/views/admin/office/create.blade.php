@extends('admin.layout')

@section('custom-styles')]
<style>
    #map-canvas {
        height: 300px;
    }
</style>
{{ HTML::style('/assets/metronic/global/plugins/bootstrap-fileinput/bootstrap-fileinput.css') }}
{{ HTML::style('/assets/metronic/global/plugins/multidatepicker/css/mdp.css') }}

@stop

@section('breadcrumb')
<div class="row">
    <div class="col-md-12">
        <ul class="page-breadcrumb breadcrumb">
            <li>
                <i class="fa fa-home"></i>
                <span>{{ $langLbl['Office'] }}</span>
                <i class="fa fa-angle-right"></i>
            </li>
            <li>
                <span>{{ $langLbl['Create'] }}</span>
            </li>
        </ul>

    </div>
</div>
@stop

@section('content')

@if ($errors->has())
<div class="alert alert-danger alert-dismissibl fade in">
    <button type="button" class="close" data-dismiss="alert">
        <span aria-hidden="true">&times;</span>
        <span class="sr-only">{{ $langLbl['Close'] }}</span>
    </button>
    @foreach ($errors->all() as $error)
    {{ $error }}		
    @endforeach
</div>
@endif

<div class="portlet box blue">
    <div class="portlet-title">
        <div class="caption">
            <i class="fa fa-pencil-square-o"></i> {{ $langLbl['Create Office'] }}
        </div>
    </div>
    <div class="portlet-body form">
        <form class="form-horizontal form-bordered form-row-stripped" role="form" method="post" action="{{ URL::route('admin.office.store') }}" enctype="multipart/form-data">            
            <div class="form-body">  
                @foreach ([
                'name'=>$langLbl['Name'],
                'company_id'=>$langLbl['Professional'],
                'holidays'=>$langLbl['Holidays'],
                'opening_hours'=>$langLbl['Opening Hours'],
                'office_available'=>$langLbl['Available out of office'],
                'address' => $langLbl['Address']               
                ] as $key => $value)
                @if($key == 'address')
                <div class="form-group">
                    <label class="col-sm-3 control-label">{{ Form::label($key, $value) }}</label>
                    <div class="col-sm-7">
                        <input type="text" class="form-control" name="{{ $key }}" value="">
                    </div>
                    <div class="col-sm-2">
                        <button type="button" id="addrMarker" class="btn btn-default">
                            <span class="glyphicon glyphicon-map-marker"></span> {{ $langLbl['Find Address'] }}
                        </button>
                    </div>
                </div>
                @elseif($key == 'company_id')
                <div class="form-group">
                    <label class="col-sm-3 control-label">{{Form::label($key,$value)}}</label>
                    <div class="col-sm-9">
                        {{ Form::select($key
                        , array('' => $langLbl['Select Professional']) + $companies->lists('name', 'id')
                        , NULL
                        , array('class' => 'form-control')) }}
                    </div>
                </div>
                @elseif ($key == 'opening_hours')
                <div class="form-group">
                    <label class="col-sm-3 control-label">{{ Form::label($key, $value) }}</label>
                    <div class="col-sm-9" style="padding-top:0px;">
                        @foreach ([
                        'mon' => $langLbl['Mon'],
                        'tue' => $langLbl['Tue'],
                        'wed' => $langLbl['Wed'],
                        'thu' => $langLbl['Thu'],
                        'fri' => $langLbl['Fri'],
                        'sat' => $langLbl['Sat'],
                        'sun' => $langLbl['Sun'],
                        ] as $k => $v)
                        <div class="form-group">
                            <label class="control-label col-md-3">{{ Form::label($k, $v).' : ' }}</label>
                            <div class="col-md-4">
                                <input type="text" placeholder="Start Time" class="form-control" name="{{ $k }}_start" value="{{ DEFAULT_START_TIME }}">
                            </div>
                            <div class="col-md-4">
                                <input type="text" placeholder="End Time" class="form-control" name="{{ $k }}_end" value="{{ DEFAULT_END_TIME }}">
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
                @elseif($key == 'holidays')
                <div class="form-group">
                    <label class="col-sm-3 control-label">{{ Form::label($key, $value) }}</label>
                    <input type="hidden" id="holidays" name="holidays"/>
                    <div class="demo full-row col-md-9">										
                        <div id="full-year" class="box" style="width:100%;"></div>
                    </div>															
                </div>
                @elseif($key == 'office_available')
                <div class="form-group">
                    <label class="col-sm-3 control-label">{{ Form::label($key, $value) }}</label>
                    <div class="col-sm-9">
                        <input type="checkbox" class="make-switch-new" data-size="small" name="{{$key}}" value="">
                    </div>
                </div>
                @else
                <div class="form-group">
                    <label class="col-sm-3 control-label">{{ Form::label($key, $value) }}</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" name="{{ $key }}" value="">
                    </div>
                </div>
                @endif

                @endforeach
                <div class="form-group">
                    <label class="control-label col-md-3">{{ $langLbl['Location'] }}</label>
                    <div class="col-md-9">
                        <div id="map-canvas"></div>
                    </div>
                    <input type="hidden" name="lat" value="{{ DEFAULT_LAT }}"/>
                    <input type="hidden" name="lng" value="{{ DEFAULT_LNG }}"/>
                </div>                
            </div>
            <div class="form-actions fluid">
                <div class="col-sm-12 text-center">
                    <button type="submit" class="btn btn-success">
                        <span class="glyphicon glyphicon-ok-circle"></span> {{ $langLbl['Save'] }}
                    </button>
                    <a href="{{ URL::route('company.office') }}" class="btn btn-primary">
                        <span class="glyphicon glyphicon-share-alt"></span> {{ $langLbl['Back'] }}
                    </a>
                </div>
            </div>            
        </form>
    </div>
</div>
@stop

@section('custom-scripts')
{{ HTML::script('/assets/metronic/global/plugins/bootstrap-fileinput/bootstrap-fileinput.js') }}
{{ HTML::script('/assets/metronic/global/plugins/multidatepicker/jquery-ui.multidatespicker.js') }}
<script src="https://maps.googleapis.com/maps/api/js?v=3.exp&signed_in=true"></script>

<script>
    var map;
    var marker;
    var lat, lng;
    $(document).ready(function() {
        //ComponentsFormTools.init();
        //multiDatePicker
        var today = new Date();
        var y = today.getFullYear();
        var newYear = '1/1/' + y;
        holidays = newYear;
        holidays = holidays.replace(/\s/g, '');
        holidays = holidays.split(",");
        console.log(holidays);
        $('#full-year').multiDatesPicker({
            addDates: holidays,
            numberOfMonths: [3, 4],
            defaultDate: '1/1/' + y,
            altField: '#holidays'
        });

        // \ MultiDatePicker
        lat = $("input[name='lat']").val();
        lng = $("input[name='lng']").val();
        markerAddress(lat, lng);
        $('.make-switch-new').bootstrapSwitch({ onText: '{{ $langLbl["ON"] }}', offText: '{{ $langLbl["OFF"] }}' });
        if($("#langDD").val() != 'en' && $("#langDD").val() != '') {
            $('.bootstrap-switch.bootstrap-switch-small').addClass('bsswitch-large');
        }
        $("input[name='office_available']").on('switchChange.bootstrapSwitch', function(event, state) {
            if ($(this).prop('checked'))
                $(this).val(1);
        });
    });

    jQuery('#addrMarker').click(function() {
        var address = jQuery('input[name="address"]').val();
        var geocoder = new google.maps.Geocoder();

        geocoder.geocode({'address': address}, function(results, status) {

            if (status == google.maps.GeocoderStatus.OK) {
                var latitude = results[0].geometry.location.lat();
                var longitude = results[0].geometry.location.lng();
                markerAddress(latitude, longitude);
            }
            else {
                bootbox.alert('{{ $langLbl["Please input your address correctly!"] }}');
                window.setTimeout(function() {
                    bootbox.hideAll();
                }, 2000);
            }
        });
    });

    function markerAddress(lat, lng) {
        var myLatlng = new google.maps.LatLng(lat, lng);
        var mapOptions = {
            zoom: 10,
            center: myLatlng
        }
        map = new google.maps.Map(document.getElementById('map-canvas'), mapOptions);

        marker = new google.maps.Marker({
            position: myLatlng,
            map: map,
            title: 'Office Location'
        });
        $("input[name='lat']").val(lat);
        $("input[name='lng']").val(lng);
    }
</script>

@stop

@stop
