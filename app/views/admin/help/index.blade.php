@extends('admin.layout')

@section('breadcrumb')
<div class="row">
    <div class="col-md-12">
        <ul class="page-breadcrumb breadcrumb">
            <li>
                <i class="fa fa-home"></i>
                <span>{{ $langLbl['Help'] }}</span>
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
            <i class="fa fa-navicon"></i> {{ $langLbl['Help'] }} {{ $langLbl['List'] }}
        </div>
        <div class="actions">
            <a href="{{ URL::route('admin.help.create') }}" class="btn btn-default btn-sm">
                <span class="glyphicon glyphicon-plus"></span>&nbsp;Create
            </a>								    
        </div> 
    </div>
    <div class="portlet-body ">
        <table class="table table-striped table-bordered table-hover">
            <thead>
                <tr>
                    <th>#</th>
                    <th>{{ $langLbl['Title'] }}</th>
                    <th>{{ $langLbl['Content'] }}</th>
                    <th>{{ $langLbl['Created At'] }}</th>
                    <th class="th-action">{{ $langLbl['Edit'] }}</th>
                    <th class="th-action">{{ $langLbl['Delete'] }}</th>
                </tr>
            </thead>
             <tbody>
             <?php $currentLang = $_COOKIE['current_lang'];
                $column1 = "title".$currentLang;
                $column2 = "content".$currentLang;
              ?>
                @foreach ($help as $key => $value)
                <tr>
                    <td>{{ ($key + 1) }}</td>
                    <td>{{ $value->$column1}}</td>
                    <td>{{ $value->$column2}}</td>
                    <td>{{ $value->created_at }}</td>
                    <td>
                        <a href="{{ URL::route('admin.help.edit', $value->id) }}" class="btn btn-sm btn-info">
                            <span class="glyphicon glyphicon-edit"></span> {{ $langLbl['Edit'] }}
                        </a>
                    </td>
                    <td>
                        <a href="{{ URL::route('admin.help.delete', $value->id) }}" class="btn btn-sm btn-danger" id="js-a-delete">
                            <span class="glyphicon glyphicon-trash"></span> {{ $langLbl['Delete'] }}
                        </a>
                    </td>
                </tr>
                @endforeach
            </tbody> 
        </table>
    </div>
</div>
@stop
@stop