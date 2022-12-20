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
    <main class="main-wrap terms-condition mb-xxl">
      <!-- Introduction Section start -->
      <section class="p-0">
        <h1 class="title-color">Terms and Conditions for Youngpreneur Indonesia</h1>
        <h2 class="title-sub title-color fw-600 title-mb">Introduction</h2>
        <p class="content-color">These Website Standard Terms and Conditions written on this webpage shall manage your use of our website, Youngpreneur Indonesia accessible at www.Youngpreneur Indonesia.com.</p>
        <p class="content-color mb-0">
          These Terms will be applied fully and affect to your use of this Website. By using this Website, you agreed to accept all terms and conditions written in here. You must not use this Website
          if you disagree with any of these Website Standard Terms and Conditions. These Terms and Conditions have been generated with the help of the Terms And Conditiions Sample Generator.
        </p>
      </section>
      <!-- Introduction Section End -->

      <!-- Intellectual Property Rights Section Start -->
      <section class="pb-0">
        <h3 class="title-sub title-color fw-600 title-mb">Intellectual Property Rights</h3>
        <p class="content-color">Other than the content you own, under these Terms, Youngpreneur Indonesia and/or its licensors own all the intellectual property rights and materials contained in this Website.</p>
        <p class="content-color mb-0">You are granted limited license only for purposes of viewing the material contained on this Website.</p>
      </section>
      <!-- Intellectual Property Rights Section End -->

      <!-- Restrictions Section Start -->
      <section class="pb-0">
        <h4 class="title-sub title-color fw-600 title-mb">Restrictions</h4>
        <p class="content-color">You are specifically restricted from all of the following:</p>
        <ul class="list-section mb-2">
          <li class="content-color">publishing any Website material in any other media;</li>
          <li class="content-color">selling, sublicensing and/or otherwise any Website material;</li>
          <li class="content-color">publicly performing and/or showing any Website material;</li>
          <li class="content-color">using this Website in any way that is or may be damaging to this Website;</li>
          <li class="content-color">using this Website in any way that impacts user access to this Website;</li>
          <li class="content-color">using this Website contrary to applicable laws and regulations, or in any way may cause harm to the Website, or to any person or business entity;</li>
          <li class="content-color">engaging in any data mining, data harvesting, data extracting or any other similar activity in relation to this Website;</li>
          <li class="content-color">using this Website to engage in any advertising or marketing.</li>
        </ul>
        <p class="content-color mb-0">
          Certain areas of this Website are restricted from being access by you and Youngpreneur Indonesia may further restrict access by you to any areas of this Website, at any time, in absolute discretion. Any
          user ID and password you may have for this Website are confidential and you must maintain confidentiality as well.
        </p>
      </section>
      <!-- Restrictions Section End -->

      <!-- Your Content Section Start -->
      <section class="pb-0">
        <h5 class="title-color title-sub fw-600 title-mb">Your Content</h5>
        <p class="content-color">
          In these Website Standard Terms and Conditions, "Your Content" shall mean any audio, video text, images or other material you choose to display on this Website. By displaying Your Content,
          you grant Youngpreneur Indonesia a non-exclusive, worldwide irrevocable, sub licensable license to use, reproduce, adapt, publish, translate and distribute it in any and all media.
        </p>
        <p class="content-color mb-0">
          Your Content must be your own and must not be invading any third-party’s rights. Youngpreneur Indonesia reserves the right to remove any of Your Content from this Website at any time without notice.
        </p>
      </section>
      <!-- Your Content Section End -->
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
