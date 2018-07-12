@extends('admin.layout')

@section('custom-styles')]

{{ HTML::style('/assets/metronic/global/plugins/bootstrap-fileinput/bootstrap-fileinput.css') }}
{{ HTML::style('/assets/metronic/global/plugins/jquery-tags-input/jquery.tagsinput.css') }}
{{ HTML::style('/assets/metronic/global/plugins/bootstrap-wysihtml5/bootstrap-wysihtml5.css') }}
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
        <h3 class="page-title">{{ $langLbl['Terms'] }} {{ $langLbl['Management'] }}</h3>
        <ul class="page-breadcrumb breadcrumb">
            <li>
                <i class="fa fa-home"></i>
                <span>{{ $langLbl['Terms'] }}</span>
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
            <i class="fa fa-plus"></i> {{ $langLbl['Add'] }} {{ $langLbl['Terms'] }}
        </div>
    </div>
    <div class="portlet-body form">
    <?php
        $key = 'contenten';
        $key1 = 'contentit';
        $key2 = 'contentes';
        $value = $langLbl['Content']." (English)";
        $value1 = $langLbl['Content']." (Italian)";
        $value2 = $langLbl['Content']." (Spanish)";
        $key3 = 'titleen';
        $key4 = 'titleit';
        $key5 = 'titlees';
        $value3 = $langLbl['Title']." (English)";
        $value4 = $langLbl['Title']." (Italian)";
        $value5 = $langLbl['Title']." (Spanish)";
    ?>
        <form class="form-horizontal form-bordered form-row-stripped" role="form" method="post" action="{{ URL::route('admin.terms.store') }}" enctype="multipart/form-data">
            <div class="form-group">
                <label class="col-sm-3 control-label">{{ Form::label($key3, $value3) }}</label>
                <div class="col-sm-9">
                    <input type="text" required class="form-control" name="{{ $key3 }}" />
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-3 control-label">{{ Form::label($key4, $value4) }}</label>
                <div class="col-sm-9">
                    <input type="text" required class="form-control" name="{{ $key4 }}" />
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-3 control-label">{{ Form::label($key5, $value5) }}</label>
                <div class="col-sm-9">
                    <input type="text" required class="form-control" name="{{ $key5 }}" />
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-3 control-label">{{ Form::label($key, $value) }}</label>
                <div class="col-sm-9">
                    <textarea required class="form-control" name="{{ $key }}" rows="3"></textarea>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-3 control-label">{{ Form::label($key1, $value1) }}</label>
                <div class="col-sm-9">
                    <textarea required class="form-control" name="{{ $key1 }}" rows="3"></textarea>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-3 control-label">{{ Form::label($key2, $value2) }}</label>
                <div class="col-sm-9">
                    <textarea required class="form-control" name="{{ $key2 }}" rows="3"></textarea>
                </div>
            </div>
            <div class="form-actions fluid">
                <div class="col-sm-12 text-center">
                    <button class="btn btn-success">
                        <span class="glyphicon glyphicon-ok-circle"></span> {{ $langLbl['Save'] }}
                    </button>
                    <a href="{{ URL::route('admin.terms') }}" class="btn btn-primary">
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
{{ HTML::script('/assets/metronic/global/plugins/jquery-tags-input/jquery.tagsinput.js') }}
{{ HTML::script('/assets/metronic/global/plugins/bootstrap-wysihtml5/wysihtml5-0.3.0.js') }}
{{ HTML::script('/assets/metronic/global/plugins/bootstrap-wysihtml5/bootstrap-wysihtml5.js') }}
{{ HTML::script('/assets/metronic/admin/pages/scripts/form-validation.js') }}
<script src="https://maps.googleapis.com/maps/api/js?v=3.exp&signed_in=true"></script>
<script type="text/javascript">
    $('textarea').wysihtml5();
</script>
@stop
@stop
