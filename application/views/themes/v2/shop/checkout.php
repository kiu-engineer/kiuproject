<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<div class="page-content-wrapper">
    <div class="container">
        <!-- Checkout Wrapper-->
        <form action="<?php echo site_url('shop/checkout/order'); ?>" method="POST">
        <div class="checkout-wrapper-area py-3">
            <!-- Billing Address-->
            <div class="billing-information-card mb-3">
                <div class="card billing-information-title-card bg-danger">
                    <div class="card-body">
                        <h6 class="text-center mb-0 text-white">Alamat Pengiriman</h6>
                    </div>
                </div>
                <div class="card user-data-card">
                    <div class="card-body">
                        <div class="single-profile-data d-flex align-items-center justify-content-between">
                            <div class="title d-flex align-items-center"><i class="lni lni-user"></i><span>Nama</span></div>
                            <input type="text" name="name" value="<?php echo $customer->name; ?>" class="form-control" id="name" required>
                        </div>
                        <div class="single-profile-data d-flex align-items-center justify-content-between">
                            <div class="title d-flex align-items-center"><i class="lni lni-phone"></i><span>No HP</span></div>
                            <input type="text" name="phone_number" value="<?php echo $customer->phone_number; ?>" class="form-control" id="hp" required>
                        </div>
                        <div class="single-profile-data d-flex align-items-center justify-content-between">
                            <div class="title d-flex align-items-center"><i class="lni lni-map-marker"></i><span>Alamat</span></div>
                            <textarea name="address" class="form-control" id="address" required><?php echo $customer->address; ?></textarea>
                        </div>
                        <div class="single-profile-data d-flex align-items-center justify-content-between">
                            <div class="title d-flex align-items-center"><i class="lni lni-envelope"></i><span>Catatan</span></div>
                            <textarea name="note" class="form-control" id="note"></textarea>
                        </div>
                        <!-- Edit Address<a class="btn btn-danger w-100" href="edit-profile.html">Edit Billing Information</a> -->
                        
                        
                    </div>
                </div>
            </div>
            <!-- Shipping Method Choose-->
            <div class="shipping-method-choose mb-3">
                <div class="card shipping-method-choose-title-card bg-success">
                    <div class="card-body">
                        <h6 class="text-center mb-0 text-white">Shipping Method Choose</h6>
                    </div>
                </div>
                <div class="card shipping-method-choose-card">
                    <div class="card-body">
                        <div class="shipping-method-choose">
                            <ul class="ps-0">
                                <li>
                                    <input id="transfer" name="payment" type="radio" name="selector" value="1">
                                    <label for="transfer">Transfer Bank</label>
                                    <div class="check"></div>
                                </li>
                                <li>
                                    <input id="cod" name="payment" type="radio" name="selector" value="2" checked>
                                    <label for="cod">Bayar Ditempat (COD)</label>
                                    <div class="check"></div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Cart Amount Area-->
            <div class="card cart-amount-area">
                <div class="card-body d-flex align-items-center justify-content-between">
                    <h5 class="total-price mb-0">Rp <?php echo format_rupiah($total); ?></h5><input type="submit" class="btn btn-warning" value="Buat Pesanan">
                </div>
            </div>
        </div>        
        </form>
    </div>
</div>