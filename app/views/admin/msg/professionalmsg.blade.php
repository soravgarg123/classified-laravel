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
<script type="text/javascript">
  $(document).ready(function(){
    localStorage.removeItem("all-emails");
  });
</script>
@endif

<div class="portlet box blue">
    <div class="portlet-title">
        <div class="caption">
            <i class="fa fa-navicon"></i> {{ $langLbl['Message'] }}
        </div>
        <div class="actions">
            <a href="javascript(void)"  data-toggle="modal" data-target="#myModal" class="btn btn-default btn-sm" id="messageId">
                <span class="glyphicon glyphicon-plus"></span>&nbsp;{{ $langLbl['Message'] }}
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
                </tr>
            </thead>
            <tbody>
                @foreach ($companies as $key => $value)
                <tr>
                     <td><label><input type="checkbox" class="allUser" name="allUser[]" id="allUser"  value="{{ $value->email }}" ></label></td>
                    <td>{{ $value->name }}</td>
                    <td>{{ $value->email }}</td>
                    <td>{{ $value->phone }}</td>                       
                </tr>
                @endforeach
            </tbody>
        </table>
        <div class="pull-right">{{ $companies->links() }}</div>
        <div class="clearfix"></div>
    </div>
</div>    
@stop
@stop

<!-- ******** ******* ******* ***** **** **** ***** ***** ******** ******** ******** -->
 
<form class="form-horizontal form-bordered form-row-stripped" role="form" method="POST" action="{{ URL::route('admin.message.profes_msg') }}">
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
      
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
            <input type="hidden" id="userMail" name="userMail[]">
        </div>
        <!-- <textarea name="userMail"  id="userMail"></textarea> -->
        <div class="modal-body">
        <div class="form-group">
              <label for="comment">Message:</label>
              <textarea class="form-control form_area" rows="5" name="allmessage" id="message"></textarea>
        </div>
         <div class="form-group">
             
              <input type="hidden" class="form-control"  id="usermessage" name="usermessage">
        </div>
        </div>
        <div class="modal-footer">
          <input type="submit"  id="send" name="send" class="btn btn-default"  value="send">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
    
      </div>
      
    </div>

  </div>
 </form>
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
 <script type="text/javascript">   
$(document).ready(function(){
     $('#myModal').hide();
     var prevemails = localStorage.getItem("all-emails");
     var myCheckboxes = new Array();
     if(prevemails != null){
      myCheckboxes.push(prevemails); 
     }
     $('.allUser').change(function() {
        if(this.checked){
          myCheckboxes.push($(this).val());
       }else{
          var index = myCheckboxes.indexOf($(this).val());
          if (index >= 0) {
            myCheckboxes.splice(index, 1);
          }
        } 
      localStorage.setItem("all-emails", myCheckboxes);
     });
      $('#messageId').click(function(){
        var allNewEmails = localStorage.getItem("all-emails");
      $('#userMail').val(allNewEmails);
    });
  });
 </script>
