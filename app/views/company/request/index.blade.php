@extends('company.layout')

@section('breadcrumb')
<div class="row">
    <div class="col-md-12">
        <ul class="page-breadcrumb breadcrumb">
            <li>
                <i class="fa fa-home"></i>
                <span>{{ $langLbl['Requests'] }}</span>
                <i class="fa fa-angle-right"></i>
            </li>
            <li>
                <span>{{ $langLbl['List'] }}</span>
            </li>
        </ul>

    </div>
</div>
@stop

@section('content')
<?php if (isset($alert)) { ?>
    <div class="alert alert-<?php echo $alert['type']; ?> alert-dismissibl fade in">
        <button type="button" class="close" data-dismiss="alert">
            <span aria-hidden="true">&times;</span>
            <span class="sr-only">{{ $langLbl['Close'] }}</span>
        </button>
        <p>
            <?php echo $alert['msg']; ?>
        </p>
    </div>
<?php } ?>

<div class="portlet box red">
    <div class="portlet-title">
        <div class="caption">
            <i class="fa fa-navicon"></i> {{ $langLbl['Requests'] }} {{ $langLbl['List'] }}
        </div>
    </div>
    <div class="portlet-body ">
        <table class="table table-striped table-bordered table-hover">
            <thead>
                <tr>
                    <th>#</th>
                    <th>{{ $langLbl['Request Name'] }} </th>
                    <th>{{ $langLbl['Budget'] }}</th>
                    <th>{{ $langLbl['Expiring Date'] }}</th>
                    <th>{{ $langLbl['View'] }}</th>
                    <th>{{ $langLbl['Status'] }}</th>
                </tr>
            </thead>
            <tbody>
                <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
                <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
                @foreach ($requests as $key => $value)
                <tr>
                    <td>{{ ($key + 1) }}</td>
                    <td>{{ $value->title }}</td>                        
                    <td>&pound; {{ $value->budget }}</td> 
                    <td>{{ $value->expiry_date }}</td> 
                    <td><a href="{{ URL::route('request.detail', $value->id) }}" target="_blank">{{ $langLbl['View'] }}</a></td> 
                    <td>
                        <?php
                            switch($value->status){
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
                            if($value->company_id) { ?>
                            <div class="dropdown">
                                <button class="btn btn-default dropdown-toggle" type="button" data-toggle="dropdown">{{ $status }}
                                <span class="caret"></span></button>
                                <ul class="dropdown-menu">
                                  <li><a id="js-a-delete" href="{{ URL::route('company.request.status', $value->id) }}/{{ $change_status_val1 }}">{{ $option1 }}</a></li>
                                  <li><a id="js-a-delete" href="{{ URL::route('company.request.status', $value->id) }}/{{ $change_status_val2 }}">{{ $option2 }}</a></li>
                                  <li><a id="js-a-delete" href="{{ URL::route('company.request.delete', $value->id) }}">{{ $langLbl['Delete'] }}</a></li>
                                </ul>
                            </div>
                        <?php  } else {
                                echo $status;
                            }
                        ?>
                      
                    </td> 
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

@stop

@stop
