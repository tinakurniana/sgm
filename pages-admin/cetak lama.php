<?php
error_reporting(0);

$tahun = $_GET['tahun'];

header("Content-type: application/vnd-ms-excel");
header("Content-Disposition: attachment; filename=Data Simpanan Wajib Tahun " . $tahun . ".xls");

include '../functions/functions-admin.php';

$data = tampilData("SELECT
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
    'Januari',
    'Februari',
    'Maret',
    'April',
    'Mei',
    'Juni',
    'Juli',
    'Agustus',
    'September',
    'Oktober',
    'November',
    'Desember'
]
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" type="text/css" href="../assets-admin/css/bootstrap.min.css" />
    <link rel="stylesheet" type="text/css" href="../assets-admin/plugins/font-awesome-4.6.3/css/font-awesome.min.css" />

    <!--fonts-->
    <link rel="stylesheet" type="text/css" href="../assets-admin/fonts/fonts.googleapis.com.css" />

    <!--ace styles-->
    <link rel="stylesheet" type="text/css" href="../assets-admin/css/ace.min.css" class="ace-main-stylesheet" id="main-ace-style" />
    <link rel="stylesheet" type="text/css" href="../assets-admin/js/ace-extra.min.js" />
    <title>Document</title>
</head>

<body>
    <div class="page-content">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th rowspan="2">No Kartu</th>
                    <th rowspan="2">No Registrasi</th>
                    <th rowspan="2">Nama Anggota</th>
                    <th rowspan="2">Alamat</th>
                    <th rowspan="2">Simpanan Pokok</th>
                    <th colspan="12">Simpanan Wajib (Bulan)</th>
                    <th rowspan="2">Total</th>
                </tr>
                <tr>
                    <?php
                    foreach ($bulan as $bln) {
                    ?>
                        <th>
                            <?= $bln; ?>
                        </th>
                    <?php
                    }
                    ?>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($data as $d) {
                ?>
                    <tr>
                        <td><?= $d['no_kartu'] ?></td>
                        <td><?= $d['no_registrasi'] ?></td>
                        <td><?= $d['nama'] ?></td>
                        <td><?= $d['alamat'] ?></td>
                        <td>Rp. 50000</td>
                        <?php
                        for ($i = 0; $i < count($bulan); $i++) {
                            $cek = strpos($d['bulan'], $bulan[$i]);
                            if ($cek !== false) {
                        ?>
                                <td>
                                    Rp. 5.000;
                                </td>
                            <?php
                            } else {
                            ?>
                                <td>
                                    Rp. 0;
                                </td>
                        <?php
                            }
                        }
                        ?>
                        <td><?= count(explode(", ", $d['bulan'])) * 5000 ?></td>
                    </tr>
                <?php
                }
                ?>
            </tbody>
        </table>
    </div>
</body>

</html>