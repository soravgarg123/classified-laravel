@extends('company.layout')

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
                <span>{{ $langLbl['Edit'] }}</span>
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
<?php $short_nameVal = 'short_name' . $currentLanguage; ?>
<div class="portlet box red">
    <div class="portlet-title">
        <div class="caption">
            <i class="fa fa-pencil-square-o"></i> {{ $langLbl['Edit Office'] }}
        </div>
    </div>
    <div class="portlet-body form">
        <form class="form-horizontal form-bordered form-row-stripped" role="form" method="post" action="{{ URL::route('company.office.store') }}" enctype="multipart/form-data">
            <input type="hidden" name="office_id" value="{{ $office->id }}"/>            
            <div class="form-body">
                @foreach ([
                'name' => $langLbl['Name'],
                'office_country' => $langLbl['Country'],
                'office_city' => $langLbl['city'],
                'address_area' => $langLbl['Address Area'],
                'telephone' => $langLbl['Telephone'],
                'office_available'=>$langLbl['Available out of office'],
                'select_availability'=>$langLbl['Select Your Availability'],
                'km_range'=>$langLbl['Range of Office'],
                'opening_hours'=>$langLbl['Opening Hours'],
                'holidays' => $langLbl['Holidays'],
                'address' => $langLbl['Address']
                ] as $key => $value)
                @if($key == 'address')
                <div class="form-group">
                    <label class="col-sm-3 control-label">{{ Form::label($key, $value) }}</label>
                    <div class="col-md-7">                    
                        <input type="text" class="form-control" name="{{ $key }}" value="{{ $office->{$key} }}">                      
                    </div>
                    <div class="col-sm-2">
                        <button type="button" id="addrMarker" class="btn btn-default">
                            <span class="glyphicon glyphicon-map-marker"></span> {{ $langLbl['Find Address'] }}
                        </button>
                    </div>
                </div>
                <!-- Opening setting imak 20150610 -->
                @elseif ($key == 'opening_hours')
                <div class="form-group">
                    <label class="col-sm-3 control-label">{{ Form::label($key, $value) }}</label>
                    <div class="col-sm-9" style="padding:0px;">
                        @foreach ([
                        'mon' => $langLbl['Mon'],
                        'tue' => $langLbl['Tue'],
                        'wed' => $langLbl['Wed'],
                        'thu' => $langLbl['Thu'],
                        'fri' => $langLbl['Fri'],
                        'sat' => $langLbl['Sat'],
                        'sun' => $langLbl['Sun']
                        ] as $k => $v)
                        <div class="form-group">
                            <label class="control-label col-md-3">{{ Form::label($k, $v).' : ' }}</label>
                            <div class="col-md-4">
                                <input type="text" placeholder="{{ $langLbl['Start Time'] }}" class="form-control" name="{{ $k }}_start" value="{{ $office->opening->{$k.'_start'} }}">
                            </div>
                            <div class="col-md-4">
                                <input type="text" placeholder="{{ $langLbl['End Time'] }}" class="form-control" name="{{ $k }}_end" value="{{ $office->opening->{$k.'_end'} }}">
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
                @elseif($key == 'select_availability')
                <div class="form-group" id="select_availability_section">
                    <label class="col-sm-3 control-label">{{ Form::label($key, $value) }}</label>
                    <div class="col-sm-9">
                    <select id="select_availability" class="form-control" name="select_availability">
                        <option selected disabled style="foont-size:16px;">{{ $langLbl['Select Your Availability'] }}</option>
                        <option value="Available in down town" <?php if($office->select_availability == "Available in down town") echo "selected"; ?>>{{ $langLbl['Available in down town'] }}</option>
                        <option value="Available in the province" <?php if($office->select_availability == "Available in the province") echo "selected"; ?>>{{ $langLbl['Available in the province'] }}</option>
                        <option value="In the region" <?php if($office->select_availability == "In the region") echo "selected"; ?>>{{ $langLbl['In the region'] }}</option>
                        <option value="Available in the country" <?php if($office->select_availability == "Available in the country") echo "selected"; ?>>{{ $langLbl['Available in the country'] }}</option>
                        <option value="Available within max km range" <?php if($office->select_availability == "Available within max km range") echo "selected"; ?>>{{ $langLbl['Available within max km range'] }}</option>
                    </select>  
                    </div>                                                     
                </div>
                <!-- / Opening setting imak 20150610 -->
                @elseif ($key == 'office_available')
                <div class="form-group">
                    <label class="col-sm-3 control-label">{{ Form::label($key, $value) }}</label>
                    <div class="col-sm-9">
                        <input type="checkbox" {{$office->office_available == '1' ? 'checked': '' }} class="make-switch-new" data-size="small" name="{{$key}}" value="{{$office->office_available}}">
                    </div>
                </div>
                @elseif($key == 'office_country')
                <div class="form-group">
                    <label class="control-label col-md-3">{{ Form::label($key, $value) }}</label>
                    <div class="col-md-8">
                        <select name="{{ $key }}" id="select2_sample4" class="form-control select2">
                            @foreach($countries as $c)
                            <option value="{{$c->iso2}}" {{$c->iso2 == $office->office_country ? 'selected':''}}>{{$c->$short_nameVal}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                @else                
                <div class="form-group" <?php if($key == "km_range") echo "id='km_range_section'"; ?>>
                    <label class="col-sm-3 control-label">{{ Form::label($key, $value) }}</label>
                    <div class="col-md-9">                    
                        <input type="text" class="form-control" name="{{ $key }}" value="{{ $office->{$key} }}">                      
                    </div>                    
                </div>
                @endif
                @endforeach
                <div class="form-group">
                    <label class="control-label col-md-3">{{ $langLbl['Location'] }}</label>
                    <div class="col-md-9">
                        <div id="map-canvas"></div>
                    </div>
                    <input type="hidden" name="lat" value="{{ $office->lat }}"/>
                    <input type="hidden" name="lng" value="{{ $office->lng}}"/>
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
{{ HTML::script('/assets/metronic/admin/pages/scripts/components-dropdowns.js') }}
<script src="https://maps.googleapis.com/maps/api/js?v=3.exp&signed_in=true"></script>

<script>
    var map;
    var marker;
    var lat, lng;
    $(document).ready(function() {
        var office_available_vall = "{{ $office->office_available }}";
        var select_availability_vall = "{{ $office->select_availability }}";
        if(office_available_vall == 1){
            $('#select_availability_section').show();
        }else{
            $('#select_availability').val("");
            $("input[name='km_range']").val("");
        }
        if(select_availability_vall == "Available within max km range"){
            $('#km_range_section').show();
        }else{
            $("input[name='km_range']").val("");
        }

        //multiDatePicker
        var today = new Date();
        var y = today.getFullYear();
        var newYear = '1/1/' + y;
        var holidays = <?php echo json_encode($office->holidays); ?>;
        if (holidays == null)
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
        google.maps.event.addListener(map, 'click', function(event) {
            marker.setPosition(event.latLng);
            $("input[name='lat']").val(event.latLng.lat());
            $("input[name='lng']").val(event.latLng.lng());
        });
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
                console.log(latitude);
            }
            else {
                bootbox.alert("{{ $langLbl['Please input your address correctly!'] }}");
                window.setTimeout(function() {
                    bootbox.hideAll();
                }, 2000);
            }
        });
    });

    //office available
    $('#select_availability_section').hide();   
    $('#km_range_section').hide(); 
    $("input[name='office_available']").on('switchChange.bootstrapSwitch', function(event, state) {
    var select_availability_val = $('#select_availability').val();
        if ($(this).prop('checked')) {
            $(this).val(1);
            $('#select_availability_section').show();
            if(select_availability_val == "Available within max km range"){
                $('#km_range_section').show();
            }else{
                $('#km_range_section').hide();
            }
        } else {
            $('#select_availability').val("");
            $("input[name='km_range']").val("");
            $('#select_availability_section').hide();
            $('#km_range_section').hide();
        }
    });

    // Select Availability
    $('body').on('change','#select_availability',function(){
        var availability_val = $('#select_availability').val();
        if(availability_val == "Available within max km range"){
            $('#km_range_section').show(); 
        }else{
            $("input[name='km_range']").val("");
            $('#km_range_section').hide(); 
        }
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
<script type="text/javascript">
    $(document).ready(function(){
         ComponentsDropdowns.init();
    });
</script>

@stop

@stop
