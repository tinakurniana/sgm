<?php
// include 'functions/functions-admin.php';
$id = $_SESSION['id'];
$query_tampil = "SELECT * FROM anggota WHERE id_anggota = $id";
$anggota = tampilData($query_tampil);

?>

<div class="page-content">
    <div class="page-header">
        <h1 style="color:#585858">
            <i class="ace-icon fa fa-user"></i>
            Data Diri
        </h1>
    </div><!-- /.page-header -->

    <div class="row">
        <div class="col-xs-12">
            <!--PAGE CONTENT BEGINS-->
            <!-- <form class="form-horizontal" role="form" action="" method="POST">

					<div class="form-group">
						<label class="col-sm-2 control-label no-padding-right">No.Kartu :</label>
						<div class="col-sm-9">
                        <input readonly="" type="text" class="col-xs-10 col-sm-5" id="form-input-readonly" value="001" />
						</div>
					</div>

                    <div class="form-group">
						<label class="col-sm-2 control-label no-padding-right">No.Registrasi :</label>
						<div class="col-sm-9">
                        <input readonly="" type="text" class="col-xs-10 col-sm-5" id="form-input-readonly" value="T.II/WH/0001" />
						</div>
					</div>

                    <div class="form-group">
						<label class="col-sm-2 control-label no-padding-right">Nama Lengkap :</label>
						<div class="col-sm-9">
                        <input readonly="" type="text" class="col-xs-10 col-sm-5" id="form-input-readonly" value="Pirda" />
						</div>
					</div>

                    <div class="form-group">
						<label class="col-sm-2 control-label no-padding-right">Alamat :</label>
						<div class="col-sm-9">
                        <input readonly="" type="text" class="col-xs-10 col-sm-5" id="form-input-readonly" value="Jalan Badak" />
						</div>
					</div>

                    <div class="form-group">
						<label class="col-sm-2 control-label no-padding-right">KTP :</label>
						<div class="col-sm-9">
                        <input readonly="" type="text" class="col-xs-10 col-sm-5" id="form-input-readonly" value="123456789" />
						</div>
					</div>

                    <div class="form-group">
						<label class="col-sm-2 control-label no-padding-right">Luas Plasma :</label>
						<div class="col-sm-9">
                        <input readonly="" type="text" class="col-xs-10 col-sm-5" id="form-input-readonly" value="0.66 Ha" />
						</div>
					</div>
					
                    <div class="form-group">
						<label class="col-sm-2 control-label no-padding-right">Foto</label>
						<div class="col-sm-9">
                        <img src="assets-admin/img/bg.jpg" alt="foto-user" width="100px">
					</div>

				</form> -->

            <!-- <div class="hr dotted"></div> -->

            <div>
                <div id="user-profile-1" class="user-profile row">
                    <div class="col-xs-12 col-sm-3 center">
                        <div>
                            <span class="profile-picture">
                                <img id="avatar" class="editable img-responsive" alt="Alex's Avatar" src="assets-admin/images/<?= $anggota[0]['foto'] ?>" />
                            </span>

                            <div class="space-4"></div>

                            <div class="width-80 label label-info label-xlg arrowed-in arrowed-in-right">
                                <div class="inline position-relative">
                                    <a href="#" class="user-title-label dropdown-toggle" data-toggle="dropdown">
                                        <i class="ace-icon fa fa-circle light-green"></i>
                                        &nbsp;
                                        <span class="white"><?= $anggota[0]['nama'] ?></span>
                                    </a>
                                </div>
                            </div>
                        </div>

                        <div class="space-6"></div>
                    </div>

                    <div class="col-xs-12 col-sm-9">

                        <div class="profile-user-info profile-user-info-striped">
                            <div class="profile-info-row">
                                <div class="profile-info-name"> Username :</div>
                                <div class="profile-info-value">
                                    <span class="editable" id="username"><?= $anggota[0]['username'] ?></span>
                                </div>
                            </div>

                            <div class="profile-info-row">
                                <div class="profile-info-name"> No.Kartu :</div>
                                <div class="profile-info-value">
                                    <span class="editable" id="no_kartu"><?= $anggota[0]['no_kartu'] ?></span>
                                </div>
                            </div>

                            <div class="profile-info-row">
                                <div class="profile-info-name"> No.Registrasi :</div>
                                <div class="profile-info-value">
                                    <span class="editable" id="no_registrasi"><?= $anggota[0]['no_registrasi'] ?></span>
                                </div>
                            </div>

                            <div class="profile-info-row">
                                <div class="profile-info-name"> Bergabung :</div>
                                <div class="profile-info-value">
                                    <span class="editable" id="no_registrasi"><?= $anggota[0]['mulai_bergabung'] ?></span>
                                </div>
                            </div>

                            <div class="profile-info-row">
                                <div class="profile-info-name"> Alamat :</div>

                                <div class="profile-info-value">
                                    <i class="fa fa-map-marker light-orange bigger-110"></i>
                                    <span class="editable" id="alamat"><?= $anggota[0]['alamat'] ?></span>
                                </div>
                            </div>

                            <div class="profile-info-row">
                                <div class="profile-info-name"> KTP :</div>

                                <div class="profile-info-value">
                                    <span class="editable" id="ktp"><?= $anggota[0]['ktp'] ?></span>
                                </div>
                            </div>

                            <div class="profile-info-row">
                                <div class="profile-info-name"> Luas Plasma :</div>

                                <div class="profile-info-value">
                                    <span class="editable" id="luas_plasma"><?= $anggota[0]['luas_plasma'] ?> Ha</span>
                                </div>
                            </div>

                            <div class="profile-info-row">
                                <div class="profile-info-name"> Foto Bukti :</div>

                                <div class="profile-info-value">
                                    <img src="assets-admin/images/<?= $anggota[0]['foto_bukti'] ?>" alt="foto-user" width="300px">
                                </div>
                            </div>
                        </div>

                        <div class="space-20"></div>
                    </div>
                </div>
            </div>
            <!--PAGE CONTENT ENDS-->
        </div><!--/.span-->
    </div><!--/.row-fluid-->
</div><!--/.page-content-->