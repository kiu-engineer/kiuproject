<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
<!-- Main Start -->
<main class="main-wrap index-page mb-xxl">



    <!-- Everyday Essentials Start -->
    <section class="low-price-section pt-0 mt-3">
        <div class="top-content">
            <div>
                <h4 class="title-color">Promo Produk</h4>
                <!-- <p class="content-color">Semua produk yang ada di kategori</p> -->
            </div>
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
                                        <span class="title-color font-sm plus-item">Rp <?php echo ($product->promo == 1) ? get_price($product->promo_price, $product->promo_price_2, $product->promo_price_3) : get_price($product->price, $product->price_2, $product->price_3); ?>
                                        <?php endif; ?>

                                        <a class="btn btn-success btn-sm add-to-chart add-cart" href="#" data-sku="<?php echo $product->sku; ?>" data-name="<?php echo $product->name; ?>" data-price="<?php echo ($product->current_discount > 0) ? ($product->price - $product->current_discount) : $product->price; ?>" data-id="<?php echo $product->id; ?>">Beli</a>
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