<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<div class="page-content-wrapper">
        <div class="container">
            <div class="pt-3">
                <!-- Hero Slides-->
                <div class="hero-slides owl-carousel">
                    <!-- Single Hero Slide-->
                    <div class="single-hero-slide" style="background-image: url('<?php echo get_theme_uri('img/banner1.jfif'); ?>')">
                    </div>
                    <!-- Single Hero Slide-->
                    <div class="single-hero-slide" style="background-image: url('<?php echo get_theme_uri('img/banner1.jfif'); ?>')">
                    </div>
                    <!-- Single Hero Slide-->
                    <div class="single-hero-slide" style="background-image: url('<?php echo get_theme_uri('img/banner1.jfif'); ?>')">
                    </div>
                </div>
            </div>
        </div>
        <!-- Product Catagories-->
        <div class="product-catagories-wrapper py-3">
            <div class="container">
                <div class="section-heading">
                    <h6>Kategori Produk</h6>
                </div>
                <div class="product-catagory-wrap">
                    <div class="row g-3">
                        <!-- Single Catagory Card-->
                        <?php if ( count($categories) > 0) : ?>
                        <?php foreach ($categories as $category) : ?>
                          <div class="col-4">
                              <div class="card catagory-card">
                                  <div class="card-body"><a class="text-danger" href="<?php echo site_url('shop/products_in_category/'. $category->id .'/'. $category->name .'/'); ?>">
                                          <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" fill="currentColor" viewBox="0 0 16 16">
                                              <path fill-rule="evenodd" d="M8 2.748l-.717-.737C5.6.281 2.514.878 1.4 3.053c-.523 1.023-.641 2.5.314 4.385.92 1.815 2.834 3.989 6.286 6.357 3.452-2.368 5.365-4.542 6.286-6.357.955-1.886.838-3.362.314-4.385C13.486.878 10.4.28 8.717 2.01L8 2.748zM8 15C-7.333 4.868 3.279-3.04 7.824 1.143c.06.055.119.112.176.171a3.12 3.12 0 0 1 .176-.17C12.72-3.042 23.333 4.867 8 15z" />
                                          </svg>
                                          <span><?php echo $category->name; ?></span></a>
                                  </div>
                              </div>
                          </div>
                        <?php endforeach; ?>
                        <?php else : ?>
                        <?php endif; ?>
                        <!-- Single Catagory Card-->
                    </div>
                </div>
            </div>
        </div>
        <div class="product-catagories-wrapper py-3">
            <div class="container">
                <div class="section-heading d-flex align-items-center justify-content-between">
                    <h6>Promo Produk</h6>
                    <a class="btn btn-danger btn-sm" href="<?php echo site_url('shop/all_products/'); ?>">Lihat Semua</a>
                </div>
                <div class="swiper mySwiper">
                    <div class="swiper-wrapper">
                            <?php if ( count($products) > 0) : ?>
                                <?php foreach ($products as $product) : ?>

                                <div class="swiper-slide">
                                    <div class="card top-product-card">
                                        <div class="card-body">
                                        <?php if ($product->current_discount > 0) : ?>
                                            <span class="badge badge-success"><?php echo count_percent_discount($product->current_discount, $product->price, 0); ?>%</span>
                                        <?php endif; ?>

                                        <!-- <a class="wishlist-btn" href="#"><i class="lni lni-heart"></i></a> -->
                                        <a class="product-thumbnail d-block" href="<?php echo site_url('shop/product/'. $product->id .'/'. $product->sku .'/'); ?>">
                                            <img class="mb-2" src="<?php echo base_url('assets/uploads/products/'. $product->picture_name); ?>" alt="<?php echo $product->name; ?>">
                                        </a>
                                        <a class="product-title d-block" href="<?php echo site_url('shop/product/'. $product->id .'/'. $product->sku .'/'); ?>"><?php echo $product->name; ?></a>
                                        <?php if ($product->current_discount > 0) : ?>
                                            <p class="sale-price">Rp <?php echo format_rupiah($product->price - $product->current_discount); ?><span>Rp <?php echo format_rupiah($product->price); ?></span></p>
                                        <?php else : ?>
                                            <p class="sale-price">Rp <?php echo format_rupiah($product->price - $product->current_discount); ?></p>
                                        <?php endif; ?>

                                        <a class="btn btn-success btn-sm add-to-chart add-cart" href="#" data-sku="<?php echo $product->sku; ?>" data-name="<?php echo $product->name; ?>" data-price="<?php echo ($product->current_discount > 0) ? ($product->price - $product->current_discount) : $product->price; ?>" data-id="<?php echo $product->id; ?>"><i class="lni lni-plus"></i></a>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                            <?php else : ?>
                            <?php endif; ?>
                    </div>
                    <div class="swiper-pagination"></div>
                </div>
            </div>
        </div>
        <!-- Top Products-->
        <div class="top-products-area clearfix py-3">
            <div class="container">
                <div class="section-heading d-flex align-items-center justify-content-between">
                    <h6>Top Products</h6><a class="btn btn-danger btn-sm" href="<?php echo site_url('shop/all_products/'); ?>">Lihat Semua</a>
                </div>
                <div class="row g-3">
                    <!-- Single Top Product Card-->
                    <?php if ( count($products) > 0) : ?>
                      <?php foreach ($products as $product) : ?>

                        <div class="col-6 col-md-4 col-lg-3">
                            <div class="card top-product-card">
                                <div class="card-body">
                                  <?php if ($product->current_discount > 0) : ?>
                                    <span class="badge badge-success"><?php echo count_percent_discount($product->current_discount, $product->price, 0); ?>%</span>
                                  <?php endif; ?>

                                  <!-- <a class="wishlist-btn" href="#"><i class="lni lni-heart"></i></a> -->
                                  <a class="product-thumbnail d-block" href="<?php echo site_url('shop/product/'. $product->id .'/'. $product->sku .'/'); ?>">
                                    <img class="mb-2" src="<?php echo base_url('assets/uploads/products/'. $product->picture_name); ?>" alt="<?php echo $product->name; ?>">
                                  </a>
                                  <a class="product-title d-block" href="<?php echo site_url('shop/product/'. $product->id .'/'. $product->sku .'/'); ?>"><?php echo $product->name; ?></a>
                                  <?php if ($product->current_discount > 0) : ?>
                                    <p class="sale-price">Rp <?php echo format_rupiah($product->price - $product->current_discount); ?><span>Rp <?php echo format_rupiah($product->price); ?></span></p>
                                  <?php else : ?>
                                    <p class="sale-price">Rp <?php echo format_rupiah($product->price - $product->current_discount); ?></p>
                                  <?php endif; ?>

                                  <a class="btn btn-success btn-sm add-to-chart add-cart" href="#" data-sku="<?php echo $product->sku; ?>" data-name="<?php echo $product->name; ?>" data-price="<?php echo ($product->current_discount > 0) ? ($product->price - $product->current_discount) : $product->price; ?>" data-id="<?php echo $product->id; ?>"><i class="lni lni-plus"></i></a>
                                </div>
                            </div>
                        </div>
                      <?php endforeach; ?>
                    <?php else : ?>
                    <?php endif; ?>

                </div>
            </div>
        </div>
    </div>
