<?php 
// require 'functions.php';
$NoFaktur = $_GET["NoFaktur"];

if (hapusTransaksi($NoFaktur) > 0) {
	echo "
		<script>
			alert('data berhasil dihapus!');
			document.location.href = 'index.php?halaman=table-transaksi';
		</script>
		";
} else {
	echo "
		<script>
			alert('data gagal hapus!');
			document.location.href = 'index.php?halaman=table-transaksi';
		</script>
		";
	}
 ?>
