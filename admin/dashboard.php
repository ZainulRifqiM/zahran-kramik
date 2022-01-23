<?php
// Menghitung Total Pelanggan
$count_barang = "SELECT COUNT(*) AS total FROM barang";
$result_barang = $conn->query($count_barang);
$total_barang = mysqli_fetch_assoc($result_barang);

// // Menghitung Total genre
$count_pembeli = "SELECT COUNT(*) AS total FROM pembeli";
$result_pembeli = $conn->query($count_pembeli);
$total_pembeli = mysqli_fetch_assoc($result_pembeli);

// // Menghitung Total sutradara
$count_transaksi = "SELECT COUNT(*) AS total FROM transaksi";
$result_transaksi = $conn->query($count_transaksi);
$total_transaksi = mysqli_fetch_assoc($result_transaksi);
?>

<h3 style="color: #66615B;">Dashboard Zahran Kramik</h3>
<div class="row">
    <div class="col-lg-4 col-md-6 col-sm-6">
        <a href=" index.php?halaman=table-guru">
            <div class="card card-stats">
                <div class="card-body ">
                    <div class="row">
                        <div class="col-5 col-md-4">
                            <div class="icon-big text-center icon-warning">
                                <!-- <i class="nc-icon nc-spaceship text-warning"></i> -->
                                <i class="fas fa-user-check text-primary"></i>
                            </div>
                        </div>
                        <div class="col-7 col-md-8">
                            <div class="numbers">
                                <p class="card-category">Jumlah Barang</p>
                                <p class="card-title"><?= $total_barang['total'] ?>
                                <p>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </a>
    </div>
    <div class="col-lg-4 col-md-6 col-sm-6">
        <a href="index.php?halaman=table-sarana">
            <div class="card card-stats">
                <div class="card-body ">
                    <div class="row">
                        <div class="col-5 col-md-4">
                            <div class="icon-big text-center icon-warning">
                                <!-- <i class="nc-icon nc-sun-fog-29 text-success"></i> -->
                                <i class="fas fa-users text-success"></i>
                            </div>
                        </div>
                        <div class="col-7 col-md-8">
                            <div class="numbers">
                                <p class="card-category">Jumlah Pembeli</p>
                                <p class="card-title"><?= $total_pembeli['total'] ?>
                                <p>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </a>
    </div>
    <div class="col-lg-4 col-md-6 col-sm-6">
        <a href="index.php?halaman=table-ekstrakurikuler">
            <div class="card card-stats">
                <div class="card-body ">
                    <div class="row">
                        <div class="col-5 col-md-4">
                            <div class="icon-big text-center icon-warning">
                                <!-- <i class="nc-icon nc-glasses-2 text-danger"></i> -->
                                <i class="fas fa-people-arrows text-warning"></i>
                            </div>
                        </div>
                        <div class="col-7 col-md-8">
                            <div class="numbers">
                                <p class="card-category">Jumlah Transaksi</p>
                                <p class="card-title"><?= $total_transaksi['total'] ?>
                                <p>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </a>
    </div>

</div>