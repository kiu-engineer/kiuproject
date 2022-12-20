<?php
defined('BASEPATH') or exit('No direct script access allowed');
$controller = $this->router->fetch_class();
?>
<!-- <div class="footer-wrap shop notif-cart" id="notif-cart">
  <ul class="footer">
    <li class="footer-item"> <span class="font-xs">1 Barang berhasil ditambahkan ke keranjang belanja</span></li>
    <li class="footer-item">
      <a href="cart.html" class="font-sm">Cek Keranjang Belanja <i data-feather="chevron-right"></i></a>
    </li>
  </ul>
</div> -->


<!-- Footer Start -->
<footer class="footer-wrap">
  <ul class="footer">
    <li class="footer-item <?= ($this->uri->segment(1) == 'home' ? 'active' : '') ?>">
      <a href="<?= site_url('home') ?>" class="footer-link">
        <i class="iconly-Home icli"></i>
        <span>Beranda</span>
      </a>
    </li>
    <li class="footer-item <?= ($this->uri->segment(1) == 'category' ? 'active' : '') ?>">
      <a href="<?= site_url('category') ?>" class="footer-link">
        <i class="iconly-Category icli"></i>
        <span>Kategori</span>
      </a>
    </li>
    <li class="footer-item <?= ($this->uri->segment(1) == 'cart' ? 'active' : '') ?>">
      <a href="<?= site_url('cart') ?>" class="footer-link">
        <i class="iconly-Bag-2 icli"></i>
        <span>Keranjang</span>
        <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger" id="cart_sum">0 </span>
      </a>
    </li>
    <li class="footer-item <?= ($this->uri->segment(1) == 'order_history' ? 'active' : '') ?>">
      <a href="<?= site_url('order_history') ?>" class="footer-link">
        <i class="iconly-Paper icli"></i>
        <span class="offer">Riwayat</span>
      </a>
    </li>
    <li class="footer-item <?= ($this->uri->segment(1) == 'message' ? 'active' : '') ?>">
      <a href="<?= site_url('message') ?>" class="footer-link">
        <i class="iconly-Chat icli"></i>
        <span>Chat</span>
        <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger" id="unread_sum">0 </span>
      </a>
    </li>
  </ul>
</footer>
<!-- Footer End -->


<!-- Bootstrap Js -->
<script src="<?php echo get_theme_uri('js/bootstrap.bundle.min.js'); ?>"></script>

<!-- Lord Icon -->
<script src="<?php echo get_theme_uri('js/lord-icon-2.1.0.js'); ?>"></script>

<!-- Feather Icon -->
<script src="<?php echo get_theme_uri('js/feather.min.js'); ?>"></script>

<!-- Slick Slider js -->
<script src="<?php echo get_theme_uri('js/slick.js'); ?>"></script>
<script src="<?php echo get_theme_uri('js/slick.min.js'); ?>"></script>
<script src="<?php echo get_theme_uri('js/slick-custom.js'); ?>"></script>

<!-- Swiper Js -->
<!-- <script src="<?php echo get_theme_uri('js/jquery-swipe-1.11.3.min.js'); ?>""></script>
    <script src="<?php echo get_theme_uri('js/jquery.mobile-1.4.5.min.js'); ?>""></script> -->

<!-- Script js -->
<script src="<?php echo get_theme_uri('js/script.js'); ?>"></script>

<script src="<?php echo get_theme_uri('js/bs5-toast.min.js'); ?>"></script>

<script>
  if (window.history.replaceState) {
    window.history.replaceState(null, null, window.location.href);
  }
</script>


<?php if (!empty($_SESSION['__ACTIVE_SESSION_DATA'])) : ?>
  <script>
    //Total Product in Cart
    $.ajax({
      method: 'GET',
      url: '<?php echo site_url('cart_api?action=cart_info'); ?>',
      success: function(res) {
        var data = res.data;

        var total_item = data.total_item;
        $('#cart_sum').text(total_item);
        $('.cart-item-total').text(total_item);
      }
    });

    //Total Unread Message
    $.ajax({
      method: 'GET',
      url: '<?php echo site_url('count_unread_messages'); ?>',
      success: function(res) {
        console.log(res);
        // var data = res.data;

        // var unread = data.total_item;
        $('#unread_sum').text(res);
      }
    });
  </script>
<?php endif; ?>

<script>
  function send_message() {
    // e.preventDefault();
    var message = $("#pesan").val();
    $.ajax({
      url: base_url + 'message/send',
      type: 'POST',
      dataType: 'json',
      data: {
        message: message
      },
      success: function(data) {
        console.log(data);
      },
      error: function() {
        console.log(data);
      },
    });
  }
  // $("#send_message").submit(function(e) {

  // });



  $('.add-cart').click(function(e) {
    e.preventDefault();
    console.log('check');
    var id = $(this).data('id');
    var sku = $(this).data('sku');
    var qty = $(this).data('qty');
    qty = (qty > 0) ? qty : 1;
    var price = $(this).data('price');
    var name = $(this).data('name');

    $.ajax({
      method: 'POST',
      url: '<?php echo site_url('cart_api?action=add_item'); ?>',
      data: {
        id: id,
        sku: sku,
        qty: qty,
        price: price,
        name: name
      },
      success: function(res) {
        if (res.code == 200) {
          var totalItem = res.total_item;
          $('#cart_sum').text(totalItem);
          $('.cart-item-total').text(totalItem);
          $("#myToast").toast("show");
          // toastr.info('Item ditambahkan dalam keranjang');
          new bs5.Toast({
            body: 'Berhasil menambahkan barang ke keranjang belanja',
            autohide: true,
            animation: true,
            btnCloseWhite: true,
            className: 'border-0 bg-success text-white',
            delay: 2000,
          }).show();
        } else if (res.code == 201) {
          window.location.replace(base_url + "login");
        } else if (res.code == 202) {
          new bs5.Toast({
            body: res.message,
            autohide: true,
            animation: true,
            btnCloseWhite: true,
            className: 'border-0 bg-danger text-white',
            delay: 2000,
          }).show();
        } else {
          console.log('Terjadi kesalahan');
        }
      }
    });
  });

  $('.cart-update').on("input", function(e) {
    e.preventDefault();

    var rowid = $(this).data('rowid');
    var qty = $(this).val();

    // $('.product-name', tr).html('<i class="fa fa-spin fa-spinner"></i> Menghapus...');

    $.ajax({
      method: 'POST',
      url: '<?php echo site_url('cart_api?action=update_item'); ?>',
      data: {
        rowid: rowid,
        qty: qty
      },
      success: function(res) {
        if (res.error == 0) {
          // tr.addClass('alert alert-danger');
          $('.qty-item-' + rowid + '').text(qty);
          $('.subtotal-item-' + rowid + '').text(res.item.subtotal);

          $('.n-subtotal').text(res.total.subtotal);
          $('.n-ongkir').text(res.total.ongkir);
          $('.n-total').text(res.total.total);
        }
      }
    })
  });

  $('.delete-button').click(function(e) {
    e.preventDefault();

    var rowid = $(this).data('rowid');
    var cart_list = $('.cart-' + rowid);
    // $('.product-name', tr).html('<i class="fa fa-spin fa-spinner"></i> Menghapus...');

    $.ajax({
      method: 'POST',
      url: '<?php echo site_url('cart_api?action=remove_item'); ?>',
      data: {
        rowid: rowid
      },
      success: function(res) {
        if (res.code == 204) {
          setTimeout(function(e) {
            cart_list.hide('fade');

            $('.n-subtotal').text(res.total.subtotal);
            $('.n-ongkir').text(res.total.ongkir);
            $('.n-total').text(res.total.total);
          }, 500);
        }
        if (res.total.total_item == 0) {
          var div = '<main class="main-wrap empty-cart mb-xxl">' +
            '<div class="banner-box">' +
            '<img src="<?php echo get_theme_uri('svg/empty-cart.svg'); ?>" class="img-fluid" alt="404" />' +
            '</div>' +
            '<section class="error mb-large">' +
            '<h2 class="font-lg">Keranjang belanja anda kosong</h2>' +
            '<a href="<?php echo site_url('category'); ?>" class="btn-solid">Mulai Belanja</a>' +
            '</section>' +
            '</main>';
          setTimeout(function(e) {
            $('.cart-page').replaceWith(div).show('fade');
          }, 1000);
        }
      }
    })
  });

  function update_item(rowid, qty) {

    $.ajax({
      method: 'POST',
      url: '<?php echo site_url('cart_api?action=update_item'); ?>',
      data: {
        rowid: rowid,
        qty: qty
      },
      success: function(res) {
        if (res.error == 0) {
          // tr.addClass('alert alert-danger');
          $('.qty-item-' + rowid + '').text(qty);
          $('.subtotal-item-' + rowid + '').text(res.item.subtotal);

          $('.n-subtotal').text(res.total.subtotal);
          $('.n-ongkir').text(res.total.ongkir);
          $('.n-total').text(res.total.total);
        }
      }
    })
  };


  $('.adds').on('click', function() {
    if ($(this).prev().val() < 100) {
      $(this).prev().val(+$(this).prev().val() + 1);
      update_item($(this).prev().data('rowid'), +$(this).prev().val());
    }
  });
  $('.subs').on('click', function() {
    if ($(this).next().val() > 1) {
      if ($(this).next().val() > 1) $(this).next().val(+$(this).next().val() - 1);
      update_item($(this).next().data('rowid'), +$(this).next().val());
    }
  });
</script>

</script>
</body>
<!-- Body End -->

</html>