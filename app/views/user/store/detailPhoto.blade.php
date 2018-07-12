@extends('user.layout')

@section('custom-styles')
{{ HTML::style('/assets/metronic/global/plugins/bootstrap-fileinput/bootstrap-fileinput.css') }}
{{ HTML::style('//cdnjs.cloudflare.com/ajax/libs/ekko-lightbox/3.2.2/ekko-lightbox.min.css') }}
<style>
    .faq-tabbable i {
        color: #000 !important;
    }
</style>
@stop

@section('main')
<div class="container">
    <div class="row">
        <div class="col-sm-3 margin-top-sm">
            @include('user.store.info')
        </div>
        <div class="col-md-9 margin-top-normal">
            @include('user.store.topMenu')
            @if (isset($alert))
            <div class="alert alert-{{ $alert['type'] }} alert-dismissibl fade in">
                <button type="button" class="close" data-dismiss="alert">
                    <span aria-hidden="true">&times;</span>
                    <span class="sr-only">{{ $langLbl['Close'] }}</span>
                </button>
                <p>
                    {{ $alert['msg'] }}
                </p>
            </div>
            @endif 

            <div class="page-content">
                <div class="tab-content">
                    <div class="tab-pane active" id="company-photos">
                        <h2 class="padding-bottom-normal color-default">{{ $langLbl['Photos'] }}</h2>
                        @if ($is_valid)
                        <form method="post" action="{{ URL::route('user.uploadPhoto') }}" enctype='multipart/form-data'>
                            <input type="hidden" name="company_id" value="{{ $company->id }}"/>
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="fileinput fileinput-new" data-provides="fileinput">
                                        <div class="fileinput-new thumbnail" style="width: 400px; height: 200px;">
                                            <img src="http://www.placehold.it/400x200/EFEFEF/AAAAAA&amp;text=no+image" alt=""/>
                                        </div>
                                        <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 400px; max-height: 200px;"></div>

                                        <div>
                                            <span class="btn default btn-file">
                                                <span class="fileinput-new">{{ $langLbl['Select image'] }} </span>
                                                <span class="fileinput-exists">{{ $langLbl['Change'] }}</span>
                                                <input type="file" name="photo">
                                            </span>
                                            <a href="#" class="btn red fileinput-exists" data-dismiss="fileinput">{{ $langLbl['Remove'] }} </a>
                                        </div>
                                    </div>                            
                                </div>
                                <div class="col-sm-6">
                                    <textarea class="form-control" name="description" rows="11" placeholder="{{ $langLbl['Write feedback here'] }}..."></textarea>
                                    <button class="btn btn-primary pull-right margin-top-sm">Give Feedback</button>
                                </div>
                            </div>
                        </form>
                        @endif

                        <div class="row margin-top-normal">

                            @foreach ($company->photos as $photo)
                            <a href="{{ HTTP_REVIEW_PATH.$photo->photo }}" data-toggle="lightbox" data-gallery="multiimages" data-title="{{ $photo->description }}" class="col-sm-4">
                                <div class="thumbnail">
                                    <img class="img-responsive img-rounded" alt="" src="{{ HTTP_REVIEW_PATH.$photo->photo }}" style="height: 160px;">
                                    <p class="margin-top-xs pull-left">&nbsp;&nbsp;&nbsp;By <b><i>{{ $photo->user->name }}</i></b></p>
                                    <p class="margin-top-xs pull-right"><i class="fa fa-clock-o"></i> <b>{{ date(DATE_FORMAT, strtotime($photo->created_at)) }}</b>&nbsp;&nbsp;&nbsp;</p>
                                    <div class="clearfix"></div>
                                </div>                                        
                            </a>
                            @endforeach                            
                        </div>
                    </div>
                </div>
            </div>
        </div>            
    </div>
</div>
@stop

@section('custom-scripts')
{{ HTML::script('/assets/metronic/global/plugins/bootstrap-fileinput/bootstrap-fileinput.js') }}
{{ HTML::script('//cdnjs.cloudflare.com/ajax/libs/ekko-lightbox/3.2.2/ekko-lightbox.min.js') }}
<script>
    $(document).delegate('*[data-toggle="lightbox"]', 'click', function(event) {
        event.preventDefault();
        $(this).ekkoLightbox();
    });
</script>
@stop

@stop
