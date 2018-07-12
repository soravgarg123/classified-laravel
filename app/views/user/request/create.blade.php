@extends('user.layout')

@section('main')
<div class="container">
    <div class="row">
        <div class="col-sm-8"></br>
            <div class="post-request-left-block">
                <form role="form" method="post" action="{{ URL::route('request.add') }}" enctype="multipart/form-data">
                    <div class="form-group">
                        <div class="row text-center signup_form_heading">
                            <h2 class="text-center text-uppercase">{{ $langLbl['Request a Service'] }}</h2>
                        </div>
                    </div>
                    <?php if (isset($alert)) { ?>
                        <div class="margin-top-lg"></div>
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
                    @if ($errors->has())
                    <div class="margin-top-lg"></div>
                    <div class="alert alert-danger alert-dismissibl fade in">
                        <button type="button" class="close" data-dismiss="alert">
                            <span aria-hidden="true">&times;</span>
                            <span class="sr-only">{{ $langLbl['Close'] }}</span>
                        </button>
                        @foreach ($errors->all() as $error)
                        <p>{{ $error }}</p>
                        @endforeach
                    </div>
                    @endif
                    <div class="form-group">
                        <input type="text" class="form-control input-lg" placeholder="{{ $langLbl['Add the title of your request'] }}" name="title" value="<?php echo Session::get("title"); ?>" >
                    </div>
                    <?php
                        $nameVal = 'name' . $currentLanguage;
                        $short_nameVal = 'short_name' . $currentLanguage;
                    ?>
                    <div class="form-group">
                        <select class="form-control input-lg" name="sub_category">
                        <option value="">{{ $langLbl['Select the category of professionals where to send the request'] }}</option>
                            @foreach ($classes as $category)                                                 
                            <optgroup label="{{ $category->$nameVal }}">
                                @foreach ($category->subClasses as $subCategory)
                                <option value="{{$subCategory->id}}">&nbsp; {{$subCategory->$nameVal}}</option>
                                @endforeach
                            @endforeach
                        </select>
                    </div> 
                    <div class="form-group">
                        <input type="text" class="form-control input-lg" placeholder="{{ $langLbl['Type the days from 1 day to maximum 30 days'] }}" name="days" value="<?php echo Session::get("days"); ?>" >
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control input-lg" placeholder="{{ $langLbl['Select your budget € 5 minimum'] }}" name="budget" value="<?php echo Session::get("budget"); ?>" >
                    </div>
                    <div class="form-group">
                        <textarea maxlength="300" placeholder="{{ $langLbl['Describe your request, please add as more details as possible.'] }}" name="description" rows="4" id="post_description" class="form-control input-lg"><?php echo Session::get("description"); ?></textarea>
                    </div>
                    <div style="position:relative;">
                      <a class='btn btn-primary'  href='javascript:;'>
                        <i class="fa fa-paperclip"></i> {{ $langLbl['Attach File'] }}
                      <input type="file" id="file" name="file" style='position:absolute;z-index:2;top:0;left:0;height:35px;filter: alpha(opacity=0);-ms-filter:"progid:DXImageTransform.Microsoft.Alpha(Opacity=0)";opacity:0;background-color:transparent;color:transparent;width:111px' size="40">
                      </a> &nbsp;{{ $langLbl['Max Size 30 MB'] }} <span id="char_count" style="float:right;">300 {{ $langLbl['characters left'] }}</span></br></br>
                    </div>
                    <div class="form-group">
                        <div class="text-center">
                        <p>{{ $langLbl['The Request will be sent to all professionals of category choosen. By Sending this request you confirm that you accept'] }} <a href="{{ URL::route('user.terms') }}" target="_blank"> {{ $langLbl['Terms & Conditions'] }} </a> {{ $langLbl['and'] }} <a href="{{ URL::route('user.privacy') }}" target="_blank"> {{ $langLbl['Privacy Policy'] }} </a></p>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="text-right">
                            <button type="submit" class="btn btn-success btn-block btn-lg">
                                {{ $langLbl['Send Request'] }} <span class="glyphicon glyphicon-ok-circle"></span>
                            </button>
                        </div>
                    </div>
                </form>    
            </div>
        </div>
        <div class="col-sm-4">
            <div class="post-request-right">
                <div class="post-request-right-block">
                     <div class="main_box">
                        <div class="top_box">
                          <h1><span class="fa fa-lightbulb-o"></span>{{ $langLbl['lets get started'] }}</h1>
                          <p>{{ $langLbl['choose the category and subcategory that best fits your request'] }}</p>

                        </div>
                        <div class="bottom_box">
                         <p><span>{{ $langLbl['For example:'] }}</span> {{ $langLbl['If you are looking for a logo, you should choose "logo design" with in the "graphics & design" category'] }}
                         </p>
                        </div>
                     </div>
                     <div class="main_box">
                        <div class="top_box">
                          <h1><span class="fa fa-lightbulb-o"></span>{{ $langLbl['delivery time'] }}</h1>
                          <p>{{ $langLbl['This is the amount of time the seller has to work on your order. Please note that a request for faster delivery may impact the price.'] }}</p>

                        </div>
                     </div>
                     <div class="main_box">
                        <div class="top_box">
                          <h1><span class="fa fa-lightbulb-o"></span>{{ $langLbl['set your budget'] }}</h1>
                          <p>{{ $langLbl['Enter an amount you are willing to spend for this service'] }}</p>
                        </div>
                     </div>
                     <div class="main_box">
                        <div class="top_box">
                          <h1><span class="fa fa-lightbulb-o"></span>{{ $langLbl['define in detail'] }}</h1>
                          <p>{{ $langLbl['Include all the necessary details needed to complete your request.'] }}</p>
                        </div>
                        <div class="bottom_box">
                         <p><span>{{ $langLbl['For example:'] }}</span>{{ $langLbl['If you are looking for a logo, you can specify your company name, bussiness type,preferred color etc.'] }}
                         </p>
                        </div>
                     </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>   
<script type="text/javascript">
    $(document).ready(function(){
        $('body').on('keyup','#post_description',function(){
            var msg_val = $('#post_description').val();
            var msgLength = parseInt(msg_val.length);
            var remainingLength = 300 - msgLength + " {{ $langLbl['characters left'] }}";
            $('span#char_count').html(remainingLength);
        });
    });
</script>
<script type="text/javascript">
  $(document).ready(function(){
    var request_success = "<?php echo Session::get('request_success'); ?>";
    if(request_success == "created"){
    var request_success_flush = "<?php Session::forget('request_success'); ?>";
        bootbox.alert("{{ $langLbl['Your request successfully created'] }}");
            window.setTimeout(function(){
            bootbox.hideAll();
        }, 4000);
    }

  $('#file').change(function(){
        var type = $(this).attr('main');
        var file_name = $(this).val();
        var fileObj = this.files[0]; 
        var calculatedSize = fileObj.size/(1024*1024); 
        if(calculatedSize > 30)
            {
                $('#file').val(fileObj.value = null);
                bootbox.alert("{{ $langLbl['File size should be less than 30 MB !'] }}");
                window.setTimeout(function(){
                    bootbox.hideAll();
                }, 2000);
                return false;
            }
      });
  });
</script>
@stop

@stop
