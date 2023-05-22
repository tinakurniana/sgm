<?php
// include 'functions/functions-admin.php';

$id = $_SESSION['id'];

$query_tampil = "SELECT
                    transaksi.*
                FROM
                    transaksi
                INNER JOIN anggota ON anggota.id_anggota = transaksi.id_anggota
                WHERE anggota.id_anggota = $id";
$transaksi = tampilData($query_tampil);

?>


<div class="page-content">
	<div class="page-header">
		<h1 style="color:#585858">
			<i class="ace-icon fa fa-list"></i> Data Transaksi
		</h1>
	</div><!-- /.page-header -->

	<div class="row">
		<div class="col-xs-12">
			<!-- PAGE CONTENT BEGINS -->
			<div class="row">
				<div class="col-xs-12">
					<div class="table-header">
						Data Transaksi
					</div>
					<!-- div.table-responsive -->

					<!-- div.dataTables_borderWrap -->
					<div>
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
										<td class="center"><?= $i;?></td>
										<td><?= $value['tanggal']?></td>
										<td><?= $value['sumber_dana']?></td>
										<td><?= $value['nama_produk']?></td>
										<td><?= $value['bank_penerima']?></td>
										<td><?= $value['no_rek']?></td>
										<td><?= $value['nama_rek']?></td>
										<td><?= $value['mata_uang']?></td>
										<td>Rp <?= $value['jumlah']?></td>
										<td>Rp <?= $value['reference_number']?></td>
									</tr>
								<?php
								$i++;
								}
								?>
							</tbody>
						</table>
					</div>
				</div>
			</div><!-- PAGE CONTENT ENDS -->
		</div><!-- /.col -->
	</div><!-- /.row -->
</div><!-- /.page-content -->