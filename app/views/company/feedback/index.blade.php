@extends('company.layout')

@section('custom-styles')
<style>
    ul#js-ul-status a {
        font-size: 12px;
        padding: 5px 0px 5px 10px;
    }

    ul#js-ul-status {
        width: 130px;
    }

    ul#js-ul-status li {
        width: 130px;
    }
</style>
@stop

@section('breadcrumb')
<div class="row">
    <div class="col-md-12">
        <ul class="page-breadcrumb breadcrumb">
            <li>
                <i class="fa fa-home"></i>
                <span>{{ $langLbl['Feedback'] }}</span>
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

<form class="form-horizontal" method="get" action="{{ URL::route('company.feedback') }}">
    <div class="form-group">
        <label class="col-sm-2 control-label col-sm-offset-1">{{ $langLbl['Store'] }} : </label>
        <div class="col-sm-3">
            <select class="form-control" name="store_id">
                <option value="">{{ $langLbl['All Services'] }}</option>
                @foreach ($company->stores as $value)
                <option value="{{ $value->id }}" {{ ($storeId == $value->id) ? 'selected' : '' }}>{{ $value->name }}</option>
                @endforeach
            </select>        
        </div>
        <label class="col-sm-1 control-label">{{ $langLbl['Period'] }} : </label>
        <div class="col-sm-3">
            <select class="form-control pull-left" name="year" style="width: 100px;">
                <option value="2014" {{ $year == '2014' ? 'selected' : '' }}>2014</option>
                <option value="2015" {{ $year == '2015' ? 'selected' : '' }}>2015</option>
                <option value="2016" {{ $year == '2016' ? 'selected' : '' }}>2016</option>
                <option value="2017" {{ $year == '2017' ? 'selected' : '' }}>2017</option>
                <option value="2018" {{ $year == '2018' ? 'selected' : '' }}>2018</option>
                <option value="2019" {{ $year == '2019' ? 'selected' : '' }}>2019</option>
                <option value="2020" {{ $year == '2020' ? 'selected' : '' }}>2020</option>
            </select>
            <select class="form-control pull-left" name="month" style="width: 80px; margin-left: 5px;">
                <option value="01" {{ $month == '01' ? 'selected' : '' }}>01</option>
                <option value="02" {{ $month == '02' ? 'selected' : '' }}>02</option>
                <option value="03" {{ $month == '03' ? 'selected' : '' }}>03</option>
                <option value="04" {{ $month == '04' ? 'selected' : '' }}>04</option>
                <option value="05" {{ $month == '05' ? 'selected' : '' }}>05</option>
                <option value="06" {{ $month == '06' ? 'selected' : '' }}>06</option>
                <option value="07" {{ $month == '07' ? 'selected' : '' }}>07</option>
                <option value="08" {{ $month == '08' ? 'selected' : '' }}>08</option>
                <option value="09" {{ $month == '09' ? 'selected' : '' }}>09</option>
                <option value="10" {{ $month == '10' ? 'selected' : '' }}>10</option>
                <option value="11" {{ $month == '11' ? 'selected' : '' }}>11</option>
                <option value="12" {{ $month == '12' ? 'selected' : '' }}>12</option>
            </select>
            <div class="clearfix"></div>
        </div>
        <div class="col-sm-2">
            <button class="btn btn-primary" onclick="return onValidate();"><i class="fa fa-search"></i> {{ $langLbl['Search'] }}</button>
        </div>                                
    </div>                        
</form>

@if (isset($store))
<div class="row">
    <div class="col-sm-6">
        <div class="portlet box red">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-navicon"></i> {{ $langLbl['Prev Month'] }}
                </div>
            </div>
            <div class="portlet-body">
                <div class="row">
                    <div class="form-group">
                        <label class="control-label col-sm-8"><b>{{ $langLbl['Total Feedbacks'] }}  :</b></label>
                        <div class="col-sm-4 text-right">{{ $store->periodFeedback($prevYear, $prevMonth)->count() }}</div>
                    </div>
                </div>         
                @foreach ($company->ratingTypes as $key => $ratingType)
                <div class="row">
                    <div class="form-group">
                        <label class="control-label col-sm-8"><b>{{ $ratingType->name }} :</b></label>
                        @if ($ratingType->is_score)
                        <div class="col-sm-4 text-right">{{ $ratingType->getStoreAvgScore($store->id, $prevYear, $prevMonth) }}</div>
                        @else
                        <div class="col-sm-4 text-right">
                            {{ $langLbl['Yes'] }} : {{ $ratingType->getStoreCountAnswer($store->id, $prevYear, $prevMonth, 1) }},
                            {{ $langLbl['No'] }} : {{ $ratingType->getStoreCountAnswer($store->id, $prevYear, $prevMonth, 0) }}
                        </div>
                        @endif
                    </div>
                </div>
                @endforeach            
            </div>
        </div>
    </div> 

    <div class="col-sm-6">
        <div class="portlet box red">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-navicon"></i> {{ $langLbl['Current Month'] }}
                </div>
            </div>
            <div class="portlet-body">
                <div class="row">
                    <div class="form-group">
                        <label class="control-label col-sm-8"><b>{{ $langLbl['Total Feedbacks'] }} :</b></label>
                        <div class="col-sm-4 text-right">{{ $store->periodFeedback($year, $month)->count() }}</div>
                    </div>
                </div>         
                @foreach ($company->ratingTypes as $key => $ratingType)
                <div class="row">
                    <div class="form-group">
                        <label class="control-label col-sm-8"><b>{{ $ratingType->name }} :</b></label>
                        @if ($ratingType->is_score)
                        <div class="col-sm-4 text-right">{{ $ratingType->getStoreAvgScore($store->id, $year, $month) }}</div>
                        @else
                        <div class="col-sm-4 text-right">
                            {{ $langLbl['Yes'] }} : {{ $ratingType->getStoreCountAnswer($store->id, $year, $month, 1) }},
                            {{ $langLbl['No'] }} : {{ $ratingType->getStoreCountAnswer($store->id, $year, $month, 0) }}
                        </div>
                        @endif
                    </div>
                </div>
                @endforeach            
            </div>
        </div>
    </div>    
</div>

<div class="portlet box red">
    <div class="portlet-title">
        <div class="caption">
            <i class="fa fa-navicon"></i> {{ $langLbl['Feedback List'] }}
        </div>
    </div>
    <div class="portlet-body">
        <table class="table table-hover">
            <thead>
                <tr>
                    <th style="width: 120px;"></th>
                    @foreach ($company->ratingTypes as $key => $ratingType)
                    <td class="text-center">
                        <p>{{ $ratingType->name }}</p>
                    </td>
                    @endforeach
                    <td>{{ $langLbl['Status'] }}</td>
                </tr>
            </thead>
            <tbody>
                @foreach ($store->periodFeedback($year, $month)->get() as $feedback)
                @if (count($feedback->ratings) > 0)
                <tr>
                    <td rowspan="2">
                        <a href="{{ URL::route('company.user.detail', $feedback->user->id) }}">{{ $feedback->user->name }}</a>
                        <p class="margin-top-xs">
                            <i class="fa fa-clock-o"></i>&nbsp;{{ date(DATE_FORMAT, strtotime($feedback->created_at)) }}
                        </p>
                    </td>
                    @foreach ($company->ratingTypes as $key => $ratingType)
                    <td>
                        @if ($ratingType->is_score)
                        <input id="js-number-rating" data-symbol="&#8226;" type="number" class="rating" min=0 max=5 step=1 data-show-clear=false data-show-caption=false data-size='xs' value="{{ $feedback->getTypeScore($ratingType->id) }}" readonly=true>
                        @else
                        {{ $feedback->getTypeScore($ratingType->id) == -1 ? '--' : ($feedback->getTypeScore($ratingType->id) == 1 ? 'Yes' : 'No')}}
                        @endif                                
                    </td>
                    @endforeach
                    <td>
                        <div class="btn-group">
                            <button class="btn btn-default btn-sm dropdown-toggle" type="button" data-toggle="dropdown" id="js-btn-status">
                                {{ $statuses[$feedback->status] }} <i class="fa fa-angle-down"></i>
                            </button>
                            <ul class="dropdown-menu" role="menu" id="js-ul-status">
                                @foreach ($statuses as $key => $value)
                                <li><a href="{{ URL::route('company.feedback.changeStatus', array($feedback->id, $key)) }}">{{ $value }}</a></li>
                                @endforeach
                            </ul>
                        </div>                    
                    </td>
                </tr>
                <tr>
                    <td colspan="{{ count($company->ratingTypes) + 1 }}" style="border-top: none; padding-top: 0px; padding-bottom: 5px;"><i>{{ $feedback->description }}</i></td>
                </tr>
                @endif
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@else
<div class="row">
    <div class="col-sm-6">
        <div class="portlet box red">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-navicon"></i> {{ $langLbl['Prev Month'] }}
                </div>
            </div>
            <div class="portlet-body">
                <div class="row">
                    <div class="form-group">
                        <label class="control-label col-sm-8"><b>{{ $langLbl['Total Feedbacks'] }} :</b></label>
                        <div class="col-sm-4 text-right">{{ $company->feedbacks($prevYear, $prevMonth)->count() }}</div>
                    </div>
                </div>      
                @foreach ($company->ratingTypes as $key => $ratingType)
                <div class="row">
                    <div class="form-group">
                        <label class="control-label col-sm-8"><b>{{ $ratingType->name }} :</b></label>
                        @if ($ratingType->is_score)
                        <div class="col-sm-4 text-right">{{ $ratingType->getCompanyAvgScore($prevYear, $prevMonth) }}</div>
                        @else
                        <div class="col-sm-4 text-right">
                            {{ $langLbl['Yes'] }} : {{ $ratingType->getCompanyCountAnswer($prevYear, $prevMonth, 1) }},
                            {{ $langLbl['No'] }} : {{ $ratingType->getCompanyCountAnswer($prevYear, $prevMonth, 0) }}
                        </div>
                        @endif
                    </div>
                </div>
                @endforeach            
            </div>
        </div>
    </div> 

    <div class="col-sm-6">
        <div class="portlet box red">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-navicon"></i> {{ $langLbl['Current Month'] }}
                </div>
            </div>
            <div class="portlet-body">         
                <div class="row">
                    <div class="form-group">
                        <label class="control-label col-sm-8"><b>{{ $langLbl['Total Feedbacks'] }} :</b></label>
                        <div class="col-sm-4 text-right">{{ $company->feedbacks($year, $month)->count() }}</div>
                    </div>
                </div>            
                @foreach ($company->ratingTypes as $key => $ratingType)
                <div class="row">
                    <div class="form-group">
                        <label class="control-label col-sm-8"><b>{{ $ratingType->name }} :</b></label>
                        @if ($ratingType->is_score)
                        <div class="col-sm-4 text-right">{{ $ratingType->getCompanyAvgScore($year, $month) }}</div>
                        @else
                        <div class="col-sm-4 text-right">
                            {{ $langLbl['Yes'] }} : {{ $ratingType->getCompanyCountAnswer($year, $month, 1) }},
                            {{ $langLbl['No'] }} : {{ $ratingType->getCompanyCountAnswer($year, $month, 0) }}
                        </div>
                        @endif
                    </div>
                </div>
                @endforeach            
            </div>
        </div>
    </div>    
</div>

<div class="portlet box red">
    <div class="portlet-title">
        <div class="caption">
            <i class="fa fa-navicon"></i> {{ $langLbl['Feedback List'] }}
        </div>
    </div>
    <div class="portlet-body">
        <table class="table table-hover">
            <thead>
                <tr>
                    <th style="width: 120px;">{{ $langLbl['Consumer'] }}</th>
                    <th>Store</th>
                    @foreach ($company->ratingTypes as $key => $ratingType)
                    <td class="text-center">
                        <p>{{ $ratingType->name }}</p>
                    </td>
                    @endforeach
                    <td>{{ $langLbl['Status'] }}</td>
                </tr>
            </thead>
            <tbody>
                @foreach ($company->feedbacks($year, $month)->get() as $feedback)
                @if (count($feedback->ratings) > 0)
                <tr>
                    <td rowspan="2">
                        <a href="{{ URL::route('company.user.detail', $feedback->user->id) }}">{{ $feedback->user->name }}</a>
                        <p class="margin-top-xs">
                            <i class="fa fa-clock-o"></i>&nbsp;{{ date(DATE_FORMAT, strtotime($feedback->created_at)) }}
                        </p>
                    </td>
                    <td>{{ $feedback->store->name }}</td>
                    @foreach ($company->ratingTypes as $key => $ratingType)
                    <td>
                        @if ($ratingType->is_score)
                        <input id="js-number-rating" data-symbol="&#8226;" type="number" class="rating" min=0 max=5 step=1 data-show-clear=false data-show-caption=false data-size='xs' value="{{ $feedback->getTypeScore($ratingType->id) }}" readonly=true>
                        @else
                        {{ $feedback->getTypeScore($ratingType->id) == -1 ? '--' : ($feedback->getTypeScore($ratingType->id) == 1 ? 'Yes' : 'No')}}
                        @endif                                
                    </td>
                    @endforeach
                    <td>
                        <div class="btn-group">
                            <button class="btn btn-default btn-xs dropdown-toggle" type="button" data-toggle="dropdown" id="js-btn-status">
                                {{ $statuses[$feedback->status] }} <i class="fa fa-angle-down"></i>
                            </button>
                            <ul class="dropdown-menu" role="menu" id="js-ul-status">
                                <li><a href="{{ URL::route('company.message.detail', $feedback->id) }}"><b>Send Message</b></a></li>
                                @foreach ($statuses as $key => $value)
                                <li><a href="{{ URL::route('company.feedback.changeStatus', array($feedback->id, $key)) }}">{{ $value }}</a></li>
                                @endforeach
                            </ul>
                        </div>                    
                    </td>
                </tr>
                <tr>
                    <td colspan="{{ count($company->ratingTypes) + 1 }}" style="border-top: none; padding-top: 0px; padding-bottom: 5px;"><i>{{ $feedback->description }}</i></td>
                </tr>
                @endif
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endif    

@stop

@section('custom-scripts')
<script>
    $(document).ready(function() {
        $("button#js-btn-status").click(function() {
            if ($(this).next().css("display") == "block") {
                $(this).next().css("display", "none");
            } else {
                $(this).next().css("display", "block");
            }
        });
    });
    $(document).click(function() {
        $("ul#js-ul-status").css("display", "none");
    });
</script>
@stop

@stop
