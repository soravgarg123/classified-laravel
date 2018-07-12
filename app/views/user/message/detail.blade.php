@extends('user.layout')

@section('main')
<div class="container">
    @if (isset($alert))
    <div class="row">
        <div class="col-sm-10 col-sm-offset-1 margin-top-sm margin-bottom-sm">
            <div class="alert alert-{{ $alert['type'] }} alert-dismissibl fade in">
                <button type="button" class="close" data-dismiss="alert">
                    <span aria-hidden="true">&times;</span>
                    <span class="sr-only">{{ $langLbl['Close'] }}</span>
                </button>
                <p>
                    {{ $alert['msg'] }}
                </p>
            </div>
        </div>
    </div>    
    @endif

    <div class="row">
        <div class="col-sm-10 col-sm-offset-1 margin-top-normal margin-bottom-normal">
            <div class="portlet box red margin-top-lg">
                <div class="portlet-title">
                    <div class="caption">
                        {{ $langLbl['Messages'] }}
                    </div>
                </div>
                <div class="portlet-body">
                    <form method="post" action="{{ URL::route('user.message.doSend') }}">
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
                            <span class="color-default"><b>{{ $message->company->name }} ({{ $langLbl['Professional'] }}) : </b></span>
                            @else
                            <b>{{ $langLbl['Me'] }} : </b>
                            @endif
                        </div>
                        <div class="col-sm-6">
                            {{ $message->description }}
                        </div>
                        <div class="col-sm-2">
                            <span class="color-gray font-size-xs" style="font-style: italic; background: #FFF;">{{ $message->created_at }}</span>
                        </div>
                    </div>        
                    @endforeach                         
                </div>
            </div>                         
        </div>
    </div>
</div>
@stop

@stop
