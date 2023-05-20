<div class="page-content">
	<div class="page-header">
		<h1 style="color:#585858">
			<i class="ace-icon fa fa-file-o"></i> Data Tahun
			<a href="#">
				<button class="btn btn-primary pull-right">
					<i class="ace-icon fa fa-plus"></i> Tambah Tahun
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
						Data Tahun
					</div>
					<!-- div.table-responsive -->

					<!-- div.dataTables_borderWrap -->
					<div>
						<table id="dynamic-table" class="table table-striped table-bordered table-hover">
							<thead>
								<tr>
									<th>No.</th>
									<th>Tahun</th>
									<th>Aksi</th>
								</tr>
							</thead>

							<tbody>
								<tr>
									<td class="center">1.</td>
									<td class="center">2018</td>
									<td class="center">
										<div class="action-buttons">
											<a data-rel="tooltip" data-placement="top" title="Ubah" style="margin-right:5px" class="blue tooltip-info" href="?module=form_akun&form=edit&id=<?php echo $data['kode_akun']; ?>">
												<i class="ace-icon fa fa-edit bigger-130"></i>
											</a>

											<a data-rel="tooltip" data-placement="top" title="Hapus" class="red tooltip-error" href="modules/akun/proses.php?act=delete&id=<?php echo $data['kode_akun'];?>" onclick="return confirm('Anda yakin ingin menghapus akun <?php echo $data['nama_akun']; ?> ?');">
												<i class="ace-icon fa fa-trash-o bigger-130"></i>
											</a>

											<a data-rel="tooltip" data-placement="top" title="Detail Bulan" oclass="red tooltip-infp" href="indexAdmin.php?p=simpanan-wajib-bulan">
												<i class="ace-icon fa fa-info-circle bigger-130"></i>
											</a>
										</div>
									</td>
								</tr>
                                <tr>
									<td class="center">2.</td>
									<td class="center">2019</td>
									<td class="center">
										<div class="action-buttons">
											<a data-rel="tooltip" data-placement="top" title="Ubah" style="margin-right:5px" class="blue tooltip-info" href="?module=form_akun&form=edit&id=<?php echo $data['kode_akun']; ?>">
												<i class="ace-icon fa fa-edit bigger-130"></i>
											</a>

											<a data-rel="tooltip" data-placement="top" title="Hapus" class="red tooltip-error" href="modules/akun/proses.php?act=delete&id=<?php echo $data['kode_akun'];?>" onclick="return confirm('Anda yakin ingin menghapus akun <?php echo $data['nama_akun']; ?> ?');">
												<i class="ace-icon fa fa-trash-o bigger-130"></i>
											</a>

											<a data-rel="tooltip" data-placement="top" title="Detail Bulan" oclass="red tooltip-infp" href="indexAdmin.php?p=simpanan-wajib-bulan">
												<i class="ace-icon fa fa-info-circle bigger-130"></i>
											</a>
										</div>
									</td>
								</tr>
							</tbody>
						</table>
					</div>
				</div>
			</div><!-- PAGE CONTENT ENDS -->
		</div><!-- /.col -->
	</div><!-- /.row -->
</div><!-- /.page-content -->