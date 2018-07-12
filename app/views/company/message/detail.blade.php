@extends('company.layout')

@section('breadcrumb')
<div class="row">
    <div class="col-md-12">
        <ul class="page-breadcrumb breadcrumb">
            <li>
                <i class="fa fa-home"></i>
                <span>{{ $langLbl['Message'] }}</span>
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

<div class="portlet box red">
    <div class="portlet-title">
        <div class="caption">
            <i class="fa fa-navicon"></i> {{ $langLbl['Message Detail'] }}
        </div>
    </div>
    <div class="portlet-body">
        <form method="post" action="{{ URL::route('company.message.doSend') }}">
            <input type="hidden" name="feedback_id" value="{{ $feedback->id }}"/>
            <div class="row">
                <div class="col-sm-3 text-right">
                    <label class="padding-top-normal">{{ $langLbl['Message'] }} : </label>
                </div>
                <div class="col-sm-8">
                    <textarea class="form-control" name="description" rows="4"></textarea>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-11 text-right margin-top-xs">
                    <button class="btn btn-primary">{{ $langLbl['Send'] }}</button>
                </div>
            </div>
        </form>
        <div class="row">
            <div class="col-sm-12"><hr/></div>
        </div>

        @foreach($feedback->messages as $message)
        <div class="row margin-top-xs">
            <div class="col-sm-3 text-right">
                @if ($message->is_company_sent)
                <span class="color-default"><b>{{ $message->company->name }}</b></span>
                @else
                <b>{{ $message->user->name }}(User) : </b>
                @endif
            </div>
            <div class="col-sm-6">
                {{ $message->description }}
            </div>
            <div class="col-sm-2">
                <span class="color-gray font-size-xs" style="font-style: italic;">{{ $message->created_at }}</span>
            </div>
        </div>        
        @endforeach        
    </div>
</div>

@stop
