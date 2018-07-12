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
                <span>{{ $langLbl['Book'] }}</span>
                <i class="fa fa-angle-right"></i>
            </li>
            <li>
                <span>{{ $langLbl['View'] }}</span>
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
            <i class="fa fa-pencil-square-o"></i> {{ $langLbl['View Booking'] }}
        </div>
    </div>
    <div class="portlet-body form">
        <form class="form-horizontal form-bordered form-row-stripped" role="form" method="post" action="{{ URL::route('company.store.store') }}" enctype="multipart/form-data">
            <input type="hidden" name="book_id" value="{{ $company->id }}"/>
            <div class="form-body">
                <?php
                if ($cart->status == 0)
                    $status = $langLbl['Pending'];
                elseif ($cart->status == 1)
                    $status = $langLbl['Complete'];
                elseif ($cart->status == 2)
                    $status = $langLbl['Cancelled'];
                elseif ($cart->status == 3)
                    $status = $langLbl['Booked'];
                $cart->status = $status;

                $options = unserialize($cart->options);
                ?>
                @foreach ([
                'service_name' => $langLbl['Service Name'], 
                'user_name' => $langLbl['Customer Name'],                   
                'address' => $langLbl['Address'],
                'book_date' => $langLbl['Booking Date'],
                'duration' => $langLbl['Duration'],
                'price' => $langLbl['Price'],
                'status'=> $langLbl['Status'],
                'message' => $langLbl['Message'],                    
                ] as $key => $value)

                <div class="form-group">
                    <label class="col-sm-3 control-label">{{ Form::label($key, $value) }}&nbsp; {{$key == 'price' ? '&euro;' : ''}}</label>
                    @if($key == 'service_name')
                    <div class="col-md-9">
                        <span class="form-control">{{$cart->store->name}}</span>
                    </div>
                    @elseif($key == 'user_name')          	
                    <div class="col-md-9">
                        <span class="form-control">{{$cart->user->name}}</span>
                    </div>
                    @elseif($key == 'address')
                    <div class="col-md-9">
                        <span class="form-control">
                            @if($cart->user_address != '')
                            <strong class="color-default">{{ $langLbl["Customers Address"] }} : </strong>
                            <span>{{$cart->user_address}}</span>
                            @elseif ($cart->office_id != '')
                            <strong class="color-default">{{$cart->office->name}}</strong>
                            <span>( {{$cart->office->address}} )</span>
                            @endif
                        </span>
                    </div>
                    @elseif($key == 'message')
                    <div class="col-md-9">
                        <textarea class="form-control readonly" readonly>{{ $cart->{$key} }}</textarea>
                    </div>
                    @elseif($key == 'duration')
                    <div class="col-md-9">
                        <span class="form-control">{{$options['service_available'] == 1 ? $cart->duration.'min' : $options['delivery_days'].'days'}}</span>
                    </div>
                    @elseif($key == 'book_date')
                    <div class="col-md-9">
                        <span class="form-control">{{$options['service_available'] == 1 ? $cart->book_date : date('Y-m-d',strtotime($cart->created_at))}}</span>
                    </div>
                    @else
                    <div class="col-md-9">
                        <span class="form-control">{{ $cart->{$key} }}</span>
                    </div>
                    @endif

                </div>
                @endforeach		
            </div>
            <div class="form-actions fluid">
                <div class="col-sm-12 text-center">
                    <a href="{{ URL::route('company.book.delete', $cart->id) }}" class="btn btn-success" id="js-a-delete">
                        <span class="glyphicon glyphicon-trash"></span> {{ $langLbl['Delete'] }}
                    </a>
                    <a href="{{ URL::route('company.book') }}" class="btn btn-primary">
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
@stop

@stop
