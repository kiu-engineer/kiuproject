<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!-- Main Start -->
<main class="main-wrap index-page mb-xxl">
      <!-- Search Box Start -->
      <div class="search-box">
        <i class="iconly-Search icli search"></i>
        <input class="form-control" type="search" placeholder="Search here..." />
        <i class="iconly-Voice icli mic"></i>
      </div>
      <!-- Search Box End -->

      <!-- Banner Section Start -->
      <section class="banner-section ratio2_1">
        <div class="h-banner-slider">
          <div>
            <div class="banner-box">
              <img src="<?php echo get_theme_uri('images/banner/home1.jpg'); ?>" alt="banner" class="bg-img" />
              <div class="content-box">
                <h1 class="title-color font-md heading">Farm Fresh Veggies</h1>
                <p class="content-color font-sm">Get instant delivery</p>
                <a href="shop.html" class="btn-solid font-sm">Shop Now</a>
              </div>
            </div>
          </div>

          <div>
            <div class="banner-box">
              <img src="<?php echo get_theme_uri('images/banner/home2.jpg'); ?>" alt="banner" class="bg-img" />
              <div class="content-box">
                <h2 class="font-white font-md heading">Farm Fresh Veggies</h2>
                <p class="font-white font-sm">Get instant delivery</p>
                <a href="shop.html" class="btn-outline font-sm">Shop Now</a>
              </div>
            </div>
          </div>
        </div>
      </section>
      <!-- Banner Section End -->

      <!-- Buy from Recently Bought Start -->
      <section class="recently pt-0">
        <div class="recently-wrap">
          <h3 class="font-md">Produk terakhir dibeli</h3>
          <img class="corner" src="<?php echo get_theme_uri('svg/corner.svg'); ?>" alt="corner" />

          <div class="recently-list-slider recently-list">
            <?php if ( count($products) > 0) : ?>
                <?php foreach ($products as $product) : ?>
                    <div>
                    <div class="item">
                        <a href="<?php echo site_url('shop/product/'. $product->id .'/'. $product->sku .'/'); ?>">
                            <img src="<?php echo base_url('assets/uploads/products/'. $product->picture_name); ?>" alt="<?php echo $product->name; ?>" />
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

      <!-- Shop By Category Start -->
      <section class="category pt-0">
        <h3 class="font-md"><span>Kategori Produk </span><span class="line"></span></h3>
        <div class="row gy-sm-4 gy-2">
            
        <?php if ( count($categories) > 0) : ?>            
            <?php $i = 1; foreach ($categories as $category) : ?>
                <div class="col-3">
                    <div class="category-wrap">
                    <div class="bg-shape bg-theme-blue border-blue"></div>
                    <a href="shop.html"> <img class="category img-fluid" src="<?php echo get_theme_uri('images/catagoeris/'.$i.'.png'); ?>" alt="category" /> </a>
                    <span class="title-color"><?php echo $category->name; ?></span>
                    </div>
                </div>
            <?php $i++; endforeach; ?>
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
            <a href="offer.html" class="font-theme">Lihat Semua</a>
          </div>

          <div class="offer-wrap">              
            <?php if ( count($products) > 0) : ?>
                <?php foreach (array_slice($products, 0, 3) as $product) : ?>
                    <div class="product-list media">
                        <a href="<?php echo site_url('shop/product/'. $product->id .'/'. $product->sku .'/'); ?>"><img src="<?php echo base_url('assets/uploads/products/'. $product->picture_name); ?>" class="img-fluid" alt="<?php echo $product->name; ?>" /></a>
                        <div class="media-body">
                            <a href="<?php echo site_url('shop/product/'. $product->id .'/'. $product->sku .'/'); ?>" class="font-sm"> Assorted Capsicum Combo </a>
                            <span class="title-color font-sm">Rp <?php echo format_rupiah($product->price); ?> 
                            <!-- <span class="badges-round bg-theme-theme font-xs">50% off</span> --></span>
                            <div class="plus-minus d-xs-none">
                            <i class="sub" data-feather="minus"></i>
                            <input type="number" value="1" min="0" max="10" />
                            <i class="add" data-feather="plus"></i>
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
            <h4 class="title-color">Harga Termurah</h4>
            <p class="content-color">Temukan Produk Termurah Disini</p>
          </div>
          <a href="shop.html" class="font-theme">See all</a>
        </div>

        <div class="product-slider">            
            <?php if ( count($products) > 0) : ?>
                <?php foreach (array_slice($products, 0, 3) as $product) : ?>
                    <div>
                        <div class="product-card">
                        <div class="img-wrap">
                            <a href="<?php echo site_url('shop/product/'. $product->id .'/'. $product->sku .'/'); ?>"><img src="<?php echo base_url('assets/uploads/products/'. $product->picture_name); ?>" class="img-fluid" alt="<?php echo $product->name; ?>" /> </a>
                        </div>
                        <div class="content-wrap">
                            <a href="<?php echo site_url('shop/product/'. $product->id .'/'. $product->sku .'/'); ?>" class="font-sm title-color"><?php echo $product->name; ?> </a>
                            <span class="title-color font-sm plus-item">Rp <?php echo format_rupiah($product->price); ?>
                            <span class="plus-minus">
                                <i class="sub" data-feather="minus"></i>
                                <input class="val" type="number" value="1" min="1" max="10" />
                                <i class="add" data-feather="plus"></i>
                            </span>
                            <span class="plus-theme"><i data-feather="plus"></i> </span
                            ></span>
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
            <h4 class="title-color">Produk Terlaris</h4>
            <p class="content-color">Produk yang paling banyak dibeli</p>
          </div>
          <a href="shop.html" class="font-theme">See all</a>
        </div>
        
        <div class="row gy-3">
            
        <?php if ( count($products) > 0) : ?>
                <?php foreach (array_slice($products, 0, 8) as $product) : ?>
                    <div class="col-6">
                        <div class="product-card">
                        <div class="img-wrap">
                            <a href="<?php echo site_url('shop/product/'. $product->id .'/'. $product->sku .'/'); ?>"><img src="<?php echo base_url('assets/uploads/products/'. $product->picture_name); ?>" class="img-fluid" alt="<?php echo $product->name; ?>" /> </a>
                        </div>
                        <div class="content-wrap">
                            <a href="<?php echo site_url('shop/product/'. $product->id .'/'. $product->sku .'/'); ?>" class="font-sm title-color"><?php echo $product->name; ?> </a>
                            <span class="title-color font-sm plus-item">Rp <?php echo format_rupiah($product->price); ?>
                            <span class="plus-minus">
                                <i class="sub" data-feather="minus"></i>
                                <input class="val" type="number" value="1" min="1" max="10" />
                                <i class="add" data-feather="plus"></i>
                            </span>
                            <span class="plus-theme"><i data-feather="plus"></i> </span>
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

    