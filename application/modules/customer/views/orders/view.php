<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>

<main class="main-wrap order-detail mb-xxl">
    <!-- Banner Start -->
    <section class="pt-0">
        <div class="banner-box">
            <div class="media">
                <img src="<?php echo get_theme_uri('icons/svg/box.svg'); ?>" alt="box" />
                <div class="media-body">
                    <span class="font-sm">Order ID: #<?php echo $data->order_number; ?></span>
                    <h2><?php echo get_order_status($data->order_status, $data->payment_method); ?></h2>
                </div>
            </div>
        </div>
    </section>
    <!-- Banner End -->

    <!-- Item Section Start -->
    <section class="item-section p-0">
        <h3 class="font-theme font-md">Items:</h3>

        <div class="item-wrap">
            <!-- Item Start -->
            <?php foreach ($items as $item) : ?>
                <a class="media">
                    <div class="count">
                        <span class="font-sm"><?php echo $item->order_qty; ?></span>
                        <i data-feather="x"></i>
                    </div>
                    <div class="media-body">
                        <h4 class="title-color font-sm"><?php echo $item->name; ?></h4>
                        <!-- <span class="content-color font-sm">500g</span> -->
                    </div>
                    <span class="title-color font-md">Rp <?php echo format_rupiah($item->order_price); ?></span>
                </a>
            <?php endforeach; ?>

            <!-- Item End -->
        </div>
    </section>
    <!-- Item Section End -->

    <!-- Order Summary Section Start -->
    <section class="order-summary p-0">
        <h3 class="font-theme font-md">Data Order</h3>
        <!-- Product Summary Start -->
        <ul>
            <li>
                <span>No. Faktur</span>
                <span><?php echo $data->invoice_number; ?></span>
            </li>
            <li>
                <span>No. TTB</span>
                <span><?php echo $data->ttb_number; ?></span>
            </li>
            <li>
                <span>Tanggal Order</span>
                <span><?php echo get_formatted_date($data->order_date); ?></span>
            </li>
            <li>
                <span>Jatuh Tempo Pembayaran</span>
                <span><?php echo get_formatted_date($data->due_date); ?></span>
            </li>
            <li>
                <span>Jumlah Barang</span>
                <span><?php echo $data->total_items; ?></span>
            </li>
            <?php if ($data->coupon_id) : ?>
                <li>
                    <span>Total Belanja</span>
                    <span>Rp <?php echo format_rupiah($data->total_price + $data->kupon); ?></span>
                </li>
                <li>
                    <span>Potongan Kupon</span>
                    <span>Rp <?php echo format_rupiah($data->kupon); ?></span>
                </li>
            <?php else : ?>
                <li>
                    <span>Total Belanja</span>
                    <span>Rp <?php echo format_rupiah($data->total_price); ?></span>
                </li>
            <?php endif; ?>
            <li>
                <span>Ekspedisi</span>
                <span>Rp <?php echo format_rupiah($data->shipping_cost); ?></span>
            </li>
            <li>
                <span>Asuransi</span>
                <span>Rp <?php echo format_rupiah($data->insurance); ?></span>
            </li>
            <li>
                <span>Total Keseluruhan</span>
                <span class="font-theme">Rp <?php echo format_rupiah($data->final_price); ?></span>
            </li>

            <li>
                <span>Pembayaran</span>
                <span>
                    <?php echo ($data->payment_method == 1) ? 'Kredit' : ''; ?>
                    <?php echo ($data->payment_method == 2) ? 'Transfer Bank' : ''; ?>
                </span>
            </li>

            <li>
                <span>Pengiriman</span>
                <span>
                    <?php echo ($data->shipping_method == 1) ? 'PT. Karisma Indoagro Universal' : ''; ?>
                </span>
            </li>
        </ul>
        <!-- Product Summary End -->
    </section>
    <!-- Order Summary Section End -->

    <!-- Address Section Start -->
    <section class="address-section p-0">
        <h3 class="font-theme font-md">Pembayaran</h3>

        <div class="address">
            <?php if ($data->payment_price == NULL) : ?>
                <div class="alert alert-info m-2">Tidak ada data pembayaran.</div>
            <?php else : ?>
                <table class="table table-hover table-striped table-hover">
                    <tr>
                        <td>Transfer</td>
                        <td><b>Rp <?php echo format_rupiah($data->payment_price); ?></b></td>
                    </tr>
                    <tr>
                        <td>Tanggal</td>
                        <td><b><?php echo get_formatted_date($data->payment_date); ?></b></td>
                    </tr>
                    <tr>
                        <td>Status</td>
                        <td><b>
                                <?php if ($data->payment_status == 1) : ?>
                                    <span>Menunggu konfirmasi</span>
                                <?php elseif ($data->payment_method == 2) : ?>
                                    <span>Dikonfirmasi</span>
                                <?php elseif ($data->payment_method == 3) : ?>
                                    <span>Gagal</span>
                                <?php endif; ?>
                            </b></td>
                    </tr>
                    <tr>
                        <td>Transfer ke</td>
                        <td><b>
                                <?php
                                $bank_data = json_decode($data->payment_data);
                                $bank_data  = (array) $bank_data;
                                $transfer_to = $bank_data['transfer_to'];

                                $transfer_to = $banks[$transfer_to];
                                $transfer_from = $bank_data['source'];
                                ?>
                                <?php echo $transfer_to->bank; ?> a.n <?php echo $transfer_to->name; ?> (<?php echo $transfer_to->number; ?>)
                            </b></td>
                    </tr>
                    <tr>
                        <td>Transfer dari</td>
                        <td><b><?php echo $transfer_from->bank; ?> a.n <?php echo $transfer_from->name; ?> (<?php echo $transfer_from->number; ?>)</b></td>
                    </tr>
                </table>
            <?php endif; ?>
        </div>
    </section>
    <!-- Address Section End -->

    <!-- <?= $data->payment_method; ?> <br>
        <?= $data->order_status; ?> -->
    <!-- Payment Method Section Start -->
    <section class="payment-method p-0">
        <h3 class="font-theme font-md">Tindakan</h3>

        <div class="payment">
            <?php if ($data->payment_method == 1) : ?>
                <?php if ($data->order_status == 1) : ?>
                    <div class="alert alert-info m-2 w-100">Pesanan dalam proses sales</div>
                    <a href="#" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#cancelModal">Batalkan</a>
                <?php elseif ($data->order_status == 2) : ?>
                    <div class="alert alert-info m-2 w-100">Menunggu Pembayaran</div>
                    <a href="<?php echo site_url('customer/payments/confirm?order=' . $data->id); ?>" class="btn btn-success">Konfirmasi Pembayaran</a>
                <?php elseif ($data->order_status == 3) : ?>
                    <div class="alert alert-info m-2 w-100">Pesanan dalam pengemasan</div>
                <?php elseif ($data->order_status == 4) : ?>
                    <div class="alert alert-info m-2 w-100">Pesanan dalam pengiriman</div>
                    <a href="#" class="btn btn-success w-100" data-bs-toggle="modal" data-bs-target="#terimaModal"><i class="fa fa-thumbs-o-up"></i> Terima Barang</a>
                <?php elseif ($data->order_status == 5) : ?>
                    <?php if ($data->payment_price == NULL) : ?>
                        <div class="alert alert-info m-2 w-100">Pesanan sudah diterima dan menunggu pelunasan</div>
                        <a href="<?php echo site_url('customer/payments/confirm?order=' . $data->id); ?>" class="btn btn-success">Konfirmasi Pembayaran</a>
                    <?php else : ?>
                        <div class="alert alert-info m-2 w-100">Menunggu konfirmasi pembayaran</div>
                    <?php endif; ?>
                <?php elseif ($data->order_status == 6) : ?>
                    <div class="alert alert-info m-2 w-100">Pesanan selesai</div>
                <?php elseif ($data->order_status == 7) : ?>
                    <div class="alert alert-info m-2 w-100">Pesanan dibatalkan</div>
                    <!-- <a href="#" class="btn btn-warning w-100" data-bs-toggle="modal" data-bs-target="#deleteModal"><iclass="fa fa-trash"></i> Hapus</a> -->
                <?php endif; ?>

            <?php elseif ($data->payment_method == 2) : ?>
                <?php if ($data->order_status == 1) : ?>
                    <div class="alert alert-info m-2 w-100">Pesanan dalam proses sales</div>
                    <a href="#" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#cancelModal">Batalkan</a>
                <?php elseif ($data->order_status == 2) : ?>
                    <div class="alert alert-info m-2 w-100">Menunggu konfirmasi pembayaran</div>
                    <a href="<?php echo site_url('customer/payments/confirm?order=' . $data->id); ?>" class="btn btn-success">Konfirmasi Pembayaran</a>
                <?php elseif ($data->order_status == 3) : ?>
                    <div class="alert alert-info m-2 w-100">Pesanan dalam pengemasan</div>
                <?php elseif ($data->order_status == 4) : ?>
                    <div class="alert alert-info m-2 w-100">Pesanan dalam pengiriman</div>
                    <a href="#" class="btn btn-success w-100" data-bs-toggle="modal" data-bs-target="#terimaModal"><i class="fa fa-thumbs-o-up"></i> Terima Barang</a>
                <?php elseif ($data->order_status == 6) : ?>
                    <div class="alert alert-info m-2 w-100">Pesanan selesai</div>
                <?php elseif ($data->order_status == 7) : ?>
                    <div class="alert alert-info m-2 w-100">Pesanan dibatalkan</div>
                    <!-- <a href="#" class="btn btn-warning w-100" data-bs-toggle="modal" data-bs-target="#deleteModal"><i class="fa fa-trash"></i> Hapus</a> -->
                <?php endif; ?>

            <?php endif; ?>
        </div>
    </section>
    <!-- Payment Method Section End -->
</main>





<?php if (($data->payment_method == 2 && $data->order_status == 4) || ($data->payment_method == 1 && $data->order_status == 4)) : ?>
    <div class="modal fade" id="terimaModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="terimaModalLabel">Terima Pesanan</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <h4 class="mt-2">Rating Sales</h4>
                    <div class="mb-3 rating">
                        <label class="rating-label">
                            <input name="rating" class="rating" max="5" oninput="this.style.setProperty('--value', `${this.valueAsNumber}`)" step="1" style="--stars:5;--value:0" type="range" value="0">
                        </label>
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Keterangan</label>
                        <textarea name="rating-desc" class="form-control"></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-success terima-btn">Terima</button>
                </div>
            </div>
        </div>
    </div>

    <script>
        $('.terima-btn').click(function(e) {
            e.preventDefault();

            // $(this).html('<i class="fa fa-spin fa-spinner"></i> Proses...');
            let rating = $('input[name="rating"]').val();
            let rating_desc = $('textarea[name="rating-desc"]').val();
            $.ajax({
                method: 'POST',
                url: '<?php echo site_url('customer/orders/order_api?action=terima_order'); ?>',
                data: {
                    id: <?php echo $data->id; ?>,
                    rating: rating,
                    rating_desc: rating_desc
                },
                context: this,
                success: function(res) {
                    if (res.code == 200) {
                        // $(this).html('Terima');

                        if (res.success) {
                            $('.statusField').text('Diterima');
                            $('.actionRow').html('Order Diterima');
                        } else if (res.error) {
                            $('.actionRow').html(res.message);
                        }

                        setTimeout(() => {
                            $('#terimaModal').modal('hide');
                            location.reload();
                        }, 1000);
                    }
                }
            })
        })
    </script>
<?php endif; ?>

<?php if ($data->order_status == 1) : ?>
    <div class="modal fade" id="cancelModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="cancelModalLabel">Batalkan Pesanan</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>Anda yakin ingin membatalkan pesanan? </p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-danger cancel-btn">Batalkan</button>
                </div>
            </div>
        </div>
    </div>

    <script>
        $('.cancel-btn').click(function(e) {
            e.preventDefault();

            $(this).html('<i class="fa fa-spin fa-spinner"></i> Membatalkan...');

            $.ajax({
                method: 'POST',
                url: '<?php echo site_url('customer/orders/order_api?action=cancel_order'); ?>',
                data: {
                    id: <?php echo $data->id; ?>
                },
                context: this,
                success: function(res) {
                    if (res.code == 200) {
                        $(this).html('Batalkan');

                        if (res.success) {
                            $('.statusField').text('Dibatalkan');
                            $('.actionRow').html('Order dibatalkan');
                        } else if (res.error) {
                            $('.actionRow').html(res.message);
                        }

                        setTimeout(() => {
                            $('#cancelModal').modal('hide');
                            location.reload();
                        }, 1000);
                    }
                }
            })
        })
    </script>
<?php endif; ?>

<?php if ($data->order_status == 5) : ?>
    <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="deletelModalLabel">Hapus Pesanan</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p class="deleteText">Anda yakin ingin menghapus pesanan? Semua data yang terkait juga akan dihapus</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-warning delete-btn">Hapus</button>
                </div>
            </div>
        </div>
    </div>

    <script>
        $('.delete-btn').click(function(e) {
            e.preventDefault();

            $(this).html('<i class="fa fa-spin fa-spinner"></i> Menghapus...');
            var del = $('.deleteText');

            $.ajax({
                method: 'POST',
                url: '<?php echo site_url('customer/orders/order_api?action=delete_order'); ?>',
                data: {
                    id: <?php echo $data->id; ?>
                },
                context: this,
                success: function(res) {
                    if (res.code == 200) {
                        $(this).html('Hapus');

                        if (res.success) {
                            del.html('Order dan semua datanya berhasil dihapus');

                            setTimeout(() => {
                                del.html('<i class="fa fa-spin fa-spinner"></i> Mengalihkan...');
                            }, 3000);
                            setTimeout(() => {
                                window.location = '<?php echo site_url('customer/orders'); ?>';
                            }, 5000);
                        } else if (res.error) {
                            $('.actionRow').html(res.message);

                            setTimeout(() => {
                                $('#deleteModal').modal('hide');
                            }, 2000);
                        }
                    }
                }
            })
        })
    </script>
<?php endif; ?>