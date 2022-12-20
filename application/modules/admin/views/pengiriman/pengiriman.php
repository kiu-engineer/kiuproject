<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
    <!-- Header -->
    <div class="header bg-primary pb-6">
      <div class="container-fluid">
        <div class="header-body">
          <div class="row align-items-center py-4">
            <div class="col-lg-6 col-7">
              <h6 class="h2 text-white d-inline-block mb-0">Data Pengiriman</h6>
            </div>
            <!--
            <div class="col-lg-6 col-5 text-right">
              <a href="<?php echo site_url('admin/admin/add_new_admin'); ?>" class="btn btn-neutral">Tambah Users</a>
            </div>
          -->
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
              <h3 class="mb-0">Pengiriman</h3>
            </div>

            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table align-items-center table-flush" id="pengiriman" style="width: 100%">
                        <thead class="thead-light">
                            <tr>
                                <th scope="col">No. Surat Jalan</th>
                                <th scope="col">No. Kendaraan</th>
                                <th scope="col">Tanggal Pengiriman</th>
                        </thead>
                    </table>
                </div>
            </div>

          </div>
        </div>
      </div>

<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="modal-default" aria-hidden="true">
  <div class="modal-dialog modal-modal-dialog-centered modal-" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h6 class="modal-title" id="modal-title-default">Hapus ?</h6>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
            </button>
        </div>
        <form action="#" id="deleteUser" method="POST">

          <input type="hidden" name="id" value="" class="deleteID">

        <div class="modal-body">
            <p>Apakah anda yakin ? Semua data seperti data profil, order dan pembayaran juga akan dihapus.</p>
        </div>
        <div class="modal-footer">
            <button type="submit" class="btn btn-danger btn-delete">Hapus</button>
            <button type="button" class="btn btn-link  ml-auto" data-dismiss="modal">Batal</button>
        </div>
        </form>
    </div>
  </div>
</div>

<div class="modal fade" id="deactivateModal" tabindex="-1" role="dialog" aria-labelledby="modal-default" aria-hidden="true">
  <div class="modal-dialog modal-modal-dialog-centered modal-" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h6 class="modal-title" id="modal-title-default">Nonaktifkan ?</h6>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
            </button>
        </div>
        <form action="#" id="deactivateUser" method="POST">

          <input type="hidden" name="id" value="" class="deactivateID">

        <div class="modal-body">
            <p>Apakah anda yakin menonaktifkan akun ini?</p>
        </div>
        <div class="modal-footer">
            <button type="submit" class="btn btn-danger btn-deactivate">Nonaktifkan</button>
            <button type="button" class="btn btn-link  ml-auto" data-dismiss="modal">Batal</button>
        </div>
        </form>
    </div>
  </div>
</div>

<div class="modal fade" id="activateModal" tabindex="-1" role="dialog" aria-labelledby="modal-default" aria-hidden="true">
  <div class="modal-dialog modal-modal-dialog-centered modal-" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h6 class="modal-title" id="modal-title-default">Mengaktifkan user ?</h6>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
            </button>
        </div>
        <form action="#" id="activateUser" method="POST">

          <input type="hidden" name="id" value="" class="activateID">

        <div class="modal-body">
            <p>Apakah anda yakin menngaktifkan akun ini?</p>
        </div>
        <div class="modal-footer">
            <button type="submit" class="btn btn-danger btn-activate">Aktifkan</button>
            <button type="button" class="btn btn-link  ml-auto" data-dismiss="modal">Batal</button>
        </div>
        </form>
    </div>
  </div>
</div>

<link href="<?php echo get_theme_uri('vendor/datatables.net-bs4/css/dataTables.bootstrap4.min.css', 'argon'); ?>" rel="stylesheet">

<script src="<?php echo get_theme_uri('vendor/datatables.net/js/jquery.dataTables.min.js', 'argon'); ?>"></script>
<script src="<?php echo get_theme_uri('vendor/datatables.net-bs4/js/dataTables.bootstrap4.min.js', 'argon'); ?>"></script>
<script src="<?php echo base_url('assets/plugins/datatables.lang.js'); ?>"></script>

<script>
$(document).ready(function() {
    $(document).on('click', '.btnDelete', function() {
      var id  = $(this).data('id');
      var btn = $('.btn-delete');

      btn.html('Hapus');

      $('.deleteID').val(id);
      $('#deleteModal').modal('show');
    });

    $(document).on('click', '.btnDeactivate', function() {
      var id  = $(this).data('id');
      var btn = $('.btn-deactivate');

      btn.html('Nonaktifkan');

      $('.deactivateID').val(id);
      $('#deactivateModal').modal('show');
    });

    $(document).on('click', '.btnActivate', function() {
      var id  = $(this).data('id');
      var btn = $('.btn-activate');

      btn.html('Aktifkan');

      $('.activateID').val(id);
      $('#activateModal').modal('show');
    });

    $('#deleteUser').submit(function(e) {
      e.preventDefault();

      var id = $('.deleteID').val();
      var btn = $('.btn-delete');

      btn.html('<i class="fa fa-spin fa-spinner"></i> Menghapus...');

      $.ajax({
        method: 'POST',
        url: '<?php echo site_url('admin/admin/api/delete'); ?>',
        data: {
            id: id
        },
        success: function (res) {
          if (res.code == 204) {
            btn.html('<i class="fa fa-check"></i> Terhapus!');

            setTimeout(() => {
              $('#deleteModal').modal('hide');
              table.ajax.reload();
              btn.html('Hapus');
            }, 1500);
          }
        }
      })
    });

    $('#deactivateUser').submit(function(e) {
      e.preventDefault();

      var id = $('.deactivateID').val();
      var btn = $('.btn-deactivate');

      btn.html('<i class="fa fa-spin fa-spinner"></i> Menonaktifkan...');

      $.ajax({
        method: 'POST',
        url: '<?php echo site_url('admin/admin/api/deactivate'); ?>',
        data: {
            id: id
        },
        success: function (res) {
          if (res.code == 204) {
            btn.html('<i class="fa fa-check"></i> Berhasil menonaktifkan Pelanggan!');

            setTimeout(() => {
              $('#deactivateModal').modal('hide');
              table.ajax.reload();
              btn.html('Hapus');
            }, 1500);
          }
        }
      })
    });

    $('#activateUser').submit(function(e) {
      e.preventDefault();

      var id = $('.activateID').val();
      var btn = $('.btn-activate');

      btn.html('<i class="fa fa-spin fa-spinner"></i> Mengaktifkan...');

      $.ajax({
        method: 'POST',
        url: '<?php echo site_url('admin/admin/api/activate'); ?>',
        data: {
            id: id
        },
        success: function (res) {
          if (res.code == 204) {
            btn.html('<i class="fa fa-check"></i> Berhasil mengaktifkan Pelanggan!');

            setTimeout(() => {
              $('#activateModal').modal('hide');
              table.ajax.reload();
              btn.html('Hapus');
            }, 1500);
          }
        }
      })
    });

    var table = $('#pengiriman').DataTable({
      "ajax" : "<?php echo site_url('admin/pengiriman/api/suratjalan'); ?>",
      "columns" : [
        {"data": function (data, type, row) {
            var url = window.location.href.split('?')[0].replace('#', '');
            url = url + '/view/'+ data.ttb_number;

            return '<a href="'+ url +'">'+ data.ttb_number +'</a>';
        }
        },
        {"data": "deliver_by"},
        {"data": function (data, type, row) {
            return data.delivered_date;
          }
        },
      ],
      "language" : {
        "search" : "Cari:",
        "lengthMenu" : "Menampilkan _MENU_ data",
        "info" : "Menampilkan _START_ sampai _END_ data dari _TOTAL_ data",
        "infoEmpty" : "Tidak ada data yang ditampilkan",
        "infoFiltered" : "(dari total _MAX_ data)",
        "zeroRecords" : "Tidak ada hasil pencarian ditemukan",
        "paginate": {
          "first":"&laquo;",
          "last":"&raquo;",
          "next":       "&rsaquo;",
          "previous":   "&lsaquo;"
        },
      }
    });
});
</script>
