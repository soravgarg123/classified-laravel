@extends('user.layout')

@section('main')
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.11/css/dataTables.bootstrap.min.css">
<div class="container">
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

    <div class="row">
        <div class="col-sm-10 col-sm-offset-1 margin-top-normal margin-bottom-normal">
            <div class="portlet box red margin-top-lg">
                <div class="portlet-title">
                    <div class="caption">
                        {{ $langLbl['Messages'] }}
                    </div>
                </div>
                <div class="portlet-body">
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
                        <?php $user_id = "u".$user_detail[0]->id; ?>
                        @foreach ($messages as $key => $message)
                        <tr>
                            <td>{{ ($key + 1) }}</td>
                            <td>
                                <?php if($message->from == $user_id) { 
                                    echo $user_detail[0]->name;
                                } else { 
                                    echo $message->user_name;
                                } ?>
                            </td>
                            <td>
                                <?php if($message->to == $user_id) { 
                                    echo $user_detail[0]->name;
                                } else { 
                                    echo $message->user_name;
                                } ?>
                            </td>
                            
                            <td>{{ $message->message }}</td>
                            <td>{{ $message->sent }}</td>
                            <td><a onclick="return confirm('Are you sure ?')" href="{{ URL::route('user.message.delete', $message->id) }}" class="btn btn-danger btn-sm">{{ $langLbl['Delete'] }}</a></td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>                   
                </div>
            </div>                         
        </div>
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
