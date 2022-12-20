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
		<title>Toko Online</title>
		<link rel="preconnect" href="https://fonts.gstatic.com">
		<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&amp;display=swap">
		<!-- Favicon-->
		<link rel="icon" href="<?php echo get_theme_uri('img/icons/icon-72x72.png'); ?>">
		<!-- Apple Touch Icon-->
		<link rel="apple-touch-icon" href="<?php echo get_theme_uri('img/icons/icon-96x96.png'); ?>">
		<link rel="apple-touch-icon" sizes="152x152" href="<?php echo get_theme_uri('img/icons/icon-152x152.png'); ?>">
		<link rel="apple-touch-icon" sizes="167x167" href="<?php echo get_theme_uri('img/icons/icon-167x167.png'); ?>">
		<link rel="apple-touch-icon" sizes="180x180" href="<?php echo get_theme_uri('img/icons/icon-180x180.png'); ?>">
		<!-- CSS Libraries-->
		<link rel="stylesheet" href="<?php echo get_theme_uri('css/bootstrap.min.css'); ?>">
		<link rel="stylesheet" href="<?php echo get_theme_uri('css/animate.css'); ?>">
		<link rel="stylesheet" href="<?php echo get_theme_uri('css/owl.carousel.min.css'); ?>">
		<link rel="stylesheet" href="<?php echo get_theme_uri('css/font-awesome.min.css'); ?>">
		<link rel="stylesheet" href="<?php echo get_theme_uri('css/default/lineicons.min.css'); ?>">
		<!-- Stylesheet-->
		<link rel="stylesheet" href="<?php echo get_theme_uri('style.css'); ?>">
		<!-- Web App Manifest-->
		<link rel="manifest" href="<?php echo get_theme_uri('manifest.json'); ?>">

		<link rel="stylesheet" href="<?php echo base_url('assets/plugins/toastr/toastr.min.css'); ?>">
		<link rel="stylesheet" href="https://unpkg.com/swiper@8/swiper-bundle.min.css" />
		<style>
		.swiper {
			width: 100%;
			height: 100%;
		}

		.swiper-slide {
			text-align: center;
			font-size: 14px;
			background: #fff;

			/* Center slide text vertically */
			display: -webkit-box;
			display: -ms-flexbox;
			display: -webkit-flex;
			display: flex;
			-webkit-box-pack: center;
			-ms-flex-pack: center;
			-webkit-justify-content: center;
			justify-content: center;
			-webkit-box-align: center;
			-ms-flex-align: center;
			-webkit-align-items: center;
			align-items: center;

			margin-right: 20px !important;
			width: 40% !important;
		}

		.swiper-slide img {
			display: block;
			width: 100%;
			height: 100%;
			object-fit: cover;
		}
		</style>
		<script src="<?php echo get_theme_uri('js/jquery.min.js'); ?>"></script>
		<script src="<?php echo get_theme_uri('js/jquery-migrate-3.0.1.min.js'); ?>"></script>

	</head>
	<body>
		<!-- Preloader-->
		<div class="preloader" id="preloader">
		<div class="spinner-grow text-secondary" role="status">
			<div class="sr-only">Loading...</div>
		</div>
		</div>
		<!-- Header Area-->
		<div class="header-area" id="headerArea">
		<div class="container h-100 d-flex align-items-center justify-content-between">
			<!-- Logo Wrapper-->
			<div class="logo-wrapper"><a href="home.html"><img src="<?php echo get_theme_uri('img/core-img/logo-small.png'); ?>" alt=""> </a></div>
			<!-- Navbar Toggler-->
			<div class="suha-navbar-toggler d-flex flex-wrap" id="suhaNavbarToggler"><span></span><span></span><span></span></div>
		</div>
		</div>
		<!-- Sidenav Black Overlay-->
		<div class="sidenav-black-overlay"></div>
		<!-- Side Nav Wrapper-->
		<div class="suha-sidenav-wrapper" id="sidenavWrapper">
		<!-- Sidenav Profile-->
		<div class="sidenav-profile">
			<div class="user-profile"><img src="<?php echo get_user_image(); ?>" alt="<?php echo get_user_name(); ?>"></div>
			<div class="user-info">
			<h6 class="user-name mb-0"><?php echo get_user_name(); ?></h6>
			<!-- <p class="available-balance">Credit <span>$<span class="counter">461</span></span></p> -->
			</div>
		</div>
		<!-- Sidenav Nav-->
		<ul class="sidenav-nav ps-0">
			<li><a href="<?php echo site_url('customer/profile'); ?>"><i class="lni lni-user"></i>Profil Saya</a></li>
			<li><a href="<?php echo site_url('customer/orders'); ?>"><i class="lni lni-alarm lni-tada-effect"></i>Histori Pemesanan</a></li>
			<li><a href="<?php echo site_url('customer/payments'); ?>"><i class="lni lni-cog"></i>Pembayaran</a></li>
			<li><a href="<?php echo site_url('auth/logout'); ?>"><i class="lni lni-power-switch"></i>Logout</a></li>
		</ul>
		<!-- Go Back Button-->
		<div class="go-home-btn" id="goHomeBtn"><i class="lni lni-arrow-left"></i></div>
		</div>
		<!-- PWA Install Alert-->
		<!-- <div class="toast pwa-install-alert shadow bg-white" role="alert" aria-live="assertive" aria-atomic="true" data-bs-delay="5000" data-bs-autohide="true">
		<div class="toast-body">
			<div class="content d-flex align-items-center mb-2"><img src="img/icons/icon-72x72.png" alt="">
			<h6 class="mb-0">Add to Home Screen</h6>
			<button class="btn-close ms-auto" type="button" data-bs-dismiss="toast" aria-label="Close"></button>
			</div><span class="mb-0 d-block">Add Suha on your mobile home screen. Click the<strong class="mx-1">"Add to Home Screen"</strong>button &amp; enjoy it like a regular app.</span>
		</div>
		</div> -->
