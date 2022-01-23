<?php 
// session_start();
// if (!isset($_SESSION["login"])) {
// 	header("Location: login.php");
// 	exit; 
// }


$bayar = query("SELECT * FROM pembayaran,transaksi WHERE pembayaran.NoFaktur=transaksi.NoFaktur");

 ?>

<div class="container">

	<div class="row">
		<div class="col-md-10">
		<h3 style="color: #66615B;">Data Pembayaran Keramik</h3>
		</div>
		<div class="col-md-2">
			<a href="index.php?halaman=table-pembayaran-tambah" class="btn btn-success">Tambah</a>
		</div>
	</div>

	<div class="card-body">
        <div class="table-responsive">
            <table class="table">
                <thead class=" text-primary">
				<th>No Faktur</th>
				<th>Diskon</th>
				<th>DPP</th>
				<th>PPN</th>
				<th>Total</th>
				<th>NoRekening</th>
				<th>Aksi</th>
                </thead>
                <tbody>
                <?php $i = 1; ?>
                <?php foreach( $bayar as $row ) : ?>
                    <tr>
                        <td><?= $row['NoFaktur'] ?></td>
                        <td><?= $row['Diskon'] ?></td>
						<td><?= $row['DPP'] ?></td>
						<td><?= $row['PPN'] ?></td>
						<td><?= $row['Total'] ?></td>
						<td><?= $row['NoRekening'] ?></td>
                        <td>
                            <a href="index.php?halaman=table-pembayaran-edit&IdPembayaran=<?= $row['IdPembayaran'] ?>" class="btn btn-sm btn-warning"><span class="fa fa-pencil-square-o"></span></a>
                            <a href="index.php?halaman=table-pembayaran-hapus&IdPembayaran=<?= $row['IdPembayaran'] ?>" class="btn btn-sm btn-danger" onclick="return confirm('Anda yakin menghapus data ini ?')"><span class="fas fa-trash-alt"></span></a>
                        </td>
                    </tr>
                <?php $i++; ?>
                <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

