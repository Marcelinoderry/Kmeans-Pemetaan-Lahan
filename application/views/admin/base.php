<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
    <link rel="shortcut icon" href="<?= assets_url() ?>map.png">

    <!-- begin:: css universal -->
    <link rel="stylesheet" type="text/css" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" />
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Open+Sans:400,600" />
    <link rel="stylesheet" type="text/css" href="<?= assets_url() ?>admin/bower_components/bootstrap/css/bootstrap.min.css" />
    <link rel="stylesheet" type="text/css" href="<?= assets_url() ?>admin/assets/icon/feather/css/feather.css" />
    <link rel="stylesheet" type="text/css" href="<?= assets_url() ?>admin/assets/css/style.css" />
    <link rel="stylesheet" type="text/css" href="<?= assets_url() ?>admin/assets/css/jquery.mCustomScrollbar.css" />
    <!-- end:: css universal -->

    <!-- begin:: css local -->
    <?php empty($css) ? '' : $this->load->view($css); ?>
    <!-- end:: css local -->

    <script type="text/javascript" src="<?= assets_url() ?>admin/bower_components/jquery/js/jquery.min.js"></script>
</head>

<body>
    <!-- Pre-loader start -->
    <div class="theme-loader">
        <div class="ball-scale">
            <div class='contain'>
                <div class="ring">
                    <div class="frame"></div>
                </div>
                <div class="ring">
                    <div class="frame"></div>
                </div>
                <div class="ring">
                    <div class="frame"></div>
                </div>
                <div class="ring">
                    <div class="frame"></div>
                </div>
                <div class="ring">
                    <div class="frame"></div>
                </div>
                <div class="ring">
                    <div class="frame"></div>
                </div>
                <div class="ring">
                    <div class="frame"></div>
                </div>
                <div class="ring">
                    <div class="frame"></div>
                </div>
                <div class="ring">
                    <div class="frame"></div>
                </div>
                <div class="ring">
                    <div class="frame"></div>
                </div>
            </div>
        </div>
    </div>

    <!-- Pre-loader end -->
    <div id="pcoded" class="pcoded">
        <div class="pcoded-overlay-box"></div>
        <div class="pcoded-container navbar-wrapper">
            <!-- Navbar Top -->
            <nav class="navbar header-navbar pcoded-header">
                <div class="navbar-wrapper">
                    <!-- Mobile View -->
                    <div class="navbar-logo">
                        <a class="mobile-menu" id="mobile-collapse" href="#!">
                            <i class="feather icon-menu"></i>
                        </a>
                        <a href="index.html">
                            <h5>Sistem Informasi</h5>
                        </a>
                        <a class="mobile-options">
                            <i class="feather icon-more-horizontal"></i>
                        </a>
                    </div>

                    <div class="navbar-container container-fluid">
                        <ul class="nav-left">
                            <li class="header-search">
                                <div class="main-search morphsearch-search">
                                    <div class="input-group">
                                        <span class="input-group-addon search-close"><i class="feather icon-x"></i></span>
                                        <input type="text" class="form-control">
                                        <span class="input-group-addon search-btn"><i class="feather icon-search"></i></span>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <a href="#!" onclick="javascript:toggleFullScreen()">
                                    <i class="feather icon-maximize full-screen"></i>
                                </a>
                            </li>
                        </ul>
                        <ul class="nav-right">
                            <li class="user-profile header-notification">
                                <div class="dropdown-primary dropdown">
                                    <div class="dropdown-toggle" data-toggle="dropdown">
                                        <span>Admin</span>
                                        <i class="feather icon-chevron-down"></i>
                                    </div>
                                    <ul class="show-notification profile-notification dropdown-menu" data-dropdown-in="fadeIn" data-dropdown-out="fadeOut">
                                        <li>
                                            <a href="#">
                                                <i class="feather icon-user"></i> Profile
                                            </a>
                                        </li>
                                        <li>
                                            <a href="<?= logout_url() ?>">
                                                <i class="feather icon-log-out"></i> Logout
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>

            <div class="pcoded-main-container">
                <div class="pcoded-wrapper">
                    <!-- begin:: navbar left -->
                    <nav class="pcoded-navbar">
                        <div class="pcoded-inner-navbar main-menu">
                            <div class="pcoded-navigatio-lavel">Home</div>
                            <ul class="pcoded-item pcoded-left-item">
                                <li class="">
                                    <a href="<?= admin_url() ?>dashboard">
                                        <span class="pcoded-micon"><i class="feather icon-home"></i></span>
                                        <span class="pcoded-mtext">Dashboard</span>
                                    </a>
                                </li>
                            </ul>
                            <div class="pcoded-navigatio-lavel">Master</div>
                            <ul class="pcoded-item pcoded-left-item">
                                <li class="">
                                    <a href="<?= admin_url() ?>perkebunan">
                                        <span class="pcoded-micon"><i class="feather icon-home"></i></span>
                                        <span class="pcoded-mtext">Perkebunan</span>
                                    </a>
                                </li>
                                <li class="">
                                    <a href="<?= admin_url() ?>kecamatan">
                                        <span class="pcoded-micon"><i class="feather icon-home"></i></span>
                                        <span class="pcoded-mtext">Kecamatan</span>
                                    </a>
                                </li>
                            </ul>
                            <div class="pcoded-navigatio-lavel">Pustaka</div>
                            <ul class="pcoded-item pcoded-left-item">
                                <li class="">
                                    <a href="<?= admin_url() ?>komoditas">
                                        <span class="pcoded-micon"><i class="feather icon-home"></i></span>
                                        <span class="pcoded-mtext">Komoditas</span>
                                    </a>
                                </li>
                                <li class="">
                                    <a href="<?= admin_url() ?>peta">
                                        <span class="pcoded-micon"><i class="feather icon-home"></i></span>
                                        <span class="pcoded-mtext">Pemetaan</span>
                                    </a>
                                </li>
                            </ul>
                            <div class="pcoded-navigatio-lavel">Metode</div>
                            <ul class="pcoded-item pcoded-left-item">
                                <li class="">
                                    <a href="<?= admin_url() ?>algoritma">
                                        <span class="pcoded-micon"><i class="feather icon-home"></i></span>
                                        <span class="pcoded-mtext">Algoritma</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </nav>
                    <!-- end:: navbar left -->
                    <!-- begin:: content -->
                    <div class="pcoded-content">
                        <div class="pcoded-inner-content">
                            <div class="main-body">
                                <div class="page-wrapper">
                                    <?php $this->load->view($content); ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end:: content -->
                </div>
            </div>
        </div>
    </div>

    <!-- begin:: js universal -->
    <script type="text/javascript" src="<?= assets_url() ?>admin/bower_components/jquery-ui/js/jquery-ui.min.js"></script>
    <script type="text/javascript" src="<?= assets_url() ?>admin/bower_components/popper.js/js/popper.min.js"></script>
    <script type="text/javascript" src="<?= assets_url() ?>admin/bower_components/bootstrap/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="<?= assets_url() ?>admin/bower_components/jquery-slimscroll/js/jquery.slimscroll.js"></script>
    <script type="text/javascript" src="<?= assets_url() ?>admin/bower_components/modernizr/js/modernizr.js"></script>
    <script type="text/javascript" src="<?= assets_url() ?>admin/bower_components/chart.js/js/Chart.js"></script>
    <script type="text/javascript" src="<?= assets_url() ?>admin/assets/pages/widget/amchart/amcharts.js"></script>
    <script type="text/javascript" src="<?= assets_url() ?>admin/assets/pages/widget/amchart/serial.js"></script>
    <script type="text/javascript" src="<?= assets_url() ?>admin/assets/pages/widget/amchart/light.js"></script>
    <script type="text/javascript" src="<?= assets_url() ?>admin/assets/js/jquery.mCustomScrollbar.concat.min.js"></script>
    <script type="text/javascript" src="<?= assets_url() ?>admin/assets/js/SmoothScroll.js"></script>
    <script type="text/javascript" src="<?= assets_url() ?>admin/assets/js/pcoded.min.js"></script>
    <script type="text/javascript" src="<?= assets_url() ?>admin/assets/js/vartical-layout.min.js"></script>
    <script type="text/javascript" src="<?= assets_url() ?>admin/assets/pages/dashboard/custom-dashboard.js"></script>
    <script type="text/javascript" src="<?= assets_url() ?>admin/assets/js/script.min.js"></script>
    <!-- cdn -->
    <script async="" src="https://www.googletagmanager.com/gtag/js?id=UA-23581568-13"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());

        gtag('config', 'UA-23581568-13');
    </script>
    <!-- end:: js universal -->

    <!-- begin:: js local -->
    <?php empty($js) ? '' : $this->load->view($js); ?>
    <!-- end:: js local -->
</body>

</html>