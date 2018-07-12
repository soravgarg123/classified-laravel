@extends('company.layout')

@section('custom-styles')
{{ HTML::style('/assets/metronic/global/plugins/bootstrap-datepicker/css/datepicker3.css') }}
@stop

@section('breadcrumb')
<div class="row">
    <div class="col-md-12">
        <ul class="page-breadcrumb breadcrumb">
            <li>
                <i class="fa fa-home"></i>
                <span>{{ $langLbl['Offer'] }}</span>
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

<div class="portlet box red">
    <div class="portlet-title">
        <div class="caption">
            <i class="fa fa-pencil-square-o"></i> {{ $langLbl['Create Offer'] }}
        </div>
    </div>
    <div class="portlet-body form">
        <form class="form-horizontal form-bordered form-row-stripped" role="form" method="post" action="{{ URL::route('company.offer.store') }}" enctype="multipart/form-data">
            <div class="form-body">
                <input type="hidden" name="is_review" value="0"/>
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
													 <a data-toggle="tab" href="#tab_name_{{ $langLbl[$lkey] }}">{{ Ucfirst($langLbl[$lkey]) }}</a>
												</li>
											@endforeach
										@endif 
									</ul>
									<div class="tab-content">
										@if($siteLanguage)
											@foreach ($siteLanguage as $lkey=>$rvalue)
												<div id="tab_name_{{ $langLbl[$lkey] }}" class="tab-pane @if(empty($rvalue)) active  @endif">
													    {{ Form::text('name'.$rvalue, null, ['class' => 'form-control']) }}
												</div>
											@endforeach
										@endif 
									</div>
								</div>
							</div>	
						</div>
					</div>
				</div>	
                  
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
													 <a data-toggle="tab" href="#tab_description_{{ $langLbl[$lkey] }}">{{ Ucfirst($langLbl[$lkey]) }}</a>
												</li>
											@endforeach
										@endif 
									</ul>
									<div class="tab-content">
										@if($siteLanguage)
											@foreach ($siteLanguage as $lkey=>$rvalue)
												<div id="tab_description_{{ $langLbl[$lkey] }}" class="tab-pane @if(empty($rvalue)) active  @endif">
													  <textarea class="wysihtml5 form-control" rows="3" name="{{ 'description'.$rvalue }}" data-error-container="#editor1_error"  id="description"></textarea>       
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
                'price' => $langLbl['Price'],
                'expire_at' => $langLbl['Expire At'],
                'photo' => $langLbl['Photo']
                ] as $key => $value)
                @if ($key == 'description')
                <div class="form-group">
                    <label class="col-sm-3 control-label">{{ Form::label($key, $value) }}</label>
                    <div class="col-sm-9">
                        <textarea class="form-control" name="{{ $key }}"></textarea>
                    </div>
                </div>
                @elseif ($key == 'photo')
                <div class="form-group">
                    <label class="col-sm-3 control-label">{{ Form::label($key, $value) }}</label>
                    <div class="col-sm-9">
                        <input type="file" class="form-control" name="{{ $key }}">
                    </div>
                </div>
                @else
                <div class="form-group">
                    <label class="col-sm-3 control-label">{{ Form::label($key, $value) }}</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" name="{{ $key }}">
                    </div>
                </div>                               
                @endif
                @endforeach
            </div>
            <div class="form-actions fluid">
                <div class="col-sm-12 text-center">
                    <button class="btn btn-success">
                        <span class="glyphicon glyphicon-ok-circle"></span> {{ $langLbl['Save'] }}
                    </button>
                    <a href="{{ URL::route('company.offer') }}" class="btn btn-primary">
                        <span class="glyphicon glyphicon-share-alt"></span> {{ $langLbl['Back'] }}
                    </a>
                </div>
            </div>            
        </form>
    </div>
</div>
@stop

@section('custom-scripts')
{{ HTML::script('/assets/metronic/global/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js') }}
<script>
    $(document).ready(function() {
        $("input[name='expire_at']").datepicker({format: 'yyyy-mm-dd'});
    });
</script>
@stop

@stop
