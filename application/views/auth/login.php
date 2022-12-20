<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, viewport-fit=cover, shrink-to-fit=no">
    <meta name="description" content="Suha - Multipurpose Ecommerce Mobile HTML Template">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="theme-color" content="#100DD1">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <!-- The above tags *must* come first in the head, any other head content must come *after* these tags-->
    <!-- Title-->
    <title>Toko Online | Login</title>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&amp;display=swap">
    <!-- Favicon-->
    <link rel="icon" href="<?php echo get_login_theme('img/icons/icon-72x72.png')?>">
    <!-- Apple Touch Icon-->
    <link rel="apple-touch-icon" href="<?php echo get_login_theme('img/icons/icon-96x96.png')?>">
    <link rel="apple-touch-icon" sizes="152x152" href="<?php echo get_login_theme('img/icons/icon-152x152.png')?>">
    <link rel="apple-touch-icon" sizes="167x167" href="<?php echo get_login_theme('img/icons/icon-167x167.png')?>">
    <link rel="apple-touch-icon" sizes="180x180" href="<?php echo get_login_theme('img/icons/icon-180x180.png')?>">
    <!-- CSS Libraries-->
    <link rel="stylesheet" href="<?php echo get_login_theme('css/bootstrap.min.css')?>">
    <link rel="stylesheet" href="<?php echo get_login_theme('css/animate.css')?>">
    <link rel="stylesheet" href="<?php echo get_login_theme('css/owl.carousel.min.css')?>">
    <link rel="stylesheet" href="<?php echo get_login_theme('css/font-awesome.min.css')?>">
    <link rel="stylesheet" href="<?php echo get_login_theme('css/default/lineicons.min.css')?>">
    <!-- Stylesheet-->
    <link rel="stylesheet" href="<?php echo get_login_theme('style.css')?>">
    <!-- Web App Manifest-->
    <link rel="manifest" href="<?php echo get_login_theme('manifest.json')?>">
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
            <div class="col-12 col-sm-9 col-md-7 col-lg-6 col-xl-5"><img class="big-logo" src="<?php echo get_theme_uri('images/logo/logo-w.png')?>" alt="" width="220px">
                <!-- Register Form-->
                <div class="register-form mt-5 px-4">
                    <?php echo form_open('auth/login/do_login'); ?>
                        <div class="form-group text-start mb-4"><span>Email</span>
                        <label for="email"><i class="lni lni-user"></i></label>
                        <input class="form-control" name="email" value="<?php echo set_value('email', $old_email); ?>"  type="email" placeholder="email" required >
                        </div>
                        <div class="form-group text-start mb-4"><span>Password</span>
                        <label for="password"><i class="lni lni-lock"></i></label>
                        <input class="form-control" name="password" type="password" placeholder="Password" required>
                        </div>
                        <!-- <input type="checkbox" name="remember_me" value="1">Ingat saya</p> -->

                        <?php if ($redirection) : ?>
                        <div class="flash-message mt-3 alert alert-danger">
                            Silahkan login untuk melanjutkan...
                        </div>
                        <?php endif; ?>

                        <?php if ($flash_message) : ?>
                        <div class="flash-message mt-3 alert alert-danger">
                            <?php echo $flash_message; ?>
                        </div>
                        <?php endif; ?>

                        <button class="btn btn-success btn-lg w-100" type="submit">Masuk</button>
                    <?php echo form_close(); ?>
                </div>
                <!-- Login Meta-->

                <div class="login-meta-data">
                <!--  <a class="forgot-password d-block mt-3 mb-1" href="#">Lupa Password?</a> -->
                    <p class="mb-0">Belum punya akun?<a class="ms-1" href="<?=base_url('register')?>">Registrasi sekarang</a></p>
                </div>

                <div class="view-as-guest mt-3">
                  <a class="btn" href="<?=base_url()?>">Kembali ke Halaman Utama</a>
                </div>

            </div>
        </div>
      </div>
    </div>
    <!-- All JavaScript Files-->
    <script src="<?php echo get_login_theme('js/bootstrap.bundle.min.js')?>"></script>
    <script src="<?php echo get_login_theme('js/jquery.min.js')?>"></script>
    <script src="<?php echo get_login_theme('js/waypoints.min.js')?>"></script>
    <script src="<?php echo get_login_theme('js/jquery.easing.min.js')?>"></script>
    <script src="<?php echo get_login_theme('js/owl.carousel.min.js')?>"></script>
    <script src="<?php echo get_login_theme('js/jquery.counterup.min.js')?>"></script>
    <script src="<?php echo get_login_theme('js/jquery.countdown.min.js')?>"></script>
    <script src="<?php echo get_login_theme('js/default/jquery.passwordstrength.js')?>"></script>
    <script src="<?php echo get_login_theme('js/default/dark-mode-switch.js')?>"></script>
    <script src="<?php echo get_login_theme('js/default/active.js')?>"></script>
    <script src="<?php echo get_login_theme('js/pwa.js')?>"></script>
  </body>
</html>
