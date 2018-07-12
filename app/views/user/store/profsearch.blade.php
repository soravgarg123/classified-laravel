@extends('user.layout')
@section('custom-styles')
<style>
    .page-wrapper{
        background-color:#f7f8f9;
    }
    .rating-xs{
        font-size: 1.2em !important;
    }
    .card-row-properties{
        width:290px !important;
        padding-left:0px;
    }
    .card-row-image{
        width:190px !important;
    }
</style>
@stop
@section('main')
<?php
$nameVal = 'name' . $currentLanguage;
$descriptionVal = 'description' . $currentLanguage;
$postTitleVal = 'post_title' . $currentLanguage;
$postContentVal = 'post_content' . $currentLanguage;
?>
<div class="container">
    <div class="row">
        <div class="col-sm-12">
            <div class="pull-right margin-top-xs">
                <button class="btn {{ (Session::get('dt') == 'grid') ? 'btn-primary' : 'btn-default' }}" id="js-btn-display" data-display="grid"><i class="fa fa-th"></i></button>
                <button class="btn {{ (Session::get('dt') == 'list') ? 'btn-primary' : 'btn-default' }}" id="js-btn-display" data-display="list"><i class="fa fa-th-list"></i></button>
            </div>
        </div>
    </div>
    @if (Session::get('dt') == 'grid')
    <div class="row margin-top-xs margin-bottom-sm">
        @if (count($companies) > 0)
        <div class="col-sm-12 pull-right">{{ $companies->appends(Request::input())->links() }}</div>
        <div class="clearfix"></div>    
        @foreach ($companies as $key => $company)

        <div class="col-sm-3">
            <div class="thumbnail company-list">
                <a href="{{ URL::route('company.detail', $company->slug) }}">
                    <?php
                    $tooltip = "<h4>" . $company->name . "</h4>";
                    $tooltip.= "<p><b>" . $langLbl['Keywords'] . " : </b>";
                    $keywords = explode(",", $company->keyword);
                    foreach ($keywords as $subKey => $value) {
                        if ($subKey != 0)
                            $tooltip.=", ";
                        $tooltip.= $value;
                    }
                    $tooltip.= "</p>";
                    $tooltip.= "<p><b>" . $langLbl['Email'] . " : </b>" . $company->email . "</p>";
                    $tooltip.= "<p><b>" . $langLbl['Phone'] . " : </b>" . $company->phone . "</p>";
                    $tooltip.= "<p><b>" . $langLbl['VAT ID'] . " : </b>" . $company->vat_id . "</p>";
                    $tooltip.= "<p><b>" . $langLbl['Description'] . " : </b>" . substr($company->$descriptionVal, 0, 300) . "</p>";
                    ?>
                    <div style="height: 200px; width: 100%; background: url({{ HTTP_COMPANY_PATH.$company->photo }}); background-size: cover;" data-toggle="tooltip" data-placement="{{ $key % 4 == 3 ? 'left' : 'right' }}" data-html="true" data-title="{{ $tooltip }}"></div>
                </a>
                <h4 class="color-default margin-top-xs">
                    <a href="{{ URL::route('company.detail', $company->slug) }}" data-toggle="tooltip" data-placement="{{ $key % 4 == 3 ? 'left' : 'right' }}" data-html="true" data-title="{{ $tooltip }}">
                        {{ $company->name }}
                    </a>
                </h4>
                <div class="row">
                    <p class="col-sm-4 col-sm-offset-1 text-right color-default"><b>{{ $langLbl['Phone'] }} : </b></p>
                    <p class="col-sm-7 no-padding-left">{{ $company->phone }}</p>
                </div>

                <div class="row">
                    <p class="col-sm-4 col-sm-offset-1 text-right color-default"><b>{{ $langLbl['Offices'] }} : </b></p>
                    <div class="col-sm-7 no-padding-left">
                        <?php $i = 0; ?>
                        @foreach($company->officies as $office)
                        <?php $i++; ?>
                        <p class="col-sm-12" style="padding-left:0;">{{ $office->$nameVal }} {{$i == 2 ? ' ...' : ''}}</p>
                        <?php if ($i == 2) break; ?>
                        @endforeach
                    </div>
                </div>
                <div class="pull-left">
                    @if (Session::has('user_id'))
                    <!-- <button class="btn btn-primary btn-sm" data-id="{{ $company->id }}" id="js-btn-add-cart"><i class="fa fa-plus"></i> Cart</button> -->
                    @endif
                </div>
                <div class="pull-right" style="margin-top: -10px;">
                    <input id="js-number-rating" data-symbol="&#8226;" type="number" class="rating" min=0 max=5 step=1 data-show-clear=false data-show-caption=false data-size='xs' value="{{ $company->getRatingScore() }}" readonly=true>
                </div>
                <nav class="social_links">
                    <ul>
                        <li class="fb"><a target="_blank" title="Facebook" href="http://www.facebook.com/sharer.php?u={{ URL::route('company.detail', $company->slug) }}"><span class="fa fa-facebook"></span></a></li>
                        <li class="gp"><a target="_blank" title="Google Plus" href="https://plus.google.com/share?url={{ URL::route('company.detail', $company->slug) }}"><span class="fa fa-google"></span></a></li>
                        <li class="tw"><a target="_blank" title="Twitter" href="http://twitter.com/home?status={{ URL::route('company.detail', $company->slug) }}"><span class="fa fa-twitter"></span></a></li>
                        <li class="pt"><a target="_blank" title="Pinterest" href="https://www.pinterest.com/pin/create/button/?url={{ URL::route('company.detail', $company->slug) }}&description={{ $company->$descriptionVal }}&media={{ HTTP_COMPANY_PATH.$company->photo }}&title={{ $company->name }}" data-pin-do="buttonPin" data-pin-config="above"><span class="fa fa-pinterest"></span></a></li>
                    </ul>
                </nav>
                <div class="clearfix"></div>

            </div>
        </div>        
        @endforeach
        @else
        <div class="note note-info">
            <h4 class="block">{{ $langLbl['There is no search result'] }}</h4>
        </div>
        @endif
    </div>
    @else

    <div class="row margin-top-xs margin-bottom-sm">
        <div class="col-sm-9">
            @if (count($companies) > 0)
            <div class="cards-row">
                <div class="pull-right">{{ $companies->appends(Request::input())->links() }}</div>
                <div class="clearfix"></div>
                @foreach ($companies as $key => $company)
                <div class="card-row">
                    <div class="card-row-inner">

                        <div class="card-row-image" data-background-image="{{ HTTP_COMPANY_PATH.$company->photo }}" style="background-image: url({{ HTTP_COMPANY_PATH.$company->photo }});">
                            <!-- <div class="card-row-label"><a href="listing-detail.html">Vacation</a></div><!-- /.card-row-label -->
                            
                        <div class="card-row-price">&euro;{{$company->rate}} / {{ $langLbl['hour'] }}</div><!-- -->
                        
                        </div><!-- /.card-row-image -->
		            	
		                
		
                        <div class="card-row-body">
                            <h2 class="card-row-title"><a href="{{ URL::route('company.detail', $company->slug) }}">{{$company->name}}</a></h2>
                            <div class="card-row-content"><p><?php echo substr($company->$descriptionVal, 0, 300); ?> ...</p></div><!-- /.card-row-content -->
                        </div><!-- /.card-row-body -->

                        <div class="card-row-properties profSearch">
                            <dl>

                                <dd>{{ $langLbl['Price'] }}</dd><dt>&euro;{{$company->rate}} / {{ $langLbl['hour'] }}</dt>
                                <dd>{{ $langLbl['Email'] }}</dd><dt>{{$company->email}}</dt>
                                

                                <dd>{{ $langLbl['Phone'] }}</dd><dt>{{$company->phone}}</dt>
                                
                                <dd>{{ $langLbl['Rating'] }}</dd>
                                <dt>
                                <div class="card-row-rating">
                                    <input id="js-number-rating" data-symbol="&#8226;" type="number" class="rating" min=0 max=5 step=1 data-show-clear=false data-show-caption=false data-size='xs' value="{{ $company->getRatingScore() }}" readonly=true>
                                </div><!-- /.card-row-rating -->
                                <nav class="social_links">
                                    <ul>
                                        <li class="fb"><a target="_blank" title="Facebook" href="http://www.facebook.com/sharer.php?u={{ URL::route('company.detail', $company->slug) }}"><span class="fa fa-facebook"></span></a></li>
                                        <li class="gp"><a target="_blank" title="Google Plus" href="https://plus.google.com/share?url={{ URL::route('company.detail', $company->slug) }}"><span class="fa fa-google"></span></a></li>
                                        <li class="tw"><a target="_blank" title="Twitter" href="http://twitter.com/home?status={{ URL::route('company.detail', $company->slug) }}"><span class="fa fa-twitter"></span></a></li>
                                        <li class="pt"><a target="_blank" title="Pinterest" href="https://www.pinterest.com/pin/create/button/?url={{ URL::route('company.detail', $company->slug) }}&description={{ $company->$descriptionVal }}&media={{ HTTP_COMPANY_PATH.$company->photo }}&title={{ $company->name }}" data-pin-do="buttonPin" data-pin-config="above"><span class="fa fa-pinterest"></span></a></li>
                                    </ul>
                                </nav>
                                </dt>
                            </dl>
                        </div><!-- /.card-row-properties -->
                    </div><!-- /.card-row-inner -->
                </div>

                @endforeach
                <div class="pull-right">{{ $companies->appends(Request::input())->links() }}</div>
                <div class="clearfix"></div>
            </div>
            @else
            <div class="note note-info">
                <h4 class="block">{{ $langLbl['There is no search result'] }}</h4>
            </div>
            @endif
        </div>
        <div class="col-sm-3 side-bar">
            <div class="row">
                <div class="col-sm-9">
                    <div class="form-group">
                        <div class="input-icon">
                            <i class="fa fa-pencil" style="margin-top:16px;"></i>
                            <input type="text" class="form-control input-lg input-circle custom-typeahead" id="js-cat-keyword" placeholder="{{ $langLbl['Enter Keyword'] }}" value="{{ Session::get('prof_keyword') }}">
                        </div>
                    </div>					                	                
                </div>
                <div class="col-sm-3" style="padding-left:0px;">
                    <div class="form-group">
                        <button type="button" class="btn green btn-block btn-circle btn-lg" id="js-cat-search">
                            <i class="fa fa-search"></i>
                        </button>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <h3 style="color:#E02222;"><i class="fa fa-bookmark" style="font-size:23px;"></i> {{ $langLbl['Categories'] }}</h3>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <ul class="list-unstyled cat-wrapper">
                        @foreach($postcategory as $c)
                        @if ($c->$nameVal != $langLbl['Other'])
                        <li><a href="{{ URL::route('post.category', $c->slug ) }}">{{$c->$nameVal}} </a>({{$c->getCatCount($c->id)}})</li>
                        @endif
                        @endforeach
                        @foreach($postcategory as $c)
                        @if ($c->$nameVal == $langLbl['Other'])
                        <li><a href="{{ URL::route('post.category', $c->slug ) }}">{{$c->$nameVal}} </a>({{$c->getCatCount($c->id)}})</li>
                        @endif
                        @endforeach
                    </ul>
                </div>
            </div>

            </br>
            <h3 style="color:#E02222;"><i class="fa fa-book" style="font-size:23px;"></i> {{ $langLbl['Recent Posts'] }}</h3>
            @foreach($recent_posts as $recent_post)                            	
            <div class="cards-small">
                <div class="card-small">
                    <div class="card-small-image">
                        <a href="{{ URL::route('post.detail', $recent_post->slug) }}">
                            <img class="img-responsive" src="{{ HTTP_POST_PATH.$recent_post->featured_image }}">
                        </a>
                    </div><!-- /.card-small-image -->

                    <div class="card-small-content">
                        <h3><a href="{{ URL::route('post.detail', $recent_post->slug ) }}">{{ $recent_post->$postTitleVal }}</a></h3>
                        <h4>{{ substr($recent_post->$postContentVal, 0, 50) }}</h4>								                    
                    </div><!-- /.card-small-content -->
                </div><!-- /.card-small -->
            </div>	
            <hr/>
            @endforeach
        </div>
    </div>
    @endif
</div>

@stop

@section('custom-scripts')
{{ HTML::script('/assets/js/bootstrap-tooltip.js') }}
<script>
    var markers = new Array();
            var alternateMarkers = [], markersIcon = [];
            $(document).ready(function() {

    $("button#js-btn-add-cart").click(function() {
    $.ajax({
    url: "{{ URL::route('async.user.cart.add') }}",
            dataType : "json",
            type : "POST",
            data : { company_id : $(this).attr('data-id') },
            success : function(data){
    bootbox.alert(data.msg);
            window.setTimeout(function(){
    bootbox.hideAll();
    }, 2000);
    }
    });
    });

            $("button#js-btn-display").click(function() {
    $("input[name='dt']").val($(this).attr('data-display'));
            $("button#js-prof-search").click();
    });

            $("div.company-item").find("*").mouseover(function(event) {
    event.preventDefault();
    });

            $("div.company-item").hover(function() {
    var ind = $(this).attr("data-id");
            Object.size = function(obj) {
    var size = 0, key;
            for (key in obj) {
    if (obj.hasOwnProperty(key)) size++;
    }
    return size;
    };
        
            for (var i = 0; i < Object.size(marker[ind]) - 1; i++){
    var lat = marker[ind][i].getPosition().lat();
            var lng = marker[ind][i].getPosition().lng();
            //map.setCenter(new google.maps.LatLng(lat, lng));
            // myLatlng = new google.maps.LatLng(lat,lng);
            marker[ind][i].setIcon(alternateMarkers[ind][i]);
            // infowindow[ind].open(map, marker[ind][i]);
            //markers.push(marker[ind][i]);            
    }
    AutoCenter(marker[ind]);
            // infowindow[ind].open(map, marker[ind]);
            //AutoCenter();
            $(this).addClass('background-gray');
        
    }, function() {
    var ind = $(this).attr("data-id");
            for (var i = 0; i < infowindow.length; i++) {
    infowindow[i].close();
    }
    for (var i = 0; i < Object.size(marker[ind]) - 1; i++){
    marker[ind][i].setIcon(markersIcon[ind][i]);
    }
    $(this).removeClass('background-gray');
    });
    });

            function AutoCenter(markers) {
            //  Create a new viewpoint bound
            var bounds = new google.maps.LatLngBounds();
                    //  Go through each...
                    $.each(markers, function (index, marker) {
            bounds.extend(marker.position);
            });
                    //  Fit these bounds to the map
                    map.fitBounds(bounds);
            }

    @if (Session::get('dt') == 'list')
            var marker = [];
            var infowindow = [];
            var mapPosition = new google.maps.LatLng({{ DEFAULT_LAT }}, {{ DEFAULT_LNG }});
            var mapOptions = { zoom: 12, center: mapPosition };
            var map = new google.maps.Map(document.getElementById('map-canvas'), mapOptions);
            function initialize() {
            @foreach ($companies as $key => $value)

                    var contentString = ''
                    + '<div style="width: 220px;">'
                    + '    <p><b>{{ $langLbl["Name"] }} : </b>{{ $value->name }}</p>'
                    + '    <p><b>{{ $langLbl["Description"] }} : </b>{{ addslashes(json_encode(substr($value->$descriptionVal, 0, 150))) }}</p>'
                    + '    <p><i class="fa fa-phone"></i> {{ $value->phone }}&nbsp;&nbsp;&nbsp;'
                    + '    <p><b>{{ $langLbl["Address"] }} : </b> {{ $value->email }}</p>'
                    + '    <p><b>{{ $langLbl["Zip Code"] }} : </b> {{ $value->zip_code }}&nbsp;&nbsp;&nbsp;'
                    + '</div>';
                    infowindow[{{ $key }}] = new google.maps.InfoWindow({
            content: contentString
            });
                    var markImg = new google.maps.MarkerImage('http://chart.apis.google.com/chart?chst=d_map_pin_letter&chld=|00aeef|000000');
                    var altMarkImg = new google.maps.MarkerImage('http://chart.apis.google.com/chart?chst=d_map_pin_letter&chld=|ff0000');
                    marker[{{$key}}] = [];
                    markersIcon[{{$key}}] = [];
                    alternateMarkers[{{$key}}] = [];
                    @for ($i = 0; $i < sizeof($value -> officies); $i++)
                    marker[{{ $key }}][{{$i}}] = new google.maps.Marker({
            position: new google.maps.LatLng({{ $value -> officies[$i] -> lat }}, {{ $value -> officies[$i] -> lng }}),
                    map: map,
                    icon: markImg,
                    title: '{{ $value->name }}'
            });
                    google.maps.event.addListener(marker[{{ $key }}], 'mouseover', function() {
            infowindow[{{ $key }}].open(map, marker[{{ $key }}][{{$i}}]);
            });
                    google.maps.event.addListener(marker[{{ $key }}][{{$i}}], 'mouseout', function() {
            infowindow[{{ $key }}].close();
            });
                    markersIcon[{{$key}}].push(markImg);
                    alternateMarkers[{{$key}}].push(altMarkImg);
                    @endfor
                    @endforeach
            }
    google.maps.event.addDomListener(window, 'load', initialize);
            @endif
</script>
@stop

@stop
