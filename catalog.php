<?php
require 'admin/functions.php';
$kramikLantai = query("SELECT * FROM barang WHERE kategori='Lantai 50x50' OR kategori='Lantai 40x40'");
$kramikWc = query("SELECT * FROM barang WHERE kategori='Lantai WC'");
$kramikDinding = query("SELECT * FROM barang WHERE kategori='Keramik Dinding'");

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@600&display=swap" rel="stylesheet" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Karla:ital,wght@0,200;1,200&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/catalog.css" />

    <title>Hello, world!</title>
  </head>
  <body>
    <!-- Awal navbar  -->
    <nav class="navbar navbar-expand-lg navbar-dark shadow-sm fixed-top color-g">
      <div class="container">
        <a class="navbar-brand font-quicksand" href="#">Zahran Kramik</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav ms-auto">
            <li class="nav-item ms-4 me-4">
              <a class="nav-link" aria-current="page" href="#">Home</a>
            </li>
            <li class="nav-item ms-4 me-4">
              <a class="nav-link" href="#catalogue">Catalogue</a>
            </li>
            <li class="nav-item ms-3">
              <a class="nav-link" href="#contact">Contact</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
    <!-- Akhir navbar -->

    <!-- Jumbotron -->
    <section class="jumbotron">
      <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-indicators">
          <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
          <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
          <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
        </div>
        <div class="carousel-inner">
          <div class="carousel-item active">
            <img src="img/1.jpg" class="d-block w-100 corosal" alt="..." />
            <div class="carousel-caption d-none d-md-block">
              <h5>Zahran Kramik</h5>
              <p>Kab. Cianjur Kec. Cipanas Desa Cipanas Kp. Pasekon Gang SDN Cipanas 04 RT02 RW16</p>
            </div>
          </div>
          <div class="carousel-item">
            <img src="img/2.jpg" class="d-block w-100 corosal" alt="..." />
            <div class="carousel-caption d-none d-md-block">
              <h5>Zahran Kramik</h5>
              <p>Kab. Cianjur Kec. Cipanas Desa Cipanas Kp. Pasekon Gang SDN Cipanas 04 RT02 RW16</p>
            </div>
          </div>
          <div class="carousel-item">
            <img src="img/3.jpg" class="d-block w-100 corosal" alt="..." />
            <div class="carousel-caption d-none d-md-block">
              <h5>Zahran Kramik</h5>
              <p>Kab. Cianjur Kec. Cipanas Desa Cipanas Kp. Pasekon Gang SDN Cipanas 04 RT02 RW16</p>
            </div>
          </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Next</span>
        </button>
      </div>
    </section>
    <!-- AKhir Jumbotron -->

    <!-- Awal Catalogue -->
    <section id="catalogue" class="catalogue">
      <div class="container">
        <div class="row text-center mb-5">
          <div class="col">
            <h2>Catalogue</h2>
          </div>
        </div>
        
        <div class="row justify-content-center fs-5">
        <?php foreach( $kramikLantai as $row ) : ?>
          <div class="col-md-3 p-3 ">
            <div class="border border-light katalog">
            <div class="">
              <img src="assets/img/<?= $row["gambar"]; ?>"  class="card" style="width: 18rem;" style="width: 300px; height: 300px">
              <!-- <img src="img/a.jpg" alt="" class="card" style="width: 18rem;" style="width: 300px; height: 300px" /> -->
            </div>
            <div class="card-body">
              <h5 class="card-title"><?= $row['NamaBarang']?></h5>
              <p class="font-ket2">Rp. <?= $row['HargaSatuan']?></p>
            </div>
            
          </div>
          
          </div>
          <?php endforeach; ?>

      <div class="container mt-3">
      <div class="row mb-3">
        <div class="col">
          <h4>Kramik Lantai WC</h4>
        </div>
      </div>

      <div class="row justify-content-center fs-5 mb-5">
      <?php foreach( $kramikWc as $wc ) : ?>
        <div class="col-md-2 p-2 ">
          <div class="border border-light katalog">
          <div class="">
          <img src="assets/img/<?= $wc["gambar"]; ?>"  class="card" style="width: 12rem;">
            <!-- <img src="img/2.png" alt="" class="card" style="width: 12rem;" /> -->
          </div>
          <div class="card-body">
          <h6 class="card-title"><?= $wc['NamaBarang']?></h6>
            <p class="font-ket">Rp. <?= $wc['HargaSatuan']?></p>
          </div>
        </div>
        </div>
        <?php endforeach; ?>
      
        <div class="container mt-3">
        <div class="row mb-3">
          <div class="col">
            <h4>Kramik Dinding</h4>
          </div>
        </div>

      <div class="row justify-content-center fs-5">
      <?php foreach( $kramikDinding as $dinding ) : ?>
        <div class="col-md-2 p-2 ">
          <div class="border border-light katalog">
          <div class="">
          <img src="assets/img/<?= $dinding["gambar"]; ?>"  class="card" style="width: 12rem;">
            <!-- <img src="img/2.png" alt="" class="card" style="width: 12rem;" /> -->
          </div>
          <div class="card-body">
          <h5 class="card-title"><?= $dinding['NamaBarang']?></h5>
            <p class="font-ket">Rp. <?= $dinding['HargaSatuan']?></p>
          </div>
        </div>
        </div>
        <?php endforeach; ?>

        </div>
    </section>
    <!-- Akhir Catalogue -->

    <?php require"footer.php" ?>

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  </body>
</html>