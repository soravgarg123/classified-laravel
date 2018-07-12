@extends('company.layout')

@section('custom-styles')
<style>
    .control-label {
        font-weight: bold;
    }
    .page-container {
        background: #FFF;
    }
    .multiselect span{
        float:left;    	
    }
    .multiselect .caret{
        float:right;
        margin-top:8px;
    }
</style>
{{ HTML::style('/assets/metronic/global/plugins/select2/select2.css') }}
{{ HTML::style('/assets/css/bootstrap-multiselect.css') }}
@stop

@section('main')
<?php
$nameVal = 'name' . $currentLanguage;
$short_nameVal = 'short_name' . $currentLanguage;
?>
<div class="page-container">
    <div class="page-contect-wrapper">
        <div class="page-content"> 
            <div class="col-sm-8 col-sm-offset-2 margin-top-normal padding-bottom-lg">             
                <form class="form-horizontal" role="form" method="post" action="{{ URL::route('company.auth.doSignup') }}">
                    <div class="form-group">
                        <div class="row text-center">
                            <p class="form-control-static">
                            <h2 class="color-default"><b>{{ $langLbl['Create the Account as Professional'] }}</b></h2>
                            </p>
                            <p class="form-control-static">
                            <h3>{{ $langLbl['Please fill the forms'] }}</h3>
                            </p>
                        </div>
                    </div>

                    <?php if (isset($alert)) { ?>
                        <div class="form-group">
                            <div class="col-sm-10 col-sm-offset-1">                
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
                    <?php } ?>                          

                    <div class="form-group">
                        <label class="col-sm-2 col-sm-offset-1 control-label">{{ $langLbl['Email'] }} *</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control input-lg" placeholder="{{ $langLbl['Email Address'] }}" name="email" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 col-sm-offset-1 control-label">{{ $langLbl['Password'] }} *</label>
                        <div class="col-sm-8">
                            <input type="password" class="form-control input-lg" placeholder="{{ $langLbl['Password'] }}" name="password">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 col-sm-offset-1 control-label">{{ $langLbl['Password Confirmation'] }} *</label>
                        <div class="col-sm-8">
                            <input type="password" class="form-control input-lg" placeholder="{{ $langLbl['Password Confirmation'] }}" name="password_confirmation">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 col-sm-offset-1 control-label">{{ $langLbl['Name'] }} *</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control input-lg" placeholder="{{ $langLbl['Professional Name'] }}" name="name">
                        </div>
                    </div>                    

                    <div class="form-group">
                        <label class="col-sm-2 col-sm-offset-1 control-label">{{ $langLbl['Country'] }} *</label>
                        <div class="col-sm-8">
                            <select name="country" id="select2_sample4" class="form-control select2" required>
                                @foreach($countries as $c)
                                <option value="{{$c->iso2}}" >{{$c->$short_nameVal}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-2 col-sm-offset-1 control-label">{{ $langLbl['Languages'] }} *</label>	                	
                        <div class="col-sm-8">
                            <select id="lng_sel" multiple="multiple" name="languages[]" required>
                                @foreach($languages as $l)
                                <option value="{{$l->alpha2}}" >{{$l->$nameVal}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>


                    <div class="form-group">
                        <label class="col-sm-2 col-sm-offset-1 control-label">{{ $langLbl['Hourly Rate'] }} *</label>
                        <div class="col-sm-8">
                            <input type="number" class="form-control input-lg" placeholder="{{ $langLbl['Price in Euro'] }}" name="rate" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-2 col-sm-offset-1 control-label">{{ $langLbl['Phone No'] }} *</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control input-lg" placeholder="{{ $langLbl['Phone No'] }}" name="phone" required>
                        </div>
                    </div>

                    <!--  <div class="form-group">
                         <label class="col-sm-2 col-sm-offset-1 control-label">Keyword</label>
                         <div class="col-sm-8">
                             <input type="text" class="form-control input-lg" placeholder="Professinal Keyword" name="keyword" />
                         </div>
                     </div> -->

                    <div class="form-group">
                        <div class="col-sm-10 col-sm-offset-1">
                            <hr/>
                        </div>
                    </div>
                    <input type="hidden" name="user_type" value="{{$type}}"/>
                    <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-9 text-right">
                            @if($type == 'pro_py')
                            <button type="button" id="btn-pySign" class="btn red btn-lg btn-circle">
                                {{ $langLbl['Sign Up'] }} <span class="glyphicon glyphicon-ok-circle"></span>
                            </button>
                            @else
                            <button type="submit" class="btn red btn-lg btn-circle">
                                {{ $langLbl['Sign Up'] }} <span class="glyphicon glyphicon-ok-circle"></span>
                            </button>
                            @endif
                        </div>
                    </div>
                </form>                
            </div>
        </div>
    </div>
</div>
<!-- Anually Signup -->
<form id="js-frm-pysign" method="post" action="{{ 'https://'.PAYPAL_SERVER.'/cgi-bin/webscr' }}" class="hide">
    <input type="hidden" name="cmd" value="_xclick-subscriptions">
    <input type="hidden" name="business" value="{{PAYPAL_BUSINESS}}">
    <input type="hidden" name="item_name" value="{{ SITE_NAME }} Singup">
    <input type="hidden" name="no_shipping" value="1">
    <input type="hidden" name="return" value="{{ URL::route('company.auth.success') }}">
    <input type="hidden" name="cancel_return" value="{{ URL::route('company.auth.signFailed') }}">
    <input type="hidden" name="a1" value="{{$price}}"> <!-- free trial=yes -->
    <input type="hidden" name="p1" value="1"> <!-- length of trial period -->
    <input type="hidden" name="t1" value="Y"> <!-- period of trial=month -->
    <input type="hidden" name="a3" value="{{$price}}"> <!-- price of subscription -->
    <input type="hidden" name="amount" value="{{$price}}">
    <input type="hidden" name="p3" value="1"> <!-- billing cycle length -->
    <input type="hidden" name="t3" value="Y"> <!-- billing cycle unit=month -->
    <input type="hidden" name="notify_url" value="{{ URL::route('company.purchase.ipn') }}">
    <input type="hidden" name="custom" />
    <input type="hidden" name="currency_code" value="EUR">
</form>

<!-- Service Signup -->
<form id="js-frm-pssign" method="post" action="{{ 'https://'.PAYPAL_SERVER.'/cgi-bin/webscr' }}" class="hide">
    <input type="hidden" name="business" value="{{PAYPAL_BUSINESS}}" />
    <input type="hidden" name="cmd" value="_xclick">
    <input type="hidden" name="item_name" value="{{ SITE_NAME }} Signup">
    <input type="hidden" name="amount" value="{{$price}}">
    <input type="hidden" name="quantity" />
    <input type="hidden" name="custom" >
    <input type="hidden" name="currency_code" value="EUR">
    <input type="hidden" name="notify_url" value="{{ URL::route('company.purchase.ipn') }}">
    <input type="hidden" name="return" value="{{ URL::route('company.auth.success') }}">
    <input type="hidden" name="cancel_return" value="{{ URL::route('company.auth.signFailed') }}">
    <input type="hidden" name="no_shipping" value="1">
    <input type="hidden" name="email">
</form>
@stop
@section('custom-scripts')
{{ HTML::script('/assets/metronic/global/plugins/select2/select2.min.js') }}
{{ HTML::script('/assets/metronic/global/plugins/jquery-multi-select/js/jquery.multi-select.js') }}
{{ HTML::script('/assets/metronic/admin/pages/scripts/components-dropdowns.js') }}
{{ HTML::script('/assets/js/bootstrap-3.3.2.min.js') }}    
{{ HTML::script('/assets/js/bootstrap-multiselect.js') }}
{{ HTML::script('/assets/js/bootstrap-multiselect-collapsible-groups.js') }}
<script  type='text/javascript'>
    $(document).ready(function() {
        ComponentsDropdowns.init();

        $('#lng_sel').multiselect({
            enableFiltering: true,
            maxHeight: 250,
            buttonWidth: '100%',
            enableClickableOptGroups: true,
            selectAllText: '{{ $langLbl["Select all"] }}',
            nonSelectedText: '{{ $langLbl["None selected"] }}',
            filterPlaceholder: '{{ $langLbl["Search"] }}',
            allSelectedText: '{{ $langLbl["All selected"] }}'
        });
    });
    $('button#btn-pySign').click(function() {
        var pwd = $('input[name="password"]').val();
        var pwd_cfm = $('input[name="password_confirmation"]').val();
        var email = $('input[name="email"]').val();
        var name = $('input[name="name"]').val();
        var phone = $('input[name="phone"]').val();
        var keyword = $('input[name="keyword"]').val();
        if (!email || !name) {
            bootbox.alert('{{ $langLbl["Please fill email and name filed!"] }}');
            return;
        }
        if ((pwd != pwd_cfm) || !pwd) {
            bootbox.alert('{{ $langLbl["Please input your password correctly!"] }}');
            return;
        }

        var custom = '{"email":"' + email + '", "name":"' + name + '", "phone":"' + phone + '", "keyword":"' + keyword + '", "password":"' + pwd + '","type":"pro_py"}';
        $('input[name="custom"]').val(custom);
        $('form#js-frm-pysign').submit();
    });


    $('button#btn-psSign').click(function() {
        var pwd = $('input[name="password"]').val();
        var pwd_cfm = $('input[name="password_confirmation"]').val();
        var email = $('input[name="email"]').val();
        var name = $('input[name="name"]').val();
        var phone = $('input[name="phone"]').val();
        var keyword = $('input[name="keyword"]').val();
        var sn = $('input[name="service_number"]').val();
        if (!email || !name || !sn) {
            bootbox.alert('{{ $langLbl["Please fill required filed!"] }}');
            return;
        }
        if ((pwd != pwd_cfm) || !pwd) {
            bootbox.alert('{{ $langLbl["Please input your password correctly!"] }}');
            return;
        }
        $('input[name="quantity"]').val(sn);

        var custom = '{"email":"' + email + '", "name":"' + name + '", "phone":"' + phone + '", "keyword":"' + keyword + '", "service_number":"' + sn + '", "password":"' + pwd + '","type":"pro_ps"}';
        $('input[name="custom"]').val(custom);
        $('form#js-frm-pssign').submit();
    });
</script>
@stop

@stop
