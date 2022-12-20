<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
    <!-- Header -->
    <div class="header bg-primary pb-6">
      <div class="container-fluid">
        <div class="header-body">
          <div class="row align-items-center py-4">
            <div class="col-lg-6 col-7">
              <h6 class="h2 text-white d-inline-block mb-0">Edit Sales</h6>
            </div>
            <div class="col-lg-6 col-5 text-right">
              <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                  <li class="breadcrumb-item"><a href="<?php echo site_url('admin'); ?>"><i class="fas fa-home"></i></a></li>
                  <li class="breadcrumb-item"><a href="<?php echo site_url('admin/admin'); ?>">Admin & Sales</a></li>
                  <li class="breadcrumb-item"><a href="<?php echo site_url('admin/admin/view/'. $users->id); ?>"><?php echo $users->name; ?></a></li>
                  <li class="breadcrumb-item active" aria-current="page">Edit</li>
                </ol>
              </nav>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Page content -->
    <div class="container-fluid mt--6">
      <?php echo form_open_multipart('admin/users/edit_product'); ?>
      <input type="hidden" name="id" value="<?php echo $users->id; ?>">

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

                <div class="form-group">
                  <label class="form-control-label" for="name">Nama user:</label>
                  <input type="text" name="name" value="<?php echo set_value('name', $users->name); ?>" class="form-control" id="name">
                  <?php echo form_error('name'); ?>
                </div>

                <div class="form-group">
                  <label class="form-control-label" for="name">Email:</label>
                  <input type="text" name="email" value="<?php echo set_value('email', $users->email); ?>" class="form-control" id="email">
                  <?php echo form_error('name'); ?>
                </div>

                <div class="form-group">
              		<label class="col-sm-3 control-label">Status</label>
              		<div class="col-sm-8">
              			<select name='status' class='form-control'>
              				<option value="1" <?=$users->status == '1' ? 'selected': '' ?> >Aktif</option>
              				<option value="0" <?=$users->status == '0' ? 'selected': '' ?> >Non-aktif</option>
              			</select>
              		</div>
              	</div>

              </div>

            </div>

          </div>

        </div>
    <!--    <div class="col-md-4">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-4">
                            <h3 class="mb-0">Foto</h3>
                        </div>
                        <?php if ($users->picture_name) : ?>
                        <div class="col-8">
                            <ul class="nav nav-pills mb-3 float-right" id="pills-tab" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link p-1 active" id="pills-current-tab" data-toggle="pill" href="#pills-current" role="tab" aria-controls="pills-home" aria-selected="true">Current</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link p-1" id="pills-edit-tab" data-toggle="pill" href="#pills-edit" role="tab" aria-controls="pills-profile" aria-selected="false">Ganti</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link p-1" id="pills-delete-tab" data-toggle="pill" href="#pills-delete" role="tab" aria-controls="pills-contact" aria-selected="false">Hapus</a>
                                </li>
                            </ul>
                        </div>
                        <?php endif; ?>
                    </div>
                </div>

            <!--    <div class="card-body">
                    <?php if ($users->picture_name != NULL) : ?>
                    <div class="tab-content" id="pills-tabContent">
                        <div class="tab-pane fade show active" id="pills-current" role="tabpanel" aria-labelledby="pills-home-tab">
                            <div class="text-center">
                                <img alt="<?php echo $users->name; ?>" src="<?php echo base_url('assets/uploads/users/'. $users->picture_name); ?>" class="img img-fluid rounded">
                            </div>
                        </div>
                        <div class="tab-pane fade" id="pills-edit" role="tabpanel" aria-labelledby="pills-profile-tab">
                            <div class="form-group">
                                <label class="form-control-label" for="pic">Foto:</label>
                                <input type="file" name="picture" class="form-control" id="pic">
                                <small class="text-muted">Pilih foto PNG atau JPG dengan ukuran maksimal 2MB</small>
                                <small class="newUploadText">Unggah file baru untuk mengganti foto saat ini.</small>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="pills-delete" role="tabpanel" aria-labelledby="pills-contact-tab">
                            <p class="deleteText">Klik link dibawah untuk menghapus foto. Tindakan ini tidak dapat dibatalkan.</p>
                            <div class="text-right">
                                <a href="#" class="deletePictureBtn btn btn-danger">Hapus</a>
                            </div>
                        </div>
                    </div>
                    <?php else : ?>
                    <div class="form-group">
                        <label class="form-control-label" for="pic">Foto:</label>
                        <input type="file" name="picture" class="form-control" id="pic">
                        <small class="text-muted">Pilih foto PNG atau JPG dengan ukuran maksimal 2MB</small>
                    </div>
                    <?php endif; ?>
                </div>
                <div class="card-footer text-right">
                    <input type="submit" value="Simpan" class="btn btn-primary">
                </div>
            </div>
        </div>
      </div>
</div> -->
    </form>

    <script>
        $('.deletePictureBtn').click(function(e) {
            e.preventDefault();

            $(this).html('<i class="fa fa-spin fa-spinner"></i> Menghapus...');

            $.ajax({
                method: 'POST',
                url: '<?php echo site_url('admin/users/users_api?action=delete_image'); ?>',
                data: {
                    id: <?php echo $users->id; ?>
                },
                context: this,
                success: function(res) {
                    if (res.code == 204) {
                        $('.deleteText').text('Gambar berhasil dihapus. Produk ini akan menggunakan gambar default jika tidak ada gambar baru yang diunggah');
                        $(this).html('<i class="fa fa-check"></i> Terhapus!');

                        setTimeout(function() {
                            $('.newUploadText').text('Pilih gambar baru untuk mengganti gambar yang dihapus');
                            $('#pills-delete, #pills-delete-tab, #pills-current, #pills-current-tab').hide('fade');
                            $('#pills-edit').tab('show');
                            $('#pills-edit-tab').addClass('active').text('Upload baru');
                        }, 3000);
                    }
                    else {
                        console.log('Terdapat kesalahan');
                    }
                }
            })
        });
    </script>
