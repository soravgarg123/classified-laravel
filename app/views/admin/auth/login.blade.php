@extends('admin.layout')

@section('main')
<div class="page-container">
    <div class="page-contect-wrapper">
        <div class="page-content"> 
            <div class="col-sm-6 col-sm-offset-3 thumbnail margin-top-xl margin-bottom-xl">

                <?php if (isset($alert)) { ?>
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

                <form class="form-horizontal" role="form" method="post" action="{{ URL::route('admin.auth.doLogin') }}">
                    <div class="form-group">
                        <div class="row text-center">
                            <div class="col-sm-10 col-sm-offset-1">
                                <p class="form-control-static">
                                <h2 style="margin-left: 10px;margin-right: 10px;">{{ $langLbl['Administrator Login'] }}</h2>
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-10 col-sm-offset-1">
                            <hr/>
                        </div>
                    </div>        
                    <div class="form-group">
                        <label class="col-sm-3 col-sm-offset-1 control-label">{{ $langLbl['Username'] }}</label>
                        <div class="col-sm-7">
                            <input type="text" class="form-control" placeholder="{{ $langLbl['Username'] }}" name="name">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 col-sm-offset-1 control-label">{{ $langLbl['Password'] }}</label>
                        <div class="col-sm-7">
                            <input type="password" class="form-control" placeholder="{{ $langLbl['Password'] }}" name="password">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-10 col-sm-offset-1">
                            <hr/>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-9 text-right">
                            <button type="submit" class="btn btn-success btn-lg">
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
