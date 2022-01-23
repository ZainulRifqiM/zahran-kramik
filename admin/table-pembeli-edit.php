<?php 
// session_start();
// if (!isset($_SESSION["login"])) {
// 	header("Location: login.php");
// 	exit; 
// }
// require 'functions.php';

// ambil data di URL
$IdPembeli = $_GET["IdPembeli"];

// query data mahasiswa berdasarkan IdPembeli
$pembeli = query("SELECT * FROM pembeli WHERE IdPembeli = $IdPembeli")[0];


// cek apakah tombol submit sudah ditekan atau belum
if ( isset($_POST["edit"])) {
	// var_dump($_POST);
    // die;
	// cek apakah data berhasil diubah atau tidak
	if (editPembeli($_POST) > 0) {
		echo "
		<script>
			alert('data berhasil diubah!');
			document.location.href = 'index.php?halaman=table-pembeli';
		</script>
		";
	} else {
		echo "
		<script>
			alert('data gagal diubah!');
			document.location.href = 'index.php?halaman=table-pembeli';
		</script>
		";
	}

}
 ?>

    <div class="container" style="">
	<h3 style="color: #66615B;">Edit Data Pembeli</h3>

    <form action="" method="post" enctype="multipart/form-data">
    <input type="hidden" name="IdPembeli" value="<?= $pembeli["IdPembeli"]?>" >
        <div class="mb-3" >
			<label for="NamaPembeli" class="fw-bolder">Nama Pembeli :</label>
			<input type="text" class="form-control text-center" style="width: 400px" name="NamaPembeli" id="NamaPembeli" value="<?= $pembeli["NamaPembeli"]?>" required >
		</div>
		<button type="submit" class="btn btn-success" name="edit">Simpan</button>
	</form>
    </div>
