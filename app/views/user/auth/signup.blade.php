@extends('user.layout')

@section('main')
<div class="container">
    <div class="row">
        <div class="col-sm-6 col-sm-offset-3 margin-top-xl margin-bottom-xl">
            <div class="signup_form_block">
                <form role="form" method="post" action="{{ URL::route('user.doSignup') }}">
                    <div class="form-group">
                        <div class="row text-center signup_form_heading">
                            <h2 class="text-center text-uppercase">{{ $langLbl['Signup for free'] }}</h2>
                        </div>
                    </div>
                    <?php if (isset($alert)) { ?>
                        <div class="margin-top-lg"></div>
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

                    <!-- <div class="form-group">
                        <input type="text" class="form-control input-lg" placeholder="{{ $langLbl['Name'] }}" name="name" value="<?php echo Session::get("name"); ?>" >
                    </div> -->
                    <div class="form-group">
                        <input type="text" class="form-control input-lg" placeholder="{{ $langLbl['Email Address'] }}" name="email" value="<?php echo Session::get("email"); ?>" >
                    </div>
                    <div class="form-group">
                        <input type="password" class="form-control input-lg" placeholder="{{ $langLbl['Password'] }}" name="password" value="<?php echo Session::get("password"); ?>" >
                    </div>
                    <div class="form-group">
                        <input type="password" class="form-control input-lg" placeholder="{{ $langLbl['Password Confirmation'] }}" name="password_confirmation" value="<?php echo Session::get("password_confirmation"); ?>" >
                    </div>
                    <!-- <div class="form-group">
                        <input type="text" class="form-control input-lg" placeholder="{{ $langLbl['Phone'] }}" name="phone" value="<?php echo Session::get("phone"); ?>" >
                    </div>   --> 
                    <div class="form-group">
                        <select class="form-control input-lg" name="type">
                            <option value="">{{ $langLbl['Register as'] }}</option>
                            <option value="user">{{ $langLbl['User'] }}</option>
                            <option value="professional">{{ $langLbl['Professional'] }}</option>
                        </select>
                    </div>  
                    <div class="form-group">
                        <div class="text-right">
                            <button type="submit" class="btn btn-success btn-block btn-lg">
                                {{ $langLbl['Create account'] }} <span class="glyphicon glyphicon-ok-circle"></span>
                            </button>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="text-center">
                        <p>{{ $langLbl['By registering you confirm that you accept the'] }} </br> <a href="{{ URL::route('user.terms') }}" target="_blank"> {{ $langLbl['Terms & Conditions'] }} </a> {{ $langLbl['and'] }} <a href="{{ URL::route('user.privacy') }}" target="_blank"> {{ $langLbl['Privacy Policy'] }} </a></p>
                        </div>
                    </div>
                </form>    
            </div>
        </div>
    </div>
</div>
@stop

@stop
