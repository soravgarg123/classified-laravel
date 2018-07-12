@extends('admin.layout')

@section('breadcrumb')
<div class="row">
    <div class="col-md-12">
        <h3 class="page-title">{{ $langLbl['Professional Management'] }}</h3>
        <ul class="page-breadcrumb breadcrumb">
            <li>
                <i class="fa fa-home"></i>
                <span>{{ $langLbl['Professional'] }}</span>
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
            <i class="fa fa-navicon"></i> {{ $langLbl['Professional List'] }}
        </div>
        <div class="actions">
            <a href="{{ URL::route('admin.company.create') }}" class="btn btn-default btn-sm">
                <span class="glyphicon glyphicon-plus"></span>&nbsp;{{ $langLbl['Add New'] }}
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
                    <th>{{ $langLbl['VAT ID'] }}</th>
                    <th>{{ $langLbl['Email'] }}/{{ $langLbl['SMS'] }}</th>
                    <th>{{ $langLbl['Status'] }}</th>
                    <th>{{ $langLbl['Phone'] }}</th>
                    <th>{{ $langLbl['Payment'] }}</th>
                    <th>{{ $langLbl['action'] }}</th>
                    <th class="th-action">{{ $langLbl['Edit'] }}</th>
                    <th class="th-action">{{ $langLbl['Feedback'] }}</th>
                    <th class="th-action">{{ $langLbl['Delete'] }}</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($companies as $key => $value)
                <tr>
                    <td>{{ ((Input::has('page') ? Input::get('page') : 1) - 1 ) * PAGINATION_SIZE + ($key + 1) }}</td>
                    <td>{{ $value->name }}</td>
                    <td>{{ $value->email }}</td>
                    <td>{{ $value->phone }}</td>
                    <td>{{ $value->vat_id }}</td>
                    <td>{{ $value->count_email."/".$value->count_sms }}</td>
                    <td>
                        <?php
                            if($value->is_active){
                                echo "Active";
                            }else{
                                echo "Inactive";
                            }
                        ?>
                    </td>
                    <td><input type="checkbox" class="verified-box" c_type="phone_verified" main="{{ $value->id }}" <?php if($value->phone_verified == 0) echo "checked"; ?> ></td>
                    <td><input type="checkbox" class="verified-box" c_type="payment_verified" main="{{ $value->id }}" <?php if($value->payment_verified == 0) echo "checked"; ?> ></td>
                    <td>
                    <?php 
                        if($value->suspend == 0){ // block - 0 ?>
                            <a title="Click here to unblock" href="{{ URL::route('admin.company.unblock', $value->id) }}" class="btn btn-sm btn-info">
                                <span class="fa fa-times"></span>
                            </a>
                    <?php }else{ // unblock - 1 ?>
                            <a title="Click here to block" href="{{ URL::route('admin.company.block', $value->id) }}" class="btn btn-sm btn-info">
                                <span class="fa fa-check"></span>
                            </a>
                    <?php  } ?>
                    </td>
                    <td>
                        <a href="{{ URL::route('admin.company.edit', $value->id) }}" class="btn btn-sm btn-info">
                            <span class="glyphicon glyphicon-edit"></span>
                        </a>
                    </td>
                    <td>
                        <a href="{{ URL::route('admin.company.feedback', $value->id) }}" class="btn btn-sm btn-info">
                            <i class="fa fa-star"></i>
                        </a>
                    </td>                        
                    <td>
                        <a href="{{ URL::route('admin.company.delete', $value->id) }}" class="btn btn-sm btn-danger" id="js-a-delete">
                            <span class="glyphicon glyphicon-trash"></span>
                        </a>
                    </td>                        
                </tr>
                @endforeach
            </tbody>
        </table>
        <div class="pull-right">{{ $companies->links() }}</div>
        <div class="clearfix"></div>
    </div>
</div>    
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>   

<!-- phone-payment verified script start -->

<script type="text/javascript">
    $(document).ready(function(){
        $('body').on('change','.verified-box',function(){
        var type = $(this).attr('c_type');
        var compnay_id = $(this).attr('main');
        var status;
            if(this.checked){
                status = 0;
            }else{
                status = 1;
            }
        $.ajax({
            url: "{{ URL::route('admin.company.verify') }}",
            type: "post",
            dataType: "json",
            data: {type:type,compnay_id:compnay_id,status:status},
            success:function(data){
                console.log(data.msg);
            },
            error:function(error){
                console.log(error);
            }
        });
      });
    });
</script>

<!-- phone-payment verified script end -->
@stop
@stop
