<?php
include('../functions/functions-admin.php');
require '../vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

$spreadsheet = new Spreadsheet();
$sheet = $spreadsheet->getActiveSheet();

$sheet->mergeCells('A1:A2');
$sheet->setCellValue('A1', 'No Kartu');

$sheet->mergeCells('B1:B2');
$sheet->setCellValue('B1', 'No Registrasi');

$sheet->mergeCells('C1:C2');
$sheet->setCellValue('C1', 'Nama Anggota');

$sheet->mergeCells('D1:D2');
$sheet->setCellValue('D1', 'Alamat');

$sheet->mergeCells('E1:E2');
$sheet->setCellValue('E1', 'Simpanan Pokok');

$sheet->mergeCells('F1:Q1');
$sheet->setCellValue('F1', 'Simpanan Wajib (Bulan)');

$sheet->setCellValue('F2', 'Januari');
$sheet->setCellValue('G2', 'Februari');
$sheet->setCellValue('H2', 'Maret');
$sheet->setCellValue('I2', 'April');
$sheet->setCellValue('J2', 'Mei');
$sheet->setCellValue('K2', 'Juni');
$sheet->setCellValue('L2', 'Juli');
$sheet->setCellValue('M2', 'Agustus');
$sheet->setCellValue('N2', 'September');
$sheet->setCellValue('O2', 'Oktober');
$sheet->setCellValue('P2', 'November');
$sheet->setCellValue('Q2', 'Desember');

$sheet->mergeCells('R1:R2');
$sheet->setCellValue('R1', 'Total');

$tahun = $_GET['tahun'];

$data = mysqli_query($conn, "SELECT
                                tahun.tahun,
                                anggota.*,
                                GROUP_CONCAT(bulan.bulan SEPARATOR ', ') AS bulan
                            FROM
                                tahun
                            INNER JOIN bulan ON tahun.id = bulan.id_tahun
                            INNER JOIN simpanan_wajib ON bulan.id = simpanan_wajib.id_bulan
                            INNER JOIN anggota ON simpanan_wajib.id_anggota = anggota.id_anggota
                            WHERE
                                tahun.tahun = '$tahun'
                            GROUP BY
                                anggota.id_anggota
                            ORDER BY
                                tahun.tahun");

$bulan = [
    array(
        "bulan" => "Januari",
        "cell" => "F"
    ),
    array(
        "bulan" => "Februari",
        "cell" => "G"
    ),
    array(
        "bulan" => "Maret",
        "cell" => "H"
    ),
    array(
        "bulan" => "April",
        "cell" => "I"
    ),
    array(
        "bulan" => "Mei",
        "cell" => "J"
    ),
    array(
        "bulan" => "Juni",
        "cell" => "K"
    ),
    array(
        "bulan" => "Juli",
        "cell" => "L"
    ),
    array(
        "bulan" => "Agustus",
        "cell" => "M"
    ),
    array(
        "bulan" => "September",
        "cell" => "N"
    ),
    array(
        "bulan" => "Oktober",
        "cell" => "O"
    ),
    array(
        "bulan" => "November",
        "cell" => "P"
    ),
    array(
        "bulan" => "Desember",
        "cell" => "Q"
    ),
];

$i = 3;
while ($d = mysqli_fetch_array($data)) {
    $sheet->setCellValue('A' . $i, $d['no_kartu']);
    $sheet->setCellValue('B' . $i, $d['no_registrasi']);
    $sheet->setCellValue('C' . $i, $d['nama']);
    $sheet->setCellValue('D' . $i, $d['alamat']);
    $sheet->setCellValue('E' . $i, 50000);
    for ($j = 0; $j < count($bulan); $j++) {
        $cek = strpos($d['bulan'], $bulan[$j]['bulan']);
        if ($cek !== false) {
            $sheet->setCellValue($bulan[$j]['cell'] . $i, 5000);
        } else {
            $sheet->setCellValue($bulan[$j]['cell'] . $i, 0);
        }
    }
    $sheet->setCellValue('R' . $i, (count(explode(", ", $d['bulan'])) * 5000) + 50000);
    $i++;
}

$writer = new Xlsx($spreadsheet);
$writer->save('../excel/Data Simpanan.xlsx');
echo "<script>window.location = '../excel/Data Simpanan.xlsx'</script>";
