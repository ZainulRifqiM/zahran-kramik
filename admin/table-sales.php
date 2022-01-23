<?php 
// session_start();
// if (!isset($_SESSION["login"])) {
// 	header("Location: login.php");
// 	exit; 
// }


$sales = query("SELECT * FROM sales WHERE IsDeleted = 0");

 ?>

<div class="container">

	<div class="row">
		<div class="col-md-10">
		<h3 style="color: #66615B;">Data Sales Keramik</h3>
		</div>
		<div class="col-md-2">
			<a href="index.php?halaman=table-sales-tambah" class="btn btn-success">Tambah</a>
		</div>
	</div>

    <div class="card-body">
        <div class="table-responsive">
            <table class="table">
                <thead class=" text-primary">
                    <th>No.</th>
                    <th>Id Sales</th>
                    <th>Nama Sales</th>
                    <th>Aksi</th>
                </thead>
                <tbody>
                <?php $i = 1; ?>
                <?php foreach( $sales as $row ) : ?>
                    <tr>
                        <td><?= $i; ?></td>
                        <td><?= $row['IdSales'] ?></td>
                        <td><?= $row['NamaSales'] ?></td>
                        <td>
                            <a href="index.php?halaman=table-sales-edit&IdSales=<?= $row['IdSales'] ?>" class="btn btn-sm btn-warning"><span class="fa fa-pencil-square-o"></span></a>
                            <a href="index.php?halaman=table-sales-hapus&IdSales=<?= $row['IdSales'] ?>" class="btn btn-sm btn-danger" onclick="return confirm('Anda yakin menghapus data ini ?')"><span class="fas fa-trash-alt"></span></a>
                        </td>
                    </tr>
                <?php $i++; ?>
                <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
