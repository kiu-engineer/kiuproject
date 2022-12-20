<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
<!-- Header -->
<div class="header bg-primary pb-6">
  <div class="container-fluid">
    <div class="header-body">
      <div class="row align-items-center py-4">
        <div class="col-lg-6 col-7">
          <h6 class="h2 text-white d-inline-block mb-0">Kelola Produk</h6>
        </div>
        <?php if(admin_role() == 'admin' || admin_role() == 'adminonline') : ?>
         <div class="col-lg-6 col-5 text-right">
           <a href="<?php echo site_url('admin/products/add_new_product'); ?>" class="btn btn-neutral">Tambah</a>
         </div>
       <?php endif;?>
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
              <a class="nav-link active" id="price-tab" data-toggle="pill" href="#price" role="tab" aria-controls="price" aria-selected="false">Tercantum Harga
                <span class="badge badge-warning" id="info-process"> </span>
              </a>
            </li>
            <li class="nav-item" role="presentation">
              <a class="nav-link" id="noprice-tab" data-toggle="pill" href="#noprice" role="tab" aria-controls="noprice" aria-selected="false">Belum Tercantum Harga
                <span class="badge badge-warning" id="info-noprice"> </span>
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
                      <th scope="col">No</th>
                      <th scope="col">Nama Barang</th>
                      <th scope="col">SKU</th>
                      <th scope="col">Stok</th>
                      <th scope="col">Satuan</th>
                      <th scope="col">Harga Umum</th>
                      <th scope="col">Harga VIP</th>
                      <th scope="col">Harga VIP PLUS</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php $i = 1;
                    foreach ($all_products as $products) : ?>
                      <tr>
                        <th scope="col">
                          <?php echo $i; ?>
                        </th>
                        <td><?php echo anchor('admin/products/view/' . $products->id, $products->name); ?></td>
                        <td>
                           <?php echo $products->sku; ?>
                        </td>
                        <td>
                           <?php echo $products->stock; ?>
                        </td>
                        <td>
                           <?php echo $products->product_unit; ?>
                        </td>
                        <td>
                          Rp <?php echo format_rupiah($products->price); ?>
                        </td>
                        <td>
                          Rp <?php echo format_rupiah($products->price_2); ?>
                        </td>
                        <td>
                          Rp <?php echo format_rupiah($products->price_3); ?>
                        </td>
                      </tr>
                    <?php $i++;
                    endforeach; ?>
                  </tbody>
                </table>
              </div>
            </div>

            <div class="tab-pane fade show active" id="price" role="tabpanel" aria-labelledby="price-tab">
              <div class="table-responsive">
                <table class="table align-items-center table-flush">
                  <thead class="thead-light">
                    <tr>
                      <th scope="col">No</th>
                      <th scope="col">Nama Barang</th>
                      <th scope="col">Kategori</th>
                      <th scope="col">Stok</th>
                      <th scope="col">Satuan</th>
                      <th scope="col">Harga Umum</th>
                      <th scope="col">Harga VIP</th>
                      <th scope="col">Harga VIP PLUS</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php $i = 1;
                    foreach ($price as $products) : ?>
                      <tr>
                        <th scope="col">
                          <?php echo $i; ?>
                        </th>
                        <td><?php echo anchor('admin/products/view/' . $products->id, $products->name); ?></td>
                        <td>
                           <?php echo $products->sku; ?>
                        </td>
                        <td>
                           <?php echo $products->stock; ?>
                        </td>
                        <td>
                           <?php echo $products->product_unit; ?>
                        </td>
                        <td>
                          Rp <?php echo format_rupiah($products->price); ?>
                        </td>
                        <td>
                          Rp <?php echo format_rupiah($products->price_2); ?>
                        </td>
                        <td>
                          Rp <?php echo format_rupiah($products->price_3); ?>
                        </td>
                      </tr>
                    <?php $i++;
                    endforeach; ?>
                  </tbody>
                </table>
              </div>
            </div>

            <div class="tab-pane fade show" id="noprice" role="tabpanel" aria-labelledby="noprice-tab">
              <div class="table-responsive">
                <table class="table align-items-center table-flush">
                  <thead class="thead-light">
                    <tr>
                      <th scope="col">No</th>
                      <th scope="col">Nama Barang</th>
                      <th scope="col">Kategori</th>
                      <th scope="col">Stok</th>
                      <th scope="col">Satuan</th>
                      <th scope="col">Harga Umum</th>
                      <th scope="col">Harga VIP</th>
                      <th scope="col">Harga VIP PLUS</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php $i = 1;
                    foreach ($noprice as $products) : ?>
                      <tr>
                        <th scope="col">
                          <?php echo $i; ?>
                        </th>
                        <td><?php echo anchor('admin/products/view/' . $products->id, $products->name); ?></td>
                        <td>
                           <?php echo $products->sku; ?>
                        </td>
                        <td>
                           <?php echo $products->stock; ?>
                        </td>
                        <td>
                           <?php echo $products->product_unit; ?>
                        </td>
                        <td>
                          Rp <?php echo format_rupiah($products->price); ?>
                        </td>
                        <td>
                          Rp <?php echo format_rupiah($products->price_2); ?>
                        </td>
                        <td>
                          Rp <?php echo format_rupiah($products->price_3); ?>
                        </td>
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
