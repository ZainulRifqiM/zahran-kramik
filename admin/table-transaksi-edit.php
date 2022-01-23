<?php 
// session_start();
// if (!isset($_SESSION["login"])) {
// 	header("Location: login.php");
// 	exit; 
// }
// require 'functions.php';

// ambil data di URL
$NoFaktur = $_GET["NoFaktur"];

// query data mahasiswa berdasarkan NoFaktur
$transaksi = query("SELECT * 
					FROM transaksi,barang,sales,pembeli 
					WHERE transaksi.IdSales=sales.IdSales
					AND transaksi.IdPembeli=pembeli.IdPembeli
					AND transaksi.idBarang=barang.IdBarang")[0];


// cek apakah tombol submit sudah ditekan atau belum
if ( isset($_POST["edit"])) {
	// var_dump($_POST);
    // die;
	// cek apakah data berhasil diubah atau tidak
	if (editTransaksi($_POST) > 0) {
		echo "
		<script>
			alert('data berhasil diubah!');
			document.location.href = 'index.php?halaman=table-transaksi';
		</script>
		";
	} else {
		echo "
		<script>
			alert('data gagal diubah!');
			document.location.href = 'index.php?halaman=table-transaksi';
		</script>
		";
	}

}
 ?>

    <div class="container" style="">
	<h3 style="color: #66615B;">Edit Data Transaksi</h3>

    <form action="" method="post" enctype="multipart/form-data">
    <input type="hidden" name="NoFaktur" value="<?= $transaksi["NoFaktur"]?>" >
        <div class="mb-3" >
			<label for="NoFaktur" class="fw-bolder">Nomor Faktur :</label>
			<input type="text" class="form-control text-center" style="width: 400px" name="NoFaktur" id="NoFaktur" value="<?= $transaksi["NoFaktur"]?>" readonly >
		</div>
        
		<div class="mb-3">
			<label for="IdSales" class="fw-bolder">Nama Sales :</label>
            <Select name="IdSales" class="form-control form-select" value="<?= $transaksi["NamaSales"]?>" style="width: 400px">
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
            <Select name="IdPembeli" class="form-control form-select" value="<?= $transaksi["NamaPembeli"]?>" style="width: 400px">
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
            <Select name="IdBarang" class="form-control form-select" value="<?= $transaksi["NamaBarang"]?>" style="width: 400px">
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
			<input type="text" class="form-control text-center" style="width: 400px" name="JumlahPembelian" id="JumlahPembelian" value="<?= $transaksi["JumlahPembelian"]?>" required >
		</div>
        <div class="mb-3" >
			<label for="JumlahHarga" class="fw-bolder">Jumlah Harga :</label>
			<input type="text" class="form-control text-center" style="width: 400px" name="JumlahHarga" id="JumlahHarga" value="<?= $transaksi["JumlahHarga"]?>" required >
		</div>
        <div class="mb-3" >
			<label for="NoPO" class="fw-bolder">No PO :</label>
			<input type="text" class="form-control text-center" style="width: 400px" name="NoPO" id="NoPO" value="<?= $transaksi["NoPO"]?>" required >
		</div>
        <div class="mb-3" >
			<label for="TanggalFaktur" class="fw-bolder">Tanggal Faktur :</label>
			<input type="date" class="form-control text-center" style="width: 400px" name="TanggalFaktur" id="TanggalFaktur" value="<?= $transaksi["TanggalFaktur"]?>" required >
		</div>
        <div class="mb-3" >
			<label for="JatuhTempo" class="fw-bolder">Jatuh Tempo :</label>
			<input type="date" class="form-control text-center" style="width: 400px" name="JatuhTempo" id="JatuhTempo" value="<?= $transaksi["JatuhTempo"]?>" required >
		</div>
        <div class="mb-3" >
			<label for="Terms" class="fw-bolder">Terms :</label>
			<input type="text" class="form-control text-center" style="width: 400px" name="Terms" id="Terms" value="<?= $transaksi["Terms"]?>" required >
		</div>
		<button type="submit" class="btn btn-success" name="edit">Simpan</button>
	</form>
    </div>
