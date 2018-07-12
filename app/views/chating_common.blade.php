<div class="chatting_main">

</div>

<input type="hidden" value="" id="hidden_array">
<?php
$domain = $_SERVER['SERVER_NAME']; 
    if($domain == "localhost"){
        $socketURL = "http://localhost:3600";
    }
    if($domain == "letshop247.com"){
        $socketURL = "http://192.168.1.211:3600";
    }
    if($domain == "mela.dovecercare.com"){
        $socketURL = "http://mela.dovecercare.com:3600";
    }  
?>

<!-- Socket Chating Start -->

  <script type="text/javascript">
      var socket;
      var from_u_type = "{{ Session::get('user_type') }}";
      var from_unique_id;
      if(from_u_type == "professional"){
            from_unique_id = "p{{ Session::get('company_id') }}";
        }else{
            from_unique_id = "u{{ Session::get('user_id') }}";
        }
      function send(text) {
        socket.emit('chatptapp', text);
      }

      window.onload = function(){
        socket = io("<?php echo $socketURL; ?>");
        socket.on('chatptapp', function(data){
            var rdata = data.split("$&");
            if(from_unique_id == rdata[0])
            {
              var user_string = $('#hidden_array').val();
              var user_array = user_string.split(",");
              if($.inArray(rdata[1],user_array) == -1){
                  user_array.push(rdata[1]); // insert id in id array
                  var usertostring = user_array.toString();
                  $('#hidden_array').val(usertostring); // set array string in hidden value 
                  var user_id = rdata[1];
                  $(".chatting_main").append('<div class="chating_wind_wrapper chat_window_'+rdata[1]+'"></div>');
                  $(".chat_window_"+rdata[1]).load('<?php echo url(); ?>/chatbox/'+user_id, function(){
                  });
                }
              $('.chat_msg_box_'+ rdata[1]).append(rdata[2]);
            }
        });
      }
  </script>

<!-- Socket Chating End -->

<!-- Close Chat Box Script Start -->

<script type="text/javascript">
    $(document).ready(function(){
        $('body').on('click','.close_chat',function(){
            var close_unique_id = $(this).attr('main');
            var user_string1 = $('#hidden_array').val();
            var user_array1 = user_string1.split(",");
            var index = user_array1.indexOf(close_unique_id);
            user_array1.splice(index, 1);
            var usertostring1 = user_array1.toString();
            $('#hidden_array').val(usertostring1);
            $('.chat_window_' + close_unique_id).remove();
        });
    });
</script>

<!-- Close Chat Box Script -->