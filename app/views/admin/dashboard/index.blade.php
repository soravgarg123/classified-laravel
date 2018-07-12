@extends('admin.layout')

@section('breadcrumb')
<div class="row">
    <div class="col-md-12">
        <h3 class="page-title">{{ $langLbl['Dashboard'] }}</h3>
        <ul class="page-breadcrumb breadcrumb">
            <li>
                <i class="fa fa-home"></i>
                <span>{{ $langLbl['Dashboard'] }}</span>
            </li>
        </ul>
    </div>
</div>
@stop

@section('content')
{{ $langLbl['Dashboard will come soon!'] }}
@stop
@stop
