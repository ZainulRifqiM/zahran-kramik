<?php
require 'admin/functions.php';
$kramikLantai = query("SELECT * FROM barang WHERE kategori='Lantai 50x50'");
$kramikLantai2 = query("SELECT * FROM barang WHERE kategori='Lantai 40x40'");
$kramikWc = query("SELECT * FROM barang WHERE kategori='Lantai WC'");
$kramikDinding = query("SELECT * FROM barang WHERE kategori='Keramik Dinding'");
?>

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="assets/css/katalog.css">
    <!-- Play fair display font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@700&display=swap" rel="stylesheet">
    <!-- roboto -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@700&display=swap" rel="stylesheet">

    <title>Katalog Zahran Keramik</title>
</head>

<body>
    <!-- start of navbar -->
    <nav class="navbar navbar-expand-lg navbar-light ">
        <div class="container-fluid">
            <a class="navbar-brand" href="index.php">ZAHRAN<br>KERAMIK</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="index.php">Utama</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="katalog.php">Katalog</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="https://wa.me/6283817327542">Kontak</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link">Lokasi</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- end of navbar -->
    <!-- Content -->
    <div class="container">
        <div class="row">
            <h3 class="tag-pop mb-2 mt-5"><u>Keramik Pilihan</u> </h3>
            <?php foreach( $kramikLantai as $row ) : ?>
            <!-- Row 1 -->
            <div class="card col-lg-3 col-md-3 col-sm-6 mx-3 mt-4" style="width: 18rem;">
                <img src="assets/img/<?= $row["gambar"]; ?>" class="card-img-top mt-3" alt="...">
                <div class="card-body">
                    <h5 class="card-title"><?= $row['NamaBarang']?></h5>
                    <p class="card-text"><?= $row['kategori']?></p>
                    <h6 class="card-subtitle text-muted">Rp<?= number_format($row['HargaSatuan'],0,',','.')?>/pcs</h6>
                    <a href="https://wa.me/6283817327542?text=Haloo Pak/Bu, saya%20ingin%20membeli%20keramik%20yang%20<?= $row['NamaBarang']?>%20kategori%20<?= $row['kategori']?>"
                        <?= $row['NamaBarang']?>" class="btn btn-light mt-3">Pesan</a>
                </div>
            </div>
            <?php endforeach; ?>
        </div>

        <div class="row">
            <div class="col-6">
                <h3 class="tag-pop mb-2 mt-5">Keramik Lainnya</h3>
            </div>
            <div class="col-6 text-end mb-2 mt-5">
                <button class="btn btn-light" type="button" data-bs-target="#carouselExampleControls"
                    data-bs-slide="prev">
                    <span class="bi bi-chevron-left"></span>
                </button>
                <button class="btn btn-light" type="button" data-bs-target="#carouselExampleControls"
                    data-bs-slide="next">
                    <span class="bi bi-chevron-right"></span>
                </button>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <div class="col-12">
            <div id="carouselExampleControls" class="carousel slide justify-content-center" data-bs-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <div class="row justify-content-center">
                            <?php foreach( $kramikWc as $wc ) : ?>
                            <div class="card col-lg-2 col-md-3 col-sm-6 mx-1 mt-4" style="width: 18rem;">
                                <img src="assets/img/<?= $wc["gambar"]; ?>" class="card-img-top mt-3" alt="...">
                                <div class="card-body">
                                    <h5 class="card-title"><?= $wc['NamaBarang']?></h5>
                                    <p class="card-text"><?= $wc['kategori']?></p>
                                    <h6 class="card-subtitle text-muted">
                                        Rp<?= number_format($wc['HargaSatuan'],0,',','.')?>/pcs</h6>
                                </div>

                            </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <div class="row justify-content-center">
                            <?php foreach( $kramikDinding as $dinding ) : ?>
                            <div class="card col-lg-2 col-md-3 col-sm-6 mx-1 mt-4" style="width: 18rem;">
                                <img src="assets/img/<?= $dinding["gambar"]; ?>" class="card-img-top mt-3" alt="...">
                                <div class="card-body">
                                    <h5 class="card-title"><?= $dinding['NamaBarang']?></h5>
                                    <p class="card-text"><?= $dinding['kategori']?></p>
                                    <h6 class="card-subtitle text-muted">
                                        Rp<?= number_format($dinding['HargaSatuan'],0,',','.')?>/pcs</h6>
                                </div>
                            </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <div class="row justify-content-center">
                            <?php foreach( $kramikLantai2 as $row ) : ?>
                            <div class="card col-lg-2 col-md-3 col-sm-6 mx-1 mt-4" style="width: 18rem;">
                                <img src="assets/img/<?= $row["gambar"]; ?>" class="card-img-top mt-3" alt="...">
                                <div class="card-body">
                                    <h5 class="card-title"><?= $row['NamaBarang']?></h5>
                                    <p class="card-text"><?= $row['kategori']?></p>
                                    <h6 class="card-subtitle text-muted">
                                        Rp<?= number_format($row['HargaSatuan'],0,',','.')?>/pcs</h6>
                                </div>
                            </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        <br>
        <div class="col-12">
            <h6 class="text-muted fst-italic">Note : untuk pembelian keramik lainnya bisa hubungi via WhatsApp di nomor
                0838-1732-7542 atau bisa klik pada halaman Kontak diatas
            </h6>
        </div>
        <br>
    </div>



</body>


<!-- end content -->


<!-- Optional JavaScript; choose one of the two! -->

<!-- Option 1: Bootstrap Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
</script>

<!-- Option 2: Separate Popper and Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"
    integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous">
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"
    integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous">
</script>

<!-- icon -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">

</body>

</html>