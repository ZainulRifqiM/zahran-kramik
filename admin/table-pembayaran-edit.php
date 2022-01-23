<?php 
// session_start();
// if (!isset($_SESSION["login"])) {
// 	header("Location: login.php");
// 	exit; 
// }
// require 'functions.php';

// ambil data di URL
$IdPembayaran = $_GET["IdPembayaran"];

// query data mahasiswa berdasarkan IdPembayaran
$bayar = query("SELECT * FROM pembayaran,transaksi WHERE pembayaran.NoFaktur=transaksi.NoFaktur")[0];


// cek apakah tombol submit sudah ditekan atau belum
if ( isset($_POST["edit"])) {
	// var_dump($_POST);
    // die;
	// cek apakah data berhasil diubah atau tidak
	if (editPembayaran($_POST) > 0) {
		echo "
		<script>
			alert('data berhasil diubah!');
			document.location.href = 'index.php?halaman=table-pembayaran';
		</script>
		";
	} else {
		echo "
		<script>
			alert('data gagal diubah!');
			document.location.href = 'index.php?halaman=table-pembayaran';
		</script>
		";
	}

}
 ?>

    <div class="container" style="">
	<h3 style="color: #66615B;">Edit Data Pembayaran</h3>

    <form action="" method="post" enctype="multipart/form-data">
    <input type="hidden" name="IdPembayaran" value="<?= $bayar["IdPembayaran"]?>" >
    	<div class="mb-3">
			<label for="NoFaktur" class="fw-bolder">NoFaktur :</label>
            <Select name="NoFaktur" class="form-control form-select" value="<?= $bayar["NoFakur"]?>" style="width: 400px">
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
			<input type="text" class="form-control text-center" style="width: 400px" name="Diskon" id="Diskon" value="<?= $bayar["Diskon"]?>" required autofocus>
		</div>
        <div class="mb-3" >
			<label for="DPP" class="fw-bolder">DPP :</label>
			<input type="text" class="form-control text-center" style="width: 400px" name="DPP" id="DPP" value="<?= $bayar["DPP"]?>" required autofocus>
		</div>
        <div class="mb-3" >
			<label for="PPN" class="fw-bolder">PPN :</label>
			<input type="text" class="form-control text-center" style="width: 400px" name="PPN" id="PPN" value="<?= $bayar["PPN"]?>" required autofocus>
		</div>
        <div class="mb-3" >
			<label for="Total" class="fw-bolder">Total :</label>
			<input type="text" class="form-control text-center" style="width: 400px" name="Total" id="Total" value="<?= $bayar["Total"]?>" required autofocus>
		</div>
        <div class="mb-3" >
			<label for="NoRekening" class="fw-bolder">No Rekening :</label>
			<input type="text" class="form-control text-center" style="width: 400px" name="NoRekening" id="NoRekening" value="<?= $bayar["NoRekening"]?>" required >
		</div>
		<button type="submit" class="btn btn-success" name="edit">Simpan</button>
	</form>
    </div>
