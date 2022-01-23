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
	if (tambahSales($_POST) > 0) {
		echo "
		<script>
			alert('data berhasil ditambahkan!');
			document.location.href = 'index.php?halaman=table-sales';
		</script>
		";
	} else {
		echo "
		<script>
			alert('data gagal ditambahkan!');
			document.location.href = 'index.php?halaman=table-sales';
		</script>
		";
	}

}
 ?>

	<div class="container" style="">
	<h3 style="color: #66615B;">Tambah data Sales</h3>

	<form action="" method="post">
		<!-- <div class="mb-3" >
			<label for="IdSales" class="fw-bolder">Id Sales :</label>
			<input type="text" class="form-control text-center" style="width: 400px" name="IdSales" id="IdSales" required autofocus>
		</div> -->
        <div class="mb-3" >
			<label for="NamaSales" class="fw-bolder">Nama Sales :</label>
			<input type="text" class="form-control text-center" style="width: 400px" name="NamaSales" id="NamaSales" required >
		</div>
		<button type="submit" class="btn btn-success" name="tambah">Simpan</button>
	</form>
	</div>
