@extends('user.layout')
@section('custom-styles')
<style>
    .page-wrapper{
        background-color:#f7f8f9;
    }
    .rating-xs{
        font-size: 1.2em !important;
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
    <div class="row margin-top-xs margin-bottom-sm">
        <div class="col-sm-9">
            @if (count($stores) > 0)
            <div class="cards-row">
                <div class="pull-right">{{ $stores->appends(Request::input())->links() }}</div>
                <div class="clearfix"></div>
                @foreach ($stores as $key => $store)

                <div class="card-row">
                    <div class="card-row-inner">
                        <?php
                        $tooltip = "<div class='testimonials-v1'><div class='carousel-info'><img style='width:50px;height:50px;float:left;' src='" . HTTP_COMPANY_PATH . $store->company->photo . "'/><h4 style='float:left;margin-left:10px;margin-top:12px;'>" . $store->company->name . "</h4></div><div style='clear:both;'></div></div>";
                        //$tooltip = "<h4>".$store->name."</h4>";
                        $tooltip.= "<p><b>" . $langLbl['Keywords'] . " : </b>";
                        $keywords = explode(",", $store->keyword);
                        foreach ($keywords as $subKey => $value) {
                            if ($subKey != 0)
                                $tooltip.=", ";
                            $tooltip.= $value;
                        }
                        $tooltip.= "</p>";
                        $tooltip.= "<p><b>" . $langLbl['Email'] . " : </b>" . $store->company->email . "</p>";
                        $tooltip.= "<p><b>" . $langLbl['Phone'] . " : </b>" . $store->phone . "</p>";
                        $tooltip.= "<p><b>" . $langLbl['VAT ID'] . " : </b>" . $store->company->vat_id . "</p>";
                        $tooltip.= "<p><b>" . $langLbl['Description'] . " : </b>" . substr($store->$descriptionVal, 0, 150) . "...</p>";
                        ?>
                        <div class="card-row-image" data-background-image="{{ HTTP_STORE_PATH.$store->photo }}" data-toggle="tooltip" data-placement="left" data-html="true" data-title="{{ $tooltip }}" style="background-image: url({{ HTTP_STORE_PATH.$store->photo }});">

                            <div class="card-row-label">
                                @foreach ($store->subCategories as $key => $value)
                                <a href="{{ URL::route('store.search').'?keyword='.$value->subCategory->name }}">{{ $value->subCategory->$nameVal }}</a>
                                <?php break; ?>                                
                                @endforeach
                            </div><!-- /.card-row-label -->
                            <?php $options = unserialize($store->options); ?>
                            <div class="card-row-price">
                                &euro;{{ $store->price_value }}
                                @if($options['service_available'] == 1)
                                / {{$store->duration}}min
                                @endif
                            </div>
                        </div><!-- /.card-row-image -->

                        <div class="card-row-body">
                            <h2 class="card-row-title"><a href="{{ URL::route('store.detail', $store->slug) }}">{{$store->$nameVal}}</a></h2>
                            <div class="card-row-content"><p><?php echo substr($store->$descriptionVal, 0, 200); ?>...</p></div><!-- /.card-row-content -->
                        </div><!-- /.card-row-body -->

                        <div class="card-row-properties blog_search">
                            <dl>
                                <dd>{{ $langLbl['Price'] }}</dd>
                                <dt>&euro;{{ $store->price_value }}
                                @if($options['service_available'] == 1)
                                / {{$store->duration}}min
                                @endif
                                </dt>
                                <dd>{{ $langLbl['Category'] }}</dd>
                                <dt>
                                @foreach ($store->subCategories as $key => $value)
                                {{ $value->subCategory->$nameVal }}
                                <?php break; ?>                                
                                @endforeach
                                </dt>
                                <dd>{{ $langLbl['Address'] }}</dd><dt>{{$store->address}}</dt>
                                <dd>{{ $langLbl['Rating'] }}</dd>
                                <dt>
                                <div class="card-row-rating">
                                    <input id="js-number-rating" data-symbol="&#8226;" type="number" class="rating" min=0 max=5 step=1 data-show-clear=false data-show-caption=false data-size='xs' value="{{ $store->getRatingScore() }}" readonly=true>
                                </div><!-- /.card-row-rating -->
                                <nav class="social_links">
                                    <ul>
                                        <li class="fb"><a target="_blank" title="Facebook" href="http://www.facebook.com/sharer.php?u={{ URL::route('store.detail', $store->slug) }}"><span class="fa fa-facebook"></span></a></li>
                                        <li class="gp"><a target="_blank" title="Google Plus" href="https://plus.google.com/share?url={{ URL::route('store.detail', $store->slug) }}"><span class="fa fa-google"></span></a></li>
                                        <li class="tw"><a target="_blank" title="Twitter" href="http://twitter.com/home?status={{ URL::route('store.detail', $store->slug) }}"><span class="fa fa-twitter"></span></a></li>
                                        <li class="pt"><a target="_blank" title="Pinterest" href="https://www.pinterest.com/pin/create/button/?url={{ URL::route('store.detail', $store->slug) }}&description={{ $store->$descriptionVal }}&media={{ HTTP_STORE_PATH.$store->photo }}&title={{ $store->$nameVal }}" data-pin-do="buttonPin" data-pin-config="above"><span class="fa fa-pinterest"></span></a></li>
                                    </ul>
                                </nav>
                                </dt>
                            </dl>
                        </div><!-- /.card-row-properties -->
                    </div><!-- /.card-row-inner -->
                </div>                

                @endforeach
                <div class="pull-right">{{ $stores->appends(Request::input())->links() }}</div>
                <div class="clearfix"></div>
                
            </div>
            <div class="cards-row">
            @else
            <div class="note note-info">
                <h4 class="block">{{ $langLbl['There is no search result'] }}</h4>
            </div>
            @endif
        </div>
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
                dataType: "json",
                type: "POST",
                data: {store_id: $(this).attr('data-id')},
                success: function(data) {
                    bootbox.alert(data.msg);
                    window.setTimeout(function() {
                        bootbox.hideAll();
                    }, 2000);
                }
            });
        });

        $("button#js-btn-display").click(function() {
            $("input[name='dt']").val($(this).attr('data-display'));
            $("button#js-btn-search").click();
        });

        $("div.company-item").find("*").mouseover(function(event) {
            event.preventDefault();
        });

        $("div.company-item").hover(function() {
            var ind = $(this).attr("data-id");
            Object.size = function(obj) {
                var size = 0, key;
                for (key in obj) {
                    if (obj.hasOwnProperty(key))
                        size++;
                }
                return size;
            };

            for (var i = 0; i < Object.size(marker[ind]) - 1; i++) {
                var lat = marker[ind][i].getPosition().lat();
                var lng = marker[ind][i].getPosition().lng();
                //map.setCenter(new google.maps.LatLng(lat, lng));
                // myLatlng = new google.maps.LatLng(lat,lng);
                marker[ind][i].setIcon(alternateMarkers[ind][i]);
                infowindow[ind].open(map, marker[ind][i]);
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
            for (var i = 0; i < Object.size(marker[ind]) - 1; i++) {
                marker[ind][i].setIcon(markersIcon[ind][i]);
            }
            $(this).removeClass('background-gray');
        });
    });

//START SEARCH FUNCTION
    var categories = [];
    @foreach ($postcategory as $key => $value)
            categories[categories.length] = '{{ $value->name }}';
    @foreach ($value -> subCategories as $subKey => $subValue)
            categories[categories.length] = '{{ $subValue->name }}';
    @endforeach
            @endforeach
            $('#js-cat-keyword').typeahead({
        hint: true,
        highlight: true,
        minLength: 1
    }, {
        name: 'keywords',
        displayKey: 'value',
        source: substringMatcher(categories)
    });

    $("button#js-cat-search").click(function() {
        $("input[name='keyword']").val($("#js-cat-keyword").val());
        $("#post-search-frm").submit();
    });
//\ END SEARCH FUNCTION
</script>
@stop

@stop
