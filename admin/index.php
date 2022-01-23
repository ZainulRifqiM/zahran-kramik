<?php
session_start();
if (!isset($_SESSION["login"])) {
    header("Location: login.php");
    exit;
}
ob_start();
require "functions.php";


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <link rel="apple-touch-icon" sizes="105x105" href="assets/img/smpn_32_bandung.png">
    <link rel="icon" type="image/png" href="assets/img/favicon.png">

    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <!-- <link rel="icon" href="../img/smpn32bandung.png"> -->
    <title>
        Zahran Keramik
    </title>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
    <!--     Fonts and icons     -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
    <!-- CSS Files -->
    <link href="../assets/css/bootstrap.min.css" rel="stylesheet" />
    <link href="../assets/css/paper-dashboard.css?v=2.0.1" rel="stylesheet" />
    <!-- CSS Just for demo purpose, don't include it in your project -->
    <link href="../assets/demo/demo.css" rel="stylesheet" />
    <link href="../assets/css/my.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
</head>

<body class="">
    <div class="wrapper ">
        <div class="sidebar" data-color="white" data-active-color="danger">
            <div class="logo">
                <a href="" class="simple-text logo-mini">
                    <!-- <span class="nc-icon nc-planet" style="font-size: 30px;"></span> -->
                    <!-- <img src="../img/smpn32bandung.png" alt="" style="width: 40px;" class=""> -->
                </a>
                <a href="" class="simple-text logo-normal">
                    Zahran Keramik
                </a>
            </div>
            <div class="sidebar-wrapper">
                <ul class="nav">
                    <li>
                        <a href="index.php">
                            <i class="fas fa-home text-light"></i>
                            <!-- <i class="nc-icon nc-bank"></i> -->
                            <p>Dashboard</p>
                        </a>
                    </li>

                    <li>
                        <a href="index.php?halaman=table-kramik">
                            <i class="fas fa-square text-light"></i>
                            <!-- <i class="nc-icon nc-spaceship text-warning"></i> -->
                            <p>Keramik</p>
                        </a>
                    </li>
                    <li>
                        <a href="index.php?halaman=table-sales">
                            <i class="fas fa-user-check text-light"></i>
                            <!-- <i class="nc-icon nc-sun-fog-29 text-success"></i> -->
                            <p>Sales</p>
                        </a>
                    </li>
                    <li>
                        <a href="index.php?halaman=table-pembeli">
                            <i class="fas fa-users text-light"></i>
                            <!-- <i class="nc-icon nc-glasses-2 text-danger"></i> -->
                            <p>Pembeli</p>
                        </a>
                    </li>
                    <li>
                        <a href="index.php?halaman=table-transaksi">
                            <i class="fas fa-people-arrows text-light"></i>
                            <!-- <i class="nc-icon nc-glasses-2 text-danger"></i> -->
                            <p>Transaksi</p>
                        </a>
                    </li>
                    <li>
                        <a href="index.php?halaman=table-pembayaran">
                            <i class="fas fa-credit-card text-light"></i>
                            <!-- <i class="nc-icon nc-glasses-2 text-danger"></i> -->
                            <p>Pembayaran</p>
                        </a>
                    </li>

                    <li>
                        <a href="index.php?halaman=backup">
                            <i class="fas fa-download text-light"></i>
                            <!-- <i class="nc-icon nc-glasses-2 text-danger"></i> -->
                            <p>Back-up Transaksi</p>
                        </a>
                    </li>


                </ul>
            </div>
        </div>
        <div class="main-panel">
            <!-- Navbar -->
            <nav class="navbar navbar-expand-lg navbar-absolute fixed-top navbar-transparent">
                <div class="container-fluid">
                    <div class="navbar-wrapper">
                        <div class="navbar-toggle">
                            <button type="button" class="navbar-toggler">
                                <span class="navbar-toggler-bar bar1"></span>
                                <span class="navbar-toggler-bar bar2"></span>
                                <span class="navbar-toggler-bar bar3"></span>
                            </button>
                        </div>
                    </div>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-bar navbar-kebab"></span>
                        <span class="navbar-toggler-bar navbar-kebab"></span>
                        <span class="navbar-toggler-bar navbar-kebab"></span>
                    </button>
                    <div class="collapse navbar-collapse justify-content-end" id="navigation">
                        <ul class="navbar-nav">

                            <li class="nav-item btn-rotate dropdown">
                                <a class="nav-link dropdown-toggle" href="http://example.com" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <!-- <i class="nc-icon nc-button-power"></i> -->
                                    <i class="fas fa-power-off text-secondary"></i>

                                </a>
                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                                    <a class="dropdown-item" href="logout.php">Logout</a>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
            <!-- End Navbar -->

            <div class="content">
                <?php
                if (isset($_GET['halaman'])) {
                    if ($_GET['halaman'] == 'table-kramik') {
                        include 'table-kramik.php';
                    } else if ($_GET['halaman'] == 'table-sales') {
                        include 'table-sales.php';
                    } else if ($_GET['halaman'] == 'table-pembeli') {
                        include 'table-pembeli.php';
                    } else if ($_GET['halaman'] == 'table-transaksi') {
                        include 'table-transaksi.php';
                    } else if ($_GET['halaman'] == 'table-pembayaran') {
                        include 'table-pembayaran.php';
                    } else if ($_GET['halaman'] == 'table-kramik-hapus') {
                        include 'table-kramik-hapus.php';
                    } else if ($_GET['halaman'] == 'table-sales-hapus') {
                        include 'table-sales-hapus.php';
                    } else if ($_GET['halaman'] == 'table-pembeli-hapus') {
                        include 'table-pembeli-hapus.php';
                    } else if ($_GET['halaman'] == 'table-transaksi-hapus') {
                        include 'table-transaksi-hapus.php';
                    } else if ($_GET['halaman'] == 'table-pembayaran-hapus') {
                        include 'table-pembayaran-hapus.php';
                    } else if ($_GET['halaman'] == 'table-kramik-edit') {
                        include 'table-kramik-edit.php';
                    } else if ($_GET['halaman'] == 'table-sales-edit') {
                        include 'table-sales-edit.php';
                    } else if ($_GET['halaman'] == 'table-pembeli-edit') {
                        include 'table-pembeli-edit.php';
                    } else if ($_GET['halaman'] == 'table-transaksi-edit') {
                        include 'table-transaksi-edit.php';
                    } else if ($_GET['halaman'] == 'table-pembayaran-edit') {
                        include 'table-pembayaran-edit.php';
                    } else if ($_GET['halaman'] == 'table-kramik-tambah') {
                        include 'table-kramik-tambah.php';
                    } else if ($_GET['halaman'] == 'table-pembeli-tambah') {
                        include 'table-pembeli-tambah.php';
                    } else if ($_GET['halaman'] == 'table-sales-tambah') {
                        include 'table-sales-tambah.php';
                    } else if ($_GET['halaman'] == 'table-transaksi-tambah') {
                        include 'table-transaksi-tambah.php';
                    } else if ($_GET['halaman'] == 'table-pembayaran-tambah') {
                        include 'table-pembayaran-tambah.php';
                    } else if ($_GET['halaman'] == 'backup') {
                        include 'backup.php';
                    }
                } else {
                    include 'dashboard.php';
                }
                ?>
            </div>

            <!-- <footer class="footer footer-black  footer-white ">
                <div class="container-fluid">
                    <div class="row">
                        <div class="credits ml-auto">
                            <span class="copyright">
                                © <script>
                                    document.write(new Date().getFullYear())
                                </script>, made with <i class="fa fa-heart heart text-danger"></i> by Basdat2IF2-Penjualan-2021
                            </span>
                        </div>
                    </div>
                </div>
            </footer> -->
        </div>
    </div>
    <!--   Core JS Files   -->
    <script src="../assets/js/core/jquery.min.js"></script>
    <script src="../assets/js/core/popper.min.js"></script>
    <script src="../assets/js/core/bootstrap.min.js"></script>
    <script src="../assets/js/plugins/perfect-scrollbar.jquery.min.js"></script>
    <!--  Google Maps Plugin    -->
    <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>
    <!-- Chart JS -->
    <script src="../assets/js/plugins/chartjs.min.js"></script>
    <!--  Notifications Plugin    -->
    <script src="../assets/js/plugins/bootstrap-notify.js"></script>
    <!-- Control Center for Now Ui Dashboard: parallax effects, scripts for the example pages etc -->
    <script src="../assets/js/paper-dashboard.min.js?v=2.0.1" type="text/javascript"></script><!-- Paper Dashboard DEMO methods, don't include it in your project! -->
    <script src="../assets/demo/demo.js"></script>
    <script>
        $(document).ready(function() {
            // Javascript method's body can be found in assets/assets-for-demo/js/demo.js
            demo.initChartsPages();
        });
    </script>
</body>

</html>
<?php ob_flush(); ?>