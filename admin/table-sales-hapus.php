<?php 
// require 'functions.php';
$IdSales = $_GET["IdSales"];

if (updateSales($IdSales) > 0) {
	echo "
		<script>
			alert('data berhasil dihapus!');
			document.location.href = 'index.php?halaman=table-sales';
		</script>
		";
} else {
	echo "
		<script>
			alert('data gagal hapus!');
			document.location.href = 'index.php?halaman=table-sales';
		</script>
		";
	}
 ?>
