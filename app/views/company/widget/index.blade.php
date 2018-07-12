@extends('company.layout')

@section('custom-styles')
{{ HTML::style('/assets/metronic/global/plugins/bootstrap-fileinput/bootstrap-fileinput.css') }}
{{ HTML::style('/assets/css/bootstrap-colorpicker.min.css') }}
@stop

@section('breadcrumb')
<div class="row">
    <div class="col-md-12">
        <ul class="page-breadcrumb breadcrumb">
            <li>
                <i class="fa fa-home"></i>
                <span>{{ $langLbl['Setting'] }}</span>
            </li>
        </ul>
    </div>
</div>
@stop

@section('content')
<div class="portlet box red">
    <div class="portlet-title">
        <div class="caption">
            <i class="fa fa-pencil-square-o"></i> {{ $langLbl['Setting'] }}
        </div>
    </div>
    <div class="portlet-body form">
        <form class="form-horizontal form-bordered form-row-stripped" method="post" action="{{ URL::route('company.widget.store') }}" enctype="multipart/form-data">
            <div class="form-body">
                <div class="form-group">
                    <label class="col-sm-3 control-label">{{ $langLbl['Logo'] }}</label>
                    <div class="col-sm-6">
                        <div class="fileinput fileinput-new" data-provides="fileinput">
                            <div class="fileinput-new thumbnail" style="width: 100px; height: 100px;">
                                <img src="{{ ($company->widget) ? HTTP_LOGO_PATH.$company->widget->logo : HTTP_LOGO_PATH.DEFAULT_PHOTO }}" alt=""/>
                            </div>
                            <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 100px; max-height: 100px;"></div>
                            <div>
                                <span class="btn default btn-file">
                                    <span class="fileinput-new">{{ $langLbl['Select image'] }}</span>
                                    <span class="fileinput-exists">{{ $langLbl['Change'] }}</span>
                                    <input type="file" name="logo">
                                </span>
                                <a href="#" class="btn red fileinput-exists" data-dismiss="fileinput">{{ $langLbl['Remove'] }}</a>
                            </div>
                        </div>                    
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-3 control-label">Color</label>
                    <div class="col-sm-6">
                        <div class="input-group" id="js-div-color">
                            <input type="text" name="color" value="{{ ($company->widget) ? $company->widget->color : DEFAULT_WIDGET_COLOR }}" class="form-control readonly" readonly/>
                            <span class="input-group-addon"><i></i></span>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-3 control-label">Header</label>
                    <div class="col-sm-6">
                        <div class="input-group" id="js-div-header">
                            <input type="text" name="header" value="{{ ($company->widget) ? $company->widget->header : DEFAULT_WIDGET_HEADER }}" class="form-control readonly" readonly/>
                            <span class="input-group-addon"><i></i></span>
                        </div>
                    </div>
                </div>                

                <div class="form-group">
                    <label class="col-sm-3 control-label">Background</label>
                    <div class="col-sm-6">
                        <div class="input-group" id="js-div-background">
                            <input type="text" name="background" value="{{ $company->widget ? $company->widget->background : DEFAULT_WIDGET_BACKGROUND }}" class="form-control readonly" readonly/>
                            <span class="input-group-addon"><i></i></span>
                        </div>                          
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-3 control-label">{{ $langLbl['Header and Footer'] }}</label>
                    <div class="col-sm-6">
                        <select class="form-control" name="is_header">
                            <option value="1" {{ $company->widget && $company->widget->is_header ? 'selected' : '' }}>{{ $langLbl['Show'] }}</option>
                            <option value="0" {{ $company->widget && !$company->widget->is_header ? 'selected' : '' }}>{{ $langLbl['Hide'] }}</option>
                        </select>                          
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-3 control-label">{{ $langLbl['Custom CSS'] }}</label>
                    <div class="col-sm-8">
                        <textarea class="form-control" name="custom_css" rows="10">{{ $company->widget ? $company->widget->custom_css : '' }}</textarea>                          
                    </div>
                </div>                

                <div class="form-group">
                    <label class="col-sm-3 control-label">{{ $langLbl['Registration Widget'] }}</label>
                    <div class="col-sm-9">
                        <p>
                            <textarea class="form-control readonly" readonly><iframe width='800' height='600' src='{{ URL::route('widget.registration.home', $company->token) }}' frameborder='0'></iframe></textarea>
                        </p>
                        <p>
                            <input type="text" class="form-control readonly" readonly value="{{ URL::route('widget.registration.home', $company->token) }}">
                        </p>                        
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-3 control-label">{{ $langLbl['Offers Widget'] }}</label>
                    <div class="col-sm-9">
                        <p>
                            <textarea class="form-control readonly" readonly><iframe width='800' height='600' src='{{ URL::route('widget.offer.home', $company->token) }}' frameborder='0'></iframe></textarea>
                        </p>
                        <p>
                            <input type="text" class="form-control readonly" readonly value="{{ URL::route('widget.offer.home', $company->token) }}">                        
                        </p>
                    </div>
                </div>                

                <div class="form-group">
                    <div class="col-sm-9 col-sm-offset-3 text-center">
                        <button type="submit" class="btn red">
                            <i class="fa fa-check-circle-o"></i> {{ $langLbl['Update'] }}
                        </button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
@stop

@section('custom-scripts')
{{ HTML::script('/assets/js/bootstrap-colorpicker.min.js') }}
{{ HTML::script('/assets/metronic/global/plugins/bootstrap-fileinput/bootstrap-fileinput.js') }}
<script>
    $(document).ready(function() {
        $('#js-div-color').colorpicker();
        $('#js-div-header').colorpicker();
        $('#js-div-background').colorpicker();
    });

</script>
@stop

@stop
