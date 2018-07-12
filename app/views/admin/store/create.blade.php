@extends('admin.layout')

@section('custom-styles')]
<style>
    #map-canvas {
        height: 300px;
    }
</style>
{{ HTML::style('/assets/metronic/global/plugins/bootstrap-fileinput/bootstrap-fileinput.css') }}
{{ HTML::style('/assets/metronic/global/plugins/jquery-tags-input/jquery.tagsinput.css') }}
@stop

@section('breadcrumb')
<div class="row">
    <div class="col-md-12">
        <ul class="page-breadcrumb breadcrumb">
            <li>
                <i class="fa fa-home"></i>
                <span>{{ $langLbl['Service'] }}</span>
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
            <i class="fa fa-pencil-square-o"></i> {{ $langLbl['Create Service'] }}
        </div>
    </div>
    @foreach($companies as $key=>$company)
    <?php $officies[$company->id] = $company->officies; ?>
    @endforeach
    <div class="portlet-body form">
        <form class="form-horizontal form-bordered form-row-stripped" role="form" method="post" action="{{ URL::route('admin.store.store') }}" enctype="multipart/form-data">
            <div class="form-body">  
                @if($siteLanguage)
                @foreach ($siteLanguage as $lkey=>$rvalue)
                <div class="form-group">
                    <label class="col-sm-3 control-label">{{ Form::label('name'.$rvalue, $langLbl['Name'].' ('.$langLbl[$lkey].')') }}</label>
                    <div class="col-sm-9">
                        {{ Form::text('name'.$rvalue, null, ['class' => 'form-control']) }}
                    </div>
                </div>	
                @endforeach
                @endif 
                @if($siteLanguage)
                @foreach ($siteLanguage as $lkey=>$rvalue)
                <div class="form-group">
                    <label class="col-sm-3 control-label">{{ Form::label('description'.$rvalue, $langLbl['Description'].' ('.$langLbl[$lkey].')') }}</label>
                    <div class="col-sm-9">
                        {{ Form::textarea('description'.$rvalue, null, ['class' => 'form-control']) }}
                    </div>
                </div>	
                @endforeach
                @endif          
                @foreach ([
                'company_id'=> $langLbl['Professional'],
                'photo'=> $langLbl['Photo'],
                'service_available'=> $langLbl['Service Available'],
                'duration'=> $langLbl['Duration'],
                'delivery_days'=> $langLbl['Days for Deliver'],
                'delivery_place'=> $langLbl['Delivery Place'],
                'office_id'=> $langLbl['Office *'],
                'office_available'=> $langLbl['Available out of office'],
                'office_range'=> $langLbl['Range of Office'],
                'discount_available'=> $langLbl['Discount Available'],
                'price'=> $langLbl['Price *'],
                'discount_price'=> $langLbl['Discount Price'],
                'book_amount'=> $langLbl['Amount of Book at a time(max:5)'],
                'keyword'=> $langLbl['Keyword']                
                ] as $key => $value)

                <div class="form-group">
                    <label class="col-sm-3 control-label" data-key="{{$key}}" style="display:{{$key == 'delivery_days' || $key == 'delivery_place' || $key == 'office_range' || $key == 'discount_price' ? 'none' : 'block'}}">{{ Form::label($key, $value) }} {{$key == 'price' || $key == 'discount_price' ? '&euro;' : ''}}</label>
                    @if($key == 'price')
                    <div class="col-md-9">
                        <input type="text" name="price_value" class="form-control" placeholder="Price in Euro" required/>
                    </div>
                    @elseif($key == 'company_id')
                    <div class="col-sm-9">
                        {{ Form::select($key
                        , array('' => $langLbl['Select Professional']) + $companies->lists('name', 'id')
                        , NULL
                        , array('class' => 'form-control')) }}
                    </div>
                    @elseif ($key == 'office_id')
                    <div class="col-sm-7">
                        <select class="form-control" multiple="multiple" id="{{$key}}" name="{{$key}}[]">

                        </select>
                    </div>
                    <div class="col-sm-2">
                        <button type="button" id="addrMarker" class="btn btn-default">
                            <span class="glyphicon glyphicon-map-marker"></span> {{ $langLbl['Find Address'] }}
                        </button>
                    </div>
                    <!-- Duration Setting imak 20150520 -->
                    @elseif($key == 'duration')
                    <div class="col-md-9">
                        <input type="text" placeholder="60" class="form-control col-md-9" name="{{$key}}"/><label class="col-sm-3" style="padding-top:5px;">min</label>
                    </div>
                    <!-- / Duration Setting imak 20150520 -->
                    @else
                    <div class="col-sm-9" style="display:{{$key == 'delivery_days' || $key == 'delivery_place' || $key == 'office_range' || $key == 'discount_price' ? 'none' : 'block'}}">
                        @if ($key == 'description')
                        <textarea class="form-control" name="{{ $key }}" rows="3"></textarea>
                        @elseif ($key == 'keyword')
                        <textarea class="form-control" name="{{ $key }}" rows="3"></textarea>
                        @elseif ($key == 'service_available' || $key == 'office_available' || $key == 'discount_available')
                        <input type="checkbox" {{$key == 'service_available' ? 'checked' : '' }} class="make-switch-new" data-size="small" name="{{$key}}" value="{{$key == 'service_available' ? 1 : 0}}">
                        @elseif ($key == 'delivery_days')
                        <input type="text" name="{{$key}}" class="col-md-9 form-control" placeholder="Maximum number of days to deliver" ><label class="col-sm-3" style="padding-top:5px;">Days</label> 
                        @elseif ($key == 'office_range')
                        <input type="text" name="{{$key}}" class="col-md-9 form-control" placeholder="Range with maximun km out of the office" ><label class="col-sm-3" style="padding-top:5px;">Km</label>
                        @elseif ($key == 'book_amount')
                        <input type="text" value="1" name="{{$key}}" class="form-control">
                        @elseif ($key == 'delivery_place')
                        <?php $places = ['online' => 'Online', 'office' => 'To the office']; ?>
                        {{Form::select($key,
                        $places,
                        NULL,
                        array('class'=>'form-control')
                        )}}

                        @elseif ($key == 'photo')
                        <div class="fileinput fileinput-new" data-provides="fileinput">
                            <div class="fileinput-new thumbnail" style="width: 120px; height: 120px;">
                                <img src="{{ HTTP_COMPANY_PATH }}no_image.gif " alt=""/>
                            </div>
                            <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 120px; max-height: 120px;"></div>

                            <div>
                                <span class="btn default btn-file">
                                    <span class="fileinput-new">{{ $langLbl['Select image'] }}</span>
                                    <span class="fileinput-exists">{{ $langLbl['Change'] }}</span>
                                    <input type="file" name="{{ $key }}">
                                </span>
                                <a href="#" class="btn red fileinput-exists" data-dismiss="fileinput">{{ $langLbl['Remove'] }}</a>
                            </div>
                        </div>
                        @else
                        <input type="text" class="form-control" name="{{ $key }}" value="">
                        @endif
                    </div>
                    @endif                    
                </div>
                @endforeach
                <div class="form-group">
                    <label class="control-label col-md-3">{{ $langLbl['Location'] }}</label>
                    <div class="col-md-9">
                        <div id="map-canvas"></div>
                    </div>
                    <input type="hidden" name="lat" value="{{ DEFAULT_LAT }}"/>
                    <input type="hidden" name="lng" value="{{ DEFAULT_LNG }}"/>
                </div>
                <div class="form-group" id="js-div-sub-category">
                    <label class="col-sm-3 control-label">{{ $langLbl['Category'] }}</label>
                    <div class="col-md-9">
                        <?php
                        $subCategories = [];
                        if (!empty($store->subCategories)) {
                            foreach ($store->subCategories as $item) {
                                $subCategories[] = $item->sub_category_id;
                            }
                        }
                        ?>

                        @foreach ($categories as $category)
                        <div class="col-md-4">
                            <p><b>{{ $category->name }}</b></p>
                            @foreach ($category->subCategories as $subCategory)
                            <p>
                                <input type="checkbox" class="form-control" id="js-checkbox-sub-category" value="{{ $subCategory->id }}" 
                                       {{ in_array($subCategory->id, $subCategories) ? 'checked' : '' }}>&nbsp;{{ $subCategory->name }}
                            </p>
                            @endforeach
                        </div>
                        @endforeach                    
                    </div>
                </div>
            </div>
            <div class="form-actions fluid">
                <div class="col-sm-12 text-center">
                    <button type="submit"  class="btn btn-success">
                        <span class="glyphicon glyphicon-ok-circle"></span> {{ $langLbl['Save'] }}
                    </button>
                    <a href="{{ URL::route('admin.store') }}" class="btn btn-primary">
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
{{ HTML::script('/assets/metronic/global/plugins/jquery-tags-input/jquery.tagsinput.js') }}
<script src="https://maps.googleapis.com/maps/api/js?v=3.exp&signed_in=true"></script>

<script>
    var map;
    var marker;
    var lat, lng;
    var address = new Array();
    var myLatlng, mapOptions;
    var markers = new Array();
    var officies =<?php echo json_encode($officies); ?>;
    $(document).ready(function() {
        //ComponentsFormTools.init();
        lat = $("input[name='lat']").val();
        lng = $("input[name='lng']").val();
        myLatlng = new google.maps.LatLng(lat, lng);
        mapOptions = {
            zoom: 10,
            center: myLatlng
        }
        map = new google.maps.Map(document.getElementById('map-canvas'), mapOptions);

        marker = new google.maps.Marker({
            position: myLatlng,
            map: map,
            title: 'Office Location'
        });
        markers.push(marker);

        // START CHANGE OFFICE VIA COMPANY
        $("#company_id").change(function() {
            var company_id = $('#company_id').val();
            var html = '';
            for (var i = 0; i < officies[company_id].length; i++) {
                html += '<option value="' + officies[company_id][i].id + '" data-lat="' + officies[company_id][i].lat + '" data-lng="' + officies[company_id][i].lng + '"  >' + officies[company_id][i].name + '</option>';
            }
            $("#office_id").html(html);
        });
        // \ END CHANGE OFFICE VIA COMPANY

        //choose only 1 category
        $("#js-div-sub-category").find($("input[type='checkbox']")).change(function() {
            var len = $("#js-div-sub-category").find($('input[type="checkbox"]:checked')).length;

            if (len > 1) {
                $(this).attr('checked', false);
                bootbox.alert('{{ $langLbl["You can choose only 1 category"] }}');
                window.setTimeout(function() {
                    bootbox.hideAll();
                }, 2000);
            }
        });
        $('.make-switch-new').bootstrapSwitch({ onText: '{{ $langLbl["ON"] }}', offText: '{{ $langLbl["OFF"] }}' });
        if($("#langDD").val() != 'en' && $("#langDD").val() != '') {
            $('.bootstrap-switch.bootstrap-switch-small').addClass('bsswitch-large');
        }
        //Service available
        $("input[name='service_available']").on('switchChange.bootstrapSwitch', function(event, state) {
            if ($(this).prop('checked')) {
                $(this).val(1);
                $('input[name="duration"]').parent($('div')).css('display', 'block');
                $('.form-group').find($('label[data-key="duration"]')).css('display', 'block');
                $('input[name="delivery_days"]').parent($('div')).css('display', 'none');
                $('select[name="delivery_place"]').parent($('div')).css('display', 'none');
                $('.form-group').find($('label[data-key="delivery_days"]')).css('display', 'none');
                $('.form-group').find($('label[data-key="delivery_place"]')).css('display', 'none');
            } else {
                $('input[name="duration"]').parent($('div')).css('display', 'none');
                $('.form-group').find($('label[data-key="duration"]')).css('display', 'none');
                $('input[name="delivery_days"]').parent($('div')).css('display', 'block');
                $('select[name="delivery_place"]').parent($('div')).css('display', 'block');
                $('.form-group').find($('label[data-key="delivery_days"]')).css('display', 'block');
                $('.form-group').find($('label[data-key="delivery_place"]')).css('display', 'block');
            }
        });

        //office available
        $("input[name='office_available']").on('switchChange.bootstrapSwitch', function(event, state) {
            if ($(this).prop('checked')) {
                $(this).val(1);
                $('input[name="office_range"]').parent($('div')).css('display', 'block');
                $('.form-group').find($('label[data-key="office_range"]')).css('display', 'block');
            } else {
                $('input[name="office_range"]').parent($('div')).css('display', 'none');
                $('.form-group').find($('label[data-key="office_range"]')).css('display', 'none');
            }
        });

        //discount available
        $("input[name='discount_available']").on('switchChange.bootstrapSwitch', function(event, state) {
            if ($(this).prop('checked')) {
                $(this).val(1);
                $('input[name="discount_price"]').parent($('div')).css('display', 'block');
                $('.form-group').find($('label[data-key="discount_price"]')).css('display', 'block');
            } else {
                $('input[name="discount_price"]').parent($('div')).css('display', 'none');
                $('.form-group').find($('label[data-key="discount_price"]')).css('display', 'none');
            }
        });
    });




    function validate() {
        if ($("select[name='office_id']").val() == '') {
            bootbox.alert("{{ $langLbl['Please select the office'] }}");
            return false;
        }

        var objList = $("input#js-checkbox-sub-category:checked");
        for (var i = 0; i < objList.length; i++) {
            $("div#js-div-sub-category").append($("<input type='hidden' name='sub_category[]' value=" + objList.eq(i).val() + ">"));
        }
        return true;
    }

    jQuery('#addrMarker').click(function() {
        if (markers.length > 0) {
            for (var i = 0; i < markers.length; i++) {
                markers[i].setMap(null);
            }
        }

        $('select#office_id :selected').each(function(i, selected) {
            address[i] = new Array();
            address[i]['lat'] = $(selected).attr('data-lat');
            address[i]['lng'] = $(selected).attr('data-lng');
            markerAddress(address[i]['lat'], address[i]['lng']);
        });
        AutoCenter();
    });


    function markerAddress(lat, lng) {
        myLatlng = new google.maps.LatLng(lat, lng);
        marker = new google.maps.Marker({
            position: myLatlng,
            map: map,
            title: 'Office Location'
        });
        markers.push(marker);
    }

    function AutoCenter() {
        //  Create a new viewpoint bound
        var bounds = new google.maps.LatLngBounds();
        //  Go through each...
        $.each(markers, function(index, marker) {
            bounds.extend(marker.position);
        });
        //  Fit these bounds to the map
        map.fitBounds(bounds);
    }

</script>

@stop

@stop