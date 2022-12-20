<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
<!-- Footer -->
<footer class="footer pt-0">
  <div class="row align-items-center justify-content-lg-between">
    <div class="col-lg-6">
      <div class="copyright text-center text-lg-left text-muted">
        &copy; 2022 <a href="#" class="font-weight-bold ml-1" target="_blank">PT. KARISMA INDOAGRO UNIVERSAL</a>
        <audio id="myAudio" autoplay muted>
          <source src="<?= base_url('assets/audio/') ?>order1.mp3" type="audio/mpeg">
          Your browser does not support the audio element.
        </audio>
        <audio id="beep__active" src="http://freesound.org/data/previews/263/263133_2064400-lq.mp3"></audio>
      </div>
    </div>
  </div>
</footer>
</div>
</div>

<!-- Argon Scripts -->
<!-- Core -->
<script src="<?php echo get_theme_uri('vendor/js-cookie/js.cookie.js', 'argon'); ?>"></script>
<script src="<?php echo get_theme_uri('vendor/jquery.scrollbar/jquery.scrollbar.min.js', 'argon'); ?>"></script>
<script src="<?php echo get_theme_uri('vendor/jquery-scroll-lock/dist/jquery-scrollLock.min.js', 'argon'); ?>"></script>

<script src="//cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/select/1.4.0/js/dataTables.select.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.2.3/js/dataTables.buttons.min.js"></script>

<!-- Argon JS -->
<script src="<?php echo get_theme_uri('js/argon9f1e.js?v=1.1.0', 'argon'); ?>"></script>
<script src="<?php echo base_url('assets/js/') . 'selectrows.min.js'; ?>"></script>
<script>
  var base_url = "<?= base_url(); ?>"
</script>
<script type="text/javascript">
  $(document).ready(function() {
    $('#myTable').DataTable();
    selectRowsJs.init();

    $("#myAudio").prop('muted', true);
    $("#myAudio").get(0).play();
    $(document).scrollTop($(document).height());

    setInterval(function() {

      <?php if (admin_role() == 'salesman' || admin_role() == 'adminonline') : ?>
        var unread_message = $("#unread_message").text();
        $.ajax({
          url: "<?= base_url() ?>admin/messages/get_unread",
          type: "POST",
          dataType: "json", //datatype lainnya: html, text
          data: {},
          success: function(data) {
            console.log('old order= ' + unread_message);
            console.log('new order= ' + data);
            // $("#myAudio").prop('muted', false);
            // $("#myAudio").delay(50).get(0).play();
            if (unread_message != 0) {
              if (unread_message != data) {
                $("#myAudio").prop('muted', false);
                $("#myAudio").delay(50).get(0).play();

                if (!window.Notification) {
                  console.log('Browser does not support notifications.')
                } else {
                  if (Notification.permission === 'granted') {
                    const notify = new Notification('Perhatian', {
                      body: 'Chat Baru',
                      icon: '<?php echo site_url('assets/images/favicon.png'); ?>'
                    })
                    notify.onclick = (event) => {
                      event.preventDefault();
                      window.open('https://os.youngpreneur.co.id/admin/messages', '_blank');
                    }
                  } else {
                    Notification.requestPermission()
                      .then(function(p) {
                        if (p === 'granted') {
                          const notify = new Notification('Perhatian!', {
                            body: 'Chat Baru',
                            icon: '<?php echo site_url('assets/images/favicon.png'); ?>'
                          })
                          notify.onclick = (event) => {
                            event.preventDefault();
                            window.open('https://os.youngpreneur.co.id/admin/messages', '_blank');
                          }
                        } else {
                          console.log('User has blocked notifications.')
                        }
                      })
                      .catch(function(err) {
                        console.error(err)
                      })
                  }
                }

              }
            }
            $("#unread_message").html(data);
          }
        });
      <?php endif; ?>

      <?php if (admin_role() == 'admin' || admin_role() == 'salesman' || admin_role() == 'adminonline') : ?>
        var order_total = $("#order_total").text();
        $.ajax({
          url: "<?= base_url() ?>admin/orders/get_total_order",
          type: "POST",
          dataType: "json", //datatype lainnya: html, text
          data: {},
          success: function(data) {
            console.log('old chat= ' + order_total);
            console.log('new chat= ' + data);
            // $("#myAudio").prop('muted', false);
            // $("#myAudio").delay(50).get(0).play();
            if (order_total != 0) {
              if (order_total != data) {
                $("#myAudio").prop('muted', false);
                $("#myAudio").delay(50).get(0).play();

                if (!window.Notification) {
                  console.log('Browser does not support notifications.')
                } else {
                  if (Notification.permission === 'granted') {
                    const notify = new Notification('Perhatian', {
                      body: 'Pesanan Baru',
                      icon: '<?php echo site_url('assets/images/favicon.png'); ?>'
                    })
                    notify.onclick = (event) => {
                      event.preventDefault();
                      window.open('https://os.youngpreneur.co.id/admin/orders', '_blank');
                    }
                  } else {
                    Notification.requestPermission()
                      .then(function(p) {
                        if (p === 'granted') {
                          const notify = new Notification('Perhatian!', {
                            body: 'Pesanan Baru',
                            icon: '<?php echo site_url('assets/images/favicon.png'); ?>'
                          })
                          notify.onclick = (event) => {
                            event.preventDefault();
                            window.open('https://os.youngpreneur.co.id/admin/orders', '_blank');
                          }
                        } else {
                          console.log('User has blocked notifications.')
                        }
                      })
                      .catch(function(err) {
                        console.error(err)
                      })
                  }
                }

              }
            }
            $("#order_total").html(data);
          }
        });
      <?php endif; ?>

      <?php if (admin_role() == 'admin' || admin_role() == 'keuangan') : ?>
        var payment_total = $('#payment_total').text();
        $.ajax({
          url: "<?= base_url() ?>admin/payments/get_total_payment",
          type: "POST",
          dataType: "json", //datatype lainnya: html, text
          data: {},
          success: function(data) {
            console.log('old payment=' + payment_total);
            console.log('new payment=' + data);
            // $("#myAudio").prop('muted', false);
            // $("#myAudio").delay(50).get(0).play();

            if (payment_total != 0) {
              if (payment_total != data) {
                // $("#myAudio").prop('muted', false);
                // $("#myAudio").delay(50).get(0).play();

                if (!window.Notification) {
                  console.log('Browser does not support notifications.')
                } else {
                  if (Notification.permission === 'granted') {
                    const notify = new Notification('Perhatian', {
                      body: 'Pembayaran Baru',
                      icon: '<?php echo site_url('assets/images/favicon.png'); ?>'
                    })
                    notify.onclick = (event) => {
                      event.preventDefault();
                      window.open('https://os.youngpreneur.co.id/admin/payments', '_blank');
                    }
                  } else {
                    Notification.requestPermission()
                      .then(function(p) {
                        if (p === 'granted') {
                          const notify = new Notification('Perhatian', {
                            body: 'Pembayaran Baru',
                            icon: '<?php echo site_url('assets/images/favicon.png'); ?>'
                          })
                          notify.onclick = (event) => {
                            event.preventDefault();
                            window.open('https://os.youngpreneur.co.id/admin/payments', '_blank');
                          }
                        } else {
                          console.log('User has blocked notifications.')
                        }
                      })
                      .catch(function(err) {
                        console.error(err)
                      })
                  }
                }
              }
            }
            $("#payment_total").html(data);
          }
        });
      <?php endif; ?>
    }, 2000); //default 2000 = 2s

  });

  $('#text_message').keypress(function(e) {
    if (e.which == 13) {
      $('form#message_form').submit();
      return false;
    }
  });

  function send_message() {
    var message = $("#text_message").val();

    $.ajax({
      url: base_url + 'send_admin_message',
      type: 'POST',
      dataType: 'json',
      data: $('#message_form').serialize(),
      success: function(data) {
        console.log('sukses');
        var chat =
          '<div class="chat-message-right pb-4">' +
          '<div>' +
          '<img src="https://bootdey.com/img/Content/avatar/avatar1.png" class="rounded-circle mr-1" alt="Chris Wood" width="40" height="40">' +
          '</div>' +
          '<div class="chat-text">' +
          '<div class="flex-shrink-1 bg-light rounded py-2 px-3 mr-3">' +
          '<div class="font-weight-bold mb-1">Anda</div>' +
          message +
          '</div>' +
          '<div class="datetime text-muted small text-nowrap mt-2">' + format_tanggal() + '</div>' +
          ' </div>' +
          '</div>';
        $('#chat_wrapper').append(chat);

        $("#text_message").val('');
        $('#chat_wrapper').animate({
          scrollTop: $('#chat_wrapper').get(0).scrollHeight
        }, 1000);

      },
      error: function(data) {
        console.log(data + ' errrrr');
      },
    });
  }
</script>
</body>

</html>