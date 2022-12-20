<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<div class="page-content-wrapper">
    <div class="container">
        <!-- Cart Wrapper-->
        <div class="cart-wrapper-area py-3">

          <?php if ( count($carts) > 0) : ?> 
          <form action="<?php echo site_url('shop/checkout'); ?>" method="POST">
            <!-- Cart-->
            <div class="cart-table card mb-3">
                <div class="table-responsive card-body">

                        <table class="table mb-0">
                            <tbody>
                              <?php foreach ($carts as $item) : ?>                  
                                <tr class="text-center cart-<?php echo $item['rowid']; ?>">
                                    <th scope="row"><a class="remove-product" href="#" data-rowid="<?php echo $item['rowid']; ?>"><i class="lni lni-close"></i></a></th>
                                    <td><img src="<?php echo get_product_image($item['id']); ?>" alt=""></td>
                                    <td><a href="single-product.html"><?php echo $item['name']; ?><span>Rp <?php echo format_rupiah($item['price']); ?> x <?php echo $item['qty']; ?></span><span>Rp <?php echo format_rupiah($item['subtotal']); ?></span></a></td>
                                    <td>
                                    <div class="quantity">
                                        <input name="quantity[<?php echo $item['rowid']; ?>]" class="qty-text" type="text" value="<?php echo $item['qty']; ?>">
                                    </div>
                                    </td>
                                </tr>
                              <?php endforeach; ?>
                            </tbody>
                        </table>
                </div>
            </div>

            <!-- Coupon Area-->
            <div class="card coupon-card mb-3">
                <div class="card-body">
                    <div class="apply-coupon">
                        <h6 class="mb-0">Have a coupon?</h6>
                        <p class="mb-2">Enter your coupon code here &amp; get awesome discounts!</p>
                        <div class="coupon-form">
                            <input id="code" name="coupon_code" type="text" class="form-control" placeholder="">
                        </div>
                    </div>
                </div>
            </div>
            <!-- Cart Amount Area-->
            <div class="card cart-amount-area mb-3">
                <div class="card-body d-flex align-items-center justify-content-between">
                    Subtotal <h5 class="total-price mb-0"><?php echo format_rupiah($total_cart); ?></h5>
                </div>
            </div>
            <div class="card cart-amount-area mb-3">
                <div class="card-body d-flex align-items-center justify-content-between">
                    Biaya Pengiriman
                    <?php if ( $total_cart >= get_settings('min_shop_to_free_shipping_cost')) : ?>
                      <h5 class="total-price mb-0"><span class="n-ongkir font-weight-bold">Gratis</span></h5>
                    <?php else : ?>
                      <h5 class="total-price mb-0"><span class="n-ongkir font-weight-bold">Rp <?php echo format_rupiah(get_settings('shipping_cost')); ?></span></h5>
                    <?php endif; ?>
                </div>
            </div>
            <div class="card cart-amount-area">
                <div class="card-body d-flex align-items-center justify-content-between">
                <button type="submit" class="btn btn-warning">Checkout Now</button><h5 class="total-price mb-0">Rp <?php echo format_rupiah($total_price); ?></h5>
                </div>
            </div>    
                    
          </form>
          <?php else : ?> 
            <div class="offline-area-wrapper py-3 d-flex align-items-center justify-content-center">
              <div class="offline-text text-center"><img class="mb-4 px-5" src="<?php echo get_theme_uri('img/core-img/cart_empty.png'); ?>" alt="">
                <h5>Tidak ada barang dalam keranjang!</h5>
                <!-- <p>Seems like you're offline, please check your internet connection. This page doesn't support when you offline!</p> -->
                <a class="btn btn-primary" href="<?php echo site_url('shop/all_products'); ?>">Lihat Katalog Produk</a>
              </div>
            </div>
          <?php endif; ?>

        </div>
    </div>
</div>

<script>
  $('.remove-product').click(function(e) {
    e.preventDefault();

    var rowid = $(this).data('rowid');
    var tr = $('.cart-'+ rowid);

    $('.product-name', tr).html('<i class="fa fa-spin fa-spinner"></i> Menghapus...');

    $.ajax({
      method: 'POST',
      url: '<?php echo site_url('shop/cart_api?action=remove_item'); ?>',
      data: { rowid: rowid },
      success: function (res) {
        if (res.code == 204) {
          tr.addClass('alert alert-danger');

          setTimeout(function(e) {
            tr.hide('fade');

            $('.n-subtotal').text(res.total.subtotal);
            $('.n-ongkir').text(res.total.ongkir);
            $('.n-total').text(res.total.total);
          }, 2000);
        }
      }
    })
  })
</script>