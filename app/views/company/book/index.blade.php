@extends('company.layout')

@section('breadcrumb')
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.11/css/dataTables.bootstrap.min.css">
<div class="row">
    <div class="col-md-12">
        <ul class="page-breadcrumb breadcrumb">
            <li>
                <i class="fa fa-home"></i>
                <span>{{ $langLbl['Book'] }}</span>
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
            <i class="fa fa-navicon"></i> {{ $langLbl['Book List'] }}
        </div>
    </div>
    <div class="portlet-body ">
        <table class="table table-striped table-bordered table-hover" id="example">
            <thead>
                <tr>
                    <th>#</th>
                    <th>{{ $langLbl['Store Name'] }}</th>
                    <th>{{ $langLbl['User Name'] }}</th>                    
                    <th>{{ $langLbl['Booking Date'] }}</th>
                    <th>{{ $langLbl['Price'] }}</th>
                    <th>{{ $langLbl['Status'] }}</th>
                    <th>{{ $langLbl['Created At'] }}</th>
                    <th class="th-action">{{ $langLbl['View'] }}</th>
                    <th class="th-action">{{ $langLbl['Delete'] }}</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($books as  $key => $book)                
                <tr>
                    <td>{{ $key + 1 }}</td>
                    <td>{{ $book->store->name }}</td>
                    <td>{{ $book->user->name }}</td>
                    <td>{{ $book->book_date == '' ? date('Y-m-d',strtotime($book->created_at) ) : date('Y-m-d',strtotime($book->book_date))}}</td>
                    <td>{{ $book->price}}</td>
                    <td>
                        <select class="book_status" data_id="{{$book->id}}" @if($book->status != 0 ) disabled @endif >
                                <option value="0" data_id="{{$book->id}}" @if($book->status == 0 ) selected @endif >{{ $langLbl['Pending'] }}</option>
                            <option value="1" data_id="{{$book->id}}" @if($book->status == 1 ) selected @endif >{{ $langLbl['Complete'] }}</option>
                            <option value="2" data_id="{{$book->id}}" @if($book->status == 2 ) selected @endif >{{ $langLbl['Cancelled'] }}</option>
                            <option value="3" data_id="{{$book->id}}" @if($book->status == 3 ) selected @endif> {{ $langLbl['Book'] }}</option>
                        </select>
                    </td>
                    <td>{{ $book->created_at}}</td>
                    <td>
                        <a href="{{ URL::route('company.book.view', $book->id) }}" class="btn btn-sm btn-info">
                            <span class="glyphicon glyphicon-edit"></span> {{ $langLbl['View'] }}
                        </a>
                    </td>
                    <td>
                        <a href="{{ URL::route('company.book.delete', $book->id) }}" class="btn btn-sm btn-danger" id="js-a-delete">
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
@section('custom-scripts')
<script type="text/javascript" src="https://cdn.datatables.net/1.10.11/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.11/js/dataTables.bootstrap.min.js"></script>
<script>
    $(document).ready(function() {
        $('#example').DataTable({
            "bPaginate": false,
            "bFilter": false, 
            "bInfo": false
        });
    });

    $(document).ready(function() {
        $(".book_status").change(function() {
            var v = $(this).val();
            var sel = $(this);
            var book_id = $(this).attr('data_id');
            $.ajax({
                url: "{{ URL::route('company.book.update') }}",
                dataType: "json",
                type: "POST",
                data: {status: $(this).val(), bookId: book_id},
                success: function(data) {
                    bootbox.alert(data.msg);
                    sel.prop('disabled', true);
                    window.setTimeout(function() {
                        bootbox.hideAll();
                    }, 2000);
                }
            });
        });
    });
</script>
@stop
@stop
