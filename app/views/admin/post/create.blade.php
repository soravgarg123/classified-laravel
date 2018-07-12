@extends('admin.layout')

@section('custom-styles')]
<style>
    #map-canvas {
        height: 300px;
    }
</style>
{{ HTML::style('/assets/metronic/global/plugins/bootstrap-fileinput/bootstrap-fileinput.css') }}
{{ HTML::style('/assets/metronic/global/plugins/jquery-tags-input/jquery.tagsinput.css') }}
{{ HTML::style('/assets/metronic/global/plugins/bootstrap-wysihtml5/bootstrap-wysihtml5.css') }}
@stop

@section('breadcrumb')
<div class="row">
    <div class="col-md-12">
        <ul class="page-breadcrumb breadcrumb">
            <li>
                <i class="fa fa-home"></i>
                <span>{{ $langLbl['Post'] }}</span>
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
            <i class="fa fa-pencil-square-o"></i> {{ $langLbl['Create Post'] }}
        </div>
    </div>
    <div class="portlet-body form">
        <form class="form-horizontal form-bordered form-row-stripped" role="form" method="post" action="{{ URL::route('admin.post.store') }}" enctype="multipart/form-data" id="acceptForm">
            <div class="form-body">            
                @foreach ([
                'post_title' => $langLbl['Title'],
                'featured_image'=> $langLbl['Featured Image'],
                'post_content' => $langLbl['Description']
                ] as $key => $value)
                <div class="form-group">
                    <label class="col-sm-3 control-label" data-key="{{$key}}" style="display:{{$key == 'delivery_days' || $key == 'delivery_place' || $key == 'office_range' || $key == 'discount_price' ? 'none' : 'block'}}">{{ Form::label($key, $value) }} {{$key == 'price' || $key == 'discount_price' ? '&euro;' : ''}}</label>

                    <div class="col-sm-9" style="display:{{$key == 'delivery_days' || $key == 'delivery_place' || $key == 'office_range' || $key == 'discount_price' ? 'none' : 'block'}}">
                        @if ($key == 'post_content')
                        <textarea class="wysihtml5 form-control" rows="3" name="{{ $key }}" data-error-container="#editor1_error" maxlength="1200" minlength="80" id="post_content"></textarea>                        
                        <span class="required">min:80 characters, max:1200 characters</span>
                        <div id="editor1_error"></div>
                        @elseif ($key == 'featured_image')
                        <div class="fileinput fileinput-new" data-provides="fileinput">
                            <div class="fileinput-new thumbnail" style="width: 120px; height: 120px;">
                                <img src="{{ HTTP_COMPANY_PATH }}no_image.gif " alt=""/>
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
                        @else
                        <input type="text" class="form-control" name="{{ $key }}" value="">
                        @endif
                    </div>
                </div>
                @endforeach
                <!-- START CATEGORY -->
                <div class="form-group" id="js-div-sub-category">
                    <label class="col-sm-3 control-label">{{ $langLbl['Category'] }}</label>
                    <div class="col-md-9">
                        @foreach ($categories as $category)
                        <div class="col-md-3">				               
                            <p>
                                <input type="checkbox" class="form-control" id="js-checkbox-sub-category" value="{{ $category->id }}" >&nbsp;{{ $category->name }}
                            </p>
                        </div>
                        @endforeach                    
                    </div>
                </div>

                <!-- / END CATEGORY -->
            </div>
            <div class="form-actions fluid">
                <div class="col-sm-12 text-center">
                    <button type="submit"  class="btn btn-success">
                        <span class="glyphicon glyphicon-ok-circle"></span> {{ $langLbl['Save'] }}
                    </button>
                    <a href="{{ URL::route('admin.post') }}" class="btn btn-primary">
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

<script>
    $(document).ready(function() {
        ComponentsFormTools.init();
        FormValidation.init();
    });

    function validate() {
        if ($("select[name='office_id']").val() == '') {
            bootbox.alert("{{ $langLbl['Please select the office'] }}");
            return false;
        }

        var objList = $("input#js-checkbox-sub-category:checked");
        for (var i = 0; i < objList.length; i++) {
            $("div#js-div-sub-category").append($("<input type='hidden' name='sub_category[]' value=" + objList.eq(i).val() + ">"));
        }
        return true;
    }

</script>

@stop

@stop
