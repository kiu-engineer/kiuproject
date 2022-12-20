<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>


<?php if (count($invoice) > 0) : ?>
  <!-- Main Start -->

  <main class="main-wrap order-history mb-xxl">

    <ul class="nav nav-tab nav-pills custom-scroll-hidden" id="pills-tab" role="tablist">
      <li class="nav-item" role="presentation">
        <button class="nav-link active" id="catagories1-tab" data-bs-toggle="pill" data-bs-target="#catagories1" type="button" role="tab" aria-controls="catagories1" aria-selected="true"> Belum Bayar </button>
      </li>

      <li class="nav-item" role="presentation">
        <button class="nav-link" id="catagories2-tab" data-bs-toggle="pill" data-bs-target="#catagories2" type="button" role="tab" aria-controls="catagories2" aria-selected="false"> Lunas </button>
      </li>
    </ul>

    <!-- Search Box Start -->
    <div class="search-box">
      <div>
        <!-- <i class="iconly-Search icli search"></i>
        <input class="form-control" type="search" placeholder="Search here..." /> -->
      </div>
      <!-- <button class="filter font-md" type="button" data-bs-toggle="offcanvas" data-bs-target="#filter" aria-controls="filter">Filter</button> -->
    </div>
    <!-- Search Box End -->

    <!-- Tab Content Start -->
    <section class="tab-content ratio2_1" id="pills-tabContent">

      <div class="tab-pane fade show active" id="catagories1" role="tabpanel" aria-labelledby="catagories1-tab">

        <div class="col-12">
          <div class="info-wrap bg-theme-2">
            <h3 class="font-md">Total tagihan anda sebesar <?php echo get_user_invoice(); ?></h3>
            <span class="font-sm"> </span>
          </div>
        </div>

        <?php foreach ($invoice as $order) : ?>
          <?php if ($order->order_status != 6 && $order->order_status != 7) : ?>
            <div class="order-box">
              <div class="media">
                <a href="<?= base_url() . 'customer/orders/view/' . $order->id, '#' . $order->order_number; ?>" class="content-box">
                  <h2 class="font-sm title-color">ID: #<?= $order->order_number; ?></h2>
                  <p class="font-xs content-color"><?php echo get_formatted_date($order->order_date); ?></p>
                  <span class="content-color font-xs">Total: <span class="font-theme"><?php echo format_rupiah($order->final_price); ?></span></span>
                  <span class="content-color font-xs">Jumlah Barang: <span class="font-theme"><?php echo $order->total_items; ?></span></span>

                </a>
                <!--    <div class="media-body">
                      <img src="<?php echo get_theme_uri('images/map/map.jpg'); ?>" alt="map" />
                    </div> -->
              </div>
              <div class="bottom-content">
                <a href="<?= base_url() . 'customer/orders/view/' . $order->id, '#' . $order->order_number ?>" class="title-color font-sm fw-600"> Lihat Detail </a>
                <span class="content-color font-xs">
                  <?php echo get_order_status($order->order_status, $order->payment_method); ?>
                </span>
                <!-- <a href="javascript:void(0)" class="give-rating content-color font-sm"> Rate & Review Product</a> -->
                <div class="rating">
                  <i data-feather="star"></i>
                  <i data-feather="star"></i>
                  <i data-feather="star"></i>
                  <i data-feather="star"></i>
                  <i data-feather="star"></i>
                </div>
              </div>
            </div>
          <?php endif; ?>
        <?php endforeach; ?>
      </div>

      <div class="tab-pane fade" id="catagories2" role="tabpanel" aria-labelledby="catagories2-tab">
        <?php foreach ($invoice as $order) : ?>
          <?php if (($order->order_status == 6)) : ?>
            <div class="order-box">
              <div class="media">
                <a href="<?= base_url() . 'customer/orders/view/' . $order->id, '#' . $order->order_number; ?>" class="content-box">
                  <h2 class="font-sm title-color">ID: #<?= $order->order_number; ?></h2>
                  <p class="font-xs content-color"><?php echo get_formatted_date($order->order_date); ?></p>
                  <span class="content-color font-xs">Total: <span class="font-theme"><?php echo format_rupiah($order->final_price); ?></span></span>
                  <span class="content-color font-xs">Jumlah Barang: <span class="font-theme"><?php echo $order->total_items; ?></span></span>

                </a>
                <!--    <div class="media-body">
                      <img src="<?php echo get_theme_uri('images/map/map.jpg'); ?>" alt="map" />
                    </div> -->
              </div>
              <div class="bottom-content">
                <a href="<?= base_url() . 'customer/orders/view/' . $order->id, '#' . $order->order_number ?>" class="title-color font-sm fw-600"> Lihat Detail </a>
                <span class="content-color font-xs">
                  <?php echo get_order_status($order->order_status, $order->payment_method); ?>
                </span>
                <!-- <a href="javascript:void(0)" class="give-rating content-color font-sm"> Rate & Review Product</a> -->
                <div class="rating">
                  <i data-feather="star"></i>
                  <i data-feather="star"></i>
                  <i data-feather="star"></i>
                  <i data-feather="star"></i>
                  <i data-feather="star"></i>
                </div>
              </div>
            </div>
          <?php endif; ?>

        <?php endforeach; ?>
      </div>

    </section>
    <!-- Tab Content End -->
  </main>
  <!-- Main End -->

<?php else : ?>

  <!-- Main Start -->
  <main class="main-wrap no-order mb-xxl">
    <!-- Banner Start -->
    <div class="banner-box">
      <img src="<?php echo get_theme_uri('svg/no-order.svg'); ?>" class="img-fluid" alt="404" />
    </div>
    <!-- Banner End -->

    <!-- Error Section Start -->
    <section class="error mb-large">
      <h2 class="font-lg">Histori order kosong</h2>
      <!-- <p class="content-color font-md">Anda belum pernah order barang. Silahkan checkout</p> -->
      <a href="<?= site_url('category') ?>" class="btn-solid">Mulai Belanja</a>
    </section>
    <!-- Error Section End -->
  </main>
  <!-- Main End -->
<?php endif; ?>