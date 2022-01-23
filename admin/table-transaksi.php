<?php 
// session_start();
// if (!isset($_SESSION["login"])) {
// 	header("Location: login.php");
// 	exit; 
// }


$transaksi = query("SELECT * 
				    FROM transaksi,barang,sales,pembeli 
					WHERE transaksi.IdSales=sales.IdSales
					AND transaksi.IdPembeli=pembeli.IdPembeli
					AND transaksi.idBarang=barang.IdBarang");


 ?>

<div class="container">
<!-- <h3 style="color: #66615B;">Data Transaksi Keramik</h3> -->

	<div class="row">
		<div class="col-md-10">
		<h3 style="color: #66615B;">Data Transaksi Keramik</h3>
		</div>
		<div class="col-md-2">
			<a href="index.php?halaman=table-transaksi-tambah" class="btn btn-success">Tambah</a>
		</div>
	</div>

	<div class="card-body">
        <div class="table-responsive">
            <table class="table">
                <thead class=" text-primary">
				<th>Nomor Faktur</th>
				<th>Nama Sales</th>
				<th>Nama Pembeli</th>
				<th>Nama Barang</th>
				<th>Jumlah Pembelian</th>
				<th>Jumlah Harga</th>
				<th>Nomor PO</th>
				<th>Tanggal Faktur</th>
				<th>Jatuh Tempo</th>
				<th>Terms</th>
				<th>Aksi</th>
                </thead>
                <tbody>
                <?php $i = 1; ?>
                <?php foreach( $transaksi as $row ) : ?>
                    <tr>
                        <td><?= $row['NoFaktur'] ?></td>
                        <td><?= $row['NamaSales'] ?></td>
						<td><?= $row['NamaPembeli'] ?></td>
						<td><?= $row['NamaBarang'] ?></td>
						<td><?= $row['JumlahPembelian'] ?></td>
						<td><?= $row['JumlahHarga'] ?></td>
						<td><?= $row['NoPO'] ?></td>
						<td><?= $row['TanggalFaktur'] ?></td>
						<td><?= $row['JatuhTempo'] ?></td>
						<td><?= $row['Terms'] ?></td>
                        <td>
                            <a href="index.php?halaman=table-transaksi-edit&NoFaktur=<?= $row['NoFaktur'] ?>" class="btn btn-sm btn-warning"><span class="fa fa-pencil-square-o"></span></a>
                            <a href="index.php?halaman=table-transaksi-hapus&NoFaktur=<?= $row['NoFaktur'] ?>" class="btn btn-sm btn-danger" onclick="return confirm('Anda yakin menghapus data ini ?')"><span class="fas fa-trash-alt"></span></a>
                        </td>
                    </tr>
                <?php $i++; ?>
                <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>


