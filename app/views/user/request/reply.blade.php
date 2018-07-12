@extends('user.layout')

@section('main')
<?php
$nameVal = 'name' . $currentLanguage;
$descriptionVal = 'description' . $currentLanguage;
?>
<div class="container">
    <div class="row">
        <div class="col-sm-12 margin-top-normal margin-bottom-normal">
            @if (count($requests) > 0) 
            <div class="clearfix"></div>
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
            <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
            @foreach ($requests as $r)
            <div class="row margin-top-xs">
                <div class="col-md-12 col-sm-12">
                    <h3 class="">
                        <a href="{{ URL::route('request.detail', $r->request_id) }}">{{ $r->title }}</a></h3>
                        <p style="text-align:justify;">{{ $r->request_description }}</p>
                        <?php
                            switch($r->status){
                                case "0":
                                    $status = $langLbl['Closed']; // 0
                                    $option1 = $langLbl['Re-Open']; // 1
                                    $option2 = $langLbl['Pause']; // 2
                                    $change_status_val1 = 1;
                                    $change_status_val2 = 2;
                                    break;
                                case "1":
                                    $status =  $langLbl['Re-Open'];
                                    $option1 = $langLbl['Closed'];
                                    $option2 = $langLbl['Pause'];
                                    $change_status_val1 = 0;
                                    $change_status_val2 = 2;
                                    break;
                                case "2":
                                    $status =  $langLbl['Pause'];
                                    $option1 = $langLbl['Re-Open'];
                                    $option2 = $langLbl['Closed'];
                                    $change_status_val1 = 1;
                                    $change_status_val2 = 0;
                                    break;
                                default:
                                    $status =  $langLbl['None'];
                                    $option1 = $langLbl['None'];
                                    $option2 = $langLbl['None'];
                                    $change_status_val1 = 0;
                                    $change_status_val2 = 0;
                             }
                        ?> 
                        <span class="label label-sm">{{ $status }}</span>
                    <div class="clearfix"></div>
                    <ul class="blog-info">
                        <li><span class="color-default" title="{{ $langLbl['Category'] }}"><b><i class="fa fa-check"></i> {{ $r->name }}</b></span></li>
                        <li><span class="color-default" title="{{ $langLbl['Budget'] }}"><b><i class="fa fa-gbp"></i> {{ $r->budget }}</b></span></li>
                        <li><span class="color-default" title="{{ $langLbl['Expiring Date'] }}"><b><i class="fa fa-calendar"></i> {{ $r->expiry_date }}</b></span></li>
                        @if($r->file)
                            <li><span class="color-default" title="{{ $langLbl['Attachement'] }}"><b><a href="{{ HTTP_HOWITWORKS_PATH.$r->file }}" target="_blank" style="color:#E6400C !important"><i class="fa fa-paperclip"></i>{{ $langLbl['Attachement'] }}</b></a></span></li>                      
                        @endif
                        <li><span class="color-default" title="{{ $langLbl['Current Status'] }}"><b><i class="fa fa-check"></i> {{ $status }}</b></span></li>
                    </ul>                        
                </div>
            </div>
            <div class="row">
                <div class="col-sm-8">
                   <div class="post-comment padding-top-40">
                        <h3>{{ $langLbl['Leave a Reply'] }}</h3>
                        <form role="form" method="post">                                    
                            <div class="form-group">
                                <input type="hidden" value="{{ $r->request_id }}" id="request_id">
                                <label>{{ $langLbl['Message'] }}</label>
                                <textarea class="form-control" maxlength="300" rows="4" id="request_reply_area"></textarea>
                                <span id="char_count" style="float:right;">300 {{ $langLbl['characters left'] }}</span>
                            </div>
                            <p><button class="btn btn-primary" type="button" id="reply-btn">{{ $langLbl['Submit'] }}</button></p>
                        </form>
                    </div>                      
                </div>
            </div>
            @endforeach
            <div class="clearfix"></div>
            @else
            <div class="note note-info">
                <h4 class="block">{{$langLbl['No Requests Found'] }}</h4>
            </div>
            @endif
        </div>
    </div>
</div>
@stop
@section('custom-scripts')
{{ HTML::script('/assets/js/bootstrap-tooltip.js') }}
<script type="text/javascript">
    $(document).ready(function(){
        $('body').on('keyup','#request_reply_area',function(){
            var msg_val = $('#request_reply_area').val();
            var msgLength = parseInt(msg_val.length);
            var remainingLength = 300 - msgLength + " {{ $langLbl['characters left'] }}";
            $('span#char_count').html(remainingLength);
        });
    });
</script>

<!-- Post Request Reply Script Start --> 

<script type="text/javascript">
    $(document).ready(function(){
        $('body').on('click','#reply-btn',function(){
            var msg = $('#request_reply_area').val();  
            var request_id = $('#request_id').val();
            if(msg == ""){
                bootbox.alert("{{ $langLbl['Please fill message field !'] }}");
                window.setTimeout(function(){
                    bootbox.hideAll();
                }, 4000);
                return false;
            }
            $('#reply-btn').text('loading ..').attr('disabled',true);
            $.ajax({
                url: "{{ URL::route('request.doReply') }}",
                type: "post",
                data:{msg:msg,request_id:request_id},
                dateType:"json",
                success:function(data){
                    if(data.result == "success"){
                        $('#request_reply_area').val("");
                        bootbox.alert(data.msg);
                            window.setTimeout(function(){
                            bootbox.hideAll();
                        }, 4000);
                    }else{
                        bootbox.alert(data.msg);
                            window.setTimeout(function(){
                            bootbox.hideAll();
                        }, 4000);
                    }
                    $('#reply-btn').text("{{ $langLbl['Submit'] }}").attr('disabled',false);

                },
                error:function(error){
                    console.log(error);
                    $('#reply-btn').text("{{ $langLbl['Submit'] }}").attr('disabled',false);
                    bootbox.alert("{{ $langLbl['Something wrong please try again !'] }}");
                        window.setTimeout(function(){
                        bootbox.hideAll();
                    }, 4000);
                }
            });
        });
    });
</script>

<!-- Post Request Reply Script End --> 
@stop

@stop
