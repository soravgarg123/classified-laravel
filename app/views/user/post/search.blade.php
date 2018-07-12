@extends('user.layout')

@section('main')
<?php
$nameVal = 'name' . $currentLanguage;
$descriptionVal = 'description' . $currentLanguage;
$postTitleVal = 'post_title' . $currentLanguage;
$postContentVal = 'post_content' . $currentLanguage;
?>
<div class="container">
    <div class="row">
        <div class="col-sm-12 margin-top-normal margin-bottom-normal">
            <!-- START SIDEBAR -->
            <div class="col-sm-12" style="background:url({{ HTTP_COMPANY_PATH }}post_bg.png);padding: 25px 0 10px 0;background-repeat: no-repeat; background-size: cover;">
                <div class="col-sm-2"></div>
                <div class="col-sm-3">
                    <div class="row">
                        <div class="form-group">
                            <div class="input-icon">
                                <i class="fa fa-pencil" style="margin-top:16px;"></i>
                                <input type="text" class="form-control input-lg input-circle custom-typeahead" id="js-cat-keyword" placeholder="{{ $langLbl['Enter Keyword'] }}" value="{{ Session::get('post_keyword') }}">
                            </div>
                        </div>		                
                    </div>
                </div>
                <div class="col-sm-2"></div>
                <div class="col-sm-2">
                    <div class="form-group">
                        <button type="button" class="btn green btn-block btn-circle btn-lg" id="js-cat-search">
                            <i class="fa fa-search"></i>
                        </button>
                    </div>
                </div>
                <div class="col-sm-3"></div>
            </div>
            <!-- \ END SIDEBAR -->
            @if (count($posts) > 0) 
            <div class="pull-right" style="margin-top:25px;">{{ $posts->links() }}</div>
            <div class="clearfix"></div>
            <div class="row" style="padding-top:30px;">
                <div class="col-sm-9">
                    @foreach ($posts as $post)
                    <?php
                    if ($post->company_id != 0 && isset($post->company))
                        $company = $post->company;
                    else {
                        $company = new stdClass();
                        $company->slug = 'admin';
                        $company->name = 'Admin';
                    }
                    $name = [];
                    $s = [];
                    $subCategories = $post->subCategories;
                    foreach ($subCategories as $s) {
                        $name[] = $s->Category->$nameVal;
                        $sl[] = $s->Category->slug;
                    }
                    $cat_name = implode(",", $name);
                    $slug = str_replace(" ", "_", $post->slug)
                    ?>
                    <div class="row margin-top-xs">
                        <div class="col-md-4 col-sm-4">
                            <a href="{{ URL::route('post.detail', $slug) }}">
                                <img class="img-responsive img-rounded" alt="" src="{{ HTTP_POST_PATH.$post->featured_image }}" >
                            </a>
                        </div>
                        <div class="col-md-8 col-sm-8">
                            <h3 class="" style="text-transform: uppercase;">
                                <a href="{{ URL::route('post.detail', $slug ) }}">{{ $post->$postTitleVal }}</a>
                            </h3>

                            <ul class="blog-info">
                                <li><span class="color-default"><b><i class="fa fa-user"></i> <a href="{{ URL::route('post.author', $company->slug ) }}">{{ $company->name }}</a></b></span></li>
                                @if($cat_name != '')
                                <li>
                                    <span class="color-default">
                                        <b><i class="fa fa-tags"></i> 
                                            @for($i=0; $i<count($name); $i++)
                                                <a href="{{ URL::route('post.category', $sl[$i] ) }}">{{$name[$i]}}</a>@if($i != count($name)-1),@endif
                                                @endfor
                                        </b>
                                    </span>
                                </li>
                                @endif
                                <li><span class="color-default"><b><i class="fa fa-calendar"></i> {{ $post->created_at }}</b></span></li>
                                <li><span class="color-default"><b><i class="fa fa-comments"></i> {{ $post->comment_count }}</b></span></li>
                            </ul>                        
                            <div class="clearfix"></div>
                            <p>{{ substr($post->$postContentVal, 0, 300) }}</p>
                            <a href="{{ URL::route('post.detail', $post->id ) }}" class="more">{{ $langLbl['Read More'] }} <i class="icon-angle-right"></i></a>                        
                        </div>
                    </div>



                    <div class="row">
                        <div class="col-sm-12">
                            <hr/>
                        </div>
                    </div>
                    @endforeach
                </div>
                <div class="col-sm-3">
                    <h3 style="color:#E02222;"><i class="fa fa-bookmark" style="font-size:23px;"></i> {{ $langLbl['Categories'] }}</h3>
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
            <div class="pull-right">{{ $posts->links() }}</div>
            <div class="clearfix"></div>
            @else
            <div class="note note-info">
                <h4 class="block">{{ $langLbl['The post is empty.'] }}</h4>
            </div>
            @endif
        </div>

    </div>
</div>

<form method="get" action="{{URL::route('post.search')}}" id="post-search-frm">
	<input type="hidden" name="keyword"/>
</form>
@stop

@section('custom-scripts')
{{ HTML::script('/assets/js/bootstrap-tooltip.js') }}
<script>
$(document).ready(function() {
   
});
var categories = [];
@foreach ($postcategory as $key => $value)
    categories[categories.length] = '{{ $value->name }}';
    @foreach ($value->subCategories as $subKey => $subValue)
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
</script>
@stop

@stop