<?php
// include 'functions/functions-admin.php';

$id_tahun = $_GET['id_tahun'];
$query_tahun = "SELECT * FROM tahun WHERE id = '$id_tahun'";
$tahun = tampilData($query_tahun);
$query_bulan = "SELECT * FROM bulan";
$bulan = tampilData($query_bulan);

?>

<div class="page-content">
	<div class="page-header">
		<h1 style="color:#585858">
			<i class="ace-icon fa fa-list"></i> Transaksi Tahun <?= $tahun[0]['tahun']; ?>
		</h1>
	</div><!-- /.page-header -->

	<div class="row">
		<div class="col-xs-12">
			<!-- PAGE CONTENT BEGINS -->
			<div class="row">
				<div class="col-xs-12">
					<div class="table-header">
						Data Bulan
					</div>
					<!-- div.table-responsive -->

					<!-- div.dataTables_borderWrap -->
					<div>
						<table id="dynamic-table" class="table table-striped table-bordered table-hover">
							<thead>
								<tr>
									<th>No.</th>
									<th>Bulan</th>
									<th>Aksi</th>
								</tr>
							</thead>

							<tbody>
								<?php
								$i = 1;
								foreach ($bulan as $value) {
								?>
									<tr>
										<td class="center"><?= $i ?></td>
										<td class="center"><?= $value['bulan'] ?></td>
										<td class="center">
											<div class="action-buttons">
												<a data-rel="tooltip" data-placement="top" title="Data Transaksi" class="blue tooltip-info" href="indexAdmin.php?p=transaksi&id_tahun=<?= $id_tahun ?>&id_bulan=<?= $value['id'] ?>">
													<i class="ace-icon fa fa-info-circle bigger-130"></i>
												</a>
											</div>
										</td>
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