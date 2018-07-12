@extends('company.layout')

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
<?php if (isset($alert)) { ?>
    <div class="alert alert-<?php echo $alert['type']; ?> alert-dismissibl fade in">
        <button type="button" class="close" data-dismiss="alert">
            <span aria-hidden="true">&times;</span>
            <span class="sr-only">{{ $langLbl['Close'] }}</span>
        </button>
        <p>
            <?php echo $alert['msg']; ?>
        </p>
    </div>
<?php } ?>

@if ($errors->has())
<div class="alert alert-danger alert-dismissibl fade in">
    <button type="button" class="close" data-dismiss="alert">
        <span aria-hidden="true">&times;</span>
        <span class="sr-only">{{ $langLbl['Close'] }}</span>
    </button>
    @foreach ($errors->all() as $error)
    {{ $error }}</br>		
    @endforeach
</div>
@endif
<?php
$nameVal = 'name' . $currentLanguage;
?>
<div class="portlet box red">
    <div class="portlet-title">
        <div class="caption">
            <i class="fa fa-pencil-square-o"></i> {{ $langLbl['Create Service'] }}
        </div>
    </div>
    <div class="portlet-body form">
        <form class="form-horizontal form-bordered form-row-stripped" role="form" method="post" action="{{ URL::route('company.store.store') }}" enctype="multipart/form-data">
            <input type="hidden" name="company_id" value="{{ $company->id }}"/>
            <div class="form-body">    

                <div class="form-group">
                    <label class="col-sm-3 control-label">{{ $langLbl['Name'] }}</label>
                    <div class="col-sm-9">
                        <div class="portlet box"> 
                            <div class="portlet-body">
                                <div class="tabbable-custom">
                                    <ul class="nav nav-tabs">
                                        @if($siteLanguage)
                                        @foreach ($siteLanguage as $lkey=>$rvalue)
                                        <li class="@if(empty($rvalue)) active  @endif">
                                            <a data-toggle="tab" href="#tab_5_{{ $langLbl[$lkey] }}">{{ Ucfirst($langLbl[$lkey]) }}</a>
                                        </li>
                                        @endforeach
                                        @endif 
                                    </ul>
                                    <div class="tab-content">
                                        @if($siteLanguage)
                                        @foreach ($siteLanguage as $lkey=>$rvalue)
                                        <div id="tab_5_{{ $langLbl[$lkey] }}" class="tab-pane @if(empty($rvalue)) active  @endif">
                                            {{ Form::text('name'.$rvalue, null, ['class' => 'form-control']) }}
                                        </div>
                                        @endforeach
                                        @endif 
                                    </div>
                                </div>
                            </div>	
                        </div>
                    </div>
                </div>	
                <div class="form-group">
                    <label class="col-sm-3 control-label">{{ $langLbl['Description'] }}</label>
                    <div class="col-sm-9">
                        <div class="portlet box"> 
                            <div class="portlet-body">
                                <div class="tabbable-custom">
                                    <ul class="nav nav-tabs">
                                        @if($siteLanguage)
                                        @foreach ($siteLanguage as $lkey=>$rvalue)
                                        <li class="@if(empty($rvalue)) active  @endif">
                                            <a data-toggle="tab" href="#tab_6_{{ $langLbl[$lkey] }}">{{ Ucfirst($langLbl[$lkey]) }}</a>
                                        </li>
                                        @endforeach
                                        @endif 
                                    </ul>
                                    <div class="tab-content">
                                        @if($siteLanguage)
                                        @foreach ($siteLanguage as $lkey=>$rvalue)
                                        <div id="tab_6_{{ $langLbl[$lkey] }}" class="tab-pane @if(empty($rvalue)) active  @endif">
                                            {{ Form::textarea('description'.$rvalue, null, ['class' => 'form-control']) }}
                                        </div>
                                        @endforeach
                                        @endif 
                                    </div>
                                </div>
                            </div>	
                        </div>
                    </div>
                </div>	

                @foreach ([
                'category'=> $langLbl['Category'],
                'photo' =>  $langLbl['Photo'],
                'service_available'=> $langLbl['Service Available'],
                'duration' => $langLbl['Duration'],
                'delivery_days'=> $langLbl['Days for Deliver'],
                'delivery_place'=> $langLbl['Delivery Place'],
                'office_id' => $langLbl['Office'].' *',
                'book_amount'=> $langLbl['Amount of Book at a time(max:5)'],
                'office_available'=> $langLbl['Available out of office'],
                'free_service'=> $langLbl['Free Service'],
                'price' => $langLbl['Price'].' *',
                'discount_available'=> $langLbl['Discount Available'],
                'discount_price'=> $langLbl['Discount Price'],
                ] as $key => $value)

                <div class="form-group" <?php if($key == "book_amount"){ echo "id='book_amount_lbl_input'"; } ?>  <?php if($key == 'office_id') echo 'id="offices"'?> <?php if($key == 'discount_available') echo 'id="discount_available_id"'?>>
                    <label class="col-sm-3 control-label" data-key="{{$key}}" style="display:{{$key == 'delivery_days' || $key == 'delivery_place' || $key == 'office_range' || $key == 'discount_price' ? 'none' : 'block'}}">{{ Form::label($key, $value) }} {{$key == 'price' || $key == 'discount_price' ? '&euro;' : ''}}</label>
                    @if($key == 'price')
                    <div class="col-md-9">
                        <input type="text" name="price_value" class="form-control" placeholder="{{ $langLbl['Price in Euro'] }}" />
                    </div>
                    @elseif($key == 'category')
                    <!-- START SERVICE CATEGORY -->
                    <div class="col-md-9">
                        <?php
                        $subCategories = [];
                        ?>
                        <select id="js-checkbox-sub-category" class="form-control" name="sub_category">
                            <option selected disabled style="foont-size:16px;">{{ $langLbl['SELECT A CATEGORY'] }}</option>
                            @foreach ($categories as $category)				            
                            <option disabled><b>{{ $category->$nameVal }}</b></option>
                            @foreach ($category->subCategories as $subCategory)
                            <option value="{{$subCategory->id}}" <?php if($errors->has() && Session::get("sub_category") == $subCategory->id) { echo "selected"; } ?>>&nbsp; {{$subCategory->$nameVal}}</option>				                
                            @endforeach
                            @endforeach  
                        </select>                  
                    </div>
                    <!--\ END SERVOCE CATEGORY -->
                    @elseif ($key == 'office_id')
                    <!-- START OFFICE -->
                    <div class="col-sm-9">
                        <div id="checkboxes">
                            <?php $i=1; foreach ($officies as $office) { ?>
                            <label for="office_{{$office->id}}"><input value="{{$office->id}}" class="office_name" name="{{$key}}[]" type="checkbox" <?php if($i == 1) echo "checked"; ?> id="office_{{$office->id}}" data-lat="{{$office->lat}}" data-lng="{{$office->lng}}"/>{{ $office->name }}</label>
                            <?php $i++; } ?>
                        </div>
                    </div>                       
                    <!--\ END OFFICE -->                  
                    @elseif($key == 'duration')
                    <!-- START DURATION SETTING -->
                    <div class="col-md-9">
                        <input type="text" placeholder="60" class="form-control col-md-9" name="{{$key}}"/><label class="col-sm-3" style="padding-top:5px;">min</label>
                    </div>
                    <!-- / END DURATION SETTING -->
                    @else
                    <div class="col-sm-9" <?php if($key == "book_amount"){ echo "id='book_amount_sec'"; } ?> style="display:{{$key == 'delivery_days' || $key == 'delivery_place' || $key == 'office_range' || $key == 'discount_price' ? 'none' : 'block'}}">
                        @if ($key == 'description')
                        <textarea class="wysihtml5 form-control" rows="3" name="{{ $key }}" data-error-container="#editor1_error" maxlength="1200" minlength="80"></textarea>
                        <span class="required">min:80 characters, max:1200 characters</span>
                        <div id="editor1_error"></div>                     
                        @elseif ($key == 'service_available' || $key == 'office_available' || $key == 'discount_available' || $key == 'free_service')
                        <input type="checkbox" {{$key == 'service_available' ? 'checked' : '' }} class="make-switch-new" data-size="small" name="{{$key}}" value="{{$key == 'service_available' ? 1 : 0}}">
                        @elseif ($key == 'delivery_days')
                        <input type="text" name="{{$key}}" class="col-md-9 form-control" placeholder="{{ $langLbl['Maximum number of days to deliver'] }}" ><label class="col-sm-3" style="padding-top:5px;">Days</label> 
                        @elseif ($key == 'office_range')
                        <input type="text" name="{{$key}}" class="col-md-9 form-control" placeholder="{{ $langLbl['Range with maximun km out of the office'] }}" ><label class="col-sm-3" style="padding-top:5px;">Km</label>
                        @elseif ($key == 'book_amount')
                            <input type="text" value="1" name="{{$key}}[]" class="form-control book_amount" id="book_amount_<?php echo $officies[0]->id; ?>">
                        @elseif ($key == 'delivery_place')
                        <?php $places = ['online' => $langLbl['Online'], 'office' => $langLbl['To the office']]; ?>
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
                <div class="form-group" style="display:none;">
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
                    <button type="submit"  class="btn btn-success">
                        <span class="glyphicon glyphicon-ok-circle"></span> {{ $langLbl['Save'] }}
                    </button>
                    <a href="{{ URL::route('company.store') }}" class="btn btn-primary">
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
{{ HTML::script('/assets/metronic/admin/pages/scripts/form-validation.js') }}
<script src="https://maps.googleapis.com/maps/api/js?v=3.exp&signed_in=true"></script>

<script>
    var map;
    var marker;
    var lat, lng;
    var address = new Array();
    var myLatlng, mapOptions;
    var markers = new Array();
    $(document).ready(function() {
    $('input[name="office_range"]').parent($('div')).css('display', 'block');
    $('.form-group').find($('label[data-key="office_range"]')).css('display', 'block');
    
        ComponentsFormTools.init();
        FormValidation.init();
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

        //choose only 1 category
        $("#js-div-sub-category").find($("input[type='checkbox']")).change(function() {
            var len = $("#js-div-sub-category").find($('input[type="checkbox"]:checked')).length;

            if (len > 1) {
                $(this).attr('checked', false);
                bootbox.alert("{{ $langLbl['You can choose only 1 category'] }}");
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
                $('.office_name').attr('checked', true);
                $('input[name="duration"]').parent($('div')).css('display', 'block');
                $('.form-group').find($('label[data-key="duration"]')).css('display', 'block');
                $('input[name="delivery_days"]').parent($('div')).css('display', 'none');
                $('select[name="delivery_place"]').parent($('div')).css('display', 'none');
                $('.form-group').find($('label[data-key="delivery_days"]')).css('display', 'none');
                $('.form-group').find($('label[data-key="delivery_place"]')).css('display', 'none');
                $('#offices').show();
            } else {
                $('.office_name').attr('checked', false);
                $('input[name="duration"]').parent($('div')).css('display', 'none');
                $('.form-group').find($('label[data-key="duration"]')).css('display', 'none');
                $('input[name="delivery_days"]').parent($('div')).css('display', 'block');
                $('select[name="delivery_place"]').parent($('div')).css('display', 'block');
                $('.form-group').find($('label[data-key="delivery_days"]')).css('display', 'block');
                $('.form-group').find($('label[data-key="delivery_place"]')).css('display', 'block');
                $('#offices').hide();
            }
        });

        //office available
        $("input[name='office_available']").on('switchChange.bootstrapSwitch', function(event, state) {
            if ($(this).prop('checked')) {
                $(this).val(1);
            } else {
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

        //free service
        $("input[name='free_service']").on('switchChange.bootstrapSwitch', function(event, state) {
            var discount_available_val = $('input[name="discount_available"]').bootstrapSwitch('state');
            if ($(this).prop('checked')) {
                $(this).val(1);
                $('input[name="discount_price"]').parent($('div')).css('display', 'none');
                $('.form-group').find($('label[data-key="discount_price"]')).css('display', 'none');
                $('#discount_available_id').hide();
                $('input[name="price_value"]').parent($('div')).css('display', 'none');
                $('.form-group').find($('label[data-key="price"]')).css('display', 'none');
            } else {
                if(discount_available_val){
                    $('input[name="discount_price"]').parent($('div')).css('display', 'block');
                    $('.form-group').find($('label[data-key="discount_price"]')).css('display', 'block');
                }else{
                    $('input[name="discount_price"]').parent($('div')).css('display', 'none');
                    $('.form-group').find($('label[data-key="discount_price"]')).css('display', 'none');
                }
                $('#discount_available_id').show();
                $('input[name="price_value"]').parent($('div')).css('display', 'block');
                $('.form-group').find($('label[data-key="price"]')).css('display', 'block');
            }
        });
    });




    function validate() {
        if ($("select[name='office_id']").val() == '') {
            bootbox.alert("Please select the office");
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

<script type="text/javascript">
    $(document).ready(function(){
        $('body').on('click','#delivery_place',function(){
            var val = $('#delivery_place').val();
            if(val == "online"){
                $('#offices').hide();
            }else{
                $('#offices').show();
            }
        });
    });
</script>
<script type="text/javascript">
 $(document).ready(function(){
    var myCheckboxes1 = new Array();
    var first_office_id = "<?php echo $officies[0]->id; ?>";
    myCheckboxes1.push(first_office_id);
    $('.office_name').change(function() {
    var office_id = $(this).val();
     if(this.checked){
            myCheckboxes1.push($(this).val());
            if(myCheckboxes1.length == 1){
                $('#book_amount_lbl_input').show();
            }
                $('#book_amount_sec').append('<input type="text" value="1" name="book_amount[]" class="form-control book_amount" id="book_amount_'+office_id+'">');
       }else{
            var index = myCheckboxes1.indexOf($(this).val());
            if (index >= 0){
                myCheckboxes1.splice(index, 1);
            }
            $('#book_amount_sec input#book_amount_'+office_id).remove();
            if(myCheckboxes1.length == 0){
                $('#book_amount_lbl_input').hide();
            }
        }
     });
  });
</script>

@stop

@stop
