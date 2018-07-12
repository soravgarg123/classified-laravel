@extends('user.layout')

@section('custom-styles')
{{ HTML::style('/assets/metronic/global/plugins/bootstrap-fileinput/bootstrap-fileinput.css') }}
{{ HTML::style('/assets/metronic/frontend/onepage/css/custom.css') }}
{{ HTML::style('/assets/metronic/global/plugins/bootstrap-modal/css/bootstrap-modal.css') }}
{{ HTML::style('/assets/css/bootstrap-checkbox.css') }}
<style>
    .faq-tabbable i {
        color: #000 !important;
    }
</style>
@stop

@section('main')
<?php
$nameVal = 'name' . $currentLanguage;
?>
<div class="container">
    <div class="row">        
        <div class="col-md-12 margin-top-normal">

            @if (isset($alert))
            <div class="alert alert-{{ $alert['type'] }} alert-dismissibl fade in">
                <button type="button" class="close" data-dismiss="alert">
                    <span aria-hidden="true">&times;</span>
                    <span class="sr-only">{{ $langLbl['Close'] }}</span>
                </button>
                <p>
                    {{ $alert['msg'] }}
                </p>
            </div>
            @endif

            <div class="content">

                <div class="page-title center">
                    <h1>{{ $langLbl['Terms & Conditions'] }}</h1>
                </div>

                <ol style="list-style:none;">
                <?php 
                $currentLang = $_COOKIE['current_lang'];
                $column = "content".$currentLang;
                foreach($terms as $t) { ?>
                    <li>
                        <?php echo $t->$column; ?>
                    </li>
                <?php } ?>
                </ol>

            </div>
        </div>
    </div>            
</div>
</div>
<form method="get" action="{{URL::route('post.search')}}" id="post-search-frm">
    <input type="hidden" name="keyword"/>
</form>
@stop

@section('custom-scripts')
{{ HTML::script('/assets/metronic/global/plugins/bootstrap-fileinput/bootstrap-fileinput.js') }}
{{ HTML::script('/assets/metronic/global/plugins/bootstrap-modal/js/bootstrap-modal.js') }}
{{ HTML::script('/assets/metronic/global/plugins/bootstrap-modal/js/bootstrap-modalmanager.js') }}
{{ HTML::script('/assets/js/bootstrap-checkbox.js') }}
<script>


// START SEARCH FUNCTION
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
// \ END SEARCH FUNCTION
</script>
@stop

@stop