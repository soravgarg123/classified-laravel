@extends('admin.layout')

@section('breadcrumb')
<div class="row">
    <div class="col-md-12">
        <h3 class="page-title">{{ $langLbl['Company Management'] }}</h3>
        <ul class="page-breadcrumb breadcrumb">
            <li>
                <i class="fa fa-home"></i>
                <span>{{ $langLbl['Company'] }}</span>
                <i class="fa fa-angle-right"></i>
            </li>
            <li>
                <span>{{ $langLbl['Feedback'] }}</span>
            </li>
        </ul>

    </div>
</div>    
@stop

@section('content')

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

<div class="portlet box blue">
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
                    <th>{{ $langLbl['Store'] }}</th>
                    @foreach ($company->ratingTypes as $key => $ratingType)
                    <td class="text-center">
                        <p>{{ $ratingType->name }}</p>
                    </td>
                    @endforeach
                </tr>
            </thead>
            <tbody>
                @foreach ($company->feedbacks(date('Y'), date('m'))->get() as $feedback)
                @if (count($feedback->ratings) > 0)
                <tr>
                    <td rowspan="2">
                        <a href="{{ URL::route('admin.user.edit', $feedback->user->id) }}">{{ $feedback->user->name }}</a>
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
@stop

@stop
