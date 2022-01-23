<?php 


// require 'functions.php';

// ambil data di URL
$IdSales = $_GET["IdSales"];

// query data mahasiswa berdasarkan IdSales
$sales = query("SELECT * FROM sales WHERE IdSales = $IdSales")[0];


// cek apakah tombol submit sudah ditekan atau belum
if ( isset($_POST["ubah"])) {
	
	// cek apakah data berhasil diubah atau tidak
	if (editSales($_POST) > 0) {
		echo "
		<script>
			alert('data berhasil diubah!');
			document.location.href = 'index.php?halaman=table-sales';
		</script>
		";
	} else {
		echo "
		<script>
			alert('data gagal diubah!');
			document.location.href = 'index.php?halaman=table-sales';
		</script>
		";
	}

}
 ?>

    <div class="container" style="">
	<h3 style="color: #66615B;">Edit Data Sales</h3>

    <form action="" method="post">
    <input type="hidden" name="IdSales" value="<?= $sales["IdSales"]?>" >
        <div class="mb-3" >
			<label for="NamaSales" class="fw-bolder">Nama Sales :</label>
			<input type="text" class="form-control text-center" style="width: 400px" name="NamaSales" id="NamaSales" value="<?= $sales["NamaSales"]?>" required >
		</div>
		<button type="submit" class="btn btn-success" name="ubah">Simpan</button>
	</form>
    </div>
