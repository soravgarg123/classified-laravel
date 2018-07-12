@extends('admin.layout')

@section('breadcrumb')
<div class="row">
    <div class="col-md-12">
        <h3 class="page-title">{{ $langLbl['User Management'] }}</h3>
        <ul class="page-breadcrumb breadcrumb">
            <li>
                <i class="fa fa-home"></i>
                <span>{{ $langLbl['User'] }}</span>
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
            <i class="fa fa-navicon"></i> {{ $langLbl['User List'] }}
        </div>
        <div class="actions">
            <a href="{{ URL::route('admin.user.create') }}" class="btn btn-default btn-sm">
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
                    <th>{{ $langLbl['Email'] }}</th>
                    <th>{{ $langLbl['Phone'] }}</th>
                    <th>{{ $langLbl['Created At'] }}</th>
                    <th>{{ $langLbl['Status'] }}</th>
                     <th>{{ $langLbl['action'] }}</th>
                    <th class="th-action">{{ $langLbl['Edit'] }}</th>
                    <th class="th-action">{{ $langLbl['Delete'] }}</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $key => $value)
                <tr>
                    <td>{{ ((Input::has('page') ? Input::get('page') : 1) - 1 ) * PAGINATION_SIZE + ($key + 1) }}</td>
                    <td>{{ $value->name }}</td>
                    <td>{{ $value->email }}</td>
                    <td>{{ $value->phone }}</td>
                    <td>{{ $value->created_at }}</td>
                    <td>
                        <?php
                            if($value->is_active){
                                echo "Active";
                            }else{
                                echo "Inactive";
                            }
                        ?>
                    </td>
                    <td>
                    <?php 
                        if($value->suspend == 0){ // block - 0 ?>
                            <a title="Click here to unblock" href="{{ URL::route('admin.user.unblock', $value->id) }}" class="btn btn-sm btn-info">
                                <span class="fa fa-times"></span>
                            </a>
                    <?php }else{ // unblock - 1 ?>
                            <a title="Click here to block" href="{{ URL::route('admin.user.block', $value->id) }}" class="btn btn-sm btn-info">
                                <span class="fa fa-check"></span>
                            </a>
                    <?php  } ?>
                    </td>
                    <td>
                        <a href="{{ URL::route('admin.user.edit', $value->id) }}" class="btn btn-sm btn-info">
                            <span class="glyphicon glyphicon-edit"></span> {{ $langLbl['Edit'] }}
                        </a>
                    </td>
                    <td>
                        <a href="{{ URL::route('admin.user.delete', $value->id) }}" class="btn btn-sm btn-danger" id="js-a-delete">
                            <span class="glyphicon glyphicon-trash"></span> {{ $langLbl['Delete'] }}
                        </a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <div class="pull-right">{{ $users->links() }}</div>
        <div class="clearfix"></div>
    </div>
</div>    
@stop

@stop
