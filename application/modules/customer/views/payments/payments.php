<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<div class="page-content-wrapper">
    <div class="container">
        <!-- Cart Wrapper-->
        <div class="cart-wrapper-area py-3">
            <?php if ( count($payments) > 0) : ?>
                <div class="cart-table card mb-3">
                    <div class="table-responsive card-body">
                        <table class="table mb-0">
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Tanggal</th>
                                <th scope="col">Status</th>
                            </tr>
                        <tbody>
                        <?php foreach ($payments as $payment) : ?>
                            <tr>
                                <td><?php echo anchor('customer/payments/view/'. $payment->id, '#'. $payment->order_number); ?></td>
                                <td><?php echo get_formatted_date($payment->payment_date); ?></td>
                                <td><?php echo get_payment_status($payment->payment_status); ?></td>
                            </tr>
                        <?php endforeach; ?>                        
                        </tbody>
                    </table>
                </div>
            <?php else : ?>  
                <div class="offline-area-wrapper py-3 d-flex align-items-center justify-content-center">
                    <div class="offline-text text-center"><img class="mb-4 px-5" src="<?php echo get_theme_uri('img/core-img/payment.png'); ?>" alt="">
                        <h5>Belum ada data pembayaran!</h5>
                        <!-- <p>Seems like you're offline, please check your internet connection. This page doesn't support when you offline!</p> -->
                        <?php echo anchor('customer/payments/confirm', 'Konfirmasi pembayaran baru', array('class' => 'btn btn-success mt-3')); ?>
                    </div>
                </div>
            <?php endif; ?>
        </div>
    </div>
</div>

