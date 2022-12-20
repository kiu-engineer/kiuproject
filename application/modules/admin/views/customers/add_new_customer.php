<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
    <!-- Header -->
    <div class="header bg-primary pb-6">
      <div class="container-fluid">
        <div class="header-body">
          <div class="row align-items-center py-4">
            <div class="col-lg-6 col-7">
              <h6 class="h2 text-white d-inline-block mb-0">Tambah Pelanggan</h6>
            </div>
            <div class="col-lg-6 col-5 text-right">
              <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                  <li class="breadcrumb-item"><a href="<?php echo site_url('admin'); ?>"><i class="fas fa-home"></i></a></li>
                  <li class="breadcrumb-item"><a href="<?php echo site_url('admin/customers'); ?>">Pelanggan</a></li>
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
      <?php echo form_open_multipart('admin/customers/add_customer'); ?>

      <div class="row">
        <div class="col-md-8">
          <div class="card-wrapper">
            <div class="card">
              <div class="card-header">
                <h3 class="mb-0">Data Pribadi</h3>
                <?php if ($flash) : ?>
                <span class="float-right text-success font-weight-bold" style="margin-top: -30px">
                  <?php echo $flash; ?>
                </span>
                <?php endif; ?>
              </div>

              <div class="card-body">
                <div class="row">
                  <div class="col-md-12">
                  </div>
                </div>

                <div class="form-group">
                  <label class="form-control-label" for="name">Nama</label>
                  <input type="text" name="name" value="<?php echo set_value('name'); ?>" class="form-control" id="name">
                  <?php echo form_error('name'); ?>
                </div>
                <div class="form-group">
                  <label class="form-control-label" for="nik">NIK</label>
                  <input type="text" name="nik" value="<?php echo set_value('nik'); ?>" class="form-control" id="nik">
                  <?php echo form_error('nik'); ?>
                </div>
                <div class="form-group">
                  <label class="form-control-label" for="npwp">NPWP</label>
                  <input type="text" name="npwp" value="<?php echo set_value('npwp'); ?>" class="form-control" id="npwp">
                  <?php echo form_error('npwp'); ?>
                </div>
                <div class="form-group">
                  <label class="form-control-label" for="address">Alamat</label>
                  <input type="text" name="address" value="<?php echo set_value('address'); ?>" class="form-control" id="address">
                  <?php echo form_error('address'); ?>
                </div>
                <div class="form-group">
                  <label class="form-control-label" for="no_telp">Telp</label>
                  <input type="text" name="no_telp" value="<?php echo set_value('no_telp'); ?>" class="form-control" id="no_telp">
                  <?php echo form_error('no_telp'); ?>
                </div>
                <div class="form-group">
                  <label class="form-control-label" for="email">Email</label>
                  <input type="email" name="email" value="<?php echo set_value('email'); ?>" class="form-control" id="email">
                  <?php echo form_error('email'); ?>
                </div>
                <div class="form-group">
                  <label class="form-control-label" for="password">Password</label>
                  <input type="text" name="password" value="<?php echo set_value('password'); ?>" class="form-control" id="password">
                  <?php echo form_error('password'); ?>
                </div>

              </div>

            </div>

          </div>

        </div>

        <div class="col-md-4">
            <div class="card">
                <div class="card-header">
                    <h3 class="mb-0">Data Tambahan</h3>
                </div>
                <div class="card-body">
                  <div class="form-group">
                    <label class="form-control-label" for="name">Nama Toko</label>
                    <input type="text" name="shop_name" value="<?php echo set_value('shop_name'); ?>" class="form-control" id="shop_name">
                    <?php echo form_error('shop_name'); ?>
                  </div>
                  <div class="form-group">
                    <label class="form-control-label" for="name">Alamat Toko</label>
                    <input type="text" name="shop_address" value="<?php echo set_value('shop_address'); ?>" class="form-control" id="shop_address">
                    <?php echo form_error('shop_address'); ?>
                  </div>
                  <div class="form-group">
                    <label class="form-control-label" for="salesman_id">Salesman:</label>
                    <select name="salesman_id" class="form-control" id="salesman_id">
                      <option value="">Pilih Salesman</option>
                      <?php if ( count($admin) > 0) : ?>
                        <?php foreach ($admin as $sales) : ?>
                          <option value="<?php echo $sales->id; ?>"<?php echo set_select('sales_id', $sales->id); ?>>› <?php echo $sales->name; ?></option>
                        <?php endforeach; ?>
                      <?php endif; ?>
                    </select>
                    <?php echo form_error('salesman_id'); ?>
                  </div>
                  <div class="form-group">
                    <label class="form-control-label" for="level">Level Pelanggan</label>
                    <select name="level" class="form-control" id="level">
                      <option value="">Pilih Level</option>
                      <option value="1">Basic</option>
                      <option value="2">VIP</option>
                      <option value="3">VIP Plus</option>
                    </select>
                    <?php echo form_error('level'); ?>
                  </div>
                  <div class="form-group">
                    <label class="form-control-label" for="name">Batas Kredit</label>
                    <input type="text" name="max_credit" value="<?php echo set_value('max_credit'); ?>" class="form-control" id="max_credit">
                    <?php echo form_error('max_credit'); ?>
                  </div>

                </div>
            </div>
            <div class="card">
            <!--    <div class="card-header">
                    <h3 class="mb-0">Foto</h3>
                </div>
                <div class="card-body">
                  <div class="form-group">
                    <label class="form-control-label" for="pic">Foto:</label>
                    <input type="file" name="picture" class="form-control" id="pic">
                    <small class="text-muted">Pilih foto PNG atau JPG dengan ukuran maksimal 2MB</small>
                  </div>
                </div> -->
                <div class="card-footer text-right">
                    <input type="submit" value="Tambah Pelanggan Baru" class="btn btn-primary">
                </div>
            </div>
        </div>

      </div>

    </form>
