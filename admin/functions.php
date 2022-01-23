<?php 
// koneksi ke database
$conn = mysqli_connect("localhost", "root", "", "dbPenjualan");

function query($query) {
	global $conn;
	$result = mysqli_query($conn, $query);
	$rows = [];
        while( $row = mysqli_fetch_assoc($result)) {
            $rows[] = $row;
        }
        return $rows;
	
}

// Function Barang
function tambahBarang($data) {
	global $conn;

	// $IdBarang = $_POST['IdBarang'];
    $NamaBarang = $_POST['NamaBarang'];
    $Jumlah = $_POST['Jumlah'];
    $HargaSatuan = $_POST['HargaSatuan'];
    $kategori = $_POST['kategori'];
	

	// upload gambar
	$gambar = upload();
	if (!$gambar) {
		return false;
	}

	$query = "INSERT INTO barang (NamaBarang,Jumlah,HargaSatuan,kategori,gambar)
			  VALUES
			  ('$NamaBarang','$Jumlah','$HargaSatuan','$kategori','$gambar')
			  ";
	// var_dump($query);
	// die;
	mysqli_query($conn, $query);

	return mysqli_affected_rows($conn); 
}

function editBarang($data) {
	global $conn;

	// $IdBarang = htmlspecialchars($data["IdBarang"]);
	$IdBarang = $data["IdBarang"];
	$NamaBarang = htmlspecialchars($data["NamaBarang"]);
	$Jumlah = htmlspecialchars($data["Jumlah"]);
	$HargaSatuan = htmlspecialchars($data["HargaSatuan"]);
	$kategori = htmlspecialchars($data["kategori"]);
	$gambarLama = htmlspecialchars($data["gambarLama"]);

	// cek apakah user pilih gambar baru atau tidak
	if ($_FILES['gambar']['error'] === 4) {
		$gambar = $gambarLama;
	} else {
		$gambar = upload();
	}

	$query = "UPDATE barang SET
				  NamaBarang = '$NamaBarang',
				  Jumlah = '$Jumlah',
				  HargaSatuan = '$HargaSatuan',
				  kategori = '$kategori',
				  gambar = '$gambar'
			  WHERE IdBarang = '$IdBarang'
			 ";
			//  var_dump($query);
			//  die;
	mysqli_query($conn, $query);

	return mysqli_affected_rows($conn);
}

function hapusBarang($IdBarang) {
	global $conn;
	mysqli_query($conn, "DELETE 
						 FROM barang 
						 WHERE IdBarang = '$IdBarang'");
	return mysqli_affected_rows($conn);

}

function updateBarang($IdBarang) {
	global $conn;
	mysqli_query($conn, "UPDATE barang SET
							 IsDeleted = 1
				   		WHERE IdBarang = '$IdBarang'
						");
	return mysqli_affected_rows($conn);

}

function getDataBarang() {
	global $conn;


	$query = "SELECT * FROM barang";
	$dataKelas = mysqli_query($conn, $query);
	
	return mysqli_fetch_all($dataKelas,MYSQLI_ASSOC); 
}

function upload() {

	$namaFile = $_FILES['gambar']['name'];
	$ukuranFile = $_FILES['gambar']['size'];
	$error = $_FILES['gambar']['error'];
	$tmpName = $_FILES['gambar']['tmp_name'];

	// cek apakah tidak ada gambar yang di upload
	if ( $error === 4) {
		echo "<script>
					alert('pilih gambar terlebih dahulu!');
			  </script>";
		return false;
	}

	// cek apakah yang diupload adalah gambar
	$ekstensiGambarValid = ['jpg', 'jpeg', 'png'];
	$ekstensiGambar = explode('.', $namaFile);
	$ekstensiGambar = strtolower(end($ekstensiGambar));
	if (!in_array($ekstensiGambar, $ekstensiGambarValid)) {
		echo "<script>
					alert('Yang anda upload bukan gambar');
			  </script>";
		return false;
	}

	// cek jika ukurannya terlalu besar
	if ($ukuranFile > 1000000 ) {
		echo "<script>
					alert('Ukuran gambar terlalu besar');
			  </script>";
		return false;
	}

	// lolos pengecekan gambar siap di upload
	// generate nama gambar baru
	$namaFileBaru = uniqid();
	$namaFileBaru.= '.';
	$namaFileBaru.= $ekstensiGambar;

	move_uploaded_file($tmpName, '../assets/img/'. $namaFileBaru);

	return $namaFileBaru;


}


// Function Sales
function tambahSales($data) {
	global $conn;

	// $IdSales = htmlspecialchars($data["IdSales"]);
	$NamaSales = htmlspecialchars($data["NamaSales"]);


	$query = "INSERT INTO sales (NamaSales)
			  VALUES
			  ('$NamaSales')
			  ";
	mysqli_query($conn, $query);

	return mysqli_affected_rows($conn); 

}

function editSales($data) {
	global $conn;

	// $IdSales = $data["id_sales"];
	// $IdSales = htmlspecialchars($data["IdSales"]);
	$IdSales = $data["IdSales"];
	$NamaSales = htmlspecialchars($data["NamaSales"]);

	$query = "UPDATE sales SET
				  NamaSales = '$NamaSales'
			  WHERE IdSales = '$IdSales'
			 ";
	mysqli_query($conn, $query);

	return mysqli_affected_rows($conn);
}

function hapusSales($IdSales) {
	global $conn;
	mysqli_query($conn, "DELETE 
						 FROM sales 
						 WHERE IdSales = '$IdSales'");
	return mysqli_affected_rows($conn);

}

function updateSales($IdSales) {
	global $conn;
	mysqli_query($conn, "UPDATE sales SET
							 IsDeleted = 1
				   		WHERE IdSales = '$IdSales'
						");
	return mysqli_affected_rows($conn);

}

function getDataSales() {
	global $conn;


	$query = "SELECT * FROM sales";
	$dataKelas = mysqli_query($conn, $query);
	
	return mysqli_fetch_all($dataKelas,MYSQLI_ASSOC); 
}


// Function Pembeli
function tambahPembeli($data) {
	global $conn;

	// $IdPembeli = htmlspecialchars($data["IdPembeli"]);
	$NamaPembeli = htmlspecialchars($data["NamaPembeli"]);


	$query = "INSERT INTO pembeli (NamaPembeli)
			  VALUES
			  ('$NamaPembeli')
			  ";
	mysqli_query($conn, $query);

	return mysqli_affected_rows($conn); 

}

function editPembeli($data) {
	global $conn;

	// $IdPembeli = $data["id_Pembeli"];
	// $IdPembeli = htmlspecialchars($data["IdPembeli"]);
	$IdPembeli = $data["IdPembeli"];
	$NamaPembeli = htmlspecialchars($data["NamaPembeli"]);

	$query = "UPDATE pembeli SET
				  NamaPembeli = '$NamaPembeli'
			  WHERE IdPembeli = '$IdPembeli'
			 ";
	mysqli_query($conn, $query);

	return mysqli_affected_rows($conn);
}

function hapusPembeli($IdPembeli) {
	global $conn;
	mysqli_query($conn, "DELETE 
						 FROM pembeli 
						 WHERE IdPembeli = '$IdPembeli'");
	return mysqli_affected_rows($conn);

}

function updatePembeli($IdPembeli) {
	global $conn;
	mysqli_query($conn, "UPDATE pembeli SET
							 IsDeleted = 1
				   		WHERE IdPembeli = '$IdPembeli'
						");
	return mysqli_affected_rows($conn);

}

function getDataPembeli() {
	global $conn;


	$query = "SELECT * FROM pembeli";
	$dataKelas = mysqli_query($conn, $query);
	
	return mysqli_fetch_all($dataKelas,MYSQLI_ASSOC); 
}


// function Transaksi
function tambahTransaksi($data) {
	global $conn;

	$NoFaktur = htmlspecialchars($data["NoFaktur"]);
	$IdSales = htmlspecialchars($data["IdSales"]);
	$IdPembeli = htmlspecialchars($data["IdPembeli"]);
	$IdBarang = htmlspecialchars($data["IdBarang"]);
	$JumlahPembelian = htmlspecialchars($data["JumlahPembelian"]);
	$JumlahHarga = htmlspecialchars($data["JumlahHarga"]);
	$NoPO = htmlspecialchars($data["NoPO"]);
	$TanggalFaktur = htmlspecialchars($data["TanggalFaktur"]);
	$JatuhTempo = htmlspecialchars($data["JatuhTempo"]);
	$Terms = htmlspecialchars($data["Terms"]);


	$query = "INSERT INTO transaksi
			  VALUES
			  ('$NoFaktur','$IdSales','$IdPembeli','$IdBarang','$JumlahPembelian','$JumlahHarga','$NoPO','$TanggalFaktur','$JatuhTempo','$Terms')
			  ";
	mysqli_query($conn, $query);

	return mysqli_affected_rows($conn); 

}

function editTransaksi($data) {
	global $conn;

	// $IdTransaksi = $data["id_Transaksi"];
	// $IdTransaksi = htmlspecialchars($data["IdTransaksi"]);
	$NoFaktur = $data["NoFaktur"];
	$IdSales = htmlspecialchars($data["IdSales"]);
	$IdPembeli = htmlspecialchars($data["IdPembeli"]);
	$IdBarang = htmlspecialchars($data["IdBarang"]);
	$JumlahPembelian = htmlspecialchars($data["JumlahPembelian"]);
	$JumlahHarga = htmlspecialchars($data["JumlahHarga"]);
	$NoPO = htmlspecialchars($data["NoPO"]);
	$TanggalFaktur = htmlspecialchars($data["TanggalFaktur"]);
	$JatuhTempo = htmlspecialchars($data["JatuhTempo"]);
	$Terms = htmlspecialchars($data["Terms"]);

	$query = "UPDATE transaksi SET
				  IdSales = '$IdSales',
				  IdPembeli = '$IdPembeli',
				  IdBarang = '$IdBarang',
				  JumlahPembelian = '$JumlahPembelian',
				  JumlahHarga = '$JumlahHarga',
				  NoPO = '$NoPO',
				  TanggalFaktur = '$TanggalFaktur',
				  JatuhTempo = '$JatuhTempo',
				  Terms = '$Terms'
			  WHERE NoFaktur = '$NoFaktur'
			 ";
	mysqli_query($conn, $query);

	return mysqli_affected_rows($conn);
}

function hapusTransaksi($NoFaktur) {
	global $conn;
	mysqli_query($conn, "DELETE 
						 FROM transaksi
						 WHERE NoFaktur = '$NoFaktur'");
						//  die;
	return mysqli_affected_rows($conn);
}

function getDataTransaksi() {
	global $conn;


	$query = "SELECT * FROM transaksi";
	$dataKelas = mysqli_query($conn, $query);
	
	return mysqli_fetch_all($dataKelas,MYSQLI_ASSOC); 
}

// function Pembayaran
function tambahPembayaran($data) {
	global $conn;

	$NoFaktur = htmlspecialchars($data["NoFaktur"]);
	$Diskon = htmlspecialchars($data["Diskon"]);
	$DPP = htmlspecialchars($data["DPP"]);
	$PPN = htmlspecialchars($data["PPN"]);
	$Total = htmlspecialchars($data["Total"]);
	$NoRekening = htmlspecialchars($data["NoRekening"]);

	$query = "INSERT INTO pembayaran
			  VALUES
			  ('','$NoFaktur','$Diskon','$DPP','$PPN','$Total','$NoRekening')
			  ";
	mysqli_query($conn, $query);

	return mysqli_affected_rows($conn); 

}

function editPembayaran($data) {
	global $conn;

	// $IdPembayaran = $data["id_Pembayaran"];
	// $IdPembayaran = htmlspecialchars($data["IdPembayaran"]);
	$IdPembayaran = $data["IdPembayaran"];
	$NoFaktur = htmlspecialchars($data["NoFaktur"]);
	$Diskon = htmlspecialchars($data["Diskon"]);
	$DPP = htmlspecialchars($data["DPP"]);
	$PPN = htmlspecialchars($data["PPN"]);
	$Total = htmlspecialchars($data["Total"]);
	$NoRekening = htmlspecialchars($data["NoRekening"]);


	$query = "UPDATE pembayaran SET
				  NoFaktur = '$NoFaktur',
				  Diskon = '$Diskon',
				  DPP = '$DPP',
				  PPN = '$PPN',
				  Total = '$Total',
				  NoRekening = '$NoRekening'
			  WHERE IdPembayaran = '$IdPembayaran'
			 ";
	mysqli_query($conn, $query);

	return mysqli_affected_rows($conn);
}

function hapusPembayaran($IdPembayaran) {
	global $conn;
	mysqli_query($conn, "DELETE 
						 FROM pembayaran
						 WHERE IdPembayaran = '$IdPembayaran'");
						//  die;
	return mysqli_affected_rows($conn);
}


?>