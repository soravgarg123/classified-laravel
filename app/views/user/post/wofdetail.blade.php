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
<?php $currentLang1 = $_COOKIE['current_lang'];
    $content = "post_content".$currentLang1;
    $title = "post_title".$currentLang1;
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
                            <div class="col-sm-8  blog-item">
                                <p>
                                    <img class="img-responsive img-rounded" alt="" src="{{ HTTP_HOWITWORKS_PATH.$post->image }}">
                                </p>
                                </hr>
                                <h2 class="color-default" style="text-transform: uppercase;">{{ $post->$title }}</h2>

                                <div class="clearfix"></div>
                               
                                <p>
                                    {{ $post->$content }}
                                </p>
                                <!-- START COMMENT -->
                                <div class="post-comment padding-top-40">
                                    <h3>{{ $langLbl['Leave a Comment'] }}</h3>
                                    <form role="form">				                      
                                        <div class="form-group">
                                            <label>{{ $langLbl['Message'] }}</label>
                                            <textarea class="form-control" rows="8" id="message"></textarea>
                                        </div>
                                        <p><button class="btn btn-primary" type="button" id="cmt_btn" onclick="return postComment(0)">{{ $langLbl['Post a Comment'] }}</button></p>
                                    </form>
                                </div>                      
                                <!-- END COMMENT -->
                            </div>
                            <!-- START SIDEBAR -->
                            <div class="col-sm-4">
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
                                            <li><a href="{{ URL::route('post.profdetail', $post->slug)  }}">{{$post->$title}} </a></li>
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
        bootbox.alert("{{ $langLbl['You need to login.'] }}");
        window.setTimeout(function(){
bootbox.hideAll();
}, 2000);
        return false;
        @endif
        if (parent_id != 0 && jQuery('.active_reply').val() == ''){
bootbox.alert("{{ $langLbl['Please leave your comment.'] }}");
        window.setTimeout(function(){
bootbox.hideAll();
}, 2000);
        return false;
}
if (parent_id == 0 && jQuery('#message').val() == ''){
bootbox.alert('Please leave a message.');
        window.setTimeout(function(){
bootbox.hideAll();
}, 2000);
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
bootbox.alert(data.msg);
        window.setTimeout(function(){
bootbox.hideAll();
}, 2000);
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
</script>
@stop

@stop