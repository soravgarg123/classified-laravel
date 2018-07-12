@extends('admin.layout')

@section('custom-styles')
{{ HTML::style('/assets/metronic/global/plugins/bootstrap-datepicker/css/datepicker3.css') }}
@stop

@section('breadcrumb')
<div class="row">
    <div class="col-md-12">
        <h3 class="page-title">{{ $langLbl['Offer Management'] }}</h3>
        <ul class="page-breadcrumb breadcrumb">
            <li>
                <i class="fa fa-home"></i>
                <span>{{ $langLbl['Offer'] }}</span>
                <i class="fa fa-angle-right"></i>
            </li>
            <li>
                <span>{{ $langLbl['Edit'] }}</span>
            </li>
        </ul>

    </div>
</div>    
@stop

@section('content')

@if ($errors->has())
<div class="alert alert-danger alert-dismissibl fade in">
    <button type="button" class="close" data-dismiss="alert">
        <span aria-hidden="true">&times;</span>
        <span class="sr-only">{{ $langLbl['Close'] }}</span>
    </button>
    @foreach ($errors->all() as $error)
    {{ $error }}		
    @endforeach
</div>
@endif

<div class="portlet box blue">
    <div class="portlet-title">
        <div class="caption">
            <i class="fa fa-pencil-square-o"></i> {{ $langLbl['Edit Offer'] }}
        </div>
    </div>
    <div class="portlet-body form">
        <form class="form-horizontal form-bordered form-row-stripped" role="form" method="post" action="{{ URL::route('admin.offer.store') }}">
            <input type="hidden" name="offer_id" value="{{ $offer->id }}"/>
            <div class="form-body">            
                @if($siteLanguage)
                @foreach ($siteLanguage as $lkey=>$rvalue)
                <div class="form-group">
                    <label class="col-sm-3 control-label">{{ Form::label('name'.$rvalue, $langLbl['Name'].' ('.$langLbl[$lkey].')') }}</label>
                    <div class="col-sm-9">
                        {{ Form::text('name'.$rvalue, $offer->{'name'.$rvalue}, ['class' => 'form-control']) }}
                    </div>
                </div>	
                @endforeach
                @endif  
                @if($siteLanguage)
                @foreach ($siteLanguage as $lkey=>$rvalue)
                <div class="form-group">
                    <label class="col-sm-3 control-label">{{ Form::label('description'.$rvalue, $langLbl['Description'].' ('.$langLbl[$lkey].')') }}</label>
                    <div class="col-sm-9">
                        {{ Form::text('description'.$rvalue, $offer->{'description'.$rvalue}, ['class' => 'form-control']) }}
                    </div>
                </div>	
                @endforeach
                @endif            
                @foreach ([
                'company_id' => $langLbl['Company'],
                'price' => $langLbl['Price'],
                'expire_at' => $langLbl['Expire At'],
                'received' => $langLbl['Received'],
                ] as $key => $value)
                <div class="form-group">
                    <label class="col-sm-3 control-label">{{ Form::label($key, $value) }}</label>
                    <div class="col-sm-9">
                        @if ($key === 'description')
                        {{ Form::textarea($key, $offer->{$key}, ['class' => 'form-control', 'rows' => 5, ]) }}
                        @elseif ($key === 'company_id')
                        {{ Form::select($key
                        , array('' => $langLbl['Select Company']) + $companies->lists('name', 'id')
                        , $offer->{$key}
                        , array('class' => 'form-control')) }}                        
                        @else
                        {{ Form::text($key, $offer->{$key}, ['class' => 'form-control']) }}
                        @endif
                    </div>
                </div>
                @endforeach
            </div>
            <div class="form-actions fluid">
                <div class="col-sm-12 text-center">
                    <button class="btn btn-success">
                        <span class="glyphicon glyphicon-ok-circle"></span> {{ $langLbl['Save'] }}
                    </button>
                    <a href="{{ URL::route('admin.offer') }}" class="btn btn-primary">
                        <span class="glyphicon glyphicon-share-alt"></span> {{ $langLbl['Back'] }}
                    </a>
                </div>
            </div>            
        </form>
    </div>
</div>
@stop

@section('custom-scripts')
{{ HTML::script('/assets/metronic/global/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js') }}
<script>
    $(document).ready(function() {
        $("input[name='expire_at']").datepicker({format: 'yyyy-mm-dd'});
    });
</script>
@stop

@stop
