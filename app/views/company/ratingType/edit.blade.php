@extends('company.layout')

@section('breadcrumb')
<div class="row">
    <div class="col-md-12">
        <ul class="page-breadcrumb breadcrumb">
            <li>
                <i class="fa fa-home"></i>
                <span>{{ $langLbl['Rating Type'] }}</span>
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

<div class="portlet box red">
    <div class="portlet-title">
        <div class="caption">
            <i class="fa fa-pencil-square-o"></i> {{ $langLbl['Edit Rating Type'] }}
        </div>
    </div>
    <div class="portlet-body form">
        <form class="form-horizontal form-bordered form-row-stripped" role="form" method="post" action="{{ URL::route('company.ratingType.store') }}">
            <div class="form-body">
                <input type="hidden" name="rating_type_id" value="{{ $ratingType->id }}">   
                @if($siteLanguage)
                @foreach ($siteLanguage as $lkey=>$rvalue)
                <div class="form-group">
                    <label class="col-sm-3 control-label">{{ Form::label('name'.$rvalue, $langLbl['Name'].' ('.$langLbl[$lkey].')') }}</label>
                    <div class="col-sm-9">
                        {{ Form::text('name'.$rvalue, $ratingType->{'name'.$rvalue}, ['class' => 'form-control']) }}
                    </div>
                </div>	
                @endforeach
                @endif          
                @foreach ([
                'is_visible' => $langLbl['Visible'],
                'is_score' => $langLbl['Score'] . '/' . $langLbl['Question'],
                'created_at' => $langLbl['Created At'],
                'updated_at' => $langLbl['Updated At'],
                ] as $key => $value)
                @if ($key == 'created_at' || $key == 'updated_at')
                <div class="form-group">
                    <label class="col-sm-3 control-label">{{ Form::label($key, $value) }}</label>
                    <div class="col-sm-9">
                        <p class="form-control-static">{{ $ratingType->{$key} }}</p>
                    </div>
                </div>
                @elseif ($key == 'is_visible' || $key == 'is_score')
                <div class="form-group">
                    <label class="col-sm-3 control-label">{{ Form::label($key, $value) }}</label>
                    <div class="col-sm-9">
                        <select class="form-control" name="{{ $key }}">
                            <option value=1 {{ $ratingType->{$key} ? 'selected' : '' }}>{{ $key == 'is_score' ? $langLbl['Score'] : $langLbl['Yes'] }}</option>
                            <option value=0 {{ $ratingType->{$key} ? '' : 'selected' }}>{{ $key == 'is_score' ? $langLbl['Question'] : $langLbl['No'] }}</option>
                        </select>
                    </div>
                </div>
                @else
                <div class="form-group">
                    <label class="col-sm-3 control-label">{{ Form::label($key, $value) }}</label>
                    <div class="col-sm-9">
                        {{ Form::text($key, $ratingType->{$key}, ['class' => 'form-control']) }}
                    </div>
                </div>               
                @endif
                @endforeach
            </div>
            <div class="form-actions fluid">
                <div class="col-sm-12 text-center">
                    <button class="btn btn-success">
                        <span class="glyphicon glyphicon-ok-circle"></span> {{ $langLbl['Save'] }}
                    </button>
                    <a href="{{ URL::route('company.ratingType') }}" class="btn btn-primary">
                        <span class="glyphicon glyphicon-share-alt"></span> {{ $langLbl['Back'] }}
                    </a>
                </div>
            </div>
        </form>
    </div>
</div>
@stop

@stop
