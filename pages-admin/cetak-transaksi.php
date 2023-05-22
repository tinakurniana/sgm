

<?php
include('../functions/functions-admin.php');
require '../vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

$spreadsheet = new Spreadsheet();
$sheet = $spreadsheet->getActiveSheet();

$sheet->setCellValue('A1', 'No');
$sheet->setCellValue('B1', 'Tanggal');
$sheet->setCellValue('C1', 'Sumber Dana');
$sheet->setCellValue('D1', 'Nama Produk');
$sheet->setCellValue('E1', 'Bank Penerima');
$sheet->setCellValue('F1', 'No.Rek Kredit');
$sheet->setCellValue('G1', 'Nama Rek Kredit');
$sheet->setCellValue('H1', 'Mata Uang');
$sheet->setCellValue('I1', 'Jumlah');
$sheet->setCellValue('J1', 'Reference Number');

$data = mysqli_query($conn, "SELECT * FROM transaksi");

$i = 2;
$no = 1;
while ($d = mysqli_fetch_array($data)) {
    $sheet->setCellValue('A' . $i, $no);
    $sheet->setCellValue('B' . $i, $d['tanggal']);
    $sheet->setCellValue('C' . $i, $d['sumber_dana']);
    $sheet->setCellValue('D' . $i, $d['nama_produk']);
    $sheet->setCellValue('E' . $i, $d['bank_penerima']);
    $sheet->setCellValue('F' . $i, $d['no_rek']);
    $sheet->setCellValue('G' . $i, $d['nama_rek']);
    $sheet->setCellValue('H' . $i, $d['mata_uang']);
    $sheet->setCellValue('I' . $i, $d['jumlah']);
    $sheet->setCellValue('J' . $i, $d['reference_number']);
    $i++;
    $no++;
}

$writer = new Xlsx($spreadsheet);
$writer->save('../excel/Data Transaksi.xlsx');
echo "<script>window.location = '../excel/Data Transaksi.xlsx'</script>";
