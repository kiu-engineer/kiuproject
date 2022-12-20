<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<div class="page-content-wrapper">
    <!-- Product Slides-->
    <div class="product-slides owl-carousel">
        <!-- Single Hero Slide-->
        <div class="single-product-slide" style="background-image: url('<?php echo base_url('assets/uploads/products/'. $product->picture_name); ?>')"></div>
    </div>
    <div class="product-description pb-3">
        <!-- Product Title & Meta Data-->
        <div class="product-title-meta-data bg-white mb-3 py-3">
            <div class="container d-flex justify-content-between">
                <div class="p-title-price">
                    <h6 class="mb-1"><?php echo $product->name; ?></h6>
                    <?php if ($product->current_discount > 0) : ?>
                        <p class="sale-price mb-0">Rp <?php echo format_rupiah($product->price - $product->current_discount); ?><span>Rp <?php echo format_rupiah($product->price); ?></span></p>
                    <?php else : ?>
                      <span>Rp <?php echo format_rupiah($product->price); ?></span>
                      <?php endif; ?>
                    <!-- <p class="sale-price mb-0">$38<span>$41</span></p> -->
                </div>
                <div class="p-wishlist-share"><a href="wishlist-grid.html"><i class="lni lni-heart"></i></a></div>
            </div>
            <!-- Ratings-->
            <div class="product-ratings">
                <div class="container d-flex align-items-center justify-content-between">
                    <div class="ratings"><i class="lni lni-star-filled"></i><i class="lni lni-star-filled"></i><i class="lni lni-star-filled"></i><i class="lni lni-star-filled"></i><i class="lni lni-star-filled"></i><span class="ps-1">3 ratings</span></div>
                    <div class="total-result-of-ratings"><span>5.0</span><span>Very Good </span></div>
                </div>
            </div>
        </div>        
        <!-- Add To Cart-->
        <div class="cart-form-wrapper bg-white mb-3 py-3">
            <div class="container">
                <form class="cart-form" action="#" method="">
                    <div class="order-plus-minus d-flex align-items-center">
                        <div class="quantity-button-handler">-</div>
                        <input class="form-control cart-quantity-input" id="quantity" name="quantity" type="text" step="1" value="1">
                        <div class="quantity-button-handler">+</div>
                    </div>
                    <a href="#" class="btn btn-danger ms-3 add-cart cart-btn" data-sku="<?php echo $product->sku; ?>" data-name="<?php echo $product->name; ?>" data-price="<?php echo ($product->current_discount > 0) ? ($product->price - $product->current_discount) : $product->price; ?>" data-id="<?php echo $product->id; ?>">Beli</a>
                </form>
            </div>
        </div>
        <!-- Product Specification-->
        <div class="p-specification bg-white mb-3 py-3">
            <div class="container">
                <h6>Deskripsi</h6>
                <p><?php echo $product->description; ?></p>
            </div>
        </div>
    </div>
</div>

  <script>
		$(document).ready(function(){

		var quantitiy=0;
		   $('.quantity-right-plus').click(function(e){
		        
		        // Stop acting like a button
		        e.preventDefault();
		        // Get the field name
		        var quantity = parseInt($('#quantity').val());
		        
		        // If is not undefined
		            
		            $('#quantity').val(quantity + 1);
                    $('.cart-btn').attr('data-qty', quantity + 1);
		          
		            // Increment
		        
		    });

		     $('.quantity-left-minus').click(function(e){
		        // Stop acting like a button
		        e.preventDefault();
		        // Get the field name
		        var quantity = parseInt($('#quantity').val());
		        
		        // If is not undefined
		      
		            // Increment
		            if(quantity>0){
		                $('#quantity').val(quantity - 1);
                        $('.cart-btn').attr('data-qty', quantity - 1);
		            }
		    });
		    
		});
	</script>