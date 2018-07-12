@extends('admin.layout')

@section('breadcrumb')
<div class="row">
    <div class="col-md-12">
        <h3 class="page-title">{{ $langLbl['Plan Management'] }}</h3>
        <ul class="page-breadcrumb breadcrumb">
            <li>
                <i class="fa fa-home"></i>
                <span>{{ $langLbl['Plan'] }}</span>
                <i class="fa fa-angle-right"></i>
            </li>
            <li>
                <span>{{ $langLbl['List'] }}</span>
            </li>
        </ul>

    </div>
</div>    
@stop

@section('content')
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

<div class="portlet box blue">
    <div class="portlet-title">
        <div class="caption">
            <i class="fa fa-navicon"></i> {{ $langLbl['Plan List'] }}
        </div>
        <div class="actions">
            <a href="{{ URL::route('admin.plan.create') }}" class="btn btn-default btn-sm">
                <span class="glyphicon glyphicon-plus"></span>&nbsp;{{ $langLbl['Create'] }}
            </a>								    
        </div>
    </div>
    <div class="portlet-body ">
        <table class="table table-striped table-bordered table-hover">
            <thead>
                <tr>
                    <th>#</th>
                    <th>{{ $langLbl['Name'] }}</th>
                    <th>{{ $langLbl['Price'] }}</th>
                    <th>{{ $langLbl['Code'] }}</th>
                    <th>{{ $langLbl['Type'] }}</th>                    
                    <th>{{ $langLbl['Created At'] }}</th>
                    <th class="th-action">{{ $langLbl['Edit'] }}</th>
                    <th class="th-action">{{ $langLbl['Delete'] }}</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($plans as $key => $value)
                <tr>
                    <td>{{ ((Input::has('page') ? Input::get('page') : 1) - 1 ) * PAGINATION_SIZE + ($key + 1) }}</td>
                    <td>{{ $value->name }}</td>
                    <td>{{ $value->price }}</td>
                    <td>{{ $value->code }}</td>
                    <td>{{ $value->type == 'py' ? 'Per Year' : 'Per Service'}}</td>                        
                    <td>{{ $value->created_at }}</td>
                    <td>
                        <a href="{{ URL::route('admin.plan.edit', $value->id) }}" class="btn btn-sm btn-info">
                            <span class="glyphicon glyphicon-edit"></span> {{ $langLbl['Edit'] }}
                        </a>
                    </td>
                    <td>
                        <a href="{{ URL::route('admin.plan.delete', $value->id) }}" class="btn btn-sm btn-danger" id="js-a-delete">
                            <span class="glyphicon glyphicon-trash"></span> {{ $langLbl['Delete'] }}
                        </a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <div class="pull-right">{{ $plans->links() }}</div>
        <div class="clearfix"></div>
    </div>
</div>    
@stop

@stop
