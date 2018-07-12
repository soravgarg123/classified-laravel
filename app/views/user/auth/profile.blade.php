@extends('user.layout')

@section('main')
<div class="container">
    <div class="row">
        <div class="col-sm-6 col-sm-offset-3 margin-top-normal margin-bottom-xl">
            <form role="form" method="post" action="{{ URL::route('user.updateProfile') }}">
                <div class="form-group">
                    <div class="row text-center">
                        <p class="form-control-static">
                        </p><h2 class="text-center text-uppercase">{{ $langLbl['User Profile'] }}</h2>
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

                <div class="margin-top-lg"></div>
                <div class="form-group">
                    <label class="control-label">{{ $langLbl['Email'] }} *</label>
                    <input type="email" class="form-control input-lg" placeholder="{{ $langLbl['Email Address'] }}" readonly value="{{ $user->email }}">
                </div>

                <div class="margin-top-lg"></div>
                <div class="form-group">
                    <label class="control-label">{{ $langLbl['Password'] }}</label>
                    <input type="password" class="form-control input-lg" placeholder="{{ $langLbl['Password'] }}" name="password">
                </div>

                <div class="margin-top-lg"></div>
                <div class="form-group">
                    <label class="control-label">{{ $langLbl['Name'] }} *</label>
                    <input type="text" class="form-control input-lg" placeholder="{{ $langLbl['Name'] }}" name="name" value="{{ $user->name }}">
                </div>

                <div class="margin-top-lg"></div>
                <div class="form-group">
                    <label class="control-label">{{ $langLbl['Phone'] }}</label>
                    <input type="text" class="form-control input-lg" placeholder="{{ $langLbl['Phone Number'] }}" name="phone" value="{{ $user->phone }}">
                </div> 

                <div class="margin-top-lg"></div>
                <div class="form-group">
                    <label class="control-label">{{ $langLbl['Default Language'] }}</label>
                    <select class="form-control input-lg" name="default_language">
                        @foreach($siteLanguage as $sLangKey => $sLangVal)
                        <option value="{{ $sLangVal }}" @if($user->default_language == $sLangVal) selected @endif>{{ $langLbl[$sLangKey] }}</option>
                        @endforeach
                    </select>
                </div>                

                <div class="margin-top-lg"></div>
                <div class="form-group">
                    <div class="text-right">
                        <button type="submit" class="btn btn-primary btn-lg">
                            {{ $langLbl['Update'] }} <span class="glyphicon glyphicon-ok-circle"></span>
                        </button>
                    </div>
                </div>
            </form>    
        </div>
    </div>
</div>
@stop

@stop
