@extends('widget.layout')

@section('main')
<div class="margin-top-sm margin-bottom-sm container">
    <form method="post" action="{{ URL::route('widget.embed.doLogin', $store->token) }}">
        <div class="row">
            <?php if (isset($alert)) { ?>
                <div class="col-sm-12 margin-top-normal">
                    <div class="alert alert-<?php echo $alert['type']; ?> alert-dismissibl fade in">
                        <button type="button" class="close" data-dismiss="alert">
                            <span aria-hidden="true">&times;</span>
                            <span class="sr-only">{{ $langLbl['Close'] }}</span>
                        </button>
                        <p><?php echo $alert['msg']; ?></p>
                    </div>
                </div>
            <?php } ?>        

            <div class="col-sm-12 margin-top-lg">
                <div class="form-group">
                    <label class="control-label">{{ $langLbl['Email'] }} *</label>
                    <input type="email" class="form-control input-lg" placeholder="{{ $langLbl['Email Address'] }}" name="email">
                </div>
            </div>

            <div class="col-sm-12 margin-top-sm">
                <div class="form-group">
                    <label class="control-label">{{ $langLbl['Password'] }} *</label>
                    <input type="password" class="form-control input-lg" placeholder="{{ $langLbl['Password'] }}" name="password">
                </div>
            </div>

            <div class="col-sm-12 margin-top-sm">
                <div class="form-group">
                    <button class="btn btn-primary btn-block btn-lg"><i class="fa fa-sign-in"></i> {{ $langLbl['Login'] }}</button>
                </div>
            </div>                        
        </div>
    </form>
</div>
@stop

@stop
