@extends('company.layout')

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

<div class="portlet box red">
    <div class="portlet-title">
        <div class="caption">
            <i class="fa fa-navicon"></i> {{ $langLbl['Purchase Offer List'] }}
        </div>
        <div class="actions">
            <a href="{{ URL::route('company.offer.purchase.create') }}" class="btn btn-default btn-sm">
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
                    <th>{{ $langLbl['Photo'] }}</th>
                    <th>{{ $langLbl['Description'] }}</th>
                    <th>{{ $langLbl['Expire At'] }}</th>
                    <th>{{ $langLbl['Revenue'] }}/{{ $langLbl['Received'] }}</th>
                    <th>{{ $langLbl['Created At'] }}</th>
                    <th class="th-action">{{ $langLbl['Solds'] }}</th>
                    <th class="th-action">{{ $langLbl['Edit'] }}</th>
                    <th class="th-action">{{ $langLbl['Delete'] }}</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($purchaseOffers as $key => $value)
                <tr>
                    <td>{{ ((Input::has('page') ? Input::get('page') : 1) - 1 ) * PAGINATION_SIZE + ($key + 1) }}</td>
                    <td>{{ $value->name }}</td>
                    <td><img src="{{ HTTP_OFFER_PATH.$value->photo }}" style="height: 40px;"></td>
                    <td>{{ $value->description }}</td>
                    <td>{{ $value->expire_at }}</td>
                    <td>
                        {{ count($value->userOffers) * $value->price }} /
                        {{ $value->received ? $value->received : '---' }}
                    </td>
                    <td>{{ $value->created_at }}</td>
                    <td>
                        <a href="{{ URL::route('company.offer.sold', $value->id) }}" class="btn btn-sm btn-success">
                            <i class="fa fa-list"></i> {{ $langLbl['Sold'] }}
                        </a>
                    </td>
                    <td>
                        <a href="{{ URL::route('company.offer.purchase.edit', $value->id) }}" class="btn btn-sm btn-info">
                            <span class="glyphicon glyphicon-edit"></span> {{ $langLbl['Edit'] }}
                        </a>
                    </td>
                    <td>
                        <a href="{{ URL::route('company.offer.delete', $value->id) }}" class="btn btn-sm btn-danger" id="js-a-delete">
                            <span class="glyphicon glyphicon-trash"></span> {{ $langLbl['Delete'] }}
                        </a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <div class="pull-right">{{ $purchaseOffers->links() }}</div>
        <div class="clearfix"></div>
    </div>
</div>

<div class="portlet box red">
    <div class="portlet-title">
        <div class="caption">
            <i class="fa fa-navicon"></i> {{ $langLbl['Activity Offer List'] }}
        </div>
        <div class="actions">
            <a href="{{ URL::route('company.offer.activity.create') }}" class="btn btn-default btn-sm">
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
                    <th>{{ $langLbl['Photo'] }}</th>
                    <th>{{ $langLbl['Description'] }}</th>
                    <th>{{ $langLbl['Created At'] }}</th>
                    <th class="th-action">{{ $langLbl['Solds'] }}</th>
                    <th class="th-action">{{ $langLbl['Edit'] }}</th>
                    <th class="th-action">{{ $langLbl['Delete'] }}</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($activityOffers as $key => $value)
                <tr>
                    <td>{{ ((Input::has('page') ? Input::get('page') : 1) - 1 ) * PAGINATION_SIZE + ($key + 1) }}</td>
                    <td>{{ $value->name }}</td>
                    <td><img src="{{ HTTP_OFFER_PATH.$value->photo }}" style="height: 40px;"></td>
                    <td>{{ $value->description }}</td>
                    <td>{{ $value->created_at }}</td>
                    <td>
                        <a href="{{ URL::route('company.offer.sold', $value->id) }}" class="btn btn-sm btn-success">
                            <i class="fa fa-list"></i> {{ $langLbl['Sold'] }}
                        </a>
                    </td>
                    <td>
                        <a href="{{ URL::route('company.offer.activity.edit', $value->id) }}" class="btn btn-sm btn-info">
                            <span class="glyphicon glyphicon-edit"></span> {{ $langLbl['Edit'] }}
                        </a>
                    </td>
                    <td>
                        <a href="{{ URL::route('company.offer.delete', $value->id) }}" class="btn btn-sm btn-danger" id="js-a-delete">
                            <span class="glyphicon glyphicon-trash"></span> {{ $langLbl['Delete'] }}
                        </a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <div class="pull-right">{{ $activityOffers->links() }}</div>
        <div class="clearfix"></div>
    </div>
</div>

@stop

@stop
