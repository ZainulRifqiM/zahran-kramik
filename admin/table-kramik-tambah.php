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
	if (tambahBarang($_POST) > 0) {
		
		echo "
		<script>
			alert('data berhasil ditambahkan!');
			document.location.href = 'index.php?halaman=table-kramik';
		</script>
		";
	} else {
		echo "
		<script>
			alert('data gagal ditambahkan!');
			document.location.href = 'index.php?halaman=table-kramik';
		</script>
		";
	}

}
 ?>

	<div class="container" style="">
	<h3 style="color: #66615B;">Tambah Data Kramik</h3>

	<form action="" method="post" enctype="multipart/form-data">
		<!-- <div class="mb-3" >
			<label for="IdBarang" class="fw-bolder">Id Kramik :</label>
			<input type="text" class="form-control text-center" style="width: 400px" name="IdBarang" id="IdBarang" required autofocus>
		</div> -->
        <div class="mb-3" >
			<label for="NamaBarang" class="fw-bolder">Nama Kramik :</label>
			<input type="text" class="form-control text-center" style="width: 400px" name="NamaBarang" id="NamaBarang" required >
		</div>
        
		<div class="mb-3">
			<label for="Jumlah" class="fw-bolder ">Jumlah :</label>
			<input type="text" class="form-control text-center" style="width: 400px" name="Jumlah" id="Jumlah" required >
		</div>
        <div class="mb-3">
			<label for="HargaSatuan" class="fw-bolder">Harga Satuan :</label>
			<input type="text" class="form-control text-center" style="width: 400px" name="HargaSatuan" id="HargaSatuan" required >
		</div>
        <div class="mb-3">
			<label for="kategori" class="fw-bolder">Kategori :</label>
			<input type="text" class="form-control text-center" style="width: 400px" name="kategori" id="kategori" required >
		</div>
        <div class="mb-3" >
			<label for="gambar" class="fw-bolder">Gambar :</label>
			<input type="file" class="form-control text-center" style="width: 400px" name="gambar" id="gambar" required >
		</div>
		<button type="submit" class="btn btn-success" name="tambah">Simpan</button>
	</form>
	</div>
