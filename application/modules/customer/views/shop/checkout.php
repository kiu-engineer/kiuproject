<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>


<main class="main-wrap cart-page mb-xxl">
    <!-- Checkout Wrapper-->
    <form action="<?php echo site_url('checkout_submit'); ?>" method="POST">
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
                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">Nama</label>
                            <input type="text" name="name" value="<?php echo $customer->name; ?>" class="form-control" id="name" required>
                        </div>
                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">No. Telepon</label>
                            <input type="text" name="phone_number" value="<?php echo $customer->phone_number; ?>" class="form-control" id="hp" required>
                        </div>
                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">Alamat Customer</label>
                            <textarea name="address" class="form-control" id="address" required><?php echo $customer->address; ?></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">Nama Toko</label>
                            <textarea name="shop_name" class="form-control" id="shop_name" required><?php echo $customer->shop_name; ?></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">Alamat Toko / Alamat Pengiriman</label>
                            <textarea name="shop_address" class="form-control" id="shop_address" required><?php echo $customer->shop_address; ?></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">Catatan</label>
                            <textarea name="note" class="form-control" id="note"></textarea>
                        </div>
                        <!-- Edit Address<a class="btn btn-danger w-100" href="edit-profile.html">Edit Billing Information</a> -->


                    </div>
                </div>
            </div>
            <!-- Payment Method Choose-->
            <div class="shipping-method-choose mb-3">
                <div class="alert alert-info m-2">Metode Pembayaran</div>
                <div class="card shipping-method-choose-card">
                    <div class="card-body">
                        <div class="payment-method-choose">

                            <div class="row">
                                <!-- Net Banking Option Start -->
                                <?php if (is_member()) : ?>
                                    <div class="input-box col-6">
                                        <input type="radio" name="payment" id="kredit" value="1" checked="" />
                                        <label class="form-check-label" for="cod">Kredit </label>
                                    </div>
                                <?php endif; ?>
                                <div class="input-box col-6">
                                    <input type="radio" name="payment" id="transfer" value="2" checked="" />
                                    <label class="form-check-label" for="transfer">Transfer Bank </label>
                                </div>
                                <!-- Net Banking Option End -->
                            </div>

                        </div>
                    </div>
                </div>
            </div>
            <!-- shipping method choose-->
            <div class="shipping-method-choose mb-3">
                <div class="alert alert-info m-2">Metode Pengiriman</div>
                <div class="card shipping-method-choose-card">
                    <div class="card-body">


                        <div class="row">
                            <div class="input-box col-6">
                                <input id="karisma" name="shipping" type="radio" value="1" checked>
                                <label for="karisma">PT. Karisma Indoagro Universal</label>
                                <div class="check"></div>
                            </div>
                            <!--  <div class="input-box col-6">
                                    <input id="jnt" name="shipping" type="radio" value="2">
                                    <label for="jnt">J&T Express (J&T)</label>
                                    <div class="check"></div>
                                </div>
                                 <div class="input-box col-6">
                                    <input id="lion" name="shipping" type="radio" value="3">
                                    <label for="lion">Lion Parcel (LION)</label>
                                    <div class="check"></div>
                                </div>
                                <div class="input-box col-6">
                                    <input id="ninja" name="shipping" type="radio" value="4">
                                    <label for="ninja">Ninja Xpress (NINJA)</label>
                                    <div class="check"></div>
                                </div>
                                <div class="input-box col-6">
                                    <input id="sicepat" name="shipping" type="radio" value="5">
                                    <label for="sicepat">SiCepat Express (SICEPAT)</label>
                                    <div class="check"></div>
                                </div>
                                <div class="input-box col-6">
                                    <input id="tiki" name="shipping" type="radio" value="6">
                                    <label for="tiki">Citra Van Titipan Kilat (TIKI)</label>
                                    <div class="check"></div>
                                </div>
                                <div class="input-box col-6">
                                    <input id="sentral" name="shipping" type="radio" value="7">
                                    <label for="sentral">Sentral Cargo (SENTRAL)</label>
                                    <div class="check"></div>
                                </div>
                                <div class="input-box col-6">
                                    <input id="wahana" name="shipping" type="radio" value="8">
                                    <label for="wahana">Wahana Express</label>
                                    <div class="check"></div>
                                </div>
                                <div class="input-box col-6">
                                    <input id="anteraja" name="shipping" type="radio" value="9">
                                    <label for="anteraja">AnterAja (ANTERAJA)</label>
                                    <div class="check"></div>
                                </div> -->
                        </div>

                    </div>
                </div>
            </div>
            <!-- Cart Amount Area-->
            <div class="card cart-amount-area mb-10">
                <div class="card-body d-flex align-items-center justify-content-between">
                    <!--    <h5 class="total-price mb-0">Rp <?php echo format_rupiah($total); ?></h5> -->
                    <input type="submit" class="btn btn-warning" value="Buat Pesanan">
                </div>
            </div>
        </div>
    </form>

    </div>