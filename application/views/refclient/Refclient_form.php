        <div class="page-bar">
                            <ul class="page-breadcrumb">
                                <li>
                                    Master
                                    <i class="fa fa-circle"></i>
                                </li>
                                <li>
                                    <span>Wajib Pajak</span>
                                    <i class="fa fa-circle"></i>
                                </li>
                                <li>
                                    <span><?php echo $button ?></span>
                                </li>
                            </ul>
                        </div>
                        <div class="portlet light bordered">
                            <div class="portlet-title">
                                <div class="caption font-green-haze">
                                    <i class="fa fa-file-text font-green-haze"></i>
                                    <span class="caption-subject bold"> <?php echo $button ?></span>
                                </div>
                            </div>
                            <div class="portlet-body form">
        <form action="<?php echo $action; ?>" method="post" class="form-horizontal">
	    <div class="form-group form-md-line-input  has-success">
            <label class="col-md-2 control-label" for="varchar">Nama Wp <span class="required"> * </span></label>
            <div class="col-md-10">
                <input type="text" class="form-control" name="nama_wp" id="nama_wp"  value="<?php echo $nama_wp; ?>" />
                <?php echo form_error('nama_wp') ?>
            </div>
        </div>
        <div class="form-group form-md-line-input  has-success">
            <label class="col-md-2 control-label" for="varchar">NPWP <span class="required"> * </span></label>
            <div class="col-md-10">
                <input type="text" class="form-control" name="npwp" id="npwp"  value="<?php echo $npwp; ?>" />
                <?php echo form_error('npwp') ?>
            </div>
        </div>
	    <div class="form-group form-md-line-input  has-success">
            <label class="col-md-2 control-label" for="varchar">Email <span class="required"> * </span></label>
            <div class="col-md-10">
                <input type="email" class="form-control" name="email" id="email"  value="<?php echo $email; ?>" />
                <?php echo form_error('email') ?>
            </div>
        </div>
	   <div class="form-group"><div class="col-md-10 col-md-offset-2"> <input type="hidden" name="kd_client" value="<?php echo $kd_client; ?>" /> 
	    <button type="submit" class="btn btn-sm blue"><i class="fa fa-save"></i> Simpan</button> 
	    <a href="<?php echo site_url('refclient') ?>" class="btn btn-sm red"><i class="fa fa-close"></i> Batal</a> </div></div>
	</form>
        </div>
</div>