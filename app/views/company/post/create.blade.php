@extends('company.layout')

@section('custom-styles')]
<style>
    #map-canvas {
        height: 300px;
    }
</style>
{{ HTML::style('/assets/metronic/global/plugins/bootstrap-fileinput/bootstrap-fileinput.css') }}
{{ HTML::style('/assets/metronic/global/plugins/jquery-tags-input/jquery.tagsinput.css') }}
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
    {{ $error }} </br>
    @endforeach
</div>
@endif

<div class="portlet box red">
    <div class="portlet-title">
        <div class="caption">
            <i class="fa fa-pencil-square-o"></i> {{ $langLbl['Create Post'] }}
        </div>
    </div>
    <div class="portlet-body form">
        <form class="form-horizontal form-bordered form-row-stripped" role="form" method="post" action="{{ URL::route('company.post.store') }}" enctype="multipart/form-data" id="acceptForm">
            <input type="hidden" name="company_id" value="{{ $company->id }}"/>
            <div class="form-body">
				<div class="form-group">
                    <label class="col-sm-3 control-label">{{ $langLbl['Name'] }}</label>
                    <div class="col-sm-9">
						<div class="portlet box"> 
							<div class="portlet-body">
								<div class="tabbable-custom">
									<ul class="nav nav-tabs">
										@if($siteLanguage)
											@foreach ($siteLanguage as $lkey=>$rvalue)
												<li class="@if(empty($rvalue)) active  @endif">
													 <a data-toggle="tab" href="#tab_post_title_{{ $langLbl[$lkey] }}">{{ Ucfirst($langLbl[$lkey]) }}</a>
												</li>
											@endforeach
										@endif 
									</ul>
									<div class="tab-content">
										@if($siteLanguage)
											@foreach ($siteLanguage as $lkey=>$rvalue)
												<div id="tab_post_title_{{ $langLbl[$lkey] }}" class="tab-pane @if(empty($rvalue)) active  @endif">
													 {{ Form::text('post_title'.$rvalue, null, ['class' => 'form-control']) }}
												</div>
											@endforeach
										@endif 
									</div>
								</div>
							</div>	
						</div>
					</div>
				</div>	
                <!-- START CATEGORY -->
                <div class="form-group" id="js-div-sub-category">
                    <label class="col-sm-3 control-label">{{ $langLbl['Category'] }}</label>
                    <div class="col-md-9">  
                    <select class="form-control" name="sub_category">
                        <option value="">{{ $langLbl['Select'] }} {{ $langLbl['Category'] }}</option>
                        @foreach ($categories as $category)
                        <div class="col-md-3">
                            <p>
                               <option value="{{ $category->id }}">{{ $category->name }}</option>
                            </p>
                        </div>
                        @endforeach 
                    </select>                   
                    </div>
                </div>

                <!-- / END CATEGORY -->
				 <div class="form-group">
                    <label class="col-sm-3 control-label">{{ $langLbl['Description'] }}</label>
                    <div class="col-sm-9">
						<div class="portlet box"> 
							<div class="portlet-body">
								<div class="tabbable-custom">
									<ul class="nav nav-tabs">
										@if($siteLanguage)
											@foreach ($siteLanguage as $lkey=>$rvalue)
												<li class="@if(empty($rvalue)) active  @endif">
													 <a data-toggle="tab" href="#tab_post_content_{{ $langLbl[$lkey] }}">{{ Ucfirst($langLbl[$lkey]) }}</a>
												</li>
											@endforeach
										@endif 
									</ul>
									<div class="tab-content">
										@if($siteLanguage)
											@foreach ($siteLanguage as $lkey=>$rvalue)
												<div id="tab_post_content_{{ $langLbl[$lkey] }}" class="tab-pane @if(empty($rvalue)) active  @endif">
													<textarea class="form-control" rows="3" name="{{ 'post_content'.$rvalue }}" data-error-container="#editor1_error"  id="description"></textarea>       
													<div id="editor1_error"></div>
												</div>
											@endforeach
										@endif 
									</div>
								</div>
							</div>	
						</div>
					</div>
				</div>	
                        
                @foreach ([
                'featured_image'=> $langLbl['Featured Image'],
                ] as $key => $value)
                <div class="form-group">
                    <label class="col-sm-3 control-label" data-key="{{$key}}" style="display:{{$key == 'delivery_days' || $key == 'delivery_place' || $key == 'office_range' || $key == 'discount_price' ? 'none' : 'block'}}">{{ Form::label($key, $value) }} {{$key == 'price' || $key == 'discount_price' ? '&euro;' : ''}}</label>

                    <div class="col-sm-9" style="display:{{$key == 'delivery_days' || $key == 'delivery_place' || $key == 'office_range' || $key == 'discount_price' ? 'none' : 'block'}}">
                        @if ($key == 'post_content')
                        <textarea class="wysihtml5 form-control" rows="7" name="{{ $key }}" data-error-container="#editor1_error" maxlength="1200" minlength="80" id="post_content"></textarea>                        
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
                
            </div>
            <div class="form-actions fluid">
                <div class="col-sm-12 text-center">
                    <button type="submit"  class="btn btn-success">
                        <span class="glyphicon glyphicon-ok-circle"></span> {{ $langLbl['Save'] }}
                    </button>
                    <a href="{{ URL::route('company.post') }}" class="btn btn-primary">
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
