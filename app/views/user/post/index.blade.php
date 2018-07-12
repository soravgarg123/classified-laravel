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

            @if (count($posts) > 0) 
            <div class="pull-right" style="margin-top:25px;">{{ $posts->links() }}</div>
            <div class="clearfix"></div>

            <!-- START POST LIST -->
            <div class="row" style="padding-top:30px;">
                <div class="col-sm-8 col-lg-9">
                    <div class="posts">
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
                        $slug = [];
                        $subCategories = $post->subCategories;
                        foreach ($subCategories as $s) {
                            $name[] = $s->Category->$nameVal;
                            $sl[] = $s->Category->slug;
                        }
                        $cat_name = implode(",", $name);
                        ?>

                        <div class="post">

                            <div class="post-image">
                                <img src="{{ HTTP_POST_PATH.$post->featured_image }}" class="img-responsive thumbnail">
                                <a class="read-more" href="{{ URL::route('post.detail', $post->slug) }}">{{ $langLbl['View'] }}</a>
                            </div><!-- /.post-image -->

                            <div class="post-content">
                                <h2><a href="{{ URL::route('post.detail', $post->slug) }}">{{ $post->$postTitleVal }}</a><a></a></h2><a>
                                    <p>{{ substr($post->$postContentVal, 0, 500) }} ...</p>
                                </a></div><!-- /.post-content -->
                            <div class="post-meta clearfix">
                                <ul class="postmetaul">
                                    <li class="post-meta-author"><a>{{ $langLbl['By']}} </a><a href="{{ URL::route('post.author', $company->slug ) }}">{{ $company->name }}</a></li>
                                    <li class="post-meta-date">{{ $post->created_at }}</li>
                                    <li>
                                        @if($cat_name != '')
                                            <div class="post-meta-categories">
                                                <i class="fa fa-tags"></i> 
                                                @for($i=0; $i<count($name); $i++)
                                                <a href="{{ URL::route('post.category', $sl[$i] ) }}">{{$name[$i]}}</a>@if($i != count($name)-1),@endif
                                                @endfor
                                            </div>
                                        @endif
                                    </li>
                                    <li class="post-meta-comments">
                                        <i class="fa fa-comments"></i> <a href="{{ URL::route('post.detail', $post->slug) }}">{{ $post->comment_count }} {{ $langLbl['comments'] }}</a>
                                    </li>
                                </ul>
                                <nav class="social_links">
                                    <ul>
                                        <?php $currentURL = $_SERVER['REQUEST_SCHEME']."://".$_SERVER['SERVER_NAME']."".$_SERVER['REQUEST_URI']."/".$post->slug; ?>
                                        <li class="fb"><a target="_blank" title="Facebook" href="http://www.facebook.com/sharer.php?u=<?php echo $currentURL; ?>"><span class="fa fa-facebook"></span></a></li>
                                        <li class="gp"><a target="_blank" title="Google Plus" href="https://plus.google.com/share?url=<?php echo $currentURL; ?>"><span class="fa fa-google"></span></a></li>
                                        <li class="tw"><a target="_blank" title="Twitter" href="http://twitter.com/home?status=<?php echo $currentURL; ?>"><span class="fa fa-twitter"></span></a></li>
                                        <li class="pt"><a target="_blank" title="Pinterest" href="https://www.pinterest.com/pin/create/button/?url=<?php echo $currentURL; ?>&description={{ $post->$postContentVal }}&media={{ HTTP_POST_PATH.$post->featured_image }}&title={{ $post->$postTitleVal }}" data-pin-do="buttonPin" data-pin-config="above"><span class="fa fa-pinterest"></span></a></li>
                                    </ul>
                                    <a href="{{ URL::route('post.detail', $post->slug) }}">{{ $langLbl['Read More'] }} <i class="fa fa-chevron-right"></i></a>
                                </nav>
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
                            <h3 style="color:#E02222;"><i class="fa fa-graduation-cap" style="font-size:20px;"></i> {{ $langLbl['World of Professions'] }}</h3>
                            <ul class="list-unstyled cat-wrapper">
                                <li><a href="{{ URL::route('post.professions' ) }}">{{ $langLbl['All posts about Professions'] }} </a>({{$cntAdminPost}})</li>
                            </ul>
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