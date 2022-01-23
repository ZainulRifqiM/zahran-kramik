<?php 
// session_start();
// if (!isset($_SESSION["login"])) {
// 	header("Location: login.php");
// 	exit; 
// }


$kramik = query("SELECT * FROM barang WHERE IsDeleted=0 ");


 ?>

<div class="container ">


<div class="row mb-3">
    <div class="col-md-10">
	<h3 style="color: #66615B;">Data Kramik</h3>
    </div>
    <div class="col-md-2">
        <a href="index.php?halaman=table-kramik-tambah" class="btn btn-success">Tambah</a>
    </div>
</div>


<div class="card-body ">
                <div class="table-responsive ">
                    <table class="table">
                        <thead class=" text-primary">
							<th>No.</th>
							<th>gambar</th>
							<th>Nama Keramik</th>
							<th>Jumlah</th>
							<th>Harga Satuan</th>
							<th>Kategori</th>
							<th>Aksi</th>
                        </thead>
                        <tbody>
						<?php $i = 1; ?>
						<?php foreach( $kramik as $row ) : ?>
                                    <tr>
										<td><?= $i; ?></td>
                                        <td><img src="../assets/img/<?= $row["gambar"]; ?>" width="50"></td>
                                        <td><?= $row['NamaBarang'] ?></td>
										<td><?= $row['Jumlah'] ?></td>
										<td><?= $row['HargaSatuan'] ?></td>
										<td><?= $row['kategori'] ?></td>
                                        <td>
										<a href="index.php?halaman=table-kramik-edit&IdBarang=<?= $row['IdBarang'] ?>" class="btn btn-sm btn-warning"><span class="fa fa-pencil-square-o"></span></a>
										<a href="index.php?halaman=table-kramik-hapus&IdBarang=<?= $row['IdBarang'] ?>" class="btn btn-sm btn-danger" onclick="return confirm('Anda yakin menghapus data ini ?')"><span class="fas fa-trash-alt"></span></a>
									</td>
                                    </tr>
						<?php $i++; ?>
						<?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
</div>

