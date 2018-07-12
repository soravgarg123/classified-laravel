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
                        <a href="{{ URL::route('request.detail', $r->request_id) }}" target="_blank">{{ $r->title }}</a></h3>
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
                        <li>
                        <div class="dropdown">
                            <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">{{ $status }}
                            <span class="caret"></span></button>
                            <ul class="dropdown-menu">
                              <li><a id="js-a-delete" href="{{ URL::route('user.request.status', $r->request_id) }}/{{ $change_status_val1 }}">{{ $option1 }}</a></li>
                              <li><a id="js-a-delete" href="{{ URL::route('user.request.status', $r->request_id) }}/{{ $change_status_val2 }}">{{ $option2 }}</a></li>
                              <li><a id="js-a-delete" href="{{ URL::route('user.request.delete', $r->request_id) }}">{{ $langLbl['Delete'] }}</a></li>
                            </ul>
                        </div>
                        </li>
                    </ul>                        
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <hr/>
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
@stop

@stop
