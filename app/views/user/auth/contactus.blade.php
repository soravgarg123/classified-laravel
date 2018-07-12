@extends('user.layout')

@section('main')
<div class="container">
    <div class="row">
        <div class="col-sm-6 col-sm-offset-3 margin-top-xl margin-bottom-xl">
            <form role="form" method="post" action="{{ URL::route('user.docontact') }}">
                <div class="form-group">
                    <div class="row text-center">
                        <p class="form-control-static">
                        </p><h2 class="text-center text-uppercase">{{ $langLbl['Contact Us'] }}</h2>
                        <p></p>
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

                <div class="form-group">
                    <input type="text" class="form-control input-lg" placeholder="{{ $langLbl['Name'] }}" name="name" value="<?php echo Session::get("name"); ?>" >
                </div>

                <div class="form-group">
                    <input type="text" class="form-control input-lg" placeholder="{{ $langLbl['Email Address'] }}" name="email" value="<?php echo Session::get("email"); ?>" >
                </div>

                <div class="form-group">
                    <input type="text" class="form-control input-lg" placeholder="{{ $langLbl['Subject'] }}" name="subject"  >
                </div>
                <div class="form-group">
                    <textarea rows="5" placeholder="{{ $langLbl['Message'] }}" class="form-control input-lg" name="message"></textarea>
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
@stop

@stop
