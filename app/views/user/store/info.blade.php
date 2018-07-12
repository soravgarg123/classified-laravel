@if (count($stores) == 0)
    <div class="col-sm-12">
    <h3 class="color-default">{{ $langLbl['There is no similars'] }}</h3>
    </div>
@endif
<?php
$nameVal = 'name' . $currentLanguage;
$descriptionVal = 'description' . $currentLanguage;
?>
@foreach ($stores as $item)
<div class="col-sm-12 margin-top-xs margin-bottom-xs">
    <div style="position: relative;">
        <?php 
        	
            $tooltip = "<h4>".$item->$nameVal."</h4>";
            $tooltip.= "<p><b>" . $langLbl['Keywords'] . " : </b>";
            $keywords = explode(",", $item->keyword);
            foreach ($keywords as $subKey => $value) {
                if ($subKey != 0)
                    $tooltip.=", ";
                $tooltip.= $value;
            }
            $tooltip.= "</p>";
            $tooltip.= "<p><b>" . $langLbl['Email'] . " : </b>".$item->company->email."</p>";
            $tooltip.= "<p><b>" . $langLbl['Phone'] . " : </b>".$item->phone."</p>";
            $tooltip.= "<p><b>" . $langLbl['Price'] . " : </b>&euro; ".$item->price_value;
            $tooltip.= "<p><b>" . $langLbl['VAT ID'] . " : </b>".$item->company->vat_id."</p>";            
            $tooltip.= "<p><b>" . $langLbl['Description'] . " : </b>".substr($item->$descriptionVal, 0, 300)."</p>";
        ?>
        <a href="{{ URL::route('store.detail', $item->slug) }}">
            <img class="img-responsive img-rounded" style="height: 165px;" src="{{ HTTP_STORE_PATH.$item->photo }}" data-toggle="tooltip" data-placement="right" data-html="true" data-title="{{ $tooltip }}">
        </a>
        <div class="featured-company-offer">
        @if (count($item->company->offers) > 0)
            @foreach ($item->company->offers as $offer)
                @if (!$offer->is_review)
                <div class="color-default"><b>{{ $offer->$nameVal." : " }}</b>{{ $offer->price."&euro;" }}</div>
                @endif
            @endforeach                    
        @endif
        </div>
        <div class="similar-item">
            <p style="position: absolute; bottom: 17px; left: 7px; font-size: 14px;">
                <a class="color-white" href="{{ URL::route('store.detail', $item->slug) }}" data-toggle="tooltip" data-placement="right" data-html="true" data-title="{{ $tooltip }}">
                    {{ $item->name }}
                </a>
            </p>
            
            <div class="pull-left" style="padding-bottom:5px;">
                <input id="js-number-rating" data-symbol="&#8226;" type="number" class="rating" min=0 max=5 step=1 data-show-clear=false data-show-caption=false data-size='xxs' value="{{ $item->getRatingScore() }}" readonly=true style="cursor: pointer;">
            </div>
            <div class="store-highlight pull-left store-highlight-review">
                    ( {{ $item->getRatingCount() }} {{ $langLbl['Reviews'] }} )
                </div>
            <div class="clearfix"></div>
        </div>
    </div>
</div>
@endforeach