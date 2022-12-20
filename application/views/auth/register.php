<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags-->
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="Colorlib Templates">
  <meta name="author" content="Colorlib">
  <meta name="keywords" content="Colorlib Templates">

  <!-- Title Page-->
  <title>KIU Store | Register </title>

  <link rel="preconnect" href="https://fonts.gstatic.com">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&amp;display=swap">
  <!-- Favicon-->
  <link rel="icon" href="<?php echo get_login_theme('img/icons/icon-72x72.png') ?>">
  <!-- Apple Touch Icon-->
  <link rel="apple-touch-icon" href="<?php echo get_login_theme('img/icons/icon-96x96.png') ?>">
  <link rel="apple-touch-icon" sizes="152x152" href="<?php echo get_login_theme('img/icons/icon-152x152.png') ?>">
  <link rel="apple-touch-icon" sizes="167x167" href="<?php echo get_login_theme('img/icons/icon-167x167.png') ?>">
  <link rel="apple-touch-icon" sizes="180x180" href="<?php echo get_login_theme('img/icons/icon-180x180.png') ?>">
  <!-- CSS Libraries-->
  <link rel="stylesheet" href="<?php echo get_login_theme('css/bootstrap.min.css') ?>">
  <link rel="stylesheet" href="<?php echo get_login_theme('css/animate.css') ?>">
  <link rel="stylesheet" href="<?php echo get_login_theme('css/owl.carousel.min.css') ?>">
  <link rel="stylesheet" href="<?php echo get_login_theme('css/font-awesome.min.css') ?>">
  <link rel="stylesheet" href="<?php echo get_login_theme('css/default/lineicons.min.css') ?>">
  <!-- Stylesheet-->
  <link rel="stylesheet" href="<?php echo get_login_theme('style.css') ?>">
  <!-- Web App Manifest-->
  <link rel="manifest" href="<?php echo get_login_theme('manifest.json') ?>">

  <style>
    .input--style-2:hover {
      border-bottom: 1px solid #FA4251;
      color: #4DAE3C
    }
  </style>
</head>

<body>
  <!-- Preloader-->
  <div class="preloader" id="preloader">
    <div class="spinner-grow text-secondary" role="status">
      <div class="sr-only">Loading...</div>
    </div>
  </div>
  <!-- Login Wrapper Area-->
  <div class="login-wrapper d-flex align-items-center justify-content-center text-center">
    <!-- Background Shape-->
    <div class="background-shape"></div>
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-12 col-sm-9 col-md-7 col-lg-6 col-xl-5">
          <img class="big-logo" src="img/core-img/logo-white.png" alt="">
          <h3 class="text-white">Registrasi</h3>
          <!-- Register Form-->
          <div class="register-form mt-5 px-4">
            <?php echo form_open('auth/register/verify'); ?>
            <div class="form-group text-start mb-4"><span>Nama</span>
              <label for="nama"><i class="lni lni-user"></i></label>
              <input class="form-control" id="nama" name="nama" type="text" placeholder="Nama Anda">
              <?php echo form_error('nama'); ?>
            </div>
            <!--    <div class="form-group text-start mb-4"><span>NIK</span>
                  <label for="nik"><i class="lni lni-envelope"></i></label>
                  <input class="form-control" id="nik" name="nik" type="text" placeholder="">
                  <?php echo form_error('nik'); ?>
                </div>
                <div class="form-group text-start mb-4"><span>NPWP</span>
                  <label for="npwp"><i class="lni lni-envelope"></i></label>
                  <input class="form-control" id="npwp" name="npwp" type="text" placeholder="">
                  <?php echo form_error('npwp'); ?>
                </div> -->
            <div class="form-group text-start mb-4"><span>Alamat</span>
              <label for="alamat"><i class="lni lni-map"></i></label>
              <input class="form-control" id="alamat" name="alamat" type="text" placeholder="">
              <?php echo form_error('alamat'); ?>
            </div>
            <div class="form-group text-start mb-4"><span>Email</span>
              <label for="email"><i class="lni lni-envelope"></i></label>
              <input class="form-control" id="email" name="email" type="email" placeholder="" autocomplete="off">
              <?php echo form_error('email'); ?>
            </div>
            <!--    <div class="form-group text-start mb-4"><span>Nama Toko</span>
                  <label for="nama_toko"><i class="lni lni-envelope"></i></label>
                  <input class="form-control" id="nama_toko" name="nama_toko" type="text" placeholder="">
                  <?php echo form_error('nama_toko'); ?>
                </div> -->
            <div class="form-group text-start mb-4"><span>No Telp</span>
              <label for="no_telp"><i class="lni lni-phone"></i></label>
              <input class="form-control" id="no_telp" name="no_telp" type="text" placeholder="">
              <?php echo form_error('no_telp'); ?>
            </div>
            <div class="form-group text-start mb-4"><span>Password</span>
              <label for="password"><i class="lni lni-lock"></i></label>
              <input class="form-control" id="password" name="password" type="password" placeholder="Password" autocomplete="off">
              <?php echo form_error('password'); ?>
            </div>
            <button class="btn btn-warning btn-lg w-100" type="submit">Registrasi</button>
            </form>
          </div>
          <!-- Login Meta-->
          <div class="login-meta-data">
            <p class="mt-3 mb-0">Sudah punya akun?<a class="ms-1" href="<?= base_url('login') ?>">Masuk</a></p>
          </div>

          <div class="view-as-guest mt-3">
            <a class="btn" href="<?= base_url() ?>">Kembali ke Halaman Utama</a>
          </div>

        </div>
      </div>
    </div>
  </div>

</body><!-- This templates was made by Colorlib (https://colorlib.com) -->

<!-- All JavaScript Files-->
<script src="<?php echo get_login_theme('js/bootstrap.bundle.min.js') ?>"></script>
<script src="<?php echo get_login_theme('js/jquery.min.js') ?>"></script>
<script src="<?php echo get_login_theme('js/waypoints.min.js') ?>"></script>
<script src="<?php echo get_login_theme('js/jquery.easing.min.js') ?>"></script>
<script src="<?php echo get_login_theme('js/owl.carousel.min.js') ?>"></script>
<script src="<?php echo get_login_theme('js/jquery.counterup.min.js') ?>"></script>
<script src="<?php echo get_login_theme('js/jquery.countdown.min.js') ?>"></script>
<script src="<?php echo get_login_theme('js/default/jquery.passwordstrength.js') ?>"></script>
<script src="<?php echo get_login_theme('js/default/dark-mode-switch.js') ?>"></script>
<script src="<?php echo get_login_theme('js/default/active.js') ?>"></script>
<script src="<?php echo get_login_theme('js/pwa.js') ?>"></script>

</html>
<!-- end document-->