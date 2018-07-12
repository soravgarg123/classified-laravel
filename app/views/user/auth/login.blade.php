@extends('user.layout')
@section('main')
<div class="container">
    <div class="row">
        <div class="col-sm-6 col-sm-offset-3 margin-top-xl margin-bottom-xl">
            <div class="login_form_block">
                <form role="form" method="post" action="{{ URL::route('user.doLogin') }}">
                <input type="hidden" name="redirect" value="{{ $redirect }}" />
                <div class="form-group">
                    <div class="row text-center">
                        <h2 class="text-center text-uppercase">{{ $langLbl['Welcome back!'] }}</h2>
                    </div>
                </div>

                @if (isset($alert))
                <div class="margin-top-lg"></div>
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

                @if ($errors->has())
                <div class="margin-top-lg"></div>
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
                <div class="form-group">
                    <input required type="text" class="form-control input-lg" placeholder="{{ $langLbl['Email Address'] }}" name="email">
                </div>
                <div class="form-group">
                    <input required type="password" class="form-control input-lg" placeholder="{{ $langLbl['Password'] }}" name="password">
                </div>
                <div class="form-group">
                    <select required class="form-control input-lg" name="type">
                        <option value="">{{ $langLbl['Login as'] }}</option>
                        <option value="user">{{ $langLbl['User'] }}</option>
                        <option value="professional">{{ $langLbl['Professional'] }}</option>
                    </select>
                </div>  
                <div class="form-group">
                    <div class="text-center">
                        <p><span style="float:left;"> {{ $langLbl['Remember me'] }} </span><a style="float:right;" href="{{ URL::route('user.forgotpwd') }}">{{ $langLbl['Forgot Password'] }}</a></p></br>
                    </div>
                </div>
                <div class="form-group">
                    <div class="text-right" style="display:inline-block; float:right;width:100%">
                        <button type="submit" class="btn btn-success btn-block btn-lg">
                            {{ $langLbl['Login'] }} <span class="glyphicon glyphicon-ok-circle"></span>
                        </button></br>
                    </div>
                </div>
                <div class="form-group">
                    <div class="text-center">
                        <p><span style="float:left;">{{ $langLbl['Don`t have an account yet?'] }} </span><a style="float:right;" href="{{ URL::route('user.signup') }}">{{ $langLbl['Register'] }}</a></p>
                    </div>
                </div>
                </form>    
            </div>
        </div>
    </div>
</div>
@stop
@stop
