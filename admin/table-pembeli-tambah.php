<?php 
// session_start();
// if (!isset($_SESSION["login"])) {
// 	header("Location: login.php");
// 	exit; 
// }
// require 'functions.php';

// cek apakah tombol submit sudah ditekan atau belum
if ( isset($_POST["tambah"])) {
	
	// cek apakah data berhasil di tambahkan atau tidak
	if (tambahPembeli($_POST) > 0) {
		echo "
		<script>
			alert('data berhasil ditambahkan!');
			document.location.href = 'index.php?halaman=table-pembeli';
		</script>
		";
	} else {
		echo "
		<script>
			alert('data gagal ditambahkan!');
			document.location.href = 'index.php?halaman=table-pembeli';
		</script>
		";
	}

}
 ?>

	<div class="container" style="">
	<h3 style="color: #66615B;">Tambah data Pembeli</h3>

	<form action="" method="post">
		<!-- <div class="mb-3" >
			<label for="IdPembeli" class="fw-bolder">Id Pembeli :</label>
			<input type="text" class="form-control text-center" style="width: 400px" name="IdPembeli" id="IdPembeli" required autofocus>
		</div> -->
        <div class="mb-3" >
			<label for="NamaPembeli" class="fw-bolder">Nama Pembeli :</label>
			<input type="text" class="form-control text-center" style="width: 400px" name="NamaPembeli" id="NamaPembeli" required >
		</div>
		<button type="submit" class="btn btn-success" name="tambah">Simpan</button>
	</form>
	</div>
