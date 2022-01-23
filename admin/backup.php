<?php
// include('koneksi.php');
// require 'functions.php';

require '../vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

$spreadsheet = new Spreadsheet();

$spreadsheet->setActiveSheetIndex(0)
    ->setCellValue('A1', 'No Faktur')
    ->setCellValue('B1', 'Nama Sales')
    ->setCellValue('C1', 'Nama Pembeli')
    ->setCellValue('D1', 'Nama Barang')
    ->setCellValue('E1', 'Jumlah Pembelian')
    ->setCellValue('F1', 'Jumlah Harga')
    ->setCellValue('G1', 'No PO')
    ->setCellValue('H1', 'Tanggal Faktur')
    ->setCellValue('I1', 'Jatuh Tempo')
    ->setCellValue('J1', 'Terms');

$column = 2;

$query = mysqli_query($conn, "SELECT * 
                              FROM transaksi,barang,sales,pembeli 
                              WHERE transaksi.IdSales=sales.IdSales
                              AND transaksi.IdPembeli=pembeli.IdPembeli
                              AND transaksi.idBarang=barang.IdBarang");
$res = $query->fetch_all(MYSQLI_ASSOC);

foreach ($res as $row) {
    $spreadsheet->setActiveSheetIndex(0)
        ->setCellValue('A' . $column, $row['NoFaktur'])
        ->setCellValue('B' . $column, $row['NamaSales'])
        ->setCellValue('C' . $column, $row['NamaPembeli'])
        ->setCellValue('D' . $column, $row['NamaBarang'])
        ->setCellValue('E' . $column, $row['JumlahPembelian'])
        ->setCellValue('F' . $column, $row['JumlahHarga'])
        ->setCellValue('G' . $column, $row['NoPO'])
        ->setCellValue('H' . $column, $row['TanggalFaktur'])
        ->setCellValue('I' . $column, $row['JatuhTempo'])
        ->setCellValue('J' . $column, $row['Terms']);

    $column++;
}

$writer = new Xlsx($spreadsheet);

$filename = date('Y-m-d') . '-Data-transaksi';

ob_end_clean();
header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment;filename=' . $filename . '.xlsx');
header('Cache-Control: max-age=0');

$writer->save('php://output');

