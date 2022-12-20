<!DOCTYPE html>
<!-- Html Start -->
<html lang="en">
  <!-- Head Start -->
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="description" content="Fastkart" />
    <meta name="keywords" content="Fastkart" />
    <meta name="author" content="Fastkart" />
    <link rel="manifest" href="manifest.json" />
    <title>Fastkart PWA App</title>
    <link rel="icon" href="<?php echo site_url('assets/themes/fastkart/images/favicon.png" type="image/x-icon');?>" />
    <link rel="apple-touch-icon" href="<?php echo site_url('assets/themes/fastkart/images/favicon.png');?>" />
    <meta name="theme-color" content="#0baf9a" />
    <meta name="apple-mobile-web-app-capable" content="yes" />
    <meta name="apple-mobile-web-app-status-bar-style" content="black" />
    <meta name="apple-mobile-web-app-title" content="Fastkart" />
    <meta name="msapplication-TileImage" content="<?php echo site_url('assets/themes/fastkart/images/favicon.png');?>" />
    <meta name="msapplication-TileColor" content="#FFFFFF" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />

    <!-- Bootstrap 5 -->
    <link rel="stylesheet" id="rtl-link" type="text/css" href="<?php echo site_url('assets/themes/fastkart/css/vendors/bootstrap.css');?>" />

    <!-- Iconly Icon css -->
    <link rel="stylesheet" type="text/css" href="<?php echo site_url('assets/themes/fastkart/css/iconly.css');?>" />

    <!-- Style css -->
    <link rel="stylesheet" id="change-link" type="text/css" href="<?php echo site_url('assets/themes/fastkart/css/style.css');?>" />
  </head>
  <!-- Head End -->

  <!-- Body Start -->
  <body>
    <!-- Skeleton loader Start -->
    <div class="skeleton-loader">
      <!-- Header Start -->
    <!--  <header class="header">
        <div class="logo-wrap">
          <i class="iconly-Category icli nav-bar"></i>
          <a href="index.html"> <img class="logo logo-w" src="<?php echo site_url('assets/themes/fastkart/images/logo/logo-w.png');?>" alt="logo" /></a
          ><a href="index.html"> <img class="logo" src="<?php echo site_url('assets/themes/fastkart/images/logo/logo.png');?>" alt="logo" /></a>
        </div>
        <div class="avatar-wrap">
          <span class="font-sm"><i class="iconly-Location icli font-xl"></i> Los Angeles</span>
          <a href="account.html"> <img class="avatar" src="<?php echo site_url('assets/themes/fastkart/images/avatar/avatar.jpg');?>" alt="avatar" /></a>
        </div>
      </header> -->
      <!-- Header End -->

      <!-- Main Start -->
      <div class="main-wrap error-404 mb-xxl">
        <!-- Banner Start -->
        <div class="banner-box">
          <img src="<?php echo site_url('assets/themes/fastkart/images/banner/done.gif');?>" class="img-fluid" />
        </div>
        <!-- Banner End -->

        <!-- Error Section Start -->
        <section class="error mb-large">
          <h2 class="font-lg">Pendaftaran berhasil !</h2>
          <p class="content-color font-md">Silahkan tunggu konfirmasi dari admin, data akan di approve terlebih dahulu. Terima kasih...</p>
          <a href="<?=site_url();?>" class="btn-solid">Kembali ke Halaman Login</a>
        </section>
        <!-- Error Section End -->
      </div>
      <!-- Main End -->
    </div>
    <!-- Skeleton loader End -->

    <!-- Header Start -->
    <header class="header">
      <div class="logo-wrap mx-auto">
        <a href="#"> <img class="logo logo-w" src="<?php echo site_url('assets/themes/fastkart/images/logo/logo-w.png');?>" alt="logo" /></a><a href="#"> <img class="logo" src="<?php echo site_url('assets/themes/fastkart/images/logo/logo.png');?>" alt="logo" /></a>
      </div>
    </header>
    <!-- Header End -->


    <!-- Main Start -->
    <main class="main-wrap error-404 mb-xxl">
      <!-- Banner Start -->
      <div class="banner-box">
        <img src="<?php echo site_url('assets/themes/fastkart/images/banner/done.gif');?>" class="img-fluid" />
      </div>
      <!-- Banner End -->

      <!-- Error Section Start -->
      <section class="error mb-large">
        <h2 class="font-lg">Pendaftaran berhasil !</h2>
        <p class="content-color font-md">Silahkan tunggu konfirmasi dari admin, data akan di approve terlebih dahulu. Terima kasih...</p>
        <a href="https://os.youngpreneur.co.id" class="btn-solid">Kembali ke Halaman Login</a>
      </section>
      <!-- Error Section End -->
    </main>
    <!-- Main End -->


    <!-- Action Language Start -->
    <div class="action action-language offcanvas offcanvas-bottom" tabindex="-1" id="language" aria-labelledby="language">
      <div class="offcanvas-body small">
        <h2 class="m-b-title1 font-md">Select Language</h2>
        <ul class="list">
          <li>
            <a href="javascript:void(0)" data-bs-dismiss="offcanvas" aria-label="Close"> <img src="<?php echo site_url('assets/themes/fastkart/icons/flag/us.svg');?>" alt="us" /> English </a>
          </li>
          <li>
            <a href="javascript:void(0)" data-bs-dismiss="offcanvas" aria-label="Close"> <img src="<?php echo site_url('assets/themes/fastkart/icons/flag/in.svg');?>" alt="us" />Indian </a>
          </li>
          <li>
            <a href="javascript:void(0)" data-bs-dismiss="offcanvas" aria-label="Close"> <img src="<?php echo site_url('assets/themes/fastkart/icons/flag/it.svg');?>" alt="us" />Italian</a>
          </li>
          <li>
            <a href="javascript:void(0)" data-bs-dismiss="offcanvas" aria-label="Close"> <img src="<?php echo site_url('assets/themes/fastkart/icons/flag/tf.svg');?>" alt="us" /> French</a>
          </li>
          <li>
            <a href="javascript:void(0)" data-bs-dismiss="offcanvas" aria-label="Close"> <img src="<?php echo site_url('assets/themes/fastkart/icons/flag/cn.svg');?>" alt="us" /> Chines</a>
          </li>
        </ul>
      </div>
    </div>
    <!-- Action Language End -->

    <!-- jquery 3.6.0 -->
    <script src="<?php echo site_url('assets/themes/fastkart/js/jquery-3.6.0.min.js');?>"></script>

    <!-- Bootstrap js -->
    <script src="<?php echo site_url('assets/themes/fastkart/js/bootstrap.bundle.min.js');?>"></script>

    <!-- Lord Icon -->
    <script src="<?php echo site_url('assets/themes/fastkart/js/lord-icon-2.1.0.js');?>"></script>

    <!-- Feather Icon -->
    <script src="<?php echo site_url('assets/themes/fastkart/js/feather.min.js');?>"></script>

    <!-- Script js -->
    <script src="<?php echo site_url('assets/themes/fastkart/js/script.js');?>"></script>
  </body>
  <!-- Body End -->
</html>
<!-- Html End -->
