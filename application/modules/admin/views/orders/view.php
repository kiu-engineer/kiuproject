<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
<!-- Header -->
<div class="header bg-primary pb-6">
  <div class="container-fluid">
    <div class="header-body">
      <div class="row align-items-center py-4">
        <div class="col-lg-6 col-7">
          <h6 class="h2 text-white d-inline-block mb-0">Order #<?php echo $data->order_number; ?></h6>
        </div>
        <div class="col-lg-6 col-5 text-right">
          <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
            <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
              <li class="breadcrumb-item"><a href="#"><i class="fas fa-home"></i></a></li>
              <li class="breadcrumb-item"><a href="#">Order</a></li>
              <li class="breadcrumb-item active" aria-current="page">#<?php echo $data->order_number; ?></li>
            </ol>
          </nav>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Page content -->
<div class="container-fluid mt--6">

  <div class="row">
    <div class="col-md-8">
      <div class="card-wrapper">
        <div class="card">
          <div class="card-header">
            <h3 class="mb-0">Data Pengiriman</h3>
            <?php if ($order_flash) : ?>
              <span class="float-right text-success font-weight-bold" style="margin-top: -30px;"><?php echo $order_flash; ?></span>
            <?php endif; ?>
          </div>

          <div class="card-body p-0">
            <table class="table align-items-center table-flush table-striped">
              <tr>
                <td>Nomor Order</td>
                <td><b>#<?php echo $data->order_number; ?></b></td>
              </tr>
              <tr>
                <td>Tanggal Order</td>
                <td><b><?php echo get_formatted_date($data->order_date); ?></b></td>
              </tr>
              <tr>
                <td>Nama Customer</td>
                <td><b><?php echo $delivery_data->customer->name; ?></b></td>
              </tr>
              <tr>
                <td>Nama Toko</td>
                <td><b><?= (isset($delivery_data->customer->shop_name) ? $delivery_data->customer->shop_name : '-'); ?></b></td>
              </tr>
              <tr>
                <td>Alamat Toko / Pengiriman</td>
                <td>
                  <div style="white-space: initial;"><b><?= (isset($delivery_data->customer->shop_address) ? $delivery_data->customer->shop_address : '-'); ?></b></div>
                </td>
              </tr>
              <tr>
                <td>Item</td>
                <td><b><?php echo $data->total_items; ?></b></td>
              </tr>
              <tr>
                <td>Metode pembayaran</td>
                <td><b>
                    <?php echo ($data->payment_method == 1) ? 'Kredit' : ''; ?>
                    <?php echo ($data->payment_method == 2) ? 'Transfer Bank' : ''; ?>
                  </b></td>
              </tr>
              <tr>
                <td>Metode pengiriman</td>
                <td><b>
                    <?php echo ($data->shipping_method == 1) ? 'PT. Karisma Indoagro Universal' : ''; ?>
                  </b></td>
              </tr>
              <tr>
                <td>Catatan</td>
                <td><b><?php echo $delivery_data->note; ?></b></td>
              </tr>
              <tr>
                <td>Status</td>
                <td><b class="statusField"><?php echo get_order_status($data->order_status, $data->payment_method); ?></b></td>
              </tr>
              <?php if ($data->payment_method == 5) : ?>
                <!--    <tr>
                          <td>Tanggal Jatuh Tempo</td>
                          <td><b class="statusField"><?php echo get_formatted_date($data->due_date); ?></b></td>
                      </tr> -->
              <?php endif; ?>
            </table>
          </div>

        </div>

        <div class="card card-primary">
          <div class="card-header">
            <h3 class="mb-0">Barang dalam pesanan</h3>
          </div>
          <div class="card-body p-0">

            <form action="<?php echo site_url('admin/orders/api/update_harga'); ?>" method="POST">
              <table class="table align-items-center table-flush">
                <thead class="thead-light">
                  <tr>
                    <th scope="col"></th>
                    <th scope="col">Produk</th>
                    <th scope="col">Jumlah beli</th>
                    <th scope="col">Harga satuan</th>
                  </tr>
                </thead>
                <tbody>
                  <input type="hidden" value="<?php echo $order_id; ?>" name="order_id">
                  <?php foreach ($items as $item) : ?>
                    <tr>
                      <td>
                        <img class="img img-fluid rounded" style="width: 60px; height: 60px;" alt="<?php echo $item->name; ?>" src="<?php echo base_url('assets/uploads/products/' . $item->picture_name); ?>">
                      </td>
                      <td>
                        <h5 class="mb-0"><?php echo $item->name; ?></h5>
                      </td>
                      <td><?php echo $item->order_qty; ?></td>
                      <td>
                        <input type="hidden" value="<?php echo $item->id; ?>" name="id[]">
                        <input type="hidden" value="<?php echo $item->order_qty; ?>" name="qty[]">
                        <input type="text" value="<?= floatval($item->order_price); ?>" class="form-control form-control-sm" name="order_price[]" <?= ($data->order_status != 1 ? 'readonly' : ''); ?>>
                      </td>
                    </tr>
                  <?php endforeach; ?>

                  <tr>
                    <td colspan="4">
                      <div class="col-md-3 text-right">
                        <?php if ($data->order_status == 1) { ?>
                          <input type="submit" class="btn btn-primary" value="Update Harga">
                        <?php } ?>
                      </div>
                    </td>
                  </tr>
                </tbody>
              </table>
            </form>
          </div>
        </div>

      </div>

    </div>

    <?php if (admin_role() != 'kadep') : ?>
      <div class="col-md-4">

        <div class="card card-primary">
          <div class="card-header">
            <h3 class="mb-0">Ongkir dan Asuransi</h3>
          </div>
          <div class="card-body p-0">
            <form action="<?php echo site_url('admin/orders/api/verify'); ?>" method="POST">
              <table class="table align-items-center table-flush table-hover">
                <tr>
                  <td>No. Faktur</td>
                  <td>
                    <input type="hidden" value="<?php echo $data->id; ?>" name="id">
                    <input type="hidden" value="<?php echo $data->payment_method; ?>" name="payment_method">
                    <input type="text" value="<?php echo $data->invoice_number; ?>" class="form-control form-control-sm" name="invoice_number">
                  </td>
                </tr>
                <!--  <tr>
                          <td>No. TTB</td>
                          <td>
                              <input type="text" value="<?php echo $data->ttb_number; ?>" class="form-control form-control-sm" name="ttb_number">
                          </td>
                      </tr> -->
                <?php if (admin_role() != 'distribusi') { ?>
                  <tr>
                    <td>Tgl Jatuh Tempo</td>
                    <td>
                      <input type="date" value="<?php echo $data->due_date; ?>" class="form-control form-control-sm" name="due_date">
                    </td>
                  </tr>
                  <tr>
                    <td>Ongkir</td>
                    <td>
                      <input type="text" value="<?php echo $data->shipping_cost; ?>" class="form-control form-control-sm" name="shipping_cost">
                    </td>
                  </tr>
                  <tr>
                    <td>Asuransi</td>
                    <td>
                      <input type="text" value="<?php echo $data->insurance; ?>" class="form-control form-control-sm" name="insurance">
                    </td>
                  </tr>
                  <tr>
                    <td></td>
                    <td>
                      <div class="col-md-3 text-right">
                        <input type="submit" class="btn btn-primary" value="OK">
                      </div>
                    </td>
                  </tr>
                <?php } ?>
              </table>
            </form>
          </div>
        </div>

        <!--      <div class="card card-primary">
                <div class="card-header">
                    <h3 class="mb-0">Data Penerima</h3>
                </div>
                <div class="card-body p-0">
                    <table class="table align-items-center table-flush table-hover">
                        <tr>
                            <td>Nama</td>
                            <td><b><?php echo $delivery_data->customer->name; ?></b></td>
                        </tr>
                        <tr>
                            <td>No. HP</td>
                            <td><b><?php echo $delivery_data->customer->phone_number; ?></b></td>
                        </tr>
                        <tr>
                            <td>Alamat</td>
                            <td><div style="white-space: initial;"><b><?php echo $delivery_data->customer->address; ?></b></div></td>
                        </tr>
                        <tr>
                            <td>Catatan</td>
                            <td><b><?php echo $delivery_data->note; ?></b></td>
                        </tr>
                    </table>
                </div>
            </div> -->
        <?php if (admin_role() != 'distribusi') { ?>
          <div class="card card-primary" id="#payments">
            <div class="card-header">
              <h3 class="mb-0">Pembayaran</h3>
            </div>
            <div class="card-body <?php echo ($data->payment_method == 1) ? 'p-0' : ''; ?>">
              <?php if ($data->payment_method == 2) : ?>
                <?php if ($data->payment_price == NULL) : ?>
                  <div class="alert alert-info m-2">Tidak ada data pembayaran.</div>
                <?php else : ?>

                  <div>
                    <img class="img img-fluid" src="<?php echo base_url('assets/uploads/payments/' . $data->picture_name); ?>">
                  </div>

                  <?php if ($payment_flash) : ?>
                    <br>
                    <div class="alert alert-info" id="payment_flash"><?php echo $payment_flash; ?></div>
                  <?php endif; ?>

                  <table class="table align-items-center table-flush table-hover">
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
                            <span class="badge badge-info">Menunggu konfirmasi</span>
                          <?php elseif ($data->payment_status == 2) : ?>
                            <span class="badge badge-success">Dikonfirmasi</span>
                          <?php elseif ($data->payment_status == 3) : ?>
                            <span class="badge badge-danger">Gagal</span>
                          <?php endif; ?>
                        </b></td>
                    </tr>
                    <tr>
                      <td>Transfer ke</td>
                      <td>
                        <div style="white-space: initial;"><b>
                            <?php
                            $bank_data = json_decode($data->payment_data);
                            $bank_data  = (array) $bank_data;
                            $transfer_to = $bank_data['transfer_to'];

                            $transfer_to = $banks[$transfer_to];
                            $transfer_from = $bank_data['source'];
                            ?>
                            <?php echo $transfer_to->bank; ?> a.n <?php echo $transfer_to->name; ?> (<?php echo $transfer_to->number; ?>)
                          </b></div>
                      </td>
                    </tr>
                    <tr>
                      <td>Transfer dari</td>
                      <td>
                        <div style="white-space: initial;">
                          <b><?php echo $transfer_from->bank; ?> a.n <?php echo $transfer_from->name; ?> (<?php echo $transfer_from->number; ?>)</b>
                        </div>
                      </td>
                    </tr>
                  </table>
                <?php endif; ?>
              <?php elseif ($data->payment_method == 1) : ?>
                <?php if ($data->payment_price == NULL) : ?>
                  <div class="alert alert-info m-2">Tidak ada data pembayaran.</div>
                <?php else : ?>

                  <div>
                    <img class="img img-fluid" src="<?php echo base_url('assets/uploads/payments/' . $data->picture_name); ?>">
                  </div>

                  <?php if ($payment_flash) : ?>
                    <br>
                    <div class="alert alert-info" id="payment_flash"><?php echo $payment_flash; ?></div>
                  <?php endif; ?>

                  <table class="table align-items-center table-flush table-hover">
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
                            <span class="badge badge-info">Menunggu konfirmasi</span>
                          <?php elseif ($data->payment_status == 2) : ?>
                            <span class="badge badge-success">Dikonfirmasi</span>
                          <?php elseif ($data->payment_status == 3) : ?>
                            <span class="badge badge-danger">Gagal</span>
                          <?php endif; ?>
                        </b></td>
                    </tr>
                    <tr>
                      <td>Transfer ke</td>
                      <td>
                        <div style="white-space: initial;"><b>
                            <?php
                            $bank_data = json_decode($data->payment_data);
                            $bank_data  = (array) $bank_data;
                            $transfer_to = $bank_data['transfer_to'];

                            $transfer_to = $banks[$transfer_to];
                            $transfer_from = $bank_data['source'];
                            ?>
                            <?php echo $transfer_to->bank; ?> a.n <?php echo $transfer_to->name; ?> (<?php echo $transfer_to->number; ?>)
                          </b></div>
                      </td>
                    </tr>
                    <tr>
                      <td>Transfer dari</td>
                      <td>
                        <div style="white-space: initial;">
                          <b><?php echo $transfer_from->bank; ?> a.n <?php echo $transfer_from->name; ?> (<?php echo $transfer_from->number; ?>)</b>
                        </div>
                      </td>
                    </tr>
                  </table>
                <?php endif; ?>
              <?php endif; ?>
            </div>
            <?php if ($data->payment_price != NULL) : ?>
              <div class="card-footer">
                <form action="<?php echo site_url('admin/payments/verify'); ?>" method="POST">
                  <div class="row">
                    <input type="hidden" name="id" value="<?php echo $data->payment_id; ?>">
                    <input type="hidden" name="payment_method" value="<?php echo $data->payment_method; ?>">
                    <input type="hidden" name="order" value="<?php echo $data->id; ?>">
                    <div class="col-md-9">
                      <select class="form-control" name="action">
                        <?php if ($data->payment_status == 1) : ?>
                          <option value="1">Konfirmasi Pembayaran</option>
                          <option value="2">Pembayaran Tidak Ada</option>
                        <?php else : ?>
                          <option value="4" readonly>Tidak ada pilihan</option>
                        <?php endif; ?>
                      </select>
                    </div>
                    <div class="col-md-3 text-right">
                      <input type="submit" class="btn btn-primary" value="OK">
                    </div>
                  </div>
                </form>
              </div>
            <?php endif; ?>
          </div>
        <?php } ?>
      </div>
    <?php endif; ?>
  </div>