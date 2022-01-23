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
	if (tambahPembayaran($_POST) > 0) {
		echo "
		<script>
			alert('data berhasil ditambahkan!');
			document.location.href = 'index.php?halaman=table-pembayaran';
		</script>
		";
	} else {
		echo "
		<script>
			alert('data gagal ditambahkan!');
			document.location.href = 'index.php?halaman=table-pembayaran';
		</script>
		";
	}

}
 ?>

	<div class="container" style="">
	<h3 style="color: #66615B;">Tambah data Pembayaran</h3>



	<form action="" method="post">
		<!-- <div class="mb-3" >
			<label for="NoFaktur" class="fw-bolder">No Faktur :</label>
			<input type="text" class="form-control" style="width: 400px" name="NoFaktur" id="NoFaktur" required autofocus>
		</div> -->

		<div class="mb-3">
			<label for="NoFaktur" class="fw-bolder">NoFaktur :</label>
            <Select name="NoFaktur" class="form-control form-select" style="width: 400px">
                <?php  
                    $dataFaktur = getDataTransaksi();
                    foreach( $dataFaktur as $row ) :
                ?>
                <option  id="NoFaktur" value="<?= $row["NoFaktur"]?>"><?= $row["NoFaktur"]?></option>
                <?php endforeach; ?>
            </Select>
		</div>


        <div class="mb-3" >
			<label for="Diskon" class="fw-bolder">Diskon :</label>
			<input type="text" class="form-control text-center" style="width: 400px" name="Diskon" id="Diskon" required autofocus>
		</div>
        <div class="mb-3" >
			<label for="DPP" class="fw-bolder">DPP :</label>
			<input type="text" class="form-control text-center" style="width: 400px" name="DPP" id="DPP" required autofocus>
		</div>
        <div class="mb-3" >
			<label for="PPN" class="fw-bolder">PPN :</label>
			<input type="text" class="form-control text-center" style="width: 400px" name="PPN" id="PPN" required autofocus>
		</div>
        <div class="mb-3" >
			<label for="Total" class="fw-bolder">Total :</label>
			<input type="text" class="form-control text-center" style="width: 400px" name="Total" id="Total" required autofocus>
		</div>
        <div class="mb-3" >
			<label for="NoRekening" class="fw-bolder">No Rekening :</label>
			<input type="text" class="form-control text-center" style="width: 400px" name="NoRekening" id="NoRekening" required >
		</div>

		

		<button type="submit" class="btn btn-success" name="tambah">Simpan</button>
	</form>
	</div>
