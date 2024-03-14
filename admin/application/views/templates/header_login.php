<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags-->
    <meta charset="UTF-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1, shrink-to-fit=no"
    />
    <meta name="description" content="au theme template" />
    <meta name="author" content="Hau Nguyen" />
    <meta name="keywords" content="au theme template" />

    <!-- Title Page-->
    <title><?php echo $judul; ?></title>

    <!-- Main CSS -->
    <!-- <link href="css/theme.css" rel="stylesheet" media="all" />  -->
    <!-- Fontfaces CSS-->
    <link href="<?php echo base_url('css/font-face.css'); ?>" rel="stylesheet" media="all" />
    <link href="<?php echo base_url('vendor/font-awesome-4.7/css/font-awesome.min.css'); ?>" rel="stylesheet" media="all" />
    <link href="<?php echo base_url('vendor/font-awesome-5/css/fontawesome-all.min.css'); ?>" rel="stylesheet" media="all" />
    <link href="<?php echo base_url('vendor/mdi-font/css/material-design-iconic-font.min.css'); ?>" rel="stylesheet" media="all" />

    <!-- Bootstrap CSS-->
    <link href="<?php echo base_url('vendor/bootstrap-4.1/bootstrap.min.css'); ?>" rel="stylesheet" media="all" />

    <!-- Vendor CSS-->
    <link href="<?php echo base_url('vendor/animsition/animsition.min.css'); ?>" rel="stylesheet" media="all" />
    <link href="<?php echo base_url('vendor/bootstrap-progressbar/bootstrap-progressbar-3.3.4.min.css'); ?>" rel="stylesheet" media="all" />
    <link href="<?php echo base_url('vendor/wow/animate.css'); ?>" rel="stylesheet" media="all" />
    <link href="<?php echo base_url('vendor/css-hamburgers/hamburgers.min.css'); ?>" rel="stylesheet" media="all" />
    <link href="<?php echo base_url('vendor/slick/slick.css'); ?>" rel="stylesheet" media="all" />
    <link href="<?php echo base_url('vendor/select2/select2.min.css'); ?>" rel="stylesheet" media="all" />
    <link href="<?php echo base_url('vendor/perfect-scrollbar/perfect-scrollbar.css'); ?>" rel="stylesheet" media="all" />

    <!-- Main CSS-->
    <link href="<?php echo base_url('css/theme.css'); ?>" rel="stylesheet" media="all" />

  </head>

  <body class="animsition">
    <div class="page-wrapper">
      <!-- HEADER MOBILE-->
      <!-- <header class="header-mobile d-block d-lg-none">
        <div class="header-mobile__bar">
          <div class="container-fluid">
            <div class="header-mobile-inner">
              <a class="logo" href="<?= base_url(); ?>">
                <img
                  width="70px"
                  src="https://www.swa-jkt.com/uploads/logo/logo.png"
                  alt="SWA"
                />
              </a>
              <button class="hamburger hamburger--slider" type="button">
                <span class="hamburger-box">
                  <span class="hamburger-inner"></span>
                </span>
              </button>
            </div>
          </div>
        </div>
        <nav class="navbar-mobile">
          <div class="container-fluid">
            <ul class="navbar-mobile__list list-unstyled">
              <li <?php if (strpos($judul, 'Category') !== false) { echo 'class="active"'; } ?>>
                  <a href="<?= base_url(); ?>category"> <i class="fas fa-th"></i>Category</a>
              </li>
              <li <?php if (strpos($judul, 'Product') !== false) { echo 'class="active"'; } ?>>
                  <a href="<?= base_url(); ?>product">
                      <i class="fas fa-briefcase"></i>Product
                  </a>
              </li>
              <li <?php if (strpos($judul, 'PO Purchase') !== false) { echo 'class="active"'; } ?>>
                  <a href="<?= base_url(); ?>po_meal">
                      <i class="fas fa-shopping-cart"></i>PO Purchase Meal
                  </a>
              </li>
              <li <?php if (strpos($judul, 'Report') !== false) { echo 'class="active"'; } ?>>
                  <a href="<?= base_url(); ?>report">
                      <i class="fas fa-file-text"></i>Report
                  </a>
              </li>
              <li class="has-sub">
                <a class="js-arrow" href="#">
                  <i class="fas fa-user"></i>Profile</a
                >
                <ul class="navbar-mobile-sub__list list-unstyled js-sub-list">
                  <li>
                    <a href="login.html">Login</a>
                  </li>
                  <li>
                    <a href="register.html">Register</a>
                  </li>
                  <li>
                    <a href="forget-pass.html">Forget Password</a>
                  </li>
                  <li>
                    <a href="logout.html">Logout</a>
                  </li>
                </ul>
              </li>
            </ul>
          </div>
        </nav>
      </header> -->
      <!-- END HEADER MOBILE-->

      <!-- MENU SIDEBAR-->
      <!-- <aside class="menu-sidebar d-none d-lg-block">
        <div class="logo">
          <a href="#">
            <img
              width="70px"
              src="https://www.swa-jkt.com/uploads/logo/logo.png"
              alt="SWA"
            />
          </a>
        </div>
        <div class="menu-sidebar__content js-scrollbar1">
          <nav class="navbar-sidebar">
            <ul class="list-unstyled navbar__list">
              <li <?php if (strpos($judul, 'Category') !== false) { echo 'class="active"'; } ?>>
                <a href="<?= base_url(); ?>category"> <i class="fas fa-th"></i>Category</a>
              </li>
              <li <?php if (strpos($judul, 'Product') !== false) { echo 'class="active"'; } ?>>
                <a href="<?= base_url(); ?>product">
                  <i class="fas fa-briefcase"></i>Product</a
                >
              </li>
              <li <?php if (strpos($judul, 'PO Purchase') !== false) { echo 'class="active"'; } ?>>
                <a href="<?= base_url(); ?>po_meal">
                  <i class="fas fa-shopping-cart"></i>PO Purchase</a
                >
              </li>
              <li <?php if (strpos($judul, 'Report') !== false) { echo 'class="active"'; } ?>>
                <a href="<?= base_url(); ?>report">
                  <i class="fas fa-file-text"></i>Report</a
                >
              </li>
              <li class="has-sub">
                <a class="js-arrow" href="#">
                  <i class="fas fa-user"></i>Profile</a
                >
                <ul class="list-unstyled navbar__sub-list js-sub-list">
                  <li>
                    <a href="login.html">Login</a>
                  </li>
                  <li>
                    <a href="register.html">Register</a>
                  </li>
                  <li>
                    <a href="forget-pass.html">Forget Password</a>
                  </li>
                  <li>
                    <a href="logout.html">Logout</a>
                  </li>
                </ul>
              </li>
            </ul>
          </nav>
        </div>
      </aside> -->
      <!-- END MENU SIDEBAR-->

      <!-- PAGE CONTAINER-->
      <!-- <div class="page-container"> -->
        <!-- HEADER DESKTOP-->
        <!-- <header class="header-desktop">
          <div class="section__content section__content--p30">
            <div class="container-fluid">
              <div class="header-wrap">
                <form class="form-header" action="" method="POST">
                </form>
                <div class="header-button">
                  <div class="noti-wrap">
                  </div>
                  <div class="account-wrap">
                    <div class="account-item clearfix js-item-menu">
                      <div class="content">
                        <a class="js-acc-btn" href="#">john doe</a>
                      </div>
                      <div class="account-dropdown js-dropdown">
                        <div class="info clearfix">
                          <div class="content">
                            <h5 class="name">
                              <a href="#">john doe</a>
                            </h5>
                            <span class="email">johndoe@example.com</span>
                          </div>
                        </div>
                        <div class="account-dropdown__footer">
                          <a href="#"> <i class="zmdi zmdi-power"></i>Logout</a>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </header> -->
        <!-- END HEADER DESKTOP-->      