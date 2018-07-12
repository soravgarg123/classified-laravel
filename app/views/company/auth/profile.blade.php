@extends('company.layout')

@section('custom-styles')]
<style>
    #map-canvas {
        height: 300px;
    }
</style>
{{ HTML::style('/assets/metronic/global/plugins/bootstrap-fileinput/bootstrap-fileinput.css') }}
{{ HTML::style('/assets/metronic/global/plugins/select2/select2.css') }}
{{ HTML::style('/assets/css/bootstrap-multiselect.css') }}
<style>
    .cat_sel span.multiselect-selected-text{
        float:left;
    }
    .cat_sel b.caret{
        float:right;
        margin-top:8px;
    }
</style>
@stop

@section('breadcrumb')
<div class="row">
    <div class="col-md-12">
        <ul class="page-breadcrumb breadcrumb">
            <li>
                <i class="fa fa-home"></i>
                <span>{{ $langLbl['Professional Profile'] }}</span>
            </li>
        </ul>
    </div>
</div>
@stop

@section('content')
@if ($errors->has())
<div class="alert alert-danger alert-dismissibl fade in">
    <button type="button" class="close" data-dismiss="alert">
        <span aria-hidden="true">&times;</span>
        <span class="sr-only">{{ $langLbl['Close'] }}</span>
    </button>
    @foreach ($errors->all() as $error)
    {{ $error }}		</br>
    @endforeach
</div>
@endif
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
<?php
$nameVal = 'name' . $currentLanguage;
$short_nameVal = 'short_name' . $currentLanguage;
?>
<div class="tabbable-line">
    <ul class="nav nav-tabs ">
        <li class="{{ $tabNo == 1 ? 'active' : '' }}" id="js-li-tab" data-url="{{ URL::route('company.profile', 1) }}">
            <a href="#tab_1">{{ $langLbl['General Information'] }}</a>
        </li>
        <li class="{{ $tabNo == 2 ? 'active' : '' }}" id="js-li-tab" data-url="{{ URL::route('company.profile', 2) }}">
            <a href="#tab_2">{{ $langLbl['Invoice Management'] }}</a>
        </li>
        <li class="{{ $tabNo == 3 ? 'active' : '' }}" id="js-li-tab" data-url="{{ URL::route('company.profile', 3) }}">
            <a href="#tab_3">{{ $langLbl['Profile & Cover Photo'] }}</a>
        </li>
        <li class="{{ $tabNo == 4 ? 'active' : '' }}" id="js-li-tab" data-url="{{ URL::route('company.profile', 4) }}">
            <a href="#tab_4">{{ $langLbl['Change Password'] }}</a>
        </li>
    </ul>
    <div class="tab-content">
        <div class="tab-pane {{ $tabNo == 1 ? 'active' : '' }}" id="tab_1">
            <div class="portlet box red">
                <div class="portlet-title">
                    <div class="caption">
                        <i class="fa fa-user"></i>{{ $langLbl['General Information'] }}
                    </div>
                </div>
                <div class="portlet-body form">
                    <form action="{{ URL::route('company.profile.updateCompany') }}" class="form-horizontal form-row-seperated" method="post">
                        <div class="form-body">
                            <div class="form-group">
                                <label class="col-sm-3 control-label">{{ Form::label('name', $langLbl['Name'].' *') }}</label>
                                <div class="col-sm-9">
                                        {{ Form::text('name', $company->name, ['class' => 'form-control']) }}
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3">{{ Form::label('email', $langLbl['Email']).' * ' }}</label>
                                <div class="col-md-8">
                                    <input type="text" class="form-control" placeholder="Email-id" name="email" value="{{ $company->email }}">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3">{{ Form::label('country', $langLbl['Country']).' * ' }}</label>
                                <div class="col-md-8">
                                    <select name="country" id="select2_sample4" class="form-control select2">
                                        @foreach($countries as $c)
                                        <option value="{{$c->iso2}}" {{$c->iso2 == $company->country ? 'selected':''}}>{{$c->$short_nameVal}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                             <div class="form-group">
                                <label class="control-label col-md-3">{{ Form::label('languages',$langLbl['Languages spoken']).'*' }}</label>
                                <div class="col-md-8 lang-sel">
                                    <?php $sel_lng = explode(",", $company->languages); ?>                                          
                                    <select id="lng_sel" multiple="multiple" name="languages[]">
                                        @foreach($languages as $l)
                                        <option value="{{$l->alpha2}}" >{{$l->$nameVal}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                            <?php 
                                $defaultLang = "";
                                if($_COOKIE['current_lang'] == "es"){
                                    $defaultLang = "Spanish";
                                }elseif($_COOKIE['current_lang'] == "it"){
                                    $defaultLang = "Italian";
                                }else{
                                    $defaultLang = "English";
                                }
                            ?>
                                <label class="control-label col-md-3">{{ $langLbl['Default Language'] }}</label>
                                <div class="col-md-8">
                                    <select class="form-control" name="default_language">
                                        @foreach($siteLanguage as $sLangKey => $sLangVal)
                                        <option value="{{ $sLangVal }}" @if($company->default_language == $sLangVal) selected @endif>{{ $langLbl[$sLangKey] }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3">{{Form::label('category', $langLbl['Category']).'*'}}</label>
                                <div class="col-md-8 cat_sel">
                                    <?php
                                    $sel_cat = [];
                                    foreach ($company->subClasses as $item) {
                                        $sel_cat[] = $item->sub_class_id;
                                    }
                                    ?>
                                    <select id="cat_sel" multiple="multiple" name="sub_category[]">
                                        @foreach ($categories as $category)                                                 
                                        <optgroup label="{{ $category->$nameVal }}">
                                            @foreach ($category->subClasses as $subCategory)
                                            <option value="{{$subCategory->id}}">&nbsp; {{$subCategory->$nameVal}}</option>
                                            @endforeach
                                            @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3">{{ Form::label('register', $langLbl['Registered to']) }}</label>
                                <div class="col-md-8">
                                    <select name="register" class="form-control">                              
                                        <option value="">{{ $langLbl['registration type'] }}</option>
                                        @foreach([ 'Professional College' => $langLbl['Professional College'], 'Professional Order' => $langLbl['Professional Order'], 
                                        'Bar Register' => $langLbl['Bar Register']] as $r => $v)
                                        <option value="{{$r}}" {{$company->register == $r ? 'selected':''}}>{{$v}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3">{{ Form::label('city', $langLbl['city of'])}}</label>
                                <div class="col-md-8">
                                    <input type="text" class="form-control" placeholder="City of college or order" name="city" value="<?php echo str_replace(",", "", $company->city); ?>"/>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3">{{ Form::label('reg_no', $langLbl['reg no'])}}</label>
                                <div class="col-md-8">
                                    <input type="text" class="form-control" placeholder="Registration Number" name="reg_no" value="<?php echo str_replace(",", "", $company->reg_no); ?>"/>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3">{{ Form::label('rate', $langLbl['Hourly Rate'])}}</label>
                                <div class="col-md-8">
                                    <input type="text" class="form-control rate" placeholder="price in euro" name="rate" value="{{$company->rate}}"/>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3">{{ Form::label('phone', $langLbl['Phone']).'*' }}</label>
                                <div class="col-md-8">
                                    <input type="text" class="form-control" placeholder="{{ $langLbl['Phone'] }}" name="phone" value="{{ $company->phone }}">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label">{{ $langLbl['About Me'].'*' }}</label>
                                <div class="col-sm-8">
                                    <div class="portlet box"> 
                                        <div class="portlet-body">
                                            <div class="tabbable-custom">
                                                <ul class="nav nav-tabs">
                                                    @if($siteLanguage)
                                                    @foreach ($siteLanguage as $lkey=>$rvalue)
                                                    <li class="@if(empty($rvalue)) active  @endif">
                                                        <a data-toggle="tab" href="#tab_description_{{ $langLbl[$lkey] }}">{{ Ucfirst($langLbl[$lkey]) }}</a>
                                                    </li>
                                                    @endforeach
                                                    @endif 
                                                </ul>
                                                <div class="tab-content">
                                                    @if($siteLanguage)
                                                    @foreach ($siteLanguage as $lkey=>$rvalue)
                                                    <div id="tab_description_{{ $langLbl[$lkey] }}" class="tab-pane @if(empty($rvalue)) active  @endif">
                                                        <textarea class="form-control" name="description<?php echo $rvalue; ?>" rows="20"><?php  ?>{{ $company->{'description'.$rvalue} }}</textarea>
                                                    </div>
                                                    @endforeach
                                                    @endif 
                                                </div>
                                                <p>{{ $langLbl['Min: 80 Characters, Max: 1200 Characters'] }} <span style="float:right;">80 / 1200 Chars</span></p>

                                            </div>
                                        </div>	
                                    </div>
                                </div>
                            </div>	
                            <!-- <div class="form-group">
                                <label class="control-label col-md-3">{{ Form::label('keyword', $langLbl['Keyword']).' : ' }}</label>
                                <div class="col-md-8">
                                    <textarea class="form-control" name="keyword" rows="3">{{ $company->keyword }}</textarea>
                                </div>
                            </div> -->
                        </div>
                        <div class="form-actions fluid">
                            <div class="row">
                                <div class="col-md-12 text-center">
                                    <button type="submit" onclick="return validate()" class="btn green"><i class="fa fa-save"></i> {{ $langLbl['Save'] }}</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="tab-pane {{ $tabNo == 2 ? 'active' : '' }}" id="tab_2">
            <div class="portlet box red">
                <div class="portlet-title">
                    <div class="caption">
                        <i class="fa fa-user"></i>{{ $langLbl['Invoice Management'] }}
                    </div>
                </div>
                <div class="portlet-body form">
                    <form action="{{ URL::route('company.profile.updateInvoiceMgmt') }}" class="form-horizontal form-row-seperated" method="post">
                        <div class="form-body">
                            <div class="form-group">
                                <label class="control-label col-md-3">{{ Form::label('company_name', $langLbl['Company Name']).' * ' }}</label>
                                <div class="col-md-8">
                                    <input type="text" class="form-control" placeholder="{{ $langLbl['Company Name'] }}" name="company_name" value="<?php if($errors->has()) { echo Session::get("company_name"); } else { echo $company->company_name; } ?>">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3">{{ Form::label('street', $langLbl['street']).' * ' }}</label>
                                <div class="col-md-8">
                                    <input type="text" class="form-control" placeholder="{{ $langLbl['street'] }}" name="street" value="<?php if($errors->has()) { echo Session::get("street"); } else { echo $company->street; } ?>">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3">{{ Form::label('no', $langLbl['NO.']).' * ' }}</label>
                                <div class="col-md-8">
                                    <input type="text" class="form-control" placeholder="{{ $langLbl['NO.'] }}" name="no" value="<?php if($errors->has()) { echo Session::get("no"); } else { echo $company->no; } ?>">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3">{{ Form::label('country', $langLbl['Country']).' * ' }}</label>
                                <div class="col-md-8">
                                    <select name="country" id="select2_sample4" class="form-control select2">
                                        @foreach($countries as $c)
                                        <option value="{{$c->iso2}}" {{$c->iso2 == $company->country ? 'selected':''}}>{{$c->$short_nameVal}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3">{{ Form::label('region', $langLbl['region']).' * ' }}</label>
                                <div class="col-md-8">
                                    <input type="text" class="form-control" placeholder="{{ $langLbl['region'] }}" name="region" value="<?php if($errors->has()) { echo Session::get("region"); } else { echo $company->region; } ?>">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3">{{ Form::label('city', $langLbl['city']).' * ' }}</label>
                                <div class="col-md-8">
                                    <input type="text" class="form-control" placeholder="{{ $langLbl['city'] }}" name="invoice_city" value="<?php if($errors->has()) { echo Session::get("invoice_city"); } else { echo $company->invoice_city; } ?>">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3">{{ Form::label('country tax', $langLbl['country tax']).' * ' }}</label>
                                <div class="col-md-8">
                                    <select name="country_tax" class="form-control">
                                        <option value="">{{ $langLbl['country tax'] }}</option>                                        
                                        <option value="Company Extra UE" <?php if($errors->has() && Session::get("country_tax") == "Company Extra UE") { echo "selected"; } else { if($company->country_tax == "Company Extra UE") echo "selected"; } ?> >{{ $langLbl['company extra ue'] }}</option>
                                        <option value="Company With UE VAT ID" <?php if($errors->has() && Session::get("country_tax") == "Company With UE VAT ID") { echo "selected"; } else { if($company->country_tax == "Company With UE VAT ID") echo "selected"; } ?> >{{ $langLbl['Company With UE VAT ID'] }}</option>
                                        <option value="Company With VAT ID" <?php if($errors->has() && Session::get("country_tax") == "Company With VAT ID") { echo "selected"; } else { if($company->country_tax == "Company With VAT ID") echo "selected"; } ?> >{{ $langLbl['Company With VAT ID'] }}</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3">{{ Form::label('vat id', $langLbl['VAT ID']).' * ' }}</label>
                                <div class="col-md-8">
                                    <input type="text" class="form-control" placeholder="{{ $langLbl['VAT ID'] }}" name="invoice_vat_id" value="<?php if($errors->has()) { echo Session::get("invoice_vat_id"); } else { echo $company->invoice_vat_id; } ?>">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3">{{ Form::label('payment gateway', $langLbl['Payment Gateway']).' * ' }}</label>
                                <div class="col-md-8">
                                    <select name="payment_gateway" class="form-control">
                                        <option value="">{{ $langLbl['Payment Gateway'] }}</option>                                        
                                        <option value="paypal" <?php if($errors->has() && Session::get("payment_gateway") == "paypal") { echo "selected"; } else { if($company->payment_gateway == "paypal") echo "selected"; } ?> >{{ $langLbl['paypal'] }}</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3">{{ Form::label('payment email', $langLbl['payment account email']).' * ' }}</label>
                                <div class="col-md-8">
                                    <input type="email" class="form-control" placeholder="{{ $langLbl['payment account email'] }}" name="payment_email" value="<?php if($errors->has()) { echo Session::get("payment_email"); } else { echo $company->payment_email; } ?>">
                                </div>
                            </div>
                        </div>
                        <div class="form-actions fluid">
                            <div class="row">
                                <div class="col-md-12 text-center">
                                    <button type="submit" onclick="return validate()" class="btn green"><i class="fa fa-save"></i> {{ $langLbl['Save'] }}</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="tab-pane {{ $tabNo == 3 ? 'active' : '' }}" id="tab_3">
            <div class="portlet box red">
                <div class="portlet-title">
                    <div class="caption">
                        <i class="fa fa-user"></i>{{ $langLbl['Photos'] }}
                    </div>
                </div>
                <div class="portlet-body form">
                    <form action="{{ URL::route('company.profile.updatePhoto') }}" class="form-horizontal form-row-seperated" method="post" enctype="multipart/form-data">
                        <div class="form-body">
                            @foreach ([
                            'photo' => 'Photo',
                            ] as $key => $value)
                            <div class="form-group">
                                <label class="control-label col-md-3">{{ Form::label($key, $value).' : ' }}</label>
                                <div class="col-md-8">
                                    <div class="fileinput fileinput-new" data-provides="fileinput">
                                        <div class="fileinput-new thumbnail" style="width: 120px; height: 120px;">
                                            <img src="{{ HTTP_COMPANY_PATH.$company->photo }}" alt=""/>
                                        </div>
                                        <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 120px; max-height: 120px;"></div>
                                        <div>
                                            <span class="btn default btn-file">
                                                <span class="fileinput-new">{{ $langLbl['Select image'] }}</span>
                                                <span class="fileinput-exists">{{ $langLbl['Change'] }}</span>
                                                <input type="file" name="{{ $key }}">
                                            </span>
                                            <a href="#" class="btn red fileinput-exists" data-dismiss="fileinput">{{ $langLbl['Remove'] }}</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                        <div class="form-actions fluid">
                            <div class="row">
                                <div class="col-md-12 text-center">
                                    <button type="submit" class="btn green"><i class="fa fa-save"></i> {{ $langLbl['Save'] }}</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="tab-pane {{ $tabNo == 4 ? 'active' : '' }}" id="tab_4">
            <div class="portlet box red">
                <div class="portlet-title">
                    <div class="caption">
                        <i class="fa fa-user"></i>{{ $langLbl['Change Password'] }}
                    </div>
                </div>
                <div class="portlet-body form">
                    <form action="{{ URL::route('company.profile.changePassword') }}" class="form-horizontal form-row-seperated" method="post">
                        <div class="form-body">
                            @foreach ([
                            'password_current' => $langLbl['Current Password'],
                            'password' =>  $langLbl['New Password'],
                            'password_confirmation' =>  $langLbl['Retype Password'],
                            ] as $key => $value)
                            <div class="form-group">
                                <label class="control-label col-md-3">{{ Form::label($key, $value).' : ' }}</label>
                                <div class="col-md-6">
                                    <input type="password" class="form-control" name="{{ $key }}">
                                </div>
                            </div>
                            @endforeach
                        </div>
                        <div class="form-actions fluid">
                            <div class="row">
                                <div class="col-md-12 text-center">
                                    <button type="submit" class="btn green"><i class="fa fa-save"></i> {{ $langLbl['Save'] }}</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>				
    </div>
</div>    
@stop

@section('custom-scripts')
{{ HTML::script('/assets/metronic/global/plugins/bootstrap-fileinput/bootstrap-fileinput.js') }}
{{ HTML::script('/assets/metronic/global/plugins/bootstrap-select/bootstrap-select.min.js') }}
{{ HTML::script('/assets/metronic/global/plugins/select2/select2.min.js') }}
{{ HTML::script('/assets/metronic/global/plugins/jquery-multi-select/js/jquery.multi-select.js') }}
{{ HTML::script('/assets/metronic/admin/pages/scripts/components-dropdowns.js') }}
{{ HTML::script('/assets/js/bootstrap-3.3.2.min.js') }}    
{{ HTML::script('/assets/js/bootstrap-multiselect.js') }}
{{ HTML::script('/assets/js/bootstrap-multiselect-collapsible-groups.js') }}
<script>

    $(document).ready(function() {
        ComponentsFormTools.init();
        ComponentsDropdowns.init();

        /* 	 $("input#js-checkbox-sub-category").change(function(){
         if($('input#js-checkbox-sub-category:checked').length > 1 ){
         alert("You are available to choose one category");
         $(this).prop('checked',false);
         return false;
         }
         }); */

        $('input.rate').keypress(function(event) {
            if (event.which >= 37 && event.which <= 40) {
                event.preventDefault();
            }
            var $this = $(this);
            var num = $this.val().replace(/,/gi, "").split("").reverse().join("");
            var num2 = RemoveRougeChar(num.replace(/(.{3})/g, "$1,").split("").reverse().join(""));
            // the following line has been simplified. Revision history contains original.
            $this.val(num2);
        });

        //language multiselect
        var sel_lng = <?php echo json_encode($sel_lng); ?>;
        $('#lng_sel').multiselect({
            enableFiltering: true,
            enableCaseInsensitiveFiltering: true,
            maxHeight: 250,
            buttonWidth: '100%',
            enableClickableOptGroups: true,
        });

        $('#lng_sel').multiselect('select', <?php echo json_encode($sel_lng); ?>);

        //category multiselect
        var sel_cat = <?php echo json_encode($sel_cat); ?>;
        $('#cat_sel').multiselect({
            enableFiltering: true,
            enableCaseInsensitiveFiltering: true,
            maxHeight: 250,
            buttonWidth: '100%',
            enableClickableOptGroups: true,
        });
        $('#cat_sel').multiselect('select', <?php echo json_encode($sel_cat); ?>);
        $("li#js-li-tab").click(function() {
            window.location.href = $(this).attr('data-url');
        });
    });

    function RemoveRougeChar(convertString) {
        if (convertString.substring(0, 1) == ",") {
            return convertString.substring(1, convertString.length)
        }
        return convertString;
    }
    function validate() {
        var objList = $("input#js-checkbox-sub-category:checked");
        for (var i = 0; i < objList.length; i++) {
            $("div#js-div-sub-category").append($("<input type='hidden' name='sub_category[]' value=" + objList.eq(i).val() + ">"));
        }
        return true;
    }
</script>
@stop
@stop
