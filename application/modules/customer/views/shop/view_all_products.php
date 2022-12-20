<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<div class="page-content-wrapper">
    <div class="top-products-area clearfix py-3">
        <div class="container">
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
                                <a class="product-title d-block" href="single-product.html">Beach Cap</a>
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
    