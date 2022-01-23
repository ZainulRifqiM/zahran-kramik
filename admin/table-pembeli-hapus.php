<?php 
// require 'functions.php';
$IdPembeli = $_GET["IdPembeli"];

if (updatePembeli($IdPembeli) > 0) {
	echo "
		<script>
			alert('data berhasil dihapus!');
			document.location.href = 'index.php?halaman=table-pembeli';
		</script>
		";
} else {
	echo "
		<script>
			alert('data gagal hapus!');
			document.location.href = 'index.php?halaman=table-pembeli';
		</script>
		";
	}
 ?>
