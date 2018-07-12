@extends('user.layout')

@section('main')
<?php
$nameVal = 'name' . $currentLanguage;
$descriptionVal = 'description' . $currentLanguage;
?>
<div class="container">
    <div class="row">
        <div class="col-sm-7 margin-top-normal margin-bottom-normal">
            @if (count($carts) > 0) 
            <div class="pull-right">{{ $carts->links() }}</div>
            <div class="clearfix"></div>
            @foreach ($carts as $cart)
            <?php $company = $cart->company;
            $store = $cart->store;
            ?>
            <div class="row margin-top-xs">
                <div class="col-md-4 col-sm-4">
                    <a href="{{ URL::route('store.detail', $company->slug) }}">
                        <?php
                        $tooltip = "<div class='testimonials-v1'><div class='carousel-info'><img style='width:50px;height:50px;float:left;' src='" . HTTP_COMPANY_PATH . $company->photo . "'/><h4 style='float:left;margin-left:10px;margin-top:12px;'>" . $company->name . "</h4></div><div style='clear:both;'></div></div>";
                        $tooltip.= "<p style='margin-top:10px;'><b>" . $langLbl['Keywords'] . " : </b>";
                        $keywords = explode(",", $company->keyword);
                        foreach ($keywords as $key => $value) {
                            if ($key != 0)
                                $tooltip.=", ";
                            $tooltip.= $value;
                        }
                        $tooltip.= "</p>";
                        $tooltip.= "<p><b>" . $langLbl['Email'] . " : </b>" . $company->email . "</p>";
                        $tooltip.= "<p><b>" . $langLbl['Phone'] . " : </b>" . $company->phone . "</p>";
                        $tooltip.= "<p><b>" . $langLbl['VAT ID'] . " : </b>" . $company->vat_id . "</p>";
                        $tooltip.= "<p><b>" . $langLbl['Description'] . " : </b>" . substr($store->$descriptionVal, 0, 300) . "</p>";
                        ?>
                        <img class="img-responsive img-rounded" alt="" src="{{ HTTP_STORE_PATH.$store->photo }}" data-toggle="tooltip" data-placement="right" data-html="true" data-title="{{ $tooltip }}">
                    </a>
                </div>
                <div class="col-md-8 col-sm-8">
                    <h3 class="">
                        <a href="{{ URL::route('store.detail', $store->slug) }}">{{ $store->$nameVal }}</a>
                        <?php
                        if ($cart->status == 0) { //pending...
                            $status_class = "label-info";
                            $status = $langLbl['Pending'];
                        } elseif ($cart->status == 1) {
                            $status_class = "label-success";
                            $status = $langLbl['Completed'];
                        }// completed...
                        elseif ($cart->status == 2) {
                            $status_class = "label-warning";
                            $status = $langLbl['Cancelled'];
                        }// cancelled...
                        else {
                            $status_class = "label-danger";
                            $status = $langLbl['Book'];
                        }//book
                        ?> 
                        <span class="label label-sm {{ $status_class }}">{{ $status }}</span>
                        <button class="btn btn-link btn-sm" data-id="{{ $cart->id }}" id="js-btn-remove-cart" title="Remove Cart"><i class="fa fa-trash-o"></i></button>
                    </h3>
                    <div class="pull-left">             
                        <input id="js-number-rating" data-symbol="&#8226;" type="number" class="rating" min=0 max=5 step=1 data-show-clear=false data-show-caption=false data-size='xs' value="{{ $store->getRatingScore() }}" readonly=true>          
                    </div>
                    <span class="pull-left company-highlight" style="padding:12px;">( {{$store->getRatingCount()}} Reviews )</span>
                    <div class="clearfix"></div>
                    <ul class="blog-info">
                        <li><span class="color-default"><b><i class="fa fa-phone"></i> {{ $company->phone }}</b></span></li>
                        <li><span class="color-default"><b><i class="fa fa-envelope-o"></i> {{ $company->email }}</b></span></li>                      
                    </ul>                        
                    <?php $options = unserialize($cart->options); ?>
                    <ul class="blog-info">
                        @if( $options['service_available'] == 1 )
                        <li><span class="color-default"><b><i class="fa fa-calendar"></i> {{$langLbl['Booking Date']}} : </b></span> {{ $cart->book_date }}</li>
                        <li><span class="color-default"><b><i class="fa fa-clock-o"></i> {{$langLbl['Duration']}} : </b></span> {{ $cart->duration }}</li>                            
                        @else
                        <?php $delivery_date = date('Y-m-d', strtotime($cart->created_at . "+" . $options['delivery_days'] . " day")); ?>
                        <li><span class="color-default"><b><i class="fa fa-calendar"></i>{{$langLbl['Delivery Date']}} : {{$langLbl['By'] }} </b></span>{{$delivery_date}}</li>
                        <li><span class="color-default"><b><i class="fa fa-map-marker"></i>{{$langLbl['Delivery Place'] }} : </b></span>{{$options['delivery_place']}}</li>
                        @endif
                    </ul>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <hr/>
                </div>
            </div>
            @endforeach
            <div class="pull-right">{{ $carts->links() }}</div>
            <div class="clearfix"></div>
            @else
            <div class="note note-info">
                <h4 class="block">{{$langLbl['The cart is empty'] }}</h4>
            </div>
            @endif
        </div>

        <!-- <div class="col-sm-5">
            <div id="map-canvas" style="height: 600px; width: 100%; border: 2px solid #E6400C;" class="margin-top-sm margin-bottom-xs"></div>            
        </div> -->
    </div>
</div>
@stop
@section('custom-scripts')
{{ HTML::script('/assets/js/bootstrap-tooltip.js') }}
<script>
    $(document).ready(function() {
    $("button#js-btn-remove-cart").click(function() {
    var obj = $(this);
            $.ajax({
    url: "{{ URL::route('async.user.cart.remove') }}",
            dataType : "json",
            type : "POST",
            data : { cart_id : $(this).attr('data-id') },
            success : function(data){
                bootbox.alert(data.msg);
                if(data.result == "success"){
                    obj.parents("div.margin-top-xs").eq(0).next().remove();
                    obj.parents("div.margin-top-xs").eq(0).remove();
                    window.setTimeout(function(){
                        window.location.reload();
                        }, 2000);
                      }
                    }
                  });
                });
              });
/*            function initialize() {

            var mapPosition = new google.maps.LatLng({{ DEFAULT_LAT }}, {{ DEFAULT_LNG }});
                    var mapOptions = { zoom: 12, center: mapPosition };
                    var map = new google.maps.Map(document.getElementById('map-canvas'), mapOptions);
                    var marker = [];
                    var infowindow = [];
                    @foreach ($carts as $key => $cart)
<?php $value = $cart->company; ?>
            var contentString = ''
                    + '<div style="width: 220px;">'
                    + '    <p><b>Name : </b>{{ $value->$nameVal }}</p>'
                    + '    <p><b>Description : </b>{{ addslashes(substr($cart->store->$descriptionVal, 0, 150)) }}</p>'
                    + '    <p><i class="fa fa-phone"></i> {{ $cart->company->phone }}&nbsp;&nbsp;&nbsp;'
                    + '    <p><b>Address : </b> {{ $cart->company->email }}</p>'
                    + '</div>';
                    infowindow[{{ $key }}] = new google.maps.InfoWindow({
            content: contentString
            });
                    marker[{{ $key }}] = new google.maps.Marker({position: new google.maps.LatLng({{ $cart->store->lat }}, {{ $cart->store->lng }}), map: map, title: '{{ $value->$nameVal }}'});
                    google.maps.event.addListener(marker[{{ $key }}], 'mouseover', function() {
            infowindow[{{ $key }}].open(map, marker[{{ $key }}]);
            });
                    google.maps.event.addListener(marker[{{ $key }}], 'mouseout', function() {
            infowindow[{{ $key }}].close();
            });
                    @endforeach
            }
    google.maps.event.addDomListener(window, 'load', initialize);*/
</script>
@stop

@stop
