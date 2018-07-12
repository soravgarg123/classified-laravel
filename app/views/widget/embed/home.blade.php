@extends('widget.layout')

@section('main')
<div class="margin-top-sm margin-bottom-sm container">
    <form method="post" action="{{ URL::route('widget.embed.submitReview', $store->token) }}" id="js-form-review">
        <div class="row margin-top-sm text-center">
            <h2 class="color-font"><i>Welcome to <b>{{ $store->name }}</b></i></h2>
        </div>

        @if (isset($alert))
        <div class="row margin-top-xs">
            <div class="col-sm-12 margin-top-lg">
                <div class="alert alert-<?php echo $alert['type']; ?> alert-dismissibl fade in">
                    <button type="button" class="close" data-dismiss="alert">
                        <span aria-hidden="true">&times;</span>
                        <span class="sr-only">{{ $langLbl['Close'] }}</span>
                    </button>
                    <p>
                        <?php echo $alert['msg']; ?>
                    </p>
                </div>
            </div>
        </div>
        @endif   

        @if ($is_reviewed)
        <div class="row margin-top-normal">
            <div class="col-sm-12 text-center color-font">
                <h3><u>{{ $langLbl['You have already left the review here.'] }}</u></h3>
            </div>
        </div>
        @else
        <div id="js-div-feedback">
            @foreach ($store->company->visibleRatingTypes as $key => $value)

            <div class="row margin-top-xs">
                <div class="text-center col-sm-6" style="height: 50px; line-height: 50px; padding-top: 25px;">
                    <h3 class="color-font"><b>{{ $value->name }} : </b></h3>
                </div>
                <div class="text-center col-sm-6 form-radio">
                    @if ($value->is_score)
                    <input id="js-number-rating" data-symbol="&#8226;" type="number" name="rating[]" class="rating" min=0 max=5 step=1 data-show-caption=false data-show-clear=false data-size='lg' value="3">
                    <input type="hidden" name="type_id[]" value="{{ $value->id }}">
                    @else
                    <input type="hidden" name="type_id[]" value="{{ $value->id }}">
                    <input type="hidden" name="rating[]" id="js-hidden-rating">
                    <div class="btn-group padding-top-sm" data-toggle="buttons">
                        <label class="btn btn-default btn-lg" data-val=1 id="js-label-answer"><input type="radio" class="toggle"> {{ $langLbl['Yes'] }} </label>
                        <label class="btn btn-default btn-lg" data-val=0 id="js-label-answer"><input type="radio" class="toggle"> {{ $langLbl['No'] }} </label>
                    </div>						    
                    @endif
                </div>
            </div>
            @endforeach

            <div class="row margin-top-sm">
                <div class="col-sm-10 col-sm-offset-1">
                    <textarea class="form-control" name="description" rows="5" placeholder="{{ $langLbl['Write feedback here'] }}..."></textarea>
                </div>
            </div>

            <div class="row margin-top-sm">
                <div class="col-sm-10 col-sm-offset-1">
                    <button class="btn btn-primary btn-lg btn-block" type="button" id="js-btn-submit-review">{{ $langLbl['Submit Review'] }}</button>
                </div>
            </div>
        </div>
        <div id="js-div-user" style="display: none;">
            <div class="row margin-top-sm">
                <div class="col-sm-10 col-sm-offset-1">
                    <p>{{ $langLbl['Enter your information here. So we can register you as our customer.'] }}</p>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-10 col-sm-offset-1">                
                    <input type="hidden" name="user_id" value="{{ Session::get('user_id') }}" />
                    <div class="row">
                        <div class="col-sm-4 margin-top-xs">
                            <input type="text" class="form-control" name="email" placeholder="{{ $langLbl['Email Address'] }} *"/>
                        </div>
                        <div class="col-sm-4 margin-top-xs">
                            <input type="text" class="form-control" name="name" placeholder="{{ $langLbl['Name'] }} ({{ $langLbl['optional'] }})"/>
                        </div>
                        <div class="col-sm-4 margin-top-xs">
                            <input type="text" class="form-control" name="phone" placeholder="{{ $langLbl['Phone'] }} ({{ $langLbl['optional'] }})"/>
                        </div>                                                
                    </div>
                </div>
            </div>

            <div class="row margin-top-sm">
                <div class="col-sm-10 col-sm-offset-1">
                    <button class="btn btn-primary btn-lg btn-block" type="button" id="js-btn-submit">{{ $langLbl['Submit'] }}</button>
                </div>
            </div>

        </div>
        @endif
    </form>
</div>
@include('chating_common')
@stop

@section('custom-scripts')
<script>
    $(document).ready(function() {
        $("label#js-label-answer").click(function() {
            $(this).parents("div.form-radio").find("input#js-hidden-rating").val($(this).attr('data-val'));
        });

        $("button#js-btn-submit-review").click(function() {
            var objList = $("input#js-hidden-rating");
            for (var i = 0; i < objList.length; i++) {
                if (objList.eq(i).val() == '') {
                    bootbox.alert("{{ $langLbl['Please answer the question.'] }}");
                    return;
                }
            }

            if ($("input[name='user_id']").val() == '') {
                $("div#js-div-feedback").hide();
                $("div#js-div-user").show();
            } else {
                $("form#js-form-review").submit();
            }
        });

        $("button#js-btn-submit").click(function() {
            if ($("input[name='email']").val() == '') {
                bootbox.alert("{{ $langLbl['Please enter email address.'] }}");
            } else {
                $("form#js-form-review").submit();
            }
        });
    });
</script>
@stop

@stop
