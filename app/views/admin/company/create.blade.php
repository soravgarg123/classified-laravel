@extends('admin.layout')

@section('custom-styles')]

{{ HTML::style('/assets/metronic/global/plugins/bootstrap-fileinput/bootstrap-fileinput.css') }}
{{ HTML::style('/assets/metronic/global/plugins/select2/select2.css') }}
{{ HTML::style('/assets/css/bootstrap-multiselect.css') }}
<style>
    span.multiselect-selected-text{
        float:left !important;
    }
    b.caret{
        float:right !important;
        margin-top:8px;
    }
</style>
@stop

@section('breadcrumb')
<div class="row">
    <div class="col-md-12">
        <h3 class="page-title">{{ $langLbl['Professional Management'] }}</h3>
        <ul class="page-breadcrumb breadcrumb">
            <li>
                <i class="fa fa-home"></i>
                <span>{{ $langLbl['Professional'] }}</span>
                <i class="fa fa-angle-right"></i>
            </li>
            <li>
                <span>{{ $langLbl['Create'] }}</span>
            </li>
        </ul>

    </div>
</div>    
@stop

@section('content')
<?php
$nameVal = 'name' . $currentLanguage;
$short_nameVal = 'short_name' . $currentLanguage;
?>
@if ($errors->has())
<div class="alert alert-danger alert-dismissibl fade in">
    <button type="button" class="close" data-dismiss="alert">
        <span aria-hidden="true">&times;</span>
        <span class="sr-only">{{ $langLbl['Close'] }}</span>
    </button>
    @foreach ($errors->all() as $error)
    {{ $error }}		
    @endforeach
</div>
@endif

<div class="portlet box blue">
    <div class="portlet-title">
        <div class="caption">
            <i class="fa fa-pencil-square-o"></i> {{ $langLbl['Add Professional'] }}
        </div>
    </div>
    <div class="portlet-body form">
        <form class="form-horizontal form-bordered form-row-stripped" role="form" method="post" action="{{ URL::route('admin.company.store') }}" enctype="multipart/form-data">
            <div class="form-body">   
                @foreach ([
                'name' => $langLbl['Name'],
                'email' => $langLbl['Email'],
                'category' => $langLbl['Category'],
                'password' => $langLbl['Password'],
                'country'=> $langLbl['Country'],
                'languages'=> $langLbl['Languages'], 
                'phone' => $langLbl['Phone'],
                'rate'=> $langLbl['Hourly Rate'],
                'register'=> $langLbl['Registered to'],
                'city'=> $langLbl['City of College or Order'],
                'user_key'=> $langLbl['Registration Number'],
                'vat_id' => $langLbl['VAT ID'],
                'keyword' => $langLbl['Keyword'],
                'photo' => $langLbl['Photo'],                                        
                ] as $key => $value)
                <div class="form-group">
                    <label class="col-sm-3 control-label">{{ Form::label($key, $value) }}</label>
                    <div class="col-sm-9">
                        @if ($key == 'photo')
                        <div class="fileinput fileinput-new" data-provides="fileinput">
                            <div class="fileinput-new thumbnail" style="width: 120px; height: 120px;">
                                <img src="{{ HTTP_COMPANY_PATH.DEFAULT_PHOTO }} " alt=""/>
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
                        @elseif ($key == 'category')
                        <select id="cat_sel" multiple="multiple" name="sub_category[]">
                            @foreach ($categories as $category)									                
                            <optgroup label="{{ $category->name }}">
                                @foreach ($category->subClasses as $subCategory)
                                <option value="{{$subCategory->id}}">&nbsp; {{$subCategory->name}}</option>
                                @endforeach
                                @endforeach
                        </select>
                        @elseif ($key == 'password')
                        <input type="password" class="form-control" name="{{ $key }}">
                        @elseif ($key == 'description')
                        <div class="form-group">							
                            <textarea class="form-control" name="{{ $key }}" rows="3"></textarea>							
                        </div>
                        @elseif ($key == 'country')
                        <select name="{{$key}}" id="select2_sample4" class="form-control select2">
                            @foreach($countries as $c)
                            <option value="{{$c->iso2}}" >{{$c->$short_nameVal}}</option>
                            @endforeach
                        </select>
                        @elseif ($key == 'rate')
                        <input type="text" class="form-control rate" placeholder="price in euro" name="{{$key}}" required/>
                        @elseif ($key == 'languages')

                        <select id="lng_sel" multiple="multiple" name="{{$key}}[]">
                            @foreach($languages as $l)
                            <option value="{{$l->alpha2}}" >{{$l->$nameVal}}</option>
                            @endforeach
                        </select>
                        @elseif($key == 'register')
                        <select name="{{$key}}" class="form-control" required>
                            @foreach([ 'Professional College' => $langLbl['Professional College'], 'Professional Order' => $langLbl['Professional Order'], 
                            'Bar Register' => $langLbl['Bar Register']] as $r => $v)
                            <option value="{{$r}}" >{{$v}}</option>
                            @endforeach
                        </select>
                        @else
                        <input type="text" class="form-control" name="{{ $key }}">
                        @endif
                    </div>
                </div>
                @endforeach

                @if($siteLanguage)
                @foreach ($siteLanguage as $lkey=>$rvalue)  
                <div class="form-group">
                    <label class="col-sm-3 control-label">{{ Form::label('description'.$rvalue, $langLbl['Description'].' ('.$langLbl[$lkey].')') }}</label>
                    <div class="col-sm-9">
                        <div class="form-group">							
                            <textarea class="form-control" name="<?php echo 'description' . $rvalue; ?>" rows="3"></textarea>							
                        </div> 
                    </div>
                </div>     
                @endforeach
                @endif                         
            </div>
            <div class="form-actions fluid">
                <div class="col-sm-12 text-center">
                    <button class="btn btn-success" onclick="return validate()">
                        <span class="glyphicon glyphicon-ok-circle"></span> {{ $langLbl['Save'] }}
                    </button>
                    <a href="{{ URL::route('admin.company') }}" class="btn btn-primary">
                        <span class="glyphicon glyphicon-share-alt"></span> {{ $langLbl['Back'] }}
                    </a>
                </div>
            </div>            
        </form>
    </div>
</div>
@stop

@section('custom-scripts')
{{ HTML::script('/assets/metronic/global/plugins/bootstrap-fileinput/bootstrap-fileinput.js') }}
{{ HTML::script('/assets/js/bootstrap-3.3.2.min.js') }}    
{{ HTML::script('/assets/js/bootstrap-multiselect.js') }}
{{ HTML::script('/assets/js/bootstrap-multiselect-collapsible-groups.js') }}

<script>
                        $(document).ready(function() {
                            $('#lng_sel').multiselect({
                                enableFiltering: true,
                                enableCaseInsensitiveFiltering: true,
                                maxHeight: 250,
                                buttonWidth: '100%',
                                enableClickableOptGroups: true,
                            });

                            $('#cat_sel').multiselect({
                                enableFiltering: true,
                                enableCaseInsensitiveFiltering: true,
                                maxHeight: 250,
                                buttonWidth: '100%',
                                enableClickableOptGroups: true,
                            });

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
