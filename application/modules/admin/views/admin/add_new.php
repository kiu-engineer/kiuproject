<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
    <!-- Header -->
    <div class="header bg-primary pb-6">
      <div class="container-fluid">
        <div class="header-body">
          <div class="row align-items-center py-4">
            <div class="col-lg-6 col-7">
              <h6 class="h2 text-white d-inline-block mb-0">Tambah Data</h6>
            </div>
            <div class="col-lg-6 col-5 text-right">
              <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                  <li class="breadcrumb-item"><a href="<?php echo site_url('admin'); ?>"><i class="fas fa-home"></i></a></li>
                  <li class="breadcrumb-item"><a href="<?php echo site_url('admin/admin'); ?>">Admin & Sales</a></li>
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
      <?php echo form_open_multipart('admin/admin/add_admin'); ?>

      <div class="row">
        <div class="col-md-8">
          <div class="card-wrapper">
            <div class="card">
              <div class="card-header">
                <h3 class="mb-0">Data User</h3>
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
                  <label class="form-control-label" for="email">Email</label>
                  <input type="email" name="email" value="<?php echo set_value('email'); ?>" class="form-control" id="email">
                  <?php echo form_error('email'); ?>
                </div>
                <div class="form-group">
                  <label class="form-control-label" for="password">Password</label>
                  <input type="text" name="password" value="<?php echo set_value('password'); ?>" autocomplete="off" class="form-control" id="password">
                  <?php echo form_error('password'); ?>
                </div>
                <div class="form-group">
                  <label class="form-control-label" for="level">Status</label>
                  <select name="status" class="form-control" id="status">
                    <option value="">Pilih Status</option>
                    <option value="1">Aktif</option>
                    <option value="2">Non-Aktif</option>
                  </select>
                  <?php echo form_error('status'); ?>
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
                    <label class="form-control-label" for="role">Level Login</label>
                    <select name="role" class="form-control" id="role">
                      <option value="">Pilih Level</option>
                      <option value="admin">Admin</option>
                      <option value="adminonline">Admin Online</option>
                      <option value="keuangan">Keuangan</option>
                      <option value="kadep">Kadep</option>
                      <option value="salesman">Salesman</option>
                      <option value="distribusi">Distribusi</option>
                    </select>
                    <?php echo form_error('role'); ?>
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
                    <input type="submit" value="Tambah User Baru" class="btn btn-primary">
                </div>
            </div>
        </div>

      </div>

    </form>
