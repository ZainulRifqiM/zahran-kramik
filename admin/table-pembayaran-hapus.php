<?php 
// require 'functions.php';
$IdPembayaran = $_GET["IdPembayaran"];

if (hapusPembayaran($IdPembayaran) > 0) {
	echo "
		<script>
			alert('data berhasil dihapus!');
			document.location.href = 'index.php?halaman=table-pembayaran';
		</script>
		";
} else {
	echo "
		<script>
			alert('data gagal hapus!');
			document.location.href = 'index.php?halaman=table-pembayaran';
		</script>
		";
	}
 ?>
