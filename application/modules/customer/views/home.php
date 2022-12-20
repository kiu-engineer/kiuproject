<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
<!-- Main Start -->
<main class="main-wrap index-page mb-xxl pt-2">
  <!-- Search Box Start -->
  <!--
  <div class="search-box">
    <i class="iconly-Search icli search"></i>
    <input class="form-control" type="search" placeholder="Search here..." />
  </div>
  <!-- Search Box End -->
  <?php if (!empty($_SESSION['__ACTIVE_SESSION_DATA'])) : ?>
    <?php
    $jam = date('G');
    $ucapan = '';
    if ($jam >= 0 && $jam <= 10) {
      $ucapan = "Selamat Pagi";
    } else if ($jam > 10 && $jam <= 14) {
      $ucapan = "Selamat Siang";
    } else if ($jam > 14 && $jam <= 18) {
      $ucapan = "Selamat Sore";
    } else if ($jam > 18) {
      $ucapan = "Selamat Malam";
    }
    ?>
    <section class="info pt-0 mt-1">
      <div class="row gy-sm-6 gy-2">
        <div class="col-12">
          <div class="info-wrap bg-shape bg-theme-1">
            <h3 class="font-md"><?= $ucapan; ?>, <?php echo get_user_name(); ?>... </h3>
            <span class="font-sm"> </span>
          </div>
        </div>
      </div>
    </section>
    <section class="info pt-0 mt-1">
      <div class="row gy-sm-6 gy-2">
        <div class="col-6">
          <a href="<?= base_url('invoice'); ?>">
            <div class="info-wrap bg-shape bg-theme-cus">
              <h3 class="font-md">Tagihan </h3>
              <span class="font-sm"><?php echo get_user_invoice(); ?></span>
            </div>
          </a>
        </div>
        <div class="col-6">
          <div class="info-wrap bg-shape bg-theme-cus">
            <h3 class="font-md">Limit Kredit</h3>
            <span class="font-sm"><?php echo get_user_limit_credit(); ?></span>
          </div>
        </div>
      </div>
    </section>
    <?php foreach ($tagihan as $dt) : ?>
      <div class="alert alert-primary <?= $dt->due_date > date('Y-m-d') ? 'bg-theme-5 ' : 'bg-theme-2'; ?> d-flex align-items-center <?= $dt->due_date > date('Y-m-d') ? 'text-black ' : 'text-white'; ?>  alert-dismissible " role="alert">
        <?php if ($dt->due_date > date('Y-m-d')) : ?>
          <img src="<?= base_url('assets/images/'); ?>smiling-face.png" style="height: 24px;width: 24px;" class="flex-shrink-0 me-2">
        <?php else : ?>
          <img src="<?= base_url('assets/images/'); ?>sad-face.png" style="height: 24px;width: 24px;" class="flex-shrink-0 me-2">
        <?php endif; ?>
        <div>
          <?php if ($dt->due_date > date('Y-m-d')) : ?>
            Tagihan anda jatuh tempo pada tanggal <strong><?= get_formatted_date($dt->due_date); ?></strong>
          <?php else : ?>
            Tagihan anda telah melampaui jatuh tempo pada tanggal <strong><?= get_formatted_date($dt->due_date); ?></strong>
          <?php endif; ?>
          senilai
          <strong><?= format_rupiah($dt->total_price + (($dt->shipping_cost) ? $dt->shipping_cost : 0) + (($dt->insurance) ? $dt->insurance : 0)) ?></strong>. Cek
          <a href="<?= base_url('customer/orders/view/') . $dt->id . '#' . $dt->order_number; ?>">Disini</a>
        </div>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
    <?php endforeach; ?>
  <?php endif; ?>

  <section class="menu-awal pt-0 mt-1">
    <div class="row gy-sm-4 gy-2">

      <div class="col-3">
        <div class="menu-wrap">
          <div class="bg-shape bg-theme-menu"></div>
          <a href="<?= site_url('category') ?>"> <img class="menu-img img-fluid" src="<?php echo site_url('assets/icon/kategori.png'); ?>" alt="kategori" /> </a>
          <span class="font-white">Kategori</span>
        </div>
      </div>
      <div class="col-3">
        <div class="menu-wrap">
          <div class="bg-shape bg-theme-menu"></div>
          <a href="<?= site_url('all_products') ?>"> <img class="menu-img img-fluid" src="<?php echo site_url('assets/icon/produk.png'); ?>" alt="produk" /> </a>
          <span class="font-white">Produk</span>
        </div>
      </div>
      <div class="col-3">
        <div class="menu-wrap">
          <div class="bg-shape bg-theme-menu"></div>
          <a href="<?= site_url('promo') ?>"> <img class="menu-img img-fluid" src="<?php echo site_url('assets/icon/diskon.png'); ?>" alt="diskon" /> </a>
          <span class="font-white">Promo</span>
        </div>
      </div>
      <div class="col-3">
        <div class="menu-wrap">
          <div class="bg-shape bg-theme-menu"></div>
          <a href="<?= site_url('cart') ?>"> <img class="menu-img img-fluid" src="<?php echo site_url('assets/icon/keranjang.png'); ?>" alt="cart" /> </a>
          <span class="font-white">cart</span>
        </div>
      </div>
      <div class="col-3">
        <div class="menu-wrap">
          <div class="bg-shape bg-theme-menu"></div>
          <a href="<?= site_url('invoice') ?>"> <img class="menu-img img-fluid" src="<?php echo site_url('assets/icon/kredit.png'); ?>" alt="kredit" /> </a>
          <span class="font-white">Tagihan</span>
        </div>
      </div>
      <div class="col-3">
        <div class="menu-wrap">
          <div class="bg-shape bg-theme-menu"></div>
          <a href="<?= site_url('order_history') ?>"> <img class="menu-img img-fluid" src="<?php echo site_url('assets/icon/histori.png'); ?>" alt="histori" /> </a>
          <span class="font-white">Riwayat</span>
        </div>
      </div>
      <div class="col-3">
        <div class="menu-wrap">
          <div class="bg-shape bg-theme-menu"></div>
          <a href="<?= site_url('message') ?>"> <img class="menu-img img-fluid" src="<?php echo site_url('assets/icon/pesan.png'); ?>" alt="chat" /> </a>
          <span class="font-white">Chat</span>
        </div>
      </div>
      <div class="col-3">
        <div class="menu-wrap">
          <div class="bg-shape bg-theme-menu"></div>
          <a href="<?= site_url('profile') ?>"> <img class="menu-img img-fluid" src="<?php echo site_url('assets/icon/user-setting.png'); ?>" alt="setting" /> </a>
          <span class="font-white">Setting</span>
        </div>
      </div>


    </div>
  </section>

  <!-- Banner Section Start -->
  <section class="banner-section ratio2_1">
    <div class="h-banner-slider">

      <?php if (count($banner_product) > 0) : ?>
        <?php foreach (array_slice($banner_product, 0, 3) as $banner) : ?>

          <div>
            <div class="banner-box">
              <a href="<?php echo site_url('product/' . $banner->id . '/' . $banner->sku . '/'); ?>">
                <img src="<?php echo base_url('assets/uploads/banner_product/' . $banner->banner_image); ?>" alt="banner" class="bg-img" />
              </a>
            </div>
          </div>
        <?php endforeach; ?>
      <?php else : ?>
      <?php endif; ?>

      <!-- <div>
        <div class="banner-box">
          <img src="<?php echo get_theme_uri('images/banner/bn1.jpg'); ?>" alt="banner" class="bg-img" />
         <div class="content-box">
            <h1 class="title-color font-md heading">aaaa</h1>
            <p class="content-color font-sm">Get instant delivery</p>
            <a href="shop.html" class="btn-solid font-sm">Shop Now</a>
          </div>
        </div>
      </div>

      <div>
        <div class="banner-box">
          <img src="<?php echo get_theme_uri('images/banner/bn2.jpg'); ?>" alt="banner" class="bg-img" />
         <div class="content-box">
            <h2 class="font-white font-md heading">Farm Fresh Veggies</h2>
            <p class="font-white font-sm">Get instant delivery</p>
            <a href="shop.html" class="btn-outline font-sm">Shop Now</a>
          </div>
        </div>
      </div>

      <div>
        <div class="banner-box">
          <img src="<?php echo get_theme_uri('images/banner/bn3.jpg'); ?>" alt="banner" class="bg-img" />
         <div class="content-box">
            <h2 class="font-white font-md heading">Farm Fresh Veggies</h2>
            <p class="font-white font-sm">Get instant delivery</p>
            <a href="shop.html" class="btn-outline font-sm">Shop Now</a>
          </div>
        </div>
      </div>
       -->
    </div>
  </section>
  <!-- Banner Section End -->

  <?php if (!empty($_SESSION['__ACTIVE_SESSION_DATA'])) : ?>
    <!-- <section class="recently pt-0">
    <div class="recently-wrap">
      <h3 class="font-md">Batas Sisa Kredit</h3>
      <img class="corner" src="<?php echo get_theme_uri('svg/corner.svg'); ?>" alt="corner" />
      <span class="font-sm"><?php echo get_user_limit_transaction(); ?></span>
    </div>
  </section> -->

    <!-- Buy from Recently Bought Start -->
    <section class="recently pt-0">
      <div class="recently-wrap">
        <h3 class="font-md">Produk terakhir dibeli</h3>
        <img class="corner" src="<?php echo get_theme_uri('svg/corner.svg'); ?>" alt="corner" />

        <div class="recently-list-slider recently-list">
          <?php if (count($last_order) > 0) : ?>
            <?php foreach ($last_order as $data) : ?>
              <div>
                <div class="item">
                  <a href="<?php echo site_url('product/' . $data->id . '/' . $data->sku . '/'); ?>">
                    <img src="<?php echo base_url('assets/uploads/products/' . $data->picture_name); ?>" alt="<?php echo $data->name; ?>" />
                  </a>
                </div>
              </div>
            <?php endforeach; ?>
          <?php else : ?>
          <?php endif; ?>
        </div>
      </div>
    </section>
    <!-- Buy from Recently Bought End -->
  <?php endif; ?>

  <!-- Shop By Category Start -->
  <section class="category pt-0">
    <h3 class="font-md"><span>Kategori Produk </span><span class="line"></span></h3>
    <div class="row gy-sm-4 gy-2">

      <?php if (count($categories) > 0) : ?>
        <?php $i = 1;
        foreach ($categories as $category) : ?>
          <div class="col-3">
            <div class="category-wrap">
              <div class="bg-shape bg-theme-blue border-blue"></div>
              <a href="<?php echo site_url('category/' . $category->id . '/' . $category->name . '/'); ?>"> <img class="category img-fluid" src="<?php echo get_theme_uri('images/catagoeris/' . $i . '.png'); ?>" alt="category" /> </a>
              <span class="title-color"><?php echo $category->name; ?></span>
            </div>
          </div>
        <?php $i++;
        endforeach; ?>
      <?php else : ?>
      <?php endif; ?>


    </div>
  </section>
  <!-- Shop By Category End -->

  <!-- Say hello to Offers! Start -->
  <section class="offer-section pt-0">
    <div class="offer">
      <div class="top-content">
        <div>
          <h4 class="title-color">Promo Spesial</h4>
          <p class="content-color">Dapatkan Spesial Promo untuk Anda</p>
        </div>
        <!--    <a href="offer.html" class="font-theme">Lihat Semua</a> -->
      </div>

      <div class="offer-wrap">
        <?php if (count($promo_products) > 0) : ?>
          <?php foreach (array_slice($promo_products, 0, 3) as $product) : ?>
            <div class="product-list media">
              <a href="<?php echo site_url('product/' . $product->id . '/' . $product->sku . '/'); ?>"><img src="<?php echo base_url('assets/uploads/products/' . $product->picture_name); ?>" class="img-fluid" alt="<?php echo $product->name; ?>" /></a>
              <div class="media-body">
                <a href="<?php echo site_url('product/' . $product->id . '/' . $product->sku . '/'); ?>" class="font-sm"> <?php echo $product->name; ?></a>
                <span class="title-color font-sm">Rp <?php echo get_price($product->promo_price, $product->promo_price_2, $product->promo_price_3); ?> <del><small> <?php echo get_price($product->price, $product->price_2, $product->price_3); ?></small></del>
                  <!-- <span class="badges-round bg-theme-theme font-xs">50% off</span> --></span>
                <div class="plus-minus d-xs-none">
                  <a class="btn btn-success btn-sm add-to-chart add-cart" href="#" data-sku="<?php echo $product->sku; ?>" data-name="<?php echo $product->name; ?>" data-price="<?php echo ($product->promo == 1) ? get_v_price($product->promo_price, $product->promo_price_2, $product->promo_price_3) : get_v_price($product->price, $product->price_2, $product->price_3); ?>" data-id="<?php echo $product->id; ?>">Beli</a>
                </div>
              </div>
            </div>
          <?php endforeach; ?>
        <?php else : ?>
        <?php endif; ?>
      </div>
    </div>
  </section>
  <!-- Say hello to Offers! End -->

  <!-- Lowest Price Start -->
  <section class="low-price-section pt-0">
    <div class="top-content">
      <div>
        <h4 class="title-color">Produk Terlaris</h4>
        <p class="content-color">Produk yang paling banyak dibeli</p>
      </div>
      <!--  <a href="shop.html" class="font-theme">See all</a> -->
    </div>

    <div class="product-slider">
      <?php if (count($best_products) > 0) : ?>
        <?php foreach ($best_products as $product) : ?>
          <div>
            <div class="product-card">
              <div class="img-wrap">
                <a href="<?php echo site_url('product/' . $product->id . '/' . $product->sku . '/'); ?>"><img src="<?php echo base_url('assets/uploads/products/' . $product->picture_name); ?>" class="img-fluid" alt="<?php echo $product->name; ?>" /> </a>
              </div>
              <div class="content-wrap">
                <a href="<?php echo site_url('product/' . $product->id . '/' . $product->sku . '/'); ?>" class="font-sm title-color"><?php echo $product->name; ?> </a>
                <?php if ($product->promo == 1) : ?>
                  <span class="title-color font-sm">Rp <?php echo get_price($product->promo_price, $product->promo_price_2, $product->promo_price_3); ?> <del><small> <?php echo get_price($product->price, $product->price_2, $product->price_3); ?></small></del>
                  <?php else : ?>
                    <span class="title-color font-sm plus-item">Rp <?php echo ($product->promo == 1) ? get_price($product->promo_price, $product->promo_price_2, $product->promo_price_3) : get_price($product->price, $product->price_2, $product->price_3); ?>
                    <?php endif; ?>
                    <a class="btn btn-success btn-sm add-to-chart add-cart" href="#" data-sku="<?php echo $product->sku; ?>" data-name="<?php echo $product->name; ?>" data-price="<?php echo ($product->promo == 1) ? get_v_price($product->promo_price, $product->promo_price_2, $product->promo_price_3) : get_v_price($product->price, $product->price_2, $product->price_3); ?>" data-id="<?php echo $product->id; ?>">Beli</a>
                    </span>
              </div>
            </div>
          </div>
        <?php endforeach; ?>
      <?php else : ?>
      <?php endif; ?>



    </div>
  </section>
  <!-- Lowest Price End -->

  <!-- Everyday Essentials Start -->
  <section class="low-price-section pt-0">
    <div class="top-content">
      <div>
        <h4 class="title-color">Semua Produk</h4>
        <!--  <p class="content-color">Produk yang paling banyak dibeli</p> -->
      </div>
      <a href="all_products" class="font-theme">Lihat Semua</a>
    </div>

    <div class="row gy-3">

      <?php if (count($products) > 0) : ?>
        <?php foreach (array_slice($products, 0, 8) as $product) : ?>
          <div class="col-6">
            <div class="product-card">
              <div class="img-wrap">
                <a href="<?php echo site_url('product/' . $product->id . '/' . $product->sku . '/'); ?>"><img src="<?php echo base_url('assets/uploads/products/' . $product->picture_name); ?>" class="img-fluid" alt="<?php echo $product->name; ?>" /> </a>
              </div>
              <div class="content-wrap">
                <a href="<?php echo site_url('product/' . $product->id . '/' . $product->sku . '/'); ?>" class="font-sm title-color"><?php echo $product->name; ?> </a>
                <?php if ($product->promo == 1) : ?>

                  <span class="title-color font-sm">Rp <?php echo get_price($product->promo_price, $product->promo_price_2, $product->promo_price_3); ?> <del><small> <?php echo get_price($product->price, $product->price_2, $product->price_3); ?></small></del>
                  <?php else : ?>
                    <span class="title-color font-sm plus-item">Rp <?php echo get_price($product->price, $product->price_2, $product->price_3); ?>
                    <?php endif; ?>
                    <a class="btn btn-success btn-sm add-to-chart add-cart" href="#" data-sku="<?php echo $product->sku; ?>" data-name="<?php echo $product->name; ?>" data-price="<?php echo ($product->promo == 1) ? get_v_price($product->promo_price, $product->promo_price_2, $product->promo_price_3) : get_v_price($product->price, $product->price_2, $product->price_3); ?>" data-id="<?php echo $product->id; ?>">Beli</a>
                    </span>
              </div>
            </div>
          </div>
        <?php endforeach; ?>
      <?php else : ?>
      <?php endif; ?>
    </div>
  </section>
  <!-- Everyday Essentials End -->

</main>
<!-- Main End -->