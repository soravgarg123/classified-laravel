@extends('company.layout')

@section('custom-styles')
{{ HTML::style('/assets/metronic/global/plugins/typeahead/typeahead.css') }}
@stop

@section('breadcrumb')
<div class="row">
    <div class="col-md-12">
        <ul class="page-breadcrumb breadcrumb">
            <li>
                <i class="fa fa-home"></i>
                <span>{{ $langLbl['Consumer'] }}</span>
                <i class="fa fa-angle-right"></i>
            </li>
            <li>
                <span>{{ $langLbl['List'] }}</span>
            </li>
        </ul>
    </div>
</div>
@stop

@section('content')
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

<!-- div class="portlet box green">
    <div class="portlet-title">
                <div class="caption">
                        <i class="fa fa-user"></i> Consumer Register
                </div>
        </div>
    <div class="portlet-body">
        <form method="post" action="{{ URL::route('company.user.register') }}">
            <div class="row">
                <label class="col-sm-4 text-right form-control-static">Consumer Email: </label>
                <div class="col-sm-4">
                    <input type="text" class="form-control" placeholder="Write Email Here..." id="js-text-email" name="email">
                </div>
                <div class="col-sm-2">
                    <button class="btn green btn-block"><i class="fa fa-plus"></i> Add</button>
                </div>
            </div>
        </form>
    </div>
</div -->

<div class="portlet box red">
    <div class="portlet-title">
        <div class="caption">
            <i class="fa fa-navicon"></i> {{ $langLbl['Consumer List'] }}
        </div>
        <div class="actions">
            <button class="btn green" id="js-btn-send-email">
                <i class="fa fa-envelope-o"></i>&nbsp;{{ $langLbl['Send Email'] }}
            </button>

            <button class="btn blue" id="js-btn-send-sms">
                <i class="fa fa-comment-o"></i>&nbsp;{{ $langLbl['Send SMS'] }}
            </button>
        </div>		
    </div>
    <div class="portlet-body">
        <form method="get" action="{{ URL::route('company.user') }}">
            <div class="row">
                <label class="col-sm-3 text-right form-control-static">{{ $langLbl['Consumer Info'] }}: </label>
                <div class="col-sm-4">
                    <input type="text" class="form-control" placeholder="Email / Name" name="keyword" value="{{ $keyword }}">
                </div>
                <div class="col-sm-5">
                    <button class="btn red btn-sm" type="submit"><i class="fa fa-search"></i> {{ $langLbl['Search'] }}</button>
                    <a class="btn green btn-sm" href="{{ URL::route('company.user') }}?latest=1"><i class="fa fa-user"></i> {{ $langLbl['Latest'] }} 30</a>

                    <!-- <a class="btn red btn-sm pull-right" href="{{ URL::route('company.user.register') }}"><i class="fa fa-plus"></i> {{ $langLbl['Register Consumer'] }}</a> -->
                    <div class="clearfix"></div>
                </div>
            </div>
        </form>
        <hr/>

        <table class="table table-striped table-bordered table-hover">
            <thead>
                <tr>
                    <th></th>
                    <th>#</th>
                    <th>{{ $langLbl['Name'] }}</th>
                    @if ($company->plan_id != '')
                    <th>{{ $langLbl['Email'] }}</th>
                    <th>{{ $langLbl['Phone'] }}</th>
                    @endif
                    <th>{{ $langLbl['Photo'] }}</th>
                    <th>{{ $langLbl['Visits'] }}</th>
                    <th>{{ $langLbl['Stamps'] }}</th>
                    <th>{{ $langLbl['Registered At'] }}</th>
                    <th class="th-action">{{ $langLbl['Detail'] }}</th>
                    <th class="th-action">{{ $langLbl['Stamp'] }}</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($consumers as $key => $value)
                <tr>
                    <td><input type="checkbox" id="js-chk-user-id" value="{{ $value->user->id }}"></td>
                    <td>{{ ((Input::has('page') ? Input::get('page') : 1) - 1 ) * PAGINATION_SIZE + ($key + 1) }}</td>
                    <td>{{ $value->user->name}}</td>
                    @if ($company->plan_id != '')
                    <td>{{ $value->user->email}}</td>
                    <td>{{ $value->user->phone}}</td>
                    @endif
                    <td><img src="{{ HTTP_USER_PATH.$value->user->photo }}" style="height: 40px;"></td>
                    <td>{{ $value->count_visit }}</td>
                    <?php
                    $tooltip = "";
                    foreach ($value->user->availableLoyalties() as $key => $loyalty) {
                        if ($key != 0) {
                            $tooltip .= "<br/>";
                        }
                        $tooltip .= $loyalty->name . " : " . $loyalty->count_visit . " " . $langLbl['Stamps Requires'];
                    }
                    ?>
                    <td>
                        <span class="label label-success" data-toggle="tooltip" data-placement="bottom" data-html="true" data-title="{{ $tooltip }}">
                            {{ $value->count_stamp }}
                        </span>
                    </td>
                    <td>{{ $value->created_at }}</td>
                    <td>
                        <a href="{{ URL::route('company.user.detail', $value->user_id) }}" class="btn btn-sm btn-info">
                            <span class="glyphicon glyphicon-edit"></span> {{ $langLbl['Detail'] }}
                        </a>
                    </td>
                    <td>
                        <button class="btn btn-sm btn-primary" id="js-btn-add-stamp" data-user="{{ $value->user_id }}">
                            <i class="fa fa-plus"></i>&nbsp;{{ $langLbl['Stamp'] }}
                        </button>
                    </td>                        
                </tr>
                @endforeach
            </tbody>
        </table>
        @if ($latest != 1)
        <div class="pull-right">{{ $consumers->links() }}</div>
        <div class="clearfix"></div>
        @endif
    </div>
</div>

<div class="modal fade" id="js-div-send" tabindex="-1" role="basic" aria-hidden="true" style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                <h4 class="modal-title" id="js-h4-title"></h4>
            </div>
            <div class="modal-body">
                <textarea class="form-control" rows="5" placeholder="{{ $langLbl['Write Message Here'] }}..." id="js-textarea-description"></textarea>
                <input type="hidden" id="js-hidden-is-email"/>				 
            </div>
            <div class="modal-footer">
                <button type="button" class="btn default" data-dismiss="modal">{{ $langLbl['Close'] }}</button>
                <button type="button" class="btn blue" id="js-btn-submit">{{ $langLbl['Submit'] }}</button>
            </div>
        </div>
    </div>
</div>

<form method="POST" action="{{ URL::route('company.user.doMarketing') }}" id="js-frm-message">
    <input type="hidden" name="user_ids"/>
    <input type="hidden" name="description"/>
    <input type="hidden" name="is_email"/>
</form>

@stop

@section('custom-scripts')
{{ HTML::script('/assets/metronic/global/plugins/typeahead/handlebars.min.js') }}
{{ HTML::script('/assets/metronic/global/plugins/typeahead/typeahead.bundle.min.js') }}

<script>
    var custom = new Bloodhound({
        datumTokenizer: function(d) {
            return d.tokens;
        },
        queryTokenizer: Bloodhound.tokenizers.whitespace,
        remote: "{{ URL::route('async.company.email.autoComplete') }}" + "?query=%QUERY"
    });

    custom.initialize();

    $("button#js-btn-submit").click(function() {
        $("input[name='description']").val($("#js-textarea-description").val());
        $("input[name='is_email']").val($("#js-hidden-is-email").val());
        var objList = $("input#js-chk-user-id:checked");
        var strIds = "";
        for (var i = 0; i < objList.length; i++) {
            if (i > 0) {
                strIds += ",";
            }
            strIds += objList.eq(i).val();
        }
        $("input[name='user_ids']").val(strIds);
        if ($("#js-textarea-description").val() == "") {
            bootbox.alert("{{ $langLbl['Please enter message to send'] }}");
            return;
        }
        if (strIds == "") {
            bootbox.alert("{{ $langLbl['Please select users.'] }}");
            return;
        }

        $("#js-frm-message").submit();

    });

    $("button#js-btn-send-email, button#js-btn-send-sms").click(function() {
        $("#js-textarea-description").val("");
        if ($(this).attr("id") == "js-btn-send-email") {
            $("h4#js-h4-title").text("{{ $langLbl['Send Email To User'] }}");
            $("#js-hidden-is-email").val(1);
        } else {
            $("h4#js-h4-title").text("{{ $langLbl['Send SMS To User'] }}");
            $("#js-hidden-is-email").val(0);
        }
        $("#js-div-send").modal();
    });

    $("button#js-btn-add-stamp").click(function() {
        $.ajax({
            url: "{{ URL::route('async.company.stamp.add') }}",
            dataType: "json",
            type: "POST",
            data: {user_id: $(this).attr('data-user')},
            success: function(data) {
                bootbox.alert(data.msg);
                window.setTimeout(function() {
                    bootbox.hideAll();
                }, 2000);
            }
        });
    });

    $('#js-text-email').typeahead(null, {
        name: 'da-js-text-email',
        displayKey: 'name',
        hint: true,
        source: custom.ttAdapter()
    });
</script>    
@stop

@stop
