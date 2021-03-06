<?php
session_start();
if (isset($_SESSION["login"])) {
  header("Location: index.php");
  exit;
}

require 'functions.php';
if (isset($_POST["login"])) {

  $username = $_POST["username"];
  $password = $_POST["password"];

  $result = mysqli_query($conn, "SELECT * FROM user WHERE username = '$username'");

  // cek username
  if (mysqli_num_rows($result) === 1) {

    // cek password
    $row = mysqli_fetch_assoc($result);

    if (password_verify($password, $row["password"])) {
      // set session
      $_SESSION["login"] = true;

      header("Location: index.php");
      exit;
    }
  }

  $error = true;
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta http-equiv="X-UA-Compatible" content="ie=edge" />
  <link rel="icon" href="../assets/img/logo.png" type="image/gif" sizes="16x16">
  <title>Zahran Kramik - Login</title>
  <link href="https://fonts.googleapis.com/css?family=Karla:400,700&display=swap" rel="stylesheet" />
  <link rel="stylesheet" href="https://cdn.materialdesignicons.com/4.8.95/css/materialdesignicons.min.css" />
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" />
  <link rel="stylesheet" href="../assets/css/login.css" />
</head>

<body>
  <main class="d-flex align-items-center min-vh-100 py-3 py-md-0">
    <div class="container">
      <div class="card login-card">
        <div class="row no-gutters">
          <div class="col-md-7">
            <img src="../image/lomari.png" alt="login" class="login-card-img" />
          </div>
          <div class="col-md-5">
            <div class="card-body">
              <div class="bd-highlight brand-wrapper mb-5">
                <!-- <img src="assets/img/logo.png" alt="logo" class="logo" /> -->
                <p class="font-weight-bold text-logo">ZAHRAN</p>
                <p class="font-weight-bold text-logo">KERAMIK</p>
              </div>

              <div class="bd-highlight brand-wrapper ">
                <!-- <img src="assets/img/logo.png" alt="logo" class="logo" /> -->
                <h1 class="font-weight-bold ">Masuk ke Akun</h1>
                <h1 class="font-weight-bold ">Anda</h1>
              </div>

              <form action="" method="POST" class="mt-5 mb-5">
                <div class="form-group">
                  <!-- <label for="username" class="form-label fw-bolder">Username</label> -->
                  <input name="username" class="form-control form-login" placeholder="Nama Pengguna" required autofocus />
                </div>
                <div class="form-group mb-4">
                  <!-- <label for="password" class="form-label fw-bolder">Password</label> -->
                  <input name="password" type="password" class="form-control form-login" placeholder="********" required />
                </div>
                <!-- <input type="submit" class="btn btn-block login-btn mb-5 btn-light" value="Login" /> -->
                <button type="submit" name="login" id="login" class="btn btn-block login-btn mb-5 btn-light" value="login">Masuk</button>
              </form>
            </div>
          </div>
          <!-- <div class="col-md-5">
              <img src="assets/img/login.png" alt="login" class="login-card-img" />
            </div> -->
        </div>
      </div>
    </div>
  </main>
  <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
</body>

</html>