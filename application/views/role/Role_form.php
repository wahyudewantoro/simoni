        <div class="page-bar">
                            <ul class="page-breadcrumb">
                                <li>
                                    Sistem
                                    <i class="fa fa-circle"></i>
                                </li>
                                <li>
                                    <span>Role</span>
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
            <label class="col-md-2 control-label" for="varchar">Nama Role <span class="required"> * </span></label>
            <div class="col-md-10">
                <input type="text" class="form-control" name="nama_role" id="nama_role"  value="<?php echo $nama_role; ?>" />
                <?php echo form_error('nama_role') ?>
            </div>
        </div>
	   <div class="form-group"><div class="col-md-10 col-md-offset-2"> <input type="hidden" name="id_inc" value="<?php echo $id_inc; ?>" /> 
	    <button type="submit" class="btn btn-sm blue"><i class="fa fa-save"></i> Simpan</button> 
	    <a href="<?php echo site_url('role') ?>" class="btn btn-sm red"><i class="fa fa-close"></i> Batal</a> </div></div>
	</form>
        </div>
</div>