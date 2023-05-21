<?php
error_reporting(0);

header("Content-type: application/vnd-ms-excel");
header("Content-Disposition: attachment; filename=Data Transaksi.xls");

include '../functions/functions-admin.php';

$query_tampil = "SELECT * FROM transaksi";
$transaksi = tampilData($query_tampil);
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
        <table id="dynamic-table" class="table table-striped table-bordered table-hover">
            <thead>
                <tr>
                    <th>No.</th>
                    <th>Tanggal</th>
                    <th>Sumber Dana</th>
                    <th>Nama Produk</th>
                    <th>Bank Penerima</th>
                    <th>No.Rek Kredit</th>
                    <th>Nama Rek Kredit</th>
                    <th>Mata Uang</th>
                    <th>Jumlah</th>
                    <th>Reference Number</th>
                </tr>
            </thead>

            <tbody>
                <?php
                $i = 1;
                foreach ($transaksi as $value) {
                ?>
                    <tr>
                        <td class="center"><?= $i ?></td>
                        <td><?= $value['tanggal'] ?></td>
                        <td><?= $value['sumber_dana'] ?></td>
                        <td><?= $value['nama_produk'] ?></td>
                        <td><?= $value['bank_penerima'] ?></td>
                        <td><?= $value['no_rek'] ?></td>
                        <td><?= $value['nama_rek'] ?></td>
                        <td><?= $value['mata_uang'] ?></td>
                        <td><?= $value['jumlah'] ?></td>
                        <td><?= $value['reference_number'] ?></td>
                    </tr>
                <?php
                    $i++;
                }
                ?>
            </tbody>
        </table>
    </div>
</body>

</html>