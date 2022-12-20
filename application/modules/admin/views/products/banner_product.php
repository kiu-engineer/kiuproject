<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
    <!-- Header -->
    <div class="header bg-primary pb-6">
      <div class="container-fluid">
        <div class="header-body">
          <div class="row align-items-center py-4">
            <div class="col-lg-6 col-7">
              <h6 class="h2 text-white d-inline-block mb-0">Kelola Banner Produk</h6>
            </div>
            <div class="col-lg-6 col-5 text-right">
              <a href="<?php echo site_url('admin/banner_product/add_new_banner_product'); ?>" class="btn btn-neutral">Tambah</a>
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
              <h3 class="mb-0">Kelola Banner Produk</h3>
            </div>

            <?php if ( count($banners) > 0) : ?>
            <div class="card-body">
                <div class="row">
                <?php foreach ($banners as $banner) : ?>
                    <div class="col-md-3">
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-heading"><?php echo $banner->name; ?></h3>
                            </div>
                            <div class="card-body">
                                <div class="text-center">
                                    <img alt="<?php echo $banner->name; ?>" class="img img-fluid rounded" src="<?php echo base_url('assets/uploads/banner_product/'. $banner->banner_image); ?>" style="width: 1000px; max-height: 800px">
                                    
                                </div>
                                
                            </div>
                            <div class="card-footer text-center">
                                <a href="<?php echo site_url('admin/banner_product/delete/'. $banner->banner_id); ?>" class="btn btn-danger btn-sm" onclick="return confirm('Apakah anda yakin akan menghapus banner produk ini?');"><i class="fa fa-trash"></i></a>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
                </div>
            </div>
            <?php else : ?>
             <div class="card-body">
                <div class="row">
                    <div class="col-md-8">
                        <div class="alert alert-primary">
                            Belum ada data banner produk yang ditambahkan. Silahkan menambahkan baru.
                        </div>
                    </div>
                </div>
            </div>
            <?php endif; ?>
            
          </div>
        </div>
      </div>