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
                                tahun.tahun = 1900
                            GROUP BY
                                anggota.id_anggota
                            ORDER BY
                                tahun.tahun");

$bulan = [
    array(
        "bulan" => "Januari",
        "cell" => "F3"
    ),
    array(
        "bulan" => "Februari",
        "cell" => "G3"
    ),
    array(
        "bulan" => "Maret",
        "cell" => "H3"
    ),
    array(
        "bulan" => "April",
        "cell" => "I3"
    ),
    array(
        "bulan" => "Mei",
        "cell" => "J3"
    ),
    array(
        "bulan" => "Juni",
        "cell" => "K3"
    ),
    array(
        "bulan" => "Juli",
        "cell" => "L3"
    ),
    array(
        "bulan" => "Agustus",
        "cell" => "M3"
    ),
    array(
        "bulan" => "September",
        "cell" => "N3"
    ),
    array(
        "bulan" => "Oktober",
        "cell" => "O3"
    ),
    array(
        "bulan" => "November",
        "cell" => "P3"
    ),
    array(
        "bulan" => "Desember",
        "cell" => "Q3"
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
            $sheet->setCellValue($bulan[$j]['cell'], 5000);
        } else {
            $sheet->setCellValue($bulan[$j]['cell'], 0);
        }
    }
    $sheet->setCellValue('R' . $i, count(explode(", ", $d['bulan'])) * 5000);
    $i++;
}

$writer = new Xlsx($spreadsheet);
$writer->save('Data Simpanan.xlsx');
echo "<script>window.location = 'Data karyawan.xlsx'</script>";
