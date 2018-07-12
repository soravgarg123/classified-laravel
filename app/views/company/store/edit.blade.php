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
<?php
$nameVal = 'name' . $currentLanguage;
?>
<div class="portlet box red">
    <div class="portlet-title">
        <div class="caption">
            <i class="fa fa-pencil-square-o"></i> {{ $langLbl['Edit Service'] }}
        </div>
    </div>
    <div class="portlet-body form">
        <form class="form-horizontal form-bordered form-row-stripped" role="form" method="post" action="{{ URL::route('company.store.store') }}" enctype="multipart/form-data">
            <input type="hidden" name="company_id" value="{{ $company->id }}"/>
            <input type="hidden" name="store_id" value="{{ $store->id }}"/>
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
                                            {{ Form::text('name'.$rvalue, $store->{'name'.$rvalue}, ['class' => 'form-control']) }}
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
                                            {{ Form::textarea('description'.$rvalue, $store->{'description'.$rvalue}, ['class' => 'wysihtml5 form-control', 'maxlength'=> "1200", 'minlength' => "80"]) }}
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
                    <label class="col-sm-3 control-label">{{ $langLbl['Embed Widget'] }}</label>
                    <div class="col-sm-9">
                        <p>
                            <textarea class="form-control readonly" readonly><iframe width='800' height='600' src='{{ URL::route('widget.embed.home', $company->token) }}' frameborder='0'></iframe></textarea>
                        </p>
                        <p>
                            <input type="text" class="form-control readonly" readonly value="{{ URL::route('widget.embed.home', $store->token) }}">
                        </p>
                    </div>
                </div>
                <?php $options = unserialize($store->options); ?>           
                @foreach ([
                'category'=> $langLbl['Category'],
                'photo' => $langLbl['Photo'],
                'service_available'=> $langLbl['Service Available'],
                'duration' => $langLbl['Duration'],
                'delivery_days'=> $langLbl['Days for Deliver'],
                'delivery_place'=> $langLbl['Delivery Place'],
                'office_id' => $langLbl['Office'].' *',
                'book_amount'=> $langLbl['Amount of Book at a time(max:5)'],
                'office_available'=> $langLbl['Available out of office'],
                'free_service'=> $langLbl['Free Service'],
                'price' => $langLbl['Price'] . ' *',
                'discount_available'=> $langLbl['Discount Available'],
                'discount_price'=> $langLbl['Discount Price'],
                ] as $key => $value)

                <div class="form-group" <?php if($key == "book_amount"){ echo "id='book_amount_lbl_input'"; } ?>  <?php if($key == 'office_id') echo 'id="offices"'?> <?php if($key == 'discount_available') echo 'id="discount_available_id"'?>>
                    <label class="col-sm-3 control-label" data-key="{{$key}}" style="display:{{ ($key == 'duration' && $options['service_available'] == '')||($key == 'delivery_days' && $options['service_available'] == '1')|| ( $key == 'delivery_place' && $options['service_available'] == '1' ) || ( $key == 'office_range' && $options['office_available'] == '') || ( $key == 'discount_price' && $options['discount_available'] == '' ) ? 'none' : 'block'}}">{{ Form::label($key, $value) }} {{$key == 'price' || $key == 'discount_price' ? '&euro;' : ''}}</label>
                    @if($key == 'price')
                    <div class="col-md-9">
                        <input type="text" name="price_value" class="form-control" placeholder="{{ $langLbl['Price in Euro'] }}" value="{{ $store->price_value }}"/>
                    </div>
                    @elseif($key == 'category')
                    <!-- START SERVOCE CATEGORY -->
                    <div class="col-md-9">
                        <?php
                        $subCategories = [];
                        foreach ($store->subCategories as $item) {
                            $subCategories[] = $item->sub_category_id;
                        }
                        ?>
                        <select id="js-checkbox-sub-category" class="form-control" name="sub_category">
                            <option disabled style="foont-size:16px;">{{ $langLbl['SELECT A CATEGORY'] }}</option>
                            @foreach ($categories as $category)				            
                            <option disabled><b>{{ $category->$nameVal }}</b></option>
                            @foreach ($category->subCategories as $subCategory)
                            <option value="{{$subCategory->id}}" {{ in_array($subCategory->id, $subCategories) ? 'selected' : '' }}>&nbsp; {{$subCategory->$nameVal}}</option>				                
                            @endforeach
                            @endforeach  
                        </select>                  
                    </div>
                    <!-- \ END SERVICE CATEGORY -->   
                    @elseif ($key == 'office_id')
                    <!-- START OFFICE -->
                    <div class="col-sm-9">
                        <?php $office_id = array();
                        $office_location = [];
                        ?>
                        @foreach ($sub_officies as $office)
                        <?php array_push($office_id, $office->office_id); ?>
                        @endforeach 
                        <div id="checkboxes">
                            <?php $j = 1; foreach ($officies as $office) { ?>
                            <label for="office_{{$office->id}}"><input value="{{$office->id}}" {{ in_array($office->id, $office_id) ? 'checked' : '' }} name="{{$key}}[]" class="office_name" type="checkbox" id="office_{{$office->id}}" data-lat="{{$office->lat}}" main="{{ $j }}" data-lng="{{$office->lng}}"/>{{ $office->name }}</label>
                           <?php $j++; } ?>
                        </div>
                    </div>
                    <!--\ END OFFICE -->               
                    @elseif($key == 'duration')		
                    <!-- START DURATION SETTING -->			
                    <div class="col-md-9" <?php if($key == "book_amount"){ echo "id='book_amount_sec'"; } ?> style="display:{{ $options['service_available'] == '' ? 'none':'block'}}">
                        <input type="text"  class="form-control col-md-9" name="{{$key}}" value="{{$store->duration != '' ? $store->duration: 60}}"/><label class="col-sm-3" style="padding-top:5px;">min</label>
                    </div>					
                    <!--\ END DURATION SETTING -->                   	
                    @else
                    <div class="col-sm-9" <?php if($key == "book_amount"){ echo "id='book_amount_sec'"; } ?> style="display:{{ ($key == 'delivery_days' && $options['service_available'] == '1')|| ( $key == 'delivery_place' && $options['service_available'] == '1' ) || ( $key == 'office_range' && $options['office_available'] == '') || ( $key == 'discount_price' && $options['discount_available'] == '' ) ? 'none' : 'block'}}">
                        @if ($key == 'description')
                        <!-- START DESCRIPTION -->                        
                        <textarea class="wysihtml5 form-control" rows="3" name="{{ $key }}" data-error-container="#editor1_error" maxlength="1200" minlength="80" required title="Description length should be min. 80 chars and max. 1200 chars.">{{ $store->{$key} }}</textarea>
                        <span class="required">min:80 characters, max:1200 characters</span>
                        <div id="editor1_error"></div>
                        <!--\ END DESCRIPTION  -->
                        @elseif ($key == 'service_available' || $key == 'office_available' || $key == 'discount_available' || $key == 'free_service')
                        <!-- START SERVICE AVAILABLE OPTION -->
                        <input type="checkbox" {{$options[$key] == '1' ? 'checked' : '' }} class="make-switch-new" data-size="small" name="{{$key}}" value="{{ $options[$key] }}">
                        <!--\ END SERVICE AVAILABLE OPTION  -->
                        @elseif ($key == 'delivery_days')
                        <!-- START DELIVERY DAYS WHEN SERVICE NOT AVAILABLE -->
                        <input type="text" name="{{$key}}" class="col-md-9 form-control" placeholder="{{ $langLbl['Maximum number of days to deliver'] }}" value="{{$options[$key]}}" ><label class="col-sm-3" style="padding-top:5px;">Days</label>
                        <!--\ END DELIVERY DAYS WHEN SERVICE NOT AVAILABLE --> 
                        @elseif ($key == 'office_range')
                        <!-- START OFFICE DISTANCE RANGE -->
                        <input type="text" name="{{$key}}" class="col-md-9 form-control" placeholder="{{ $langLbl['Range with maximun km out of the office'] }}" value="{{$options[$key]}}"><label class="col-sm-3" style="padding-top:5px;">Km</label>
                        <!--\ END OFFICE DISTANCE RANGE --> 
                        @elseif ($key == 'book_amount')
                        <!-- START BOOK AMOUNT -->
                        <?php $i = 1;
                            $book_amount_str = $store->book_amount;
                            $book_amount_arr = explode(",", $book_amount_str);
                            foreach($book_amount_arr as $ba){ ?>
                            <input type="text" value="{{ $ba }}" name="{{ $key }}[]" class="form-control book_amount" id="book_amount_{{ $i }}" />
                        <?php $i++; } ?>
                        
                        <!--\ END BOOK AMOUNT -->
                        @elseif ($key == 'delivery_place')
                        <!-- START DELIVERY PLACE -->
                        <?php $places = ['online' => $langLbl['By email'], 'office' => $langLbl['To the office']]; ?>
                        {{Form::select($key,
                        $places,
                        $options['delivery_place'],
                        array('class'=>'form-control')
                        )}}
                        <!--\ END DELIVERY PLACE -->
                        @elseif($key == 'discount_price')
                        <!-- START DISCOUNT PRICE -->
                        <input type="text" class="form-control" name="{{ $key }}" value="{{ $options[$key] }}">
                        <!--/ END DISCOUNT PRICE -->
                        @elseif ($key == 'photo')
                        <!-- START PHOTO UPLOAD -->
                        <div class="fileinput fileinput-new" data-provides="fileinput">
                            <div class="fileinput-new thumbnail" style="width: 120px; height: 120px;">
                                <img src="{{ HTTP_STORE_PATH.$store->{$key} }} " alt=""/>
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
                        <!--\ END PHOTO UPLOAD -->
                        @else
                        <!-- START OTHERS FIELD -->
                        <input type="text" class="form-control" name="{{ $key }}" value="{{ $store->{$key} }}">
                        <!--\ END OTHERS FIELD -->
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
                    <button type="submit" onclick="return validate()" class="btn btn-success">
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

                        // START DOCUMENT READY
                        $(document).ready(function() {
                            // START GOOGLE MAP FOR OFFICE
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
                            console.log($('input[name="office_id[]"]:checked').length);

                            if ($('input[name="office_id[]"]:checked').length > 0) {
                                for (var i = 0; i < markers.length; i++) {
                                    markers[i].setMap(null);
                                }
                                $('input[name="office_id[]"]:checked').each(function(i, selected) {
                                    address[i] = new Array();
                                    address[i]['lat'] = $(selected).attr('data-lat');
                                    address[i]['lng'] = $(selected).attr('data-lng');
                                    markerAddress(address[i]['lat'], address[i]['lng']);
                                });
                                AutoCenter();
                            } else {
                                marker = new google.maps.Marker({
                                    position: myLatlng,
                                    map: map,
                                    title: 'Office Location'
                                });
                                markers.push(marker);
                            }
                            // \ END GOOGLE MAP FOR OFFICE
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
                                    $('#offices').show();
                                } else {
                                    $('input[name="duration"]').parent($('div')).css('display', 'none');
                                    $('.form-group').find($('label[data-key="duration"]')).css('display', 'none');
                                    $('input[name="delivery_days"]').parent($('div')).css('display', 'block');
                                    $('select[name="delivery_place"]').parent($('div')).css('display', 'block');
                                    $('.form-group').find($('label[data-key="delivery_days"]')).css('display', 'block');
                                    $('.form-group').find($('label[data-key="delivery_place"]')).css('display', 'block');
                                    $('#offices').hide();
                                }
                            });

                            // START OFFICE AVAILABLE
                            $("input[name='office_available']").on('switchChange.bootstrapSwitch', function(event, state) {
                                if ($(this).prop('checked')) {
                                    $(this).val(1);
                                } else {
                                }
                            });
                            // \ END OFFICE AVAILABLE

                            // START DISCOUNT AVAILABLE
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
                            // \ END DISCOUNT AVAILABLE

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
                        // \ END DOCUMENT READY

                        //START OFFICE SELECT BOX
                        var expanded = false;
                        function showCheckboxes() {
                            var checkboxes = document.getElementById("checkboxes");
                            if (!expanded) {
                                checkboxes.style.display = "block";
                                expanded = true;
                            } else {
                                checkboxes.style.display = "none";
                                expanded = false;
                            }
                        }
                        // \ END OFFICE SELECT BOX 

                        function validate() {
                            if ($("select[name='city_id']").val() == '') {
                                bootbox.alert("Please select the city");
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
        var service_available1 = "{{ $options['service_available'] }}";
        if(service_available1 == ""){
            $('input[name="duration"]').parent($('div')).css('display', 'none');
            $('.form-group').find($('label[data-key="duration"]')).css('display', 'none');
            $('input[name="delivery_days"]').parent($('div')).css('display', 'block');
            $('select[name="delivery_place"]').parent($('div')).css('display', 'block');
            $('.form-group').find($('label[data-key="delivery_days"]')).css('display', 'block');
            $('.form-group').find($('label[data-key="delivery_place"]')).css('display', 'block');
            $('#offices').hide();            
        }
        $('body').on('click','#delivery_place',function(){
            var val = $('#delivery_place').val();
            if(val == "online"){
                $('#offices').hide();
            }else{
                $('#offices').show();
            }
        });

        var free_service_val = "<?php echo $options['free_service']; ?>";
        var discount_available_val1 = $('input[name="discount_available"]').bootstrapSwitch('state');
        if(free_service_val){ // for free services
            $('input[name="discount_price"]').parent($('div')).css('display', 'none');
            $('.form-group').find($('label[data-key="discount_price"]')).css('display', 'none');
            $('#discount_available_id').hide();
            $('input[name="price_value"]').parent($('div')).css('display', 'none');
            $('.form-group').find($('label[data-key="price"]')).css('display', 'none');
        }else{ // for paid services
            if(discount_available_val1){
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
</script>
<script type="text/javascript">
 $(document).ready(function(){
    var myCheckboxes1 = new Array();
    $('.office_name').change(function() {
    var office_id = $(this).attr('main');
     if(this.checked){
            myCheckboxes1.push($(this).attr('main'));
            $('#book_amount_sec').append('<input type="text" value="1" name="book_amount[]" class="form-control book_amount" id="book_amount_'+office_id+'">');
       }else{
            var index = myCheckboxes1.indexOf($(this).attr('main'));
            myCheckboxes1.splice(index, 1);
            $('#book_amount_sec input#book_amount_'+office_id).remove();
        }
     });
  });
</script>
@stop

@stop
