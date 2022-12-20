<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
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
    <link rel="manifest" href="manifest.json" />
    <title>Fastkart PWA App</title>
    <link rel="icon" href="https://os.youngpreneur.co.id/assets/themes/fastkart/images/favicon.png" type="image/x-icon" />
    <link rel="apple-touch-icon" href="https://os.youngpreneur.co.id/assets/themes/fastkart/images/favicon.png" />
    <meta name="theme-color" content="#0baf9a" />
    <meta name="apple-mobile-web-app-capable" content="yes" />
    <meta name="apple-mobile-web-app-status-bar-style" content="black" />
    <meta name="apple-mobile-web-app-title" content="Fastkart" />
    <meta name="msapplication-TileImage" content="https://os.youngpreneur.co.id/assets/themes/fastkart/images/favicon.png" />
    <meta name="msapplication-TileColor" content="#FFFFFF" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />

    <!-- Bootstrap 5 -->
    <link rel="stylesheet" id="rtl-link" type="text/css" href="https://os.youngpreneur.co.id/assets/themes/fastkart/css/vendors/bootstrap.css" />

    <!-- Iconly Icon css -->
    <link rel="stylesheet" type="text/css" href="https://os.youngpreneur.co.id/assets/themes/fastkart/css/iconly.css" />

    <!-- Slick css -->
    <link rel="stylesheet" type="text/css" href="https://os.youngpreneur.co.id/assets/themes/fastkart/css/vendors/slick.css" />
    <link rel="stylesheet" type="text/css" href="https://os.youngpreneur.co.id/assets/themes/fastkart/css/vendors/slick-theme.css" />

    <!-- Style css -->
    <link rel="stylesheet" id="change-link" type="text/css" href="https://os.youngpreneur.co.id/assets/themes/fastkart/css/style.css" />
  </head>
  <!-- Head End -->

  <!-- Body Start -->
  <body>
    <!-- Skeleton loader Start -->
    <div class="skeleton-loader">
      <!-- Header Start -->
      <header class="header">
        <div class="logo-wrap">
          <i class="iconly-Category icli"></i>
          <a href="index.html"> <img class="logo logo-w" src="https://os.youngpreneur.co.id/assets/themes/fastkart/images/logo/logo-w.png" alt="logo" /></a
          ><a href="index.html"> <img class="logo" src="https://os.youngpreneur.co.id/assets/themes/fastkart/images/logo/logo.png" alt="logo" /></a>
        </div>
        <div class="avatar-wrap">
          <span class="font-sm"><i class="iconly-Location icli font-xl"></i> Los Angeles</span>
          <a href="account.html"> <img class="avatar" src="https://os.youngpreneur.co.id/assets/themes/fastkart/images/avatar/avatar.jpg" alt="avatar" /></a>
        </div>
      </header>
      <!-- Header End -->
    </div>
    <!-- Skeleton loader End -->

    <!-- Header Start -->
    <header class="header">
      <div class="logo-wrap">
        <i class="iconly-Category icli nav-bar"></i>
        <a href="index.html"> <img class="logo logo-w" src="https://os.youngpreneur.co.id/assets/themes/fastkart/images/logo/logo-w.png" alt="logo" /></a><a href="index.html"> <img class="logo" src="https://os.youngpreneur.co.id/assets/themes/fastkart/images/logo/logo.png" alt="logo" /></a>
      </div>
      <div class="avatar-wrap">
        <span class="font-sm"><i class="iconly-Location icli font-xl"></i> Los Angeles</span>
        <a href="account.html"> <img class="avatar" src="https://os.youngpreneur.co.id/assets/themes/fastkart/images/avatar/avatar.jpg" alt="avatar" /></a>
      </div>
    </header>
    <!-- Header End -->

    <!-- Sidebar Start -->
    <a href="javascript:void(0)" class="overlay-sidebar"></a>
    <aside class="header-sidebar">
      <div class="wrap">
        <div class="user-panel">
          <div class="media">
            <a href="account.html"> <img src="https://os.youngpreneur.co.id/assets/themes/fastkart/images/avatar/avatar.jpg" alt="avatar" /></a>
            <div class="media-body">
              <a href="account.html" class="title-color font-sm"
                >Andrea Joanne
                <span class="content-color font-xs">andreajoanne@gmail.com</span>
              </a>
            </div>
          </div>
        </div>

        <!-- Navigation Start -->
        <nav class="navigation">
          <ul>
            <li>
              <a href="index.html" class="nav-link title-color font-sm">
                <i class="iconly-Home icli"></i>
                <span>Home</span>
              </a>
              <a class="arrow" href="index.html"><i data-feather="chevron-right"></i></a>
            </li>

            <li>
              <a href="pages-list.html" class="nav-link title-color font-sm">
                <i class="iconly-Paper icli"></i>
                <span>Fastkart Pages list</span>
              </a>
              <a class="arrow" href="pages-list.html"><i data-feather="chevron-right"></i></a>
            </li>

            <li>
              <a href="category-wide.html" class="nav-link title-color font-sm">
                <i class="iconly-Category icli"></i>
                <span>Shop by Category</span>
              </a>
              <a class="arrow" href="category-wide.html"><i data-feather="chevron-right"></i></a>
            </li>

            <li>
              <a href="order-history.html" class="nav-link title-color font-sm">
                <i class="iconly-Document icli"></i>
                <span>Orders</span>
              </a>
              <a class="arrow" href="order-history.html"><i data-feather="chevron-right"></i></a>
            </li>

            <li>
              <a href="wishlist.html" class="nav-link title-color font-sm">
                <i class="iconly-Heart icli"></i>
                <span>Your Wishlist</span>
              </a>
              <a class="arrow" href="wishlist.html"><i data-feather="chevron-right"></i></a>
            </li>

            <li>
              <a href="javascript:void(0)" data-bs-toggle="offcanvas" data-bs-target="#language" aria-controls="language" class="nav-link title-color font-sm">
                <img src="https://os.youngpreneur.co.id/assets/themes/fastkart/icons/png/flags.png" alt="flag" />
                <span>Langauge</span>
              </a>
              <a class="arrow" href="javascript:void(0)"><i data-feather="chevron-right"></i></a>
            </li>

            <li>
              <a href="account.html" class="nav-link title-color font-sm">
                <i class="iconly-Add-User icli"></i>
                <span>Your Account</span>
              </a>
              <a class="arrow" href="account.html"><i data-feather="chevron-right"></i></a>
            </li>

            <li>
              <a href="notification.html" class="nav-link title-color font-sm">
                <i class="iconly-Notification icli"></i>
                <span>Notification</span>
              </a>
              <a class="arrow" href="notification.html"><i data-feather="chevron-right"></i></a>
            </li>

            <li>
              <a href="setting.html" class="nav-link title-color font-sm">
                <i class="iconly-Setting icli"></i>
                <span>Settings</span>
              </a>
              <a class="arrow" href="setting.html"><i data-feather="chevron-right"></i></a>
            </li>

            <li>
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
          </ul>
        </nav>
        <!-- Navigation End -->
      </div>

      <div class="contact-us">
        <span class="title-color">Contact Support</span>
        <p class="content-color font-xs">If you have any problem,queries or questions feel free to reach out</p>
        <a href="javascript:void(0)" class="btn-solid"> Contact Us </a>
      </div>
    </aside>
    <!-- Sidebar End -->

    <!-- Main Start -->
    <main class="main-wrap index-page mb-xxl">
      <!-- Search Box Start -->
      <div class="search-box">
        <i class="iconly-Search icli search"></i>
        <input class="form-control" type="search" placeholder="Search here..." />
        <i class="iconly-Voice icli mic"></i>
      </div>
      <!-- Search Box End -->

      <!-- Banner Section Start -->
      <section class="banner-section ratio2_1">
        <div class="h-banner-slider">
          <div>
            <div class="banner-box">
              <img src="https://os.youngpreneur.co.id/assets/themes/fastkart/images/banner/home1.jpg" alt="banner" class="bg-img" />
              <div class="content-box">
                <h1 class="title-color font-md heading">Farm Fresh Veggies</h1>
                <p class="content-color font-sm">Get instant delivery</p>
                <a href="shop.html" class="btn-solid font-sm">Shop Now</a>
              </div>
            </div>
          </div>

          <div>
            <div class="banner-box">
              <img src="https://os.youngpreneur.co.id/assets/themes/fastkart/images/banner/home2.jpg" alt="banner" class="bg-img" />
              <div class="content-box">
                <h2 class="font-white font-md heading">Farm Fresh Veggies</h2>
                <p class="font-white font-sm">Get instant delivery</p>
                <a href="shop.html" class="btn-outline font-sm">Shop Now</a>
              </div>
            </div>
          </div>
        </div>
      </section>
      <!-- Banner Section End -->

      <!-- Buy from Recently Bought Start -->
      <section class="recently pt-0">
        <div class="recently-wrap">
          <h3 class="font-md">Buy from Recently Bought</h3>
          <img class="corner" src="https://os.youngpreneur.co.id/assets/themes/fastkart/svg/corner.svg" alt="corner" />

          <div class="recently-list-slider recently-list">
            <div>
              <div class="item">
                <a href="product.html"><img src="https://os.youngpreneur.co.id/assets/themes/fastkart/images/product/2.png" alt="product" /></a>
              </div>
            </div>

            <div>
              <div class="item">
                <a href="product.html"><img src="https://os.youngpreneur.co.id/assets/themes/fastkart/images/product/3.png" alt="product" /></a>
              </div>
            </div>
            <div>
              <div class="item">
                <a href="product.html"><img src="https://os.youngpreneur.co.id/assets/themes/fastkart/images/product/1.png" alt="product" /></a>
              </div>
            </div>
            <div>
              <div class="item">
                <a href="product.html"><img src="https://os.youngpreneur.co.id/assets/themes/fastkart/images/product/6.png" alt="product" /></a>
              </div>
            </div>
            <div>
              <div class="item">
                <a href="product.html"><img src="https://os.youngpreneur.co.id/assets/themes/fastkart/images/product/7.png" alt="product" /></a>
              </div>
            </div>
            <div>
              <div class="item">
                <a href="product.html"><img src="https://os.youngpreneur.co.id/assets/themes/fastkart/images/product/2.png" alt="product" /></a>
              </div>
            </div>
          </div>
        </div>
      </section>
      <!-- Buy from Recently Bought End -->

      <!-- Shop By Category Start -->
      <section class="category pt-0">
        <h3 class="font-md"><span>Shop By Category </span><span class="line"></span></h3>
        <div class="row gy-sm-4 gy-2">
          <div class="col-3">
            <div class="category-wrap">
              <div class="bg-shape bg-theme-blue border-blue"></div>
              <a href="shop.html"> <img class="category img-fluid" src="https://os.youngpreneur.co.id/assets/themes/fastkart/images/catagoeris/1.png" alt="category" /> </a>
              <span class="title-color">Oils,Refined & Ghee</span>
            </div>
          </div>

          <div class="col-3">
            <div class="category-wrap">
              <div class="bg-shape bg-theme-yellow border-yellow"></div>
              <a href="shop.html"> <img class="category img-fluid" src="https://os.youngpreneur.co.id/assets/themes/fastkart/images/catagoeris/2.png" alt="category" /> </a>
              <span class="title-color">Rice, Flour & Grains</span>
            </div>
          </div>

          <div class="col-3">
            <div class="category-wrap">
              <div class="bg-shape bg-theme-orange border-orange"></div>
              <a href="shop.html"> <img class="category img-fluid" src="https://os.youngpreneur.co.id/assets/themes/fastkart/images/catagoeris/3.png" alt="category" /> </a>
              <span class="title-color">Food Cupboard </span>
            </div>
          </div>

          <div class="col-3">
            <div class="category-wrap">
              <div class="bg-shape bg-theme-pink border-pink"></div>
              <a href="shop.html"> <img class="category img-fluid" src="https://os.youngpreneur.co.id/assets/themes/fastkart/images/catagoeris/4.png" alt="category" /> </a>
              <span class="title-color">Fresh Fruits & Veggies </span>
            </div>
          </div>

          <div class="col-3">
            <div class="category-wrap">
              <div class="bg-shape bg-theme-purple border-purple"></div>
              <a href="shop.html"> <img class="category img-fluid" src="https://os.youngpreneur.co.id/assets/themes/fastkart/images/catagoeris/5.png" alt="category" /> </a>
              <span class="title-color">Drinks& Beverages</span>
            </div>
          </div>

          <div class="col-3">
            <div class="category-wrap">
              <div class="bg-shape bg-theme-blue border-blue"></div>
              <a href="shop.html"> <img class="category img-fluid" src="https://os.youngpreneur.co.id/assets/themes/fastkart/images/catagoeris/6.png" alt="category" /> </a>
              <span class="title-color">Instant Mixes </span>
            </div>
          </div>

          <div class="col-3">
            <div class="category-wrap">
              <div class="bg-shape bg-theme-yellow border-yellow"></div>
              <a href="shop.html"> <img class="category img-fluid" src="https://os.youngpreneur.co.id/assets/themes/fastkart/images/catagoeris/7.png" alt="category" /> </a>
              <span class="title-color">Ready to Eat Food</span>
            </div>
          </div>

          <div class="col-3">
            <div class="category-wrap">
              <div class="bg-shape bg-theme-orange border-orange"></div>
              <a href="shop.html"> <img class="category img-fluid" src="https://os.youngpreneur.co.id/assets/themes/fastkart/images/catagoeris/8.png" alt="category" /> </a>
              <span class="title-color">Dales & Pulses </span>
            </div>
          </div>
        </div>
      </section>
      <!-- Shop By Category End -->

      <!-- Say hello to Offers! Start -->
      <section class="offer-section pt-0">
        <div class="offer">
          <div class="top-content">
            <div>
              <h4 class="title-color">Say hello to Offers!</h4>
              <p class="content-color">Best price ever of all the time</p>
            </div>
            <a href="offer.html" class="font-theme">See all</a>
          </div>

          <div class="offer-wrap">
            <div class="product-list media">
              <a href="product.html"><img src="https://os.youngpreneur.co.id/assets/themes/fastkart/images/product/8.png" class="img-fluid" alt="offer" /></a>
              <div class="media-body">
                <a href="product.html" class="font-sm"> Assorted Capsicum Combo </a>
                <span class="content-color font-xs">500g</span>
                <span class="title-color font-sm">$25.00 <span class="badges-round bg-theme-theme font-xs">50% off</span></span>
                <div class="plus-minus d-xs-none">
                  <i class="sub" data-feather="minus"></i>
                  <input type="number" value="1" min="0" max="10" />
                  <i class="add" data-feather="plus"></i>
                </div>
              </div>
            </div>

            <div class="product-list media">
              <a href="product.html"><img src="https://os.youngpreneur.co.id/assets/themes/fastkart/images/product/6.png" class="img-fluid" alt="offer" /></a>
              <div class="media-body">
                <a href="product.html" class="font-sm"> Assorted Capsicum Combo </a>
                <span class="content-color font-xs">500g</span>
                <span class="title-color font-sm">$25.00 <span class="badges-round bg-theme-theme font-xs">50% off</span></span>
                <div class="plus-minus d-xs-none">
                  <i class="sub" data-feather="minus"></i>
                  <input type="number" value="1" min="0" max="10" />
                  <i class="add" data-feather="plus"></i>
                </div>
              </div>
            </div>

            <div class="product-list media">
              <a href="product.html"><img src="https://os.youngpreneur.co.id/assets/themes/fastkart/images/product/7.png" class="img-fluid" alt="offer" /></a>
              <div class="media-body">
                <a href="product.html" class="font-sm"> Assorted Capsicum Combo </a>
                <span class="content-color font-xs">500g</span>
                <span class="title-color font-sm">$25.00 <span class="badges-round bg-theme-theme font-xs">50% off</span></span>
                <div class="plus-minus d-xs-none">
                  <i class="sub" data-feather="minus"></i>
                  <input type="number" value="1" min="0" max="10" />
                  <i class="add" data-feather="plus"></i>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
      <!-- Say hello to Offers! End -->

      <!-- Lowest Price Start -->
      <section class="low-price-section pt-0">
        <div class="top-content">
          <div>
            <h4 class="title-color">Lowest Price</h4>
            <p class="content-color">Pay less, Get More</p>
          </div>
          <a href="shop.html" class="font-theme">See all</a>
        </div>

        <div class="product-slider">
          <div>
            <div class="product-card">
              <div class="img-wrap">
                <a href="product.html"><img src="https://os.youngpreneur.co.id/assets/themes/fastkart/images/product/10.png" class="img-fluid" alt="product" /> </a>
              </div>
              <div class="content-wrap">
                <a href="product.html" class="font-sm title-color">Assorted Capsicum Combo </a>
                <span class="content-color font-xs">500g</span>
                <span class="title-color font-sm plus-item"
                  >$08.99
                  <span class="plus-minus">
                    <i class="sub" data-feather="minus"></i>
                    <input class="val" type="number" value="1" min="1" max="10" />
                    <i class="add" data-feather="plus"></i>
                  </span>
                  <span class="plus-theme"><i data-feather="plus"></i> </span
                ></span>
              </div>
            </div>
          </div>

          <div>
            <div class="product-card">
              <div class="img-wrap">
                <a href="product.html"><img src="https://os.youngpreneur.co.id/assets/themes/fastkart/images/product/11.png" class="img-fluid" alt="product" /> </a>
              </div>
              <div class="content-wrap">
                <a href="product.html" class="font-sm title-color">Assorted Capsicum Combo </a>
                <span class="content-color font-xs">500g</span>
                <span class="title-color font-sm plus-item"
                  >$40.00
                  <span class="plus-minus">
                    <i class="sub" data-feather="minus"></i>
                    <input class="val" type="number" value="1" min="1" max="10" />
                    <i class="add" data-feather="plus"></i>
                  </span>
                  <span class="plus-theme"><i data-feather="plus"></i> </span
                ></span>
              </div>
            </div>
          </div>

          <div>
            <div class="product-card">
              <div class="img-wrap">
                <a href="product.html"><img src="https://os.youngpreneur.co.id/assets/themes/fastkart/images/product/11.png" class="img-fluid" alt="product" /> </a>
              </div>
              <div class="content-wrap">
                <a href="product.html" class="font-sm title-color">Assorted Capsicum Combo </a>
                <span class="content-color font-xs">500g</span>
                <span class="title-color font-sm plus-item"
                  >$20.00
                  <span class="plus-minus">
                    <i class="sub" data-feather="minus"></i>
                    <input class="val" type="number" value="1" min="1" max="10" />
                    <i class="add" data-feather="plus"></i>
                  </span>
                  <span class="plus-theme"><i data-feather="plus"></i> </span
                ></span>
              </div>
            </div>
          </div>

          <div>
            <div class="product-card">
              <div class="img-wrap">
                <a href="product.html"><img src="https://os.youngpreneur.co.id/assets/themes/fastkart/images/product/12.png" class="img-fluid" alt="product" /> </a>
              </div>
              <div class="content-wrap">
                <a href="product.html" class="font-sm title-color">Assorted Capsicum Combo </a>
                <span class="content-color font-xs">500g</span>
                <span class="title-color font-sm plus-item"
                  >$21.00
                  <span class="plus-minus">
                    <i class="sub" data-feather="minus"></i>
                    <input class="val" type="number" value="1" min="1" max="10" />
                    <i class="add" data-feather="plus"></i>
                  </span>
                  <span class="plus-theme"><i data-feather="plus"></i> </span
                ></span>
              </div>
            </div>
          </div>

          <div>
            <div class="product-card">
              <div class="img-wrap">
                <a href="product.html"><img src="https://os.youngpreneur.co.id/assets/themes/fastkart/images/product/13.png" class="img-fluid" alt="product" /> </a>
              </div>
              <div class="content-wrap">
                <a href="product.html" class="font-sm title-color">Assorted Capsicum Combo </a>
                <span class="content-color font-xs">500g</span>
                <span class="title-color font-sm plus-item"
                  >$17.00
                  <span class="plus-minus">
                    <i class="sub" data-feather="minus"></i>
                    <input class="val" type="number" value="1" min="1" max="10" />
                    <i class="add" data-feather="plus"></i>
                  </span>
                  <span class="plus-theme"><i data-feather="plus"></i> </span
                ></span>
              </div>
            </div>
          </div>

          <div>
            <div class="product-card">
              <div class="img-wrap">
                <a href="product.html"><img src="https://os.youngpreneur.co.id/assets/themes/fastkart/images/product/9.png" class="img-fluid" alt="product" /> </a>
              </div>
              <div class="content-wrap">
                <a href="product.html" class="font-sm title-color">Assorted Capsicum Combo </a>
                <span class="content-color font-xs">500g</span>
                <span class="title-color font-sm plus-item"
                  >$30.00
                  <span class="plus-minus">
                    <i class="sub" data-feather="minus"></i>
                    <input class="val" type="number" value="1" min="1" max="10" />
                    <i class="add" data-feather="plus"></i>
                  </span>
                  <span class="plus-theme"><i data-feather="plus"></i> </span
                ></span>
              </div>
            </div>
          </div>
        </div>
      </section>
      <!-- Lowest Price End -->

      <!-- Everyday Essentials Start -->
      <section class="low-price-section pt-0">
        <div class="top-content">
          <div>
            <h4 class="title-color">Everyday Essentials</h4>
            <p class="content-color">Best price ever of all the time</p>
          </div>
          <a href="shop.html" class="font-theme">See all</a>
        </div>

        <div class="row gy-3">
          <div class="col-6">
            <div class="product-card">
              <div class="img-wrap">
                <a href="product.html"><img src="https://os.youngpreneur.co.id/assets/themes/fastkart/images/product/13.png" class="img-fluid" alt="product" /> </a>
              </div>
              <div class="content-wrap">
                <a href="product.html" class="font-sm title-color">Assorted Capsicum Combo </a>
                <span class="content-color font-xs">500g</span>
                <span class="title-color font-sm plus-item"
                  >$32.00
                  <span class="plus-minus">
                    <i class="sub" data-feather="minus"></i>
                    <input class="val" type="number" value="1" min="1" max="10" />
                    <i class="add" data-feather="plus"></i>
                  </span>
                  <span class="plus-theme"><i data-feather="plus"></i> </span>
                </span>
              </div>
            </div>
          </div>

          <div class="col-6">
            <div class="product-card">
              <div class="img-wrap">
                <a href="product.html"><img src="https://os.youngpreneur.co.id/assets/themes/fastkart/images/product/14.png" class="img-fluid" alt="product" /> </a>
              </div>
              <div class="content-wrap">
                <a href="product.html" class="font-sm title-color">Assorted Capsicum Combo </a>
                <span class="content-color font-xs">500g</span>
                <span class="title-color font-sm plus-item"
                  >$11.00
                  <span class="plus-minus">
                    <i class="sub" data-feather="minus"></i>
                    <input class="val" type="number" value="1" min="1" max="10" />
                    <i class="add" data-feather="plus"></i>
                  </span>
                  <span class="plus-theme"><i data-feather="plus"></i> </span
                ></span>
              </div>
            </div>
          </div>

          <div class="col-6">
            <div class="product-card">
              <div class="img-wrap">
                <a href="product.html"><img src="https://os.youngpreneur.co.id/assets/themes/fastkart/images/product/11.png" class="img-fluid" alt="product" /> </a>
              </div>
              <div class="content-wrap">
                <a href="product.html" class="font-sm title-color">Assorted Capsicum Combo </a>
                <span class="content-color font-xs">500g</span>
                <span class="title-color font-sm plus-item"
                  >$25.00
                  <span class="plus-minus">
                    <i class="sub" data-feather="minus"></i>
                    <input class="val" type="number" value="1" min="1" max="10" />
                    <i class="add" data-feather="plus"></i>
                  </span>
                  <span class="plus-theme"><i data-feather="plus"></i> </span
                ></span>
              </div>
            </div>
          </div>

          <div class="col-6">
            <div class="product-card">
              <div class="img-wrap">
                <a href="product.html"><img src="https://os.youngpreneur.co.id/assets/themes/fastkart/images/product/12.png" class="img-fluid" alt="product" /> </a>
              </div>
              <div class="content-wrap">
                <a href="product.html" class="font-sm title-color">Assorted Capsicum Combo </a>
                <span class="content-color font-xs">500g</span>
                <span class="title-color font-sm plus-item"
                  >$09.00
                  <span class="plus-minus">
                    <i class="sub" data-feather="minus"></i>
                    <input class="val" type="number" value="1" min="1" max="10" />
                    <i class="add" data-feather="plus"></i>
                  </span>
                  <span class="plus-theme"><i data-feather="plus"></i> </span
                ></span>
              </div>
            </div>
          </div>

          <div class="col-6">
            <div class="product-card">
              <div class="img-wrap">
                <a href="product.html"><img src="https://os.youngpreneur.co.id/assets/themes/fastkart/images/product/13.png" class="img-fluid" alt="product" /> </a>
              </div>
              <div class="content-wrap">
                <a href="product.html" class="font-sm title-color">Assorted Capsicum Combo </a>
                <span class="content-color font-xs">500g</span>
                <span class="title-color font-sm plus-item"
                  >$25.00
                  <span class="plus-minus">
                    <i class="sub" data-feather="minus"></i>
                    <input class="val" type="number" value="1" min="1" max="10" />
                    <i class="add" data-feather="plus"></i>
                  </span>
                  <span class="plus-theme"><i data-feather="plus"></i> </span
                ></span>
              </div>
            </div>
          </div>

          <div class="col-6">
            <div class="product-card">
              <div class="img-wrap">
                <a href="product.html"><img src="https://os.youngpreneur.co.id/assets/themes/fastkart/images/product/12.png" class="img-fluid" alt="product" /> </a>
              </div>
              <div class="content-wrap">
                <a href="product.html" class="font-sm title-color">Assorted Capsicum Combo </a>
                <span class="content-color font-xs">500g</span>
                <span class="title-color font-sm plus-item"
                  >$16.00
                  <span class="plus-minus">
                    <i class="sub" data-feather="minus"></i>
                    <input class="val" type="number" value="1" min="1" max="10" />
                    <i class="add" data-feather="plus"></i>
                  </span>
                  <span class="plus-theme"><i data-feather="plus"></i> </span
                ></span>
              </div>
            </div>
          </div>
        </div>
      </section>
      <!-- Everyday Essentials End -->

      <!-- Coupons For You Start -->
      <section class="coupons-section pt-0">
        <div class="coupon-wrap">
          <div class="top-content">
            <div>
              <h4 class="title-color">Coupens For You</h4>
              <p class="content-color">Popular Offers of the Day</p>
            </div>
            <a href="offer.html" class="font-theme">See all</a>
          </div>

          <div class="coupon-box coupon-slider">
            <div>
              <a href="offer.html">
                <div class="cupon bg-theme-orange">
                  <span class="circle-shape-wrap left">
                    <span class="circle-shape"></span>
                  </span>
                  <span class="circle-shape-wrap right">
                    <span class="circle-shape"></span>
                  </span>
                  <div class="img-wrap">
                    <img src="https://os.youngpreneur.co.id/assets/themes/fastkart/icons/png/google2.png" alt="google pay" />
                  </div>
                  <div class="content-wrap">
                    <h5 class="title-color">50% OFF</h5>
                    <span class="content-color">UPTO $20.00</span>
                  </div>
                </div></a
              >
            </div>

            <div>
              <a href="offer.html">
                <div class="cupon bg-white">
                  <span class="circle-shape-wrap left">
                    <span class="circle-shape"></span>
                  </span>
                  <span class="circle-shape-wrap right">
                    <span class="circle-shape"></span>
                  </span>
                  <div class="img-wrap">
                    <img src="https://os.youngpreneur.co.id/assets/themes/fastkart/icons/png/paypal.png" alt="google pay" />
                  </div>
                  <div class="content-wrap">
                    <h5 class="title-color">50% OFF</h5>
                    <span class="content-color">UPTO $20.00</span>
                  </div>
                </div>
              </a>
            </div>
            <div>
              <a href="offer.html">
                <div class="cupon bg-theme-yellow">
                  <span class="circle-shape-wrap left">
                    <span class="circle-shape"></span>
                  </span>
                  <span class="circle-shape-wrap right">
                    <span class="circle-shape"></span>
                  </span>
                  <div class="img-wrap">
                    <img src="https://os.youngpreneur.co.id/assets/themes/fastkart/icons/png/venmo.png" alt="google pay" />
                  </div>
                  <div class="content-wrap">
                    <h5 class="title-color">50% OFF</h5>
                    <span class="content-color">UPTO $20.00</span>
                  </div>
                </div></a
              >
            </div>
            <div>
              <a href="offer.html">
                <div class="cupon bg-theme-orange">
                  <span class="circle-shape-wrap left">
                    <span class="circle-shape"></span>
                  </span>
                  <span class="circle-shape-wrap right">
                    <span class="circle-shape"></span>
                  </span>
                  <div class="img-wrap">
                    <img src="https://os.youngpreneur.co.id/assets/themes/fastkart/icons/png/google2.png" alt="google pay" />
                  </div>
                  <div class="content-wrap">
                    <h5 class="title-color">50% OFF</h5>
                    <span class="content-color">UPTO $20.00</span>
                  </div>
                </div></a
              >
            </div>
          </div>
        </div>
      </section>
      <!-- Coupens For You End -->

      <!-- Lowest Price 2 Start -->
      <section class="low-price-section pt-0">
        <div class="top-content">
          <div>
            <h4 class="title-color">Lowest Price</h4>
            <p class="content-color">Pay less, Get More</p>
          </div>
          <a href="shop.html" class="font-theme">See all</a>
        </div>

        <div class="product-slider">
          <div>
            <div class="product-card">
              <div class="img-wrap">
                <a href="product.html"><img src="https://os.youngpreneur.co.id/assets/themes/fastkart/images/product/10.png" class="img-fluid" alt="product" /> </a>
              </div>
              <div class="content-wrap">
                <a href="product.html" class="font-sm title-color">Assorted Capsicum Combo </a>
                <span class="content-color font-xs">500g</span>
                <span class="title-color font-sm plus-item"
                  >$22.00
                  <span class="plus-minus">
                    <i class="sub" data-feather="minus"></i>
                    <input class="val" type="number" value="1" min="1" max="10" />
                    <i class="add" data-feather="plus"></i>
                  </span>
                  <span class="plus-theme"><i data-feather="plus"></i> </span
                ></span>
              </div>
            </div>
          </div>

          <div>
            <div class="product-card">
              <div class="img-wrap">
                <a href="product.html"><img src="https://os.youngpreneur.co.id/assets/themes/fastkart/images/product/11.png" class="img-fluid" alt="product" /> </a>
              </div>
              <div class="content-wrap">
                <a href="product.html" class="font-sm title-color">Assorted Capsicum Combo </a>
                <span class="content-color font-xs">500g</span>
                <span class="title-color font-sm plus-item"
                  >$17.00
                  <span class="plus-minus">
                    <i class="sub" data-feather="minus"></i>
                    <input class="val" type="number" value="1" min="1" max="10" />
                    <i class="add" data-feather="plus"></i>
                  </span>
                  <span class="plus-theme"><i data-feather="plus"></i> </span
                ></span>
              </div>
            </div>
          </div>

          <div>
            <div class="product-card">
              <div class="img-wrap">
                <a href="product.html"><img src="https://os.youngpreneur.co.id/assets/themes/fastkart/images/product/11.png" class="img-fluid" alt="product" /> </a>
              </div>
              <div class="content-wrap">
                <a href="product.html" class="font-sm title-color">Assorted Capsicum Combo </a>
                <span class="content-color font-xs">500g</span>
                <span class="title-color font-sm plus-item"
                  >$14.00
                  <span class="plus-minus">
                    <i class="sub" data-feather="minus"></i>
                    <input class="val" type="number" value="1" min="1" max="10" />
                    <i class="add" data-feather="plus"></i>
                  </span>
                  <span class="plus-theme"><i data-feather="plus"></i> </span
                ></span>
              </div>
            </div>
          </div>

          <div>
            <div class="product-card">
              <div class="img-wrap">
                <a href="product.html"><img src="https://os.youngpreneur.co.id/assets/themes/fastkart/images/product/12.png" class="img-fluid" alt="product" /> </a>
              </div>
              <div class="content-wrap">
                <a href="product.html" class="font-sm title-color">Assorted Capsicum Combo </a>
                <span class="content-color font-xs">500g</span>
                <span class="title-color font-sm plus-item"
                  >$15.00
                  <span class="plus-minus">
                    <i class="sub" data-feather="minus"></i>
                    <input class="val" type="number" value="1" min="1" max="10" />
                    <i class="add" data-feather="plus"></i>
                  </span>
                  <span class="plus-theme"><i data-feather="plus"></i> </span
                ></span>
              </div>
            </div>
          </div>

          <div>
            <div class="product-card">
              <div class="img-wrap">
                <a href="product.html"><img src="https://os.youngpreneur.co.id/assets/themes/fastkart/images/product/13.png" class="img-fluid" alt="product" /> </a>
              </div>
              <div class="content-wrap">
                <a href="product.html" class="font-sm title-color">Assorted Capsicum Combo </a>
                <span class="content-color font-xs">500g</span>
                <span class="title-color font-sm plus-item"
                  >$23.00
                  <span class="plus-minus">
                    <i class="sub" data-feather="minus"></i>
                    <input class="val" type="number" value="1" min="1" max="10" />
                    <i class="add" data-feather="plus"></i>
                  </span>
                  <span class="plus-theme"><i data-feather="plus"></i> </span
                ></span>
              </div>
            </div>
          </div>

          <div>
            <div class="product-card">
              <div class="img-wrap">
                <a href="product.html"><img src="https://os.youngpreneur.co.id/assets/themes/fastkart/images/product/9.png" class="img-fluid" alt="product" /> </a>
              </div>
              <div class="content-wrap">
                <a href="product.html" class="font-sm title-color">Assorted Capsicum Combo </a>
                <span class="content-color font-xs">500g</span>
                <span class="title-color font-sm plus-item"
                  >$22.00
                  <span class="plus-minus">
                    <i class="sub" data-feather="minus"></i>
                    <input class="val" type="number" value="1" min="1" max="10" />
                    <i class="add" data-feather="plus"></i>
                  </span>
                  <span class="plus-theme"><i data-feather="plus"></i> </span
                ></span>
              </div>
            </div>
          </div>
        </div>
      </section>
      <!-- Lowest Price 2 End -->

      <!-- Question section Start -->
      <section class="question-section pt-0">
        <h5>Didn’t find what you were looking for?</h5>
        <a href="category-wide.html" class="btn-solid">Browse Category</a>
      </section>
      <!-- Question section End -->
    </main>
    <!-- Main End -->

    <!-- Footer Start -->
    <footer class="footer-wrap">
      <ul class="footer">
        <li class="footer-item active">
          <a href="index.html" class="footer-link">
            <i class="iconly-Home icli"></i>
            <span>Home</span>
          </a>
        </li>
        <li class="footer-item">
          <a href="category-wide.html" class="footer-link">
            <i class="iconly-Category icli"></i>
            <span>Category</span>
          </a>
        </li>
        <li class="footer-item">
          <a href="search.html" class="footer-link">
            <i class="iconly-Search icli"></i>
            <span>Search</span>
          </a>
        </li>
        <li class="footer-item">
          <a href="offer.html" class="footer-link">
            <lord-icon class="icon" src="https://os.youngpreneur.co.id/assets/themes/fastkart/icons/gift.json" trigger="loop" stroke="70" colors="primary:#ffffff,secondary:#ffffff"></lord-icon>
            <span class="offer">Offers</span>
          </a>
        </li>
        <li class="footer-item">
          <a href="cart.html" class="footer-link">
            <i class="iconly-Bag-2 icli"></i>
            <span>Cart</span>
          </a>
        </li>
      </ul>
    </footer>
    <!-- Footer End -->


    <!-- Pwa Install App Popup Start -->
    <div class="offcanvas offcanvas-bottom addtohome-popup show" tabindex="-1" id="offcanvas">
      <div class="offcanvas-body small">
        <div class="app-info">
          <img src="https://os.youngpreneur.co.id/assets/themes/fastkart/images/logo/logo48.png" class="img-fluid" alt="" />
          <div class="content">
            <h3>Fastkart App <i data-feather="x" data-bs-dismiss="offcanvas"></i></h3>
            <a href="#">www.fastkart-app.com</a>
          </div>
        </div>
        <button class="btn-solid install-app" id="installApp">Add to home screen</button>
      </div>
    </div>
    <!-- Pwa Install App Popup End -->

    <!-- jquery 3.6.0 -->
    <script src="https://os.youngpreneur.co.id/assets/themes/fastkart/js/jquery-3.6.0.min.js"></script>

    <!-- Bootstrap Js -->
    <script src="https://os.youngpreneur.co.id/assets/themes/fastkart/js/bootstrap.bundle.min.js"></script>

    <!-- Lord Icon -->
    <script src="https://os.youngpreneur.co.id/assets/themes/fastkart/js/lord-icon-2.1.0.js"></script>

    <!-- Feather Icon -->
    <script src="https://os.youngpreneur.co.id/assets/themes/fastkart/js/feather.min.js"></script>

    <!-- Slick Slider js -->
    <script src="https://os.youngpreneur.co.id/assets/themes/fastkart/js/slick.js"></script>
    <script src="https://os.youngpreneur.co.id/assets/themes/fastkart/js/slick.min.js"></script>
    <script src="https://os.youngpreneur.co.id/assets/themes/fastkart/js/slick-custom.js"></script>

    <!-- Add To Home  js -->
    <script src="https://os.youngpreneur.co.id/assets/themes/fastkart/js/homescreen-popup.js"></script>

    <!-- Theme Setting js -->
    <!-- <script src="https://os.youngpreneur.co.id/assets/themes/fastkart/js/theme-setting.js"></script> -->

    <!-- Script js -->
    <script src="https://os.youngpreneur.co.id/assets/themes/fastkart/js/script.js"></script>
  </body>
  <!-- Body End -->
</html>
