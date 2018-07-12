@extends('admin.layout')

@section('breadcrumb')
<div class="row">
    <div class="col-md-12">
        <h3 class="page-title">{{ $langLbl['Category Management'] }}</h3>
        <ul class="page-breadcrumb breadcrumb">
            <li>
                <i class="fa fa-home"></i>
                <span>{{ $langLbl['Category'] }}</span>
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
<?php if (isset($alert)) { ?>
    <div class="alert alert-<?php echo $alert['type']; ?> alert-dismissibl fade in">
        <button type="button" class="close" data-dismiss="alert">
            <span aria-hidden="true">&times;</span>
            <span class="sr-only">{{ $langLbl['Close'] }}</span>
        </button>
        <p>
            <?php echo $alert['msg']; ?>
        </p>
    </div>
<?php } ?>

<div class="portlet box blue">
    <div class="portlet-title">
        <div class="caption">
            <i class="fa fa-navicon"></i> {{ $langLbl['Category List'] }}
        </div>
        <div class="actions">
            <a href="{{ URL::route('admin.category.create') }}" class="btn btn-default btn-sm">
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
                    <th class="text-center">{{ $langLbl['Icon'] }}</th>
                    <th>{{ $langLbl['Sub Categories'] }}</th>
                    <th>{{ $langLbl['Description'] }}</th>
                    <th>{{ $langLbl['Created At'] }}</th>
                    <th class="th-action">{{ $langLbl['Edit'] }}</th>
                    <th class="th-action">{{ $langLbl['Delete'] }}</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($categories as $key => $value)
                <tr>
                    <td>{{ ((Input::has('page') ? Input::get('page') : 1) - 1 ) * PAGINATION_SIZE + ($key + 1) }}</td>
                    <td>{{ $value->name }}</td>
                    <td class="text-center"><i class="{{ $value->icon }}"></i></td>
                    <td>{{ count($value->subCategories) }}</td>
                    <td>{{ $value->description }}</td>
                    <td>{{ $value->created_at }}</td>
                    <td>
                        <a href="{{ URL::route('admin.category.edit', $value->id) }}" class="btn btn-sm btn-info">
                            <span class="glyphicon glyphicon-edit"></span> {{ $langLbl['Edit'] }}
                        </a>
                    </td>
                    <td>
                        <a href="{{ URL::route('admin.category.delete', $value->id) }}" class="btn btn-sm btn-danger" id="js-a-delete">
                            <span class="glyphicon glyphicon-trash"></span> {{ $langLbl['Delete'] }}
                        </a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <div class="pull-right">{{ $categories->links() }}</div>
        <div class="clearfix"></div>
    </div>
</div>    
@stop

@stop
