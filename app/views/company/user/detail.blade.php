@extends('company.layout')

@section('custom-styles')
{{ HTML::style('/assets/metronic/global/plugins/typeahead/typeahead.css') }}
@stop

@section('breadcrumb')
<div class="row">
    <div class="col-md-12">
        <ul class="page-breadcrumb breadcrumb">
            <li>
                <i class="fa fa-home"></i>
                <span>{{ $langLbl['Consumer'] }}</span>
                <i class="fa fa-angle-right"></i>
            </li>
            <li>
                <span>{{ $langLbl['Detail'] }}</span>
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
            <i class="fa fa-navicon"></i> {{ $langLbl['Consumer Detail'] }}
        </div>
        <div class="actions">		    
            <button class="btn btn-default btn-sm" id="js-btn-add-stamp" data-user="{{ $user->id }}">
                <i class="fa fa-plus"></i>&nbsp;{{ $langLbl['Stamp'] }}
            </button>
        </div>		
    </div>
    <div class="portlet-body form">
        <div class="form-horizontal" >
            <div class="form-body">
                @if($siteLanguage)
                @foreach ($siteLanguage as $lkey=>$rvalue)
                <div class="form-group">
                    <label class="col-sm-3 control-label">{{ Form::label('name'.$rvalue, $langLbl['Name'].' ('.$langLbl[$lkey].')') }}</label>
                    <div class="col-sm-9">
                        {{ Form::text('name'.$rvalue, $user->{'name'.$rvalue}, ['class' => 'form-control']) }}
                    </div>
                </div>	
                @endforeach
                @endif 

                @if ($company->plan_id != '')
                <div class="form-group">
                    <label class="col-sm-2 control-label"><b>{{ $langLbl['Email'] }} : </b></label>
                    <div class="col-sm-4">
                        <p class="form-control-static">{{ $user->email }}</p>
                    </div>                

                    <label class="col-sm-2 control-label"><b>{{ $langLbl['Phone'] }} : </b></label>
                    <div class="col-sm-4">
                        <p class="form-control-static">{{ $user->phone }}</p>
                    </div>
                </div>
                @endif

                <div class="form-group">
                    <label class="col-sm-2 control-label"><b>{{ $langLbl['Visits'] }} : </b></label>
                    <div class="col-sm-4">
                        <p class="form-control-static">{{ $consumer->count_visit }}</p>
                    </div>

                    <label class="col-sm-2 control-label"><b>{{ $langLbl['Stamps'] }} : </b></label>
                    <div class="col-sm-4">
                        <p class="form-control-static">{{ $consumer->count_stamp }}</p>
                    </div>
                </div>                
            </div>
        </div>
    </div>
</div>

<div class="portlet box red margin-top-lg">
    <div class="portlet-title">
        <div class="caption">
            {{ $langLbl['Consumer Offers'] }}
        </div>
    </div>
    <div class="portlet-body">
        <table class="table table-striped table-hover">
            <tbody>
                @foreach ($userOffers as $key => $value)
                <tr>
                    <td style="line-height: 40px;" class="text-center"><span class="badge badge-danger">{{ $key + 1 }}</span></td>
                    <td>
                        <div class="pull-left">
                            <img src="{{ HTTP_OFFER_PATH.$value->offer->photo}}" style="height: 40px;">
                        </div>
                        <div class="pull-left" style="margin-left: 10px;">
                            <div><b>{{ $value->offer->name }}</b></div>
                            <div class="font-size-sm"><i>{{ $value->offer->description }}</i></div>                                        
                        </div>
                        <div class="clearfix"></div>
                    </td>
                    <td style="line-height: 40px;" class="text-center">
                        <h3>{{ $value->code }}</h3>
                    </td>
                    <td style="line-height: 40px;" class="text-center">
                        <h4 class="color-default">{{ !$value->offer->is_review ? $value->offer->price.'&euro;' : $langLbl['By Activity'] }}</h4>
                    </td>
                    <td style="line-height: 40px;" class="text-center">
                        <div><i>{{ "Get At : ".$value->created_at }}</i></div>
                    </td>
                    <td style="line-height: 40px;" class="text-center">
                        <a href="{{ URL::route('company.user.useOffer', array($value->id, $visit->id)) }}" class="btn blue btn-sm"><i class="fa fa-heart"></i>&nbsp;{{ $langLbl['Use Offer'] }}</a>
                    </td>
                </tr>
                @endforeach

                @if (count($userOffers) == 0)
                <tr>
                    <td>{{ $langLbl['There is no offers'] }}</td>
                </tr>
                @endif
            </tbody>
        </table>    
    </div>
</div>

<div class="portlet box red margin-top-lg">
    <div class="portlet-title">
        <div class="caption">
            {{ $langLbl['Available Loyalties'] }}
        </div>
    </div>
    <div class="portlet-body">
        <table class="table table-striped table-hover">
            <tbody>
                @foreach ($loyalties as $key => $value)
                <tr>
                    <td style="line-height: 40px;" class="text-center"><span class="badge badge-danger">{{ $key + 1 }}</span></td>
                    <td>
                        <div class="pull-left">
                            <img src="{{ HTTP_LOYALTY_PATH.$value->photo }}" style="height: 40px;">
                        </div>
                        <div class="pull-left" style="margin-left: 10px;">
                            <div><b>{{ $value->name }}</b></div>
                            <div class="font-size-sm"><i>{{ $value->description }}</i></div>                                        
                        </div>
                        <div class="clearfix"></div>
                    </td>
                    <td style="line-height: 40px;" class="text-center">
                        <h3 class="color-default">{{ $value->count_visit." ". $langLbl['Stamps Requires'] }}</h3>
                    </td>
                    <td style="line-height: 40px;" class="text-center">
                        <a href="{{ URL::route('company.user.useLoyalty', array($value->id, $visit->id)) }}" class="btn blue btn-sm"><i class="fa fa-heart"></i>&nbsp;{{ $langLbl['Use Loyalty'] }}</a>
                    </td>                    
                </tr>
                @endforeach
                @if (count($loyalties) == 0)
                <tr>
                    <td>{{ $langLbl['There is no available loyalties'] }}</td>
                </tr>
                @endif                
            </tbody>
        </table>    
    </div>
</div>

<div class="portlet box red margin-top-lg">
    <div class="portlet-title">
        <div class="caption">
            {{ $langLbl['Provided Feedbacks'] }}
        </div>
    </div>
    <div class="portlet-body">
        <table class="table table-hover">
            <thead>
                <tr>
                    <th>{{ $langLbl['Store Name'] }}</th>
                    @foreach ($company->ratingTypes as $ratingType)
                    <th class="text-center">{{ $ratingType->name }}</th>
                    @endforeach
                </tr>
            </thead>
            <tbody>
                @foreach ($company->stores as $store)
                <tr>
                    @foreach ($store->providedFeedbacks($user->id)->get() as $feedback)
                    <td class="text-center">
                        {{ $store->name }}
                    </td>                
                    @foreach ($feedback->ratings as $rating)
                    <td class="text-center">
                        @if ($rating->type->is_score)
                        <input id="js-number-rating" data-symbol="&#8226;" type="number" class="rating" min=0 max=5 step=1 data-show-clear=false data-show-caption=false data-size='xs' value="{{ $feedback->getTypeScore($rating->type_id) }}" readonly=true>
                        @else
                        {{ $feedback->getTypeScore($rating->type_id) == -1 ? '--' : ($feedback->getTypeScore($rating->type_id) == 1 ? $langLbl['Yes'] : $langLbl['No'])}}
                        @endif
                    </td>
                    @endforeach
                    @endforeach            
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

@stop

@section('custom-scripts')
<script>
    $(document).ready(function() {
        $("button#js-btn-add-stamp").click(function() {
            $.ajax({
                url: "{{ URL::route('async.company.stamp.add') }}",
                dataType: "json",
                type: "POST",
                data: {user_id: $(this).attr('data-user')},
                success: function(data) {
                    bootbox.alert(data.msg);
                    window.setTimeout(function() {
                        bootbox.hideAll();
                    }, 2000);
                }
            });
        });
    });
</script>
@stop

@stop
