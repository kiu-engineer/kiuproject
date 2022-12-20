<!DOCTYPE html>
<html lang="en">
<!-- Head Start -->

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta name="description" content="Fastkart" />
  <meta name="keywords" content="Fastkart" />
  <meta name="author" content="Fastkart" />
  <link rel="manifest" href="<?php echo get_theme_uri('manifest.json'); ?>" />
  <title>Official Store PT. Karisma Indoagro Universal</title>
  <link rel="icon" href="<?php echo site_url('assets/images/favicon.png'); ?>" type="image/png">
  <link rel="apple-touch-icon" href="<?php echo get_theme_uri('images/favicon.png'); ?>" />
  <meta name="theme-color" content="#0baf9a" />
  <meta name="apple-mobile-web-app-capable" content="yes" />
  <meta name="apple-mobile-web-app-status-bar-style" content="black" />
  <meta name="apple-mobile-web-app-title" content="Fastkart" />
  <meta name="msapplication-TileImage" content="<?php echo get_theme_uri('images/favicon.png'); ?>" />
  <meta name="msapplication-TileColor" content="#FFFFFF" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />

  <?php $v = time(); ?>
  <!-- Bootstrap 5 -->
  <link rel="stylesheet" id="rtl-link" type="text/css" href="<?php echo get_theme_uri('css/vendors/bootstrap.css'); ?>" />

  <!-- Iconly Icon css -->
  <link rel="stylesheet" type="text/css" href="<?php echo get_theme_uri('css/iconly.css'); ?>" />

  <!-- Slick css -->
  <link rel="stylesheet" type="text/css" href="<?php echo get_theme_uri('css/vendors/slick.css'); ?>" />
  <link rel="stylesheet" type="text/css" href="<?php echo get_theme_uri('css/vendors/slick-theme.css'); ?>" />

  <!-- Style css -->
  <link rel="stylesheet" id="change-link" type="text/css" href="<?php echo get_theme_uri('css/style.css?v=' . $v); ?>" />
  <!-- jquery 3.6.0 -->
  <script src="<?php echo get_theme_uri('js/jquery-3.6.0.min.js'); ?>"></script>
</head>
<!-- Head End -->

<!-- Body Start -->

<body id="main_body">
  <!-- Skeleton loader Start | LOAD BEFORE LOAD PAGE-->
  <div class="skeleton-loader">
    <!-- Header Start -->
    <header class="header">
      <div class="logo-wrap">
        <i class="iconly-Category icli"></i>
        <a href="<?= site_url('home') ?>"> <img class="logo logo-w" src="<?php echo get_theme_uri('images/logo/logo-w.png'); ?>" alt="logo" /></a><a href="<?= site_url('home') ?>"> <img class="logo" src="<?php echo get_theme_uri('images/logo/logo.png'); ?>" alt="logo" /></a>
      </div>
      <div class="avatar-wrap">
        <a href="<?= site_url('profile') ?>"> <img class="avatar" src="<?php echo get_user_image(); ?>" alt="avatar" /></a>
      </div>
    </header>
    <!-- Header End -->
  </div>
  <!-- Skeleton loader End -->

  <!-- Header Start -->
  <header class="header">
    <div class="logo-wrap">
      <i class="iconly-Category icli nav-bar"></i>
      <a href="<?= site_url('home') ?>"> <img class="logo logo-w" src="<?php echo get_theme_uri('images/logo/logo-w.png'); ?>" alt="logo" /></a>
      <a href="<?= site_url('home') ?>"> <img class="logo" src="<?php echo get_theme_uri('images/logo/logo.png'); ?>" alt="logo" /></a>
    </div>
    <div class="avatar-wrap">
      <a href="<?= site_url('profile') ?>"> <img class="avatar" src="<?php echo get_user_image(); ?>" alt="avatar" /></a>
    </div>
  </header>
  <!-- Header End -->

  <!-- Sidebar Start -->
  <a href="javascript:void(0)" class="overlay-sidebar"></a>
  <aside class="header-sidebar">
    <div class="wrap">
      <div class="user-panel">
        <div class="media">
          <?php if (empty($_SESSION['__ACTIVE_SESSION_DATA'])) : ?>
            <a href="<?= site_url('login'); ?>" class="btn-solid font-sm">Login </a>
            <a href="<?= site_url('register'); ?>" class="btn-solid font-sm">Registrasi </a>
          <?php else : ?>
            <a href="account.html"> <img src="<?php echo get_user_image(); ?>" alt="avatar" /></a>
            <div class="media-body">
              <a href="account.html" class="title-color font-sm"><?php echo get_user_name(); ?>
                <span class="content-color font-xs"><?php echo get_user_email(); ?></span>
              </a>
            </div>
          <?php endif; ?>
        </div>
      </div>

      <!-- Navigation Start -->
      <nav class="navigation">
        <ul>
          <li>
            <a href="<?= site_url('home') ?>" class="nav-link title-color font-sm">
              <i class="iconly-Home icli"></i>
              <span>Home</span>
            </a>
            <a class="arrow" href="<?= site_url('home') ?>"><i data-feather="chevron-right"></i></a>
          </li>

          <li>
            <a href="<?= site_url('category') ?>" class="nav-link title-color font-sm">
              <i class="iconly-Category icli"></i>
              <span>Kategori</span>
            </a>
            <a class="arrow" href="<?= site_url('category') ?>"><i data-feather="chevron-right"></i></a>
          </li>

          <li>
            <a href="<?= site_url('cart') ?>" class="nav-link title-color font-sm">
              <i class="iconly-Bag-2 icli"></i>
              <span>Cart</span>
            </a>
            <a class="arrow" href="<?= site_url('cart') ?>"><i data-feather="chevron-right"></i></a>
          </li>


          <li>
            <a href="<?= site_url('order_history') ?>" class="nav-link title-color font-sm">
              <i class="iconly-Document icli"></i>
              <span>Histori Order</span>
            </a>
            <a class="arrow" href="<?= site_url('order_history') ?>"><i data-feather="chevron-right"></i></a>
          </li>

          <li>
            <a href="<?= site_url('message') ?>" class="nav-link title-color font-sm">
              <i class="iconly-Chat icli"></i>
              <span>Chat</span>
            </a>
            <a class="arrow" href="<?= site_url('message') ?>"><i data-feather="chevron-right"></i></a>
          </li>

          <li>
            <a href="<?= site_url('profile') ?>" class="nav-link title-color font-sm">
              <i class="iconly-Setting icli"></i>
              <span>Settings</span>
            </a>
            <a class="arrow" href="<?= site_url('profile') ?>"><i data-feather="chevron-right"></i></a>
          </li>

          <?php if (!empty($_SESSION['__ACTIVE_SESSION_DATA'])) : ?>
            <li>
              <a href="<?= site_url('logout') ?>" class="nav-link title-color font-sm">
                <i class="iconly-Logout icli"></i>
                <span>Logout</span>
              </a>
              <a class="arrow" href="<?= site_url('logout') ?>"><i data-feather="chevron-right"></i></a>
            </li>
          <?php endif; ?>
          <!-- <li>
              <a href="javascript:void(0)" class="nav-link title-color font-sm">
                <i class="iconly-Graph icli"></i>
                <span>Dark</span>
              </a>

              <div class="dark-switch">
                <input id="darkButton" type="checkbox" />
                <span></span>
              </div>
            </li>

            <li>
              <a href="javascript:void(0)" class="nav-link title-color font-sm">
                <i class="iconly-Filter icli"></i>
                <span>RTL</span>
              </a>

              <div class="dark-switch">
                <input id="rtlButton" type="checkbox" />
                <span class="before-none"></span>
              </div>
            </li>
             -->
        </ul>
      </nav>
      <!-- Navigation End -->
    </div>

    <!-- <div class="contact-us">
        <span class="title-color">Contact Support</span>
        <p class="content-color font-xs">If you have any problem,queries or questions feel free to reach out</p>
        <a href="javascript:void(0)" class="btn-solid"> Contact Us </a>
      </div> -->

  </aside>
  <!-- Sidebar End -->