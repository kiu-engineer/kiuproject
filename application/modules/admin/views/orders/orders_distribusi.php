<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
    <!-- Header -->
    <div class="header bg-primary pb-6">
      <div class="container-fluid">
        <div class="header-body">
          <div class="row align-items-center py-4">
            <div class="col-lg-6 col-7">
              <h6 class="h2 text-white d-inline-block mb-0">Kelola Order</h6>
            </div>
             <?php if(admin_role() == 'admin') : ?>
              <div class="col-lg-6 col-5 text-right">
            <!--    <a href="<?php echo site_url('admin/customers/add_new_customer'); ?>" class="btn btn-neutral">Tambah Pelanggan</a> -->
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
                <!--
                <li class="nav-item" role="presentation">
                  <a class="nav-link" id="all-tab" data-toggle="pill" href="#all" role="tab" aria-controls="all" aria-selected="true">Semua
                    <span class="badge badge-warning" id="info-all"> </span>
                  </a>
                </li>
              -->
                <li class="nav-item" role="presentation">
                  <a class="nav-link active" id="process-tab" data-toggle="pill" href="#process" role="tab" aria-controls="process" aria-selected="false">Pengemasan
                    <span class="badge badge-warning" id="info-process"> </span>
                  </a>
                </li>
                <li class="nav-item" role="presentation">
                  <a class="nav-link" id="deliver-tab" data-toggle="pill" href="#deliver" role="tab" aria-controls="deliver" aria-selected="false">Dalam Pengiriman
                    <span class="badge badge-warning" id="info-deliver"> </span>
                  </a>
                </li>
                <li class="nav-item" role="presentation">
                  <a class="nav-link" id="success-tab" data-toggle="pill" href="#success" role="tab" aria-controls="success" aria-selected="false">Selesai
                    <span class="badge badge-warning" id="info-success"> </span>
                  </a>
                </li>
                <li class="nav-item" role="presentation">
                  <a class="nav-link" id="cancel-tab" data-toggle="pill" href="#cancel" role="tab" aria-controls="cancel" aria-selected="false">Dibatalkan
                    <span class="badge badge-warning" id="info-cancel"> </span>
                  </a>
                </li>
              </ul>
            </div>

              <div class="card-body p-0">

                <div class="tab-content" id="pills-tabContent">
                  <!--
                  <div class="tab-pane fade " id="all" role="tabpanel" aria-labelledby="all-tab">
                    <div class="table-responsive">
                      <table class="table align-items-center table-flush" id="orderList1" style="width: 100%">
                          <thead class="thead-light">
                              <tr>
                                <th scope="col">NO</th>
                                <th scope="col">Order ID</th>
                                <th scope="col">Customer</th>
                                <th scope="col">Tanggal</th>
                                <th scope="col">Jumlah Item</th>
                                <th scope="col">Jumlah Harga</th>
                                <th scope="col">Metode Pembayaran</th>
                                <th scope="col">Status</th>
                              </tr>
                          </thead>
                      </table>
                    </div>
                  </div>
                -->

                  <div class="tab-pane fade show active" id="process" role="tabpanel" aria-labelledby="process-tab">
                    <div class="table-responsive">
                      <table class="table align-items-center table-flush" id="orderList2" style="width: 100%">
                          <thead class="thead-light">
                              <tr>
                                <th scope="col">NO</th>
                                <th scope="col">Order ID</th>
                                <th scope="col">Customer</th>
                                <th scope="col">Tanggal</th>
                                <th scope="col">Jumlah Item</th>
                                <th scope="col">Jumlah Harga</th>
                                <th scope="col">Metode Pembayaran</th>
                                <th scope="col">Status</th>
                              </tr>
                          </thead>
                      </table>
                    </div>
                  </div>

                  <div class="tab-pane fade" id="deliver" role="tabpanel" aria-labelledby="deliver-tab">
                    <div class="table-responsive">
                      <table class="table align-items-center table-flush" id="orderList3" style="width: 100%">
                          <thead class="thead-light">
                              <tr>
                                <th scope="col">NO</th>
                                <th scope="col">Order ID</th>
                                <th scope="col">Customer</th>
                                <th scope="col">Tanggal</th>
                                <th scope="col">Jumlah Item</th>
                                <th scope="col">Jumlah Harga</th>
                                <th scope="col">Metode Pembayaran</th>
                                <th scope="col">Status</th>
                              </tr>
                          </thead>
                      </table>
                    </div>
                  </div>

                  <div class="tab-pane fade" id="success" role="tabpanel" aria-labelledby="success-tab">
                    <div class="table-responsive">
                      <table class="table align-items-center table-flush" id="orderList4" style="width: 100%">
                          <thead class="thead-light">
                              <tr>
                                <th scope="col">NO</th>
                                <th scope="col">Order ID</th>
                                <th scope="col">Customer</th>
                                <th scope="col">Tanggal</th>
                                <th scope="col">Jumlah Item</th>
                                <th scope="col">Jumlah Harga</th>
                                <th scope="col">Metode Pembayaran</th>
                                <th scope="col">Status</th>
                              </tr>
                          </thead>
                      </table>
                    </div>
                  </div>

                  <div class="tab-pane fade" id="cancel" role="tabpanel" aria-labelledby="cancel-tab">
                    <div class="table-responsive">
                      <table class="table align-items-center table-flush" id="orderList5" style="width: 100%">
                          <thead class="thead-light">
                              <tr>
                                <th scope="col">NO</th>
                                <th scope="col">Order ID</th>
                                <th scope="col">Customer</th>
                                <th scope="col">Tanggal</th>
                                <th scope="col">Jumlah Item</th>
                                <th scope="col">Jumlah Harga</th>
                                <th scope="col">Metode Pembayaran</th>
                                <th scope="col">Status</th>
                              </tr>
                          </thead>
                      </table>
                    </div>
                  </div>

                </div>


            </div>

          </div>
        </div>
      </div>


      <!-- Modal -->
      <div class="modal fade" id="updateModal" tabindex="-1" role="dialog" aria-labelledby="updateModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="updateModalLabel">Update Pengiriman</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <form id="form_update" method="POST">
                <input type="hidden" class="ids" id="ids" name="ids">
                <div class="form-group">
                  <label for="ttb_number" class="col-form-label">No. Surat Jalan :</label>
                  <input type="text" class="form-control" id="ttb_number" name="ttb_number">
                </div>
                <div class="form-group">
                  <label for="tgl_pengiriman" class="col-form-label">Tanggal Pengiriman:</label>
                  <input type="date" class="form-control" id="tgl_pengiriman" name="tgl_pengiriman">
                </div>
                <div class="form-group">
                  <label for="no_truk" class="col-form-label">Nomor Truk:</label>
                  <input type="text" class="form-control" id="no_truk" name="no_truk">
                </div>
              </form>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              <button type="button" class="btn btn-primary" onclick="update_pengemasan()">Update</button>
            </div>
          </div>
        </div>
      </div>

<link href="<?php echo get_theme_uri('vendor/datatables.net-bs4/css/dataTables.bootstrap4.min.css', 'argon'); ?>" rel="stylesheet">

<script src="<?php echo get_theme_uri('vendor/datatables.net/js/jquery.dataTables.min.js', 'argon'); ?>"></script>
<script src="<?php echo get_theme_uri('vendor/datatables.net-bs4/js/dataTables.bootstrap4.min.js', 'argon'); ?>"></script>
<script src="<?php echo base_url('assets/plugins/datatables.lang.js'); ?>"></script>

<script>
var base_url = '<?=base_url();?>';
$(document).ready(function() {
  var ids = $('#ids');
    $('#orderList tfoot th').each(function () {
        var title = $(this).text();
        $(this).html('<input type="text" placeholder="Search ' + title + '" />');
    });

    var role = '<?=admin_role();?>';

    var table1 = $('#orderList1').DataTable({
      "ajax" : "<?php echo site_url('admin/orders/api/order_all_distribusi');?>",
      "columns" : [
        {
          "data": "id",
          render: function (data, type, row, meta) {
              return meta.row + meta.settings._iDisplayStart + 1;
          }
        },
        {"data": function (data, type, row) {
            var url = base_url + 'admin/orders/view/' + data.id ;

            return '<a href="'+ url +'"> #'+ data.order_number +'</a>';
        }
        },
        {"data": "customer"},
        {"data": "order_date"},
        {"data": "total_items"},
        {"data": "final_price"},
        {"data": "payment_method"},
        {"data": "order_status"},
      ],initComplete: function () {
            // Apply the search
            this.api()
                .columns()
                .every(function () {
                    var that = this;

                    $('input.search1', this.footer()).on('keyup change clear', function () {
                        if (that.search() !== this.value) {
                            that.search(this.value).draw();
                        }
                    });
                });
            $('#info-all').text( this.api().data().length );
        },
      "dom": '<"float-left mb-2"B><"float-right search1"f>rt<"row"<"col-sm-4"l><"col-sm-4"i><"col-sm-4"p>>',
      "language" : {
        "search" : "Cari:",
        "lengthMenu" : "_MENU_",
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

    var table2 = $('#orderList2').DataTable({
      "ajax" : "<?php echo site_url('admin/orders/api/order_packing');?>",
      "columns" : [

        {
          "data": "id",
          render: function (data, type, row, meta) {
              return meta.row + meta.settings._iDisplayStart + 1;
          }
        },
        {"data": function (data, type, row) {
            var url = base_url + 'admin/orders/view/' + data.id ;

            return '<a href="'+ url +'"> #'+ data.order_number +'</a>';
        }
        },
        {"data": "customer"},
        {"data": "order_date"},
        {"data": "total_items"},
        {"data": "final_price"},
        {"data": "payment_method"},
        {"data": "order_status"},
      ],initComplete: function () {
            // Apply the search
            this.api()
                .columns()
                .every(function () {
                    var that = this;
                    var that = this;

                    $('input.search1', this.footer()).on('keyup change clear', function () {
                        if (that.search() !== this.value) {
                            that.search(this.value).draw();
                        }
                    });
                });
            $('#info-process').text( this.api().data().length );
        },
      "dom": '<"float-left mb-2"B><"float-right search1"f>rt<"row"<"col-sm-4"l><"col-sm-4"i><"col-sm-4"p>>',
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
      },
      select: true,
      buttons: [
          {
              text: 'Pilih Semua',
              className: 'btn btn-primary',
              action: function () {
                  table2.rows().select();
                  $('.btn-update').removeClass('d-none');
              }
          },
          {
              text: 'Clear',
              className: 'btn btn-primary',
              action: function () {
                  table2.rows().deselect();
                  $('#ids').val('');
                  $('.btn-update').addClass('d-none');
              }
          },
          {
              text: 'Update',
              className: 'btn btn-primary btn-update d-none',
              action: function () {
                var ids = $.map(table2.rows('.selected').data(), function (item) { return item['id'] });
                console.log(Array.from(ids));
                $('#ids').val(ids);
                $('#updateModal').modal();
              }
          }
      ]
    })
    .on( 'select', function ( e, dt, type, indexes ) {
        console.log('Table row selected');
        $('.btn-update').removeClass('d-none');

    })
    .on( 'deselect', function ( e, dt, type, indexes ) {
        console.log('Table row selected');
        $('.btn-update').addClass('d-none');

    });

    var table3 = $('#orderList3').DataTable({
      "ajax" : "<?php echo site_url('admin/orders/api/order_deliver');?>",
      "columns" : [

        {
          "data": "id",
          render: function (data, type, row, meta) {
              return meta.row + meta.settings._iDisplayStart + 1;
          }
        },
        {"data": function (data, type, row) {
            var url = base_url + 'admin/orders/view/' + data.id ;

            return '<a href="'+ url +'"> #'+ data.order_number +'</a>';
        }
        },
        {"data": "customer"},
        {"data": "order_date"},
        {"data": "total_items"},
        {"data": "final_price"},
        {"data": "payment_method"},
        {"data": "order_status"},
      ],initComplete: function () {
            // Apply the search
            this.api()
                .columns()
                .every(function () {
                    var that = this;
                    var that = this;

                    $('input.search1', this.footer()).on('keyup change clear', function () {
                        if (that.search() !== this.value) {
                            that.search(this.value).draw();
                        }
                    });
                });
            $('#info-deliver').text( this.api().data().length );
        },
      "dom": '<"float-left mb-2"B><"float-right search1"f>rt<"row"<"col-sm-4"l><"col-sm-4"i><"col-sm-4"p>>',
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

    var table4 = $('#orderList4').DataTable({
      "ajax" : "<?php echo site_url('admin/orders/api/order_success');?>",
      "columns" : [

        {
          "data": "id",
          render: function (data, type, row, meta) {
              return meta.row + meta.settings._iDisplayStart + 1;
          }
        },
        {"data": function (data, type, row) {
            var url = base_url + 'admin/orders/view/' + data.id ;

            return '<a href="'+ url +'"> #'+ data.order_number +'</a>';
        }
        },
        {"data": "customer"},
        {"data": "order_date"},
        {"data": "total_items"},
        {"data": "final_price"},
        {"data": "payment_method"},
        {"data": "order_status"},
      ],initComplete: function () {
            // Apply the search
            this.api()
                .columns()
                .every(function () {
                    var that = this;
                    var that = this;

                    $('input.search1', this.footer()).on('keyup change clear', function () {
                        if (that.search() !== this.value) {
                            that.search(this.value).draw();
                        }
                    });
                });
            $('#info-success').text( this.api().data().length );
        },
      "dom": '<"float-left mb-2"B><"float-right search1"f>rt<"row"<"col-sm-4"l><"col-sm-4"i><"col-sm-4"p>>',
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

    var table5 = $('#orderList5').DataTable({
      "ajax" : "<?php echo site_url('admin/orders/api/order_cancel');?>",
      "columns" : [

        {
          "data": "id",
          render: function (data, type, row, meta) {
              return meta.row + meta.settings._iDisplayStart + 1;
          }
        },
        {"data": function (data, type, row) {
            var url = base_url + 'admin/orders/view/' + data.id ;

            return '<a href="'+ url +'"> #'+ data.order_number +'</a>';
        }
        },
        {"data": "customer"},
        {"data": "order_date"},
        {"data": "total_items"},
        {"data": "final_price"},
        {"data": "payment_method"},
        {"data": "order_status"},
      ],initComplete: function () {
            // Apply the search
            this.api()
                .columns()
                .every(function () {
                    var that = this;
                    var that = this;

                    $('input.search1', this.footer()).on('keyup change clear', function () {
                        if (that.search() !== this.value) {
                            that.search(this.value).draw();
                        }
                    });
                });
            $('#info-cancel').text( this.api().data().length );
        },
      "dom": '<"float-left mb-2"B><"float-right search1"f>rt<"row"<"col-sm-4"l><"col-sm-4"i><"col-sm-4"p>>',
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


function update_pengemasan() {
      $.ajax({
          url: base_url + 'admin/orders/api/update_pengemasan',
          type: 'POST',
          dataType: 'json',
          data:  $('#form_update').serialize(),
          success: function(data) {
            console.log('sukses');
            $('#updateModal').modal('hide');
            $('#orderList1').DataTable().ajax.reload();
            $('#orderList2').DataTable().ajax.reload();
            $('#orderList3').DataTable().ajax.reload();

          },
          error: function(data) {
            console.log(data + ' errrrr');
          },
        });
    }
</script>
