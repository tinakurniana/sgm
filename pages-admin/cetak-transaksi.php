

<?php
include('../functions/functions-admin.php');
require '../vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

$spreadsheet = new Spreadsheet();
$sheet = $spreadsheet->getActiveSheet();

$sheet->setCellValue('A1', 'No');
$sheet->setCellValue('B1', 'Sumber Dana');
$sheet->setCellValue('C1', 'Nama Produk');
$sheet->setCellValue('D1', 'Bank Penerima');
$sheet->setCellValue('E1', 'No.Rek Kredit');
$sheet->setCellValue('F1', 'Nama Rek Kredit');
$sheet->setCellValue('G1', 'Mata Uang');
$sheet->setCellValue('H1', 'Jumlah');
$sheet->setCellValue('I1', 'Reference Number');
$sheet->setCellValue('J1', 'Tanggal');

$id_tahun = $_GET['id_tahun'];
$id_bulan = $_GET['id_bulan'];
$data = mysqli_query($conn, "SELECT * FROM transaksi WHERE id_tahun = '$id_tahun' AND id_bulan = '$id_bulan'");

$i = 2;
$no = 1;
while ($d = mysqli_fetch_array($data)) {
    $sheet->setCellValue('A' . $i, $no);
    $sheet->setCellValue('B' . $i, $d['sumber_dana']);
    $sheet->setCellValue('C' . $i, $d['nama_produk']);
    $sheet->setCellValue('D' . $i, $d['bank_penerima']);
    $sheet->setCellValue('E' . $i, $d['no_rek']);
    $sheet->setCellValue('F' . $i, $d['nama_rek']);
    $sheet->setCellValue('G' . $i, $d['mata_uang']);
    $sheet->setCellValue('H' . $i, $d['jumlah']);
    $sheet->setCellValue('I' . $i, $d['reference_number']);
    $sheet->setCellValue('J' . $i, $d['tanggal']);
    $i++;
    $no++;
}

$writer = new Xlsx($spreadsheet);
$writer->save('../excel/Data Transaksi.xlsx');
echo "<script>window.location = '../excel/Data Transaksi.xlsx'</script>";
