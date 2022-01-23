<?php 
// require 'functions.php';
$IdBarang = $_GET["IdBarang"];

if (updateBarang($IdBarang) > 0) {
	echo "
		<script>
			alert('data berhasil dihapus!');
			document.location.href = 'index.php?halaman=table-kramik';
		</script>
		";
} else {
	echo "
		<script>
			alert('data gagal hapus!');
			document.location.href = 'index.php?halaman=table-kramik';
		</script>
		";
	}
 ?>
