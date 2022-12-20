<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
<!-- Header -->
<div class="header bg-primary pb-6">
  <div class="container-fluid">
    <div class="header-body">
      <div class="row align-items-center py-4">
        <div class="col-lg-6 col-7">
          <h6 class="h2 text-white d-inline-block mb-0">Kelola Pembayaran</h6>
        </div>
        <div class="col-lg-6 col-5 text-right">
          <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
            <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
              <li class="breadcrumb-item"><a href="#"><i class="fas fa-home"></i></a></li>
              <li class="breadcrumb-item active" aria-current="page">Pembayaran</li>
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
    <div class="col">
      <div class="card">
        <!-- Card header -->
        <div class="card-header">
          <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">

            <li class="nav-item" role="presentation">
              <a class="nav-link " id="all-tab" data-toggle="pill" href="#all" role="tab" aria-controls="all" aria-selected="true">Semua
                <span class="badge badge-warning" id="info-all"> </span>
              </a>
            </li>
            <li class="nav-item" role="presentation">
              <a class="nav-link" id="notpaid-tab" data-toggle="pill" href="#notpaid" role="tab" aria-controls="notpaid" aria-selected="false">Belum Dikonfirmasi
                <span class="badge badge-warning" id="info-notpaid"> </span>
              </a>
            </li>
            <li class="nav-item" role="presentation">
              <a class="nav-link active" id="paid-tab" data-toggle="pill" href="#paid" role="tab" aria-controls="paid" aria-selected="false">Berhasil Dikonfirmasi
                <span class="badge badge-warning" id="info-process"> </span>
              </a>
            </li>
          </ul>
        </div>
        <div class="card-body p-0">
          <div class="tab-content" id="pills-tabContent">

            <div class="tab-pane fade " id="all" role="tabpanel" aria-labelledby="all-tab">
              <div class="table-responsive">
                <table class="table align-items-center table-flush">
                  <thead class="thead-light">
                    <tr>
                      <th scope="col">ID</th>
                      <th scope="col">Pembayaran Order</th>
                      <th scope="col">Customer</th>
                      <th scope="col">Tanggal</th>
                      <th scope="col">Jumlah</th>
                      <th scope="col">Status</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php $i = 1;
                    foreach ($all_payments as $payment) : ?>
                      <tr>
                        <th scope="col">
                          <?php echo $i; ?>
                        </th>
                        <td>#<?php echo anchor('admin/payments/view/' . $payment->id, $payment->order_number); ?></td>
                        <td>
                          <?php echo $payment->customer; ?>
                        </td>
                        <td>
                          <?php echo get_formatted_date($payment->payment_date); ?>
                        </td>
                        <td>
                          Rp <?php echo format_rupiah($payment->payment_price); ?>
                        </td>
                        <td><?php echo get_payment_status($payment->status); ?></td>
                      </tr>
                    <?php $i++;
                    endforeach; ?>
                  </tbody>
                </table>
              </div>
            </div>

            <div class="tab-pane fade show active" id="paid" role="tabpanel" aria-labelledby="paid-tab">
              <div class="table-responsive">
                <table class="table align-items-center table-flush">
                  <thead class="thead-light">
                    <tr>
                      <th scope="col">ID</th>
                      <th scope="col">Pembayaran Order</th>
                      <th scope="col">Customer</th>
                      <th scope="col">Tanggal</th>
                      <th scope="col">Jumlah</th>
                      <th scope="col">Status</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php $i = 1;
                    foreach ($confirmed as $payment) : ?>
                      <tr>
                        <th scope="col">
                          <?php echo $i; ?>
                        </th>
                        <td>#<?php echo anchor('admin/payments/view/' . $payment->id, $payment->order_number); ?></td>
                        <td>
                          <?php echo $payment->customer; ?>
                        </td>
                        <td>
                          <?php echo get_formatted_date($payment->payment_date); ?>
                        </td>
                        <td>
                          Rp <?php echo format_rupiah($payment->payment_price); ?>
                        </td>
                        <td><?php echo get_payment_status($payment->status); ?></td>
                      </tr>
                    <?php $i++;
                    endforeach; ?>
                  </tbody>
                </table>
              </div>
            </div>

            <div class="tab-pane fade show" id="notpaid" role="tabpanel" aria-labelledby="notpaid-tab">
              <div class="table-responsive">
                <table class="table align-items-center table-flush">
                  <thead class="thead-light">
                    <tr>
                      <th scope="col">ID</th>
                      <th scope="col">Pembayaran Order</th>
                      <th scope="col">Customer</th>
                      <th scope="col">Tanggal</th>
                      <th scope="col">Jumlah</th>
                      <th scope="col">Status</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php $i = 1;
                    foreach ($not_confirmed as $payment) : ?>
                      <tr>
                        <th scope="col">
                          <?php echo $i; ?>
                        </th>
                        <td>#<?php echo anchor('admin/payments/view/' . $payment->id, $payment->order_number); ?></td>
                        <td>
                          <?php echo $payment->customer; ?>
                        </td>
                        <td>
                          <?php echo get_formatted_date($payment->payment_date); ?>
                        </td>
                        <td>
                          Rp <?php echo format_rupiah($payment->payment_price); ?>
                        </td>
                        <td><?php echo get_payment_status($payment->status); ?></td>
                      </tr>
                    <?php $i++;
                    endforeach; ?>
                  </tbody>
                </table>
              </div>
            </div>

          </div>

        </div>

        <div class="card-footer">
          <?php echo $pagination; ?>
        </div>

      </div>
    </div>
  </div>