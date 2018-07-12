@extends('user.layout')

@section('custom-styles')
{{ HTML::style('/assets/metronic/global/plugins/carousel-owl-carousel/owl-carousel/owl.carousel.css') }}
<style>
    #owl-demo .item{
        margin: 7px;
    }
</style>
@stop

@section('main')
<?php
$nameVal = 'name' . $currentLanguage;
$descriptionVal = 'description' . $currentLanguage;
?>
<div class="container">
    <div class="row padding-top-normal padding-bottom-normal">
        <div class="col-sm-12 text-center"><h2 class="color-default">{{ $langLbl['Featured Company'] }}</h2></div>        
    </div>
    <div class="row">
        @foreach ($stores as $key => $store)
        <div class="col-sm-3">
            <div style="position: relative;" class="thumbnail">
                <?php
                $tooltip = "<h4>" . $store->$nameVal . "</h4>";
                $tooltip.= "<p><b>" . $langLbl['Keywords'] . " : </b>";
                $keywords = explode(",", $store->keyword);
                foreach ($keywords as $subKey => $value) {
                    if ($subKey != 0)
                        $tooltip.=", ";
                    $tooltip.= $value;
                }
                $tooltip.= "</p>";
                $tooltip.= "<p><b>" . $langLbl['Email'] . " : </b>" . $store->company->email . "</p>";
                $tooltip.= "<p><b>" . $langLbl['Phone'] . " : </b>" . $store->company->phone . "</p>";
                $tooltip.= "<p><b>" . $langLbl['VAT ID'] . " : </b>" . $store->company->vat_id . "</p>";
                $tooltip.= "<p><b>" . $langLbl['Description'] . " : </b>" . substr($store->$descriptionVal, 0, 300) . "</p>";
                ?>
                <a href="{{ URL::route('store.detail', $store->slug) }}">
                    <div style="height: 145px; width: 100%; background: url({{ HTTP_STORE_PATH.$store->photo }}); background-size: cover;" data-toggle="tooltip" data-placement="{{ $key % 4 == 3 ? 'left' : 'right' }}" data-html="true" data-title="{{ $tooltip }}"></div>
                </a>
                <div class="featured-company-offer">
                    @if (count($store->company->offers) > 0)
                    @foreach ($store->company->offers as $offer)
                    @if (!$offer->is_review)
                    <div class="color-default store-offers"><b>{{ $offer->$nameVal." : " }}</b>{{ $offer->price."&euro;" }}</div>
                    @endif
                    @endforeach                    
                    @endif
                </div>
                <h4 class="color-default margin-top-xs">
                    <a href="{{ URL::route('store.detail', $store->slug) }}" data-toggle="tooltip" data-placement="{{ $key % 4 == 3 ? 'left' : 'right' }}" data-html="true" data-title="{{ $tooltip }}">
                        {{ $store->name }}
                    </a>
                </h4>                    
                <div class="pull-left">
                    <a href="{{ URL::route('store.detail', $store->slug) }}">
                        Detail&nbsp;<i class="fa fa-angle-double-right"></i>
                    </a>
                </div>
                <div class="pull-right">                            
                    <input id="js-number-rating" data-symbol="&#8226;" type="number" class="rating" min=0 max=5 step=1 data-show-clear=false data-show-caption=false data-size='xs' value="{{ $store->getRatingScore() }}" readonly=true>
                </div>
                <div class="clearfix"></div>

            </div>
        </div>
        @endforeach
    </div>
    <hr/>
    <div class="row padding-top-normal padding-bottom-normal">
        <div class="col-sm-12 text-center"><h2 class="color-default">{{ $langLbl['Recent Reviews'] }}</h2></div>        
    </div>
    <div class="row padding-bottom-normal">
        <div class="col-sm-12">
            <div id="owl-demo" class="owl-carousel owl-theme">
                @foreach ($feedbacks as $feedback)
                <div class="item">
                    <div class="testimonials-v1">
                        <blockquote><p>{{ $feedback->description }}</p></blockquote>
                        <table>
                            @foreach ($feedback->ratings as $rating)
                            <tr>
                                <td class="text-right"><b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{ $rating->type->$nameVal }}&nbsp;:&nbsp;</b></td>
                                <td>
                                    <input id="js-number-rating" data-symbol="&#8226;" type="number" class="rating" min=0 max=5 step=1 data-show-clear=false data-show-caption=false data-size='xs' value="{{ $rating->answer }}" readonly=true>                                
                                </td>
                            </tr>
                            @endforeach
                        </table>
                        <div class="carousel-info">
                            <img class="pull-left" src="{{ HTTP_USER_PATH.$feedback->user->photo }}" style="height: 60px; width: 60px;">
                            <div class="pull-left">
                                <span class="testimonials-name" style="margin-top: 10px;">{{ $feedback->user->name }}</span>
                                <span class="testimonials-post"><i class="fa fa-clock-o"></i>&nbsp;{{ date(DATE_FORMAT, strtotime($feedback->created_at)) }}</span>
                            </div>
                        </div>                    
                    </div>
                </div>
                @endforeach
            </div>    
        </div>        
    </div>
</div>
@stop

@section('custom-scripts')
{{ HTML::script('/assets/metronic/global/plugins/carousel-owl-carousel/owl-carousel/owl.carousel.min.js') }}
{{ HTML::script('/assets/js/bootstrap-tooltip.js') }}
@include('js.user.home.index')
<script>
    $(document).ready(function() {
        $("#owl-demo").owlCarousel({
            autoPlay: 3000, //Set AutoPlay to 3 seconds       
            items: 4,
            itemsDesktop: [1199, 3],
            itemsDesktopSmall: [979, 3]
        });
    });
</script>      
@stop

@stop
