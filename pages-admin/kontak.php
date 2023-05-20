<div class="page-content">
    <div class="page-header">
        <h1 style="color:#585858">
            <i class="ace-icon fa fa-desktop"></i> Kelola Konten Kontak Halaman Pengunjung
        </h1>
    </div><!-- /.page-header -->

    <div class="row">
        <div class="col-xs-12">
            <!-- PAGE CONTENT BEGINS -->
            <div class="row">
                <div class="col-xs-12">
                    <!--PAGE CONTENT BEGINS-->
                    <form class="form-horizontal" role="form" action="" method="POST">

                    <div class="form-group">
                        <label class="col-sm-2 control-label no-padding-right">Alamat : </label>
                        <div class="col-sm-9">
                            <textarea name="alamat" id="alamat" cols="10" rows="5" class="col-xs-12 col-sm-5" required></textarea>
                            <!-- <input type="text" class="col-xs-12 col-sm-5" name="alamat" maxlength="3" autocomplete="off" onKeyPress="return goodchars(event,'0123456789',this)" required /> -->
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label no-padding-right">Telp : </label>
                        <div class="col-sm-9">
                            <input type="text" class="col-xs-12 col-sm-5" name="telp" maxlength="3" autocomplete="off" onKeyPress="return goodchars(event,'0123456789',this)" required />
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label no-padding-right">Email :</label>
                        <div class="col-sm-9">
                            <input type="text" class="col-xs-12 col-sm-5" name="email" maxlength="3" autocomplete="off" onKeyPress="return goodchars(event,'0123456789',this)" required />
                        </div>
                    </div>
                    <div class="clearfix form-actions">
                        <div class="col-md-offset-2 col-md-10">
                            <input style="width:100px" type="submit" class="btn btn-primary" name="simpan" value="Simpan" />
                            &nbsp; &nbsp;
                        </div>
                    </div>
                    </form>
                    <!--PAGE CONTENT ENDS-->
                </div><!--/.span-->
            </div><!--/.row-fluid-->
        </div><!-- /.col -->
    </div><!-- /.row -->
</div><!-- /.page-content -->