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
$descriptionVal = 'description' . $currentLanguage;
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
                            <div class="col-sm-9  blog-item posts post-detail">

                            <div class="rating_social clearfix">
                                <div class="page-title">
                                    <h1 class="color-default" style="text-transform: uppercase;">{{ $post->$postTitleVal }}</h1>
                                </div>
                                
                            </div>
                                <p>
                                    <img class="img-responsive thumbnail" alt="" src="{{ HTTP_POST_PATH.$post->featured_image }}" id="blogs-images">
                                </p>
                                </hr>
                                <p>
                                    <?php
                                    $name = [];
                                    $sl = [];
                                    if ($post->company_id != 0 && isset($post->company))
                                        $company = $post->company;
                                    else {
                                        $company = new stdClass();
                                        $company->slug = 'admin';
                                        $company->name = 'Admin';
                                    }
                                    $subCategories = $post->subCategories;
                                    foreach ($subCategories as $s) {
                                        $name[] = $s->Category->$nameVal;
                                        $sl[] = $s->Category->slug;
                                    }
                                    $cat_name = implode(",", $name);
                                    ?>

                                <div class="post-meta clearfix">
                                    <!-- <div class="post-meta-author"><i class="fa fa-user"></i> <a>{{ $langLbl['By']}} </a><a href="{{ URL::route('post.author', $company->slug ) }}">{{ $company->name }}</a></div><!-- /.post-meta-author --> 
                                    <!-- <div class="post-meta-date"><i class="fa fa-calendar"></i> {{ $post->created_at }}</div><!-- /.post-meta-date --> 
                                    @if($cat_name != '')
                                    <!-- <div class="post-meta-categories"><i class="fa fa-tags"></i> 
                                        @for($i=0; $i<count($name); $i++)
                                            <a href="{{ URL::route('post.category', $sl[$i] ) }}">{{$name[$i]}}</a>@if($i != count($name)-1),@endif
                                            @endfor
                                    </div> -->
                                    <!-- /.post-meta-categories -->
                                    @endif
                                    <!-- <div class="post-meta-comments"><i class="fa fa-comments"></i> <a href="blog-detail.html">{{ $post->comment_count }} {{ $langLbl['comments'] }}</a></div><!-- /.post-meta-comments --> 
                                    <nav class="social_links">
                                    <ul>
                                        <?php $currentURL = $_SERVER['REQUEST_SCHEME']."://".$_SERVER['SERVER_NAME']."".$_SERVER['REQUEST_URI']; ?>
                                        <li class="fb"><a target="_blank" title="Facebook" href="http://www.facebook.com/sharer.php?u=<?php echo $currentURL; ?>"><span class="fa fa-facebook"></span></a></li>
                                        <li class="gp"><a target="_blank" title="Google Plus" href="https://plus.google.com/share?url=<?php echo $currentURL; ?>"><span class="fa fa-google"></span></a></li>
                                        <li class="tw"><a target="_blank" title="Twitter" href="http://twitter.com/home?status=<?php echo $currentURL; ?>"><span class="fa fa-twitter"></span></a></li>
                                        <li class="pt"><a target="_blank" title="Pinterest" href="https://www.pinterest.com/pin/create/button/?url=<?php echo $currentURL; ?>&description={{ $post->$postContentVal }}&media={{ HTTP_POST_PATH.$post->featured_image }}&title={{ $post->$postTitleVal }}" data-pin-do="buttonPin" data-pin-config="above"><span class="fa fa-pinterest"></span></a></li>
                                    </ul>
                                </nav>
                                </div><!-- /.post-meta -->

                                </p>
                                <div class="clearfix"></div>
                                <div class="post-content">
                                    <p class="drop-cap" style="text-align: justify;">
                                        {{ $post->$postContentVal }}
                                    </p>
                                    <!-- <a href="javascript:void(0);" class="read_more_btn">{{ $langLbl['Read More'] }}</a> -->
                                    <!-- <a href="javascript:void(0);" style="display:none;" class="read_less_btn">{{ $langLbl['Read Less'] }}</a> -->
                                </div>

                                <!-- START COMMENT -->
                                <!-- <h2>{{ $langLbl['Comments'] }}</h2>
                                {{ $post->getComments(0,$post->id)}}
                                <div class="post-comment padding-top-40">
                                    <h3>{{ $langLbl['Leave a Comment'] }}</h3>
                                    <form role="form">				                      
                                        <div class="form-group">
                                            <label>{{ $langLbl['Message'] }}</label>
                                            <textarea class="form-control" rows="8" id="message"></textarea>
                                        </div>
                                        <p><button class="btn btn-primary" type="button" id="cmt_btn" onclick="return postComment(0)">{{ $langLbl['Post a Comment'] }}</button></p>
                                    </form>
                                </div>  -->                     
                                <!-- END COMMENT -->
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
                                <?php $slug = str_replace(" ", "_", $post->$postTitleVal) ?>
                                <div class="cards-small">
                                    <div class="card-small">
                                        <div class="card-small-image">
                                            <a href="{{ URL::route('post.detail', $recent_post->slug) }}">
                                                <img class="img-responsive thumbnail" src="{{ HTTP_POST_PATH.$recent_post->featured_image }}">
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

//START CLICK POST COMMENT
function postComment(parent_id){
@if (!Session::has('user_id'))
        alert("{{ $langLbl['You need to login.'] }}");
        return false;
        @endif
        if (parent_id != 0 && jQuery('.active_reply').val() == ''){
        alert("{{ $langLbl['Please leave your comment.'] }}");
        return false;
}
if (parent_id == 0 && jQuery('#message').val() == ''){
        alert("{{ $langLbl['Please leave a message.'] }}");
        return false;
}
if (parent_id != 0) message = jQuery('.active_reply').val();
        if (parent_id == 0) message = jQuery('#message').val();
        var user_id = {{Session::has('user_id') ? Session::get('user_id') : '""'}};
        var post_id = {{$post -> id}};
        $.ajax({
url: "{{ URL::route('async.user.comment') }}",
        dataType : "json",
        type : "POST",
        data : {
message : message,
        user_id : user_id,
        post_id : post_id,
        parent_id:parent_id
},
        success : function(data){
        alert(data.msg);
        window.setTimeout(function(){
            window.location.reload();
        }, 100);
        }
});
}
// \ END CLICK POST COMMENT
//START REPLY TOGGLE
function replyToggle(id){
jQuery('#reply_form_' + id).toggleClass('reply_form');
jQuery('#reply_form_' + id).find('textarea').addClass('active_reply');
}
// \ END REPLY TOGGLE

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

 var desc_height = parseInt($('p.drop-cap').height());
    if(desc_height > 100){
        $('.read_more_btn').show();
        $('.read_less_btn').hide();
        var columnHeight = 100;
        $("#detail_div_blog p").css('height', columnHeight + 'px');
    }else{
        $('.read_more_btn').hide();
        $('.read_less_btn').hide();
    }

$(".read_more_btn").click(function(){
    $('.read_less_btn').show();
    $('.read_more_btn').hide();
    $("p.drop-cap").addClass("para_text");
});
$(".read_less_btn").click(function(){
    $('.read_less_btn').hide();
    $('.read_more_btn').show();
    $("p.drop-cap").removeClass("para_text");
});
</script>
@stop

@stop