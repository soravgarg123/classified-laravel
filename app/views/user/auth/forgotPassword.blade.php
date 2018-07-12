@extends('user.layout')

@section('main')
<div class="container">
    <div class="row">
        <div class="col-sm-6 col-sm-offset-3 margin-top-xl margin-bottom-xl">
    <div class="forgot_form_block">
            <form role="form" method="post" action="{{ URL::route('user.sendResetPasswordEmail') }}">
                <div class="form-group">
                    <div class="row text-center">
                        <h2 class="text-center">{{ $langLbl['Did you forgot the password?'] }}</h2>
                        <h4 class="text-center">{{ $langLbl['Enter your email to reset'] }}</h4>
                    </div>
                </div>

                @if ($errors->has())
                <div class="alert alert-danger alert-dismissibl fade in">
                    <button type="button" class="close" data-dismiss="alert">
                        <span aria-hidden="true">&times;</span>
                        <span class="sr-only">{{ $langLbl['Close'] }}</span>
                    </button>
                    @foreach ($errors->all() as $error)
                    <p>{{ $error }}</p>
                    @endforeach
                </div>
                @endif

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

                <div class="form-group">
                    <input type="text" class="form-control input-lg" placeholder="{{ $langLbl['Email Address'] }}" name="email">
                </div>

                <div class="form-group">
                    <div class="text-right">                            
                        <button type="submit" class="btn btn-success btn-block btn-lg">
                            {{ $langLbl['Submit'] }} <span class="glyphicon glyphicon-ok-circle"></span>
                        </button>
                    </div>
                </div>
            </form>  
        </div>  
        </div>
    </div>
</div>
@stop

@stop
