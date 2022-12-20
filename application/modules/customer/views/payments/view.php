<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>


<div class="page-content-wrapper">
    <div class="container">
        <div class="order-wrapper-area py-3">
            <!-- User Information-->
            <div class="card user-info-card">
                <div class="card-body p-4 d-flex align-items-center">
                    <div class="user-info">
                        <h5 class="mb-0">Data Order</h5>          
                    </div>
                </div>
            </div>
            <!-- User Meta Data-->
            <div class="card user-data-card">
                <div class="card-body">
                    <div class="single-profile-data d-flex align-items-center justify-content-between">
                        <div class="title d-flex align-items-center"><span>Order</span></div>
                        <div class="data-content"><?php echo $data->order_number; ?></div>
                    </div>
                    <div class="single-profile-data d-flex align-items-center justify-content-between">
                        <div class="title d-flex align-items-center"><span>Tanggal</span></div>
                        <div class="data-content"><?php echo get_formatted_date($data->payment_date); ?></div>
                    </div>
                    <div class="single-profile-data d-flex align-items-center justify-content-between">
                        <div class="title d-flex align-items-center"><span>Jumlah Transfer</span></div>
                        <div class="data-content">Rp <?php echo format_rupiah($data->payment_price); ?></div>
                    </div>
                    <div class="single-profile-data d-flex align-items-center justify-content-between">
                        <div class="title d-flex align-items-center"><span>Trasfer dari</span></div>
                        <div class="data-content"><b><?php echo $payment->source->bank; ?> a.n <?php echo $payment->source->name; ?> (<?php echo $payment->source->number; ?>) </div>
                    </div>
                    <div class="single-profile-data d-flex align-items-center justify-content-between">
                        <div class="title d-flex align-items-center"><span>Transfer ke</span></div>
                        <div class="data-content">
                        <b>
                            <?php
                                $transfer_to = $payment->transfer_to;
                                $transfer_to = $banks[$transfer_to];
                                
                            ?>
                            <?php echo $transfer_to->bank; ?> a.n <?php echo $transfer_to->name; ?> (<?php echo $transfer_to->number; ?>)
                        </b>
                        </div>
                    </div>
                    <div class="single-profile-data d-flex align-items-center justify-content-between">
                        <div class="title d-flex align-items-center"><span>Status</span></div>
                        <div class="data-content"><b><?php echo get_payment_status($data->payment_status); ?></b></div>
                    </div>
                    <div class="single-profile-data d-flex align-items-center justify-content-between">
                        <div class="title d-flex align-items-center"><span>Bukti Transfer</span></div>
                        <div class="data-content"><img alt="Pembayaran order #<?php echo $data->order_number; ?>" class="img img-fluid" src="<?php echo base_url('assets/uploads/payments/'. $data->picture_name); ?>"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

