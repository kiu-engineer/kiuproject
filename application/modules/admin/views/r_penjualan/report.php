<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
<!-- Header -->
<div class="header bg-primary pb-6">
    <div class="container-fluid">
        <div class="header-body">
            <div class="row align-items-center py-4">
                <div class="col-lg-6 col-7">
                    <h6 class="h2 text-white d-inline-block mb-0">Kelola Order Customer</h6>
                </div>
                <div class="col-lg-6 col-5 text-right">
                    <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                        <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                            <li class="breadcrumb-item"><a href="#"><i class="fas fa-home"></i></a></li>
                            <li class="breadcrumb-item active" aria-current="page">Order</li>
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
                    <h3 class="mb-0">Kelola Order</h3>
                </div>
                <div class="row">
                    <div class="col-sm-5">
                        <div class="form-horizontal">
                            <div class="form-group">
                                <label class="col-sm-4 control-label">Dari Tanggal</label>
                                <div class="col-sm-8">
                                    <input type='date' name='from' class='form-control' id='tanggal_dari' value="<?php echo date('Y-m-d'); ?>">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-5">
                        <div class="form-horizontal">
                            <div class="form-group">
                                <label class="col-sm-4 control-label">Sampai Tanggal</label>
                                <div class="col-sm-8">
                                    <input type='date' name='to' class='form-control' id='tanggal_sampai' value="<?php echo date('Y-m-d'); ?>">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class='row'>
                    <div class="col-sm-5">
                        <div class="form-horizontal">
                            <div class="form-group">
                                <div class="col-sm-4"></div>
                                <div class="col-sm-8">
                                    <button type="submit" class="btn btn-primary" style='margin-left: 0px;'>Tampilkan</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <br />
                <div id='result'></div>

            </div>
        </div>
    </div>

    <script>
        $(document).ready(function() {
            $('#FormLaporan').submit(function(e) {
                e.preventDefault();

                var TanggalDari = $('#tanggal_dari').val();
                var TanggalSampai = $('#tanggal_sampai').val();

                if (TanggalDari == '' || TanggalSampai == '') {
                    $('.modal-dialog').removeClass('modal-lg');
                    $('.modal-dialog').addClass('modal-sm');
                    $('#ModalHeader').html('Oops !');
                    $('#ModalContent').html("Tanggal harus diisi !");
                    $('#ModalFooter').html("<button type='button' class='btn btn-primary' data-dismiss='modal' autofocus>Ok, Saya Mengerti</button>");
                    $('#ModalGue').modal('show');
                } else {
                    var URL = "<?php echo site_url('r_penjualan/index'); ?>/" + TanggalDari + "/" + TanggalSampai;
                    $('#result').load(URL);
                }
            });
        });
    </script>