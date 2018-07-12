@extends('user.layout')

@section('main')
<div class="container">
    <div class="row">
        <div class="col-sm-6 col-sm-offset-3 margin-top-xl margin-bottom-xl">
            <form role="form" method="post" action="{{ URL::route('user.doResetPassword', $slug) }}">
                <div class="form-group">
                    <div class="row text-center">
                        <p class="form-control-static">
                        <h2 class="text-center">{{ $langLbl['Reset Your Password'] }}</h2>
                        </p>
                        <p class="form-control-static">
                        <h4 class="text-center">{{ $langLbl['Enter New Password'] }}</h4>
                        </p>
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

                <div class="margin-top-lg"></div>
                <div class="form-group">
                    <label class="control-label">{{ $langLbl['Password'] }}</label>
                    <input type="password" class="form-control input-lg" placeholder="{{ $langLbl['Password'] }}" name="password">
                </div>

                <div class="margin-top-lg"></div>
                <div class="form-group">
                    <div class="text-right">                            
                        <button type="submit" class="btn green btn-lg">
                            {{ $langLbl['Submit'] }} <span class="glyphicon glyphicon-ok-circle"></span>
                        </button>
                    </div>
                </div>
                <div class="margin-top-lg"></div>
            </form>    
        </div>
    </div>
</div>
@stop

@stop
