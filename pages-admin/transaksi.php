<?php
include 'functions/functions-admin.php';

$query_tampil = "SELECT * FROM transaksi";
$transaksi = tampilData($query_tampil);

$query_tampil2 = "SELECT * FROM anggota";
$anggota = tampilData($query_tampil2);

if (isset($_POST['btn-tambah'])) {
	tambahDataTransaksi($_POST);
}
if (isset($_POST['btn-edit'])) {
	editDataTransaksi($_POST);
}
if (isset($_POST['btn-hapus'])) {
	hapusDataTransaksi($_POST);
}
?>

<div class="page-content">
	<div class="page-header">
		<h1 style="color:#585858">
			<i class="ace-icon fa fa-list"></i> Data Transaksi
			<a href="pages-admin/cetak-transaksi.php" target="_blank">
				<button class="btn btn-success pull-right">
					<i class="ace-icon fa fa-print"></i> Cetak
				</button>
			</a>
			<a data-toggle="modal" href="#tambah-transaksi">
				<button class="btn btn-primary pull-right">
					<i class="ace-icon fa fa-plus"></i> Tambah Transaksi
				</button>
			</a>
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
									<th>Aksi</th>
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
										<td class="center">
											<div class="action-buttons">
												<a data-rel="tooltip" data-placement="top" title="Ubah" style="margin-right:5px" class="blue tooltip-info" data-toggle="modal" href="#edit-transaksi-<?= $value['id']; ?>">
													<i class="ace-icon fa fa-edit bigger-130"></i>
												</a>
												<a data-rel="tooltip" data-placement="top" title="Hapus" style="margin-right:5px" class="red tooltip-error" data-toggle="modal" href="#hapus-transaksi-<?= $value['id']; ?>">
													<i class="ace-icon fa fa-trash-o bigger-130"></i>
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

	<!-- Modal Tambah -->
	<div class="modal fade" id="tambah-transaksi">
		<div class="modal-dialog modal-lg">
			<div class="modal-content">
				<form class="form-horizontal" method="POST" role="form" enctype="multipart/form-data">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						<h4 class="modal-title"><i class="ace-icon fa fa-plus"> Form Tambah Transaksi</i></h4>
					</div>
					<div class="modal-body">
						<div class="form-group">
							<div class="col-sm-6">
								<div class="row-sm-4">
									<label class="control-label" for="id_anggota">Nomor Kartu</label>
									<select name="id_anggota" id="id_anggota" class="col-xs-12 col-sm-12" required>
										<?php
										foreach ($anggota as $a) {
										?>
											<option value="<?= $a['id_anggota'] ?>"><?= $a['no_kartu'] ?></option>
										<?php
										}
										?>
									</select>
								</div>
								<div class="row-sm-4">
									<label class="control-label" for="tanggal">Tanggal</label>
									<input type="date" id="tanggal" name="tanggal" class="col-xs-12 col-sm-12" required />
								</div>
								<div class="row-sm-4">
									<label class="control-label" for="sumber_dana">Sumber Dana</label>
									<input type="number" id="sumber_dana" name="sumber_dana" placeholder="Sumber Dana" class="col-xs-12 col-sm-12" required />
								</div>
								<div class="row-sm-4">
									<label class="control-label" for="nama_produk">Nama Produk</label>
									<input type="text" id="nama_produk" name="nama_produk" placeholder="Nama Produk" class="col-xs-12 col-sm-12" required />
								</div>
								<div class="row-sm-4">
									<label class="control-label" for="bank_penerima">Bank Penerima</label>
									<input type="text" id="bank_penerima" name="bank_penerima" placeholder="Bank Penerima" class="col-xs-12 col-sm-12" required />
								</div>
							</div>
							<div class="col-sm-6">
								<div class="row-sm-4">
									<label class="control-label" for="no_rek">No.Rek Kredit</label>
									<input type="number" id="no_rek" name="no_rek" placeholder="No.Rek Kredit" class="col-xs-12 col-sm-12" required />
								</div>
								<div class="row-sm-4">
									<label class="control-label" for="nama_rek">Nama Rek Kredit</label>
									<input type="text" id="nama_rek" name="nama_rek" placeholder="Nama Rek Kredit" class="col-xs-12 col-sm-12" required />
								</div>
								<div class="row-sm-4">
									<label class="control-label" for="mata_uang">Mata Uang</label>
									<input type="text" id="mata_uang" name="mata_uang" placeholder="Mata Uang" class="col-xs-12 col-sm-12" required />
								</div>
								<div class="row-sm-4">
									<label class="control-label" for="jumlah">Jumlah</label>
									<input type="number" id="jumlah" name="jumlah" placeholder="Jumlah" class="col-xs-12 col-sm-12" required />
								</div>
								<div class="row-sm-4">
									<label class="control-label" for="reference_number">Reference Number</label>
									<input type="number" id="reference_number" name="reference_number" placeholder="Reference Number" class="col-xs-12 col-sm-12" required />
								</div>
							</div>
						</div>
					</div>
					<div class="modal-footer">
						<button type="submit" class="btn btn-primary" name="btn-tambah">Tambah</button>
						<button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
					</div>
				</form>
			</div><!-- /.modal-content -->
		</div><!-- /.modal-dialog -->
	</div>
	<!-- End Modal Tambah -->

	<!-- Modal Edit -->
	<?php
	foreach ($transaksi as $row) :
	?>
		<div class="modal fade" id="edit-transaksi-<?= $row['id']; ?>">
			<div class="modal-dialog modal-lg">
				<div class="modal-content">
					<form class="form-horizontal" method="POST" role="form" enctype="multipart/form-data">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
							<h4 class="modal-title"><i class="ace-icon fa fa-plus"> Form Edit Transaksi</i></h4>
						</div>
						<div class="modal-body">
							<div class="form-group">
								<div class="col-sm-6">
									<div class="row-sm-4">
										<label class="control-label" for="id_anggota">Nomor Kartu</label>
										<select name="id_anggota" id="id_anggota" class="col-xs-12 col-sm-12" required>
											<?php
											foreach ($anggota as $a) {
											?>
												<option value="<?= $a['id_anggota'] ?>" <?= $a['id_anggota'] == $row['id_anggota'] ? 'selected' : '' ?>><?= $a['no_kartu'] ?></option>
											<?php
											}
											?>
										</select>
									</div>
									<div class="row-sm-4">
										<label class="control-label" for="tanggal">Tanggal</label>
										<input type="date" id="tanggal" value="<?= $row['tanggal'] ?>" name="tanggal" placeholder="Tanggal" class="col-xs-12 col-sm-12" required />
									</div>
									<div class="row-sm-4">
										<label class="control-label" for="sumber_dana">Sumber Dana</label>
										<input type="number" id="sumber_dana" value="<?= $row['sumber_dana'] ?>" name="sumber_dana" placeholder="Sumber Dana" class="col-xs-12 col-sm-12" required />
									</div>
									<div class="row-sm-4">
										<label class="control-label" for="nama_produk">Nama Produk</label>
										<input type="text" id="nama_produk" value="<?= $row['nama_produk'] ?>" name="nama_produk" placeholder="Nama Produk" class="col-xs-12 col-sm-12" required />
									</div>
									<div class="row-sm-4">
										<label class="control-label" for="bank_penerima">Bank Penerima</label>
										<input type="text" id="bank_penerima" value="<?= $row['bank_penerima'] ?>" name="bank_penerima" placeholder="Bank Penerima" class="col-xs-12 col-sm-12" required />
									</div>
								</div>

								<div class="col-sm-6">
									<div class="row-sm-4">
										<label class="control-label" for="no_rek">No.Rek Kredit</label>
										<input type="number" id="no_rek" value="<?= $row['no_rek'] ?>" name="no_rek" placeholder="No.Rek Kredit" class="col-xs-12 col-sm-12" required />
									</div>
									<div class="row-sm-4">
										<label class="control-label" for="nama_rek">Nama Rek Kredit</label>
										<input type="text" id="nama_rek" value="<?= $row['nama_rek'] ?>" name="nama_rek" placeholder="Nama Rek Kredit" class="col-xs-12 col-sm-12" required />
									</div>
									<div class="row-sm-4">
										<label class="control-label" for="mata_uang">Mata Uang</label>
										<input type="text" id="mata_uang" value="<?= $row['mata_uang'] ?>" name="mata_uang" placeholder="Mata Uang" class="col-xs-12 col-sm-12" required />
									</div>
									<div class="row-sm-4">
										<label class="control-label" for="jumlah">Jumlah</label>
										<input type="number" id="jumlah" value="<?= $row['jumlah'] ?>" name="jumlah" placeholder="Jumlah" class="col-xs-12 col-sm-12" required />
									</div>
									<div class="row-sm-4">
										<label class="control-label" for="reference_number">Reference Number</label>
										<input type="number" id="reference_number" value="<?= $row['reference_number'] ?>" name="reference_number" placeholder="Reference Number" class="col-xs-12 col-sm-12" required />
									</div>
								</div>
							</div>
						</div>
						<div class="modal-footer">
							<button type="submit" class="btn btn-primary" name="btn-edit" value="<?= $row['id'] ?>">Edit</button>
							<button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
						</div>
					</form>
				</div><!-- /.modal-content -->
			</div><!-- /.modal-dialog -->
		</div>
	<?php endforeach; ?>
	<!-- End Modal Edit -->

	<!-- Modal Hapus -->
	<?php
	foreach ($transaksi as $row) :
	?>
		<div class="modal fade" id="hapus-transaksi-<?= $row['id']; ?>">
			<div class="modal-dialog">
				<div class="modal-content">
					<form class="form-horizontal" method="POST" role="form" enctype="multipart/form-data">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
							<h4 class="modal-title"><i class="ace-icon fa fa-trash-o"> Hapus Data Transaksi</i></h4>
						</div>
						<div class="modal-body">
							<div class="form-group">
								<div class="col-sm-12">
									<p>Yakin hapus data?</p>
								</div>
							</div>
						</div>
						<div class="modal-footer">
							<button type="submit" class="btn btn-primary" name="btn-hapus" value="<?= $row['id'] ?>">Ya</button>
							<button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
						</div>
					</form>
				</div><!-- /.modal-content -->
			</div><!-- /.modal-dialog -->
		</div>
	<?php endforeach; ?>
	<!-- End Modal Hapus -->
</div><!-- /.page-content -->