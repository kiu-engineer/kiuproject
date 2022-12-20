<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>


<?php if (count($carts) > 0) : ?>
  <!-- Main Start -->
  <main class="main-wrap cart-page mb-xxl">

    <?php if ($this->session->flashdata('limit')) : ?>
      <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <?= $this->session->flashdata('limit'); ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
    <?php endif; ?>


    <form action="<?php echo site_url('checkout'); ?>" method="POST">
      <!-- Cart-->
      <!-- Cart Item Section Start  -->
      <div class="cart-item-wrap pt-0 mb-3">
        <?php foreach ($carts as $item) : ?>
          <div class="swipe-to-show cart-<?php echo $item['rowid']; ?>">
            <div class="product-list media">
              <a href="#"><img src="<?php echo get_product_image($item['id']); ?>" alt="offer" /></a>
              <div class="media-body">
                <a href="#" class="font-sm"> <?php echo $item['name']; ?> </a>
                <span class="content-color font-xs">Rp <?php echo format_rupiah($item['price']); ?> x <span class="qty-item-<?php echo $item['rowid']; ?>"><?php echo $item['qty']; ?></span></span>
                <span class="title-color subtotal-item-<?php echo $item['rowid']; ?> font-sm">Rp <?php echo format_rupiah($item['subtotal']); ?></span>
                <div class="plus-minus">
                  <i class="subs" data-feather="minus"></i>
                  <input class="cart-update" name="quantity[<?php echo $item['rowid']; ?>]" type="number" data-qty="<?php echo $item['qty']; ?>" data-rowid="<?php echo $item['rowid']; ?>" value="<?php echo $item['qty']; ?>" min="0" max="1000" />
                  <i class="adds" data-feather="plus"></i>
                </div>
              </div>
            </div>
            <div class="delete-button" data-bs-toggle="offcanvas" data-bs-target="#confirmation" aria-controls="confirmation" data-rowid="<?php echo $item['rowid']; ?>">
              <i data-feather="trash"></i>
            </div>
          </div>

        <?php endforeach; ?>


      </div>
      <!-- Cart Item Section End  -->
      <!-- Coupon Area-->
      <div class="card coupon-card mb-3">
        <div class="card-body">
          <div class="apply-coupon">
            <h6 class="mb-0">Apakah anda punya Kupon?</h6>
            <p class="mb-2">Masukkan kode kupon untuk mendapatkan potongan harga!</p>
            <div class="coupon-form">
              <input id="code" name="coupon_code" type="text" class="form-control" placeholder="">
            </div>
          </div>
        </div>
      </div>
      <!-- Cart Amount Area-->
      <div class="card cart-amount-area mb-3">
        <div class="card-body d-flex align-items-center justify-content-between">
          Subtotal <h5 class="total-price n-total mb-0">Rp <?php echo format_rupiah($total_price); ?></h5>
        </div>
      </div>
      <div class="card cart-amount-area mb-3">
        <div class="card-body d-flex align-items-center justify-content-between">
          Biaya Pengiriman
          <!-- Nonaktifkan Ongkir Otomatis -->
          <!-- <?php if ($total_cart >= get_settings('min_shop_to_free_shipping_cost')) : ?>
            <h5 class="total-price mb-0"><span class="n-ongkir font-weight-bold">Menunggu Proses Sales</span></h5>
          <?php else : ?>
            <h5 class="total-price mb-0"><span class="n-ongkir font-weight-bold">Rp <?php echo format_rupiah(get_settings('shipping_cost')); ?></span></h5>
          <?php endif; ?> -->

          <h5 class="total-price mb-0"><span class="badge bg-info">*Menunggu Proses Sales</span></h5>
        </div>
      </div>
      <div class="card cart-amount-area mb-3">
        <div class="card-body d-flex align-items-center justify-content-between">
          Total <h5 class="total-price mb-0"><span class="badge bg-info">*Menunggu Proses Sales</span></h5>
        </div>
      </div>
      <div class="card cart-amount-area">
        <div class="card-body d-flex align-items-center justify-content-between">
          <button type="submit" class="btn btn-warning">Checkout Sekarang</button>
          <!-- <h5 class="total-price n-total mb-0">Rp <?php echo format_rupiah($total_price); ?></h5> -->
        </div>
      </div>

    </form>
  </main>
  <!-- Main End -->


<?php else : ?>
  <main class="main-wrap empty-cart mb-xxl">
    <!-- Banner Start -->
    <div class="banner-box">
      <img src="<?php echo get_theme_uri('svg/empty-cart.svg'); ?>" class="img-fluid" alt="404" />
    </div>
    <!-- Banner End -->

    <!-- Error Section Start -->
    <section class="error mb-large">
      <h2 class="font-lg">Keranjang belanja anda kosong</h2>
      <!-- <p class="content-color font-md">Looks like you haven’t added anything to your cart yet. You will find a lot of interesting products on our “Shop” page</p> -->
      <a href="<?php echo site_url('category'); ?>" class="btn-solid">Mulai Belanja</a>
    </section>
    <!-- Error Section End -->
  </main>
<?php endif; ?>