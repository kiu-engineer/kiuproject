<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
    <!-- Page content -->
    <div class="container-fluid mt--6">
      <div class="row">
        <div class="col">
          <div class="card">
            <!-- Card header -->
            <div class="card-header">
              <div class="row">
                <div class="col-6">
                  <h3 class="mb-0">Cari Produk</h3>
                </div>
                <div class="col-6">Menampilkan <?php echo $count; ?> hasil pencarian dengan kata kunci "<b><?php echo $query; ?></b>"</div>
              </div>
            </div>

            <?php if ( count($products) > 0) : ?>
            <div class="card-body">
                <div class="row">
                <?php foreach ($products as $product) : ?>
                    <div class="col-md-3">
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-heading"><?php echo $product->name; ?></h3>
                            </div>
                            <div class="card-body">
                                <div class="text-center">
                                    <img alt="<?php echo $product->name; ?>" class="img img-fluid rounded" src="<?php echo base_url('assets/uploads/products/'. $product->picture_name); ?>" style="width: 1000px; max-height: 800px">
                                    <br>
                                    <br>
                                    <?php echo ($product->stock > 0) ? $product->stock .' '. $product->product_unit: '<span class="text-danger"><em>Stok habis</em></span>'; ?> / Rp <?php echo format_rupiah($product->price); ?>
                                </div>

                            </div>
                            <div class="card-footer text-center">
                                <a href="<?php echo site_url('admin/products/view/'. $product->id); ?>" class="btn btn-info btn-sm"><i class="fa fa-eye"></i></a>
                                <a href="<?php echo site_url('admin/products/edit/'. $product->id); ?>" class="btn btn-success btn-sm"><i class="fa fa-edit"></i></a>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
                </div>
            </div>
            <div class="card-footer">
                <?php echo $pagination; ?>
            </div>
            <?php else : ?>
             <div class="card-body">
                <div class="row">
                    <div class="col-md-8">
                        <div class="alert alert-primary">
                            Belum ada data produk yang ditambahkan. Silahkan menambahkan baru.
                        </div>
                    </div>
                    <div class="col-md-4">
                        <a href="<?php echo site_url('admin/products/add_new_product'); ?>"><i class="fa fa-plus"></i> Tambah produk baru</a>
                        <br>
                        <a href="<?php echo site_url('admin/products/category'); ?>"><i class="fa fa-list"></i> Kelola kategori</a>
                    </div>
                </div>
            </div>
            <?php endif; ?>

          </div>
        </div>
      </div>
