<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
    <!-- Header -->
    <div class="header bg-primary pb-6">
      <div class="container-fluid">
        <div class="header-body">
          <div class="row align-items-center py-4">
            <div class="col-lg-6 col-7">
              <h6 class="h2 text-white d-inline-block mb-0">Tambah Banner Produk</h6>
            </div>
            <div class="col-lg-6 col-5 text-right">
              <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                  <li class="breadcrumb-item"><a href="<?php echo site_url('admin'); ?>"><i class="fas fa-home"></i></a></li>
                  <li class="breadcrumb-item"><a href="<?php echo site_url('admin/banner_product'); ?>">Banner Produk</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Tambah</li>
                </ol>
              </nav>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Page content -->
    <div class="container-fluid mt--6">
      <?php echo form_open_multipart('admin/banner_product/add_banner_product'); ?>

      <div class="row">
        <div class="col-md-12">
          <div class="card-wrapper">
            <div class="card">
              <div class="card-header">
                <h3 class="mb-0">Data Produk</h3>
                <?php if ($flash) : ?>
                <span class="float-right text-success font-weight-bold" style="margin-top: -30px">
                  <?php echo $flash; ?>
                </span>
                <?php endif; ?>
              </div>

              <div class="card-body">
                <div class="row">
                  <div class="col-md-12">
                    <div class="form-group">
                      <label class="form-control-label" for="pakcage">Produk:</label>
                      <select name="product_id" class="form-control" id="package">
                        <option>Pilih Produk</option>
                        <?php if ( count($products) > 0) : ?>
                          <?php foreach ($products as $product) : ?>
                            <option value="<?php echo $product->id; ?>"<?php echo set_select('product_id', $product->id); ?>>› <?php echo $product->name; ?></option>
                          <?php endforeach; ?>
                        <?php endif; ?>
                      </select>
                      <?php echo form_error('product_id'); ?>
                  </div>
                  </div>
                </div>
                
                <div class="form-group">
                  <label class="form-control-label" for="pic">Foto:</label>
                  <input type="file" name="picture" class="form-control" id="pic">
                  <small class="text-muted">Pilih foto PNG atau JPG dengan ukuran maksimal 2MB</small>
                </div>

                <div class="card-footer text-right">
                    <input type="submit" value="Tambah Produk Baru" class="btn btn-primary">
                </div>

              </div>

            </div>

          </div>

        </div>
      </div>

    </form>
