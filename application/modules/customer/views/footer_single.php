<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<!-- jquery 3.6.0 -->
<script src="<?php echo get_theme_uri('js/jquery-3.6.0.min.js');?>"></script>

<!-- Bootstrap Js -->
<script src="<?php echo get_theme_uri('js/bootstrap.bundle.min.js');?>"></script>

<!-- Slick Slider js -->
<script src="<?php echo get_theme_uri('js/slick.js');?>"></script>
<script src="<?php echo get_theme_uri('js/slick.min.js');?>"></script>
<script src="<?php echo get_theme_uri('js/slick-custom.js');?>"></script>

<!-- Feather Icon -->
<script src="<?php echo get_theme_uri('js/feather.min.js');?>"></script>

<!-- Theme Setting js -->
<!-- <script src="<?php echo get_theme_uri('js/theme-setting.js');?>"></script> -->

<!-- Script js -->
<script src="<?php echo get_theme_uri('js/script.js');?>"></script>
<script src="<?php echo site_url('assets/js/helper.js');?>"></script>
<script>var base_url = "<?=base_url();?>"</script>
<script>
    const element = document.getElementById("chat_body");

    element.scrollIntoView(false);

    $('#pesan').keypress(function (e) {
      if (e.which == 13) {
        $('form#send_message').submit();
        return false;    
      }
    });
    function send_message() {
        // e.preventDefault();
          var message = $("#pesan").val();
          $.ajax({
          url: base_url + 'send_message',
          type: 'POST',
          dataType: 'json',
          data: {
            message: message
          },
          success: function(data) {
            $("#pesan").val('');
            var chat =
              '<div class="user-message-content">'+
              '<div class="user-message-text">'+
              '<div class="d-block">'+
              '<p>'+ message +'</p>'+
              '</div><span>'+format_tanggal()+'</span>'+
              '</div>'+
              '</div>'; 
            $('#chat_wrapper').append(chat);
            
          },
          error: function(data) {
            console.log(data);
          },
        });
      }
</script>
</body>
</html>


