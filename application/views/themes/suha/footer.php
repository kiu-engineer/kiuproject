<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<!-- Internet Connection Status-->
<div class="internet-connection-status" id="internetStatus"></div>
    <!-- Footer Nav-->
    <div class="footer-nav-area" id="footerNav">
        <div class="container h-100 px-0">
            <div class="suha-footer-nav h-100">
            <?php
            $menu_active = $this->uri->segment('2');
            ?>
                <ul class="h-100 d-flex align-items-center justify-content-between ps-0">
                    <li class="<?=$menu_active == '' ? 'active' : '' ;?>"><a href="<?php echo site_url('home'); ?>"><i class="lni lni-home"></i>Home</a></li>
                    <li class="<?=$menu_active == 'all_products' ? 'active' : '' ;?>"><a href="<?php echo site_url('shop/all_products'); ?>"><i class="lni lni-mashroom"></i>Product</a></li>
                    <li class="<?=$menu_active == 'cart' ? 'active' : '' ;?>"><a href="<?php echo site_url('shop/cart'); ?>"><i class="lni lni-shopping-basket"></i>Cart</a></li>
                    <li class="<?=$menu_active == 'orders' ? 'active' : '' ;?>"><a href="<?php echo site_url('customer/orders'); ?>"><i class="lni lni-delivery"></i>Order History</a></li>
                    <li class="<?=$menu_active == 'profile' ? 'active' : '' ;?>"><a href="<?php echo site_url('customer/profile'); ?>"><i class="lni lni-user"></i>My Profile</a></li>
                </ul>
            </div>
        </div>
    </div>
    <!-- All JavaScript Files-->
    <script src="<?php echo get_theme_uri('js/bootstrap.bundle.min.js'); ?>"></script>
    <script src="<?php echo get_theme_uri('js/jquery.min.js'); ?>"></script>
    <script src="<?php echo get_theme_uri('js/waypoints.min.js'); ?>"></script>
    <script src="<?php echo get_theme_uri('js/jquery.easing.min.js'); ?>"></script>
    <script src="<?php echo get_theme_uri('js/owl.carousel.min.js'); ?>"></script>
    <script src="<?php echo get_theme_uri('js/jquery.counterup.min.js'); ?>"></script>
    <script src="<?php echo get_theme_uri('js/jquery.countdown.min.js'); ?>"></script>
    <script src="<?php echo get_theme_uri('js/default/jquery.passwordstrength.js'); ?>"></script>
    <script src="<?php echo get_theme_uri('js/default/dark-mode-switch.js'); ?>"></script>
    <script src="<?php echo get_theme_uri('js/default/no-internet.js'); ?>"></script>
    <script src="<?php echo get_theme_uri('js/default/active.js'); ?>"></script>
    <script src="<?php echo get_theme_uri('js/pwa.js'); ?>"></script>

    <script src="https://unpkg.com/swiper@8/swiper-bundle.min.js"></script>
    <script src="<?php echo base_url('assets/plugins/toastr/toastr.min.js'); ?>"></script>

    <script>
      toastr.options = {
      "closeButton": false,
      "debug": false,
      "newestOnTop": false,
      "progressBar": false,
      "positionClass": "toast-top-right",
      "preventDuplicates": false,
      "onclick": null,
      "showDuration": "300",
      "hideDuration": "1000",
      "timeOut": "5000",
      "extendedTimeOut": "1000",
      "showEasing": "swing",
      "hideEasing": "linear",
      "showMethod": "fadeIn",
      "hideMethod": "fadeOut"
    }
    var swiper = new Swiper(".mySwiper", {
      slidesPerView: 3,
      spaceBetween: 20
    });

      $.ajax({
        method: 'GET',
        url: '<?php echo site_url('shop/cart_api?action=cart_info'); ?>',
        success: function (res) {
          var data = res.data;

          var total_item = data.total_item;
          $('.cart-item-total').text(total_item);
        }
      });

      $('.add-cart').click(function(e) {
        e.preventDefault();
        console.log('clicked');
        var id = $(this).data('id');
        var sku = $(this).data('sku');
        var qty = $(this).data('qty');
        qty = (qty > 0) ? qty : 1;
        var price = $(this).data('price');
        var name = $(this).data('name');

        $.ajax({
          method: 'POST',
          url: '<?php echo site_url('shop/cart_api?action=add_item'); ?>',
          data: {
            id: id,
            sku: sku,
            qty: qty,
            price: price,
            name: name
          },
          success: function (res) {
            if (res.code == 200) {
              var totalItem = res.total_item;

              $('.cart-item-total').text(totalItem);
              toastr.info('Item ditambahkan dalam keranjang');
            }
            else {
              console.log('Terjadi kesalahan');
            }
          }
        });
      });
    </script>
</body>

</html>
