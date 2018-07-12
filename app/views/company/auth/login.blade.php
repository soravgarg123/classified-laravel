@extends('company.layout')

@section('custom-styles')
    <style>
    .control-label {
        font-weight: bold;
    }
    .page-container {
        background: #FFF;
    }    
    </style>
@stop

@section('main')
<div class="page-container">
    <div class="page-contect-wrapper">
	    <div class="page-content"> 
            <div class="col-sm-8 col-sm-offset-2 margin-top-normal">
                <form class="form-horizontal" role="form" method="post" action="{{ URL::route('company.auth.doLogin') }}">
                    <div class="form-group">
                        <div class="row text-center">
                            <p class="form-control-static">
                                <h2 class="color-default"><b>{{ $langLbl['Professional Login'] }}</b></h2>
                            </p>
                            <p class="form-control-static">
                                <h3>{{ $langLbl['Please fill the forms'] }}</h3>
                            </p>                            
                        </div>
                    </div>

                    <?php if (isset($alert)) { ?>
                    <div class="form-group">
                        <div class="col-sm-10 col-sm-offset-1">                
                            <div class="alert alert-<?php echo $alert['type'];?> alert-dismissibl fade in">
                                <button type="button" class="close" data-dismiss="alert">
                                    <span aria-hidden="true">&times;</span>
                                    <span class="sr-only">{{ $langLbl['Close'] }}</span>
                                </button>
                                <p>
                                    <?php echo $alert['msg'];?>
                                </p>
                            </div>
                        </div>
                    </div>                
                    <?php } ?>                        

                    <div class="form-group">
                        <label class="col-sm-2 col-sm-offset-1 control-label">{{ $langLbl['Email'] }} *</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control input-lg" placeholder="{{ $langLbl['Email Address'] }}" name="email">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 col-sm-offset-1 control-label">Password *</label>
                        <div class="col-sm-8">
                            <input type="password" class="form-control input-lg" placeholder="{{ $langLbl['Password'] }}" name="password">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-10 col-sm-offset-1">
                            <hr/>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-9 text-right">
                            <button type="submit" class="btn red btn-lg btn-circle">
                                {{ $langLbl['Login'] }} <span class="glyphicon glyphicon-ok-circle"></span>
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
