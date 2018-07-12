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
$postTitleVal = 'post_title' . $currentLanguage;
$postContentVal = 'post_content' . $currentLanguage;
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

            <div class="page-content">
                <div class="tab-content">
                    <div class="tab-pane active" id="company-profile">
                        <div class="row">
                            <div class="col-sm-9">
                                <div class="content">
                                    <div class="page-title">
                                        <h1>{{ $langLbl['FAQ'] }}</h1>
                                    </div>
                                    <div class="faq">
                                    <?php 
                                    $currentLang = $_COOKIE['current_lang'];
                                    $contentlang = "content".$currentLang;
                                    $titlelang = "title".$currentLang;

                                    foreach($help as $h) { ?>
                                        <div class="faq-item">
                                            <div class="faq-item-question">
                                                <h2><?php echo $h->$titlelang; ?></h2>
                                            </div>
                                            <div class="faq-item-answer">
                                                <p>
                                                    <?php echo $h->$contentlang; ?>
                                                </p>
                                            </div>
                                        </div>
                                    <?php } ?>
                                    </div>
                                </div>
                            </div>
                            <!-- START SIDEBAR -->
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
                        <!-- \ END SIDEBAR -->                         
                    </div>
                    <hr/>

                </div>
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