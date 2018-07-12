<!-- Text Chat Section Start -->

    <div class="panel panel-default">
        <div class="panel-heading top-bar">
                @if((int)$company->session_status == 1)
                    <div class="usr-status isOnline" title="Online"></div><span style="color:#60cc00;"></span>
                    @else
                    <div class="usr-status isOffline" title="Offline"></div><span style="color:#cccccc;"></span>
                @endif
            &nbsp;<h3 class="panel-title">{{ $company->name }} </h3>
            <div class="chat_seting_sect">
                <a href="javascript:void(0);" title="Close Chat" class="close_chat" main="{{ $unique_id }}" u_type="{{ $user_type }}" ><span class="fa fa-times"></span></a>
            </div>
            <div class="chat_seting_sect">
            </div>
        </div>
        <div class="panel-body msg_container_base chat_msg_box_{{ $unique_id }}">
            <?php
                if(!empty($chating_data)){
                    $current_user = Session::get('user_type');
                    if($current_user == "professional"){
                        $fromUser = "p".Session::get('company_id');
                    }else{
                        $fromUser = "u".Session::get('user_id');
                    }
                    foreach($chating_data as $cm){ 
                      if($cm->from == $fromUser) { ?>
                        <div class="msg_container base_sent">
                        <div class="messages msg_sent">
                                <p><?php echo $cm->message; ?></p>
                            </div>
                        <div class="chat_avatar">
                            <img src="<?php echo url(); ?>/upload/<?php if(Session::get('user_type') == "professional") { echo "company"; } else { echo "user"; } ?>/<?php echo $ownprofile->photo; ?>" class="img-responsive img-circle">
                        </div>
                    </div></br>
                    <?php  }else{ ?>
                        <div class="msg_container base_receive">
                            <div class="chat_avatar">
                                <img src="<?php echo url(); ?>/upload/<?php if(Session::get('user_type') == "professional") { echo "user"; } else { echo "company"; } ?>/<?php echo $ownprofile->photo; ?>" class="img-responsive img-circle">
                            </div>
                            <div class="messages msg_receive">
                                    <p><?php echo $cm->message; ?></p>
                                </div>
                        </div></br>
            <?php } } } ?>
        </div>
        <div class="panel-footer">
            <div class="input-group">
                <input id="chat_input_box_{{ $unique_id }}" type="text" main="{{ $unique_id }}" u_type="{{ $user_type }}" class="form-control input-sm chat_input" placeholder="{{ $langLbl['Write your message here...'] }}" />
                <span class="input-group-btn">
                <button class="chat_btn_{{ $unique_id }} btn" main="{{ $unique_id }}" u_type="{{ $user_type }}" href="javascript:void(0);"><span class="fa fa-paper-plane"></span></button>
                </span>
            </div>
        </div>
    </div>
<?php
$domain = $_SERVER['SERVER_NAME']; 
    if($domain == "localhost"){
        $saveChatURL = "http://localhost/mela/public/savechat";
    }
    if($domain == "letshop247.com"){
        $saveChatURL = "http://letshop247.com/ci/mela/public/savechat";
    }
    if($domain == "mela.dovecercare.com"){
        $saveChatURL = "http://mela.dovecercare.com/savechat";
    }
?>

<!-- Text Chat Section End -->

<script type="text/javascript">
        $(document).ready(function(){
        $(".chat_msg_box_{{ $unique_id }}").animate({scrollTop: $(".chat_msg_box_{{ $unique_id }}")[0].scrollHeight}, 1000);
        $('body').on('click','.chat_btn_{{ $unique_id }}',function(){
            var to_unique_id   = $(this).attr('main'); // reciever_id
            var to_u_type = $(this).attr('u_type');
            var from_u_type = "{{ Session::get('user_type') }}";
            var from_unique_id;
            if(from_u_type == "professional"){
                from_unique_id = "p{{ Session::get('company_id') }}";
                folder_name = "{{ HTTP_COMPANY_PATH }}";
            }else{
                from_unique_id = "u{{ Session::get('user_id') }}";
                folder_name = "{{ HTTP_USER_PATH }}";
            }
            var msg = $(this).parent().prev("input").val();
            if(msg == ""){
                return false;
            }
            $.ajax({
                url  : "<?php echo $saveChatURL; ?>",
                type : "POST",
                data : {msg:msg,reciever_id:to_unique_id,sender_id:from_unique_id},
                async:false,
                success:function(response){
                    console.log(response);
                }
            });
            var from_htmlDiv = '</br><div class="msg_container base_sent"><div class="messages msg_sent"><p>' + msg + '</p></div><div class="chat_avatar"><img src=' + folder_name + '<?php echo $ownprofile->photo; ?> class="img-responsive img-circle"></div></div></br>';
            var to_htmlDiv = '</br><div class="msg_container base_receive"><div class="messages msg_sent"><p>' + msg + '</p></div><div class="chat_avatar"><img src=' + folder_name + '<?php echo $ownprofile->photo; ?> class="img-responsive img-circle"></div></div></br>';
            var to_data = to_unique_id+"$&"+from_unique_id+"$&"+to_htmlDiv;
            send(to_data);
            $('.chat_msg_box_'+ to_unique_id).append(from_htmlDiv);
            $(this).parent().prev("input").val("");
            $('.chat_msg_box_'+to_unique_id).animate({scrollTop: $('.chat_msg_box_'+to_unique_id)[0].scrollHeight}, 1000);
        });

        
        $('body').on('keyup','#chat_input_box_{{ $unique_id }}',function(event){
           if(event.keyCode == 13){
                event.preventDefault();
                $(".chat_btn_{{ $unique_id }}").trigger("click");
             }
           });

        });
    </script>

    <!-- Message Chating Script End -->