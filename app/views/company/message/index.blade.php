@extends('company.layout')

@section('breadcrumb')
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.11/css/dataTables.bootstrap.min.css">
<div class="row">
    <div class="col-md-12">
        <ul class="page-breadcrumb breadcrumb">
            <li>
                <i class="fa fa-home"></i>
                <span>{{ $langLbl['Message'] }}</span>
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

<div class="portlet box red">
    <div class="portlet-title">
        <div class="caption">
            <i class="fa fa-navicon"></i> {{ $langLbl['Message List'] }}
        </div>
    </div>
    <div class="portlet-body ">
        <table class="table table-striped table-bordered table-hover" id="example">
            <thead>
                <tr>
                    <th>#</th>
                    <th>{{ $langLbl['Sender'] }}</th>
                    <th>{{ $langLbl['Receiver'] }}</th>
                    <th>{{ $langLbl['Message'] }}</th>
                    <th>{{ $langLbl['Sent Time'] }}</th>
                    <th>{{ $langLbl['action'] }}</th>
                </tr>
            </thead>
            <tbody>
                <?php $compnay_id = "p".$company_detail[0]->id; ?>
                @foreach ($messages as $key => $message)
                <tr>
                    <td>{{ ($key + 1) }}</td>
                    <td>
                        <?php if($message->from == $compnay_id) { 
                            echo $company_detail[0]->name;
                        } else { 
                            echo $message->user_name;
                        } ?>
                    </td>
                    <td>
                        <?php if($message->to == $compnay_id) { 
                            echo $company_detail[0]->name;
                        } else { 
                            echo $message->user_name;
                        } ?>
                    </td>
                    
                    <td>{{ $message->message }}</td>
                    <td>{{ $message->sent }}</td>
                    <td><a id="js-a-delete" href="{{ URL::route('company.message.delete', $message->id) }}" class="btn btn-danger btn-sm">{{ $langLbl['Delete'] }}</a></td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@section('custom-scripts')
<script type="text/javascript" src="https://cdn.datatables.net/1.10.11/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.11/js/dataTables.bootstrap.min.js"></script>
<script>
    $(document).ready(function() {
        $('#example').DataTable({
            "bFilter": false, 
            "bInfo": false
        });
    });
</script>
@stop

@stop
