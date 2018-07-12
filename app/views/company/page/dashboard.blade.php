@extends('company.layout')

@section('custom-styles')
{{ HTML::style('/assets/metronic/global/plugins/bootstrap-datepicker/css/datepicker3.css') }}
@stop

@section('breadcrumb')
<div class="row">
    <div class="col-md-12">
        <ul class="page-breadcrumb breadcrumb">
            <li>
                <i class="fa fa-home"></i>
                <span>{{ $langLbl['Dashboard'] }}</span>
            </li>
        </ul>
    </div>
</div>
@stop

@section('content')
<div class="row">
    <div class="col-sm-12">
        <form class="form-horizontal" method="get" action="{{ URL::route('company.dashboard') }}">
            <div class="form-group">
                <label class="col-sm-2 control-label">{{ $langLbl['Period'] }} : </label>
                <div class="col-sm-2">
                    <input type="text" class="form-control text-center" name="startDate" id="js-text-start-date" placeholder="{{ $langLbl['Start Date'] }}" value="{{ $startDate }}">
                </div>
                <div class="col-sm-2">
                    <input type="text" class="form-control text-center" name="endDate" id="js-text-end-date" placeholder="{{ $langLbl['End Date'] }}" value="{{ $endDate }}">
                </div>
                <div class="col-sm-2">
                    <button class="btn btn-primary" onclick="return onValidate();"><i class="fa fa-search"></i> {{ $langLbl['Search'] }}</button>
                </div>
                <div class="col-sm-1">
                    &nbsp;
                </div>                                
                <div class="col-sm-3">
                    <select class="form-control" id="js-select-period">
                        <option value="0">{{ $langLbl['Select Period'] }}</option>
                        <option value="3">{{ $langLbl['Last 3 days'] }}</option>
                        <option value="7">{{ $langLbl['Last 1 week'] }}</option>
                        <option value="30">{{ $langLbl['Last 1 month'] }}</option>
                        <option value="60">{{ $langLbl['Last 2 months'] }}</option>
                        <option value="90">{{ $langLbl['Last 3 months'] }}</option>
                        <option value="180">{{ $langLbl['Last 6 months'] }}</option>
                        <option value="365">{{ $langLbl['Last 1 year'] }}</option>
                    </select>
                </div>            
            </div>                        
        </form>
    </div>
</div>
<div class="row">
    <div class="col-sm-12">
        <hr/>
    </div>
</div>    
<div class="row">
    <div class="col-sm-4">
        <div class="dashboard-stat red">
            <div class="visual">
                <i class="icon-diamond"></i>
            </div>
            <div class="details">
                <div class="number">
                    {{ $userOffers->count() }} {{ $langLbl['Sold'] }}
                </div>
                <div class="desc">
                    {{ $langLbl['Sold Offers Count'] }}
                </div>
            </div>
        </div>
    </div>

    <div class="col-sm-4">
        <div class="dashboard-stat red">
            <div class="visual">
                <i class="fa fa-money"></i>
            </div>
            <div class="details">
                <div class="number">
                    <?php
                    $soldRevenue = 0;
                    foreach ($userOffers as $key => $value) {
                        $soldRevenue += $value->offer->price;
                    }
                    ?>
                    {{ $soldRevenue }} &euro;
                </div>
                <div class="desc">
                    {{ $langLbl['Sold Offers Revenue'] }}
                </div>
            </div>
        </div>
    </div>

    <div class="col-sm-4">
        <div class="dashboard-stat red">
            <div class="visual">
                <i class="fa fa-legal"></i>
            </div>
            <div class="details">
                <div class="number">
                    {{ $userLoyalties->count() }} {{ $langLbl['Loyalties'] }}
                </div>
                <div class="desc">
                    {{ $langLbl['Loyalties Uses'] }}
                </div>
            </div>
        </div>
    </div>        
</div> 

<div class="row">
    <div class="col-sm-4">
        <div class="dashboard-stat red">
            <div class="visual">
                <i class="fa fa-smile-o"></i>
            </div>
            <div class="details">
                <div class="number">
                    {{ $feedbacks->count() }} {{ $langLbl['feedbacks'] }}
                </div>
                <div class="desc">
                    {{ $langLbl['Feedbacks Count'] }}
                </div>
            </div>
        </div>
    </div>

    <div class="col-sm-4">
        <div class="dashboard-stat red">
            <div class="visual">
                <i class="fa fa-star"></i>
            </div>
            <div class="details">
                <div class="number">
                    <?php
                    $avg = 0;
                    foreach ($feedbacks as $feedback) {
                        $avg += $feedback->ratings()->avg('answer');
                    }
                    if (count($feedbacks) != 0) {
                        $avg = round($avg / count($feedbacks), 2);
                    } else {
                        $avg = 0;
                    }
                    ?>
                    {{ $avg }}
                </div>
                <div class="desc">
                    {{ $langLbl['Feedbacks Average'] }}
                </div>
            </div>
        </div>
    </div>

    <div class="col-sm-4">
        <div class="dashboard-stat red">
            <div class="visual">
                <i class="fa fa-user"></i>
            </div>
            <div class="details">
                <div class="number">
                    {{ $registers->count() }} {{ $langLbl['Users'] }}
                </div>
                <div class="desc">
                    {{ $langLbl['User Registered'] }}
                </div>
            </div>
        </div>
    </div>         
</div>

@stop

@section('custom-scripts')
{{ HTML::script('/assets/metronic/global/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js') }}
<script>
    function getFormattedDate(date) {
        var year = date.getFullYear();
        var month = (1 + date.getMonth()).toString();
        month = month.length > 1 ? month : '0' + month;
        var day = date.getDate().toString();
        day = day.length > 1 ? day : '0' + day;
        return year + '-' + month + '-' + day;
    }
    $(document).ready(function() {

        $("#js-select-period").change(function() {
            var type = $(this).val();
            var startDate = new Date();
            var endDate = new Date();
            if (type == 0) {
                $("#js-text-start-date").val("");
                $("#js-text-end-date").val("");
            } else if (type == 3) {
                startDate.setDate(startDate.getDate() - 3);
            } else if (type == 7) {
                startDate.setDate(startDate.getDate() - 7);
            } else if (type == 30) {
                startDate.setMonth(startDate.getMonth() - 1);
            } else if (type == 60) {
                startDate.setMonth(startDate.getMonth() - 2);
            } else if (type == 90) {
                startDate.setMonth(startDate.getMonth() - 3);
            } else if (type == 180) {
                startDate.setMonth(startDate.getMonth() - 6);
            } else if (type == 365) {
                startDate.setYear(startDate.getFullYear() - 1);
            }
            $("#js-text-start-date").val(getFormattedDate(startDate));
            $("#js-text-end-date").val(getFormattedDate(endDate));
        });

        $('#js-text-start-date, #js-text-end-date').datepicker({format: 'yyyy-mm-dd'});


        var startDate = $("#js-text-start-date").val();
        var endDate = $("#js-text-end-date").val();
        if (startDate == '' || endDate == '') {
            $("#js-select-period").val(7);
            $("#js-select-period").change();
        }

    });

    function onValidate() {
        if ($('#js-text-start-date').val() > $('#js-text-end-date').val()) {
            bootbox.alert("{{ $langLbl['Select the period correctly.'] }}");
            return;
        }
        return true;
    }
</script>
@stop

@stop
