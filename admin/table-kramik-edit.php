<?php 
// session_start();
// if (!isset($_SESSION["login"])) {
// 	header("Location: login.php");
// 	exit; 
// }
// require 'functions.php';

// ambil data di URL
$IdBarang = $_GET["IdBarang"];

// query data mahasiswa berdasarkan IdBarang
$barang = query("SELECT * FROM barang WHERE IdBarang = $IdBarang")[0];


// cek apakah tombol submit sudah ditekan atau belum
if ( isset($_POST["editBarang"])) {
	// var_dump($_POST);
    // die;
	// cek apakah data berhasil diubah atau tidak
	if (editBarang($_POST) > 0) {
		echo "
		<script>
			alert('data berhasil diubah!');
			document.location.href = 'index.php?halaman=table-kramik';
		</script>
		";
	} else {
		echo "
		<script>
			alert('data gagal diubah!');
			document.location.href = 'index.php?halaman=table-kramik';
		</script>
		";
	}

}
 ?>

    <div class="container" style="">
	<h3 style="color: #66615B;">Edit Data Kramik</h3>

    <form action="" method="post" enctype="multipart/form-data">
    <input type="hidden" name="IdBarang" value="<?= $barang["IdBarang"]?>" >
		<input type="hidden" name="gambarLama" value="<?= $barang["gambar"]?>">
        <div class="mb-3" >
			<label for="NamaBarang" class="fw-bolder">Nama Kramik :</label>
			<input type="text" class="form-control text-center" style="width: 400px" name="NamaBarang" id="NamaBarang" value="<?= $barang["NamaBarang"]?>" required >
		</div>
        
		<div class="mb-3">
			<label for="Jumlah" class="fw-bolder ">Jumlah :</label>
			<input type="text" class="form-control text-center" style="width: 400px" name="Jumlah" id="Jumlah" value="<?= $barang["Jumlah"]?>"  >
		</div>
        <div class="mb-3">
			<label for="HargaSatuan" class="fw-bolder">Harga Satuan :</label>
			<input type="text" class="form-control text-center" style="width: 400px" name="HargaSatuan" id="HargaSatuan" value="<?= $barang["HargaSatuan"]?>"  >
		</div>
        <div class="mb-3">
			<label for="kategori" class="fw-bolder">Kategori :</label>
			<input type="text" class="form-control text-center" style="width: 400px" name="kategori" id="kategori" value="<?= $barang["kategori"]?>"  >
		</div>
        <div class="mb-3" >
			<label for="gambar" class="fw-bolder">Gambar :</label>
			<img src="../assets/img/<?= $barang['gambar'];?>" width="70"><br>
			<input type="file" class="form-control text-center" style="width: 400px" name="gambar" id="gambar"  >
		</div>
		<button type="submit" class="btn btn-success" name="editBarang">Simpan</button>
	</form>
    </div>
