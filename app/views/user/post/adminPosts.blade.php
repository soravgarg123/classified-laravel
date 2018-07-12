@extends('user.layout')

@section('main')
<?php
$nameVal = 'name' . $currentLanguage;
$descriptionVal = 'description' . $currentLanguage;
$postTitleVal = 'post_title' . $currentLanguage;
$postContentVal = 'post_content' . $currentLanguage;
?>
<?php $currentLang1 = $_COOKIE['current_lang'];
    $content = "post_content".$currentLang1;
    $title = "post_title".$currentLang1;
?>
<div class="container">
    <div class="row">
        <div class="col-sm-12 margin-top-normal margin-bottom-normal">

            @if (count($wof) > 0) 
            <div class="pull-right" style="margin-top:25px;">{{ $posts->links() }}</div>
            <div class="clearfix"></div>

            <!-- START POST LIST -->
            <div class="row" style="padding-top:30px;">
                <div class="col-sm-9">
                    <div class="posts">
                        @foreach ($wof as $post)
                        <div class="post">

                            <div class="post-image">
                                <img src="{{ HTTP_HOWITWORKS_PATH.$post->image }}">
                                <a class="read-more" href="{{ URL::route('wof.detail', $post->id) }}">{{ $langLbl['View'] }}</a>
                            </div><!-- /.post-image -->

                            <div class="post-content">
                                <h2><a href="{{ URL::route('wof.detail', $post->id) }}">{{ $post->$title }}</a><a></a></h2><a>
                                    <p>{{ substr($post->$content, 0, 300) }} ...</p>
                                </a></div><!-- /.post-content -->
                            <div class="post-meta clearfix">		            
                                <div class="post-meta-date">{{ $post->created_at }}</div><!-- /.post-meta-date -->
                              
                                <div class="post-meta-comments"><i class="fa fa-comments"></i> <a href="blog-detail.html">{{ $post->comment_count }} {{ $langLbl['comments'] }}</a></div><!-- /.post-meta-comments -->
                                <div class="post-meta-more"><a href="{{ URL::route('wof.detail', $post->id) }}">{{ $langLbl['Read More'] }} <i class="fa fa-chevron-right"></i></a></div><!-- /.post-meta-more -->
                            </div><!-- /.post-meta -->
                        </div>

                        @endforeach
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="row">
                        <div class="col-sm-9">
                            <div class="form-group">
                                <div class="input-icon">
                                    <i class="fa fa-pencil" style="margin-top:16px;"></i>
                                    <input type="text" class="form-control input-lg input-circle custom-typeahead" id="js-cat-keyword" placeholder="{{ $langLbl['Enter Keyword'] }}" value="{{ Session::get('prof_keyword') }}">
                                </div>
                            </div>					                	                
                        </div>
                        <div class="col-sm-3">
                            <div class="form-group">
                                <button type="button" class="btn green btn-block btn-circle btn-lg" id="js-cat-search">
                                    <i class="fa fa-search"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <h3 style="color:#E02222;"><i class="fa fa-graduation-cap" style="font-size:20px;"></i> {{ $langLbl['World of Professions'] }}</h3>
                            <ul class="list-unstyled cat-wrapper">
                                @foreach($sideposts as $post)
                                <li><a href="{{ URL::route('post.profdetail', $post->slug)  }}">{{$post->$postTitleVal}} </a></li>
                                @endforeach
                            </ul>
                            <div class="pull-right" style="margin-top:15px;">{{ $sideposts->links() }}</div>
                            <div class="clearfix"></div>
                            </br>
                            <!-- <h3 style="color:#E02222;"><i class="fa fa-book" style="font-size:23px;"></i> {{ $langLbl['Recent Professions'] }}</h3>
                            @foreach($recent_posts as $recent_post)
                            <?php $slug = str_replace(" ", "_", $post->$postTitleVal) ?>
                            <div class="row margin-top-xs">
                                <div class="col-md-4 col-sm-4">
                                    <a href="{{ URL::route('post.profdetail', $recent_post->slug) }}">
                                        <img class="img-responsive" alt="" src="{{ HTTP_POST_PATH.$recent_post->featured_image }}" >
                                    </a>
                                </div>
                                <div class="col-md-8 col-sm-8">
                                    <h3 class="" style="font-size:15px;">
                                        <a href="{{ URL::route('post.profdetail', $recent_post->slug ) }}">{{ $recent_post->$postTitleVal }}</a>
                                    </h3>
                                    <div class="clearfix"></div>
                                    <p>{{ substr($recent_post->$postContentVal, 0, 50) }}</p>					                                             
                                </div>
                            </div>
                            <hr/>
                            @endforeach -->
                        </div>
                    </div>
                </div>
            </div>   
            <!-- END POST LIST -->
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
</script>
@stop

@stop