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
	if (tambahTransaksi($_POST) > 0) {
		echo "
		<script>
			alert('data berhasil ditambahkan!');
			document.location.href = 'index.php?halaman=table-transaksi';
		</script>
		";
	} else {
		echo "
		<script>
			alert('data gagal ditambahkan!');
			document.location.href = 'index.php?halaman=table-transaksi';
		</script>
		";
	}

}
 ?>

	<div class="container" style="">
	<h3 style="color: #66615B;">Tambah data Transaksi</h3>

	<form action="" method="post">
		<div class="mb-3" >
			<label for="NoFaktur" class="fw-bolder">No Faktur :</label>
			<input type="text" class="form-control" style="width: 400px" name="NoFaktur" id="NoFaktur" required autofocus>
		</div>

		<div class="mb-3">
			<label for="IdSales" class="fw-bolder">Nama Sales :</label>
            <Select name="IdSales" class="form-control form-select" style="width: 400px">
                <?php  
                    $dataSales = getDataSales();
                    foreach( $dataSales as $row ) :
                ?>
                <option  id="IdSales" value="<?= $row["IdSales"]?>"><?= $row["NamaSales"]?></option>
                <?php endforeach; ?>
            </Select>
		</div>

		<div class="mb-3">
			<label for="IdPembeli" class="fw-bolder">Nama Pembeli :</label>
            <Select name="IdPembeli" class="form-control form-select" style="width: 400px">
                <?php  
                    $dataPembeli = getDataPembeli();
                    foreach( $dataPembeli as $row ) :
                ?>
                <option  id="IdPembeli" value="<?= $row["IdPembeli"]?>"><?= $row["NamaPembeli"]?></option>
                <?php endforeach; ?>
            </Select>
		</div>

		<div class="mb-3">
			<label for="IdBarang" class="fw-bolder">Nama Barang :</label>
            <Select name="IdBarang" class="form-control form-select" style="width: 400px">
                <?php  
                    $dataBarang = getDataBarang();
                    foreach( $dataBarang as $row ) :
                ?>
                <option  id="IdBarang" value="<?= $row["IdBarang"]?>"><?= $row["NamaBarang"]?></option>
                <?php endforeach; ?>
            </Select>
		</div>

        <div class="mb-3" >
			<label for="JumlahPembelian" class="fw-bolder">Jumlah Pembelian :</label>
			<input type="text" class="form-control" style="width: 400px" name="JumlahPembelian" id="JumlahPembelian" required autofocus>
		</div>
        <div class="mb-3" >
			<label for="JumlahHarga" class="fw-bolder">Jumlah Harga :</label>
			<input type="text" class="form-control" style="width: 400px" name="JumlahHarga" id="JumlahHarga" required >
		</div>
        <div class="mb-3" >
			<label for="NoPO" class="fw-bolder">No PO :</label>
			<input type="text" class="form-control" style="width: 400px" name="NoPO" id="NoPO" required >
		</div>
        <div class="mb-3" >
			<label for="TanggalFaktur" class="fw-bolder">Tanggal Faktur :</label>
			<input type="date" class="form-control" style="width: 400px" name="TanggalFaktur" id="TanggalFaktur" required >
		</div>
        <div class="mb-3" >
			<label for="JatuhTempo" class="fw-bolder">Jatuh Tempo :</label>
			<input type="date" class="form-control" style="width: 400px" name="JatuhTempo" id="JatuhTempo" required >
		</div>
        <div class="mb-3" >
			<label for="Terms" class="fw-bolder">Terms :</label>
			<input type="text" class="form-control" style="width: 400px" name="Terms" id="Terms" required >
		</div>

		<button type="submit" class="btn btn-success" name="tambah">Simpan</button>
	</form>
	</div>
